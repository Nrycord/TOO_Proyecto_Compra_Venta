<?php
require_once "database/Database.php";

class productoProveedor extends Database
{
    private $id;
    private $idProducto;
    private $idProveedor;
    private $precioCompra;
    

    public function __construct()
    {
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
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
 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    public function obtenerMejorPrecioDisponible($idProducto){

        //Agregar definicion
    }

    public function agregarPrecioDeProveedorNuevo($idProducto, $idProveedor, $precioCompra){

        //Agregar definicion
    }

}