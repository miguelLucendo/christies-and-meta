-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2023 a las 20:47:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `christies_and_meta`
--
CREATE DATABASE IF NOT EXISTS `christies_and_meta` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `christies_and_meta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodCategoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  `CodCategoriaPadre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `CodComentario` int(11) NOT NULL,
  `CodUsuario` int(11) NOT NULL,
  `CodProducto` int(11) NOT NULL,
  `Texto` varchar(400) DEFAULT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `CodCompra` int(11) NOT NULL,
  `CodUsuario` int(11) NOT NULL,
  `CodProducto` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `CodProducto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` double NOT NULL,
  `Img1` varchar(75) NOT NULL,
  `Img2` varchar(75) DEFAULT NULL,
  `Img3` varchar(75) DEFAULT NULL,
  `Longitud` decimal(10,0) DEFAULT NULL,
  `Latitud` decimal(10,0) DEFAULT NULL,
  `CodCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productopopularidad`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `productopopularidad` (
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CodUsuario` int(11) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Contrasenya` varchar(75) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Moneda` double(30,4) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura para la vista `productopopularidad`
--
DROP TABLE IF EXISTS `productopopularidad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productopopularidad`  AS   (select `p`.`CodProducto` AS `CodProducto`,`p`.`Nombre` AS `Nombre`,`p`.`Descripcion` AS `Descripcion`,`p`.`Precio` AS `Precio`,`p`.`Img1` AS `Img1`,`p`.`Img2` AS `Img2`,`p`.`Img3` AS `Img3`,`p`.`Longitud` AS `Longitud`,`p`.`Latitud` AS `Latitud`,`p`.`CodCategoria` AS `CodCategoria`,ifnull((select count(0) from `compra` `c` where `c`.`CodProducto` = `p`.`CodProducto` group by `c`.`CodProducto`),0) AS `PopularidadCompras`,ifnull((select count(0) from `resenya` `r` where `r`.`CodProducto` = `p`.`CodProducto` group by `r`.`CodProducto`),0) AS `PopularidadResenyas`,ifnull((select count(0) from `compra` `c` where `c`.`CodProducto` = `p`.`CodProducto` group by `c`.`CodProducto`),0) + ifnull((select count(0) from `resenya` `r` where `r`.`CodProducto` = `p`.`CodProducto` group by `r`.`CodProducto`),0) AS `PopularidadTotal` from `producto` `p`)  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodCategoria`),
  ADD KEY `categoria_padre` (`CodCategoriaPadre`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`CodComentario`),
  ADD KEY `comentario_usuario` (`CodUsuario`),
  ADD KEY `comentario_producto` (`CodProducto`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`CodCompra`),
  ADD KEY `compra_usuario` (`CodUsuario`),
  ADD KEY `compra_producto` (`CodProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`CodProducto`),
  ADD KEY `producto_categoria` (`CodCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `CodComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `CodCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `CodProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CodUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_padre` FOREIGN KEY (`CodCategoriaPadre`) REFERENCES `categoria` (`CodCategoria`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_producto` FOREIGN KEY (`CodProducto`) REFERENCES `producto` (`CodProducto`),
  ADD CONSTRAINT `comentario_usuario` FOREIGN KEY (`CodUsuario`) REFERENCES `usuario` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_producto` FOREIGN KEY (`CodProducto`) REFERENCES `producto` (`CodProducto`),
  ADD CONSTRAINT `compra_usuario` FOREIGN KEY (`CodUsuario`) REFERENCES `usuario` (`CodUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`CodCategoria`) REFERENCES `categoria` (`CodCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
