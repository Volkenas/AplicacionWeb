-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2013 a las 02:45:15
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rdn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id_notas` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned zerofill NOT NULL,
  `pnync` int(2) DEFAULT NULL,
  `talleri` int(2) DEFAULT NULL,
  `matini` int(2) DEFAULT NULL,
  `ccys` int(2) DEFAULT NULL,
  `tutopro1` int(2) DEFAULT NULL,
  `costdocu` int(2) DEFAULT NULL,
  `matematica` int(2) DEFAULT NULL,
  `fisicaapli` int(2) DEFAULT NULL,
  `topografia` int(2) DEFAULT NULL,
  `egdp` int(2) DEFAULT NULL,
  `eode` int(2) DEFAULT NULL,
  `mecanica` int(2) DEFAULT NULL,
  `geohabitad` int(2) DEFAULT NULL,
  `quimicagene` int(2) DEFAULT NULL,
  `tutop2` int(2) DEFAULT NULL,
  `hsi` int(2) DEFAULT NULL,
  `gos` int(2) DEFAULT NULL,
  `matecons` int(2) DEFAULT NULL,
  `mecasuel` int(2) DEFAULT NULL,
  `mecaflu` int(2) DEFAULT NULL,
  `iac` int(2) DEFAULT NULL,
  `admiobras` int(2) DEFAULT NULL,
  `tecnoconst` int(2) DEFAULT NULL,
  `obrasviales` int(2) DEFAULT NULL,
  `instsangas` int(2) DEFAULT NULL,
  `desaproeti` int(2) DEFAULT NULL,
  `resismate` int(2) DEFAULT NULL,
  `electmeca` int(2) DEFAULT NULL,
  `sistehidro` int(2) DEFAULT NULL,
  `tutop3` int(2) DEFAULT NULL,
  `desaendoconst` int(2) DEFAULT NULL,
  `algebralineal` int(2) DEFAULT NULL,
  `restmatering` int(2) DEFAULT NULL,
  `geologiaapli` int(2) DEFAULT NULL,
  `mecafluing` int(2) DEFAULT NULL,
  `orgconveing` int(2) DEFAULT NULL,
  `mateing` int(2) DEFAULT NULL,
  `analiestruc` int(2) DEFAULT NULL,
  `disenovial` int(2) DEFAULT NULL,
  `hidrologia` int(2) DEFAULT NULL,
  `polihabiviv` int(2) DEFAULT NULL,
  `ecogerpro` int(2) DEFAULT NULL,
  `concretarmad` int(2) DEFAULT NULL,
  `acueclodre` int(2) DEFAULT NULL,
  `unidadacre3` int(2) DEFAULT NULL,
  `tutop4` int(2) DEFAULT NULL,
  `ingpatri` int(2) DEFAULT NULL,
  `urbedi` int(2) DEFAULT NULL,
  `aceromadera` int(2) DEFAULT NULL,
  `ingtransit` int(2) DEFAULT NULL,
  `saneaconsambi` int(2) DEFAULT NULL,
  `geresoci` int(2) DEFAULT NULL,
  `manteobrascivi` int(2) DEFAULT NULL,
  `disenoestruct` int(2) DEFAULT NULL,
  `pavimentos` int(2) DEFAULT NULL,
  `obrashidrau` int(2) DEFAULT NULL,
  `fundamuros` int(2) DEFAULT NULL,
  `obrasistrans` int(2) DEFAULT NULL,
  `unidaacre4` int(2) DEFAULT NULL,
  `evalambi` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_notas`),
  UNIQUE KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nivel` enum('Administrador','Estudiante') COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` enum('E-','V-') COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(12) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('Hombre','Mujer') COLLATE utf8_unicode_ci NOT NULL,
  `trayecto` enum('Inicial','I','II','III','IV') COLLATE utf8_unicode_ci DEFAULT NULL,
  `trimestre` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned zerofill NOT NULL,
  `user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
