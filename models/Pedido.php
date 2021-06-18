<?php
require_once "database/Database.php";

class Pedido extends Database
{
    private $id_sucursal;
    private $id_destino;
    private $asunto;
    private $descripcion;
    private $nvl_urgencia;
    private $estado;
    private $nombreSucursal;

    public function __construct()
    {
        parent::__construct();
    }

    public function pedidoNuevo($id_sucursal, $id_destino, $asunto, $descripcion, $nvl_urgencia, $estado, $nombreSucursal)
    {
        $this->id_sucursal = $id_sucursal;
        $this->id_destino = $id_destino;
        $this->asunto = $asunto;
        $this->descripcion = $descripcion;
        $this->nvl_urgencia = $nvl_urgencia;
        $this->estado = $estado;
        $this->nombreSucursal = $nombreSucursal;
    }

    public function get_Pedidos($filter = null)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        //SELECT * FROM `tbl_pedidos` WHERE `estado` = "Pendiente" OR `estado` = "En Proceso"
        //SELECT * FROM `tbl_pedidos` WHERE id_sucursal LIKE 1 OR id_destino LIKE 1
        $filter != null ?
            $query = "SELECT * FROM " . TBL_PEDIDOS . " WHERE id_sucursal LIKE " . $filter . " OR id_destino LIKE " . $filter
            :
            $query = "SELECT * FROM " . TBL_PEDIDOS;

        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Pedido = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Pedido, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Pedidos.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Pedido;
    }

    public function get_PedidosSucursalEntrante($id)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE P." . P_ID_DESTINO . " = " . $id . " AND P." . P_ID_SUCURSAL .  " = S." . S_ID . " AND (P." . P_ESTADO . " = 'Pendiente' OR P." . P_ESTADO . " = 'En Proceso')";
        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Pedido = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Pedido, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Pedidos.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Pedido;
    }

    public function get_PedidosSucursalSaliente($id)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE P." . P_ID_SUCURSAL . " = " . $id . " AND P." . P_ID_DESTINO . " = S." . S_ID . " AND (P." . P_ESTADO . " = 'Pendiente' OR P." . P_ESTADO . " = 'En Proceso')";
        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Pedido = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Pedido, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Pedidos.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Pedido;
    }

    public function get_PedidosSucursalHistorial($id, $filter = null)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        //SELECT * FROM `tbl_pedidos` WHERE ( `id_sucursal` = 1 OR `id_destino` = 1 ) AND `estado` = "Realizado"
        $filter != null ?
            ($filter == "entrantes" ?
                $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE P." . P_ID_DESTINO . " = " . $id . " AND P." . P_ID_SUCURSAL .  " = S." . S_ID . " AND " . P_ESTADO . " = 'Realizado'"
                :
                $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE P." . P_ID_SUCURSAL . " = " . $id . " AND P." . P_ID_DESTINO . " = S." . S_ID . " AND " . P_ESTADO . " = 'Realizado'")
            :
            $query = "SELECT * FROM " . TBL_PEDIDOS . " WHERE ( " . P_ID_SUCURSAL . " = " . $id . " ) AND " . P_ESTADO . " = 'Realizado'";

        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Pedido = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Pedido, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Pedidos.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Pedido;
    }

    public function insertar()
    {
        $query = "INSERT INTO " . TBL_PEDIDOS . " VALUES(:" . P_ID . ", :" . P_ID_SUCURSAL . ", :" . P_ID_DESTINO . ", :" . P_ASUNTO . ", :" . P_DESCRIPCION . ", :" . P_URGENCIA . ", :" . P_ESTADO . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, NULL);
        $statement->bindValue(':' . P_ID_SUCURSAL, $this->getId_sucursal());
        $statement->bindValue(':' . P_ID_DESTINO, $this->getId_destino());
        $statement->bindValue(':' . P_ASUNTO, $this->getAsunto());
        $statement->bindValue(':' . P_DESCRIPCION, $this->getDescripcion());
        $statement->bindValue(':' . P_URGENCIA, $this->getNvl_urgencia());
        $statement->bindValue(':' . P_ESTADO, $this->getEstado());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function modificar($id)
    {
        $query = "UPDATE " . TBL_PEDIDOS . " SET " . P_ID_SUCURSAL . "=:" . P_ID_SUCURSAL . ", " . P_ID_DESTINO . "=:" . P_ID_DESTINO . ", " . P_ASUNTO . "=:" . P_ASUNTO . ", " . P_DESCRIPCION . "=:" . P_DESCRIPCION . ", " . P_URGENCIA . "=:" . P_URGENCIA . ", " . P_ESTADO . "=:" . P_ESTADO . " WHERE " . P_ID . "=:" . P_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $id);
        $statement->bindValue(':' . P_ID_SUCURSAL, $this->getId_sucursal());
        $statement->bindValue(':' . P_ID_DESTINO, $this->getId_destino());
        $statement->bindValue(':' . P_ASUNTO, $this->getAsunto());
        $statement->bindValue(':' . P_DESCRIPCION, $this->getDescripcion());
        $statement->bindValue(':' . P_URGENCIA, $this->getNvl_urgencia());
        $statement->bindValue(':' . P_ESTADO, $this->getEstado());

        $message = "<h1>Error al actualizar el registro!</h1>";

        if ($statement->execute()) {
            $message = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $message;
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM " . TBL_PEDIDOS . " WHERE " . P_ID . "=:" . P_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $id);

        $message = "<h1>Error al eliminar el registro!</h1>";

        if ($statement->execute()) {
            $message = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $message;
    }

    public function get_Pedido($id)
    {
        $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE P." . P_ID_SUCURSAL . " = " . $id . " AND P." . P_ID_DESTINO . " = S." . S_ID . " AND (P." . P_ESTADO . " = 'Pendiente' OR P." . P_ESTADO . " = 'En Proceso')";
        $query = "SELECT S.nombre, P.id_pedido, P.id_sucursal, P.id_destino, P.asunto, P.descripcion, P.nvl_urgencia, P.estado FROM " . TBL_PEDIDOS . " AS P INNER JOIN " . TBL_SUCURSAL . " AS S WHERE  P." . P_ID . "=:" . P_ID . " AND P." . P_ID_DESTINO . " = S." . S_ID . " LIMIT 1";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . P_ID, $id);

        if ($statement->execute()) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        }

        $row = json_encode($row, JSON_PRETTY_PRINT);
        file_put_contents("Pedidos.json", $row); //Anexamos esos valores a el documento .json
        $row = json_decode($row, JSON_PRETTY_PRINT);
        return $row;
    }

    //Cambia el propietario de un vehiculo de "null" a el id del usuario que tiene la sesion iniciada

    /**
     * Get the value of id_sucursal
     */
    public function getId_sucursal()
    {
        return $this->id_sucursal;
    }

    /**
     * Set the value of id_sucursal
     *
     * @return self
     */
    public function setId_sucursal($id_sucursal)
    {
        $this->id_sucursal = $id_sucursal;

        return $this;
    }

    /**
     * Get the value of id_destino
     */
    public function getId_destino()
    {
        return $this->id_destino;
    }

    /**
     * Set the value of id_destino
     *
     * @return self
     */
    public function setId_destino($id_destino)
    {
        $this->id_destino = $id_destino;

        return $this;
    }

    /**
     * Get the value of asunto
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set the value of asunto
     *
     * @return self
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of nvl_urgencia
     */
    public function getNvl_urgencia()
    {
        return $this->nvl_urgencia;
    }

    /**
     * Set the value of nvl_urgencia
     *
     * @return self
     */
    public function setNvl_urgencia($nvl_urgencia)
    {
        $this->nvl_urgencia = $nvl_urgencia;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
