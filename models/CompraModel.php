<?php
require_once "database/Database.php";
require_once "models/Usuario.php";

class CompraModel extends Usuario
{
    private $idCompra;
    private $detalleCompra;
    private $total;
    public function __construct()
    {
        parent::__construct();
    }

    public function getidCompra()
    {
        return $this->idCompra;
    }

    public function setidCompra($idCompra)
    {
        $this->idCompra = $idCompra;
    }

    public function getdetalleCompra()
    {
        return $this->detalleCompra;
    }

    public function setdetalleCompra($detalleCompra)
    {
        $this->detalleCompra = $detalleCompra;
    }


    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function obtenerCompras()
    {
        $query = "SELECT * FROM " . TBL_ADMIN;
        $statement = $this->conn->prepare($query);

        //"<h1>Registro no encontrado!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function agregarCompra()
    {
        $query = "INSERT INTO " . TBL_COMPRAS . " VALUES(:" . COMPRAS_ID . ", :" . COMPRAS_DETALLE .  ", :" . COMPRAS_TOTAL . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . COMPRAS_ID, null);
        $statement->bindValue(':' . COMPRAS_DETALLE, $this->getdetalleCompra());
        $statement->bindValue(':' . COMPRAS_TOTAL, $this->getTotal());
        //"<h1>Error al agregar el registro!</h1>"
        $result = false;

        if ($statement->execute()) {
            $result = "<h1>Registro agregado con éxito!</h1>";
        }

        return $result;
    }
}
