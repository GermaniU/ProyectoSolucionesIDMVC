-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2017 a las 23:08:05
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u700675089_soluc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE `Administrador` (
  `UserAdmin` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `nombreEmpresa` varchar(60) DEFAULT NULL,
  `telefonoClienteEmpresa` varchar(15) NOT NULL,
  `direccionClienteEmpresa` varchar(200) DEFAULT NULL,
  `correoClienteEmpresa` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`RFC`, `nombreCliente`, `dominio`, `nombreEmpresa`, `telefonoClienteEmpresa`, `direccionClienteEmpresa`, `correoClienteEmpresa`) VALUES
('A12S09HJNMBGH', 'Gerardo cetzala', 'www.riconweb.com', 'Rincon Web', '9291928392', 'Calle 35 x 12 y 14 num 34', 'germani.pene@ggg.com'),
('L23C17B', 'Luis Mota P', 'www.google.com', 'Motita', '9991345672', 'C23 NUMERO 456 POR 57 Y 58', 'crackets@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE `Paquete` (
  `nombrePaquete` varchar(50) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `costoPaquete` int(11) DEFAULT NULL,
  `tipoPaquete` varchar(50) DEFAULT NULL,
  `descripcionPaquete` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`) VALUES
('Paquete Basico', 79, 20000, 'web  w', '1 pagina web 2 correos 1 base de datos '),
('Host Premium', 80, 20000, 'Host', '21 Host');

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
  `descripcionServicioExtra` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`idServicio`, `RFC`, `nombrePaquete`, `costoServicio`, `descripcion`, `inicioServicio`, `FechadeRenovacion`, `descripcionServicioExtra`) VALUES
(15, 'G23C17B', '', 20000, '1 pagina web 2 correos 1 base de datos ', '2010-01-01', '2010-12-01', 'q2eqweqweqewe'),
(16, 'L23C17B', 'Paquete Basico', 20000, '1 pagina web 2 correos 1 base de datos ', '2010-01-01', '2010-01-01', 'dkaslasldasd');

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
  ADD PRIMARY KEY (`RFC`),
  ADD UNIQUE KEY `RFC` (`RFC`);

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
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
