<?php
require_once "models/ProductoModel.php";
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

    public function agregarProducto($nombre, $cantidad, $precioUnitario, $categoria, $idProveedor)
    {
        $productoModel = new ProductoModel($nombre, $cantidad, $precioUnitario, $categoria, $idProveedor);
        return $productoModel->agregarProducto();
    }

    public function modificarProducto($idProducto, $nombre, $cantidad, $precioUnitario, $categoria, $idProveedor)
    {
        $productoModel = new ProductoModel($idProducto, $nombre, $cantidad, $precioUnitario, $categoria, $idProveedor);
        return $productoModel->modificarProducto();
    }

    public function eliminarProducto($idProducto)
    {
        $productoModel = new ProductoModel($idProducto);
        return $productoModel->eliminarProducto();
    }
}
