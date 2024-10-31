-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 18:21:31
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
  `cliente_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_agregado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`ID`, `cliente_id`, `producto_id`, `cantidad`, `fecha_agregado`) VALUES
(41, 27, 15, 1, '2024-10-29 20:28:58');

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
(27, 'amelisa', 'saled', 'wwegnhy@gmail.com', 'ab', '$2y$10$.vUlgTQA4927T3plVf//EeTVgkNzAzLtJp7LcDicmRB6Rf/Y0GCkC', '011-6767686', 'en algun lugar', 'cliente'),
(31, 'Zoe', 'Linares Rios', 'linaresrios@gmail.com', 'val', '$2y$10$JTU.c2e7tAVuD4ZD9.eYpeDRyt3TNSlUZ7JaW9rTnFErCxECXMBLa', '1130676907', 'Joaquín V. González 1932', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(1, 'Zoe Linares rios', 'linaresrioszoe@gmail.com', 'aa', '2024-10-25 16:10:30'),
(2, 'Zoe Linares rios', 'linaresrioszoe@gmail.com', 'sa', '2024-10-27 05:56:02');

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

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`ID`, `pedido_id`, `producto_id`, `cantidad`, `subtotal`) VALUES
(2, 2, 35, 1, 20.00),
(3, 3, 35, 1, 20.00),
(4, 3, 35, 1, 20.00),
(6, 3, 38, 1, 30.00),
(7, 3, 30, 1, 3000.00),
(8, 3, 39, 1, 30.00),
(9, 3, 37, 1, 30.00),
(30, 12, 37, 1, 30000.00),
(31, 12, 21, 1, 3500.00),
(32, 13, 24, 1, 2100.00),
(40, 20, 40, 1, 40000.00),
(41, 21, 15, 1, 9.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `ID` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `fecha_emision` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`ID`, `pedido_id`, `fecha_emision`, `total`) VALUES
(1, 4, '2024-10-25 23:33:57', 3033.00),
(2, 5, '2024-10-25 23:41:13', 3200.00),
(3, 6, '2024-10-26 01:38:04', 5456.00),
(4, 7, '2024-10-27 02:41:11', 30.00),
(5, 8, '2024-10-27 02:41:52', 3400.00),
(6, 9, '2024-10-27 03:23:57', 51726.00),
(7, 11, '2024-10-27 06:58:31', 58000.00),
(8, 12, '2024-10-27 18:04:18', 33500.00),
(9, 13, '2024-10-27 18:06:59', 2100.00),
(10, 14, '2024-10-27 18:07:50', 2100.00),
(11, 15, '2024-10-27 18:08:51', 2100.00),
(12, 16, '2024-10-27 18:09:22', 3200.00),
(13, 17, '2024-10-27 22:30:43', 6200.00),
(14, 18, '2024-10-27 22:31:37', 3200.00),
(15, 19, '2024-10-27 22:34:15', 2100.00),
(16, 20, '2024-10-29 03:42:38', 40000.00),
(17, 21, '2024-10-29 04:40:09', 9.00);

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

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID`, `cliente_id`, `fecha_pedido`, `total`, `estado`) VALUES
(1, 27, '2024-10-25 19:44:05', 5426.00, 'listo'),
(2, 27, '2024-10-25 21:32:29', 20.00, 'listo'),
(3, 27, '2024-10-25 22:46:49', 8556.00, 'listo'),
(4, 27, '2024-10-25 23:33:57', 3033.00, 'listo'),
(5, 27, '2024-10-25 23:41:13', 3200.00, 'listo'),
(6, 27, '2024-10-26 01:38:04', 5456.00, 'listo'),
(7, 27, '2024-10-27 02:41:11', 30.00, 'en preparación'),
(8, 27, '2024-10-27 02:41:52', 3400.00, 'en preparación'),
(9, 27, '2024-10-27 03:23:57', 51726.00, 'en preparación'),
(10, 27, '2024-10-27 06:57:01', 58000.00, 'en preparación'),
(11, 27, '2024-10-27 06:58:31', 58000.00, 'en preparación'),
(12, 27, '2024-10-27 18:04:18', 33500.00, 'en preparación'),
(13, 27, '2024-10-27 18:06:59', 2100.00, 'en preparación'),
(14, 27, '2024-10-27 18:07:50', 2100.00, 'en preparación'),
(15, 27, '2024-10-27 18:08:51', 2100.00, 'en preparación'),
(16, 27, '2024-10-27 18:09:22', 3200.00, 'en preparación'),
(17, 27, '2024-10-27 22:30:43', 6200.00, 'en preparación'),
(18, 27, '2024-10-27 22:31:37', 3200.00, 'en preparación'),
(19, 27, '2024-10-27 22:34:15', 2100.00, 'en preparación'),
(20, 27, '2024-10-29 03:42:38', 40000.00, 'en preparación'),
(21, 27, '2024-10-29 04:40:09', 9.00, 'en preparación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `Precio` varchar(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `categoria_id`, `Precio`, `imagen`, `stock`) VALUES
(15, '1 KG DE HELADO', 9, '9.000', '../img/1kg.jpeg', '55'),
(16, '1/2 KG DE HELADO', 9, '6600', '../img/12kg.jpeg', '78'),
(18, 'CONO 7 BOCHAS', 10, '5000', '../img/cono_muchos.jpeg', '89'),
(19, 'CONO COMBINADO', 10, '1700', '../img/cono_combi.jpeg', '0'),
(21, 'CONO TRIPLE', 10, '3500', '../img/cono_triple.jpeg', '44'),
(22, 'BOMBON DE VAINILLA CUBIERTO CON CHOCOLATE', 11, '4600', '../img/bombon_bainillin.jpeg', '44'),
(23, 'BOMBON CON DULCE DE LECHE', 11, '3200', '../img/bombon_dulceleche.jpeg', '57'),
(24, 'BOMBON GALLETITA', 11, '2100', '../img/bombon_galle.jpeg', '13'),
(25, 'BOMBON SIMPLE', 11, '3200', '../img/bombon_simple.jpeg', '19'),
(26, 'PALETA LIMON', 2, '2000', '../img/paleta_agua.jpeg', '33'),
(27, 'PALETA FRUTILLA', 2, '2000', '../img/paleta_agua2.jpeg', '20'),
(28, 'PALETA MANZANA', 2, '2000', '../img/paleta_agua3.jpeg', '20'),
(30, 'PALETA DE CREMA BAÑADA', 2, '3000', '../img/paleta_bañada.jpeg', '40'),
(31, 'PALETA FRUTOS ROJOS', 2, '3000', '../img/paleta_crema.jpeg', '200'),
(32, 'PALETA FRUTOS DEL BOSQUE', 2, '3000', '../img/paleta_crema2.jpeg', '30'),
(33, 'PALETA DE FRUTILLA ', 2, '3000', '../img/paleta_crema4.jpeg', '22'),
(34, 'PALETA DE CHOCOLATE', 2, '3000', '../img/paleta_crema5.jpeg', '37'),
(35, 'TORTA de cereza', 1, '28000', '../img/torta_cereza.jpeg', '20'),
(36, 'chocolate y dulce de leche', 1, '30000', '../img/torta_chocolate_dulce_de_leche.jpeg', '13'),
(37, 'TORTA chocolatosa', 1, '30000', '../img/torta_chocolatosa.jpeg', '8'),
(38, 'TORTA frutilla ', 1, '30000', '../img/torta_frutillas.jpeg', '12'),
(39, 'TORTA frutillita', 1, '30000', '../img/torta_frutilla.jpeg', '12'),
(40, 'torta mini helados', 1, '40000', '../img/torta_helados.jpeg', '22'),
(53, '1/4 DE KILO DE HELADO', 9, '3500', '../img/14kg.jpeg', '');

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
-- Estructura de tabla para la tabla `sabores`
--

CREATE TABLE `sabores` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sabores`
--

INSERT INTO `sabores` (`Id`, `nombre`, `producto_id`) VALUES
(1, 'Chocolate', 0),
(2, 'Chocolate Amargo', 0),
(3, 'Chocolate Blanco', 0),
(4, 'Chocolate Turco', 0),
(5, 'Chocolate Suizo', 0),
(6, 'Chocolate Nevado', 0),
(7, 'Crema Americana', 0),
(8, 'Crema Oreo', 0),
(9, 'Crema de Avellanas', 0),
(10, 'Crema del Cielo', 0),
(11, 'Crema Granizada', 0),
(12, 'Crema de Almendra', 0),
(13, 'Frutos Rojos', 0),
(14, 'Frutilla', 0),
(15, 'Mango', 0),
(16, 'Maracuyá', 0),
(17, 'Limón', 0),
(18, 'Cereza', 0),
(19, 'Matcha', 0),
(20, 'Tramontana', 0),
(21, 'Ferrero Rocher', 0),
(22, 'Menta Granizada', 0),
(23, 'Frappuccino', 0),
(24, 'Mascarpone', 0),
(25, 'Arándanos', 0),
(26, 'Banana', 0),
(27, 'Frambuesa', 0),
(28, 'Pistacho', 0),
(29, 'Stracciatella', 0),
(30, 'Turrón', 0),
(31, 'Chocolate Almendrado', 0),
(32, 'Chocolate Turco', 0),
(33, 'Chocolate con Sal Marina', 0),
(83, 'Frutilla a la crema', 0),
(84, 'Crema Moka', 0),
(85, 'Crema Rusa', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cliente_id` (`cliente_id`,`producto_id`),
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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
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
-- Indices de la tabla `sabores`
--
ALTER TABLE `sabores`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `producto_sabor`
--
ALTER TABLE `producto_sabor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sabores`
--
ALTER TABLE `sabores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
