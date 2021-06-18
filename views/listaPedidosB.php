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
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/pedidos.css">
</head>

<div class="body">
    <div class="main">
        <?php 
            if(empty($data[TBL_PEDIDOS])) {
                echo "<h1 class='main_title'>No hay pedidos pendientes</h1>";
            }
            else {
                echo "<h1 class='main_title'>Pedidos</h1>";
            }
        ?>
        <ul class='cards'>
    <?php
    foreach ($data[TBL_PEDIDOS] as $dato) {
        echo "<li class='cards_item'>";
            echo  "<div class='card'>";
            echo    "<div class='card_content'>";
                echo    "<h1>". $dato[P_ASUNTO] ."</h1>";
                echo    "<p class='card_text-extra'>". $dato[P_DESCRIPCION] ."</p>";
                echo    "<hr>";
                echo    "<h2 class='card_title'>Sucursal hacia donde se pidio:</h2>";
                if ($data['tipo'] == 'Saliente') {
                    echo "<p class='card_text'>". $dato[S_NOMBRE_SUCURSAL] ."</p>";
                }
                echo    "<hr>";
                echo    "<h2 class='card_title'>Estado:</h2>";
                echo    "<p class='card_text'>". $dato[P_ESTADO] ."</p>";
                echo    "<hr>";
                echo    "<h2 class='card_title'>Nivel de urgencia:</h2>";
                echo    "<p class='card_text'>". $dato[P_URGENCIA] ."</p>";
            echo    "</div>";
        echo    "</div>";
    echo     "</li>";
    }
    ?>      
        </ul>
    </div>
</div>