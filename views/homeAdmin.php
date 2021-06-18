<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

$json = file_get_contents(BASE_DIR . 'UsuarioActual.json');
$UsuarioActual = "";
if ($json != null) {
    $json = json_decode($json, true);
    $UsuarioActual = $json;
}

?>
<main class="container">
    <div class="row m-0 vh-100 px-3 py-5 row justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="square-service-block shadow">
                <a href="#">
                    <div class="ssb-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                    <h2 class="ssb-title"><strong>Clientes</strong></h2>
                </a>
            </div>
        </div>

        <div class="col-md-5">
            <div class="square-service-block shadow">
                <a href="#">
                    <div class="ssb-icon"> <i class="fas fa-truck" aria-hidden="true"></i> </div>
                    <h2 class="ssb-title"><strong>Proveedores</strong></h2>
                </a>
            </div>
        </div>

        <div class="col-md-5">
            <div class="square-service-block shadow">
                <a href="#">
                    <div class="ssb-icon"><i class="fas fa-archive" aria-hidden="true"></i></div>
                    <h2 class="ssb-title"><strong>Productos</strong></h2>
                </a>
            </div>
        </div>

        <div class="col-md-5">
            <div class="square-service-block shadow">
                <a href="#">
                    <div class="ssb-icon"><i class="fas fa-file-medical-alt" aria-hidden="true"></i></div>
                    <h2 class="ssb-title"><strong>Reportes</strong></h2>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
//seteamos el header de la pagina
BaseLayout::renderFoot();
?>