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

<body>

    <main class="m-0 px-3 vh-100 row justify-content-center align-items-center">
        <!-- Form-->
        <div class="form col-auto">
            <div class="form-panel one">
                <div class="form-header">
                    <h1>Nuevo Cliente</h1>
                </div>
                <div class="form-content">
                    <form action="<?= BASE_DIR; ?>Clientes/agregarCliente" method="POST">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="<?= C_NOMBRE ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" name="<?= C_APELLIDO ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <textarea name="<?= C_DIR ?>" id="" cols="10" rows="2" required>

                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">DUI</label>
                            <input type="text" id="dui" name="<?= C_DUI ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="text" id="telefono" name="<?= C_TEL ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Tipo</label>
                            <select type="text" name="<?= C_TIPO ?>" required>
                                <?php
                                echo "<option value = 'Fiscal'>Natural</option>";
                                echo "<option value = 'Natural'>Fiscal</option>";
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit">Agregar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>

    <?php
    //seteamos el header de la pagina
    BaseLayout::renderFoot();
    ?>