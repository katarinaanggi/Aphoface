-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aphroface`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produk`, `jumlah`, `username`) VALUES
(37, 2, 2, 'benita');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `password`, `nama`, `noHP`, `alamat`) VALUES
('benita', 'benita@gmail.com', 'roro', 'Benita Carina Wibisono', '08123456789', 'Solo'),
('fara', 'fandarini2001@gmail.com', 'farasub', 'Fara', '081290021771', 'Jakarta Pusat'),
('vina', 'vina@gmail.com', 'vina', 'Vina', '081234566739', 'Jl. Yu');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_produk` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_produk`, `id_transaksi`, `jumlah`, `subtotal`) VALUES
(5, 1, 1, 120000),
(2, 1, 1, 47500),
(2, 32, 2, 95000),
(3, 32, 2, 378000),
(2, 33, 1, 47500),
(5, 33, 1, 120000),
(6, 34, 1, 139000),
(4, 34, 1, 139000),
(3, 35, 2, 378000),
(1, 36, 1, 115500),
(3, 36, 1, 189000),
(5, 37, 1, 120000),
(4, 37, 1, 139000),
(1, 38, 1, 115500),
(4, 38, 1, 139000),
(3, 39, 1, 189000),
(1, 39, 1, 115500),
(3, 40, 1, 189000),
(2, 40, 1, 47500),
(2, 41, 1, 47500),
(5, 41, 1, 120000),
(3, 42, 1, 189000),
(4, 43, 1, 139000),
(8, 44, 1, 370500),
(4, 45, 1, 139000),
(1, 46, 1, 115500),
(4, 47, 1, 139000),
(5, 47, 1, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `norek` int(20) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `id_transaksi`, `nama`, `norek`, `bank`, `bukti`) VALUES
(15, 1, 'benita carina', 1234567, 'bca', 'image/261457262_transfer.jpg'),
(16, 32, 'fdsas', 56453232, 'bca', 'image/2105281149_about.png'),
(17, 33, 'hgffds', 46567686, 'bca', 'image/2146899078_blpfoundie.png'),
(18, 34, 'hgfdsa', 7654332, 'bri', 'image/1577277430_eminaglossy.png'),
(19, 36, 'hgfdsa', 9876543, 'bri', 'image/1591173629_eminaglossy.png'),
(20, 37, 'gdsfd', 987654, 'mandiri', 'image/1037969693_1577277430_eminaglossy.png'),
(21, 38, 'nghbfvds', 987654, 'bri', 'image/1374034920_blpfoundie.png'),
(22, 39, 'jhgfbd', 765432, 'bri', 'image/1453166857_1374034920_blpfoundie.png'),
(23, 40, 'ggfsdfds', 765432, 'bca', 'image/1764529422_somethincserum.png'),
(24, 41, 'jhgfds', 876543, 'bca', 'image/399116570_model.jpg'),
(26, 42, 'hggfgf', 2147483647, 'bca', 'image/305536334_somethinc.jpg'),
(27, 43, 'kyjtyhtr', 7654342, 'bca', 'image/1568837885_fss.jpg'),
(28, 44, 'ghfds', 8765432, 'bca', 'image/1821046510_glossystain.jpg'),
(29, 45, 'hgnbfdvc', 8765432, 'mandiri', 'image/1813257214_ysb1.jpg'),
(30, 46, 'ngfbds', 9876543, 'bri', 'image/1855959517_back-removebg-preview.png'),
(31, 47, 'lkjghf', 876543, 'mandiri', 'image/219998894_npure.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `produk_name`, `stok`, `image`, `price`, `brand`, `category`) VALUES
(1, 'SOMETHINC 10% Niacinamide', 100, 'image/somethincserum.png', 115500, 'SOMETHINC', 'skincare'),
(2, 'Emina Glossy Stain 3 g', 100, 'image/eminaglossy.png', 47500, 'Emina', 'makeup'),
(3, 'BLP Beauty Face Base', 100, 'image/blpfoundie.png', 189000, 'BLP Beauty', 'makeup'),
(4, 'Avoskin YOUR SKIN BAE SERIES Alpha Arbutin 3% + Grapeseed', 100, 'image/ysbungu.png', 139000, 'Avoskin', 'skincare'),
(5, 'Skingame Pore Armor Mask', 50, 'image/skingamemask.png', 120000, 'Skingame', 'skincare'),
(6, 'Avoskin YOUR SKIN BAE SERIES Hyacross 3% + Green Tea', 50, 'image/ysbbiru.png', 139000, 'Avoskin', 'skincare'),
(7, 'N\'Pure Cica Chocomint Clay Mask', 50, 'image/npuremask.png', 110000, 'NPure', 'skincare'),
(8, 'FSS For Skin\'s Sake Protect Weightless Sunscreen SPF 50 PA++++', 50, 'image/fss.png', 370500, 'For Skins Sake', 'skincare');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `username`, `review`, `id_produk`) VALUES
(1, 'fara', 'Bagus untuk memudarkan bekas jerawat', 1),
(2, 'benita', 'Best lip tint ever!!! Udah dipake makan ngga ilang-ilang :o', 2),
(3, 'fara', 'Bagus! Pas dipake ngga bikin kusam', 3),
(4, 'benita', 'Test', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `total` int(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total`, `username`) VALUES
(1, 167500, 'benita'),
(32, 260150, 'benita'),
(33, 184250, 'benita'),
(34, 305800, 'benita'),
(35, 207900, 'benita'),
(36, 334950, 'benita'),
(37, 284900, 'benita'),
(38, 279950, 'benita'),
(39, 334950, 'benita'),
(40, 260150, 'vina'),
(41, 184250, 'vina'),
(42, 207900, 'vina'),
(43, 152900, 'vina'),
(44, 407550, 'vina'),
(45, 152900, 'vina'),
(46, 127050, 'vina'),
(47, 284900, 'vina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `FK_detail_produk` (`id_produk`),
  ADD KEY `FK_detail_transaksi` (`id_transaksi`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_pay_trans` (`id_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `review_ibfk_1` (`id_produk`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_ibfk_1` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `FK_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FK_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_pay_trans` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
