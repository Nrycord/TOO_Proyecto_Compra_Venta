<?php
    //Si la cookie existe
    if(isset($_COOKIE["SessionId"])){
        //Si tiene una sesion iniciada, entonces manda a Home
        header('Location: '.BASE_DIR.'Home/showHome');
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/login.css">
    <title>Maquila de Oriente</title>
</head>

<body class="align">
    <main>
        <div class="form">
            <div class="thumbnail"><img src="<?= BASE_DIR; ?>assets/img/login.svg" /></div>
            <form action="<?= BASE_DIR; ?>Login/login" method="POST" class="login-form">
                <input type="text" name="<?= U_USUARIO ?>" placeholder="Usuario" required autocomplete="off">
                <input type="password" name="<?= U_PASSWORD ?>" placeholder="Contraseña" required autocomplete="off">
                <button>Acceder</button>
            </form>
        </div>
    </main>
</body>

</html>