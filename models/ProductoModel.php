<?php
require_once "database/Database.php";

class ProductoModel extends Database
{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioUnitario;
    private $categoria;
    private $idProveedor;

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function obtenerProductos()
    {
        $query = "SELECT * FROM " . TBL_PRODUCTOS;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function agregarProducto()
    {
        $query = "INSERT INTO " . TBL_PRODUCTOS . " VALUES(:" . P_NOMBRE . ", :" . P_CANTIDAD . ", :" . P_PRECIO . ", :" . P_CATEGORIA . ", :" . P_ID_PROV . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . P_CANTIDAD, $this->getCantidad());
        $statement->bindValue(':' . P_PRECIO, $this->getPrecioUnitario());
        $statement->bindValue(':' . P_CATEGORIA, $this->getCategoria());
        $statement->bindValue(':' . P_ID_PROV, $this->getIdProveedor());

        //"<h1>Error al agregar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro agregado con éxito!</h1>";
        }

        return $message;
    }

    public function modificarProducto()
    {
        $query = "UPDATE " . TBL_PRODUCTOS . " SET " . P_NOMBRE . "=:" . P_NOMBRE . ", " . P_CANTIDAD . "=:" . P_CANTIDAD . ", " . P_PRECIO . "=:" . P_PRECIO . ", " . P_CATEGORIA . "=:" . P_CATEGORIA . ", " . P_ID_PROV . "=:" . P_ID_PROV . " WHERE " . P_ID . "=:" . P_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $this->getIdProducto());
        $statement->bindValue(':' . P_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . P_CANTIDAD, $this->getCantidad());
        $statement->bindValue(':' . P_PRECIO, $this->getPrecioUnitario());
        $statement->bindValue(':' . P_CATEGORIA, $this->getCategoria());
        $statement->bindValue(':' . P_ID_PROV, $this->getIdProveedor());

        //"<h1>Error al actualizar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $message;
    }

    public function eliminarProducto()
    {
        $query = "DELETE FROM " . TBL_PRODUCTOS . " WHERE " . P_ID . "=: " . P_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $this->getIdProducto());

        //"<h1>Error al eliminar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $message;
    }

    public function obtenerProducto($idProducto)
    {
        $query = "SELECT * FROM " . TBL_PRODUCTOS . " WHERE " . P_ID . " =: " . P_ID . " )";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $idProducto);

        //"<h1>Cliente no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }
}
