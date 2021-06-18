<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();
?>
<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/form.css">
</head>

<div class="align">
    <main>
        <div class="form">
            <div class="thumbnail"><img src="../assets/img/new.svg" /></div>
            <h2>Nueva Sucursal</h2>

            <form class="login-form" method="POST" action="<?= BASE_DIR; ?>Sucursal/save" autocomplete="off">
                <input name="<?= S_NOMBRE_SUCURSAL ?>" type="text" placeholder="Nombre de Sucursal" />
                <input name="<?= S_DIRECCION ?>" type="text" placeholder="Dirección" />
                <input name="<?= S_NUM_EMPLEADOS ?>" type="text" placeholder="Número de empleados" />
                <button>Agregar Sucursal</button>
            </form>
        </div>
    </main>

</div>