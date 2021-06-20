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
                        <h1 class="table-header">Lista de Productos</h1>
                    </div>
                    <div class="col-auto">
                        <?php if ($_COOKIE["Rol"] == "Administrador")
                            echo '<a class="btn btn-primary" href="' . BASE_DIR . 'Productos/AgregarProveedor">Agregar producto</a>'; ?>
                    </div>
                </div>
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
                                <?php if ($_COOKIE["Rol"] == "Administrador")
                                    echo '<th scope="col" width="120px">Operaciones</th>'; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($productos as $producto) {
                                echo "<tr scope='row' id = " . $producto[PROD_ID] . ">";
                                echo "<td>" . $producto[PROD_ID] . "</td>";
                                echo "<td>" . $producto[PROD_NOMBRE] . "</td>";
                                echo "<td>" . $producto[PROD_CANTIDAD] . "</td>";
                                echo "<td>" . $producto[PROD_PRECIO] . "</td>";
                                echo "<td>" . $producto[PROD_CATEGORIA] . "</td>";
                                echo "<td>" . $producto[PROD_ID_PROV] . "</td>";
                                if ($_COOKIE["Rol"] == "Administrador")
                                    echo '<td><div class="form-group">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm" style="width: 40px;"><i class="far fa-edit"></i></button>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="fas fa-ban"></i></button>
                                      </div></td>';
                                echo "</tr>";
                                echo "<tr class='spacer'><td colspan='100'></td></tr>";
                            }
                            ?>
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