<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();
?>
<div class="align">
    <main class="main-table">
        <div class="table-users">
            <div class="header">Sucursales</div>

            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre Sucursal</th>
                        <th>Direccion</th>
                        <th># de Empleados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data[TBL_SUCURSAL] as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato[S_NOMBRE_SUCURSAL] . "</td>";
                        echo "<td>" . $dato[S_DIRECCION] . "</td>";
                        echo "<td>" . $dato[S_NUM_EMPLEADOS] . "</td>";
                    }
                    ?>
            </table>
        </div>
    </main>
</div>