<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();
$msg = "Desea borrar este Pedido?";
?>

<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/search.css">
</head>

<div class="align">
    <main class="main-table">
        <?php if ($data["tipo"] != "Admin") { ?>
            <div class="main-table__buttons">
                <a href="<?= BASE_DIR; ?>Pedido/showPedidoSucursalHistorial&tipo=salientes"><button type="submit" class="btn btn--primary btn--inside uppercase">Salientes</button></a>
                <a href="<?= BASE_DIR; ?>Pedido/showPedidoSucursalHistorial&tipo=entrantes"><button type="submit" class="btn btn--primary btn--inside uppercase">Entrantes</button></a>
            </div>
        <?php } ?>
        <div class="container_s">
            <div class="container__item">
                <?php if ($data["tipo"] == "Admin") { ?>
                    <form class="form" method="POST" action="<?= BASE_DIR; ?>Pedido/showPedidoAdmin">
                        <select name="filter" id="filter" class="form__field">
                            <option selected disabled>Seleccione Sucursal</option>
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
            <div class="header">Pedidos</div>

            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Sucursal</th>
                        <th>Destino</th>
                        <th>Asunto</th>
                        <th>Descripcion</th>
                        <th>Urgencia</th>
                        <th>Estado</th>
                        <th>VER</th>
                        <?php
                        if ($_COOKIE["Rol"] == "Administrador") {
                            echo "<th>ELIMINAR</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data[TBL_PEDIDOS] as $dato) {
                        echo "<tr>";
                        if ($data['tipo'] == 'Entrante') {
                            echo "<td>" . $dato[S_NOMBRE_SUCURSAL] . "</td>";
                            echo "<td>" . $_SESSION[S_NOMBRE_SUCURSAL] . "</td>";
                        } else if ($data['tipo'] == 'Saliente') {
                            echo "<td>" . $_SESSION[S_NOMBRE_SUCURSAL] . "</td>";
                            echo "<td>" . $dato[S_NOMBRE_SUCURSAL] . "</td>";
                        } else {
                            echo "<td>" . $dato[P_ID_SUCURSAL] . "</td>";
                            echo "<td>" . $dato[P_ID_DESTINO] . "</td>";
                        }
                        echo "<td>" . $dato[P_ASUNTO] . "</td>";
                        echo "<td>" . $dato[P_DESCRIPCION] . "</td>";
                        echo "<td>" . $dato[P_URGENCIA] . "</td>";
                        echo "<td>" . $dato[P_ESTADO] . "</td>";
                        echo "<td><a class='btn btn-prestar' href='" . BASE_DIR . "Pedido/datosPedido&id=" . $dato[P_ID] . "&tipo=" . $data["tipo"] . "'>Visualizar</a></td>";
                        if ($_COOKIE["Rol"] == "Administrador") {
                            echo "<td><a class='btn btn-eliminar' onclick='return checkDelete()' href='" . BASE_DIR . "Pedido/eliminar&id=" . $dato[P_ID] . "'>Eliminar</a></td>";
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