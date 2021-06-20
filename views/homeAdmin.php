<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>
<main class="container">
    <div class="m-0 pt-5 vh-100 row justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="container m-0 p-0">
                <div class="row d-flex justify-content-start my-3">
                    <img src="<?= BASE_DIR; ?>/assets/img/logo-lg.png" class="img-fluid" alt="logo-lg">
                </div>
                <div class="row d-flex text-left">
                    <h1>Bienvenido <span class="badge badge-primary"><?= $_SESSION[U_NOMBRE] ?> <?= $_SESSION[U_APELLIDO] ?></span></h1>
                    <h4 class="my-1">Puedes acceder a las distintas opciones en el menú lateral</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="#">
                                <div class="ssb-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Realizar Compra</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="<?= BASE_DIR; ?>Clientes/mostrarListaClientes">
                                <div class="ssb-icon"> <i class="fas fa-users-cog" aria-hidden="true"></i> </div>
                                <h2 class="ssb-title"><strong>Gestionar Clientes</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="<?= BASE_DIR; ?>Proveedor/mostrarListaProveedores">
                                <div class="ssb-icon"><i class="fas fa-truck-monster" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Gestionar Proveedores</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="<?= BASE_DIR; ?>Productos/mostrarListaProductos">
                                <div class="ssb-icon"><i class="fas fa-boxes" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Gestionar Productos</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="#">
                                <div class="ssb-icon"><i class="fas fa-file-invoice" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Consultar Reportes</strong></h2>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="square-service-block shadow">
                            <a href="#">
                                <div class="ssb-icon"><i class="fas fa-receipt" aria-hidden="true"></i></div>
                                <h2 class="ssb-title"><strong>Consultar Facturas</strong></h2>
                            </a>
                        </div>
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