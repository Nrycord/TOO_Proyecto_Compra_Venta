<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/svg" href="<?= BASE_DIR; ?>/assets/img/logo-icon.svg" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/home.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productForm.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/productTable.css">

    <script src="https://kit.fontawesome.com/caaa137172.js" crossorigin="anonymous"></script>

    <title>El Artesano</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #4285F4;">
        <a class="navbar-brand" href="<?= BASE_DIR; ?>Home/showHome">
            <img src="<?= BASE_DIR; ?>/assets/img/logo.png" alt="" width="20" height="30" class="d-inline-block align-top"> <strong>EL ARTESANO</strong>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-home"></i> Inicio</a>
                </li>
            <!-- UN EMPLEADO SOLO PUEDE VER LA PESTANA DE CLIENTES Y DE REPORTES -->
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-users"></i> Clientes</a>
                </li>
                <!-- AQUI VAS A MOSTRAR REPORTES SOLO SI ES EMPLEADO -->
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-folder-open"></i> Reportes</a>
                </li>
                <!-- AQUI VAS A MOSTRAR REPORTES SOLO SI ES EMPLEADO -->
            <!-- UN EMPLEADO SOLO PUEDE VER LA PESTANA DE CLIENTES Y DE REPORTES -->
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-chair"></i> Productos</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-light" href="<?= BASE_DIR; ?>Home/showHome"><i class="fas fa-truck"></i> Proveedores</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-danger" href="<?= BASE_DIR; ?>Login/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>