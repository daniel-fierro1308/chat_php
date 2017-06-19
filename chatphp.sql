-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2017 a las 00:41:06
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `usuario`, `contacto`, `fecha`) VALUES
(114, 43, 31, '2017-06-16 23:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeschat`
--

CREATE TABLE `mensajeschat` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensajeschat`
--

INSERT INTO `mensajeschat` (`id`, `mensaje`, `usuario`, `contacto`, `fecha`, `hora`) VALUES
(1, 'hola', 19, 16, '2016-04-14', '08:48:43'),
(2, 'hola', 16, 19, '2016-04-14', '08:49:45'),
(3, 'hola', 25, 26, '2017-06-13', '23:05:42'),
(4, 'hola', 26, 25, '2017-06-13', '23:06:27'),
(5, 'como vas', 25, 26, '2017-06-13', '23:06:41'),
(6, 'bien', 26, 25, '2017-06-13', '23:07:23'),
(7, 'hola', 26, 27, '2017-06-13', '23:09:37'),
(8, 'Hola', 34, 31, '2017-06-14', '19:23:23'),
(9, 'hola', 31, 35, '2017-06-14', '23:02:54'),
(10, 'que mas', 31, 35, '2017-06-14', '23:32:58'),
(11, 'rtyrt', 31, 35, '2017-06-14', '23:50:37'),
(12, 'yuiyui', 31, 35, '2017-06-14', '23:56:29'),
(13, 'que mas', 31, 35, '2017-06-14', '23:59:37'),
(14, 'bien', 31, 35, '2017-06-15', '00:01:03'),
(15, 'hola', 31, 35, '2017-06-15', '00:02:43'),
(16, 'hola', 31, 35, '2017-06-15', '00:03:50'),
(17, 'u', 31, 35, '2017-06-15', '00:05:12'),
(18, 'tyu', 31, 35, '2017-06-15', '00:06:53'),
(19, 'yui', 31, 35, '2017-06-15', '00:08:44'),
(20, 'ghjg', 31, 35, '2017-06-15', '00:09:42'),
(21, 'fgh', 31, 35, '2017-06-15', '00:10:19'),
(22, 'yhuyhi', 31, 35, '2017-06-15', '00:12:17'),
(23, 'tyty', 31, 35, '2017-06-15', '00:13:08'),
(24, 'hjkhjk', 31, 35, '2017-06-15', '00:13:26'),
(25, 'hoola', 31, 33, '2017-06-15', '00:14:36'),
(26, 'hola', 35, 31, '2017-06-15', '00:15:07'),
(27, 'pÂ´+p+', 35, 31, '2017-06-15', '00:22:28'),
(28, 'hola', 31, 35, '2017-06-15', '14:20:18'),
(29, 'que mas', 31, 35, '2017-06-15', '14:37:18'),
(30, 'ghjghj', 31, 35, '2017-06-15', '14:37:00'),
(31, 'tyu', 31, 35, '2017-06-15', '14:40:51'),
(32, 'como vas?', 31, 35, '2017-06-15', '14:45:48'),
(33, 'hola', 31, 37, '2017-06-15', '15:05:07'),
(34, 'yyu', 31, 37, '2017-06-15', '15:05:47'),
(35, 'ghj', 31, 37, '2017-06-15', '15:09:52'),
(36, 'que mas', 31, 37, '2017-06-15', '15:28:00'),
(37, 'bien y tu?', 31, 37, '2017-06-15', '15:32:03'),
(38, 'bineee', 31, 37, '2017-06-15', '15:33:21'),
(39, 'bien bien', 31, 37, '2017-06-15', '15:33:27'),
(40, 'bien', 35, 31, '2017-06-15', '16:06:52'),
(41, 'Hola', 40, 31, '2017-06-15', '16:24:37'),
(42, 'hola', 31, 40, '2017-06-15', '16:25:49'),
(43, 'que mas?', 40, 31, '2017-06-15', '16:26:01'),
(44, 'hola', 31, 31, '2017-06-15', '16:35:59'),
(45, 'hla', 31, 31, '2017-06-15', '16:36:16'),
(46, 'hola', 31, 43, '2017-06-16', '22:46:33'),
(47, 'que mas?', 43, 31, '2017-06-16', '22:46:44'),
(48, 'bien y tu?', 31, 43, '2017-06-16', '22:48:13'),
(49, 'bien', 31, 43, '2017-06-16', '22:50:09'),
(50, 'hjkh', 43, 31, '2017-06-16', '23:02:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `online` int(2) NOT NULL,
  `col2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `password`, `online`, `col2`) VALUES
(31, 'Daniel Fierro', 'daniel', 'daniel13081@outlook.com', '1c9508337bbf2de53703a9d57d81c5f5', 0, 0),
(43, 'gara', 'gara', 'gara@gara.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
