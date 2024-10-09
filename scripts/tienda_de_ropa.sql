-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 08-10-2024 a las 04:37:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda de ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_venta`
--

INSERT INTO `detalles_venta` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`) VALUES
(1, 1, 1, 3, '29.99'),
(2, 2, 2, 1, '49.99'),
(4, 4, 5, 1, '34.99'),
(5, 5, 4, 1, '19.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Estilo Moderno', 'Ropa con un toque contemporáneo y elegante.'),
(2, 'Moda Urbana', 'Diseños inspirados en la cultura urbana y streetwear.'),
(3, 'Clásicos Eternos', 'Prendas que nunca pasan de moda, ideales para cualquier ocasión.'),
(4, 'EcoFashion', 'Moda sostenible y amigable con el medio ambiente.'),
(5, 'Deportes Activos', 'Ropa diseñada para un estilo de vida activo y deportivo.');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `marcas_con_ventas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `marcas_con_ventas` (
`marca_id` int(11)
,`marca_nombre` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `prendas_vendidas_stock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `prendas_vendidas_stock` (
`producto_id` int(11)
,`producto_nombre` varchar(255)
,`stock_restante` int(11)
,`cantidad_vendida` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `marca_id`, `imagen_url`) VALUES
(1, 'Camisa Casual', 'Camisa de algodón ligera, perfecta para el verano.', '29.99', 60, 1, 'url_imagen1.jpg'),
(2, 'Sudadera con Capucha', 'Sudadera cómoda y cálida, ideal para el invierno.', '49.99', 30, 2, 'url_imagen2.jpg'),
(4, 'Camiseta Deportiva', 'Camiseta transpirable, perfecta para hacer ejercicio.', '19.99', 100, 5, 'url_imagen4.jpg'),
(5, 'Vestido de Verano', 'Vestido ligero y colorido, ideal para días soleados.', '34.99', 20, 1, 'url_imagen5.jpg');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `top_5_marcas_vendidas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `top_5_marcas_vendidas` (
`marca_id` int(11)
,`marca_nombre` varchar(255)
,`cantidad_ventas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`, `telefono`, `direccion`, `fecha_registro`) VALUES
(1, 'Juan Pérez', 'juanperez@example.com', 'password123', '555-1234', 'Calle Falsa 123', '2024-01-01 10:00:00'),
(2, 'María Gómez', 'mariagomez@example.com', 'password456', '555-5678', 'Avenida Siempre Viva 742', '2024-02-15 12:30:00'),
(3, 'Luis Rodríguez', 'luisrodriguez@example.com', 'password789', '555-9101', 'Boulevard de la Vida 456', '2024-03-20 15:45:00'),
(4, 'Ana Martínez', 'anamartinez@example.com', 'password321', '555-1112', 'Calle de la Esperanza 789', '2024-04-25 09:00:00'),
(5, 'Carlos López', 'carloslopez@example.com', 'password654', '555-1314', 'Calle de la Amistad 101', '2024-05-30 08:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `usuario_id`, `fecha_venta`, `total`) VALUES
(1, 1, '2024-06-01 10:15:00', '89.97'),
(2, 2, '2024-06-05 14:30:00', '64.98'),
(3, 3, '2024-06-10 16:45:00', '39.99'),
(4, 4, '2024-06-15 11:00:00', '34.99'),
(5, 5, '2024-06-20 13:20:00', '19.99');

-- --------------------------------------------------------

--
-- Estructura para la vista `marcas_con_ventas`
--
DROP TABLE IF EXISTS `marcas_con_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `marcas_con_ventas`  AS SELECT DISTINCT `m`.`id` AS `marca_id`, `m`.`nombre` AS `marca_nombre` FROM `marcas` AS `m` WHERE exists(select 1 from (`productos` `p` join `detalles_venta` `dv` on(`p`.`id` = `dv`.`producto_id`)) where `p`.`marca_id` = `m`.`id` limit 1)  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `prendas_vendidas_stock`
--
DROP TABLE IF EXISTS `prendas_vendidas_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `prendas_vendidas_stock`  AS SELECT `p`.`id` AS `producto_id`, `p`.`nombre` AS `producto_nombre`, `p`.`stock` AS `stock_restante`, (select sum(`dv`.`cantidad`) from `detalles_venta` `dv` where `dv`.`producto_id` = `p`.`id`) AS `cantidad_vendida` FROM `productos` AS `p` WHERE exists(select 1 from `detalles_venta` `dv` where `dv`.`producto_id` = `p`.`id` limit 1)  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `top_5_marcas_vendidas`
--
DROP TABLE IF EXISTS `top_5_marcas_vendidas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `top_5_marcas_vendidas`  AS SELECT `m`.`id` AS `marca_id`, `m`.`nombre` AS `marca_nombre`, (select count(`dv`.`id`) from (`productos` `p` join `detalles_venta` `dv` on(`p`.`id` = `dv`.`producto_id`)) where `p`.`marca_id` = `m`.`id`) AS `cantidad_ventas` FROM `marcas` AS `m` WHERE exists(select 1 from (`productos` `p` join `detalles_venta` `dv` on(`p`.`id` = `dv`.`producto_id`)) where `p`.`marca_id` = `m`.`id` limit 1) ORDER BY (select count(`dv`.`id`) from (`productos` `p` join `detalles_venta` `dv` on(`p`.`id` = `dv`.`producto_id`)) where `p`.`marca_id` = `m`.`id`) DESC LIMIT 0, 55  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--Consultas 
SELECT 
    v.fecha_venta,
    SUM(dv.cantidad) AS total_prendas_vendidas
FROM 
    ventas v
JOIN 
    detalles_venta dv ON v.id = dv.venta_id
WHERE 
    DATE(v.fecha_venta) = '2024-06-20'
GROUP BY 
    v.fecha_venta;




UPDATE usuarios
SET nombre = 'Juan Pérez Actualizado', 
    correo = 'juanperez_actualizado@example.com'
WHERE id = 2;  -- Cambia el ID al cliente que deseas actualizar


DELETE FROM usuarios
WHERE id = 1;
