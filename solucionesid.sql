-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2017 a las 23:25:37
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solucionesid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE `Administrador` (
  `UserAdmin` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Administrador`
--

INSERT INTO `Administrador` (`UserAdmin`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `RFC` varchar(13) NOT NULL,
  `nombreCliente` varchar(120) DEFAULT NULL,
  `dominio` varchar(250) DEFAULT NULL,
  `totalPago` int(11) DEFAULT NULL,
  `nombreEmpresa` varchar(60) DEFAULT NULL,
  `telefonoClienteEmpresa` int(11) DEFAULT NULL,
  `direccionClienteEmpresa` varchar(200) DEFAULT NULL,
  `correoClienteEmpresa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`RFC`, `nombreCliente`, `dominio`, `totalPago`, `nombreEmpresa`, `telefonoClienteEmpresa`, `direccionClienteEmpresa`, `correoClienteEmpresa`) VALUES
('231', 'Germani Uicab Mooahwa', 'wwww.facebook.com', 2000, 'safari', 98273891, 'CALLE 223 NUMERO 5482', 'germani@gmail.com'),
('23123', 'germani', 'WWW.XVIDEOS.COM', 222, 'dsadNBA', 892719, 'CALLE 223 NUMERO 5482', 'germani@gmail.coma'),
('232', 'Germania', 'wwww.facebook.com', 2000, 'soluciones', 9999, '343', 'germani@gmail.com'),
('23232', 'Germani Uicab Moo', 'ww', 2000, 'mexico', 9999, 'calle 23 ', 'ger@dfhsjks.com'),
('237338', 'Germani Uicab Mooaaaa', 'www.nba.com.ms', 20000, 'NBA2ssA', 9827391, 'calle 78', 'ge_ce@gmail.com'),
('239828', 'pene', '2222', 2938, 'mexico', 8394719, 'calle 73', 'germani.asesino@gmail.com'),
('2783', 'Germani jala', 'www.facebook.com', 20902, 'mexico', 928391, 'calle 23', 'germani@gmail.com'),
('323213', 'Gerardp', 'www.facebook.com4', 2000, 'mexico', 8297322, 'calle 26', 'germani@gmail.com'),
('453', 'Pedro', 'www.google.com', 200000, 'GOOGLE', 999139274, 'calle 23 #453', 'pedr@gmail.com'),
('663627', 'Germani jala', 'www.nba.com.ms', 2000, 'mex', 92839138, 'calle 26', 'germani.asesino@gmail.com'),
('778', 'Gerardp', 'www.facebook.com', 246822, 'Df', 928937, 'calle 23', 'germani@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE `Paquete` (
  `nombrePaquete` varchar(50) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `costoPaquete` int(11) DEFAULT NULL,
  `tipoPaquete` varchar(50) DEFAULT NULL,
  `descripcionPaquete` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`, `estado`) VALUES
('Basico q', 1, 1000, 'Hosting 1', 'Paquetecon 2', 1),
('dasndh', 2, 9292, 'shbbfhs', 'shdhas', 1),
('sshdhas', 6, 212, 'shjdhas', 'shdhba', 1),
('HOSWEB', 12, 2000, 'WEB', 'PAQUETE PARA 4 EQUIPOS', 1),
('ddfasd', 23, 222, 'assdas', 'asdasd', 1),
('shdsa', 67, 838, 'shdh', 'sjds', 1),
('dhasdh', 68, 2738, 'ashdhas', 'sjdhas', 1),
('sjdjas', 69, 2763, 'sdjas', 'sdhbas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `nombrePaquete` varchar(30) NOT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `inicioServicio` date DEFAULT NULL,
  `FechadeRenovacion` date DEFAULT NULL,
  `descripcionServicioExtra` varchar(150) DEFAULT NULL,
  `estadoServicio` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`idServicio`, `RFC`, `nombrePaquete`, `costoServicio`, `descripcion`, `inicioServicio`, `FechadeRenovacion`, `descripcionServicioExtra`, `estadoServicio`) VALUES
(7, '232', ' HOSWEB ', 20000, 'aaa', '2018-01-01', '2018-01-01', 'kdjaslkdjasuweknaaskdas', 1),
(8, '231', ' Basico q ', 2222, 'aaa', '2019-01-01', '2920-01-01', 'sdasdjasldjasdasdas', 1),
(9, '453', ' Basico q ', 2222, 'aaa', '2020-01-01', '2020-01-01', 'kosdasjdkasdlasjdkasdas', 1),
(10, '778', ' Basico q ', 2222, '', '2020-01-01', '0202-01-01', 'sakdjasldjaslkdjaskdjas', 1),
(11, '323213', ' Basico q ', 20000, 'kkljasdkasjdiowjaioijdaskldjasdhauwhjksdnasjkdlllll', '2019-01-01', '2919-10-10', 'jskadasdasdouwdjiwajdas', 1),
(12, '2783', ' Basico q ', 200000, 'un servicio doble', '2017-01-01', '2018-01-01', '1 host', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`UserAdmin`);

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`RFC`);

--
-- Indices de la tabla `Paquete`
--
ALTER TABLE `Paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `fk_servicio` (`RFC`),
  ADD KEY `idServicio` (`idServicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Paquete`
--
ALTER TABLE `Paquete`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
