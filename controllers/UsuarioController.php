<?php

class UsuarioController
{
    public function index()
    {
        echo "Controlador de Usuario, accion index";
    }

    public function register()
    {
        $data[TBL_SUCURSAL] = $this->obtenerSucursales();
        require_once "views/registerUser.php";
    }

    public function save()
    { //Realiza el proceso para registrar un nuevo usuario
        require_once "models/Usuario.php";

        $usuario = new Usuario(); //Toma todos los datos del post
        $usuario->setUsuario($_POST[U_USUARIO]);
        $usuario->setPass($_POST[U_PASSWORD]);
        $usuario->setId_sucursal($_POST[U_ID_SUCURSAL]);
        $usuario->setRol("Empleado");
        $usuario->save(); //Realizamos el guardado en la base de datos
    }

    public function getAll()
    { //Obtiene el listado de todos los usuarios
        require_once "models/Usuario.php";

        $usuario = new Usuario();

        if ($users = $usuario->getAll()) {
            foreach ($users as $user) {
                echo $user[U_ID] . "\n";
                echo $user[U_USUARIO] . "\n<br>";
            }
        } else {
            echo "<h1>Error! No se pudo cargar los usuarios</h1>";
        }
    }

    public function obtenerSucursales()
    {
        require_once "models/Sucursal.php";
        $s = new Sucursal();
        $s->getSucursales();
        $json = file_get_contents(BASE_DIR . 'Sucursales.json');
        $data[TBL_SUCURSAL] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_SUCURSAL] = $json;
        }
        return $data[TBL_SUCURSAL];
    }
}
