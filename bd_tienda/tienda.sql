-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `plataforma` varchar(30) NOT NULL,
  `contacto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`plataforma`, `contacto`) VALUES
('WhatsApp', '526182179990'),
('FormSpree', 'https://formspree.io/f/xoqboyqk');

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE `instagram` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instagram`
--

INSERT INTO `instagram` (`id`, `link`) VALUES
(1, 'https://www.instagram.com/p/CkeBw-0uMoE/?utm_source=ig_embed&ig_rid=c539bf25-b116-42d0-b518-d3baeb37bc22'),
(2, 'https://www.instagram.com/p/Cidlz4VuEdw/?utm_source=ig_embed&ig_rid=e5351f9a-87bb-4a91-8cfa-c3196fd18378'),
(6, 'https://www.instagram.com/p/CHbB8bfjFf7/?utm_source=ig_embed&utm_campaign=loading');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nombre`, `precio`, `imagen`) VALUES
(15, 'Pantalones', '200', 'public/uploads/8683555427_1_1_3.jpg'),
(16, 'Camisa Blanca', '150', 'public/uploads/D_NQ_NP_778262-MLM42467091474_072020-O.jpg'),
(17, 'Bolsa para dama', '459', 'public/uploads/BOLSA-PARA-DAMA--MK-HAWAIIAN-DAYS.jpg'),
(18, 'Sueter para mujer', '349', 'public/uploads/719FgHV9lGL._AC_SX569_.jpg'),
(19, 'Teclado mecánico G PRO', '1999', 'public/uploads/51K1mE5uVyL._AC_SY355_.jpg'),
(20, 'Logitech G502 Hero', '879', 'public/uploads/61mpMH5TzkL._AC_SY450_.jpg'),
(21, 'Audifonos Inalambricos Corsair Void Pro', '3000', 'public/uploads/61ZjYA2fX4L.jpg'),
(22, 'Monitor Gaming MOBIUZ', '17999', 'public/uploads/01-ex3410r-front-high.webp'),
(23, 'Mochila Paw Patrol', '459', 'public/uploads/980040232s.jpg'),
(24, 'Papel Higiénico, Paquete Con 4 Rollos De 400 Hojas', '35', 'public/uploads/71TX7gpXoLL._AC_SX425_.jpg'),
(25, 'Desodorante en barra para hombre Axe Apollo', '41', 'public/uploads/7832809-800-450.webp'),
(27, 'Coca ', '1200', '');

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `payment_id` int(50) NOT NULL,
  `status_pago` text NOT NULL,
  `tipo_pago` text NOT NULL,
  `orden_id` int(50) NOT NULL,
  `pagada` text DEFAULT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`id`, `usuario`, `producto`, `payment_id`, `status_pago`, `tipo_pago`, `orden_id`, `pagada`, `precio`) VALUES
(12, 2, 22, 1310869433, 'approved', 'credit_card', 2147483647, 'si', '17999'),
(13, 1, 15, 1310869573, 'approved', 'credit_card', 2147483647, 'si', '200');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` int(11) NOT NULL,
  `privilegio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `privilegio`) VALUES
(1, 'root', 1234, 'admin'),
(2, 'user', 1234, 'estandar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instagram`
--
ALTER TABLE `instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
