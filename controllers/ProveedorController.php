<?php
require_once "models/ProveedorModel.php";
class ProveedorController
{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarListaProveedores()
    {
        $proveedorModel = new ProveedorModel();
        $proveedores = $proveedorModel->obtenerProveedores();
        require_once "views/supplierList.php";
    }

    public function obtenerProveedor($idProveedor)
    {
        $proveedorModel = new ProveedorModel($idProveedor);
        return $proveedorModel->obtenerProveedor();
    }

    public function agregarProveedor()
    {
        if (isset($_POST[PROV_NOMBRE])) {
            $proveedorModel = new ProveedorModel(null, $_POST[PROV_NOMBRE], $_POST[PROV_TEL], $_POST[PROV_DIR]);
            $proveedorModel->agregarProveedor();
            header('Location: ' . BASE_DIR . 'Home/mostrarHomePage'); //Redirigimos a Home
        } else {
            require_once "views/supplierNew.php";
        }
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
