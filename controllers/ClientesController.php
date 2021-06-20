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

    public function agregarCliente()
    {
        if (isset($_POST[C_NOMBRE])) {
            $clienteModel = new ClienteModel(null, $_POST[C_NOMBRE], $_POST[C_APELLIDO], $_POST[C_DIR], $_POST[C_DUI], $_POST[C_TEL], $_POST[C_TIPO]);
            $cliente = $clienteModel->agregarCliente();
            header('Location: ' . BASE_DIR . 'Home/mostrarHomePage'); //Redirigimos a Home
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
