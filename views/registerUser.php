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
            <div class="thumbnail"><img src="../assets/img/user.svg" /></div>
            <h2>Nuevo Usuario</h2>
            <form class="login-form" method="POST" action="<?= BASE_DIR; ?>Usuario/save" autocomplete="off">
                <input name="<?= U_USUARIO ?>" type="text" placeholder="Nombre de Usuario" />
                <input name="<?= U_PASSWORD ?>" type="text" placeholder="Contraseña" />
                <select name="<?= U_ID_SUCURSAL ?>">
                    <option selected disabled>Seleccione Sucursal</option>
                    <?php foreach ($data[TBL_SUCURSAL] as $dato) {
                        echo "<option value = " . $dato[S_ID] . ">" . $dato[S_NOMBRE_SUCURSAL] . "</option>";
                    } ?>
                </select>
                <button>Agregar Usuario</button>
            </form>
        </div>
    </main>

</div>