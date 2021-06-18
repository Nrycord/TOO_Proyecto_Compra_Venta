<?php
require_once "database/Database.php";

class Sucursal extends Database
{
    private $nombre;
    private $direccion;
    private $num_empleados;

    public function __construct()
    {
        parent::__construct();
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getNum_empleados()
    {
        return $this->num_empleados;
    }
    public function setNum_empleados($num_empleados)
    {
        $this->num_empleados = $num_empleados;
    }

    public function save()
    { //Guarda un Sucursal a la base de datos
        $query = "INSERT INTO " . TBL_SUCURSAL . " VALUES(:" . S_ID . ", :" . S_NOMBRE_SUCURSAL . ", :" . S_DIRECCION . ", :" . S_NUM_EMPLEADOS . ")";
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . S_ID, NULL);
        $statement->bindValue(':' . S_NOMBRE_SUCURSAL, $this->getNombre());
        $statement->bindValue(':' . S_DIRECCION, $this->getDireccion());
        $statement->bindValue(':' . S_NUM_EMPLEADOS, $this->getNum_empleados());

        if ($statement->execute()) {
            header('Location: ' . BASE_DIR . 'Home/showHome');
        }
    }

    public function getSucursales()
    { //Obtiene todos los Sucursales
        $query = "SELECT * FROM " . TBL_SUCURSAL;
        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $this->Sucursal = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        $datos = json_encode($this->Sucursal, JSON_PRETTY_PRINT); //Pasamos el arreglo asociativo a el json
        file_put_contents("Sucursales.json", $datos);
        return $datos;
    }
}
