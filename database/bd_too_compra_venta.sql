-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2021 a las 00:15:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
CREATE DATABASE IF NOT EXISTS `bd_too_compra_venta` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_too_compra_venta`;

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
(1, 'Cliente1', 'Apellido1', 'Dir1', '123456789', 12345678, 'Natural'),
(2, 'Cliente2', 'Apellido2', 'Dir2', '123456789', 12345678, 'Natural'),
(3, 'Cliente3', 'Apellido3', 'Dir3', '123456789', 12345678, 'Fiscal'),
(4, 'Cliente4', 'Apellido4', 'Dir4', '123456789', 12345678, 'Fiscal');

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
(1, 'empleado1', 'apellido1', 'empleado', '1234', 'Empleado');

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
(2, 'Producto1', 20, 25, 'Categoria1', 1),
(3, 'Producto2', 50, 100, 'Categoria2', 1),
(4, 'Producto3', 10, 20, 'Categoria3', 2),
(5, 'Producto4', 100, 50, 'Categoria4', 3);

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
(1, 'Proveedor1', '12345678', 'Dir1'),
(2, 'Proveedor2', '12345678', 'Dir2'),
(3, 'Proveedor3', '12345678', 'Dir3'),
(4, 'Proveedor4', '12345678', 'Dir4');

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
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`idEmpleado`);

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
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
