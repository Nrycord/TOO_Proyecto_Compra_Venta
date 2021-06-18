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
            <div class="thumbnail"><img src="../assets/img/add.svg" /></div>
            <h2>Nuevo Pedido</h2>

            <form class="login-form" method="POST" action="<?= BASE_DIR; ?>Pedido/guardar" autocomplete="off">
                <input name="<?= P_ASUNTO ?>" type="text" placeholder="Asunto" />
                <input name="<?= P_DESCRIPCION ?>" type="text" placeholder="Descripción" />
                <select name="<?= P_ID_DESTINO ?>">
                    <option selected disabled>Seleccione Sucursal</option>
                    <?php foreach ($data[TBL_SUCURSAL] as $dato) {
                        echo "<option value = " . $dato[S_ID] . ">" . $dato[S_NOMBRE_SUCURSAL] . "</option>";
                    } ?>
                </select>
                <select name="<?= P_URGENCIA ?>" id="">
                    <option selected disabled>Nivel de Urgencia</option>
                    <option value="Bajo">Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Alto">Alto</option>
                </select>
                <button>Agregar Pedido</button>
            </form>
        </div>
    </main>

</div>