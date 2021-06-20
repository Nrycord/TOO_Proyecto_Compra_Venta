<?php
include_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;
use Dompdf\Options;

class FacturaController{

    //private $factura = new FacturaModel();

    public function __construct()
    {
        //Aqui requerimos el modelo
    }

    public function emitirFactura(){
        
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        ob_start();
        include "layout/facturatemplate.php";
        $html = ob_get_clean();
        $dompdf->loadHtml($html);
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=factura.pdf");
        echo $dompdf->output();
        
        //$contenido = $dompdf->output();
        //$nombreDelDocumento = '..\TOO_Proyecto_Compra_Venta\facturas\factura2.pdf';
        //$bytes = file_put_contents($nombreDelDocumento, $contenido);
    }

    public function anularFactura($idFactura){
        
        //Agregar definicion
    }

    public function buscarFactura($idFactura){
        
        //Agregar definicion
    }
    
}