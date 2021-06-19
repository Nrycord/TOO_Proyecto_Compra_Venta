<?php
session_start();
class PedidoController
{

    public function __construct()
    {
        require_once "models/Pedido.php"; //Requerimos el dir de Pedido, el cual sera usado en muchas de las funciones
    }

    public function showPedidoAdmin()
    {
        $Pedido = new Pedido(); //Creamos una instancia de la clase Pedido
        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo

        //Creamos un arreglo en el que almacenamos el pedido
        $data["titulo"] = TBL_PEDIDOS;
        $data["tipo"] = "Admin";

        $filter = (!isset($_POST['filter'])) ? null : $_POST['filter'];
        $Pedido->get_Pedidos($filter); //Pedimos la lista de usuarios y los ponemos en el json

        $json = file_get_contents(BASE_DIR . 'Pedidos.json');
        $data[TBL_PEDIDOS] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_PEDIDOS] = $json;
        }
        $data[TBL_SUCURSAL] = $this->obtenerSucursales();

        //traemos la vista para mostrar los datos
        require_once "views/pedidos.php";
    }

    public function showPedidoSucursalEntrante()
    {
        $Pedido = new Pedido(); //Creamos una instancia de la clase Pedido

        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo

        //Creamos un arreglo en el que almacenamos el pedido
        $data["tipo"] = 'Entrante';

        $Pedido->get_PedidosSucursalEntrante($_SESSION[U_ID_SUCURSAL]); //Pedimos la lista de usuarios y los ponemos en el json

        $json = file_get_contents(BASE_DIR . 'Pedidos.json');
        $data[TBL_PEDIDOS] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_PEDIDOS] = $json;
        }
        //var_dump($data[TBL_PEDIDOS]);
        //traemos la vista para mostrar los datos
        require_once "views/listaPedidosA.php";
    }

    public function showPedidoSucursalSaliente()
    {
        $Pedido = new Pedido(); //Creamos una instancia de la clase Pedido

        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo

        //Creamos un arreglo en el que almacenamos el pedido

        $Pedido->get_PedidosSucursalSaliente($_SESSION[U_ID_SUCURSAL]); //Pedimos la lista de usuarios y los ponemos en el json

        $data["tipo"] = 'Saliente';
        $json = file_get_contents(BASE_DIR . 'Pedidos.json');
        $data[TBL_PEDIDOS] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_PEDIDOS] = $json;
        }
        //traemos la vista para mostrar los datos
        require_once "views/listaPedidosB.php";
    }

    public function showPedidoSucursalHistorial()
    {
        $Pedido = new Pedido(); //Creamos una instancia de la clase Pedido

        //Si la funcion viene de empleado hay que filtar por la sucursal que le corresponde
        //Si viene de admin tiene que listar todo

        //Creamos un arreglo en el que almacenamos el pedido
        $data["tipo"] = 'Historial';
        $filter = (!isset($_GET['tipo'])) ? null : $_GET['tipo'];
        $Pedido->get_PedidosSucursalHistorial($_SESSION[U_ID_SUCURSAL], $filter); //Pedimos la lista de usuarios y los ponemos en el json

        $json = file_get_contents(BASE_DIR . 'Pedidos.json');
        $data[TBL_PEDIDOS] = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data[TBL_PEDIDOS] = $json;
        }
        $data[TBL_SUCURSAL] = $this->obtenerSucursales();

        //traemos la vista para mostrar los datos
        require_once "views/pedidos.php";
    }

    public function datosPedido($id)
    {
        $Pedido = new Pedido(); //Creamos una instancia de la clase Pedido

        //Creamos un arreglo en el que almacenamos el pedido
        $Pedido->get_pedido($id);

        $json = file_get_contents(BASE_DIR . 'Pedidos.json');
        $data = "";
        if ($json != null) {
            $json = json_decode($json, true);
            $data = $json;
        }
        //traemos la vista para mostrar los datos
        require_once "views/datosPedido.php";
    }

    public function nuevo()
    {
        require_once "models/Sucursal.php";
        $data[TBL_SUCURSAL] = $this->obtenerSucursales();
        $data["titulo"] = TBL_PEDIDOS;
        require_once "views/newOrder.php";
    }

    public function guardar()
    {
        $Pedido = new Pedido();
        $Pedido->setId_sucursal($_SESSION[U_ID_SUCURSAL]);

        $Pedido->setAsunto($_POST[P_ASUNTO]);
        $Pedido->setDescripcion($_POST[P_DESCRIPCION]);
        $Pedido->setId_destino($_POST[P_ID_DESTINO]);
        $Pedido->setNvl_urgencia($_POST[P_URGENCIA]);
        $Pedido->setEstado("Pendiente");

        $Pedido->insertar();

        $data[TBL_PEDIDOS] = "Pedido";
        header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home

    }

    public function modificar($id)
    {
        if ($_COOKIE['Rol'] == "Empleado") {

            $pedido = new Pedido();
            $data[P_ID] = $id;
            $json = $pedido->get_pedido($id);
            $json = json_decode($json, true);
            $data[TBL_PEDIDOS] = $json;
            $data["titulo"] = TBL_PEDIDOS;
            require_once "views/pedido_modifica.php";
        } else {
            header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home
        }
    }

    public function actualizar()
    {
        $Pedido = new Pedido();
        $Pedido->setId_sucursal($_POST[P_ID_SUCURSAL]);
        $Pedido->setId_destino($_POST[P_ID_DESTINO]);
        $Pedido->setAsunto($_POST[P_ASUNTO]);
        $Pedido->setDescripcion($_POST[P_DESCRIPCION]);
        $Pedido->setNvl_urgencia($_POST[P_URGENCIA]);

        if ($_POST[P_ESTADO]) {
            $Pedido->setEstado($_POST[P_ESTADO]);
        } else {
            $Pedido->setEstado("Pendiente");
        }

        $Pedido->modificar($_POST[P_ID]);
        $data["titulo"] = TBL_PEDIDOS;
        header('Location: ' . BASE_DIR . '/Home/showHome'); //Redirigimos a Home

    }

    public function eliminar($id)
    {
        if ($_COOKIE['Rol'] == "Administrador") { //Si el usuario agregado no tiene el rol de admin, no podra eliminar datos
            $Pedido = new Pedido();
            $Pedido->eliminar($id);

            $data["titulo"] = TBL_PEDIDOS;
            header('Location: ' . BASE_DIR . 'Pedido/showPedidoAdmin'); //Redirigimos

        } else {
            header('Location: ' . BASE_DIR . 'Pedido/showPedidoAdmin'); //Redirigimos

        }
    }

    public function showSelectorPedido()
    {
        require_once "views/selectorPedidos.php";
    }

    public function cambiarEstado()
    {
        $Pedido = new Pedido();
        $PedidoAux = $Pedido->get_Pedido($_GET['id']);

        $Pedido->setId_sucursal($PedidoAux[P_ID_SUCURSAL]);
        $Pedido->setId_destino($PedidoAux[P_ID_DESTINO]);
        $Pedido->setAsunto($PedidoAux[P_ASUNTO]);
        $Pedido->setDescripcion($PedidoAux[P_DESCRIPCION]);
        $Pedido->setNvl_urgencia($PedidoAux[P_URGENCIA]);

        if ($_GET['estado'] == "EnProceso") {
            $Pedido->setEstado("En Proceso");
        } else {
            $Pedido->setEstado("Realizado");
        }

        $Pedido->modificar($_GET['id']);
        header('Location: ' . BASE_DIR . '/Pedido/showPedidoSucursalEntrante'); //Redirigimos
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
