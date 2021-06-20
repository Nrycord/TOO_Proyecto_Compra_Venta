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
            <div class="row">
                <div class="col-auto">
                    <h1 class="table-header">Lista de Clientes</h1>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" href="">Agregar cliente</a>
                </div>
            </div>
            <div class="table-responsive custom-table-responsive" style="max-height: 80vh">
                <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">DUI</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" width="120px">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row">
                            <td>1</td>
                            <td><a href="#">Fulano</a></td>
                            <td>Mengano</td>
                            <td>direcccion 1</td>
                            <td>00000000-0</td>
                            <td>0000-0000</td>
                            <td>tipo</td>
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
                            <td><a href="#">Fulana</a></td>
                            <td>Mengano</td>
                            <td>direcccion 1</td>
                            <td>00000000-0</td>
                            <td>0000-0000</td>
                            <td>tipo</td>
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