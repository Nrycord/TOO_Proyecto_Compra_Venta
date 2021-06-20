<?php
require_once "database/Database.php";
require_once "models/Usuario.php";

class EmpleadoModel extends Usuario
{
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function obtenerEmpleados()
    {
        $query = "SELECT * FROM " . TBL_EMPLEADOS;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function modificarEmpleado($idEmpleado)
    {
        $query = "UPDATE " . TBL_EMPLEADOS . " VALUES(:" . U_NOMBRE . ", :" . U_APELLIDO . ", :" . U_USER . ", :" . U_PASS . ", :" . U_TIPO . ") WHERE " . EMP_ID . " = " . $idEmpleado;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . U_NOMBRE, $this->getnombre());
        $statement->bindValue(':' . U_APELLIDO, $this->getapellido());
        $statement->bindValue(':' . U_USER, $this->getUsername());
        $statement->bindValue(':' . U_PASS, $this->getPassword());
        $statement->bindValue(':' . C_TIPO, $this->getTipoUsuario());

        //"<h1>Error al agregar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro agregado con éxito!</h1>";
        }

        return $message;
    }

    public function obtenerEmpleado($idEmpleado)
    {
        $query = "SELECT * FROM " . TBL_EMPLEADOS . " WHERE " . EMP_ID . " =: " . EMP_ID . " )";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . EMP_ID, $idEmpleado);

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }

    public function obtenerUsuarioEmpleado($user, $pass)
    {
        //SELECT * FROM tbl_empleados WHERE usuario LIKE "empleado" AND password LIKE "1234";
        $query = "SELECT * FROM " . TBL_EMPLEADOS . " WHERE " . U_USER . " LIKE :" . U_USER . " AND " . U_PASS . " LIKE :" . U_PASS;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . U_USER, $user);
        $statement->bindValue(':' . U_PASS, $pass);

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }
}
