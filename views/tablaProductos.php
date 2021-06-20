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
                            <?php echo !strcmp($tipo, "compra") ?
                                '<th scope="col">Compra</th>' : '<th scope="col">Venta</th>'; ?>
                            <th scope="col" width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaProductos as $producto) {
                            if ($producto[PROD_CANTIDAD] > 0) {
                                echo "<tr scope='row' id = " . $producto[PROD_ID] . ">";
                                echo "<td>" . $producto[PROD_ID] . "</td>";
                                echo "<td>" . $producto[PROD_NOMBRE] . "</td>";
                                echo "<td>" . $producto[PROD_CANTIDAD] . "</td>";
                                echo "<td>" . $producto[PROD_PRECIO] . "</td>";
                                echo "<td><input type='number' oninput='limiter(this);' min='0' max='" . $producto[PROD_CANTIDAD] . "' id='cantidad" . $producto[PROD_ID] . "' value='1'></td>";
                                echo "<td><div class='form-group'>
                                <a onclick= 'myAjax(" . $producto[PROD_ID] . ")'><button type='button' class='btn btn-outline-success btn-sm' style='width: 40px;'><i class='fas fa-plus'></i></button></a>
                                </div></td>";
                                echo "</tr>";
                                echo "<tr class='spacer'><td colspan='100'></td></tr>";
                            }
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
        var tipo = "<?= $tipo ?>";

        var dir = tipo == "compra" ? "Administrador" : "Empleado";
        $.ajax({
            type: "POST",
            url: '<?= BASE_DIR ?>' + dir + '/tablaProductos',
            data: {
                idProducto: idProducto,
                cantidad: document.getElementById("cantidad" + idProducto).value
            },
            success: function() {
                $("#" + idProducto).remove();
                alert("Producto agregado a la lista" + dir);
            }

        });
    }

    function limiter(sender) {
        var tipo = "<?= $tipo ?>";

        if (tipo == "venta") {
            let min = sender.min;
            let max = sender.max;
            let value = parseInt(sender.value);
            if (value > max) {
                sender.value = min;
            } else if (value < min) {
                sender.value = min;
            }
        }
    }
</script>