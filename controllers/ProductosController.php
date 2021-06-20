<?php
require_once "models/ProductoModel.php";
require_once "models/ProveedorModel.php";
class ProductosController
{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarListaProductos()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->obtenerProductos();
        require_once "views/productList.php";
    }

    public function obtenerProducto($idProducto)
    {
        $productoModel = new ProductoModel($idProducto);
        return $productoModel->obtenerProducto();
    }

    public function agregarProducto()
    {
        if (isset($_POST[PROD_NOMBRE])) {
            $productoModel = new ProductoModel(null, $_POST[PROD_NOMBRE], $_POST[PROD_CANTIDAD], $_POST[PROD_PRECIO], $_POST[PROD_CATEGORIA], $_POST[PROD_ID_PROV]);
            $productoModel->agregarProducto();
            header('Location: ' . BASE_DIR . 'Home/mostrarHomePage'); //Redirigimos a Home
        } else {
            $proveedorModel = new ProveedorModel();
            $proveedores = $proveedorModel->obtenerProveedores();
            require_once "views/productNew.php";
        }
    }

    public function modificarProducto()
    {
        $productoModel = new ProductoModel($_POST[PROD_ID], $_POST[PROD_NOMBRE], $_POST[PROD_CANTIDAD], $_POST[PROD_PRECIO], $_POST[PROD_CATEGORIA], $_POST[PROD_ID_PROV]);
        return $productoModel->modificarProducto();
    }

    public function eliminarProducto()
    {
        $productoModel = new ProductoModel($_POST[PROD_ID]);
        return $productoModel->eliminarProducto();
    }
}
