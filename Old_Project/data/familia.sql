-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 21:09:31
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `familia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` bigint(11) NOT NULL,
  `familia` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `familia`) VALUES
(1, 'Rojas Sanchez'),
(2, 'Sanchez Solano'),
(6, 'Joya Jimenez'),
(9, 'desconocida conocida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` bigint(20) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `familias_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellido_1`, `apellido_2`, `edad`, `familias_id`) VALUES
(1, 'Camilo Eduard', 'rojas', 'sanchez', 33, 1),
(2, 'Sergio Ivan', 'Sanchez', 'Solano', 34, 2),
(3, 'Andres Mauricio', 'Rojas', 'Sanchez', 37, 1),
(32, 'Diana Cristina', 'Joya', 'Jimenez', 32, 6),
(110, 'Antonio Felipe', 'Rojas', 'Sanchez', 28, 1),
(111, 'Samir Julian', 'Sanchez', 'Solano', 40, 2),
(112, 'mariano', 'desconocida', 'conocida', 65, 9),
(113, 'Tatiana Carolina', 'Sanchez', 'Solano', 38, 2),
(114, 'Samir Julian', 'sanchez', 'solano', 40, 2),
(115, 'Cristiano', 'Rojas', 'Sanchez', 24, 1),
(119, 'Edna Lucia', 'Joya', 'Jimenez', 33, 6),
(120, 'Emma Lucia', 'Joya', 'Jimenez', 5, 6),
(122, 'Victoria', 'Joya', 'Jimenez', 2, 6),
(123, 'Juliana', 'Joya', 'Jimenez', 15, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `usuario` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `persona_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `persona_id`) VALUES
(1, 'camilo@eduardo.com', 'Camilo86', 1),
(10, 'diana@joya.com', 'D1anajoya', 32),
(11, 'antonio@felipe.com', 'P1peloco', 110),
(12, 'samir@julian.com', 'S4mirjuli', 114);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persona_id` (`persona_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
