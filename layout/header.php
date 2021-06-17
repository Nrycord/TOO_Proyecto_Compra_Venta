<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/home.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/inventario.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/lista.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>assets/css/main.css">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/caaa137172.js" crossorigin="anonymous"></script>
    <title>Maquila de Oriente</title>
</head>

<body class="align">
    <!-- ############################################################################# -->
    <nav class="navigation navigation--inline">
        <div class="navigation--title">
            <h1>Maquila de Oriente</h1>
        </div>
        <ul>
            <li id="li1">
                <a href="<?= BASE_DIR; ?>Home/showHome">
                    <svg class="icon icon--2x">
                        <use xlink:href="#icon-home" />
                    </svg>
                    <span id="t1" class="invisible">Inicio</span>
                </a>
            </li>
            <!-- AQUI VAS ABRIR UNA LLAVE DE PHP PARA QUE EL LI DE LA OPCION SUCURSAL SOLO APAREZCA PARA ADMIN -->
            <?php 
            if($_COOKIE["Rol"] == "Administrador"){
            echo "<li id='li2'>";
            echo    "<a href='".BASE_DIR."Sucursal/showSucursalAdmin'>";
            echo        "<svg class='icon icon--2x'>";
            echo               "<use xlink:href='#icon-store'/>";
            echo         "</svg>";
            echo         "<span id='t2' class='invisible'>Sucursales</span>";
            echo    "</a>";
            echo "</li>";
            }
            ?>
            <!-- AQUI VAS ABRIR UNA LLAVE DE PHP PARA QUE EL LI DE LA OPCION SUCURSAL SOLO APAREZCA PARA ADMIN -->
            <li id="li3">
            <?php 
                if($_COOKIE["Rol"] == "Administrador"){
                    echo "<a href='".BASE_DIR."Pedido/showPedidoAdmin'>";
                }else{
                    echo "<a href='".BASE_DIR."Pedido/showSelectorPedido'>";
                }
                ?>
                    <svg class="icon icon--2x">
                        <use xlink:href="#icon-order" />
                    </svg>
                    <span id="t3" class="invisible">Pedidos</span>
                </a>
            </li>
            <li id="li4">
                <?php 
                if($_COOKIE["Rol"] == "Administrador"){
                    echo "<a href='".BASE_DIR."Inventario/showInventarioAdmin'>";
                }else{
                    echo "<a href='".BASE_DIR."Inventario/showInventarioSucursal'>";
                }
                ?>
                    <svg class="icon icon--2x">
                        <use xlink:href="#icon-inventory" />
                    </svg>
                    <span id="t4" class="invisible">Inventario</span>
                </a>
            </li>
            <li id="li5">
                <a href="<?= BASE_DIR; ?>/Login/logout">
                    <svg class="icon icon--2x">
                        <use xlink:href="#icon-log" />
                    </svg>
                    <span id="t5" class="invisible">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-log" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
                d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z" />
        </symbol>
        <symbol id="icon-store" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
                d="M21 20h2v2H1v-2h2V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v17zm-2 0V4H5v16h14zM8 11h3v2H8v-2zm0-4h3v2H8V7zm0 8h3v2H8v-2zm5 0h3v2h-3v-2zm0-4h3v2h-3v-2zm0-4h3v2h-3V7z" />
        </symbol>
        <symbol id="icon-order" viewBox="0 0 24 24">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20 4H4C3.44771 4 3 4.44772 3 5V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V5C21 4.44771 20.5523 4 20 4ZM4 2C2.34315 2 1 3.34315 1 5V19C1 20.6569 2.34315 22 4 22H20C21.6569 22 23 20.6569 23 19V5C23 3.34315 21.6569 2 20 2H4ZM6 7H8V9H6V7ZM11 7C10.4477 7 10 7.44772 10 8C10 8.55228 10.4477 9 11 9H17C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H11ZM8 11H6V13H8V11ZM10 12C10 11.4477 10.4477 11 11 11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H11C10.4477 13 10 12.5523 10 12ZM8 15H6V17H8V15ZM10 16C10 15.4477 10.4477 15 11 15H17C17.5523 15 18 15.4477 18 16C18 16.5523 17.5523 17 17 17H11C10.4477 17 10 16.5523 10 16Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon-inventory" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
                d="M3 10H2V4.003C2 3.449 2.455 3 2.992 3h18.016A.99.99 0 0 1 22 4.003V10h-1v10.001a.996.996 0 0 1-.993.999H3.993A.996.996 0 0 1 3 20.001V10zm16 0H5v9h14v-9zM4 5v3h16V5H4zm5 7h6v2H9v-2z" />
        </symbol>
        <symbol id="icon-home" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
                d="M19 21H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9a1 1 0 0 1-1 1zM6 19h12V9.157l-6-5.454-6 5.454V19zm2-4h8v2H8v-2z" />
        </symbol>
    </svg>

    <!-- ############################################################################# -->

    <script src="../assets/js/main.js"></script>
</body>