<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";
//seteamos el header de la pagina
BaseLayout::renderHead();

?>

<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/search.css">
</head>

<div class="align">


    <main class="main-table">
        <div class="container_s">
            <div class="container__item">
                <?php if ($data["tipo"] == "Admin") { ?>
                    <form class="form" method="POST" action="<?= BASE_DIR; ?>Inventario/showInventarioAdmin">
                        <select name=" filter" id="filter" class="form__field">
                            <option value="0" selected>Seleccione Sucursal</option>
                            <?php foreach ($data[TBL_SUCURSAL] as $dato) {
                                echo "<option value = " . $dato[S_ID] . ">" . $dato[S_NOMBRE_SUCURSAL] . "</option>";
                            } ?>
                        </select>
                        <button type="submit" class="btn btn--primary btn--inside uppercase">Filtrar</button>
                    </form>
                <?php } ?>
            </div>
        </div>

        <div class="table-users">
            <div class="header">Inventario</div>

            <table cellspacing="0">
                <tr>
                    <th></th>
                    <th>Sucursal</th>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>VER</th>
                    <th>EDITAR</th>
                    <?php
                    if ($_COOKIE["Rol"] == "Administrador") {
                        echo "<th>ELIMINAR</th>";
                    }
                    ?>
                </tr>

                <?php
                foreach ($data[TBL_INVENTARIO] as $dato) {
                    echo "<tr>";
                    echo "<td><img src='../assets/img/box.svg' alt=''/>" . "</td>";
                    echo "<td>" . $dato[I_NOMBRE_SUCURSAL] . "</td>";
                    echo "<td>" . $dato[I_NOMBRE_PRODUCTO] . "</td>";
                    echo "<td>" . $dato[I_STOCK] . "</td>";
                    echo "<td><a class='btn btn-prestar' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'>Visualizar</a></td>";
                    echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'>Modificar</a></td>";
                    if ($_COOKIE["Rol"] == "Administrador") {
                        echo "<td><a class='btn btn-eliminar' onclick='return checkDelete()' href='" . BASE_DIR . "Inventario/eliminar&id=" . $dato[I_ID] . "'>Eliminar</a></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </main>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() { //Pide confirmacion si el usuario desea borrar un registro
            return confirm('Seguro que desea borrar este registro?');
        }
    </script>
</div>