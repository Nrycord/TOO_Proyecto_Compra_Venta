<?php
date_default_timezone_set('America/El_Salvador');
require_once "models/ProductoModel.php";
require_once "models/FacturaModel.php";
require_once "controllers/FacturaController.php";

class EmpleadoController
{
    private $productos;

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarFormularioVenta()
    {
        if ($_COOKIE["Rol"] == "Empleado") {
            require_once "models/ClienteModel.php";
            $listaClientes = new ClienteModel();
            require_once "models/ProductoModel.php";
            $productoBD = new ProductoModel();

            if (isset($_POST[C_ID])) {
                $subtotal = 0;
                $listaClientes->setIdCliente(intval($_POST[C_ID]));
                $cliente = $listaClientes->obtenerCliente();
                $json_data = json_encode($cliente, JSON_PRETTY_PRINT); //Lo codificamos todo
                file_put_contents('clienteActual.json', $json_data);
                //Seleccionamos todos los productos
                $data_results = file_get_contents(BASE_DIR . 'listaVentaProductos.json');
                $productos = json_decode($data_results, true);
                //Generar la factura
                $facturaModel = new FacturaModel();
                $facturaModel->setNombreCliente($cliente[C_NOMBRE]);
                $facturaModel->setDuiCliente($cliente[C_DUI]);
                $facturaModel->setDireccionCliente($cliente[C_DIR]);
                $facturaModel->setDetalleFactura($data_results);
                if ($productos != null) {
                    foreach ($productos as $producto) {
                        $productoBD->setIdProducto($producto[PROD_ID]);
                        $prodAux = $productoBD->obtenerProducto();
                        $cantidadActual = $prodAux[PROD_CANTIDAD] - $producto[PROD_CANTIDAD];
                        $productoBD = new ProductoModel($prodAux[PROD_ID], $prodAux[PROD_NOMBRE], $cantidadActual, $prodAux[PROD_PRECIO], $prodAux[PROD_CATEGORIA], $prodAux[PROD_ID_PROV]);
                        $productoBD->modificarProducto();
                        $totalProducto = $producto[PROD_CANTIDAD] * $producto[PROD_PRECIO];
                        $subtotal += $totalProducto;
                        $impuestos = $subtotal * (13 / 100);
                        $total = $subtotal + $impuestos;
                    }
                    $facturaModel->setSubTotal($subtotal);
                    $facturaModel->setIvaRetenido($impuestos);
                    $facturaModel->setTotal($total);
                    if ($cliente[C_TIPO] == "Natural") {
                        $facturaDataCF = $facturaModel->generarFacturaConsumidorFinal();
                        $json_data = json_encode($facturaDataCF, JSON_PRETTY_PRINT); //Lo codificamos todo
                    } elseif ($cliente[C_TIPO] == "Fiscal") {
                        $facturaDataCTF = $facturaModel->generarFacturaCreditoFiscal();
                        $json_data = json_encode($facturaDataCTF, JSON_PRETTY_PRINT); //Lo codificamos todo
                    } else {
                        require_once "views/saleNew.php";
                    }
                    file_put_contents('facturaActual.json', $json_data);
                    $docFactura = new FacturaController();
                    $docFactura->emitirFactura();
                }

                require_once "views/saleNew.php";
            } else {
                $listaClientes = $listaClientes->obtenerClientes(); //Obtenemos la lista de todos los clientes

                $json_data = json_encode(null, JSON_PRETTY_PRINT); //Lo codificamos todo
                file_put_contents('listaVentaProductos.json', $json_data); //Guardamos el valor del arreglo json que tenemos en un archivo
                require_once "views/saleNew.php";
            }
        } else {
            header('Location: ' . BASE_DIR . 'Home/mostrarHomePage');
        }
    }

    public function tablaProductos()
    {
        $productoModel = new ProductoModel();
        $tipo = "venta";
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
        $tipo = "venta";
        //Obtenemos los datos de el json
        $data_results = file_get_contents(BASE_DIR . 'listaVentaProductos.json');

        //Decodificamos estos en una arreglo
        $productos = json_decode($data_results, true);
        if ($productos != null) {
            if (isset($_POST["idEliminar"])) {
                var_dump($productos);
            }
            // Eliminamos los campos repetidos en el arreglo
            $array = array_values(array_unique($productos, SORT_REGULAR));
            $result = json_encode($array, JSON_PRETTY_PRINT); //Codificamos
            file_put_contents('listaVentaProductos.json', $result); //Guardamos el valor del arreglo json que tenemos en un archivo
            require_once "views/tablaPresupuesto.php";
        } else
            echo "<a>No hay datos en la lista de compras</a>";
    }
}
