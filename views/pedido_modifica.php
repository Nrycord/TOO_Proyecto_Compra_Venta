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
        <h2> Editar <?php echo $data["titulo"]; ?> </h2>

        <form id="nuevo" name="nuevo" method="POST" action="<?= BASE_DIR; ?>Pedido/actualizar" autocomplete="off">
            <input type="hidden" id="id" name="<?= P_ID ?>" value="<?= $data[P_ID]; ?>">
            <input type="hidden" name="<?= P_ID_SUCURSAL ?>" id="<?= P_ID_SUCURSAL ?>" value="<?= $data[TBL_PEDIDOS][P_ID_SUCURSAL]; ?>" placeholder="Ingresar Sucursal"><br>
            <input type="hidden" name="<?= P_ID_DESTINO ?>" id="<?= P_ID_DESTINO ?>" value="<?= $data[TBL_PEDIDOS][P_ID_DESTINO]; ?>" placeholder="Ingresar Destino"><br>
            <input type="text" name="<?= P_ASUNTO ?>" id="<?= P_ASUNTO ?>" value="<?= $data[TBL_PEDIDOS][P_ASUNTO]; ?>" placeholder="Ingresar asunto"><br>
            <input type="text" name="<?= P_DESCRIPCION ?>" id="<?= P_DESCRIPCION ?>" value="<?= $data[TBL_PEDIDOS][P_DESCRIPCION]; ?>" placeholder="Ingresar descripcion"><br>
            <input type="text" name="<?= P_URGENCIA ?>" id="<?= P_URGENCIA ?>" value="<?= $data[TBL_PEDIDOS][P_URGENCIA]; ?>" placeholder="Ingresar nvl urgencia"><br>
            <select name="<?= P_ESTADO ?>" id="">
                <option selected disabled>Cambiar estado de pedido</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Realizado">Realizado</option>
            </select>
            <button id="guardar" name="guardar" type="submit">Guardar</button>
        </form>
    </div>
</main>