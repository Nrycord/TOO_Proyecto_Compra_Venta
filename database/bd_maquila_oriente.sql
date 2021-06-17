-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 05:16:03
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
-- Base de datos: `bd_maquila_oriente`
--
CREATE DATABASE IF NOT EXISTS `bd_maquila_oriente` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `bd_maquila_oriente`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario`
--

CREATE TABLE `detalle_inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_inventario`
--

INSERT INTO `detalle_inventario` (`id_inventario`, `id_sucursal`, `id_producto`, `stock`) VALUES
(3, 1, 2, 100),
(4, 1, 3, 200),
(5, 2, 4, 50),
(6, 2, 3, 100),
(7, 3, 3, 200),
(8, 4, 2, 25),
(9, 5, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `nvl_urgencia` enum('Bajo','Medio','Alto') NOT NULL,
  `estado` enum('Realizado','Pendiente','En Proceso') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`id_pedido`, `id_sucursal`, `id_destino`, `asunto`, `descripcion`, `nvl_urgencia`, `estado`) VALUES
(7, 2, 1, 'Envío de Banners de la empresa X', 'Se necesita realizar el diseño e impresión de una docena de banners, los detalles del diseño se discutirán con el empleador', 'Alto', 'Pendiente'),
(8, 4, 2, 'Envio de pedidos de pancartas', 'Se necesita realizar X pancartas con fecha limite XX/XX', 'Medio', 'Pendiente'),
(9, 3, 1, 'Diseño de anuncios para la empresa Z', 'Es necesario diseñar e imprimir anuncios para la empresa Z con fecha limite de XX/XX', 'Bajo', 'Pendiente'),
(10, 4, 5, 'Pedido de prueba', 'Asunto de prueba para dos sucursales inventadas', 'Medio', 'En Proceso'),
(11, 1, 5, 'prueba', 'prueba', 'Medio', 'Realizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_producto`, `nombre`) VALUES
(2, 'Lona'),
(3, 'Plastico'),
(4, 'Marcadores'),
(5, 'Pintura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal`
--

CREATE TABLE `tbl_sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `num_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sucursal`
--

INSERT INTO `tbl_sucursal` (`id_sucursal`, `nombre`, `direccion`, `num_empleados`) VALUES
(1, 'sucursal Roosevelt', 'Colonia Centro America, Calle Principal #6, San Miguel, San Miguel', 20),
(2, 'sucursal Santa Rosa', '37 Avenida Norte y, Alameda Franklin Delano Roosevelt #114, San Salvador', 25),
(3, 'sucursal Terminal', 'Avenida Independencia Sur, Santa Ana', 24),
(4, 'sucursal Sonsonate', 'Calle a Tatopa, Sonsonate', 15),
(5, 'sucursal la Paz', 'Calle Doctor Miguel Tomás Molina, Zacatecoluca', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `rol` enum('Administrador','Empleado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `username`, `password`, `id_sucursal`, `rol`) VALUES
(1, 'santaRosa', '1234', 2, 'Empleado'),
(2, 'roosevelt', '1234', 1, 'Empleado'),
(3, 'terminal', '1234', 3, 'Empleado'),
(4, 'sonsonate', '1234', 4, 'Empleado'),
(5, 'laPaz', '1234', 5, 'Empleado'),
(6, 'admin', '123456', 1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_detalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_detalle` (
`id_sucursal` int(11)
,`nombre` varchar(50)
,`stock` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_detalle`
--
DROP TABLE IF EXISTS `vista_detalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_detalle`  AS  select `detalle_inventario`.`id_sucursal` AS `id_sucursal`,`tbl_productos`.`nombre` AS `nombre`,`detalle_inventario`.`stock` AS `stock` from (`detalle_inventario` join `tbl_productos` on(`tbl_productos`.`nombre` = `tbl_productos`.`nombre`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
  ADD CONSTRAINT `detalle_inventario_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `tbl_sucursal` (`id_sucursal`),
  ADD CONSTRAINT `detalle_inventario_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`);

--
-- Filtros para la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD CONSTRAINT `tbl_pedidos_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `tbl_sucursal` (`id_sucursal`),
  ADD CONSTRAINT `tbl_pedidos_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `tbl_sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `tbl_sucursal` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
