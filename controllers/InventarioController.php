<?php
session_start();
class InventarioController
{

    public function __construct()
    {
        require_once "models/Inventario.php"; //Requerimos el dir de Inventario, el cual sera usado en muchas de las funciones
    }

    public function showInventarioAdmin()
    {
        $Inventario = new Inventario(); //Creamos una instancia de la clase Inventario

        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo

        //Creamos un arreglo en el que almacenamos el Inventario
        $data["titulo"] = TBL_INVENTARIO;
        $data["tipo"] = "Admin";
        //$data[TBL_INVENTARIO] = 
        $filter = (!isset($_POST['filter'])) ? null : $_POST['filter'];
        $data["titulo"] = TBL_INVENTARIO;
        $Inventario->get_Inventarios($filter); //Pedimos la lista de usuarios y los ponemos en el json
        $json = file_get_contents(BASE_DIR . 'Inventarios.json');
        $data[TBL_INVENTARIO] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_INVENTARIO] = $json;
        }

        $data[TBL_SUCURSAL] = $this->obtenerSucursales();
        //traemos la vista para mostrar los datos
        require_once "views/inventory.php";
    }

    public function showInventarioSucursal()
    {
        $Inventario = new Inventario(); //Creamos una instancia de la clase Inventario

        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo
        $data["titulo"] = TBL_INVENTARIO;
        $data["tipo"] = "Sucursal";

        $Inventario->get_InventariosSucursal($_SESSION[U_ID_SUCURSAL]); //Pedimos la lista de usuarios y los ponemos en el json

        $json = file_get_contents(BASE_DIR . 'Inventarios.json');
        $data[TBL_INVENTARIO] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_INVENTARIO] = $json;
        }
        //traemos la vista para mostrar los datos
        require_once "views/inventory.php";
    }

    public function datosInventario($id)
    {
        $Inventario = new Inventario(); //Creamos una instancia de la clase Inventario

        //Creamos un arreglo en el que almacenamos el Inventario
        $Inventario->get_Inventario($id);

        $json = file_get_contents(BASE_DIR . 'Inventarios.json');
        $data = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data = $json;
        }

        //traemos la vista para mostrar los datos
        require_once "views/datosInventario.php";
    }

    public function nuevo()
    {
        $data["titulo"] = TBL_INVENTARIO;
        require_once "views/Inventario_nuevo.php";
    }

    public function guardar()
    {
        $Inventario = new Inventario();
        $Inventario->setId_sucursal($_POST[I_ID_SUCURSAL]);
        $Inventario->setId_producto($_POST[I_ID_PRODUCTO]);
        $Inventario->setStock($_POST[I_STOCK]);

        $Inventario->insertar();

        $data[TBL_INVENTARIO] = "Inventario";
        header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home

    }

    public function modificar($id)
    {
        $Inventario = new Inventario();
        $data[I_ID] = $id;
        $json = $Inventario->get_Inventario($id);
        $json = json_decode($json, true);
        $data[TBL_INVENTARIO] = $json;
        $data["titulo"] = TBL_INVENTARIO;
        require_once "views/Inventario_modifica.php";
        //        header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home
    }

    public function actualizar()
    {
        $Inventario = new Inventario();
        $Inventario->setId_sucursal($_POST[I_ID_SUCURSAL]);
        $Inventario->setId_producto($_POST[I_ID_PRODUCTO]);
        $Inventario->setStock($_POST[I_STOCK]);


        $Inventario->modificar($_POST[I_ID]);

        $data["titulo"] = TBL_INVENTARIO;
        header('Location: ' . BASE_DIR . '/Inventario/showInventarioSucursal'); //Redirigimos

    }

    public function eliminar($id)
    {
        if ($_COOKIE['Rol'] == "Administrador") { //Si el usuario agregado no tiene el rol de admin, no podra eliminar datos
            $Inventario = new Inventario();
            $Inventario->eliminar($id);

            $data["titulo"] = TBL_INVENTARIO;
            header('Location: ' . BASE_DIR . '/Inventario/showInventarioAdmin'); //Redirigimos
        } else {
            header('Location: ' . BASE_DIR . '/Inventario/showInventarioAdmin'); //Redirigimos
        }
    }


    public function obtenerSucursales()
    {
        require_once "models/Sucursal.php";
        $s = new Sucursal();
        $s->getSucursales();
        $json = file_get_contents(BASE_DIR . 'Sucursales.json');
        $data[TBL_SUCURSAL] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_SUCURSAL] = $json;
        }
        return $data[TBL_SUCURSAL];
    }
}
