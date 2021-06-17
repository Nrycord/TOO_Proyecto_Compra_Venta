<?php

class LoginController
{
    //Muestra la vista de login inicial
    public function login()
    {
        require_once "views/login.php";
        $loginErr = ""; //Mensaje de error encaso que falle el inicio de sesion

        if (!empty($_POST) && isset($_POST[U_USUARIO])) { //Si los datos fueron ingresados

            if ($this->loggedUser($_POST[U_USUARIO], $_POST[U_PASSWORD])) { //Si el usuario se encontro en la base de datos
                /*Forma 2, Depende de los valores de $_SESSION que tomemos*/
                $UsuarioActual = array(U_USUARIO => $_SESSION[U_USUARIO], U_ID_SUCURSAL => $_SESSION[U_ID_SUCURSAL]); //Los ponemos en un arreglo asociativo
                $UsuarioActual = json_encode($UsuarioActual, JSON_PRETTY_PRINT);
                file_put_contents("UsuarioActual.json", $UsuarioActual); //Anexamos esos valores a el documento .json
                header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home
            } else {
                $loginErr = "Error con los datos ingresados"; //En caso que no se encontro el usuario/contrasenia muestra el error
            }
        }
    }

    //Inicia la sesion de un usuario cuando se ingresa su usario y una contraseña correcta
    public function loggedUser($usuario, $pass)
    {

        require_once "models/Login.php";

        $userLog = new Login(); //Creamos una instancia de Login, esta tomará los datos e iniciara la sesion si estan correctos

        //Agregamos los datos requeridos para iniciar una sesion
        $userLog->setUsuario($usuario);
        $userLog->setPass($pass);

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

        file_put_contents("UsuarioActual.json", null); //Vaciamos los datos tomados de el usuario activo

        header('Location: ' . BASE_DIR . ''); //Mandamos de regreso a la pagina de login
    }
}
