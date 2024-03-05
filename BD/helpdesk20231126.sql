-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 03:16:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion`
--

CREATE TABLE `t_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `marca` varchar(245) DEFAULT NULL,
  `modelo` varchar(245) DEFAULT NULL,
  `color` varchar(245) DEFAULT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `memoria` varchar(245) DEFAULT NULL,
  `disco_duro` varchar(245) DEFAULT NULL,
  `procesador` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_persona`, `id_equipo`, `marca`, `modelo`, `color`, `descripcion`, `memoria`, `disco_duro`, `procesador`) VALUES
(2, 4, 5, 'LG', 'IPS224', 'NEGRO', 'Monitor Principal', '', '', ''),
(3, 4, 5, 'DELL', 'RX24', 'NEGRO', 'Monitor Segundario', '', '', ''),
(4, 4, 4, 'logitech', 'z300', 'negro', 'teclado alambrico', '', '', ''),
(5, 4, 1, 'dell', 'rm2009', 'negro', 'PC Torre dell', '16GB', 'SSD 500GB', 'INTEL I3'),
(6, 1, 14, 'LG', 'rx34', 'blanco', '', '', '', ''),
(7, 1, 1, 'dell', 'jf46', 'negro', 'Nuc', '16gb', '500gb', 'i3'),
(8, 1, 16, 'hp', '3456', 'negro', 'cartuchos nuevos', '', '', ''),
(9, 13, 2, 'hp', '4567x', 'negro', 'Notebook conectado con adaptador lan', '8gb', '256gb', 'intel I3'),
(10, 12, 1, 'DELL', '45GT', 'GRIS', 'TORRE DELL', '8GB', '460GB', 'INTEL I3'),
(11, 11, 1, 'SATE', 'MG3455', 'GRIS', 'TORRE SATE', '8GB', '500GB', 'INTEL I3'),
(12, 11, 14, 'LG', 'RX2000', 'NEGRO', 'DE 16\'\'', '', '', ''),
(13, 11, 16, 'ZEBRA', '4721', 'GRIS', 'IMPRESORA DE LABEL', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_equipo`
--

CREATE TABLE `t_cat_equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_equipo`
--

INSERT INTO `t_cat_equipo` (`id_equipo`, `nombre`, `descripcion`) VALUES
(1, 'PC', NULL),
(2, 'Notebook', NULL),
(3, 'Mouse', NULL),
(4, 'Teclado', NULL),
(5, 'Monitor', NULL),
(6, 'Amplificador', NULL),
(7, 'Microfono', NULL),
(8, 'Proyector', NULL),
(9, 'Scanner', NULL),
(10, 'Camara', NULL),
(11, 'Adaptador', NULL),
(12, 'Paquete Office(Word, Excel, Etc)', NULL),
(13, 'Conexion(Sistema ERP, Inventiva, Internet, Intranet)', NULL),
(14, 'Monitor Principal', NULL),
(15, 'Monitor Secundario', NULL),
(16, 'Impresora', NULL),
(17, 'carpeta compartida', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'cliente', 'Es un cliente'),
(2, 'admin', 'Es Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` varchar(245) NOT NULL,
  `sexo` varchar(150) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `paterno`, `materno`, `nombre`, `fecha_nacimiento`, `sexo`, `telefono`, `correo`, `fechaInsert`) VALUES
(1, 'help', NULL, 'demo', '2021-08-09', 'Admin', '56895623', 'helpdesk@gmail.com', '2021-08-09 14:18:27'),
(2, 'lopez', 'martinez', 'juan', '2000-01-10', 'M', '88', 'correo@gmail.com', '2021-08-10 13:59:19'),
(4, 'Duarte', NULL, 'Pablo', '1997-15-01', 'Admin', '0971661865', 'pcesarduarte97@gmail.com', '2023-11-23 17:58:37'),
(6, 'Perez', NULL, 'Juan', '2000-12-12', 'Prod', '200', 'test@correo.com', '2023-11-25 19:14:38'),
(7, 'Soporte', NULL, '1', '2000-20-20', 'Administracion', '400', 'soporte1@correo.com', '2023-11-26 15:32:20'),
(8, 'Soporte', NULL, '1', '2000-20-20', 'Administracion', '400', 'soporte1@correo.com', '2023-11-26 15:37:49'),
(9, 'Soporte', NULL, '2', '2000-20-20', 'Administracion', '400', 'soporte2@correo.com', '2023-11-26 15:45:34'),
(10, 'Soporte', NULL, '3', '2000-20-20', 'Administracion', '400', 'soporte3@correo.com', '2023-11-26 15:46:51'),
(11, 'Usuario', NULL, 'Montaje', '1990-10-10', 'Produccion', '205', 'montaje@correo.com', '2023-11-26 15:50:03'),
(12, 'comercio', NULL, 'user', '1990-11-10', 'Administracion', '105', 'comercio@correo.com', '2023-11-26 15:51:58'),
(13, 'almacen', NULL, 'user', '2000-12-10', 'Produccion', '500', 'almacen@correo.com', '2023-11-26 15:54:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_usuario_tecnico` int(11) DEFAULT NULL,
  `descripcion_problema` text NOT NULL,
  `solucion_problema` text DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizado` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `asignado` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_reportes`
--

INSERT INTO `t_reportes` (`id_reporte`, `id_usuario`, `id_equipo`, `id_usuario_tecnico`, `descripcion_problema`, `solucion_problema`, `estatus`, `fecha`, `fecha_actualizado`, `asignado`) VALUES
(1, 4, 5, 1, 'monitor principal prende y apaga', '1113', 2, '2023-11-23 23:04:03', '2023-11-26 15:25:30', '0'),
(2, 4, 1, 1, 'lento', '1112', 2, '2023-11-25 00:21:21', '2023-11-26 13:17:03', '0'),
(3, 2, 14, 1, 'prende y apaga', '1114', 2, '2023-11-25 01:33:16', '2023-11-26 13:29:34', '0'),
(4, 4, 1, 7, 'No prende', '1111', 0, '2023-11-25 17:06:53', '2023-11-26 16:10:21', '0'),
(5, 11, 16, 1, 'No imprime', '1113', 0, '2023-11-26 16:03:46', '2023-11-26 16:17:22', '0'),
(6, 13, 2, 1, 'conexion fallida', '1111', 2, '2023-11-26 17:02:52', '2023-11-26 17:28:10', '0'),
(7, 13, 2, NULL, 'prueba', NULL, 1, '2023-11-26 17:13:18', '2023-11-26 17:13:18', ''),
(8, 4, 4, 1, 'test', '1111', 2, '2023-11-26 17:13:59', '2023-11-26 17:30:59', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_insert` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_persona`, `usuario`, `password`, `ubicacion`, `activo`, `fecha_insert`) VALUES
(1, 2, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'RR.HH', 1, NULL),
(2, 1, 1, 'cliente', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'AirBag', 1, NULL),
(4, 1, 4, '3689', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Informatica', 1, NULL),
(6, 1, 6, 'usuario', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Deposito P. Terminado', 2, NULL),
(7, 2, 7, 'soporte1', '4fa3d4c54a62b0ae7a435f71f6af6f54f29b97e7', 'Informatica', 1, NULL),
(9, 2, 9, 'soporte2', 'e5bb507f0d3232d35747706ffccf4087aed214c4', 'Informatica', 1, NULL),
(10, 2, 10, 'soporte3', 'c83a9210990dc99107b8290dd2691c71954fb324', 'Informatica', 1, NULL),
(11, 1, 11, '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Linea Main - Sub', 1, NULL),
(12, 1, 12, '4567', '83787f060a59493aefdcd4b2369990e7303e186e', 'Comercio Exterior Administracion', 1, NULL),
(13, 1, 13, '1236', '229be39e04f960e46d8a64cadc8b4534e6bfc364', 'Almacenamiento Operativo', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkPersonaAsignacion_idx` (`id_persona`),
  ADD KEY `fkequipoAsignacion_idx` (`id_equipo`);

--
-- Indices de la tabla `t_cat_equipo`
--
ALTER TABLE `t_cat_equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `fkUsuarioReporte_idx` (`id_usuario`),
  ADD KEY `fkEquipoReporte_idx` (`id_equipo`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_cat_equipo`
--
ALTER TABLE `t_cat_equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD CONSTRAINT `fkPersonaAsignacion` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkequipoAsignacion` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD CONSTRAINT `fkEquipoReporte` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuarioReporte` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fkPersona` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkRoles` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
