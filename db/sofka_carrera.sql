-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2021 a las 10:28:36
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sofka_carrera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_carril`
--

CREATE TABLE `tbl_carril` (
  `id` int(11) NOT NULL,
  `id_carro` int(11) DEFAULT NULL,
  `desplazamiento` int(11) DEFAULT 0,
  `id_pista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_carril`
--

INSERT INTO `tbl_carril` (`id`, `id_carro`, `desplazamiento`, `id_pista`) VALUES
(1, 0, 0, 1),
(2, 0, 0, 1),
(3, 0, 0, 1),
(4, 0, 0, 2),
(5, 0, 0, 2),
(6, 0, 0, 2),
(7, 0, 0, 2),
(8, 0, 0, 3),
(9, 0, 0, 3),
(10, 0, 0, 3),
(11, 0, 0, 3),
(12, 0, 0, 3),
(13, 0, 0, 4),
(14, 0, 0, 4),
(15, 0, 0, 4),
(16, 0, 0, 4),
(17, 0, 0, 4),
(18, 0, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_carro`
--

CREATE TABLE `tbl_carro` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `id_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_carro`
--

INSERT INTO `tbl_carro` (`id`, `color`, `id_conductor`) VALUES
(1, 'Amarillo', 1),
(2, 'Azul', 2),
(3, 'Rojo', 3),
(4, 'Negro', 4),
(5, 'Blanco', 5),
(6, 'Verde', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conductor`
--

CREATE TABLE `tbl_conductor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_jugador` int(11) DEFAULT NULL,
  `escogido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_conductor`
--

INSERT INTO `tbl_conductor` (`id`, `nombre`, `id_jugador`, `escogido`) VALUES
(1, 'Juan', 0, 0),
(2, 'Sebastian', 0, 0),
(3, 'Ana', 0, 0),
(4, 'Adrés', 0, 0),
(5, 'Pablo', 0, 0),
(6, 'Isabel', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_juego`
--

CREATE TABLE `tbl_juego` (
  `id` int(11) NOT NULL,
  `id_Pista` int(11) NOT NULL,
  `id_Podio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_jugador`
--

CREATE TABLE `tbl_jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `primerLugar` int(11) NOT NULL,
  `estaJugando` tinyint(1) NOT NULL DEFAULT 0,
  `turno` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_jugador`
--

INSERT INTO `tbl_jugador` (`id`, `nombre`, `primerLugar`, `estaJugando`, `turno`) VALUES
(1, 'Jugador 1', 0, 0, 0),
(2, 'Jugador 2', 0, 0, 0),
(3, 'Jugador 3', 0, 0, 0),
(4, 'Jugador 4', 0, 0, 0),
(5, 'Jugador 5', 0, 0, 0),
(6, 'Jugador 6', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pista`
--

CREATE TABLE `tbl_pista` (
  `id` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `carriles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pista`
--

INSERT INTO `tbl_pista` (`id`, `km`, `carriles`) VALUES
(1, 2, 3),
(2, 2, 4),
(3, 2, 5),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_podio`
--

CREATE TABLE `tbl_podio` (
  `id` int(11) NOT NULL,
  `jugadorPrimero` int(11) DEFAULT NULL,
  `jugadorSegundo` int(11) DEFAULT NULL,
  `jugadorTercero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_carril`
--
ALTER TABLE `tbl_carril`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pista` (`id_pista`);

--
-- Indices de la tabla `tbl_carro`
--
ALTER TABLE `tbl_carro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `tbl_conductor`
--
ALTER TABLE `tbl_conductor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_juego`
--
ALTER TABLE `tbl_juego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_jugador`
--
ALTER TABLE `tbl_jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_pista`
--
ALTER TABLE `tbl_pista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_podio`
--
ALTER TABLE `tbl_podio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_carril`
--
ALTER TABLE `tbl_carril`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_carro`
--
ALTER TABLE `tbl_carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_conductor`
--
ALTER TABLE `tbl_conductor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_juego`
--
ALTER TABLE `tbl_juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_jugador`
--
ALTER TABLE `tbl_jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_pista`
--
ALTER TABLE `tbl_pista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_podio`
--
ALTER TABLE `tbl_podio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_carril`
--
ALTER TABLE `tbl_carril`
  ADD CONSTRAINT `tbl_carril_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `tbl_pista` (`id`);

--
-- Filtros para la tabla `tbl_carro`
--
ALTER TABLE `tbl_carro`
  ADD CONSTRAINT `tbl_carro_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `tbl_conductor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
