<?php

class LoginController
{
    //Muestra la vista de login inicial
    public function login()
    {
        require_once "views/login.php";

        if (!empty($_POST) && isset($_POST[U_USER])) { //Si los datos fueron ingresados

            if ($this->loggedUser($_POST[U_USER], $_POST[U_PASS])) { //Si el usuario se encontro en la base de datos
                header('Location: ' . BASE_DIR . 'Home/mostrarHomePage'); //Redirigimos a Home
            } else {
                $loginErr = "Error con los datos ingresados"; //En caso que no se encontro el usuario/contrasenia muestra el error
            }
        }
    }

    //Inicia la sesion de un usuario cuando se ingresa su usario y una contraseña correcta
    public function loggedUser($usuario, $pass)
    {
        require_once "models/Login.php";

        //Agregamos los datos requeridos para iniciar una sesion
        $userLog = new Login($usuario, $pass); //Creamos una instancia de Login, esta tomará los datos e iniciara la sesion si estan correctos

        //$userLog->setUsuario($usuario);
        //$userLog->setPass($pass);

        //Si el inicio se sesion fue exitoso, retornara true, de otra forma retorna false
        return $userLog->login();
    }

    //Cierra la session del usuario
    public function logout()
    {
        //Eliminamos los datos de la cookie y de la sesion actual
        //borramos cookies
        setcookie("SessionId", null, strtotime('+1 second'), '/');
        setcookie("Rol", null, strtotime('+1 second'), '/');
        unset($_COOKIE);
        unset($_SESSION);

        header('Location: ' . BASE_DIR . ''); //Mandamos de regreso a la pagina de login
    }
}
