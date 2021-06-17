<?php
    //Maneja la verificacion de si el usuario a iniciado sesion (creado una cookie)
    

    //Si la cookie existe
    if($_COOKIE["SessionId"]){
        //Reanudamos o iniciamos la sesion
        //session_start();
    }else{
        //Si no tiene una sesion iniciada, entonces manda a iniciar sesion
        header('Location: '.BASE_DIR.'Login/login');
    }
