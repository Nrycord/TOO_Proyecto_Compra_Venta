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
<main class="align">
    <div class="container">
        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Usuario/register">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                            <h1 class="icon-title">Nuevo Usuario</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Muestra un formulario para agregar un empleado nuevo a la base</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Sucursal/register">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="far fa-plus-square" aria-hidden="true"></i>
                            <h1 class="icon-title">Nueva Sucursal</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Muestra un formulario para agregar una sucursal nueva a la base</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Sucursal/showSucursalAdmin">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="far fa-eye" aria-hidden="true"></i>
                            <h1 class="icon-title">Ver Sucursales</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Muestra un listado con todas las sucursales disponibles actualmente</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>