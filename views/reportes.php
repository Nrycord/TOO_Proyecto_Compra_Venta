<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>
<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productTable.css">
</head>

<body>
    <main class="m-0 px-3 vh-100 row justify-content-center align-items-center">
        <div class="content">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-auto">
                        <h1 class="table-header">Reportes</h1>
                    </div>
                </div>
                <div class="table-responsive custom-table-responsive" style="max-height: 55vh">
                    <table class="table table-hover custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha Venta</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Dui Cliente</th>
                                <th scope="col">Direcccion Cliente</th>
                                <th scope="col">Monto Cancelado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reporteFacturas as $reporte) {
                                echo "<tr scope='row'>";
                                echo "<td>" . $reporte["fechaFacturacion"] . "</td>";
                                echo "<td>" . $reporte["nombreCliente"] . "</td>";
                                echo "<td>" . $reporte["duiCliente"] . "</td>";
                                echo "<td>" . $reporte["direccionCliente"] . "</td>";
                                echo "<td>" . $reporte["total"] . "</td>";
                                echo "</tr>";
                                echo '<tr class="spacer"><td colspan="100"></td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="<?= BASE_DIR; ?>">
                                <div class="ssb-icon"><i class="fas fa-business-time" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Filtrar por tipo de Producto</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="<?= BASE_DIR; ?>">
                                <div class="ssb-icon"> <i class="fas fa-user-clock" aria-hidden="true"></i> </div>
                                <h2 class="ssb-title"><strong>Filtrar por tipo de Cliente</strong></h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
//seteamos el header de la pagina
BaseLayout::renderFoot();
?>