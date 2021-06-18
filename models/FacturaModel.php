<?php
require_once "database/Database.php";

class FacturaModel extends Database
{
    private $idFactura;
    private $fechaFacturacion;
    private $detalleFactura;
    private $subTotal;
    private $total;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getIdFactura()
    {
        return $this->idFactura;
    }

    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    public function getFechaFacturacion()
    {
        return $this->fechaFacturacion;
    }

    public function setFechaFacturacion($fechaFacturacion)
    {
        $this->fechaFacturacion = $fechaFacturacion;

        return $this;
    }

    public function getDetalleFactura()
    {
        return $this->detalleFactura;
    }

    public function setDetalleFactura($detalleFactura)
    {
        $this->detalleFactura = $detalleFactura;

        return $this;
    }
 
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }
 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function obtenerFacturas(){
        //Agregar definicion
    }

    public function generarFactura($fechaFacturacion, $detalleFactura, $tipo){
        //Agregar definicion
    }

    public function anularFactura($idFactura){
        //Agregar definicion
    }
}