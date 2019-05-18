-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 09:37 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutech_integrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id` int(11) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id`, `foto_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, '5cdf9c4a23d215cdf9c4a23d22jpg', 'Laptop Lenovo V310z', 5000000, 6500000, 5000000),
(2, '5cdf9c5aa182a5cdf9c5aa182bjpg', 'SSD SAMSUNG EVO 256 GB', 1200000, 1400000, 1200000),
(12, 'keyboard.jpg', 'Keyboard Logitech K100', 100000, 150000, 100000),
(13, 'ram.jpg', 'RAM Corsair 4GB SODIMM', 750000, 850000, 20),
(25, '5cdfafd4d59bc5cdfafd4d59bdjpg', 'Handphone Samsung S8', 8000000, 10000000, 5),
(26, '5cdfaff823de55cdfaff823de6jpg', 'Monitor LG 29 inch', 2500000, 2800000, 10),
(27, '5cdfb0d1046e05cdfb0d1046e5jpg', 'CPU Core I3 ', 5000000, 5500000, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
