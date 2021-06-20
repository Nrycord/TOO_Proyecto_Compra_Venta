<?php
require_once "models/ReporteModel.php";

class ReporteController{

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function realizarReporte(){

        //Agregar definicion
    }

    public function filtrarReportesPorProducto(){
        
        //Agregar definicion
    }

    public function filtrarReportesPorCliente(){
        
        //Agregar definicion
    }

    public function mostrarReporte(){
        $reporte = new ReporteModel();
        $reporte->obtenerReportesVentas();

        $facturas = file_get_contents('http://localhost/TOO_Proyecto_Compra_Venta/reportesVentas.json');
        $reporteFacturas = json_decode($facturas, true);
        require_once "views/reportes.php";
    }
    
}