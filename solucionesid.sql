-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-04-2017 a las 16:49:28
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.2
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
('232', 'Germani', 'wwww', 2000, 'soluciones', 9999, '343', '2323'),
('453', 'Pedro', 'www.google.com', 200000, 'GOOGLE', 999139274, 'calle 23 #453', 'pedr@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE `Paquete` (
  `nombrePaquete` varchar(50) NOT NULL,
  `nombreServicio` varchar(50) DEFAULT NULL,
  `costoPaquete` int(11) DEFAULT NULL,
  `tipoPaquete` varchar(50) DEFAULT NULL,
  `descripcionPaquete` varchar(150) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `nombreServicio` varchar(50) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcionServicio` varchar(150) DEFAULT NULL,
  `inicioServicio` date DEFAULT NULL,
  `finServicio` date DEFAULT NULL,
  `descripcionServicioExtra` varchar(150) DEFAULT NULL,
  `checkbox` tinyint(1) DEFAULT NULL,
  `estadoServicio` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`nombrePaquete`),
  ADD KEY `fk_paquete` (`nombreServicio`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`nombreServicio`),
  ADD KEY `fk_servicio` (`RFC`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Paquete`
--
ALTER TABLE `Paquete`
  ADD CONSTRAINT `fk_paquete` FOREIGN KEY (`nombreServicio`) REFERENCES `Servicio` (`nombreServicio`);

--
-- Filtros para la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD CONSTRAINT `fk_servicio` FOREIGN KEY (`RFC`) REFERENCES `Cliente` (`RFC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
