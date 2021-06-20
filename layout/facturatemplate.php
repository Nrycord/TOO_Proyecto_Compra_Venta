<?php
$clienteActual = file_get_contents('http://localhost/TOO_Proyecto_Compra_Venta/clienteActual.json');
$client = json_decode($clienteActual, true);
$facturaActual = file_get_contents('http://localhost/TOO_Proyecto_Compra_Venta/listaVentaProductos.json');
$productos = json_decode($facturaActual, true);
$idFactura = 1;
$fecha = date("d-m-Y");

if($client["tipoCliente"] == "Natural"){
    $tipoFactura = "Factura Consumidor Final";
}elseif($client["tipoCliente"] == "Fiscal"){
    $tipoFactura = "Factura Credito Fiscal";
}
$cliente = $client["nombre"];
$dui = $client["dui"];
$direccion = $client["direccion"];

$mensajePie = "Gracias por su compra";
$porcentajeImpuestos = 13;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Factura</title>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center m-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 50%" scope="col"><img class="rounded float-start" src="https://www.muebleselartesano.com/image/cache/catalog/images/logo-muebles-el-artesano-330x100.png" alt="Logotipo"></th>
                    <th style="width: 50%" scope="col">
                        <strong>Fecha</strong>
                        <br>
                        <?php echo $fecha ?>
                        <br>
                        <strong><?php echo $tipoFactura ?> No.</strong>
                        <br>
                        <?php echo $idFactura ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Cliente</th>
                    <td><strong><?php echo $cliente ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">DUI</th>
                    <td><strong><?php echo $dui ?></strong></td>
                </tr>
                <tr>
                    <th scope="row">Dirección</th>
                    <td><strong><?php echo $direccion ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row justify-content-center m-0">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $subtotal = 0;
                foreach ($productos as $producto) {
                    $totalProducto = $producto["cantidad"] * $producto["precioUnitario"];
                    $subtotal += $totalProducto;
                    ?>
                    <tr>
                        <td><?php echo $producto["nombre"] ?></td>
                        <td><?php echo number_format($producto["cantidad"], 2) ?></td>
                        <td>$<?php echo number_format($producto["precioUnitario"], 2) ?></td>
                        <td>$<?php echo number_format($totalProducto, 2) ?></td>
                    </tr>
                <?php }
                $impuestos = $subtotal * ($porcentajeImpuestos / 100);
                $total = $subtotal + $impuestos;
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Subtotal</td>
                    <td>$<?php echo number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Impuestos (IVA Retenido)</td>
                    <td>$<?php echo number_format($impuestos, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">
                        <h4>Total</h4></td>
                    <td>
                        <h4>$<?php echo number_format($total, 2) ?></h4>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row justify-content-center m-0">
        <div class="col-xs-12 text-center">
            <p class="h5"><?php echo $mensajePie ?></p>
        </div>
    </div>
</div>
</body>
</html>