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
                        <?php
                        foreach ($listaProductos as $producto) {
                            echo "<tr scope='row' id = " . $producto[PROD_ID] . ">";
                            echo "<td>" . $producto[PROD_ID] . "</td>";
                            echo "<td>" . $producto[PROD_NOMBRE] . "</td>";
                            echo "<td>" . $producto[PROD_CANTIDAD] . "</td>";
                            echo "<td>" . $producto[PROD_PRECIO] . "</td>";
                            echo "<td><div class='form-group'>
                                  <a onclick= 'myAjax(" . $producto[PROD_ID] . ")'><button type='button' class='btn btn-outline-success btn-sm' style='width: 40px;'><i class='fas fa-plus'></i></button></a>
                                  </div></td>";
                            echo "</tr>";
                            echo "<tr class='spacer'><td colspan='100'></td></tr>";
                        }
                        ?>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function myAjax(idProducto) {
        $.ajax({
            type: "POST",
            url: '<?= BASE_DIR ?>Empleado/tablaProductos',
            data: {
                idProducto: idProducto
            },
            success: function() {
                $("#" + idProducto).remove();
                alert("Producto agregado a la lista");
            }

        });
    }
</script>