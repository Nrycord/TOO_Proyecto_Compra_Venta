<?php
require_once "models/ClienteModel.php";
class ClientesController
{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarListaClientes()
    {
        $clienteModel = new ClienteModel();
        $clientes = $clienteModel->obtenerClientes();
        require_once "views/clientList.php";
    }

    public function obtenerCliente($idCliente)
    {
        $clienteModel = new ClienteModel($idCliente);
        return $clienteModel->obtenerCliente();
    }

    public function agregarCliente($nombre, $apellido, $direccion, $dui, $telefono, $tipoCliente)
    {
        if (isset($_POST[C_ID])) {
            $clienteModel = new ClienteModel(null, $nombre, $apellido, $direccion, $dui, $telefono, $tipoCliente);
        } else {
            require_once "views/clientNew.php";
        }
    }

    public function modificarCliente($idCliente, $nombre, $apellido, $direccion, $dui, $telefono, $tipoCliente)
    {
        $clienteModel = new ClienteModel($idCliente, $nombre, $apellido, $direccion, $dui, $telefono, $tipoCliente);
        return $clienteModel->modificarCliente();
    }

    public function eliminarCliente($idCliente)
    {
        $clienteModel = new ClienteModel($idCliente);
        return $clienteModel->eliminarCliente();
    }
}
