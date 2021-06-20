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
                    <form action="<?= BASE_DIR; ?>Productos/agregarProducto" method="POST">
                        <div class="form-group">
                            <label for="">Producto</label>
                            <input type="text" name="<?= PROD_NOMBRE ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="number" name="<?= PROD_CANTIDAD ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Precio Unitario</label>
                            <input type="text" id="precio" name="<?= PROD_PRECIO ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <input type="text" id="categoria" name="<?= PROD_CATEGORIA ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="">Proveedor</label>
                            <select type="text" name="<?= PROD_ID_PROV ?>" required>
                                <?php foreach ($proveedores as $proveedor) {
                                    echo "<option value = " . $proveedor[PROV_ID] . ">" . $proveedor[PROV_NOMBRE] . "</option>";
                                } ?>
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