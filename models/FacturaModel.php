<?php
require_once "database/Database.php";
require_once "models/ClienteModel.php";

class FacturaModel extends Database
{
    private $idFactura;
    private $nombreCliente;
    private $duiCliente;
    private $direccionCliente;
    private $detalleFactura;
    private $subTotal;
    private $ivaRetenido;
    private $total;


    public function __construct($idFactura = null, $nombreCliente = null, $duiCliente = null, $direccionCliente = null, $detalleFactura = null, $subtotal = null, $ivaRetenido = null, $total = null)
    {
        parent::__construct();
        $this->setIdFactura($idFactura);
        $this->setNombreCliente($nombreCliente);
        $this->setDuiCliente($duiCliente);
        $this->setDireccionCliente($direccionCliente);
        $this->setDetalleFactura($detalleFactura);
        $this->setSubTotal($subtotal);
        $this->setIvaRetenido($ivaRetenido);
        $this->setTotal($total);
    }

    public function getIdFactura()
    {
        return $this->idFactura;
    }

    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    public function getDetalleFactura()
    {
        return $this->detalleFactura;
    }

    public function setDetalleFactura($detalleFactura)
    {
        $this->detalleFactura = $detalleFactura;

        return $this;
    }

    public function getSubTotal()
    {
        return $this->subTotal;
    }

    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;

        return $this;
    }

    public function getDuiCliente()
    {
        return $this->duiCliente;
    }

    public function setDuiCliente($duiCliente)
    {
        $this->duiCliente = $duiCliente;

        return $this;
    }

    public function getDireccionCliente()
    {
        return $this->direccionCliente;
    }

    public function setDireccionCliente($direccionCliente)
    {
        $this->direccionCliente = $direccionCliente;

        return $this;
    }

    public function getIvaRetenido()
    {
        return $this->ivaRetenido;
    }

    public function setIvaRetenido($ivaRetenido)
    {
        $this->ivaRetenido = $ivaRetenido;

        return $this;
    }

    public function obtenerFacturasConsumidorFinal()
    {
        $query = "SELECT * FROM " . TBL_FACTURAS_CONF;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerFacturasCreditoFiscal()
    {
        $query = "SELECT * FROM " . TBL_FACTURAS_CRTF;
        $statement = $this->conn->prepare($query);

        $result = false;

        if ($statement->execute())
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function generarFacturaConsumidorFinal()
    {
        //Guarda una factura a la base de datos
        $query = "INSERT INTO " . TBL_FACTURAS_CONF . " VALUES(:" . F_ID . ",:" . F_FECHA_FACTURACION . ",:" . F_NOMBRE_CLIENTE . ", :" . F_DUI_CLIENTE . ", :" . F_DIRECCION_CLIENTE . ", :" . F_DETALLE_FACTURA . ", :" . F_SUBTOTAL . ", :" . F_IVA_RETENIDO . ", :" . F_TOTAL . ", :" . F_ESTADO . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . F_ID, null);
        $statement->bindValue(':' . F_FECHA_FACTURACION, null);
        $statement->bindValue(':' . F_NOMBRE_CLIENTE, $this->getNombreCliente());
        $statement->bindValue(':' . F_DUI_CLIENTE, $this->getDuiCliente());
        $statement->bindValue(':' . F_DIRECCION_CLIENTE, $this->getDireccionCliente());
        $statement->bindValue(':' . F_DETALLE_FACTURA, $this->getDetalleFactura());
        $statement->bindValue(':' . F_SUBTOTAL, $this->getSubTotal());
        $statement->bindValue(':' . F_IVA_RETENIDO, $this->getIvaRetenido());
        $statement->bindValue(':' . F_TOTAL, $this->getTotal());
        $statement->bindValue(':' . F_ESTADO, "Emitida");
        $result = false;
        if ($statement->execute()) {
            //header('Location: ' . BASE_DIR . 'Home/showHome');
            $query = "SELECT * FROM " . TBL_FACTURAS_CONF . " ORDER BY  " . F_ID . " DESC LIMIT 1";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function generarFacturaCreditoFiscal()
    {
        //Guarda una factura a la base de datos
        $query = "INSERT INTO " . TBL_FACTURAS_CRTF . " VALUES(:" . CRTF_ID . ",:" . CRTF_FECHA_FACTURACION . ",:" . CRTF_NOMBRE_CLIENTE . ", :" . CRTF_DUI_CLIENTE . ", :" . CRTF_DIRECCION_CLIENTE . ", :" . CRTF_DETALLE_FACTURA . ", :" . CRTF_SUBTOTAL . ", :" . CRTF_IVA_RETENIDO . ", :" . CRTF_TOTAL . ", :" . CRTF_ESTADO . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . CRTF_ID, null);
        $statement->bindValue(':' . CRTF_FECHA_FACTURACION, null);
        $statement->bindValue(':' . CRTF_NOMBRE_CLIENTE, $this->getNombreCliente());
        $statement->bindValue(':' . CRTF_DUI_CLIENTE, $this->getDuiCliente());
        $statement->bindValue(':' . CRTF_DIRECCION_CLIENTE, $this->getDireccionCliente());
        $statement->bindValue(':' . CRTF_DETALLE_FACTURA, $this->getDetalleFactura());
        $statement->bindValue(':' . CRTF_SUBTOTAL, $this->getSubTotal());
        $statement->bindValue(':' . CRTF_IVA_RETENIDO, $this->getIvaRetenido());
        $statement->bindValue(':' . CRTF_TOTAL, $this->getTotal());
        $statement->bindValue(':' . CRTF_ESTADO, "Emitida");

        $result = false;
        if ($statement->execute()) {
            $query = "SELECT * FROM " . TBL_FACTURAS_CRTF . " ORDER BY  " . CRTF_ID . " DESC LIMIT 1";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function anularFactura($idFactura, $tipoFactura)
    {

        if ($tipoFactura == "Consumidor Final") {
            $query = "UPDATE " . TBL_FACTURAS_CONF . " SET " . F_ESTADO . "=:" . F_ESTADO . " WHERE " . F_ID . "=:" . F_ID;
            $statement = $this->conn->prepare($query);

            $statement->bindValue(':' . F_ID, $idFactura);
            $statement->bindValue(':' . F_ESTADO, "Anulada");

            if ($statement->execute()) {
                header('Location: ' . BASE_DIR . 'Home/mostrarHomePage');
            }
        } elseif ($tipoFactura == "Credito Fiscal") {
            $query = "UPDATE " . TBL_FACTURAS_CRTF . " SET " . CRTF_ESTADO . "=:" . CRTF_ESTADO . " WHERE " . CRTF_ID . "=:" . CRTF_ID;
            $statement = $this->conn->prepare($query);

            $statement->bindValue(':' . CRTF_ID, $idFactura);
            $statement->bindValue(':' . CRTF_ESTADO, "Anulada");

            if ($statement->execute()) {
                header('Location: ' . BASE_DIR . 'Home/mostrarHomePage');
            }
        }
    }
}
