<?php
require_once "database/Database.php";

class productoProveedor extends Database
{
    private $id;
    private $idProducto;
    private $idProveedor;
    private $precioCompra;


    public function __construct()
    {
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    public function obtenerMejorPrecioDisponible($idProducto)
    {
        //SELECT idProdProv, idProducto, idProveedor, MIN(precioCompra) AS precioCompra FROM tbl_producto_proveedor WHERE idProducto = 0 GROUP BY idProveedor ORDER BY precioCompra LIMIT 1
        $query = "SELECT " . PRPV_ID . ", " . PRPV_ID_PROD . ", " . PRPV_ID_PROV . ", MIN(" . PRPV_PRECIO . ") AS " . PRPV_PRECIO . " FROM " . TBL_PROD_PROV . " WHERE " . PRPV_ID_PROD . " = " . $idProducto . " GROUP BY " . PRPV_ID_PROV . " ORDER BY " . PRPV_PRECIO . " LIMIT 1";
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function agregarPrecioDeProveedorNuevo($idProducto, $idProveedor, $precioCompra)
    {
        $query = "INSERT INTO " . TBL_PROD_PROV . " VALUES(:" . PRPV_ID_PROD . ", :" . PRPV_ID_PROV . ", :" . PRPV_PRECIO . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . PRPV_ID_PROD, $idProducto);
        $statement->bindValue(':' . PRPV_ID_PROV, $idProveedor);
        $statement->bindValue(':' . PRPV_PRECIO, $precioCompra);

        //"<h1>Error al agregar el registro!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = "<h1>Registro agregado con éxito!</h1>";
        }

        return $message;
    }
}
