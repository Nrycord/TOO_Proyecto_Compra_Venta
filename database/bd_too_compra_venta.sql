-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2021 a las 23:36:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_too_compra_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administradores`
--

CREATE TABLE `tbl_administradores` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUsuario` enum('Empleado','Administrador') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_administradores`
--

INSERT INTO `tbl_administradores` (`idAdministrador`, `nombre`, `apellido`, `usuario`, `password`, `tipoUsuario`) VALUES
(1, 'admin1', 'admin1', 'admin', '1234', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `tipoCliente` enum('Natural','Fiscal') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`idCliente`, `nombre`, `apellido`, `direccion`, `dui`, `telefono`, `tipoCliente`) VALUES
(1, 'Juan', 'Cortez', 'col. el molino SM', '024522119', 12345678, 'Natural'),
(2, 'Roxana', 'Gonzalez', 'ciudad barrios SM', '023456789', 12345678, 'Natural'),
(3, 'Javier', 'Portillo', 'col urbeza SM', '013456789', 12345678, 'Fiscal'),
(4, 'Ana', 'Rodriguez', 'col. hirleman SM', '043456789', 12345678, 'Fiscal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compras`
--

CREATE TABLE `tbl_compras` (
  `idCompra` int(11) NOT NULL,
  `detalleCompra` longtext COLLATE utf8_spanish_ci NOT NULL,
  `total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_compras`
--

INSERT INTO `tbl_compras` (`idCompra`, `detalleCompra`, `total`) VALUES
(1, '[\n    {\n        \"idProducto\": \"7\",\n        \"nombre\": \"Cama Queen\",\n        \"cantidad\": \"10\",\n        \"precioUnitario\": \"460\",\n        \"categoria\": \"Dormitorio\",\n        \"idProveedor\": \"1\"\n    },\n    {\n        \"idProducto\": \"6\",\n        \"nombre\": \"Cama King\",\n        \"cantidad\": \"10\",\n        \"precioUnitario\": \"450\",\n        \"categoria\": \"Dormitorio\",\n        \"idProveedor\": \"1\"\n    },\n    {\n        \"idProducto\": \"3\",\n        \"nombre\": \"puerta roble roja\",\n        \"cantidad\": \"10\",\n        \"precioUnitario\": \"100\",\n        \"categoria\": \"Puertas\",\n        \"idProveedor\": \"1\"\n    }\n]', 11413.00),
(2, '[\n    {\n        \"idProducto\": \"2\",\n        \"nombre\": \"puerta roble golden\",\n        \"cantidad\": \"1\",\n        \"precioUnitario\": \"25\",\n        \"categoria\": \"Puertas\",\n        \"idProveedor\": \"1\"\n    }\n]', 28.25),
(3, '[\n    {\n        \"idProducto\": \"8\",\n        \"nombre\": \"Cama King Royal\",\n        \"cantidad\": \"7\",\n        \"precioUnitario\": \"32\",\n        \"categoria\": \"Dormitorio\",\n        \"idProveedor\": \"2\"\n    }\n]', 253.12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUsuario` enum('Empleado','Administrador') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`idEmpleado`, `nombre`, `apellido`, `usuario`, `password`, `tipoUsuario`) VALUES
(1, 'Rosa', 'Portillo', 'empleado1', '1234', 'Empleado'),
(2, 'Esmeralda', 'Castillo', 'empleado2', '1234', 'Empleado'),
(3, 'Rafael', 'Medrano', 'empleado3', '1234', 'Empleado'),
(4, 'Jose', 'Rodriguez', 'empleado4', '1234', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura_cf`
--

CREATE TABLE `tbl_factura_cf` (
  `idFactura` int(4) NOT NULL,
  `fechaFacturacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombreCliente` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `duiCliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccionCliente` varchar(900) COLLATE utf8_spanish_ci NOT NULL,
  `detalleFactura` longtext COLLATE utf8_spanish_ci NOT NULL,
  `subTotal` float(10,2) NOT NULL,
  `ivaRetenido` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `estado` enum('Emitida','Anulada') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura_crtf`
--

CREATE TABLE `tbl_factura_crtf` (
  `idFactura` int(4) NOT NULL,
  `fechaFacturacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombreCliente` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `duiCliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccionCliente` varchar(900) COLLATE utf8_spanish_ci NOT NULL,
  `detalleFactura` longtext COLLATE utf8_spanish_ci NOT NULL,
  `subTotal` float(10,2) NOT NULL,
  `ivaRetenido` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `estado` enum('Emitida','Anulada') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` double NOT NULL,
  `categoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`idProducto`, `nombre`, `cantidad`, `precioUnitario`, `categoria`, `idProveedor`) VALUES
(2, 'puerta roble golden', 21, 25, 'Puertas', 1),
(3, 'puerta roble roja', 60, 100, 'Puertas', 1),
(4, 'puerta roble blanca', 60, 20, 'Puertas', 2),
(5, 'puerta roble caoba', 100, 50, 'Puertas', 3),
(6, 'Cama King', 25, 39, 'Dormitorio', 1),
(7, 'Cama Queen', 25, 9, 'Dormitorio', 1),
(8, 'Cama King Royal', 20, 32, 'Dormitorio', 2),
(9, 'Cama Queen Royal', 20, 14, 'Dormitorio', 3),
(10, 'Cama Matrimonial', 15, 390, 'Dormitorio', 1),
(11, 'Camarote full blanco', 12, 97, 'Dormitorio', 2),
(12, 'Camarote full negro', 23, 37, 'Dormitorio', 2),
(13, 'Gavetero negro', 17, 124, 'Dormitorio', 1),
(14, 'Gavetero negro', 16, 39, 'Dormitorio', 2),
(15, 'Gavetero blanco ', 15, 58, 'Dormitorio', 1),
(16, 'Mueble cocina Caoba', 27, 21, 'Cocina', 4),
(17, 'Mueble cocina Vidri', 23, 25, 'Cocina', 4),
(18, '\r\njuego comedor 4p', 24, 100, 'Comedor', 1),
(19, '\r\njuego comedor 6p', 24, 50, 'Comedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_proveedor`
--

CREATE TABLE `tbl_producto_proveedor` (
  `idProdProv` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `precioCompra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_producto_proveedor`
--

INSERT INTO `tbl_producto_proveedor` (`idProdProv`, `idProducto`, `idProveedor`, `precioCompra`) VALUES
(1, 2, 1, 25),
(2, 3, 1, 100),
(3, 4, 2, 20),
(4, 5, 3, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_proveedores`
--

INSERT INTO `tbl_proveedores` (`idProveedor`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Almacenes Esmeralda', '12345678', 'Col San Benito,Zacateculoca,La Paz'),
(2, 'Arthany', '12345678', 'Calle principal 14 av, Chalatenango, Chalatenango'),
(3, 'Pretty Furniture', '12345678', 'Calle Esmeralda, San Salvador, San Salvador'),
(4, 'Home Furniture', '12345678', 'Av. Roosevelt Norte,San Miguel,San Miguel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD PRIMARY KEY (`idCompra`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `tbl_factura_cf`
--
ALTER TABLE `tbl_factura_cf`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `tbl_factura_crtf`
--
ALTER TABLE `tbl_factura_crtf`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `tbl_producto_proveedor`
--
ALTER TABLE `tbl_producto_proveedor`
  ADD PRIMARY KEY (`idProdProv`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_factura_cf`
--
ALTER TABLE `tbl_factura_cf`
  MODIFY `idFactura` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_factura_crtf`
--
ALTER TABLE `tbl_factura_crtf`
  MODIFY `idFactura` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_proveedor`
--
ALTER TABLE `tbl_producto_proveedor`
  MODIFY `idProdProv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `tbl_proveedores` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_producto_proveedor`
--
ALTER TABLE `tbl_producto_proveedor`
  ADD CONSTRAINT `tbl_producto_proveedor_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `tbl_proveedores` (`idProveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_producto_proveedor_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tbl_productos` (`idProducto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
