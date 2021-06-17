<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

class HomeController
{
    public function showHome()
    {
        require_once "models/Home.php";
        $home = new Home();

        if($_COOKIE["Rol"] == "Empleado"){
            
            $showHomeEmpleado = $home->showHomeEmpleado();
            require_once "views/homeB.php";

        }else if($_COOKIE["Rol"] == "Administrador"){
            
            $showHomeAdmin = $home->showHomeAdmin();
            require_once "views/homeA.php";
        }
        
    }
}