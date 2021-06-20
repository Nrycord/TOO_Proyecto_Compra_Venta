<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>
<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productTable.css">
</head>

<body>

<main class="m-0 px-3 vh-100 row justify-content-center align-items-center">
    <div class="content">
        <div class="container mt-5">
            <h1 class="table-header">Lista de Productos</h1>
            <div class="table-responsive custom-table-responsive" style="max-height: 80vh">
                <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Disponibles</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col" width="120px">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row">
                            <td>1</td>
                            <td><a href="#">Repisa NO1</a></td>
                            <td>10</td>
                            <td>$150</td>
                            <td>Cocina</td>
                            <td>IKEA</td>
                            <td>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm" style="width: 40px;"><i class="far fa-edit"></i></button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="fas fa-ban"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>

                        <tr scope="row">
                            <td>2</td>
                            <td><a href="#">Juego de sala NO2</a></td>
                            <td>30</td>
                            <td>$300</td>
                            <td>Sala</td>
                            <td>FurnCo</td>
                            <td>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm" style="width: 40px;"><i class="far fa-edit"></i></button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="fas fa-ban"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
//seteamos el header de la pagina
BaseLayout::renderFoot();
?>