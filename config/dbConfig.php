<?php
//Definimos constantes las cuales nos capturan los datos de la tabla

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_too_compra_venta');
define('DB_CHARSET', 'utf8');

//Nombre de la tabla 1
define('TBL_CLIENTES', 'tbl_clientes');
//Campos de la tabla 1
define('C_ID', 'idCliente');
define('C_NOMBRE', 'nombre');
define('C_APELLIDO', 'apellido');
define('C_DIR', 'direccion');
define('C_DUI', 'dui');
define('C_TEL', 'telefono');
define('C_TIPO', 'tipoCliente');

//Nombre de la tabla 2
define('TBL_PRODUCTOS', 'tbl_productos');
//Campos de la tabla 2
define('PROD_ID', 'idProducto');
define('PROD_NOMBRE', 'nombre');
define('PROD_CANTIDAD', 'cantidad');
define('PROD_PRECIO', 'precioUnitario');
define('PROD_CATEGORIA', 'categoria');
define('PROD_ID_PROV', 'idProveedor');

//Nombre de la tabla 3
define('TBL_PROVEEDORES', 'tbl_proveedores');
//Campos de la tabla 3
define('PROV_ID', 'idProveedor');
define('PROV_NOMBRE', 'nombre');
define('PROV_TEL', 'telefono');
define('PROV_DIR', 'direccion');

//Nombre de la tabla 4 y 5
define('TBL_EMPLEADOS', 'tbl_empleados');
define('EMP_ID', 'idEmpleado');

//Nombre de la tabla 5
define('TBL_ADMIN', 'tbl_administradores');
define('ADMIN_ID', 'idAdministrador');

//Campos de la tabla 4 y 5. Mutuos heredados de Usuario
define('U_NOMBRE', 'nombre');
define('U_APELLIDO', 'apellido');
define('U_USER', 'usuario');
define('U_PASS', 'password');
define('U_TIPO', 'tipoUsuario');

//Nombre de la tabla 3
define('TBL_PROD_PROV', 'tbl_productos_proveedor');
//Campos de la tabla 3
define('PRPV_ID', 'idProdProv');
define('PRPV_ID_PROD', 'idProducto');
define('PRPV_ID_PROV', 'idProveedor');
define('PRPV_PRECIO', 'precioCompra');

//Nombre de la tabla FACTURAS CONSUMIDOR FINAL
define('TBL_FACTURAS_CONF', '');
//Campos de la tabla
define('F_ID', '');
define('F_FECHA_FACTURACION', '');
define('F_NOMBRE_CLIENTE', '');
define('F_DUI_CLIENTE', '');
define('F_DIRECCION_CLIENTE', '');
define('F_DETALLE_FACTURA', '');
define('F_SUBTOTAL', '');
define('F_IVA_RETENIDO', '');
define('F_TOTAL', '');
define('F_ESTADO', '');

//Nombre de la tabla FACTURAS CREDITO FISCAL
define('TBL_FACTURAS_CRTF', '');
//Campos de la tabla
define('CRTF_ID', '');
define('CRTF_FECHA_FACTURACION', '');
define('CRTF_NOMBRE_CLIENTE', '');
define('CRTF_DUI_CLIENTE', '');
define('CRTF_DIRECCION_CLIENTE', '');
define('CRTF_DETALLE_FACTURA', '');
define('CRTF_SUBTOTAL', '');
define('CRTF_IVA_RETENIDO', '');
define('CRTF_TOTAL', '');
define('CRTF_ESTADO', '');
