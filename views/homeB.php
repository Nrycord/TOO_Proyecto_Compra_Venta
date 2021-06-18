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
            <a href="<?= BASE_DIR; ?>Pedido/nuevo">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-print" aria-hidden="true"></i>
                            <h1>Nuevo Pedido</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Agrega un nuevo pedido a la cola para que sea realizado</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="card-full">
            <a href="<?= BASE_DIR; ?>Pedido/showSelectorPedido">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fab fa-buffer" aria-hidden="true"></i>
                            <h1>Pedidos</h1>
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
            <a href="<?= BASE_DIR; ?>Inventario/showInventarioSucursal">
                <div class="face face1">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-box-open" aria-hidden="true"></i>
                            <h1>Inventario</h1>
                        </div>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Revisa los estados de inventario actuales, la disponibilidad y el estado en que se encuentran
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>