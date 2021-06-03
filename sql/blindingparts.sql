-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2021 a las 03:46:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blindingparts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id` int(50) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ancho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `largo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `peso` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla guarda el stock de repuestos actual.';

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id`, `nombre`, `descripcion`, `alto`, `ancho`, `largo`, `peso`) VALUES
(1, 'Rodamiento 6204', 'Pieza encargada de soportar y guiar elementos giratorios u oscilantes de distintas máquinas.', '20cm', '30cm', '5cm', '2kg'),
(2, 'Estopera Milimetrica', 'Tiene por función primordial retener aceites, grasas u otros fluidos que deban ser contenidos en el interior de una máquina o conjunto mecánico.', '80cm', '98cm', '10cm', '500g'),
(3, 'Acople tipo estrella', 'Pieza que tiene la capacidad para absorber ligeras sobrecargas, vibraciones y desalineaciones.', '57cm', '94cm', '15cm', '800g'),
(4, 'Piñones para cadenas', 'Crea una friccion que funciona como fuente de energia, hace rodar de manera circular sus partes dentadas y consigo la cadena en cuestión.', '30cm', '40cm', '15cm', '2kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla guarda los usuarios autorizados a operar';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `puesto`) VALUES
(1, 'Jairo', 'Gomez', 'gomezjairo14@gmail.com', 'Operador de maquinaria'),
(2, 'Roberto', 'Jimenez', 'robertoji@outlook.com', 'Ensamblador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_repuesto`
--

CREATE TABLE `usuario_repuesto` (
  `id_usuario` int(50) NOT NULL,
  `id_repuesto` int(50) NOT NULL,
  `fecha_asignacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Esta tabla guarda la relacion entre el usuario y el repuesto';

--
-- Volcado de datos para la tabla `usuario_repuesto`
--

INSERT INTO `usuario_repuesto` (`id_usuario`, `id_repuesto`, `fecha_asignacion`) VALUES
(1, 2, '02-06-2021, 06:47:16 AM'),
(1, 1, '02-06-2021, 06:50:14 AM'),
(1, 3, '02-06-2021, 06:50:34 AM'),
(2, 1, '02-06-2021, 07:08:07 AM'),
(2, 1, '02-06-2021, 07:08:43 AM'),
(2, 1, '02-06-2021, 07:10:15 AM'),
(2, 2, '02-06-2021, 07:11:04 AM'),
(2, 2, '02-06-2021, 09:02:01 AM'),
(1, 3, '02-06-2021, 09:06:58 AM'),
(1, 2, '02-06-2021, 09:20:53 AM'),
(1, 1, '02-06-2021, 11:29:58 PM'),
(1, 4, '03-06-2021, 03:41:22 AM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_repuesto`
--
ALTER TABLE `usuario_repuesto`
  ADD KEY `id_repuesto` (`id_repuesto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_repuesto`
--
ALTER TABLE `usuario_repuesto`
  ADD CONSTRAINT `usuario_repuesto_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_repuesto_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
