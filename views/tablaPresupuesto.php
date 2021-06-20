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
                        <?php
                        foreach ($productos as $producto) {
                            echo "<tr scope='row' id = " . $producto[PROD_ID] . ">";
                            echo "<td>" . $producto[PROD_ID] . "</td>";
                            echo "<td>" . $producto[PROD_NOMBRE] . "</td>";
                            echo "<td>" . $producto[PROD_CANTIDAD] . "</td>";
                            echo "<td>" . $producto[PROD_PRECIO] . "</td>";
                            echo '<td><div class="form-group">
                                  <a onclick= "borrarCampo(' . $producto[PROD_ID] . ')"><button type="button" class="btn btn-outline-danger btn-sm" style="width: 40px;"><i class="far fa-trash-alt"></i></button></a>
                                  </div></td>';
                            echo "</tr>";
                            echo '<tr class="spacer"><td colspan="100"></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function borrarCampo(idEliminar) {
        $.ajax({
            type: "POST",
            url: '<?= BASE_DIR ?>Empleado/tablaPresupuesto',
            data: {
                idEliminar: idEliminar
            },
            success: function() {
                $("#" + idEliminar).remove();
                alert("Producto eliminado de la lista");
            }

        });
    }
</script>