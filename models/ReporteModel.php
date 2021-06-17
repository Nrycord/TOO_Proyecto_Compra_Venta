<?php
require_once "database/Database.php";

class ReporteModel extends Database
{
    private $idReporte;
    private $fechaReporte;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdReporte()
    {
        return $this->idReporte;
    }
 
    public function setIdReporte($idReporte)
    {
        $this->idReporte = $idReporte;

        return $this;
    }

    public function getFechaReporte()
    {
        return $this->fechaReporte;
    }

    public function setFechaReporte($fechaReporte)
    {
        $this->fechaReporte = $fechaReporte;

        return $this;
    }

    public function obtenerReportesVentas(){
        //Agregar definicion
    }

    public function crearReporteVentas(){
        //Agregar definicion
    }

}