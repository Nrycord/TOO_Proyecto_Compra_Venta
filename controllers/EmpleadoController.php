<?php
date_default_timezone_set('America/El_Salvador');
require_once "models/ProductoModel.php";
require_once "models/FacturaModel.php";

class EmpleadoController
{
    private $productos;

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function autenticarEmpleado()
    {

        //Agregar definicion
    }

    public function realizarVenta($listaProductos)
    {
        $this->productos = $listaProductos;
        $this->registrarVenta();

        $facturaModel = new FacturaModel();
        $productosJson = json_encode($this->productos);
        //return $facturaModel->generarFactura($_POST['fechaFacturacion'], $productosJson, $_POST["tipoFactura"]);
        /* FALTA IMPLEMENTAR METODO CORRECTAMENTE CON AMBOS TIPO DE FACTURA */
    }

    public function registrarVenta()
    {
        foreach ($this->productos as $producto) {
            $productoModel = new ProductoModel($producto[PROD_ID], $producto[PROD_NOMBRE], $producto[PROD_CANTIDAD], $producto[PROD_PRECIO], $producto[PROD_CATEGORIA], $producto[PROD_ID_PROV]);
            $productoModel->modificarProducto();
        }
        //Agregar definicion
    }

    public function mostrarFormularioVenta()
    {
        if ($_COOKIE["Rol"] == "Empleado") {
            require_once "models/ClienteModel.php";
            $listaClientes = new ClienteModel();

            if (isset($_POST[C_ID])) {
                $subtotal = 0;
                $listaClientes->setIdCliente(intval($_POST[C_ID]));
                $cliente = $listaClientes->obtenerCliente();
                //Seleccionamos todos los productos
                $data_results = file_get_contents(BASE_DIR . 'listaVentaProductos.json');
                $productos = json_decode($data_results, true);
                //Generar la factura
                $facturaModel = new FacturaModel();
                $facturaModel->setNombreCliente($cliente[C_NOMBRE]);
                $facturaModel->setDuiCliente($cliente[C_DUI]);
                $facturaModel->setDireccionCliente($cliente[C_DIR]);
                $facturaModel->setDetalleFactura($data_results);
                foreach ($productos as $producto) {
                    $totalProducto = $producto["cantidad"] * $producto["precioUnitario"];
                    $subtotal += $totalProducto;
                    $impuestos = $subtotal * (13 / 100);
                    $total = $subtotal + $impuestos;
                }
                $facturaModel->setSubTotal($subtotal);
                $facturaModel->setIvaRetenido($impuestos);
                $facturaModel->setTotal($total);
                if($cliente[C_TIPO] == "Natural"){
                    $facturaModel->generarFacturaConsumidorFinal();
                }elseif($cliente[C_TIPO] == "Fiscal"){
                    $facturaModel->generarFacturaCreditoFiscal();
                }
            } else {
                $listaClientes = $listaClientes->obtenerClientes(); //Obtenemos la lista de todos los clientes
                //$employee->showSale();
                $json_data = json_encode(null, JSON_PRETTY_PRINT); //Lo codificamos todo
                file_put_contents('listaVentaProductos.json', $json_data); //Guardamos el valor del arreglo json que tenemos en un archivo
                require_once "views/saleNew.php";
            }
        } else {
            header('Location: ' . BASE_DIR . 'Login/login');
        }
    }

    public function tablaProductos()
    {
        $productoModel = new ProductoModel();

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
            $data_results = file_get_contents(BASE_DIR . 'listaVentaProductos.json');

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
            file_put_contents('listaVentaProductos.json', $json_data); //Guardamos el valor del arreglo json que tenemos en un archivo
        }
    }

    public function tablaPresupuesto()
    {
        //Obtenemos los datos de el json
        $data_results = file_get_contents(BASE_DIR . 'listaVentaProductos.json');
        //Decodificamos estos en una arreglo
        $productos = json_decode($data_results, true);
        if ($productos != null) {
            if (isset($_POST["idProducto"])) {
            }
            // Only keep unique values, by using array_unique with SORT_REGULAR as flag.
            // We're using array_values here, to only retrieve the values and not the keys.
            // Eliminamos los campos repetidos en el arreglo
            $array = array_values(array_unique($productos, SORT_REGULAR));
            $result = json_encode($array, JSON_PRETTY_PRINT); //Codificamos
            file_put_contents('listaVentaProductos.json', $result); //Guardamos el valor del arreglo json que tenemos en un archivo
            require_once "views/tablaPresupuesto.php";
        } else
            echo "<a>No hay datos en la lista de compras</a>";
    }
}
