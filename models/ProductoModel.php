<?php
require_once "database/Database.php";

class ProductoModel extends Database
{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioUnitario;
    private $categoria;
    private $idProveedor;

    public function __construct()
    {
        parent::__construct();
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

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

    public function obtenerProductos(){
        //Agregar definicion
    }

    public function agregarProducto(){
        //Agregar definicion
    }

    public function modificarProducto(){
        //Agregar definicion
    }

    public function eliminarProducto(){
        //Agregar definicion
    }

    public function obtenerProducto($idProducto){
        //Agregar definicion
    }
}