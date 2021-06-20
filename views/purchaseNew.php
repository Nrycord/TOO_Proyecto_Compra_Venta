<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>

<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productForm.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productTable.css">
</head>

<body>
    <main class="container">

        <!-- Form-->
        <div class="m-0 mt-3 px-3 vh-50 row justify-content-center align-items-center">
            <div class="form col-auto">
                <div class="form-panel one">
                    <div class="form-header">
                        <h1>Realiza una nueva compra</h1>
                    </div>
                    <div class="form-content">
                        <form action="<?= BASE_DIR; ?>Empleado/mostrarFormularioCompra" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="products">Elige los productos</label>
                                        <input type="text" name="filtroProducto" id="filtroProducto" />
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <button type="button" onclick="reloadInfo()" class="button-search"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="reloadInfo()" class="button-search">Realizar Compra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="tablaProductos"></div>

        <div id="tablaPresupuesto"></div>


    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        reloadInfo();
        reloadPresupuesto();
        var timeout = setInterval(reloadPresupuesto, 10000);

        function reloadInfo() {
            reloadPresupuesto();
            producto = document.getElementById('filtroProducto').value; //Tomamos el texto para el filtro
            //Ejecutamos una funcion nueva, donde le pasamos el nombre del producto a buscar
            $('#tablaProductos').load('<?= BASE_DIR ?>Administrador/tablaProductos&tipo="compra"&producto=' + producto);
        }


        function reloadPresupuesto() {
            //Ejecutamos una funcion nueva, donde le pasamos el nombre del producto a buscar
            $('#tablaPresupuesto').load('<?= BASE_DIR ?>Administrador/tablaPresupuesto&tipo="compra"');
        }
    </script>

    <?php
    //seteamos el header de la pagina
    BaseLayout::renderFoot();
    ?>