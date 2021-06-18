<?php
require_once "database/Database.php";

class EmpleadoModel extends Database
{
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function obtenerEmpleados(){

        //Agregar definicion
    }

    public function modificarEmpleado($idEmpleado){

        //Agregar definicion
    }

    public function obtenerEmpleado($idEmpleado){

        //Agregar definicion
    }
}