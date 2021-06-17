<?php
require_once "database/Database.php";

class Usuario extends Database
{
    private $usuario;
    private $pass;
    private $id_sucursal;
    private $rol;

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

    public function getId_sucursal()
    {
        return $this->id_sucursal;
    }
    public function setId_sucursal($id_sucursal)
    {
        $this->id_sucursal = $id_sucursal;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    public function save()
    { //Guarda un usuario a la base de datos
        $query = "INSERT INTO " . TBL_USUARIOS . " VALUES(:" . U_ID . ", :" . U_USUARIO . ", :" . U_PASSWORD . ", :" . U_ID_SUCURSAL . ", :" . U_ROL . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . U_ID, NULL);
        $statement->bindValue(':' . U_USUARIO, $this->getUsuario());
        $statement->bindValue(':' . U_PASSWORD, $this->getPass());
        $statement->bindValue(':' . U_ID_SUCURSAL, $this->getId_sucursal());
        $statement->bindValue(':' . U_ROL, $this->getRol());

        if ($statement->execute()) {
            header('Location: ' . BASE_DIR . 'Home/showHome');
        }
    }

    public function getAll()
    { //Obtiene todos los usuarios
        $query = "SELECT * FROM " . TBL_USUARIOS;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
