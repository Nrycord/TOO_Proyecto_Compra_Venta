<?php
require_once "database/Database.php";
require_once "models/AdministradorModel.php";
require_once "models/EmpleadoModel.php";

class Login extends Database
{
    private $usuario;
    private $pass;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    public function login()
    {
        $empleado = new EmpleadoModel();
        $admin = new AdministradorModel();

        $resEmpleado = $empleado->obtenerUsuarioEmpleado($this->getUsuario(), $this->getPass());
        $resAdmin = $admin->obtenerAdministrador($this->getUsuario(), $this->getPass());
        $result = false;

        //Buscamos en la bd un usuario con el que coincida el usuario ingresado, si se encontro:
        if (isset($resAdmin)) {
            $result = $this->logAdmin($resAdmin);
        }elseif(isset($resEmpleado)){
            $result = $this->logEmpleado($resEmpleado);
        }

        return $result; //Retornamos el false, en caso que no entre a alguna de las verificaciones
    }

    public function logAdmin($admin){
        //Si la contraseña coincide, iniciamos la sesion
        session_start();

        //Agregamos a la sesion, valores que podemos llegar a utilizar más adelante
        $_SESSION[ADMIN_ID] = $admin[ADMIN_ID];
        $_SESSION[U_USER] = $admin[U_USER];
        $_SESSION[U_NOMBRE] = $admin[U_NOMBRE];
        $_SESSION[U_APELLIDO] = $admin[U_APELLIDO];

        //creamos una cookie
        setcookie("SessionId", true, strtotime('+1 day'), '/');
        setcookie("Rol", $admin[U_TIPO], strtotime('+1 day'), '/');
        //Retornamos los datos del usuario encontrado
        return $admin;
    }

    public function logEmpleado($employee){
        //Si la contraseña coincide, iniciamos la sesion
        session_start();

        //Agregamos a la sesion, valores que podemos llegar a utilizar más adelante
        $_SESSION[EMP_ID] = $employee[ADMIN_ID];
        $_SESSION[U_USER] = $employee[U_USER];
        $_SESSION[U_NOMBRE] = $employee[U_NOMBRE];
        $_SESSION[U_APELLIDO] = $employee[U_APELLIDO];

        //creamos una cookie
        setcookie("SessionId", true, strtotime('+1 day'), '/');
        setcookie("Rol", $employee[U_TIPO], strtotime('+1 day'), '/');
        //Retornamos los datos del usuario encontrado
        return $employee;
    }
}
