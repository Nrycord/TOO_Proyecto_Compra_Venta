<?php
require_once "database/Database.php";

class Inventario extends Database
{
    private $id_sucursal;
    private $id_producto;
    private $stock;

    public function __construct()
    {
        parent::__construct();
    }

    public function InventarioNuevo($id_sucursal, $id_producto, $stock)
    {
        $this->id_sucursal = $id_sucursal;
        $this->id_producto = $id_producto;
        $this->stock = $stock;
    }

    public function get_Inventarios($filter = null)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        //SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM `detalle_inventario`AS I INNER JOIN `tbl_productos` AS PR INNER JOIN `tbl_sucursal` AS S WHERE I.id_sucursal = S.id_sucursal AND I.id_producto = PR.id_producto

        $filter != null && $filter != "0" ?
            $query = "SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM " . TBL_INVENTARIO . " AS I INNER JOIN `tbl_productos` AS PR INNER JOIN " . TBL_SUCURSAL . " AS S WHERE I." . I_ID_SUCURSAL . " = S." . S_ID . " AND I." . I_ID_PRODUCTO . " = PR.id_producto AND S.id_sucursal LIKE " . $filter
            :
            $query = "SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM " . TBL_INVENTARIO . " AS I INNER JOIN `tbl_productos` AS PR INNER JOIN " . TBL_SUCURSAL . " AS S WHERE I." . I_ID_SUCURSAL . " = S." . S_ID . " AND I." . I_ID_PRODUCTO . " = PR.id_producto ";

        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Inventario = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Inventario, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Inventarios.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Inventario;
    }

    public function get_InventariosSucursal($id)
    {
        //Unimos las tablas utilizando el id que tienen en comun
        $query = "SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM " . TBL_INVENTARIO . " AS I INNER JOIN `tbl_productos` AS PR INNER JOIN " . TBL_SUCURSAL . " AS S WHERE I." . I_ID_SUCURSAL . " = S." . S_ID . " AND I." . I_ID_PRODUCTO . " = PR.id_producto AND I." . I_ID_SUCURSAL . "= " . $id;
        //$query = "SELECT * FROM " . TBL_INVENTARIO . " WHERE " . I_ID_SUCURSAL . "= " . $id;
        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Inventario = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Inventario, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Inventarios.json", $datos); //Anexamos esos valores a el documento .json
        //header('Location: '.BASE_DIR.'/Home/showHome');//Redirigimos a Home
        //return $this->Inventario;
    }

    public function insertar()
    {
        $query = "INSERT INTO " . TBL_INVENTARIO . " VALUES(:" . I_ID . ", :" . I_ID_SUCURSAL . ", :" . I_ID_PRODUCTO . ", :" . I_STOCK . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . I_ID, NULL);
        $statement->bindValue(':' . I_ID_SUCURSAL, $this->getId_sucursal());
        $statement->bindValue(':' . I_ID_PRODUCTO, $this->getId_producto());
        $statement->bindValue(':' . I_STOCK, $this->getStock());

        $message = "<h1>Error al ingresar datos!</h1>";
        if ($statement->execute()) {
            $message = "<h1>Datos ingresados con éxito!</h1>";
        }
        return $message;
    }

    public function modificar($id)
    {
        $query = "UPDATE " . TBL_INVENTARIO . " SET " . I_ID . "=:" . I_ID . ", " . I_ID_SUCURSAL . "=:" . I_ID_SUCURSAL . ", " . I_ID_PRODUCTO . "=:" . I_ID_PRODUCTO . ", " . I_STOCK . "=:" . I_STOCK . " WHERE " . I_ID . "=:" . I_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . I_ID, $id);
        $statement->bindValue(':' . I_ID_SUCURSAL, $this->getId_sucursal());
        $statement->bindValue(':' . I_ID_PRODUCTO, $this->getId_producto());
        $statement->bindValue(':' . I_STOCK, $this->getStock());

        $message = "<h1>Error al actualizar el registro!</h1>";

        if ($statement->execute()) {
            $message = "<h1>Registro actualizado con éxito!</h1>";
        }

        return $message;
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM " . TBL_INVENTARIO . " WHERE " . I_ID . "=:" . I_ID;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . I_ID, $id);

        $message = "<h1>Error al eliminar el registro!</h1>";

        if ($statement->execute()) {
            $message = "<h1>Registro eliminado con éxito!</h1>";
        }

        return $message;
    }

    public function get_Inventario($id)
    {
        //SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM detalle_inventario AS I INNER JOIN `tbl_productos` AS PR INNER JOIN tbl_sucursal AS S WHERE I.id_inventario = 4 AND PR.id_producto = I.id_producto LIMIT 1
        $query = "SELECT I.id_inventario, I.id_sucursal, I.id_producto, I.stock, PR.nombre AS 'nombreProducto', S.nombre AS 'nombreSucursal' FROM " . TBL_INVENTARIO . " AS I INNER JOIN `tbl_productos` AS PR INNER JOIN " . TBL_SUCURSAL . " AS S WHERE I." . I_ID . " = " . $id . " AND PR.id_producto = I.id_producto LIMIT 1";
        $statement = $this->conn->prepare($query);

        if ($statement->execute()) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        }

        $row = json_encode($row, JSON_PRETTY_PRINT);
        file_put_contents("Inventarios.json", $row); //Anexamos esos valores a el documento .json
        return $row;
    }

    public function getId_sucursal()
    {
        return $this->id_sucursal;
    }
    public function setId_sucursal($id_sucursal)
    {
        $this->id_sucursal = $id_sucursal;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
}
