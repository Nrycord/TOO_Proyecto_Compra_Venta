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
                <h1>Nuevo Producto</h1>
            </div>
            <div class="form-content">
                <form action="<?= BASE_DIR; ?>Login/login" method="POST">
                    <div class="form-group">
                        <label for="">Producto</label>
                        <input type="text" name="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" name="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Precio Unitario</label>
                        <input type="text" id="precio" name="" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Categoria</label>
                        <select type="text" name="" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Proveedor</label>
                        <select type="text" name="" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit">Agregar Producto</button>
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