
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2017 a las 20:30:03
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u700675089_soluc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

CREATE TABLE IF NOT EXISTS `Administrador` (
  `UserAdmin` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserAdmin`)
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

CREATE TABLE IF NOT EXISTS `Cliente` (
  `RFC` varchar(13) NOT NULL,
  `nombreCliente` varchar(120) DEFAULT NULL,
  `dominio` varchar(250) DEFAULT NULL,
  `totalPago` int(11) DEFAULT NULL,
  `nombreEmpresa` varchar(60) DEFAULT NULL,
  `telefonoClienteEmpresa` int(11) DEFAULT NULL,
  `direccionClienteEmpresa` varchar(200) DEFAULT NULL,
  `correoClienteEmpresa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RFC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`RFC`, `nombreCliente`, `dominio`, `totalPago`, `nombreEmpresa`, `telefonoClienteEmpresa`, `direccionClienteEmpresa`, `correoClienteEmpresa`) VALUES
('23232', 'Germani Uicab Moo', 'www.easy.es', 2000, 'mexico', 9999, 'calle 23 ', 'ger@dfhsjks.com'),
('453', 'Pedro', 'www.google.com', 200000, 'GOOGLE', 999139274, 'calle 23 #453', 'pedr@gmail.com'),
('fdsfsdfsfsdfs', 'sdfsdfsdfsdfsdfsdfs', 'fsdfsdfsdfsdfsdfsdfsddsf', 2147483647, 'sfsfsdfsdfsdfsfsfsdfsdfs', 0, 'fsdfsdfdfdsfsfsdfdsfs', 'dsfsdf@dffs.com'),
('123', 'Gerardo Cetzal', 'www.gcetzal.com', 2500, 'Deathcore', 2147483647, '35 x16 y 18 CTM', 'gcetzalb@gmail.com'),
('345', 'Oswaldo Torres Matos', 'www.electronica60.com', 3000, 'Electronica60', 999999999, 'av 60 merida progreso', 'electronica60@gmail.com'),
('UIMG960301DG0', 'Germani de jesusu', 'www.trivago.mx', 23000, 'TrivagoES', 2147483647, 'calle 56 numero 453 x 57 y 58', 'germani.jesus.uicab@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE IF NOT EXISTS `Paquete` (
  `nombrePaquete` varchar(50) NOT NULL,
  `idPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `costoPaquete` int(11) DEFAULT NULL,
  `tipoPaquete` varchar(50) DEFAULT NULL,
  `descripcionPaquete` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPaquete`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`, `estado`) VALUES
('Basico q', 1, 1000, 'Hosting 2', 'Paquetecon 3', 1),
('HOSWEB', 12, 2000, 'WEB', 'PAQUETE PARA 4 EQUIPOS', 1),
('300', 23, 222, 'internet', 'PAQUETAXO', 1),
('PACK', 70, 3000, 'PACK MEGA', 'LIBROS PROGRAMACION', 1),
('Platzi', 71, 4000, 'SERVICIO', 'LOREM', 1),
('paquete', 72, 30, 'kind', 'description', 1),
('PaqueteBasico', 74, 20000, 'Basico', '1 servidor host ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE IF NOT EXISTS `Servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `RFC` varchar(13) DEFAULT NULL,
  `nombrePaquete` varchar(30) NOT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `inicioServicio` date DEFAULT NULL,
  `FechadeRenovacion` date DEFAULT NULL,
  `descripcionServicioExtra` varchar(150) DEFAULT NULL,
  `estadoServicio` int(1) DEFAULT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fk_servicio` (`RFC`),
  KEY `idServicio` (`idServicio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`idServicio`, `RFC`, `nombrePaquete`, `costoServicio`, `descripcion`, `inicioServicio`, `FechadeRenovacion`, `descripcionServicioExtra`, `estadoServicio`) VALUES
(7, '232', ' HOSWEB 1', 2000, 'un seervicio', '2018-01-02', '2018-01-02', 'nada', 1),
(10, '778', ' Basico q ', 2222, '', '2020-01-01', '0202-01-01', 'sakdjasldjaslkdjaskdjas', 1),
(11, '323213', ' Basico q ', 20000, 'kkljasdkasjdiowjaioijdaskldjasdhauwhjksdnasjkdlllll', '2019-01-01', '2919-10-10', 'jskadasdasdouwdjiwajdas', 1),
(12, '2783', ' Basico ', 2700, 'un servicio triple', '2019-01-01', '2019-01-01', '2 host', 0),
(13, '239828', ' Basico q ', 20000000, 'servicioslkskdjslkdsaj', '2017-01-01', '2018-01-01', 'osiadjiasjdasidjasiodjiojasd', 1),
(14, 'UIMG960301DG0', ' Basico q ', 27000, '4 correos 1 host 2 direcciones', '2017-01-01', '2018-01-01', 'ninguno', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
