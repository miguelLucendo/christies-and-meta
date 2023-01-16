-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2023 a las 20:48:49
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
USE `christies_and_meta`
--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodCategoria`, `Nombre`, `Descripcion`, `Imagen`, `CodCategoriaPadre`) VALUES
(5, 'Deportes', 'Todo tipo de deporte que sea imposible de realizar en el mundo real.', '', NULL),
(6, 'Ropa', 'Todo tipo de ropa que se pueda comprar en el metaverso.', '', NULL),
(7, 'Comida', 'Todo tipo de comidas que se pueden comer en el metaverso.', '', NULL),
(8, 'Viajes', 'Todo tipo de viaje que se puede realizar en el metaverso.', '', NULL);

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`CodComentario`, `CodUsuario`, `CodProducto`, `Texto`, `Fecha`) VALUES
(2, 3, 4, 'Estaban muy buenas las tiras de pollo', '2023-01-16'),
(3, 3, 7, 'Queda muy bonita puesta', '2023-01-16'),
(4, 3, 5, 'Hemos visitado las pirámides y son muy bonitas, pero no nos han dejado verlas por dentro', '2023-01-16'),
(5, 4, 4, 'La comida esta buena, pero no tienen Cocacola, solo Pepsi y no me gusta', '2023-01-16'),
(6, 4, 9, 'Nunca pense que podría hacer puenting en Logroño, pero lo he hecho gracias a esta experiencia', '2023-01-16'),
(7, 4, 14, 'Hemos visitado la ciudad y es muy bonita', '2023-01-16'),
(8, 4, 16, 'Hemos hecho paracaidismo y nos ha gustado mucho.', '2023-01-16'),
(9, 5, 5, 'Las piramides son super guays!!! Os recomiendo a todos visitarlo.', '2023-01-16'),
(10, 5, 6, 'Los canales de la ciudad son muy bonitos, hemos viajado por toda la ciudad en góndola y ha sido una experiencia super buena.', '2023-01-16'),
(11, 5, 12, 'La ciudad es muy bonita', '2023-01-16'),
(12, 6, 13, 'Las gafas le quedan muy bien al muñeco este.', '2023-01-16'),
(13, 6, 11, 'Junto con otras gafas que he comprado, la sudadera queda muy muy muy bien', '2023-01-16'),
(14, 7, 10, 'Hemos visitado el Santiago Bernabeu y el Wanda Metropolitano y son dos estadios muy bonitos. Tambien hemos visto la puerta del sol, el kilometro cero, el tio pepe, etc. Lo recomiendo a todo el mundo', '2023-01-16');

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CodProducto`, `Nombre`, `Descripcion`, `Precio`, `Img1`, `Img2`, `Img3`, `Longitud`, `Latitud`, `CodCategoria`) VALUES
(2, 'Ropa-Gafas-001', 'Gafas de sol para el metaverso', 5.211, 'rutafalsa', NULL, NULL, NULL, NULL, 6),
(3, 'Escalada-Rascacielos-001', 'Escalada burj kalifa', 7.3421, 'rutafalsa', NULL, NULL, NULL, NULL, 5),
(4, 'KFC-001', 'Cena en el kfc del metaverso', 2.12, 'rutafalsa', NULL, NULL, NULL, NULL, 7),
(5, 'Viaje-Egipto', 'Viaje a egipto en el metaverso', 12.21, 'rutafalsa', NULL, NULL, NULL, NULL, 8),
(6, 'Viaje-Venecia', 'Viaje a venecia en el metaverso', 17.432, 'rutafalsa', NULL, NULL, NULL, NULL, 8),
(7, 'Ropa-Sudadera-001', 'Sudadera adidas en el metaverso', 3.211, 'rutafalsa', NULL, NULL, NULL, NULL, 6),
(8, 'Ropa-Gorra-001', 'Gorra en el metaverso', 0.43, 'rutafalsa', NULL, NULL, NULL, NULL, 6),
(9, 'Puenting-Ebro-001', 'Puenting en el Ebro en el metaverso', 3.321, 'rutafalsa', NULL, NULL, NULL, NULL, 5),
(10, 'Viaje-Madrid', 'Viaje a madrid en el metaverso', 2.12, 'rutafalsa', NULL, NULL, NULL, NULL, 8),
(11, 'Ropa-Sudadera-002', 'Sudadera nike metaverso', 4.211, 'rutafalsa', NULL, NULL, NULL, NULL, 6),
(12, 'Viaje-Amsterdam', 'Viaje a amsterdam en el metaverso', 8.54, 'rutafalsa', NULL, NULL, NULL, NULL, 8),
(13, 'Ropa-Gafas-002', 'Gafas de sol Rayban en el metaverso', 15.211, 'rutafalsa', NULL, NULL, NULL, NULL, 6),
(14, 'Viaje-Viena', 'Viaje a viena en el metaverso', 4.43, 'rutafalsa', NULL, NULL, NULL, NULL, 8),
(15, 'Vips-001', 'Comida en el vips en el metaverso', 6.54, 'rutafalsa', NULL, NULL, NULL, NULL, 7),
(16, 'Paracaidismo-Logroño', 'Paracaidismo en logroño en el metaverso', 9.1, 'rutafalsa', NULL, NULL, NULL, NULL, 5);

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsuario`, `Email`, `Contrasenya`, `Nombre`, `Apellidos`, `Moneda`, `Admin`) VALUES
(1, 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Admin', 99999.0000, 1),
(2, 'naveenspano@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Naveen', 'Spano', 100.0000, 0),
(3, 'ratnahaumann@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ratna', 'Haumann', 100.0000, 0),
(4, 'timaiosoffermans@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Timaios', 'Offermans', 100.0000, 0),
(5, 'florinaagricola@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Florina', 'Agricola', 100.0000, 0),
(6, 'maralynskeates@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Maralyn Skeates', 'Spano', 100.0000, 0),
(7, 'mauragarfagnini@gmail.com', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 'Maura', 'Garfagnini', 100.0000, 0),
(8, 'pattybrandt@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Patty', 'Brandt', 100.0000, 0),
(9, 'helioivers@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Helio', 'Ivers', 100.0000, 0),
(10, 'ekkebertescamilla@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ekkebert', 'Escamilla', 100.0000, 0),
(11, 'naveenspano@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Naveen', 'Spano', 100.0000, 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `productopopularidad`
--
DROP TABLE IF EXISTS `productopopularidad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productopopularidad`  AS   (select `p`.`CodProducto` AS `CodProducto`,`p`.`Nombre` AS `Nombre`,`p`.`Descripcion` AS `Descripcion`,`p`.`Precio` AS `Precio`,`p`.`Img1` AS `Img1`,`p`.`Img2` AS `Img2`,`p`.`Img3` AS `Img3`,`p`.`Longitud` AS `Longitud`,`p`.`Latitud` AS `Latitud`,`p`.`CodCategoria` AS `CodCategoria`,ifnull((select count(0) from `compra` `c` where `c`.`CodProducto` = `p`.`CodProducto` group by `c`.`CodProducto`),0) AS `PopularidadCompras`,ifnull((select count(0) from `resenya` `r` where `r`.`CodProducto` = `p`.`CodProducto` group by `r`.`CodProducto`),0) AS `PopularidadResenyas`,ifnull((select count(0) from `compra` `c` where `c`.`CodProducto` = `p`.`CodProducto` group by `c`.`CodProducto`),0) + ifnull((select count(0) from `resenya` `r` where `r`.`CodProducto` = `p`.`CodProducto` group by `r`.`CodProducto`),0) AS `PopularidadTotal` from `producto` `p`)  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
