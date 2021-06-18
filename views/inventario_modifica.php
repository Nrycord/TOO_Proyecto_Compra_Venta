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
        <div class="thumbnail"><img src="<?= BASE_DIR; ?>assets/img/product.svg" /></div>
        <h2> Editar Producto </h2>

        <form id="nuevo" name="nuevo" method="POST" action="<?= BASE_DIR; ?>Inventario/actualizar" autocomplete="off">
            <input type="hidden" id="id" name="<?= I_ID ?>" value="<?= $data[I_ID]; ?>">
            <label for="">Sucursal</label>
            <input type="text" name="<?= I_ID_SUCURSAL ?>" id="<?= I_ID_SUCURSAL ?>" value="<?= $data[TBL_INVENTARIO][I_ID_SUCURSAL]; ?>" placeholder="Ingresar Sucursal" required readonly><br>
            <label for="">ID Producto</label>   
            <input type="text" name="<?= I_ID_PRODUCTO ?>" id="<?= I_ID_PRODUCTO ?>" value="<?= $data[TBL_INVENTARIO][I_ID_PRODUCTO]; ?>" placeholder="Ingresar Producto" required readonly><br>
            <label for="">Cantidad</label>
            <input type="text" name="<?= I_STOCK ?>" id="<?= I_STOCK ?>" value="<?= $data[TBL_INVENTARIO][I_STOCK]; ?>" placeholder="Ingresar stock" required><br>
            <button id="guardar" name="guardar" type="submit">Guardar</button>
        </form>
    </div>
</main>
