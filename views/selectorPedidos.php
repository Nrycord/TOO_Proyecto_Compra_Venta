<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>
<main class="align">
    <div class="container">
        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Pedido/showPedidoSucursalEntrante">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <h1>Otras Sucursales</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra los pedidos que se han realizado desde otras sucursales</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Pedido/showPedidoSucursalSaliente">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-store" aria-hidden="true"></i>
                            <h1>Mis Pedidos</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra los pedidos que se han realizado en la sucursal actual</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Pedido/showPedidoSucursalHistorial">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-history" aria-hidden="true"></i>
                            <h1>Historial</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Administra el historial de todos los pedidos que se han realizado
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>