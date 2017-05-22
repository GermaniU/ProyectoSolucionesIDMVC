-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2017 a las 06:03:40
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paquete`
--

CREATE TABLE `Paquete` (
  `nombrePaquete` varchar(50) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `costoPaquete` int(11) DEFAULT NULL,
  `tipoPaquete` varchar(50) DEFAULT NULL,
  `descripcionPaquete` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`) VALUES
('Basico', 81, 950, 'Hospedaje en internet', 'Espacio en disco duro 3GB,\r\nDominios gratis tipo .com , .org  y .net\r\nSubdominios 5\r\nTrafico de gran capacidad 10 GB\r\nBackup diarios y semanales SI\r\nConexion 155 MB/S\r\nCuentas de correo(e-mail de 50 mb c/u)  5\r\nWebmail    SI\r\nFiltros ANTISPAM (correo no deseado) SI\r\nSIstema Antivirus SI\r\nReenviador de e-mail SI\r\nAuto contestador de e-mail SI\r\nSMTP send email SI\r\nCatch all e-mail SI\r\nPGP MAIL (e-mail encriptado) SI\r\nPHP 5.2 / 7.0  SI\r\nBase de datos MySQL 2\r\nCarpetas cgi-bin SI\r\nWordpress, Joomla, Drupal, etc. SI\r\nMoodle, Chamilo, Dokeos, etc. SI\r\nPrestashop, Magento, OpenCart, etc SI\r\nPanel de control CPanel SI\r\nPÃ¡ginas protegidas por contraseÃ±a SI\r\nFTP cuentas de acceso SI\r\nEstadÃ­sticas detalladas del sitio SI'),
('Standard', 82, 1600, 'Hospedaje en internet', 'Espacio en disco duro 5GB,\r\nDominios gratis tipo .com , .org  y .net\r\nSubdominios 10\r\nTrafico de gran capacidad 20 GB\r\nBackup diarios y semanales SI\r\nConexion 155 MB/S\r\nCuentas de correo(e-mail de 50 mb c/u)  10\r\nWebmail    SI\r\nFiltros ANTISPAM (correo no deseado) SI\r\nSIstema Antivirus SI\r\nReenviador de e-mail SI\r\nAuto contestador de e-mail SI\r\nSMTP send email SI\r\nCatch all e-mail SI\r\nPGP MAIL (e-mail encriptado) SI\r\nPHP 5.2 / 7.0  SI\r\nBase de datos MySQL 20\r\nCarpetas cgi-bin SI\r\nWordpress, Joomla, Drupal, etc. SI\r\nMoodle, Chamilo, Dokeos, etc. SI\r\nPrestashop, Magento, OpenCart, etc SI\r\nPanel de control CPanel SI\r\nPÃ¡ginas protegidas por contraseÃ±a SI\r\nFTP cuentas de acceso SI\r\nEstadÃ­sticas detalladas del sitio SI'),
('Profesional', 83, 2600, 'Hospedaje en internet', 'Espacio en disco duro 10GB,\r\nDominios gratis tipo .com , .org  y .net\r\nSubdominios Ilimitado\r\nTrafico de gran capacidad Ilimitado\r\nBackup diarios y semanales SI\r\nConexion 155 MB/S\r\nCuentas de correo(e-mail de 50 mb c/u)  25\r\nWebmail    SI\r\nFiltros ANTISPAM (correo no deseado) SI\r\nSIstema Antivirus SI\r\nReenviador de e-mail SI\r\nAuto contestador de e-mail SI\r\nSMTP send email SI\r\nCatch all e-mail SI\r\nPGP MAIL (e-mail encriptado) SI\r\nPHP 5.2 / 7.0  SI\r\nBase de datos MySQL limitado\r\nCarpetas cgi-bin SI\r\nWordpress, Joomla, Drupal, etc. SI\r\nMoodle, Chamilo, Dokeos, etc. SI\r\nPrestashop, Magento, OpenCart, etc SI\r\nPanel de control CPanel SI\r\nPÃ¡ginas protegidas por contraseÃ±a SI\r\nFTP cuentas de acceso SI\r\nEstadÃ­sticas detalladas del sitio SI'),
('Corporativo', 84, 3800, 'Hospedaje en internet', 'Espacio en disco duro 30GB,\r\nDominios gratis tipo .com , .org  y .net\r\nSubdominios Ilimitado\r\nTrafico de gran capacidad Ilimitado\r\nBackup diarios y semanales SI\r\nConexion 155 MB/S\r\nCuentas de correo(e-mail de 50 mb c/u)  Ilimitadas\r\nWebmail    SI\r\nFiltros ANTISPAM (correo no deseado) SI\r\nSIstema Antivirus SI\r\nReenviador de e-mail SI\r\nAuto contestador de e-mail SI\r\nSMTP send email SI\r\nCatch all e-mail SI\r\nPGP MAIL (e-mail encriptado) SI\r\nPHP 5.2 / 7.0  SI\r\nBase de datos MySQL Ilimitado\r\nCarpetas cgi-bin SI\r\nWordpress, Joomla, Drupal, etc. SI\r\nMoodle, Chamilo, Dokeos, etc. SI\r\nPrestashop, Magento, OpenCart, etc SI\r\nPanel de control CPanel SI\r\nPÃ¡ginas protegidas por contraseÃ±a SI\r\nFTP cuentas de acceso SI\r\nEstadÃ­sticas detalladas del sitio SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `nombrePaquete` varchar(30) NOT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `inicioServicio` date DEFAULT NULL,
  `FechadeRenovacion` date DEFAULT NULL,
  `descripcionServicioExtra` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
