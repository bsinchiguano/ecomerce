-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2021 a las 18:16:49
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_act` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `compro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_act`, `usuario`, `compro`) VALUES
(1, 'anonimo', 'Falso'),
(2, 'anonimo', 'Falso'),
(3, 'anonimo', 'Falso'),
(4, 'anonimo', 'Falso'),
(5, 'anonimo', 'Falso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Leche', 'Productos lácteos', 'leche.jpg'),
(2, 'Quesos', 'Quesos de mesa', 'queso.png'),
(3, 'Yogurt', 'Productos de yogurt', 'yogurt.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctiempo`
--

CREATE TABLE `ctiempo` (
  `id` int(11) NOT NULL,
  `Tiempo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ctiempo`
--

INSERT INTO `ctiempo` (`id`, `Tiempo`) VALUES
(1, 1.629),
(2, 1.168),
(3, 3.761),
(4, 4.987),
(5, 9.466),
(6, 9.473),
(7, 1.262),
(26, 1440.649),
(27, 4.473),
(28, 8.966),
(29, 37.671),
(30, 151.148),
(31, 189.544),
(32, 316.358),
(33, 336.061),
(34, 361.309),
(35, 383.82),
(36, 392.666),
(37, 405.27),
(38, 421.587),
(39, 6.389),
(40, 7.962),
(41, 10.94),
(42, 2.226),
(43, 3.378),
(44, 41.259),
(45, 77.212),
(46, 78.843),
(47, 105.471),
(48, 3.126),
(49, 3.449),
(50, 4.491),
(51, 7.966),
(52, 10.246),
(53, 22.562),
(54, 2324.912),
(55, 3082.787);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `pais`, `company`, `direccion`, `estado`, `cp`, `id_venta`) VALUES
(1, '', 'UPS', 'La Floresta', 'Pichincha', '+593', 10),
(2, '2', 'UPS', 'La Floresta', 'Pichincha', '+593', 11),
(3, '2', 'UPS', 'La Floresta', 'Pichincha', '+593', 18),
(4, '2', 'UPS', 'La Floresta', 'Pichincha', '+593', 19),
(5, '2', 'UPS', 'La Floresta', 'Pichincha', '+593', 20),
(6, '2', 'UPS', 'La Floresta', 'Pichincha', '+593', 21),
(7, '1', '', '', '', '', 22),
(8, 'ECUADOR', 'UPS', 'Tumbaco', '', '', 23),
(9, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 24),
(10, 'ECUADOR', 'UPS', 'tumbaco', 'ecuador', '23456', 25),
(11, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 26),
(12, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 27),
(13, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '2353', 28),
(14, 'ECUADOR', 'UPS', 'La Floresta', 'ecuador', '593', 29),
(15, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 30),
(16, 'ECUADOR', 'UPS', 'cumbaya', 'ecuador', '593', 31),
(17, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 32),
(18, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 33),
(19, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '593', 34),
(20, '1', '', '', '', '', 35),
(21, '1', 'aa', 'Tumbaco', 'ecuador', '593', 36),
(22, '1', '', '', '', '', 37),
(23, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '593', 38),
(24, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '593', 39),
(25, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '23456', 40),
(26, 'ECUADOR', 'UPS', 'Tumbaco', 'ecuador', '23456', 41),
(27, 'ECUADOR', 's', 'a', 'a', '1', 42),
(28, 'ECUADOR', 'UPS', 'Tumbaco', 'a', '593', 43),
(29, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '2353', 44),
(30, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '2353', 45),
(31, '1', '', '', '', '', 46),
(32, '1', '', '', '', '', 47),
(33, 'ECUADOR', 'aa', 'Tumbaco', 'ecuador', '23456', 48),
(34, '1', '', '', '', '', 49),
(35, '1', '', '', '', '', 50),
(36, '1', '', '', '', '', 51),
(37, '1', 'UPS', 'La Floresta', 'Ecuador', '593', 52),
(38, 'ECUADOR', 'UPS', 'La Floresta', 'Pichincha', '+593', 53),
(39, 'ECUADOR', 'UPS', 'La Floresta', 'Pichincha', '+593', 54),
(40, 'ECUADOR', 'UPS', 'La Floresta', 'Pichincha', '+593', 55),
(41, 'ECUADOR', 'UPS', 'La Floresta', 'Pichincha', '+593', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `talla`, `color`) VALUES
(3, 'Lenutrit', 'Yogurt sabor frutilla', 2.5, 'yogurtec.png', 9, 3, 'XL', 'Nutri'),
(48, 'Rey Queso Mozarrella', 'Rey queso mozarrella', 2.5, '1611641946.png', 25, 2, 'XL', 'Rey'),
(54, 'Yogurt con cereal', 'Cereal y Yogurt en envase', 1.15, '1611636206.png', 23, 3, '', 'Tony'),
(55, 'Queso Andino Maduro Salinerito', 'Queso Andino Maduro', 4.25, '1611642758.jpg', 28, 2, '', 'Salinerito'),
(56, 'Nutrileche Cartón', 'Leche de cartón', 1.25, '1611642808.jpg', 19, 1, '', 'Nutri'),
(57, 'VitaLeche descremada', 'Leche de cartón vitaleche', 1.15, '1611642938.jpg', 19, 1, '', 'Vita'),
(58, 'Zuu...Leche Entera', 'Leche entera en funda', 0.8, '1611642992.png', 0, 1, '', 'Zuu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 8, 2, 3, 1.8, 5.4),
(2, 8, 3, 1, 2.5, 2.5),
(3, 10, 2, 1, 1.8, 1.8),
(4, 11, 1, 1, 1.25, 1.25),
(5, 12, 2, 3, 1.8, 5.4),
(6, 13, 2, 3, 1.8, 5.4),
(7, 14, 2, 3, 1.8, 5.4),
(8, 15, 2, 3, 1.8, 5.4),
(9, 16, 2, 3, 1.8, 5.4),
(10, 17, 2, 3, 1.8, 5.4),
(11, 18, 2, 3, 1.8, 5.4),
(12, 19, 53, 2, 204, 408),
(13, 20, 53, 1, 204, 204),
(14, 21, 3, 1, 2.5, 2.5),
(15, 21, 1, 1, 1.25, 1.25),
(16, 22, 59, 3, 1.15, 3.45),
(17, 22, 58, 1, 0.8, 0.8),
(18, 23, 59, 1, 1.15, 1.15),
(19, 24, 59, 1, 1.15, 1.15),
(20, 25, 59, 1, 1.15, 1.15),
(21, 26, 59, 1, 1.2, 1.2),
(22, 27, 54, 1, 1.15, 1.15),
(23, 28, 59, 1, 1.2, 1.2),
(24, 29, 63, 1, 1.8, 1.8),
(25, 30, 63, 2, 1.8, 3.6),
(26, 31, 57, 4, 1.15, 4.6),
(27, 32, 63, 2, 1.8, 3.6),
(28, 32, 56, 1, 1.25, 1.25),
(29, 33, 58, 2, 0.8, 1.6),
(30, 34, 62, 1, 1.8, 1.8),
(31, 35, 62, 1, 1.8, 1.8),
(32, 36, 63, 1, 1.8, 1.8),
(33, 37, 63, 2, 1.8, 3.6),
(34, 37, 62, 2, 1.8, 3.6),
(35, 38, 62, 2, 1.8, 3.6),
(36, 39, 63, 1, 1.8, 1.8),
(37, 40, 58, 4, 0.8, 3.2),
(38, 41, 58, 4, 0.8, 3.2),
(39, 41, 57, 1, 1.15, 1.15),
(40, 42, 57, 1, 1.15, 1.15),
(41, 43, 57, 1, 1.15, 1.15),
(42, 44, 58, 3, 0.8, 2.4),
(43, 45, 58, 1, 0.8, 0.8),
(44, 46, 58, 4, 0.8, 3.2),
(45, 47, 58, 1, 0.8, 0.8),
(46, 48, 58, 4, 0.8, 3.2),
(47, 48, 57, 1, 1.15, 1.15),
(48, 49, 58, 1, 0.8, 0.8),
(49, 50, 57, 1, 1.15, 1.15),
(50, 51, 56, 1, 1.25, 1.25),
(51, 51, 55, 1, 4.25, 4.25),
(52, 52, 55, 1, 4.25, 4.25),
(53, 53, 56, 3, 1.25, 3.75),
(54, 53, 54, 1, 1.15, 1.15),
(55, 54, 57, 1, 1.15, 1.15),
(56, 55, 57, 1, 1.15, 1.15),
(57, 56, 56, 1, 1.25, 1.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tos`
--

CREATE TABLE `tos` (
  `id` int(11) NOT NULL,
  `tos_id` bigint(20) DEFAULT NULL,
  `tos_session_key` varchar(50) DEFAULT NULL,
  `tos_user_id` varchar(1000) DEFAULT NULL,
  `url` varchar(10000) DEFAULT NULL,
  `title` varchar(5000) DEFAULT NULL,
  `entry_time` datetime(3) DEFAULT NULL,
  `exit_time` datetime(3) DEFAULT NULL,
  `timeonpage` int(11) DEFAULT NULL,
  `timeonpage_by_duration` varchar(20) DEFAULT NULL,
  `timeonpage_tracked_by` varchar(15) DEFAULT NULL,
  `timeonsite` int(11) DEFAULT NULL,
  `timeonsite_by_duration` varchar(20) DEFAULT NULL,
  `tracking_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tos`
--

INSERT INTO `tos` (`id`, `tos_id`, `tos_session_key`, `tos_user_id`, `url`, `title`, `entry_time`, `exit_time`, `timeonpage`, `timeonpage_by_duration`, `timeonpage_tracked_by`, `timeonsite`, `timeonsite_by_duration`, `tracking_type`) VALUES
(10001, 11737135187101236, '1963161180065312912866', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-28 02:30:41.898', '2021-01-28 02:30:45.368', 3, '0d 00h 00m 03s', 'second', 128, '0d 00h 02m 08s', 'tos'),
(10002, 8808493472412635, '4221161180118434033948', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:33:04.333', '2021-01-28 02:33:15.212', 11, '0d 00h 00m 11s', 'second', 11, '0d 00h 00m 11s', 'tos'),
(10003, 2354841554717979, '4221161180118434033948', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:33:21.039', '2021-01-28 02:35:29.638', 15, '0d 00h 00m 15s', 'second', 31, '0d 00h 00m 31s', 'tos'),
(10004, 6452040914008407, '4221161180118434033948', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:36:17.469', '2021-01-28 02:36:34.616', 5, '0d 00h 00m 05s', 'second', 48, '0d 00h 00m 48s', 'tos'),
(10005, 2746509741260400, '2046161180149135135074', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:38:11.345', '2021-01-28 02:42:29.542', 17, '0d 00h 00m 17s', 'second', 17, '0d 00h 00m 17s', 'tos'),
(10006, 10576646350844478, '2046161180149135135074', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:50:47.919', '2021-01-28 02:51:51.842', 43, '0d 00h 00m 43s', 'second', 219, '0d 00h 03m 39s', 'tos'),
(10007, 7132226847202950, '2046161180149135135074', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 02:57:57.334', '2021-01-28 02:58:14.312', 10, '0d 00h 00m 10s', 'second', 286, '0d 00h 04m 46s', 'tos'),
(10008, 7735041309481089, '2046161180149135135074', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/contact.php#', 'Shoppers — Colorlib e-Commerce Template', '2021-01-28 02:58:51.710', '2021-01-28 02:59:10.999', 19, '0d 00h 00m 19s', 'second', 316, '0d 00h 05m 16s', 'tos'),
(10009, 5609075328816360, '9954161180312430130027', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 03:07:35.407', '2021-01-28 03:12:05.323', 8, '0d 00h 00m 08s', 'second', 20, '0d 00h 00m 20s', 'tos'),
(10010, 15972028110554940, '9912161187083566166047', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-28 21:53:55.654', '2021-01-28 21:54:06.920', 11, '0d 00h 00m 11s', 'second', 11, '0d 00h 00m 11s', 'tos'),
(10011, 6982624999906968, '9912161187083566166047', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-28 21:56:00.273', '2021-01-28 21:56:10.670', 10, '0d 00h 00m 10s', 'second', 78, '0d 00h 01m 18s', 'tos'),
(10012, 14297339970026040, '2227161187183471871712', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-28 23:19:43.092', '2021-01-28 23:19:47.565', 4, '0d 00h 00m 04s', 'second', 1041, '0d 00h 17m 21s', 'tos'),
(10013, 2285654683193930, '1580161188623638638585', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-29 02:10:36.382', '2021-01-29 02:11:07.724', 31, '0d 00h 00m 31s', 'second', 31, '0d 00h 00m 31s', 'tos'),
(10014, 10161784398674976, '5395161195787394694584', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-29 22:09:45.069', '2021-01-29 22:09:49.977', 5, '0d 00h 00m 05s', 'second', 33, '0d 00h 00m 33s', 'tos'),
(10015, 10254166780846064, '8332161203562136136094', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/contact.php#', 'Shoppers — Colorlib e-Commerce Template', '2021-01-30 20:01:49.424', '2021-01-30 20:01:58.931', 6, '0d 00h 00m 06s', 'second', 39, '0d 00h 00m 39s', 'tos'),
(10016, 7188087332253737, '8368161204020954754670', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-30 20:56:58.043', '2021-01-30 20:57:02.459', 4, '0d 00h 00m 04s', 'second', 12, '0d 00h 00m 12s', 'tos'),
(10017, 9045158488003778, '8368161204020954754670', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php#', 'Tienda', '2021-01-30 20:59:24.998', '2021-01-30 21:02:41.118', 14, '0d 00h 00m 14s', 'second', 110, '0d 00h 01m 50s', 'tos'),
(10018, 3578746239616260, '9062161204337579279129', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-30 23:04:15.683', '2021-01-30 23:04:20.100', 4, '0d 00h 00m 04s', 'second', 78, '0d 00h 01m 18s', 'tos'),
(10019, 8381462111193897, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-01-31 21:47:41.700', '2021-01-31 21:48:00.037', 18, '0d 00h 00m 18s', 'second', 18, '0d 00h 00m 18s', 'tos'),
(10020, 9966185683429140, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/contact.php', 'Shoppers — Colorlib e-Commerce Template', '2021-01-31 21:48:00.270', '2021-01-31 21:48:41.120', 13, '0d 00h 00m 13s', 'second', 31, '0d 00h 00m 31s', 'tos'),
(10021, 4536533035980204, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-31 21:48:41.386', '2021-01-31 21:50:21.534', 8, '0d 00h 00m 08s', 'second', 39, '0d 00h 00m 39s', 'tos'),
(10022, 5979389530167828, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php#', 'Tienda', '2021-01-31 21:50:27.492', '2021-01-31 21:50:50.899', 7, '0d 00h 00m 07s', 'second', 46, '0d 00h 00m 46s', 'tos'),
(10023, 5173324692102884, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/about.php', 'Tienda', '2021-01-31 21:50:51.076', '2021-01-31 21:51:10.669', 20, '0d 00h 00m 20s', 'second', 66, '0d 00h 01m 06s', 'tos'),
(10024, 9609906403321806, '5815161212991164764698', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-01-31 21:51:51.641', '2021-01-31 21:51:54.702', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10025, 3861051040824660, '5901161212966170470329', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-01-31 21:51:10.908', '2021-02-01 00:02:02.732', 47, '0d 00h 00m 47s', 'second', 113, '0d 00h 01m 53s', 'tos'),
(10026, 12626627742280464, '1691161218433890390251', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 12:58:58.901', '2021-02-01 12:59:11.685', 13, '0d 00h 00m 13s', 'second', 13, '0d 00h 00m 13s', 'tos'),
(10027, 6082772160086006, '224416121845110232237', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 13:01:51.021', '2021-02-01 13:01:59.620', 9, '0d 00h 00m 09s', 'second', 9, '0d 00h 00m 09s', 'tos'),
(10028, 3295305268982104, '6774161218457386786657', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 13:02:53.864', '2021-02-01 13:03:03.149', 9, '0d 00h 00m 09s', 'second', 9, '0d 00h 00m 09s', 'tos'),
(10029, 14185613471703114, '7554161218473368768623', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 13:05:33.684', '2021-02-01 13:05:38.508', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10030, 7267899710852256, '442616122226510333271', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 23:37:31.031', '2021-02-01 23:37:58.295', 27, '0d 00h 00m 27s', 'second', 27, '0d 00h 00m 27s', 'tos'),
(10031, 7279185945846780, '6295161222280085385269', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 23:40:00.850', '2021-02-01 23:40:05.085', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10032, 3293771336863155, '6286161222287658758626', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-01 23:41:16.585', '2021-02-01 23:41:24.479', 8, '0d 00h 00m 08s', 'second', 8, '0d 00h 00m 08s', 'tos'),
(10033, 6792301186895466, '944216122243500838237', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:05:50.082', '2021-02-02 00:05:55.216', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10034, 7367877462845800, '2700161222701594194026', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:50:15.939', '2021-02-02 00:50:21.955', 6, '0d 00h 00m 06s', 'second', 6, '0d 00h 00m 06s', 'tos'),
(10035, 3559797333637824, '2199161222705327927836', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:50:53.277', '2021-02-02 00:50:56.781', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10036, 12836552943676452, '5131161222719714714626', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:53:17.144', '2021-02-02 00:53:21.503', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10037, 10993777416105352, '4744161222722043042914', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:53:40.428', '2021-02-02 00:53:53.891', 10, '0d 00h 00m 10s', 'second', 10, '0d 00h 00m 10s', 'tos'),
(10038, 2469932151182360, '8984161222725273173085', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 00:54:12.729', '2021-02-02 00:54:18.076', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10039, 15272663291695418, '2866161223089746746636', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 01:54:57.464', '2021-02-02 01:55:06.789', 9, '0d 00h 00m 09s', 'second', 9, '0d 00h 00m 09s', 'tos'),
(10040, 3683947705522760, '6857161223094333733644', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 01:55:43.333', '2021-02-02 01:55:47.166', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10041, 9408980509118796, '1350161223106736236143', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 01:57:47.359', '2021-02-02 01:57:52.089', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10042, 5597666413374896, '4097161223110984484350', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 01:58:29.841', '2021-02-02 01:58:32.400', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10043, 8028914891501520, '8507161223190592592461', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:11:45.922', '2021-02-02 02:11:49.811', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10044, 12340023264175254, '2958161223193940240183', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:12:19.400', '2021-02-02 02:12:24.912', 6, '0d 00h 00m 06s', 'second', 6, '0d 00h 00m 06s', 'tos'),
(10045, 14719678229378870, '4378161223200760059939', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:13:27.597', '2021-02-02 02:13:32.383', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10046, 8683483773606508, '5446161223241247947899', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:20:12.476', '2021-02-02 02:20:14.022', 2, '0d 00h 00m 02s', 'second', 2, '0d 00h 00m 02s', 'tos'),
(10047, 7171209792488448, '5446161223241247947899', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:20:17.376', '2021-02-02 02:20:23.102', 6, '0d 00h 00m 06s', 'second', 8, '0d 00h 00m 08s', 'tos'),
(10048, 15707981347502152, '4626161223251026526448', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:21:50.262', '2021-02-02 02:21:53.373', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10049, 2273247850487160, '4626161223251026526448', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:21:58.075', '2021-02-02 02:22:02.527', 4, '0d 00h 00m 04s', 'second', 7, '0d 00h 00m 07s', 'tos'),
(10050, 13163880410347320, '8984161223275080980874', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:25:50.806', '2021-02-02 02:25:53.086', 2, '0d 00h 00m 02s', 'second', 2, '0d 00h 00m 02s', 'tos'),
(10051, 13317053345198120, '8618161223406116316267', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:47:41.161', '2021-02-02 02:47:47.059', 6, '0d 00h 00m 06s', 'second', 6, '0d 00h 00m 06s', 'tos'),
(10052, 5249434223390808, '732816122340980949367', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:48:18.092', '2021-02-02 02:48:21.643', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10053, 2236168878667465, '5609161223423119619556', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 02:50:31.194', '2021-02-02 02:50:53.312', 10, '0d 00h 00m 10s', 'second', 10, '0d 00h 00m 10s', 'tos'),
(10054, 13713678919122010, '4569161223594158658555', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 03:19:01.584', '2021-02-02 03:19:04.425', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10055, 7941874294729446, '4569161223594158658555', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 03:19:11.021', '2021-02-02 03:19:16.985', 6, '0d 00h 00m 06s', 'second', 9, '0d 00h 00m 09s', 'tos'),
(10056, 12377183742118350, '9321161224224855255182', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:04:08.548', '2021-02-02 05:04:10.483', 2, '0d 00h 00m 02s', 'second', 2, '0d 00h 00m 02s', 'tos'),
(10057, 13396121101129928, '6691161224227959359267', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:04:39.590', '2021-02-02 05:04:44.279', 5, '0d 00h 00m 05s', 'second', 5, '0d 00h 00m 05s', 'tos'),
(10058, 15727429025327836, '5453161224285241841743', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:14:12.415', '2021-02-02 05:16:15.373', 10, '0d 00h 00m 10s', 'second', 10, '0d 00h 00m 10s', 'tos'),
(10059, 11985420125050218, '9204161224376177877792', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:29:21.776', '2021-02-02 05:29:25.150', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10060, 9625095849471510, '8945161224386088488342', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:31:00.881', '2021-02-02 05:31:04.198', 3, '0d 00h 00m 03s', 'second', 3, '0d 00h 00m 03s', 'tos'),
(10061, 4178936813173920, '8377161224414088688589', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 05:35:40.884', '2021-02-02 05:35:44.472', 4, '0d 00h 00m 04s', 'second', 4, '0d 00h 00m 04s', 'tos'),
(10062, 10474818562247272, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:31:05.574', '2021-02-02 08:32:38.597', 41, '0d 00h 00m 41s', 'second', 41, '0d 00h 00m 41s', 'tos'),
(10063, 15922628002777668, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:32:39.293', '2021-02-02 08:33:36.049', 57, '0d 00h 00m 57s', 'second', 98, '0d 00h 01m 38s', 'tos'),
(10064, 6945593748452388, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:33:36.261', '2021-02-02 08:34:26.809', 51, '0d 00h 00m 51s', 'second', 149, '0d 00h 02m 29s', 'tos'),
(10065, 9586467439390110, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:34:27.035', '2021-02-02 08:41:30.554', 21, '0d 00h 00m 21s', 'second', 170, '0d 00h 02m 50s', 'tos'),
(10066, 9684817532093900, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:41:30.843', '2021-02-02 08:43:45.048', 30, '0d 00h 00m 30s', 'second', 200, '0d 00h 03m 20s', 'tos'),
(10067, 12124160797910080, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:43:45.254', '2021-02-02 08:44:40.749', 10, '0d 00h 00m 10s', 'second', 210, '0d 00h 03m 30s', 'tos'),
(10068, 14747300884953968, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:44:41.027', '2021-02-02 08:45:32.069', 15, '0d 00h 00m 15s', 'second', 225, '0d 00h 03m 45s', 'tos'),
(10069, 12274101369919804, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:45:32.631', '2021-02-02 08:46:18.630', 46, '0d 00h 00m 46s', 'second', 271, '0d 00h 04m 31s', 'tos'),
(10070, 9117305298368476, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:46:18.845', '2021-02-02 08:46:24.242', 5, '0d 00h 00m 05s', 'second', 276, '0d 00h 04m 36s', 'tos'),
(10071, 9491348625562958, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:46:24.434', '2021-02-02 08:49:24.040', 20, '0d 00h 00m 20s', 'second', 296, '0d 00h 04m 56s', 'tos'),
(10072, 11406709532528624, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:49:24.315', '2021-02-02 08:51:04.133', 24, '0d 00h 00m 24s', 'second', 320, '0d 00h 05m 20s', 'tos'),
(10073, 10877890318834032, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:51:04.655', '2021-02-02 08:52:08.374', 64, '0d 00h 01m 04s', 'second', 384, '0d 00h 06m 24s', 'tos'),
(10074, 11290628269701536, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 08:52:08.844', '2021-02-02 10:08:34.348', 64, '0d 00h 01m 04s', 'second', 448, '0d 00h 07m 28s', 'tos'),
(10075, 2582841345122916, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:08:35.057', '2021-02-02 10:09:00.893', 26, '0d 00h 00m 26s', 'second', 474, '0d 00h 07m 54s', 'tos'),
(10076, 10079852922613488, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:09:04.243', '2021-02-02 10:10:06.506', 42, '0d 00h 00m 42s', 'second', 516, '0d 00h 08m 36s', 'tos'),
(10077, 9615522260708616, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:10:07.094', '2021-02-02 10:12:07.199', 53, '0d 00h 00m 53s', 'second', 569, '0d 00h 09m 29s', 'tos'),
(10078, 4465962215271950, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:12:07.535', '2021-02-02 10:14:01.448', 101, '0d 00h 01m 41s', 'second', 670, '0d 00h 11m 10s', 'tos'),
(10079, 6845659533981334, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:14:01.729', '2021-02-02 10:16:54.249', 8, '0d 00h 00m 08s', 'second', 678, '0d 00h 11m 18s', 'tos'),
(10080, 4607841979318106, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:16:54.457', '2021-02-02 10:19:12.149', 21, '0d 00h 00m 21s', 'second', 699, '0d 00h 11m 39s', 'tos'),
(10081, 16130672829651944, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:19:12.388', '2021-02-02 10:22:36.168', 22, '0d 00h 00m 22s', 'second', 721, '0d 00h 12m 01s', 'tos'),
(10082, 2969785418954826, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:22:36.653', '2021-02-02 10:22:48.110', 11, '0d 00h 00m 11s', 'second', 732, '0d 00h 12m 12s', 'tos'),
(10083, 10665108951741090, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:22:48.365', '2021-02-02 10:24:09.612', 58, '0d 00h 00m 58s', 'second', 790, '0d 00h 13m 10s', 'tos'),
(10084, 2226533062201420, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:24:09.820', '2021-02-02 10:26:20.617', 131, '0d 00h 02m 11s', 'second', 921, '0d 00h 15m 21s', 'tos'),
(10085, 10774744144793818, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:26:20.845', '2021-02-02 10:26:47.213', 26, '0d 00h 00m 26s', 'second', 947, '0d 00h 15m 47s', 'tos'),
(10086, 15842082554459790, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:26:47.415', '2021-02-02 10:26:54.523', 7, '0d 00h 00m 07s', 'second', 954, '0d 00h 15m 54s', 'tos'),
(10087, 4914173401678752, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:26:54.723', '2021-02-02 10:27:25.687', 31, '0d 00h 00m 31s', 'second', 985, '0d 00h 16m 25s', 'tos'),
(10088, 14869889160191038, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:27:25.906', '2021-02-02 10:27:44.595', 19, '0d 00h 00m 19s', 'second', 1004, '0d 00h 16m 44s', 'tos'),
(10089, 15813062410565200, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:27:45.025', '2021-02-02 10:29:02.214', 77, '0d 00h 01m 17s', 'second', 1081, '0d 00h 18m 01s', 'tos'),
(10090, 14881175886320900, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:29:02.830', '2021-02-02 10:30:01.678', 59, '0d 00h 00m 59s', 'second', 1140, '0d 00h 19m 00s', 'tos'),
(10091, 9375302378909120, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:30:02.048', '2021-02-02 10:30:05.722', 4, '0d 00h 00m 04s', 'second', 1144, '0d 00h 19m 04s', 'tos'),
(10092, 8612702567219298, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:30:05.919', '2021-02-02 10:30:16.009', 10, '0d 00h 00m 10s', 'second', 1154, '0d 00h 19m 14s', 'tos'),
(10093, 15874329845052234, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:30:16.479', '2021-02-02 10:30:18.924', 2, '0d 00h 00m 02s', 'second', 1156, '0d 00h 19m 16s', 'tos'),
(10094, 5349484715753892, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:30:19.094', '2021-02-02 10:31:02.910', 44, '0d 00h 00m 44s', 'second', 1200, '0d 00h 20m 00s', 'tos'),
(10095, 10779582819020014, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:31:03.449', '2021-02-02 10:31:11.695', 8, '0d 00h 00m 08s', 'second', 1208, '0d 00h 20m 08s', 'tos'),
(10096, 6089513112450600, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:31:17.799', '2021-02-02 10:33:52.447', 65, '0d 00h 01m 05s', 'second', 1273, '0d 00h 21m 13s', 'tos'),
(10097, 12290273474647014, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/contact.php', 'Shoppers — Colorlib e-Commerce Template', '2021-02-02 10:33:52.618', '2021-02-02 10:39:09.697', 79, '0d 00h 01m 19s', 'second', 1352, '0d 00h 22m 32s', 'tos'),
(10098, 2671518720765241, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/contact.php', 'Shoppers — Colorlib e-Commerce Template', '2021-02-02 10:39:14.113', '2021-02-02 10:39:15.901', 2, '0d 00h 00m 02s', 'second', 1354, '0d 00h 22m 34s', 'tos'),
(10099, 6827931079620805, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:39:16.463', '2021-02-02 10:39:46.112', 30, '0d 00h 00m 30s', 'second', 1384, '0d 00h 23m 04s', 'tos'),
(10100, 2879500621922870, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:39:46.295', '2021-02-02 10:39:54.763', 8, '0d 00h 00m 08s', 'second', 1392, '0d 00h 23m 12s', 'tos'),
(10101, 9144752305943080, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:39:55.265', '2021-02-02 10:40:28.033', 33, '0d 00h 00m 33s', 'second', 1425, '0d 00h 23m 45s', 'tos'),
(10102, 2002429935942390, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/index.php', 'Tienda', '2021-02-02 10:40:28.295', '2021-02-02 10:40:30.464', 2, '0d 00h 00m 02s', 'second', 1427, '0d 00h 23m 47s', 'tos'),
(10103, 12869078721448300, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:40:30.650', '2021-02-02 10:45:33.912', 282, '0d 00h 04m 42s', 'second', 1709, '0d 00h 28m 29s', 'tos'),
(10104, 7308386973548376, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:45:34.072', '2021-02-02 10:46:28.303', 54, '0d 00h 00m 54s', 'second', 1763, '0d 00h 29m 23s', 'tos'),
(10105, 14590978235689700, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:46:28.474', '2021-02-02 10:47:29.885', 61, '0d 00h 01m 01s', 'second', 1824, '0d 00h 30m 24s', 'tos'),
(10106, 2503844206290715, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:47:30.155', '2021-02-02 10:48:59.693', 90, '0d 00h 01m 30s', 'second', 1914, '0d 00h 31m 54s', 'tos'),
(10107, 8459543645613324, '1589161225466557757653', 'anonymous', 'http://localhost/Ecommerce_proyecto_SD_CS/robot.php', 'Chat en linea', '2021-02-02 10:48:59.892', '2021-02-02 10:53:49.762', 48, '0d 00h 00m 48s', 'second', 1962, '0d 00h 32m 42s', 'tos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `numeroT` int(100) NOT NULL,
  `tiempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `numeroT`, `tiempo`) VALUES
(4, 1, 15),
(6, 1, 39),
(7, 1, 24),
(8, 1, 2),
(9, 1, 53),
(10, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_perfil` varchar(300) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `password`, `img_perfil`, `nivel`) VALUES
(11, 'Dorival  Pichamba', '0998291134', 'dorivaltheboss@hotmail.com', 'bdb39033744c548dd4222dfd356d9ff208d33ff4', 'dorival.jpg', 'admin'),
(12, 'Valentina  Tuquerres', '0998291134', 'valentina11777@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.jpg', 'cliente'),
(16, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', '85c65cc0cde89f1e09f06b13de127598fdd1e0c7', 'default.jpg', 'cliente'),
(17, 'amanda  cabascango', '2372676', 'amanda_cabascango@hotmail.com', '85c65cc0cde89f1e09f06b13de127598fdd1e0c7', 'default.jpg', 'admin'),
(20, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(26, 'Dori', '2372676', 'juanjose12322@yahoo.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.jpg', 'cliente'),
(27, 'Dorival  Pichamba', '2372676', 'misa_cabascango@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(28, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(29, 'Diego  osorio', '27625', 'diwgo@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'default.jpg', 'cliente'),
(37, 'Misael  MC', '27625', 'misa_cabascango@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(38, 'Misael  MC', '2372676', 'm@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(39, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.jpg', 'cliente'),
(40, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.jpg', 'cliente'),
(41, 'Misael  MC', '111', 'w@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(42, 'Misael  MC', '2372676', 'misa_cabascango@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(48, 'Karina', 'Velasco', 'karina@hotmail.com', '12345', 'default.jpg', 'cliente'),
(49, 'Karina', '0998291134', 'karina@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.jpg', 'cliente'),
(50, 'Emilio', '0962312546', 'dorival@hotmail.com', 'c4b5c86bd577da3d93fea7c89cba61c78b48e589', 'default.jpg', 'cliente'),
(51, '  ', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(52, 'Sansòn', '12345', 'sanson@yahoo.com', 'd54b76b2bad9d9946011ebc62a1d272f4122c7b5', 'default.jpg', 'cliente'),
(53, 'Sansòn  Pichamba', '123456', 'sanson@yahoo.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(54, 'Valentina  Tuquerres', '0998291134', 'valentina11777@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(55, 'Valentina  Tuquerres', '0998291134', 'valentina11777@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(56, 'Valentina  Tuquerres', '0998291134', 'valentina11777@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente'),
(57, 'Valentina  Tuquerres', '0998291134', 'valentina11777@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'default.jpg', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`, `status`, `id_pago`) VALUES
(1, 1, 3.6, '2021-01-25 14:01:29', 'preparacion', 0),
(2, 1, 3.6, '2021-01-25 14:01:35', 'preparacion', 0),
(3, 1, 5.4, '2021-01-25 14:01:38', 'preparacion', 0),
(4, 1, 5.4, '2021-01-25 14:01:25', 'preparacion', 0),
(5, 1, 7.9, '2021-01-25 14:01:46', 'preparacion', 0),
(6, 1, 7.9, '2021-01-25 14:01:41', 'preparacion', 0),
(7, 1, 7.9, '2021-01-25 14:01:58', 'preparacion', 0),
(8, 1, 7.9, '2021-01-25 14:01:19', 'preparacion', 0),
(9, 1, 0, '2021-01-25 15:01:07', 'preparacion', 0),
(10, 1, 1.8, '2021-01-25 12:01:07', 'preparacion', 0),
(11, 2, 1.25, '2021-01-25 12:01:49', 'preparacion', 0),
(12, 3, 5.4, '2021-01-25 12:01:20', 'preparacion', 0),
(13, 4, 5.4, '2021-01-25 12:01:55', 'preparacion', 0),
(14, 5, 5.4, '2021-01-25 12:01:49', 'preparacion', 0),
(15, 6, 5.4, '2021-01-25 12:01:35', 'preparacion', 0),
(16, 7, 5.4, '2021-01-25 12:01:43', 'preparacion', 0),
(17, 8, 5.4, '2021-01-25 12:01:52', 'preparacion', 0),
(18, 9, 5.4, '2021-01-25 12:01:54', 'preparacion', 0),
(19, 10, 408, '2021-01-25 14:01:02', 'preparacion', 0),
(20, 11, 204, '2021-01-25 16:01:58', 'preparacion', 0),
(21, 12, 3.75, '2021-01-26 08:01:44', 'preparacion', 0),
(22, 13, 4.25, '2021-01-26 12:01:13', 'preparacion', 0),
(23, 15, 1.15, '2021-01-26 08:01:07', 'preparacion', 0),
(24, 16, 1.15, '2021-01-26 08:01:23', 'preparacion', 0),
(25, 17, 1.15, '2021-01-26 08:01:53', 'preparacion', 0),
(26, 18, 1.2, '2021-01-26 11:01:41', 'preparacion', 0),
(27, 19, 1.15, '2021-01-26 12:01:33', 'preparacion', 0),
(28, 20, 1.2, '2021-01-28 15:01:08', 'preparacion', 56),
(29, 27, 1.8, '2021-01-29 17:01:16', 'preparacion', 56),
(30, 28, 3.6, '2021-01-29 06:01:39', 'preparacion', 56),
(31, 29, 4.6, '2021-01-31 07:01:16', '', 0),
(32, 30, 4.85, '2021-01-31 07:01:11', 'preparacion', 56),
(33, 31, 1.6, '2021-01-31 07:01:55', '', 0),
(34, 32, 1.8, '2021-01-31 08:01:09', '', 0),
(35, 33, 1.8, '2021-01-31 08:01:08', '', 0),
(36, 34, 1.8, '2021-01-31 08:01:48', '', 0),
(37, 35, 7.2, '2021-01-31 08:01:26', '', 0),
(38, 36, 3.6, '2021-01-31 08:01:00', '', 0),
(39, 37, 1.8, '2021-01-31 09:01:28', '', 0),
(40, 38, 3.2, '2021-02-01 17:02:31', '', 0),
(41, 39, 4.35, '2021-02-01 17:02:16', '', 0),
(42, 0, 1.15, '2021-02-01 06:02:57', '', 0),
(43, 40, 1.15, '2021-02-01 06:02:23', '', 0),
(44, 41, 2.4, '2021-02-01 16:02:59', '', 0),
(45, 42, 0.8, '2021-02-02 17:02:59', '', 0),
(46, 43, 3.2, '2021-02-02 07:02:15', '', 0),
(47, 44, 0.8, '2021-02-02 07:02:46', '', 0),
(48, 45, 4.35, '2021-02-02 08:02:45', '', 0),
(49, 46, 0.8, '2021-02-02 08:02:55', '', 0),
(50, 47, 1.15, '2021-02-02 08:02:37', '', 0),
(51, 51, 5.5, '2021-02-07 06:02:45', 'preparacion', 56),
(52, 53, 4.25, '2021-02-07 06:02:00', 'preparacion', 56),
(53, 54, 4.9, '2021-02-07 08:02:12', 'preparacion', 56),
(54, 55, 1.15, '2021-02-07 09:02:14', 'preparacion', 56),
(55, 56, 1.15, '2021-02-07 09:02:11', 'preparacion', 56),
(56, 57, 1.25, '2021-02-07 09:02:18', 'preparacion', 56);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_act`),
  ADD UNIQUE KEY `id_act` (`id_act`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ctiempo`
--
ALTER TABLE `ctiempo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tos`
--
ALTER TABLE `tos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_act` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ctiempo`
--
ALTER TABLE `ctiempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tos`
--
ALTER TABLE `tos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10108;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
