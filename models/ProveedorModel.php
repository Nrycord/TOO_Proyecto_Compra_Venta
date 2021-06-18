<?php
require_once "database/Database.php";

class ProveedorModel extends Database
{
    private $idProveedor;
    private $nombre;
    private $telefono;
    private $direccion;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
 
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
 
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function obtenerProveedores(){
        //Agregar definicion
    }

    public function agregarProveedor(){
        //Agregar definicion
    }

    public function modificarProveedor(){
        //Agregar definicion
    }

    public function eliminarProveedor(){
        //Agregar definicion
    }

    public function obtenerProveedor($idProveedor){
        //Agregar definicion
    }
}