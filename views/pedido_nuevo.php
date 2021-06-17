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

<main class="allbutrender">
    <div class="form">
        <h2> Ingresar <?php echo $data["titulo"]; ?> </h2>
        <form id="nuevo" name="nuevo" method="POST" action="<?= BASE_DIR; ?>Pedido/guardar" autocomplete="off">
            <input type="text" name="<?= P_ID_SUCURSAL ?>" id="<?= P_ID_SUCURSAL ?>" placeholder="Ingresar Sucursal" required><br>
            <input type="text" name="<?= P_ID_DESTINO ?>" id="<?= P_ID_DESTINO ?>" placeholder="Ingresar Destino" required><br>
            <input type="text" name="<?= P_ASUNTO ?>" id="<?= P_ASUNTO ?>" placeholder="Ingresar asunto" required><br>
            <input type="text" name="<?= P_DESCRIPCION ?>" id="<?= P_DESCRIPCION ?>" placeholder="Ingresar descripcion" required><br>
            <input type="text" name="<?= P_URGENCIA ?>" id="<?= P_URGENCIA ?>" placeholder="Ingresar nvl urgencia"><br>
            <input type="text" name="<?= P_ESTADO ?>" id="<?= P_ESTADO ?>" placeholder="Ingresar estado"><br>
            <button id="guardar" name="guardar" type="submit">Guardar</button>
        </form>
    </div>
</main>
