<?php
//Definimos constantes las cuales nos capturan los datos de la tabla

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_maquila_oriente');
define('DB_CHARSET', 'utf8');

//Nombre de la tabla 1
define('TBL_CLIENTES', '');
//Campos de la tabla 1
define('C_NOMBRE', '');
define('C_APELLIDO', '');
define('C_DIR', '');
define('C_DUI', '');
define('C_TEL', '');
define('C_TIPO', '');

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