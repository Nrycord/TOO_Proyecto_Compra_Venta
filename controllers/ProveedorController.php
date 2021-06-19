<?php

class ProveedorController
{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarListaProveedores()
    {
        $proveedorModel = new ProveedorModel();
        return $proveedorModel->obtenerProveedores();
    }

    public function obtenerProveedor($idProveedor)
    {
        $proveedorModel = new ProveedorModel($idProveedor);
        return $proveedorModel->obtenerProveedor();
    }

    public function agregarProveedor($nombre, $telefono, $direccion)
    {
        $proveedorModel = new ProveedorModel($nombre, $telefono, $direccion);
        return $proveedorModel->agregarProveedor();
    }

    public function modificarProveedor($idProveedor, $nombre, $telefono, $direccion)
    {
        $proveedorModel = new ProveedorModel($idProveedor, $nombre, $telefono, $direccion);
        return $proveedorModel->modificarProveedor();
    }

    public function eliminarProveedor($idProveedor)
    {
        $proveedorModel = new ProveedorModel($idProveedor);
        return $proveedorModel->eliminarProveedor();
    }
}
