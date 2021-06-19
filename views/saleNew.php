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
                        <h1>Realiza una nueva venta</h1>
                    </div>
                    <div class="form-content">
                        <form action="<?= BASE_DIR; ?>Login/login" method="POST">
                            <div class="form-group">
                                <label for="<?= C_ID ?>">Selecciona un cliente</label>
                                <select name="<?= C_ID ?>" required="required">
                                    <?php foreach ($listaClientes as $cliente) {
                                        echo "<option value = " . $cliente[C_ID] . ">" . $cliente[C_NOMBRE] . " " . $cliente[C_APELLIDO]  . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="products">Elige los productos</label>
                                        <input type="text" name="products" required="required" />
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <button type="submit" class="button-search"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 px-3 vh-50 row justify-content-center">
            <div class="content">
                <div class="container mt-2">
                    <div class="table-responsive custom-table-responsive" style="max-height: 55vh">
                        <table class="table table-hover custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Disponibles</th>
                                    <th scope="col">Precio U</th>
                                    <th scope="col" width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr scope="row">
                                    <td>1</td>
                                    <td><a href="#">Producto 1</a></td>
                                    <td>10</td>
                                    <td>$150</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-success btn-sm" style="width: 40px;"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>2</td>
                                    <td><a href="#">Producto 2</a></td>
                                    <td>30</td>
                                    <td>$300</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-success btn-sm" style="width: 40px;"><i class="fas fa-plus"></i></button>
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
        </div>

        <div class="m-0 px-3 vh-50 row justify-content-center">
            <div class="content">
                <div class="container">
                    <div class="form-header">
                        <h1 class="mt-4">Presupuesto</h1>
                    </div>
                    <div class="table-responsive custom-table-responsive" style="max-height: 55vh">

                        <table class="table table-hover custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio U</th>
                                    <th scope="col" width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr scope="row">
                                    <td>1</td>
                                    <td><a href="#">Producto 1</a></td>
                                    <td>10</td>
                                    <td>$150</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>2</td>
                                    <td><a href="#">Producto 2</a></td>
                                    <td>30</td>
                                    <td>$300</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>1</td>
                                    <td><a href="#">Producto 1</a></td>
                                    <td>10</td>
                                    <td>$150</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>2</td>
                                    <td><a href="#">Producto 2</a></td>
                                    <td>30</td>
                                    <td>$300</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>1</td>
                                    <td><a href="#">Producto 1</a></td>
                                    <td>10</td>
                                    <td>$150</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>

                                <tr scope="row">
                                    <td>2</td>
                                    <td><a href="#">Producto 2</a></td>
                                    <td>30</td>
                                    <td>$300</td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button>
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
        </div>
    </main>

    <?php
    //seteamos el header de la pagina
    BaseLayout::renderFoot();
    ?>