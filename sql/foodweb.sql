-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2023 a las 09:34:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foodweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, 2, 'pedro', 'juarez', 5596324751, 'pedro27@gmail.com'),
(2, 3, 'david', 'cruz', 5584362196, 'jorgecr28@gmail.com'),
(3, 4, 'maria ', 'hernandez', 5632148954, 'maria41@gmail.com'),
(4, 5, 'jorge', 'sarabia', 5548913526, 'jorge19@gmail.com'),
(5, 6, 'gustavo', 'badillo', 5523698418, 'gus38@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` tinyint(2) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `puesto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_usuario`, `nombre`, `apellido`, `fecha_nacimiento`, `edad`, `telefono`, `correo`, `puesto`) VALUES
(1, NULL, 'gabriel', 'lopez', '1990-03-21', 33, 5548792566, 'gabo69@gmail.com', 'chef'),
(2, NULL, 'monica', 'torres', '2001-04-26', 22, 5566892348, 'monii97@gmail.com', 'mesera'),
(3, NULL, 'eduardo', 'sarabia', '1995-08-23', 27, 5588341964, 'lalo73@gmail.com', 'bartender'),
(4, NULL, 'cristian', 'portuguez', '2003-10-09', 19, 559827163849, 'cris30@gmial.com', 'recepcionista'),
(5, NULL, 'carlos', 'rivas', '2003-11-20', 19, 5522394781, 'charly30@gmail.com', 'gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_reservacion`
--

CREATE TABLE `mesa_reservacion` (
  `id_mesa` int(11) NOT NULL,
  `id_reservacion` int(11) DEFAULT NULL,
  `no_mesa` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesa_reservacion`
--

INSERT INTO `mesa_reservacion` (`id_mesa`, `id_reservacion`, `no_mesa`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 12),
(4, 5, 22),
(5, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int(11) NOT NULL,
  `tipo_paquete` enum('desayuno','comida','cena','buffet') NOT NULL,
  `descripcion_paquete` varchar(200) DEFAULT NULL,
  `precio` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `tipo_paquete`, `descripcion_paquete`, `precio`) VALUES
(1, 'desayuno', 'omelette,panFrances,coctelFrutas', 40),
(2, 'comida', 'salmonVinoBlanco,sopaAzteca,pastaBolonesa', 300),
(3, 'cena', 'sopaFria,clubSandwich,pozoleRojo', 200),
(4, 'buffet', 'Alitas, Piernitas de Pollo, Carde para tacos, Comida china completa, Guisados primavera, Costilla a la BBQ,', 170);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_paquete` int(11) NOT NULL,
  `cantidad_personas` bigint(5) NOT NULL,
  `informacion_extra` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `id_cliente`, `fecha`, `hora`, `tipo_paquete`, `cantidad_personas`, `informacion_extra`) VALUES
(2, 1, '2023-03-13', '01:16:00', 1, 1, ''),
(3, 2, '2027-05-27', '14:17:00', 2, 6, ''),
(4, 3, '2023-06-19', '18:17:00', 4, 7, ''),
(5, 4, '2026-09-30', '13:18:00', 4, 2, ''),
(6, 4, '2023-11-30', '17:19:00', 2, 6, 'Comida de muchos estilos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_clientes`
--

CREATE TABLE `usuarios_clientes` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_clientes`
--

INSERT INTO `usuarios_clientes` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'id', 'id'),
(2, 'pedro', '$2y$10$InQTCOQmStrWgDUKsQLBluZ2uTHhiyNPn0D.vtk8NZbyAn8v8BwlO'),
(3, 'david', '$2y$10$at4HM6CknCgbimEVc2NAhuOQar30pKQzw.Nxwu4jTVhESrwaEHtgC'),
(4, 'maria', '$2y$10$XjBkx/i/miZCUtu/LbEyc.sJ2zq9ok8eGddbfqIFlZyRkxWZ0nqGC'),
(5, 'jorge', '$2y$10$h5HqPQV/bBVBawZmc4wlX.6h/axC8H/VekwduI20ziBRX2WvYT4QO'),
(6, 'gustavo', '$2y$10$vP/sQYcMLz4nk2on2CxJVOhdvWKDfeV0xt/tB/3u0iHulhdJRMFlK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_empleados`
--

CREATE TABLE `usuarios_empleados` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_empleados`
--

INSERT INTO `usuarios_empleados` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'id', 'id');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mesa_reservacion`
--
ALTER TABLE `mesa_reservacion`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_reservacion` (`id_reservacion`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `tipo_paquete` (`tipo_paquete`);

--
-- Indices de la tabla `usuarios_clientes`
--
ALTER TABLE `usuarios_clientes`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_empleados`
--
ALTER TABLE `usuarios_empleados`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesa_reservacion`
--
ALTER TABLE `mesa_reservacion`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios_clientes`
--
ALTER TABLE `usuarios_clientes`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios_empleados`
--
ALTER TABLE `usuarios_empleados`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios_clientes` (`id_usuario`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios_empleados` (`id_usuario`);

--
-- Filtros para la tabla `mesa_reservacion`
--
ALTER TABLE `mesa_reservacion`
  ADD CONSTRAINT `mesa_reservacion_ibfk_1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservaciones` (`id_reservacion`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`tipo_paquete`) REFERENCES `paquetes` (`id_paquete`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
