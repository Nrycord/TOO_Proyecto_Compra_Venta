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
                <h2 class="course-title"><?= $_SESSION[S_NOMBRE_SUCURSAL] ?></h2>
                <h2>Asunto:</h2>
                <h5><?= $data[P_ASUNTO] ?></h6>
            </div>
            <div class="course-info">
                <h2>Destino:</h2>
                <h5><?= $data[S_NOMBRE_SUCURSAL] ?></h5>
                <h2>Descripción:</h2>
                <h5><?= $data[P_DESCRIPCION] ?></h5>
                <h2>Nivel de urgencia:</h2>
                <h5><?= $data[P_URGENCIA] ?></h5>
                <h2>Estado:</h2>
                <h5><?= $data[P_ESTADO] ?></h5>
            </div>
        </div>
    </div>
</body>

</html>