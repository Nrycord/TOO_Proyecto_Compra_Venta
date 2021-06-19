<?php
require_once "database/Database.php";

class ClienteModel extends Database
{
    private $nombre;
    private $apellido;
    private $direccion;
    private $dui;
    private $telefono;
    private $tipoCliente;

    public function __construct()
    {
        parent::__construct();
    }

    public function getnombre()
    {
        return $this->nombre;
    }
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getapellido()
    {
        return $this->apellido;
    }
    public function setapellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getdireccion()
    {
        return $this->direccion;
    }
    public function setdireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getdui()
    {
        return $this->dui;
    }
    public function setdui($dui)
    {
        $this->dui = $dui;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    }

    public function save()
    { //Guarda un nombre a la base de datos
        $query = "INSERT INTO " . TBL_CLIENTES . " VALUES(:" . C_NOMBRE . ", :" . C_APELLIDO . ", :" . C_DIR . ", :" . C_DUI . ", :" . C_TEL . ", :" . C_TIPO . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . C_NOMBRE, $this->getnombre());
        $statement->bindValue(':' . C_APELLIDO, $this->getapellido());
        $statement->bindValue(':' . C_DIR, $this->getdireccion());
        $statement->bindValue(':' . C_DUI, $this->getdui());
        $statement->bindValue(':' . C_TEL, $this->getTelefono());
        $statement->bindValue(':' . C_TIPO, $this->getTipoCliente());

        if ($statement->execute()) {
            header('Location: ' . BASE_DIR . 'Home/showHome');
        }
    }

    public function obtenerClientes()
    { //Obtiene todos los nombres
        $query = "SELECT * FROM " . TBL_CLIENTES;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}