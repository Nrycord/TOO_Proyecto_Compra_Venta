<?php
//Definimos constantes las cuales nos capturan los datos de la tabla

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_maquila_oriente');
define('DB_CHARSET', 'utf8');

//Campos de la tabla
define('TBL_USUARIOS', 'tbl_usuarios'); //Nombre de la tabla 1
define('U_ID', 'id_usuario'); //Campos de la tabla 1
define('U_USUARIO', 'username'); //Campos de la tabla 1
define('U_PASSWORD', 'password'); //Campos de la tabla 1
define('U_ROL', 'rol'); //Campos de la tabla 1
define('U_ID_SUCURSAL', 'id_sucursal'); //Campos de la tabla 1


define('TBL_PEDIDOS', 'tbl_pedidos'); //Nombre de la tabla 2
define('P_ID', 'id_pedido'); //Campos de la tabla 1
define('P_ID_SUCURSAL', 'id_sucursal'); //Campos de la tabla 2
define('P_ID_DESTINO', 'id_destino'); //Campos de la tabla 2
define('P_ASUNTO', 'asunto'); //Campos de la tabla 2
define('P_DESCRIPCION', 'descripcion'); //Campos de la tabla 2
define('P_URGENCIA', 'nvl_urgencia'); //Campos de la tabla 2
define('P_ESTADO', 'estado'); //Campos de la tabla 2

define('TBL_INVENTARIO', 'detalle_inventario'); //Nombre de la tabla 2
define('I_ID', 'id_inventario'); //Campos de la tabla 1
define('I_ID_SUCURSAL', 'id_sucursal'); //Campos de la tabla 2
define('I_ID_PRODUCTO', 'id_producto'); //Campos de la tabla 2
define('I_STOCK', 'stock'); //Campos de la tabla 2
define('I_NOMBRE_PRODUCTO', 'nombreProducto'); //Campos de la tabla 2
define('I_NOMBRE_SUCURSAL', 'nombreSucursal'); //Campos de la tabla 2


define('TBL_SUCURSAL', 'tbl_sucursal'); //Nombre de la tabla 2
define('S_ID', 'id_sucursal'); //Campos de la tabla 1
define('S_NOMBRE_SUCURSAL', 'nombre'); //Campos de la tabla 2
define('S_DIRECCION', 'direccion'); //Campos de la tabla 2
define('S_NUM_EMPLEADOS', 'num_empleados'); //Campos de la tabla 2