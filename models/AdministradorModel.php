<?php
require_once "database/Database.php";

class AdministradorModel extends Database
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
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function obtenerAdministrador($user, $pass){
        
        //Agregar Definicion
    }
}