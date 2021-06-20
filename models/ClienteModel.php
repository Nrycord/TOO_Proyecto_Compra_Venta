<?php
require_once "database/Database.php";

class ClienteModel extends Database
{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $direccion;
    private $dui;
    private $telefono;
    private $tipoCliente;

    public function __construct($idCliente = null, $nombre = null, $apellido = null, $direccion = null, $dui = null, $telefono = null, $tipoCliente = null)
    {
        parent::__construct();
        $this->setIdCliente($idCliente);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setdireccion($direccion);
        $this->setDui($dui);
        $this->setTelefono($telefono);
        $this->setTipoCliente($tipoCliente);
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDui()
    {
        return $this->dui;
    }
    public function setDui($dui)
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

    public function obtenerClientes()
    { //Obtiene todos los nombres
        $query = "SELECT * FROM " . TBL_CLIENTES;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function agregarCliente()
    { //Guarda un nombre a la base de datos
        $query = "INSERT INTO " . TBL_CLIENTES . " VALUES(:" . C_NOMBRE . ", :" . C_APELLIDO . ", :" . C_DIR . ", :" . C_DUI . ", :" . C_TEL . ", :" . C_TIPO;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . C_NOMBRE, $this->getnombre());
        $statement->bindValue(':' . C_APELLIDO, $this->getapellido());
        $statement->bindValue(':' . C_DIR, $this->getdireccion());
        $statement->bindValue(':' . C_DUI, $this->getdui());
        $statement->bindValue(':' . C_TEL, $this->getTelefono());
        $statement->bindValue(':' . C_TIPO, $this->getTipoCliente());

        //"<h1>Error al agregar el registro!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = "<h1>Registro agregado con éxito!</h1>";
        }

        return $result;
    }

    public function modificarCliente()
    {
        $query = "UPDATE " . TBL_CLIENTES . " SET " . C_NOMBRE . "=:" . C_NOMBRE . ", " . C_APELLIDO . "=:" . C_APELLIDO . ", " . C_DIR . "=:" . C_DIR . ", " . C_DUI . "=:" . C_DUI . ", " . C_TEL . "=:" . C_TEL . ", " . C_TIPO . "=:" . C_TIPO . " WHERE " . C_ID . "=:" . C_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . C_ID, $this->getIdCliente());
        $statement->bindValue(':' . C_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . C_APELLIDO, $this->getApellido());
        $statement->bindValue(':' . C_DIR, $this->getDireccion());
        $statement->bindValue(':' . C_DUI, $this->getDui());
        $statement->bindValue(':' . C_TEL, $this->getTelefono());
        $statement->bindValue(':' . C_TIPO, $this->getTipoCliente());

        //"<h1>Error al actualizar el registro!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $result;
    }

    public function eliminarCliente()
    {
        $query = "DELETE FROM " . TBL_CLIENTES . " WHERE " . C_ID . "=: " . C_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . C_ID, $this->getIdCliente());

        //"<h1>Error al eliminar el registro!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $result;
    }

    public function obtenerCliente()
    {
        $query = "SELECT * FROM " . TBL_CLIENTES . " WHERE " . C_ID . " = :" . C_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . C_ID, $this->getIdCliente());

        //"<h1>Registro no encontrado!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
