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
            <a href="<?= BASE_DIR; ?>Sucursal/showSelectorAdmin">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-store-alt" aria-hidden="true"></i>
                            <h1 class="icon-title">Administrar Sucursales</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra las sucursales disponibles, agrega o elimina algunas de ellas</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Pedido/showPedidoAdmin">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fab fa-buffer" aria-hidden="true"></i>
                            <h1 class="icon-title">Administrar Pedidos</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra los pedidos que tengas, modifica sus características y revisa el estado en el que
                            se
                            encuentran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Inventario/showInventarioAdmin">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-box-open" aria-hidden="true"></i>
                            <h1 class="icon-title">Administrar Inventarios</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra los estados de inventario actuales, la disponibilidad y el estado en que se encuentran según las sucursales
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>