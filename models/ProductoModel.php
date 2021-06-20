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

    public function __construct($idProducto = null, $nombre = null, $cantidad = null, $precioUnitario = null, $categoria = null, $idProveedor = null)
    {
        parent::__construct();
        $this->setIdProducto($idProducto);
        $this->setNombre($nombre);
        $this->setCantidad($cantidad);
        $this->setPrecioUnitario($precioUnitario);
        $this->setCategoria($categoria);
        $this->setIdProveedor($idProveedor);
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
        $query = "INSERT INTO " . TBL_PRODUCTOS . " VALUES(:" . PROD_ID . ", :" . PROD_NOMBRE . ", :" . PROD_CANTIDAD . ", :" . PROD_PRECIO . ", :" . PROD_CATEGORIA . ", :" . PROD_ID_PROV . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_ID, null);
        $statement->bindValue(':' . PROD_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . PROD_CANTIDAD, $this->getCantidad());
        $statement->bindValue(':' . PROD_PRECIO, $this->getPrecioUnitario());
        $statement->bindValue(':' . PROD_CATEGORIA, $this->getCategoria());
        $statement->bindValue(':' . PROD_ID_PROV, $this->getIdProveedor());

        //"<h1>Error al agregar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro agregado con éxito!</h1>";
        }

        return $message;
    }

    public function modificarProducto()
    {
        $query = "UPDATE " . TBL_PRODUCTOS . " SET " . PROD_NOMBRE . "=:" . PROD_NOMBRE . ", " . PROD_CANTIDAD . "=:" . PROD_CANTIDAD . ", " . PROD_PRECIO . "=:" . PROD_PRECIO . ", " . PROD_CATEGORIA . "=:" . PROD_CATEGORIA . ", " . PROD_ID_PROV . "=:" . PROD_ID_PROV . " WHERE " . PROD_ID . "=:" . PROD_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_ID, $this->getIdProducto());
        $statement->bindValue(':' . PROD_NOMBRE, $this->getNombre());
        $statement->bindValue(':' . PROD_CANTIDAD, $this->getCantidad());
        $statement->bindValue(':' . PROD_PRECIO, $this->getPrecioUnitario());
        $statement->bindValue(':' . PROD_CATEGORIA, $this->getCategoria());
        $statement->bindValue(':' . PROD_ID_PROV, $this->getIdProveedor());

        //"<h1>Error al actualizar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $message;
    }

    public function eliminarProducto()
    {
        $query = "DELETE FROM " . TBL_PRODUCTOS . " WHERE " . PROD_ID . "=: " . PROD_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_ID, $this->getIdProducto());

        //"<h1>Error al eliminar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $message;
    }

    public function obtenerProducto()
    {
        $query = "SELECT * FROM " . TBL_PRODUCTOS . " WHERE " . PROD_ID . " = :" . PROD_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_ID, $this->getIdProducto());

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }

    public function obtenerProductoPorNombre()
    {
        $query = "SELECT * FROM " . TBL_PRODUCTOS . " WHERE " . PROD_NOMBRE . " LIKE :" . PROD_NOMBRE;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PROD_NOMBRE, "%" . $this->getNombre() . "%");

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $message;
    }
}
