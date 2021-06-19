<?php
session_start();
class HomeController
{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function mostrarHomePage()
    {
        require_once "models/Home.php";
        $home = new Home();

        if ($_COOKIE["Rol"] == "Empleado") {

            $home->showHomeEmpleado();
            require_once "views/homeEmployee.php";
        } else if ($_COOKIE["Rol"] == "Administrador") {

            $home->showHomeAdmin();
            require_once "views/homeAdmin.php";
        }
    }
}
