<?php

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

        if($_COOKIE["Rol"] == "Empleado"){
            
            $showHomeEmpleado = $home->showHomeEmpleado();
            require_once "views/homeEmployee.php";

        }else if($_COOKIE["Rol"] == "Administrador"){
            
            $showHomeAdmin = $home->showHomeAdmin();
            require_once "views/homeAdmin.php";
        }
        
    }
}
