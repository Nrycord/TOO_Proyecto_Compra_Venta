<?php
$idFacturaActual = file_get_contents('http://localhost/TOO_Proyecto_Compra_Venta/facturaActual.json');
$idFact = json_decode($idFacturaActual, true);
$clienteActual = file_get_contents('http://localhost/TOO_Proyecto_Compra_Venta/clienteActual.json');
$client = json_decode($clienteActual, true);

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
        header("Content-Disposition: inline; filename=factura".$idFact["idFactura"].".pdf");
        $contenido = $dompdf->output();

        if($client["tipoCliente"] == "Natural"){
            $nombreDelDocumento = '..\TOO_Proyecto_Compra_Venta\facturas\consumidorFinal\factura'.$idFact["idFactura"].'.pdf';
            $bytes = file_put_contents($nombreDelDocumento, $contenido);
        }elseif($client["tipoCliente"] == "Fiscal"){
            $nombreDelDocumento = '..\TOO_Proyecto_Compra_Venta\facturas\creditoFiscal\factura'.$idFact["idFactura"].'.pdf';
            $bytes = file_put_contents($nombreDelDocumento, $contenido);
        }

        //Mandamos a que se descargue el doc
        echo $contenido;
    }

    public function anularFactura($idFactura){
        
        //Agregar definicion
    }

    public function buscarFactura($idFactura){
        
        //Agregar definicion
    }
    
}