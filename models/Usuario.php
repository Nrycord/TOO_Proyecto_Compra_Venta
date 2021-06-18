<?php
require_once "database/Database.php";

abstract class Usuario extends Database
{
    private $nombre;
    private $apellido;
    private $usuario;
    private $pass;
    private $tipoUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
}
