<?php

class EmpleadoController
{

    private $empleado;
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
            require_once "models/ProductoModel.php";
            $listaClientes = new ClienteModel();
            $listaClientes = $listaClientes->obtenerClientes();
            $listaProductos = new ProductoModel();
            $listaProductos = $listaProductos->obtenerProductos();

            //$employee->showSale();
            require_once "views/saleNew.php";
        } else {
            header('Location: ' . BASE_DIR . 'Login/login');
        }
    }
}
