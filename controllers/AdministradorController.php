<?php

class AdministradorController
{
    private $productoModel = new ProductoModel();
    private $productoProveedor = new productoProveedor();
    private $proveedorModel = new ProveedorModel();
    private $administradorModel = new AdministradorModel();

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function realizarPresupuesto()
    {
        $productos = $this->productoModel->obtenerProductos();

        foreach ($productos as $producto) {
            $mejorPrecio = $this->productoProveedor->obtenerMejorPrecioDisponible($producto[PROD_ID]); //Obtenemos el mejor precio de la tabla para ese prod
            //Actualizamos los valores nuevos
            $this->productoModel = new ProductoModel($producto[PROD_ID], $producto[PROD_NOMBRE], 100, $mejorPrecio[PRPV_PRECIO], $producto[PROD_CATEGORIA], $mejorPrecio[PRPV_ID_PROV]);
            $this->productoModel->modificarProducto();
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
}
