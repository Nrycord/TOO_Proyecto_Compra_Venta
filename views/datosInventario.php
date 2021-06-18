<?php
//Verifica si el usuario ha iniciado sesion, si no entonces lo redirecciona a que inicie sesion
require_once "config/loginVerify.php";

//Requerimos el header para que acceda a las opciones
require_once "render/BaseLayout.php";

//seteamos el header de la pagina
BaseLayout::renderHead();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/info.css">
</head>

<body class="card-body">
    <div class="courses-container">
        <div class="course">
            <div class="course-preview">
                <h2>Sucursal:</h2>
                <h5><?= $_SESSION[S_NOMBRE_SUCURSAL] ?></h6>
            </div>
            <div class="course-info">
                <h2>Producto:</h2>
                <h5><?= $data["nombreProducto"] ?></h6>
                <h2>Stock del producto:</h2>
                <h5><?= $data[I_STOCK] ?></h6>
            </div>
        </div>
    </div>
</body>

</html>