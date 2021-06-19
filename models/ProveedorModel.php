<?php
require_once "database/Database.php";

class ProveedorModel extends Database
{
    private $idProveedor;
    private $nombre;
    private $telefono;
    private $direccion;

    public function __construct($idProveedor = null, $nombre = null, $telefono = null, $direccion = null)
    {
        parent::__construct();
        $this->setIdProveedor($idProveedor);
        $this->setNombre($nombre);
        $this->setTelefono($telefono);
        $this->setDireccion($direccion);
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function obtenerProveedores()
    {
        $query = "SELECT * FROM " . TBL_PROVEEDORES;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function agregarProveedor()
    {
        $query = "INSERT INTO " . TBL_PROVEEDORES . " VALUES(:" . PROV_NOMBRE . ", :" . PROV_TEL . ", :" . PROV_DIR . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . PROD_CANTIDAD, $this->getTelefono());
        $statement->bindValue(':' . PROD_PRECIO, $this->getDireccion());

        //"<h1>Error al agregar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro agregado con éxito!</h1>";
        }

        return $message;
    }

    public function modificarProveedor()
    {
        $query = "UPDATE " . TBL_PROVEEDORES . " SET " . PROV_NOMBRE . "=:" . PROV_NOMBRE . ", " . PROV_TEL . "=:" . PROV_TEL . ", " . PROV_DIR . "=:" . PROV_DIR . " WHERE " . PROV_ID . "=:" . PROV_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROV_ID, $this->getIdProveedor());
        $statement->bindValue(':' . PROV_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . PROV_TEL, $this->getTelefono());
        $statement->bindValue(':' . PROV_DIR, $this->getDireccion());

        //"<h1>Error al actualizar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $message;
    }

    public function eliminarProveedor()
    {
        $query = "DELETE FROM " . TBL_PROVEEDORES . " WHERE " . PROV_ID . "=: " . PROV_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROV_ID, $this->getIdProveedor());

        //"<h1>Error al eliminar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $message;
    }

    public function obtenerProveedor()
    {
        $query = "SELECT * FROM " . TBL_PROVEEDORES . " WHERE " . PROV_ID . " =: " . PROV_ID . " )";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROV_ID, $this->getIdProveedor());

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }
}
