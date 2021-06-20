<?php

class Home
{
    public function showHomeAdmin() //Metodo para enviar vista de home para administrador
    {
        $homeDir = "homeAdmin.php"; //Definimos el nombre del archivo con la vista admin
        
        return $homeDir; //Devolvemos el nombre del archivo
    }

    public function showHomeEmpleado() //Metodo para enviar vista de home para empleado
    {
        $homeDir = "homeEmployee.php"; //Definimos el nombre del archivo con la vista empleado
        
        return $homeDir; //Devolvemos el nombre del archivo
    }
}