-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2017 a las 20:20:40
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
('123123', 'asdasdds', 'bootstrap@example.com', 323123, 'dasda', 231123, 'adasd', 'germanidelsoccorro@gmail.com'),
('232', 'Juan de Dios Canche Cen', 'www.fulanito.com', 5000, 'TEC', 9991728, 'Calle 45 x 50 y 52 #503', 'juanazo@live.com.mx'),
('3123', 'asdad', 'dada', 23313, 'dads', 3324423, 'dadadaad', 'dads@dasd.com'),
('332', 'asdad', 'asdad', 233, 'asdad', 23123, 'asdasd', 'addasad@dsd.com'),
('3342342', 'dadsda', 'asdada', 33232, 'sdasd', 3232, 'dasdsd', 'sada@dad.com'),
('346', 'Germani Uicab Puc Chuc', 'www.cibermundo.com.mx', 4000, 'ITM', 9992345, 'Calle 45', 'germanidelsoccorro@gmail.com');

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
  `estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`, `estado`) VALUES
('HOSWEB', 12, 2000, 'WEB', 'PAQUETE PARA 4 EQUIPOS', '1'),
('Paquete YOO', 70, 3000, 'Exelsior', 'El mejor paquete', '1'),
('prueba', 110, 12323, 'test', 'Nunico', '1'),
('Paquete platinum', 111, 5000, 'Supremo', 'El paquete mÃ¡s caro y poderoso de todos', '1'),
('Sin Fin', 115, 300, 'Datos y llamadotas', 'llamadas ilimitadSx', '1'),
('Paquete Amigo', 116, 3000, 'Plan Axtel', 'Es el paquete mÃ¡s rÃ¡pido del Oeste', '1'),
('ddasd', 117, 213123, 'dsa', 'sadasd', '1'),
('Paquete DinÃ¡mico', 118, 0, 'Gratis', 'Es un paquete gratis', '1'),
('DDLFKSJ', 119, 3323, 'DSKDFJ', 'DKLJ', '1'),
('sdfsf', 120, 3213, 'fdssdf', 'sdfsd', '1'),
('Premium', 121, 3400, 'Excelsor', 'El mas barabara', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `idPaquete` int(11) NOT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcionServicio` varchar(150) DEFAULT NULL,
  `inicioServicio` date DEFAULT NULL,
  `FechadeRenovacion` date DEFAULT NULL,
  `descripcionServicioExtra` varchar(150) DEFAULT NULL,
  `estadoServicio` tinyint(1) DEFAULT NULL
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
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `fk_servicio` (`RFC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Paquete`
--
ALTER TABLE `Paquete`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
