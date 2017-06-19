-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2016 a las 08:55:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chatphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `usuario`, `contacto`, `fecha`) VALUES
(19, 24, 19, '2016-04-14 08:45:59'),
(18, 16, 19, '2016-04-14 08:45:38'),
(17, 8, 19, '2016-04-14 08:44:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeschat`
--

CREATE TABLE IF NOT EXISTS `mensajeschat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mensajeschat`
--

INSERT INTO `mensajeschat` (`id`, `mensaje`, `usuario`, `contacto`, `fecha`, `hora`) VALUES
(1, 'hola', 19, 16, '2016-04-14', '08:48:43'),
(2, 'hola', 16, 19, '2016-04-14', '08:49:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `online` int(2) NOT NULL,
  `col2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `online`, `col2`) VALUES
(21, 'sara', '5bd537fc3789b5482e4936968f0fde95', 0, 0),
(18, 'carlos', 'dc599a9972fde3045dab59dbd1ae170b', 0, 0),
(19, 'miguel', '9eb0c9605dc81a68731f61b3e0838937', 0, 0),
(7, 'rosa', '84109ae4b4178430b8174b1dfef9162b', 0, 0),
(8, 'vaneza', '1a04002dde6c8558eecbd4c62109db08', 0, 0),
(16, 'karla', '5fcd162c2418ef549b7b912976468942', 1, 0),
(23, 'rosario', '865cc410a1b7c60ae8a38c8761b2b342', 0, 0),
(24, 'patricio', '295299b687749528c9a9e551d11e17ea', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
