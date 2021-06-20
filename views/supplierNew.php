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
                <h1>Nuevo Proveedor</h1>
            </div>
            <div class="form-content">
                <form action="<?= BASE_DIR; ?>Login/login" method="POST">
                    <div class="form-group">
                        <label for="">Proveedor</label>
                        <input type="text" name="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="" id="telefono" name="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <textarea name="" id="" cols="10" rows="2" required>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Agregar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
//seteamos el header de la pagina
BaseLayout::renderFoot();
?>