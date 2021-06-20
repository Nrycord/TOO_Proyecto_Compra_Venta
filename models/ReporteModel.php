<?php
require_once "database/Database.php";
require_once "models/FacturaModel.php";

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
        $facturas = new FacturaModel();

        $facturasCF = $facturas->obtenerFacturasConsumidorFinal();
        $facturasCTF = $facturas->obtenerFacturasCreditoFiscal();

        $json_data = json_encode(array_merge($facturasCF,$facturasCTF), JSON_PRETTY_PRINT); //Lo codificamos todo
        file_put_contents('reportesVentas.json', $json_data);
    }

    public function crearReporteVentas(){
        //Agregar definicion
    }

}