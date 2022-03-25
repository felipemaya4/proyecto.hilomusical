-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql5.freesqldatabase.com
-- Tiempo de generación: 20-03-2022 a las 12:44:22
-- Versión del servidor: 5.5.62-0ubuntu0.14.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sql5479724`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token_usuario`
--

CREATE TABLE `token_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios_hilo` (
  `id` int(11) NOT NULL,
  `keyuser` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `empresa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cargo_empresa` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `plan` int(11) DEFAULT NULL,
  `autoriza_envio_emails` varchar(10) COLLATE utf8_bin NOT NULL,
  `autoriza_terminos` varchar(10) COLLATE utf8_bin NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `maxsesiones` int(11) DEFAULT NULL,
  `locales` int(11) DEFAULT NULL,
  `conectado` int(11) DEFAULT NULL,
  `borrarSesiones` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios_hilo` (`id`, `keyuser`, `email`, `nombre`, `apellido`, `password`, `empresa`, `cargo_empresa`, `celular`, `telefono`, `direccion`, `pais`, `ciudad`, `rol`, `plan`, `autoriza_envio_emails`, `autoriza_terminos`, `fecha_registro`, `fecha_fin`, `estado`, `maxsesiones`, `locales`, `conectado`, `borrarSesiones`) VALUES
(1552, '10b538a4c5c56f4cb4c1619f62ed3675', 'sanchez@gmail.com', 'felipe', 'Maya', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'SI', 'SI', '2022-03-17', '2022-03-25', NULL, NULL, NULL, NULL, NULL),
(1553, '3656784d0ae8919c09f33fc0870c97d3', 'pipe@maya.com', 'felipe', 'maya', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, '15987454984', NULL, NULL, NULL, 'hgfvifyvkjhvbkutgc', 1, NULL, 'NO', 'SI', '2022-03-17', '2022-03-25', NULL, NULL, NULL, NULL, NULL),
(1554, '055d40fb777bb9f448f88cf3d9dc75d2', 'luis.maya@maya.com', 'felipe', 'maya', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NO', 'SI', '2022-03-17', '2022-03-25', NULL, NULL, NULL, NULL, NULL),
(1555, '199dadbd44c325aa1ac319ceedfa24ff', 'luis.maya@gmail.com', 'luis', 'maya', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NO', 'SI', '2022-03-18', '2022-03-26', NULL, NULL, NULL, NULL, NULL),
(1556, '52234f95d1231535604ac51e5d7f8c67', 'mauro@torres.com', 'mauro', 'torres', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NO', 'SI', '2022-03-19', '2022-03-27', NULL, NULL, NULL, NULL, NULL),
(1557, '1e13505f74fe2f6a8850f067e1c0b359', 'kjghkkhg@gmail.com', 'felipe', 'maya', '13d9498fd20110dd2da34744ff5fa1c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NO', 'SI', '2022-03-20', '2022-03-28', NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `token_usuario`
--
ALTER TABLE `token_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios_hilo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `token_usuario`
--
ALTER TABLE `token_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios_hilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1558;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
