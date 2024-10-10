-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2024 a las 17:35:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heladeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_agregado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `nombre`) VALUES
(1, 'Tortas'),
(2, 'Paletas'),
(9, 'Helados'),
(10, 'conos'),
(11, 'bombones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `rol` enum('cliente','administrador') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `nombre`, `apellido`, `email`, `usuario`, `contraseña`, `telefono`, `direccion`, `rol`) VALUES
(10, 'Zoe', 'Linares Rios', 'linaresrioszoe@gmail.com', 'aa', '$2y$10$m9/M4Gq92kQ2CfOCFrKIq.DJcjp.RJ5AnZFYStFmDjBOsE7ZxWHLq', '01130676907', 'Joaquín V. González 1932', NULL),
(11, 'a', 'aa', 'aa@gmail.com', 'hh', '$2y$10$aIZVkHNB6ujtBQLwm/LF7.8uUx7pfQ4Y.s49y5oH.JO3JN54GHf3.', 'gg', '88', NULL),
(12, 'ab', 'ab', 'linaresrioszoe@gmail.com', 'ab', '$2y$10$ypW3W3dtkR4DefN6bGUoDO0A5pyBsQ0Otf/pplwfDp4Pj7Wap8.1a', '01130676907', 'Joaquín V. González 1932', NULL),
(13, 'Zoe', 'Linares Rios', 'linaresrioszoe@gmail.com', 'aa', '$2y$10$6qDFTZtKT5LJVC1pgCaD.uUsj.qcjnCa0vx2iJv5Xc2OLTQlz9hiC', '01130676907', 'Joaquín V. González 1932', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `fecha_emisión` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('en preparación','listo','entregado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `Precio` varchar(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `categoria_id`, `Precio`, `imagen`) VALUES
(15, '1 KG DE HELADO', 9, '9.000', 'img/1kg.jpeg'),
(16, '1/2 KG DE HELADO', 9, '6.500', 'img/1kg.jpeg'),
(17, '1/4 KG DE HELADO', 9, '$3.500', 'img/1kg.jpeg'),
(18, 'CONO 7 BOCHAS', 10, '5.000', 'img/cono_muchos.jpeg'),
(19, 'CONO COMBINADO', 10, '1.500', 'img/cono_combi.jpeg'),
(20, 'CONO SIMPLE ', 10, '1.700', 'img/cono_simple.jpeg'),
(21, 'CONO TRIPLE', 10, '3.200', 'img/cono_triple.jpeg'),
(22, 'BOMBON DE VAINILLA CUBIERTO CON CHOCOLATE', 11, '4600', 'img/bombon_bainillin.jpeg'),
(23, 'BOMBON CON DULCE DE LECHE', 11, '3200', 'img/bombon_dulceleche.jpeg'),
(24, 'BOMBON GALLETITA', 11, '1.700', 'img/bombon_galle.jpeg'),
(25, 'BOMBON SIMPLE', 11, '3.200', 'img/bombon_simple.jpeg'),
(26, 'PALETA LIMON', 2, '2000', 'img/paleta_agua.jpeg'),
(27, 'PALETA FRUTILLA', 2, '2000', 'img/paleta_agua2.jpeg'),
(28, 'PALETA MANZANA', 2, '2000', 'img/paleta_agua3.jpeg'),
(29, 'PALETA NARANJA', 2, '2000', 'img/paleta_agua4.jpeg'),
(30, 'PALETA DE CREMA BAÑADA', 2, '3000', 'img/paleta_bañada.jpeg'),
(31, 'PALETA FRUTOS ROJOS', 2, '3000', 'img/paleta_crema.jpeg'),
(32, 'PALETA FRUTOS DEL BOSQUE', 2, '3000', 'img/paleta_crema2.jpeg'),
(33, 'PALETA DE FRUTILLA ', 2, '3000', 'img/paleta_crema4.jpeg'),
(34, 'PALETA DE CHOCOLATE', 2, '3000', 'img/paleta_crema5.jpeg'),
(35, 'TORTA 1', 1, '20.000', 'img/torta_cereza.jpeg'),
(36, 'TORTA 2', 1, '30.000', 'img/torta_chocolate_dulce_de_leche.jpeg'),
(37, 'TORTA 3', 1, '30.000', 'img/torta_chocolatosa.jpeg'),
(38, 'TORTA 4', 1, '30.000', 'img/torta_frutillas.jpeg'),
(39, 'TORTA 6', 1, '30.000', 'img/torta_frutilla.jpeg'),
(40, 'torta 6', 1, '40,000', 'img/torta_helados.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sabor`
--

CREATE TABLE `producto_sabor` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `sabor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `ID` int(11) NOT NULL,
  `nombre_promoción` varchar(100) DEFAULT NULL,
  `descripción` text DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descuento` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabores`
--

CREATE TABLE `sabores` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sabores`
--

INSERT INTO `sabores` (`Id`, `Nombre`, `Stock`) VALUES
(1, 'Chocolate', 50),
(2, 'Chocolate Amargo', 50),
(3, 'Chocolate Blanco', 50),
(4, 'Chocolate Turco', 50),
(5, 'Chocolate Suizo', 50),
(6, 'Chocolate Nevado', 50),
(7, 'Crema Americana', 50),
(8, 'Crema Oreo', 50),
(9, 'Crema de Avellanas', 50),
(10, 'Crema del Cielo', 50),
(11, 'Crema Granizada', 50),
(12, 'Crema de Almendra', 0),
(13, 'Frutos Rojos', 50),
(14, 'Frutilla', 50),
(15, 'Mango', 50),
(16, 'Maracuyá', 50),
(17, 'Limón', 50),
(18, 'Cereza', 50),
(19, 'Matcha', 50),
(20, 'Tramontana', 50),
(21, 'Ferrero Rocher', 50),
(22, 'Menta Granizada', 50),
(23, 'Frappuccino', 50),
(24, 'Mascarpone', 50),
(25, 'Arándanos', 50),
(26, 'Banana', 50),
(27, 'Frambuesa', 50),
(28, 'Pistacho', 50),
(29, 'Stracciatella', 50),
(30, 'Turrón', 50),
(31, 'Chocolate Almendrado', 50),
(32, 'Chocolate Turco', 50),
(33, 'Chocolate con Sal Marina', 50),
(83, 'Frutilla a la crema', 50),
(84, 'Crema Moka', 50),
(85, 'Crema Rusa', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `producto_sabor`
--
ALTER TABLE `producto_sabor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producto_id` (`producto_id`,`sabor_id`),
  ADD KEY `sabor_id` (`sabor_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sabores`
--
ALTER TABLE `sabores`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `producto_sabor`
--
ALTER TABLE `producto_sabor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sabores`
--
ALTER TABLE `sabores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`ID`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`ID`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`ID`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`ID`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`ID`);

--
-- Filtros para la tabla `producto_sabor`
--
ALTER TABLE `producto_sabor`
  ADD CONSTRAINT `producto_sabor_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `producto_sabor_ibfk_2` FOREIGN KEY (`sabor_id`) REFERENCES `sabores` (`Id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
