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
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= BASE_DIR; ?>/assets/css/login.css">
    <title>El Artesano</title>
</head>

<body class="m-0 px-3 vh-100 row justify-content-center align-items-center">
    <!-- Form-->
    <div class="form col-auto">
        <div class="form-panel one">
            <div class="form-header">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="form-content">
                <form action="<?= BASE_DIR; ?>Login/login" method="POST">
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="<?= U_USER; ?>" name="<?= U_USER; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="<?= U_PASS; ?>" name="<?= U_PASS; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <button type="submit">Acceder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="<?= BASE_DIR; ?>/assets/js/script.js"></script>
</body>
</html>