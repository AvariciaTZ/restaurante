-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 05:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `boleta`
--

CREATE TABLE `boleta` (
  `idcomprobante` int(11) NOT NULL,
  `fechapago` date NOT NULL,
  `horapago` time NOT NULL,
  `subtotalpago` double NOT NULL,
  `descuento` double NOT NULL,
  `totalpago` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boleta`
--

INSERT INTO `boleta` (`idcomprobante`, `fechapago`, `horapago`, `subtotalpago`, `descuento`, `totalpago`) VALUES
(2, '2022-04-29', '03:26:00', 12, 13, 35);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '7BN99626VH7248709', '0000-00-00 00:00:00', 'COMPLETED', '2022-05-26 09:09:30', 'sb-fvs1216659167@per', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(268, 157, 8, 'Hamburguesa1', 30, 1),
(269, 158, 8, 'Hamburguesa1', 30, 1),
(270, 158, 4, 'Pizza', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `det_boleta`
--

CREATE TABLE `det_boleta` (
  `idDetBoleta` int(11) NOT NULL,
  `idBoleta` int(11) NOT NULL,
  `idDetalle_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `det_boleta`
--

INSERT INTO `det_boleta` (`idDetBoleta`, `idBoleta`, `idDetalle_compra`) VALUES
(84, 157, 157),
(85, 158, 158);

-- --------------------------------------------------------

--
-- Table structure for table `enc_boleta`
--

CREATE TABLE `enc_boleta` (
  `idBoleta` int(11) NOT NULL,
  `fecha_reg_boleta` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `totalPagar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enc_boleta`
--

INSERT INTO `enc_boleta` (`idBoleta`, `fecha_reg_boleta`, `idUsuario`, `totalPagar`) VALUES
(157, '2022-06-08', 1, 33),
(158, '2022-06-08', 1, 38.5);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `productoR` varchar(50) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `precio_compra` double NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `productoR`, `imagen`, `precio_compra`, `descripcion`, `categoria`) VALUES
(4, 'Pizza', 'cielo.jpeg', 5, 'Pizza quesadilla con atun', 'Promo'),
(5, 'Hamburguesa s3', 'hamburguesa.jpg', 12, 'hamburguesa con queso', 'hamburguesa'),
(8, 'Hamburguesa1', 'hamburguesa.jpg', 30, 'hamburguesa con papas', 'promo'),
(9, 'Hamburguesa2', 'hamburguesa.jpg', 20, 'hamburguesa con papas 2', 'promo'),
(10, 'QUESO DE ORO', 'quesoDeOro.jpg', 10, 'QUESOOOO', 'Promo'),
(26, 'Hamburguesa Doble, Queso y Tocino', 'pizza.jpeg', 8.5, 'Doble carne a la parrilla + triple queso americano + lechuga + tomate + cremosa mayonesa + deliciosas lascas de tocino.', 'Salchipapa'),
(27, 'Hamburguesa Wooper', 'hamburguesa.jpg', 12.8, 'lomo saltado', 'Hamburguesa');

-- --------------------------------------------------------

--
-- Table structure for table `productocarrito`
--

CREATE TABLE `productocarrito` (
  `idProductoCarrito` int(11) NOT NULL,
  `idUsuarioCar` int(11) NOT NULL,
  `nombreUsuarioCar` varchar(50) NOT NULL,
  `productoCar` varchar(50) NOT NULL,
  `precioCar` double NOT NULL,
  `cantidadCar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productocarrito`
--

INSERT INTO `productocarrito` (`idProductoCarrito`, `idUsuarioCar`, `nombreUsuarioCar`, `productoCar`, `precioCar`, `cantidadCar`) VALUES
(125, 2, 'maria diaz', 'Pollo broster', 20, 1),
(126, 2, 'maria diaz', 'Pollo broster', 20, 1),
(127, 2, 'maria diaz', 'Pollo broster', 20, 1),
(128, 2, 'maria diaz', 'Pollo broster', 20, 1),
(129, 2, 'maria diaz', 'Hamburguesa', 12.5, 3),
(130, 2, 'maria diaz', 'Hamburguesa', 12.5, 3),
(131, 2, 'maria diaz', 'Hamburguesa', 12.5, 1),
(132, 1, 'Pedro David De la cruz Díaz', 'Pizza', 5, 1),
(133, 1, 'Pedro David De la cruz Díaz', 'Pizza', 5, 1),
(134, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(135, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(136, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(137, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(138, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(139, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(140, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(141, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(142, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(143, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1),
(144, 1, 'Pedro David De la cruz Díaz', 'Hamburguesa', 12.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fecha_reg` date NOT NULL,
  `tipo_usuario` int(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `fullname`, `email`, `password`, `fecha_reg`, `tipo_usuario`, `direccion`, `telefono`) VALUES
(1, 'Pedro David De la cruz Díaz', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2009-06-22', 1, '', ''),
(2, 'maria diaz', 'maria@', '4b62fb6673246fcd7aa2d48af997906c56052235', '2009-06-22', 1, '', ''),
(3, 'alexandra diaz', 'alexandra@', '5105a61a3c02ab96f32566bd38bf5ae3792dd35d', '2001-06-22', 2, 'Av.Alexandra', ''),
(6, 'Cielo Morales', 'cielo@', 'de53e0ff92b6ec879562308f2fbeece45b224fac', '2001-06-22', 2, '', ''),
(15, 'valeria@', 'valeria@gmail.com', 'fb21fce3fa87f9b3a07f79e295f6fa413154fdb5', '2001-06-22', 1, 'av.valeria', ''),
(16, 'friega', 'friega', '4606668017e5aefba93e02d7c5df32fd59d29622', '2006-06-22', 2, 'friega', '986573424'),
(17, 'aeaMax', 'aeaMax', '00f4fc7dd907f8bf2859b0188bfa792b9d80a1cb', '2008-06-22', 2, 'aeaMax', ''),
(18, 'dsada', 'dad', '0da19b540f7c3526f24acba988b03df43b3c5cf3', '2008-06-22', 2, 'da', ''),
(19, 'dante@z', 'dante@z', '4fad5173d7a15ac58007e3a0423ca0dd383bb010', '2008-06-22', 2, 'dante@z', ''),
(20, 'dante@z', 'dante@z', '4fad5173d7a15ac58007e3a0423ca0dd383bb010', '2008-06-22', 2, 'dante@z', ''),
(21, 'aaaaaaaaaaaz', 'aaaaaaaaaaaz', 'b81f36d62675974f7dd1ba6cf2505d5c20d09365', '2008-06-22', 2, 'aaaaaaaaaaaz', ''),
(22, 'aaaaaaaaaaaz', 'aaaaaaaaaaaz', 'b81f36d62675974f7dd1ba6cf2505d5c20d09365', '2008-06-22', 2, 'aaaaaaaaaaaz', ''),
(23, 'tttttt', 'tttttt', '3292ccfad2b02195cdb85f79124b12e476b65ac0', '2008-06-22', 2, 'tttttt', ''),
(24, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(25, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(26, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(27, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(28, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(29, 'aaaaaaaaaaaaaaaaaaak', 'aaaaaaaaaaaaaaaaaaak', '53fdc4391d1a0b1023b075c2a843cddb67b0cc23', '2008-06-22', 2, 'aaaaaaaaaaaaaaaaaaak', ''),
(30, 'atk', 'atk', '51d6f745e2fdb9bfaac9ce17efb8be4141ab9d15', '2008-06-22', 2, 'atk', ''),
(31, 'atk', 'atk', '51d6f745e2fdb9bfaac9ce17efb8be4141ab9d15', '2008-06-22', 2, 'atk', ''),
(32, 'atk', 'atk', '51d6f745e2fdb9bfaac9ce17efb8be4141ab9d15', '2008-06-22', 2, 'atk', ''),
(33, 'zzt', 'zzt', 'fb42b0ae07f1c0c5141d9b4d26027a4abc952e18', '2008-06-22', 2, 'zzt', ''),
(34, 'zzt', 'zzt', 'fb42b0ae07f1c0c5141d9b4d26027a4abc952e18', '2008-06-22', 2, 'zzt', ''),
(35, 'zzt', 'zzt', 'fb42b0ae07f1c0c5141d9b4d26027a4abc952e18', '2008-06-22', 2, 'zzt', ''),
(36, 'aaaaaaarfz', 'aaaaaaarfz', '0e99ae667475ec01f49e51eef33dd6e827dc6dca', '2008-06-22', 2, 'aaaaaaarfz', ''),
(37, 'aaaaaaarfz', 'aaaaaaarfz', '0e99ae667475ec01f49e51eef33dd6e827dc6dca', '2008-06-22', 2, 'aaaaaaarfz', ''),
(38, 'rubenxd', 'rubenxd', '986c42cdc5b9be493ea20aec54482c2f03b7d158', '2008-06-22', 2, 'rubenxd', ''),
(39, 'Eris', 'eris@gmail', '0bea3202edbf4abc722a41f9a5fb96535e0166d0', '2008-06-22', 2, 'Av.Eris', '99999999'),
(40, 'Eris', 'eris@gmail', '0bea3202edbf4abc722a41f9a5fb96535e0166d0', '2008-06-22', 2, 'Av.Eris', '99999999'),
(41, 'Eris', 'eris@gmail', '0bea3202edbf4abc722a41f9a5fb96535e0166d0', '2008-06-22', 2, 'Av.Eris', '99999999'),
(42, 'paul', 'paul', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '2008-06-22', 2, 'paul', '6665465'),
(43, 'paul', 'paul', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '2008-06-22', 2, 'paul', '6665465'),
(44, 'paul', 'paul', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '2008-06-22', 2, 'paul', '6665465'),
(45, 'roxy', 'roxy', '3892633b6be7a270bb4007cd7ca372a373f3da39', '2008-06-22', 2, 'roxy', '98888'),
(46, 'dazz', 'dazz', '4b72da65b9e9e1899dd1b27e36b4fd27cc6c1552', '2008-06-22', 2, 'dazz', '987789654'),
(47, 'dazzt', 'dazzt', 'dcdf06854d68648256f401696e6b288050811d07', '2008-06-22', 2, 'dazzt', '987789654'),
(48, 'admin3', 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', '2008-06-22', 2, 'admin3', '123456789'),
(49, 'dadazz', 'dadazz', '2b5dbfa841ce7d82fbd3deb3d7a90b175311d797', '2008-06-22', 2, 'dadazz', '123456789'),
(50, 'dadazz', 'dadazz', '2b5dbfa841ce7d82fbd3deb3d7a90b175311d797', '2008-06-22', 2, 'dadazz', '123456789'),
(51, 'budders', 'budders', 'c8813c76325a531d951efd348231b81989646210', '2008-06-22', 2, 'budders', '912345678'),
(52, 'budders', 'budders', 'c8813c76325a531d951efd348231b81989646210', '2008-06-22', 2, 'budders', '912345678'),
(53, 'budders', 'budders', 'c8813c76325a531d951efd348231b81989646210', '2008-06-22', 2, 'budders', '912345678'),
(54, 'budders', 'budders', 'c8813c76325a531d951efd348231b81989646210', '2008-06-22', 2, 'budders', '912345678'),
(55, 'dante@ttg', 'dante@ttg', '9390dbe7f396c624c5ed6e8ab9adb088d5252b5f', '2008-06-22', 2, 'dante@ttg', '954678912'),
(56, 'aaaaaaf', 'aaaaaaf', 'b5ac5e8bd5403f2798c82ab0450bad2b3950bc63', '2008-06-22', 2, 'aaaaaaf', '986547987'),
(57, 'aaaaaaaadmin', 'aaaaaaaadmin', '4f05ebf72349116c5a3d47eb1e827a97201875a3', '2008-06-22', 2, 'aaaaaaaadmin', '986547987'),
(58, 'zzz', 'zzz@gmail.com', '40fa37ec00c761c7dbb6ebdee6d4a260b922f5f4', '2008-06-22', 2, 'zzz', '987789654'),
(59, 'zzzzg', 'zzzzg@gmail.com', '4b38be66fb3fcbcb0932249ae89177f1066b4fc0', '2008-06-22', 2, 'zzzzg', '999999999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`idcomprobante`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `det_boleta`
--
ALTER TABLE `det_boleta`
  ADD PRIMARY KEY (`idDetBoleta`),
  ADD KEY `idDetalle_compra` (`idDetalle_compra`);

--
-- Indexes for table `enc_boleta`
--
ALTER TABLE `enc_boleta`
  ADD PRIMARY KEY (`idBoleta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indexes for table `productocarrito`
--
ALTER TABLE `productocarrito`
  ADD PRIMARY KEY (`idProductoCarrito`),
  ADD KEY `idUsuarioCar` (`idUsuarioCar`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boleta`
--
ALTER TABLE `boleta`
  MODIFY `idcomprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `det_boleta`
--
ALTER TABLE `det_boleta`
  MODIFY `idDetBoleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `enc_boleta`
--
ALTER TABLE `enc_boleta`
  MODIFY `idBoleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `productocarrito`
--
ALTER TABLE `productocarrito`
  MODIFY `idProductoCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productocarrito`
--
ALTER TABLE `productocarrito`
  ADD CONSTRAINT `productocarrito_ibfk_1` FOREIGN KEY (`idUsuarioCar`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
