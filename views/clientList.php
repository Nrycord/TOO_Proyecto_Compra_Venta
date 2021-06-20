<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>

<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/CuctTable.css">
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
                        <?php if ($_COOKIE["Rol"] == "Empleado") {
                            echo '<a class="btn btn-primary" href="' . BASE_DIR . 'Clientes/agregarCliente">Agregar cliente</a>';
                        } ?>
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
                            <?php
                            foreach ($clientes as $cliente) {
                                echo "<tr scope='row' id = " . $cliente[C_ID] . ">";
                                echo "<td>" . $cliente[C_ID] . "</td>";
                                echo "<td>" . $cliente[C_NOMBRE] . "</td>";
                                echo "<td>" . $cliente[C_APELLIDO] . "</td>";
                                echo "<td>" . $cliente[C_DIR] . "</td>";
                                echo "<td>" . $cliente[C_DUI] . "</td>";
                                echo "<td>" . $cliente[C_TEL] . "</td>";
                                echo "<td>" . $cliente[C_TIPO] . "</td>";
                                echo '<td><div class="form-group">';
                                if ($_COOKIE["Rol"] == "Empleado")
                                    echo '<button type="submit" class="btn btn-outline-secondary btn-sm" style="width: 40px;"><i class="far fa-edit"></i></button>';
                                else if ($_COOKIE["Rol"] == "Administrador")
                                    echo '<button type="submit" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="fas fa-ban"></i></button>';
                                echo '</td>';
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