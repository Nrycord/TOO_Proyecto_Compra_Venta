<?php
session_start();
class SucursalController
{

    public function __construct()
    {
        require_once "models/Sucursal.php"; //Requerimos el dir de Sucursal, el cual sera usado en muchas de las funciones
    }

    public function register()
    {
        require_once "views/registerSucursal.php";
    }

    public function save()
    {   //Realiza el proceso para registrar un nuevo usuario
        require_once "models/Sucursal.php";

        $sucursal = new Sucursal(); //Toma todos los datos del post
        $sucursal->setNombre($_POST[S_NOMBRE_SUCURSAL]);
        $sucursal->setDireccion($_POST[S_DIRECCION]);
        $sucursal->setNum_empleados($_POST[S_NUM_EMPLEADOS]);
        $sucursal->save(); //Realizamos el guardado en la base de datos
    }

    public function showSelectorAdmin()
    {
        require_once "views/listaSucursales.php";
    }

    public function showSucursalAdmin()
    {
        $Sucursal = new Sucursal(); //Creamos una instancia de la clase Sucursal

        //Creamos un arreglo en el que almacenamos el Sucursal
        $data["titulo"] = TBL_SUCURSAL;
        //$data[TBL_INVENTARIO] = 
        $Sucursal->getSucursales(); //Pedimos la lista de usuarios y los ponemos en el json
        $json = file_get_contents(BASE_DIR . 'Sucursales.json');
        $data[TBL_SUCURSAL] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_SUCURSAL] = $json;
        }

        //traemos la vista para mostrar los datos
        require_once "views/sucursales.php";
    }
}
