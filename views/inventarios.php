<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();
$msg = "Desea borrar este Inventario?";
?>
<main class="allbutrender">
    <section class="section-table">

        <table>
            <thead>
                <tr>
                    <th>Id Inventario</th>
                    <th>Id Sucursal</th>
                    <th>id Producto</th>
                    <th>Stock</th>
                    <th>VER</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data[TBL_INVENTARIO] as $dato) {
                    echo "<tr>";
                    echo "<td>" . $dato[I_ID] . "</td>";
                    echo "<td>" . $dato[I_ID_SUCURSAL] . "</td>";
                    echo "<td>" . $dato[I_ID_PRODUCTO] . "</td>";
                    echo "<td>" . $dato[I_STOCK] . "</td>";
                    echo "<td><a class='btn btn-prestar' href='" . BASE_DIR . "Inventario/datosInventario&id=" . $dato[I_ID] . "'>Visualizar</a></td>";
                    echo "<td><a class='btn btn-modificar' href='" . BASE_DIR . "Inventario/modificar&id=" . $dato[I_ID] . "'>Modificar</a></td>";
                    echo "<td><a class='btn btn-eliminar' onclick='return checkDelete()' href='" . BASE_DIR . "Inventario/eliminar&id=" . $dato[I_ID] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() { //Pide confirmacion si el usuario desea borrar un registro
            return confirm('Seguro que desea borrar este registro?');
        }
    </script>
    
</main>
