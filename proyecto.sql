-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2019 a las 01:41:37
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idalmacen` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`idalmacen`, `nombre`, `imagen`, `direccion`, `tipo`, `facebook`, `instagram`, `telefono`, `email`, `descripcion`, `estado`) VALUES
(1, 'karlita', 'megatec.jpg', 'zacatecoluca', 'prestigio', 'almacen karlita', '_karlita01', '22222387', 'la moda a tu alcance', 'karl@gmail.com', 1),
(2, 'wilfredo', 'wil.jpg', 'xacatecas', 'inclusivo', 'wilfredi rivera', '_wilfredoriveras000', '24232555', 'wil@gmail.com', 'la moda a tu alcance', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barberia`
--

CREATE TABLE `barberia` (
  `idbarberia` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwash`
--

CREATE TABLE `carwash` (
  `idcar` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carwash`
--

INSERT INTO `carwash` (`idcar`, `nombre`, `imagen`, `direccion`, `facebook`, `instagram`, `telefono`, `email`, `descripcion`, `estado`) VALUES
(1, 'gfhfgvhjng', 'LOGOS.png', 'gdfgd', 'hgfh', 'gfhgf', '22558899', 'fghfgh', 'fghfgh', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `idclinica` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(350) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` int(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `facebook` text COLLATE utf8_spanish2_ci NOT NULL,
  `twitter` text COLLATE utf8_spanish2_ci NOT NULL,
  `instagram` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gimnacio`
--

CREATE TABLE `gimnacio` (
  `idgim` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idhotel` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idhotel`, `nombre`, `imagen`, `direccion`, `tipo`, `facebook`, `instagram`, `telefono`, `email`, `descripcion`, `estado`) VALUES
(1, 'zzxfxcf', 'megatec.jpg', 'xfcvhbcg', 'cvbvc', 'vcbcv', 'vcbc', 'bcvbvcb', 'vcbvcb', 'cvbcvb', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `idrestaurante` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`idrestaurante`, `nombre`, `imagen`, `direccion`, `tipo`, `facebook`, `instagram`, `telefono`, `email`, `descripcion`, `estado`) VALUES
(1, 'zfsdgffsgf', 'gisela.jpg', 'asfasf', 'erfsdgf', 'dgsg', 'dsgdsg', 'ghkjk', 'hjkhjki', 'hjklhjk', 1),
(2, 'hjkljjkl', '2.png', 'kjl.jkñk', 'kljk.ñ', 'jkljkl', 'jlklkñ', 'kljl', 'kjlljkl', 'jkljk', 1),
(3, 'zfdzsstgdfygfh', 'LOGOS.png', 'fbcb', 'cvbcvb', 'gfbcvb', 'cvbcvb', '22558899', '_Gisela', 'bcvb', 0),
(4, 'karlita', 'Captura de pantalla (26).png', 'Zacatecoluca', 'Prestigio', 'karlitaSV', '_kartila01', '25242623', 'La ropa a la  moda al mejor precio', 'kar@gmail.com', 1),
(5, 'karlita', '', 'Zacatecoluca', 'Prestigio', 'karlitaSV', '_kartila01', '25242623', 'La ropa a la  moda al mejor precio', 'kar@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salonbelleza`
--

CREATE TABLE `salonbelleza` (
  `idsalon` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `facebook` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `emai` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `instagram` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idalmacen`);

--
-- Indices de la tabla `barberia`
--
ALTER TABLE `barberia`
  ADD PRIMARY KEY (`idbarberia`);

--
-- Indices de la tabla `carwash`
--
ALTER TABLE `carwash`
  ADD PRIMARY KEY (`idcar`);

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`idclinica`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`),
  ADD UNIQUE KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `gimnacio`
--
ALTER TABLE `gimnacio`
  ADD PRIMARY KEY (`idgim`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idhotel`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`idrestaurante`);

--
-- Indices de la tabla `salonbelleza`
--
ALTER TABLE `salonbelleza`
  ADD PRIMARY KEY (`idsalon`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `barberia`
--
ALTER TABLE `barberia`
  MODIFY `idbarberia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carwash`
--
ALTER TABLE `carwash`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gimnacio`
--
ALTER TABLE `gimnacio`
  MODIFY `idgim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idhotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `idrestaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salonbelleza`
--
ALTER TABLE `salonbelleza`
  MODIFY `idsalon` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
