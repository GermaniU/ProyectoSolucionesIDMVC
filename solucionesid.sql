-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 08:56 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solucionesid`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrador`
--

CREATE TABLE `Administrador` (
  `UserAdmin` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administrador`
--

INSERT INTO `Administrador` (`UserAdmin`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
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
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`RFC`, `nombreCliente`, `dominio`, `totalPago`, `nombreEmpresa`, `telefonoClienteEmpresa`, `direccionClienteEmpresa`, `correoClienteEmpresa`) VALUES
('232', 'Germania', 'wwww.facebook.com', 2000, 'soluciones', 9999, '343', 'germani@gmail.com'),
('453', 'Pedro', 'www.google.com', 200000, 'GOOGLE', 999139274, 'calle 23 #453', 'pedr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Paquete`
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
-- Dumping data for table `Paquete`
--

INSERT INTO `Paquete` (`nombrePaquete`, `idPaquete`, `costoPaquete`, `tipoPaquete`, `descripcionPaquete`, `estado`) VALUES
('Basico 3', 1, 10000, 'Hosting 1', 'Paquetecon 2', '1'),
('HOSWEB', 12, 2000, 'WEB', 'PAQUETE PARA 4 EQUIPOS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Servicio`
--

CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `costoServicio` int(11) DEFAULT NULL,
  `descripcionServicio` varchar(150) DEFAULT NULL,
  `inicioServicio` date DEFAULT NULL,
  `finServicio` date DEFAULT NULL,
  `descripcionServicioExtra` varchar(150) DEFAULT NULL,
  `estadoServicio` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`UserAdmin`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`RFC`);

--
-- Indexes for table `Paquete`
--
ALTER TABLE `Paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indexes for table `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `fk_servicio` (`RFC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
