<?php
require_once "models/ProductoModel.php";
require_once "models/productoProveedor.php";

class AdministradorController
{
    //private $productoModel = new ProductoModel();
    //private $productoProveedor = new productoProveedor();

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarFormularioCompra()
    {
        $this->realizarPresupuesto();
        $json_data = json_encode(null, JSON_PRETTY_PRINT); //Lo codificamos todo
        file_put_contents('listaCompraProductos.json', $json_data); //Guardamos el valor del arreglo json que tenemos en un archivo
        require_once "views/purchaseNew.php";
    }

    public function realizarPresupuesto()
    {
        $productoProveedor = new productoProveedor();
        $productoModel = new ProductoModel();

        $productos = $productoModel->obtenerProductos();
        foreach ($productos as $producto) {
            $mejorPrecio = $productoProveedor->obtenerMejorPrecioDisponible($producto[PROD_ID]); //Obtenemos el mejor precio de la tabla para ese prod
            //Actualizamos los valores nuevos
            if ($mejorPrecio != false) {
                $productoModel = new ProductoModel($producto[PROD_ID], $producto[PROD_NOMBRE], $producto[PROD_CANTIDAD], $mejorPrecio[PRPV_PRECIO], $producto[PROD_CATEGORIA], $mejorPrecio[PRPV_ID_PROV]);
                $productoModel->modificarProducto();
            }
        }
    }

    public function realizarCompraAProveedor()
    {
        $idProducto = $_POST[PROD_ID];
        $cantidadOrden = $_POST[PROD_CANTIDAD];
        $this->realizarPresupuesto();

        $this->productoModel->setIdProducto($idProducto);
        $producto = $this->productoModel->obtenerProducto();
        $this->productoModel = new ProductoModel($producto[PROD_ID], $producto[PROD_NOMBRE], doubleval($producto[PROD_CANTIDAD]) + $cantidadOrden, $producto[PROD_PRECIO], $producto[PROD_CATEGORIA], $producto[PROD_ID_PROV]);
        return $this->productoModel->modificarProducto();
    }

    public function tablaProductos()
    {
        $productoModel = new ProductoModel();
        $tipo = "compra";
        //Si obtenemos el nombre de un producto lo buscamos en la bd
        if (isset($_GET["producto"]) && $_GET["producto"] != null && $_GET["producto"] != false) {
            $productoModel = new ProductoModel(null, $_GET["producto"]);
            $listaProductos = $productoModel->obtenerProductoPorNombre(); //buscamos si hay coincidencias
            require_once "views/tablaProductos.php";
        }

        if (empty($listaProductos)) {
            //En caso que no se presento un producto solo mostramos todos de la lista
            $listaProductos = $productoModel->obtenerProductos();
            require_once "views/tablaProductos.php";
        }

        if (isset($_POST["idProducto"])) {
            //Tomamos los datos de la bd del producto correpsondiente
            $productoModel = new ProductoModel($_POST["idProducto"]);
            $productoSeleccionado = $productoModel->obtenerProducto();
            $productoSeleccionado[PROD_CANTIDAD] = $_POST["cantidad"];
            //Tomamos los datos actuales de nuestro arreglo
            $data_results = file_get_contents(BASE_DIR . 'listaCompraProductos.json');


            //Si el archivo no esta vacio anexamos el producto seleccionado
            if (!empty($data_results) && $data_results != "") {

                //Tomamos el valor del json actual
                $tempArray = json_decode($data_results, true);
                $tempArray[] =  $productoSeleccionado; //Anexamos el producto seleccionado a el json actual
                $json_data = json_encode($tempArray, JSON_PRETTY_PRINT); //Lo codificamos todo
            } else {
                $tempArray[] = $productoSeleccionado; //Convertimos el producto seleccionado en arreglo
                $json_data = json_encode($tempArray, JSON_PRETTY_PRINT); //Lo agregamos al json
            }
            file_put_contents('listaCompraProductos.json', $json_data);
        }
    }

    public function tablaPresupuesto()
    {
        $tipo = "compra";
        //Obtenemos los datos de el json
        $data_results = file_get_contents(BASE_DIR . 'listaCompraProductos.json');

        //Decodificamos estos en una arreglo
        $productos = json_decode($data_results, true);
        if ($productos != null) {
            if (isset($_POST["idEliminar"])) {
                var_dump($productos);
            }

            // Eliminamos los campos repetidos en el arreglo
            $array = array_values(array_unique($productos, SORT_REGULAR));
            $result = json_encode($array, JSON_PRETTY_PRINT); //Codificamos
            file_put_contents('listaCompraProductos.json', $result); //Guardamos el valor del arreglo json que tenemos en un archivo
            require_once "views/tablaPresupuesto.php";
        } else
            echo "<a>No hay datos en la lista de compras</a>";
    }
}
