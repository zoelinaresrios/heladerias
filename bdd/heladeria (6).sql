-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 17:49:23
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
  `fecha_agregado` datetime DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `cantidad` int(255) NOT NULL
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
(24, 'Zoe', 'Linares Rios', 'linaresrioszoe@gmail.com', 'aaa', '$2y$10$dCGXaJH4gMOYusc48cU0deLL.k6IMgp/OL0gPuG0ivGtFCjMwdlCG', '01130676907', 'Joaquín V. González 1932', 'administrador'),
(25, '', '', '', 'aaa', '$2y$10$G90nQc4HTWdHQrTr9DcC8uvn3.qliAURcGIPd3uVLNV1HEQ4vM/iK', '', '', 'cliente'),
(26, '', '', '', 'aaa', '$2y$10$gq7RhrzIcwa3Q8/sd3AGx.GY.NIFzx..bs1Buuoc1yKfPZWPv/GCq', '', '', 'cliente'),
(27, 'Zoe', 'Linares Rios', 'linaresrioszoe@gmail.com', 'ab', '$2y$10$.vUlgTQA4927T3plVf//EeTVgkNzAzLtJp7LcDicmRB6Rf/Y0GCkC', '01130676907', 'Joaquín V. González 1932', 'cliente'),
(28, 'aas', 'AAD', 'aa@gmail.com', 'aaa', '$2y$10$/tEp1F2Kte..N60kWB/pKO12gE3ymUaCgHUq9N3GwzaB.NXlJibqW', '01130676907', 'Joaquín V. González 1932', 'cliente'),
(29, 'Zoe', 'Linares Rios', 'linaresrioszoe@gmail.com', 'as', '$2y$10$mHjo2ofo2Bo1vNU5azPYDeYkDWpqS.wtyWr2ImYDDauVgIuZawVbu', '01130676907', 'Joaquín V. González 1932', 'cliente');

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
  `imagen` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `categoria_id`, `Precio`, `imagen`, `stock`) VALUES
(15, '1 KG DE HELADO', 9, '9.000', '../img/1kg.jpeg', '58'),
(16, '1/2 KG DE HELADO', 9, '6.500', '../img/1kg.jpeg', '79'),
(18, 'CONO 7 BOCHAS', 10, '5.000', '<?php\ninclude \'../db.php\'; // Asegúrate de que la ruta a db.php sea correcta\n\n// Consulta para obtener las categorías y sus productos\n$query = \"SELECT c.ID AS categoria_id, c.nombre AS categoria_nombre, p.ID AS producto_id, p.nombre AS producto_nombre, p.', '89'),
(19, 'CONO COMBINADO', 10, '1.500', '../img/cono_combi.jpeg', '5'),
(21, 'CONO TRIPLE', 10, '3500', '../img/cono_triple.jpeg', '45'),
(22, 'BOMBON DE VAINILLA CUBIERTO CON CHOCOLATE', 11, '4600', '../img/bombon_bainillin.jpeg', '45'),
(23, 'BOMBON CON DULCE DE LECHE', 11, '3200', '../img/bombon_dulceleche.jpeg', '59'),
(24, 'BOMBON GALLETITA', 11, '1.700', '../img/bombon_galle.jpeg', '17'),
(25, 'BOMBON SIMPLE', 11, '3.200', '../img/bombon_simple.jpeg', '20'),
(26, 'PALETA LIMON', 2, '2000', '../img/paleta_agua.jpeg', '33'),
(27, 'PALETA FRUTILLA', 2, '2000', '../img/paleta_agua2.jpeg', '20'),
(28, 'PALETA MANZANA', 2, '2000', '../img/paleta_agua3.jpeg', '20'),
(29, 'PALETA NARANJA', 2, '2000', '../img/paleta_agua4.jpeg', '20'),
(30, 'PALETA DE CREMA BAÑADA', 2, '3000', '../img/paleta_bañada.jpeg', '40'),
(31, 'PALETA FRUTOS ROJOS', 2, '3000', '../img/paleta_crema.jpeg', '200'),
(32, 'PALETA FRUTOS DEL BOSQUE', 2, '3000', '../img/paleta_crema2.jpeg', '30'),
(33, 'PALETA DE FRUTILLA ', 2, '3000', '../img/paleta_crema4.jpeg', '23'),
(34, 'PALETA DE CHOCOLATE', 2, '3000', '../img/paleta_crema5.jpeg', '37'),
(35, 'TORTA 1', 1, '20.000', '../img/torta_cereza.jpeg', '21'),
(36, 'chocolate y dulce de leche', 1, '30.000', '../img/torta_chocolate_dulce_de_leche.jpeg', '12'),
(37, 'TORTA chocolatosa', 1, '30.000', '../img/torta_chocolatosa.jpeg', '12'),
(38, 'TORTA frutilla ', 1, '30.000', '../img/torta_frutillas.jpeg', '12'),
(39, 'TORTA frutillita', 1, '30.000', '../img/torta_frutilla.jpeg', '12'),
(40, 'torta mini helados', 1, '40,000', '../img/torta_helados.jpeg', '23'),
(52, 'ayuda', 1, '5426', '../img/av.jpeg', '10');

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
  `Nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sabores`
--

INSERT INTO `sabores` (`Id`, `Nombre`) VALUES
(1, 'Chocolate'),
(2, 'Chocolate Amargo'),
(3, 'Chocolate Blanco'),
(4, 'Chocolate Turco'),
(5, 'Chocolate Suizo'),
(6, 'Chocolate Nevado'),
(7, 'Crema Americana'),
(8, 'Crema Oreo'),
(9, 'Crema de Avellanas'),
(10, 'Crema del Cielo'),
(11, 'Crema Granizada'),
(12, 'Crema de Almendra'),
(13, 'Frutos Rojos'),
(14, 'Frutilla'),
(15, 'Mango'),
(16, 'Maracuyá'),
(17, 'Limón'),
(18, 'Cereza'),
(19, 'Matcha'),
(20, 'Tramontana'),
(21, 'Ferrero Rocher'),
(22, 'Menta Granizada'),
(23, 'Frappuccino'),
(24, 'Mascarpone'),
(25, 'Arándanos'),
(26, 'Banana'),
(27, 'Frambuesa'),
(28, 'Pistacho'),
(29, 'Stracciatella'),
(30, 'Turrón'),
(31, 'Chocolate Almendrado'),
(32, 'Chocolate Turco'),
(33, 'Chocolate con Sal Marina'),
(83, 'Frutilla a la crema'),
(84, 'Crema Moka'),
(85, 'Crema Rusa');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
