-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2024 a las 21:08:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saveme`
--
CREATE DATABASE SaveMe;
USE SaveMe;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id` int(11) NOT NULL,
  `nombre_metodo` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `metodos_pago`(`id`, `nombre_metodo`, `descripcion`) VALUES
	(1, "Tarjeta de Crédito", "Pago mediante tarjeta"),
    (2, "Transferencia Bancaria", "Pago mediante transferencia"),
    (3, "Efectivo", "Pago mediante efectivo");

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_seguro` int(11) DEFAULT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalizacion_polizas`
--

CREATE TABLE `personalizacion_polizas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_seguro` int(11) DEFAULT NULL,
  `cobertura_adicional` varchar(255) DEFAULT NULL,
  `periodo` int(11) DEFAULT NULL,
  `fecha_personalizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguros`
--

CREATE TABLE `seguros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cobertura` decimal(10,2) DEFAULT NULL,
  `prima_mensual` decimal(10,2) DEFAULT NULL,
  `fecha_disponible_desde` date DEFAULT NULL,
  `fecha_disponible_hasta` date DEFAULT NULL,
  `id_tipo_seguro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguros`
--

INSERT INTO `seguros` (`id`, `nombre`, `descripcion`, `tipo`, `cobertura`, `prima_mensual`, `fecha_disponible_desde`, `fecha_disponible_hasta`, `id_tipo_seguro`) VALUES
(6, 'Seguro de Automóviles grandes', 'Cobertura completa de accidentes y daños a terceros', 'Automóviles grandes', 100000.00, 500.00, '2024-01-01', '2025-01-01', 1),
(7, 'Seguro de Vida', 'Cobertura para fallecimiento e invalidez', 'Vida', 500000.00, 300.00, '2024-01-01', '2025-01-01', 2),
(8, 'Seguro de Propiedades', 'Cobertura contra incendios y robos', 'Propiedades', 200000.00, 400.00, '2024-01-01', '2025-01-01', 3),
(9, 'Seguro de Salud', 'Cobertura médica completa y hospitalización', 'Salud', 100000.00, 200.00, '2024-01-01', '2025-01-01', 4),
(10, 'Seguro de Viajes', 'Cobertura para emergencias médicas y pérdidas', 'Viajes', 50000.00, 100.00, '2024-01-01', '2025-01-01', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_seguros`
--

CREATE TABLE `tipos_seguros` (
  `id` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL,
  `descripcion_tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_seguros`
--

INSERT INTO `tipos_seguros` (`id`, `nombre_tipo`, `descripcion_tipo`) VALUES
(1, 'Automóviles', 'Cobertura para vehículos y accidentes automovilísticos'),
(2, 'Vida', 'Cobertura para fallecimiento e invalidez'),
(3, 'Propiedades', 'Cobertura contra incendios y robos'),
(4, 'Salud', 'Cobertura médica completa y hospitalización'),
(5, 'Viajes', 'Cobertura para emergencias médicas y pérdidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'admin@gmail.com', 'admin123', 2),
(3, 'jmiranda90059@ufide.ac.cr', '$2y$10$yxgprAmWjiuSoKz7O5HbvO8wLESXuuP5y3hMaUZKmMxFoTsxY4n3G', 2),
(4, 'admin@admin.com', '$2y$10$lXRSp/QcpkM50nGbrQHTM.8XmNQMA7ApD32kQSe/hSoCvyhnR.i1G', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_seguro` (`id_seguro`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `personalizacion_polizas`
--
ALTER TABLE `personalizacion_polizas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_seguro` (`id_seguro`);

--
-- Indices de la tabla `seguros`
--
ALTER TABLE `seguros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_seguro` (`id_tipo_seguro`);

--
-- Indices de la tabla `tipos_seguros`
--
ALTER TABLE `tipos_seguros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personalizacion_polizas`
--
ALTER TABLE `personalizacion_polizas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguros`
--
ALTER TABLE `seguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipos_seguros`
--
ALTER TABLE `tipos_seguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_seguro`) REFERENCES `seguros` (`id`),
  ADD CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `personalizacion_polizas`
--
ALTER TABLE `personalizacion_polizas`
  ADD CONSTRAINT `personalizacion_polizas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `personalizacion_polizas_ibfk_2` FOREIGN KEY (`id_seguro`) REFERENCES `seguros` (`id`);

--
-- Filtros para la tabla `seguros`
--
ALTER TABLE `seguros`
  ADD CONSTRAINT `seguros_ibfk_1` FOREIGN KEY (`id_tipo_seguro`) REFERENCES `tipos_seguros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
