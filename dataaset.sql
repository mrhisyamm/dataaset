-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 12:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `umur_penyusutan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `stok`, `umur_penyusutan`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 'kursi', 0, 12, 50000, '2022-08-03 12:11:23', '2022-08-24 06:00:47', NULL),
(59, 'meja', 0, 12, 65000, '2022-08-03 12:11:38', '2022-08-24 06:01:07', NULL),
(60, 'papan tulis', 0, 12, 150000, '2022-08-04 01:28:36', '2022-08-24 06:01:19', NULL),
(61, 'motor', 3, 10, 2000000, '2022-08-04 01:34:10', '2022-08-04 01:39:48', '2022-08-04 01:39:48'),
(62, 'motor', 0, 10, 2000000, '2022-08-04 01:41:19', '2022-08-04 01:47:38', '2022-08-04 01:47:38'),
(63, 'motor', 0, 12, 24000000, '2022-08-04 01:47:59', '2022-08-24 06:01:30', NULL),
(64, 'ambulance', 0, 12, 200000000, '2022-08-04 01:56:18', '2022-08-24 06:01:41', NULL),
(65, 'printer', 0, 12, 700000, '2022-08-04 02:15:36', '2022-08-24 06:01:52', NULL),
(66, 'bak sampah', 0, 12, 15000, '2022-08-15 02:17:48', '2022-08-24 06:02:02', NULL),
(67, 'kondom', 90, 12, 20000, '2022-08-25 01:41:24', '2022-08-25 01:42:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelians`
--

CREATE TABLE `detail_pembelians` (
  `id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `qty_terjual` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pembelians_id` int(11) NOT NULL,
  `barangs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pembelians`
--

INSERT INTO `detail_pembelians` (`id`, `qty`, `subtotal`, `tanggal_beli`, `tanggal_expired`, `harga_beli`, `qty_terjual`, `created_at`, `updated_at`, `deleted_at`, `pembelians_id`, `barangs_id`) VALUES
(71, 50, 2500000, '2022-08-03', NULL, 50000, NULL, '2022-08-03 12:12:25', '2022-08-03 12:12:25', NULL, 81, 58),
(72, 30, 1500000, '2022-08-04', NULL, 50000, NULL, '2022-08-04 01:29:28', '2022-08-04 01:29:28', NULL, 82, 60),
(73, 3, 6000000, '2022-08-04', NULL, 2000000, NULL, '2022-08-04 01:36:32', '2022-08-04 01:36:32', NULL, 83, 61),
(74, 1, 24000000, '2022-08-04', NULL, 24000000, NULL, '2022-08-04 01:52:46', '2022-08-04 01:52:46', NULL, 84, 63),
(75, 1, 200000000, '2022-08-04', NULL, 200000000, NULL, '2022-08-04 02:04:54', '2022-08-04 02:04:54', NULL, 85, 64),
(76, 4, 2800000, '2022-08-04', NULL, 700000, NULL, '2022-08-04 02:16:24', '2022-08-04 02:16:24', NULL, 86, 65),
(77, 2, 30000, '2022-08-15', NULL, 15000, NULL, '2022-08-15 02:20:53', '2022-08-15 02:20:53', NULL, 89, 66),
(78, 90, 5400000, '2022-08-25', NULL, 60000, NULL, '2022-08-25 01:42:28', '2022-08-25 01:42:28', NULL, 90, 67);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penghapusan`
--

CREATE TABLE `detail_penghapusan` (
  `id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `penghapusan_id` int(11) NOT NULL,
  `barangs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_penghapusan`
--

INSERT INTO `detail_penghapusan` (`id`, `qty`, `keterangan`, `bukti`, `subtotal`, `created_at`, `updated_at`, `deleted_at`, `penghapusan_id`, `barangs_id`) VALUES
(45, 10, 'rusak', 'fd17ffe1-fe7b-4b9e-9c85-350505283bc1.jpg', 500000, '2022-08-03 12:19:08', '2022-08-03 12:19:08', NULL, 166, 58),
(46, 5, 'rusak', '9950a1a4-9e0d-4d63-94e3-52154389a339.jpg', 250000, '2022-08-03 12:21:40', '2022-08-03 12:21:40', NULL, 167, 58),
(48, 5, 'rusak', '988c8471-e875-4944-968d-89365efd860b.jpg', 250000, '2022-08-03 12:29:56', '2022-08-03 12:29:56', NULL, 169, 58),
(49, 5, 'rusak', '6fd7b695-51f3-4921-83a7-5d5c8d835c9e.JPG', 750000, '2022-08-04 01:30:44', '2022-08-04 01:30:44', NULL, 170, 60),
(50, 0, 'null', 'e19b7514-adeb-44bc-b56a-33190f3e5d4d.png', 0, '2022-08-04 01:38:34', '2022-08-04 01:38:34', NULL, 171, 61),
(51, 1, 'null', '97eb9950-9285-4518-a7d0-aaebc39f3316.png', 200000000, '2022-08-04 02:12:10', '2022-08-04 02:12:10', NULL, 173, 64),
(52, 2, 'lelang', '382bf5cb-e12d-490b-83b9-5681240ddec7.JPG', 1400000, '2022-08-04 02:18:45', '2022-08-04 02:18:45', NULL, 174, 65),
(53, 25, '--pilih keterangan--', 'd1821eac-5a9b-40da-8e9a-a8494ad8e976.JPG', 1250000, '2022-08-04 02:20:43', '2022-08-04 02:20:43', NULL, 175, 58),
(54, 1, 'hibah', '54eba4b3-fb20-4e2e-801f-db6c476e38b2.JPG', 15000, '2022-08-15 02:25:31', '2022-08-15 02:25:31', NULL, 176, 66);

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(11) NOT NULL,
  `tempat` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supliers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `tempat`, `tanggal`, `total`, `created_at`, `updated_at`, `deleted_at`, `supliers_id`) VALUES
(81, NULL, '2022-08-03', 2500000, '2022-08-03 12:12:25', '2022-08-03 12:12:25', NULL, NULL),
(82, NULL, '2022-08-04', 1500000, '2022-08-04 01:29:28', '2022-08-04 01:29:28', NULL, NULL),
(83, NULL, '2022-08-04', 6000000, '2022-08-04 01:36:32', '2022-08-04 01:52:25', '2022-08-04 01:52:25', NULL),
(84, NULL, '2022-08-04', 24000000, '2022-08-04 01:52:46', '2022-08-04 01:52:46', NULL, NULL),
(85, NULL, '2022-08-04', 200000000, '2022-08-04 02:04:54', '2022-08-04 02:04:54', NULL, NULL),
(86, NULL, '2022-08-04', 2800000, '2022-08-04 02:16:24', '2022-08-04 03:03:08', '2022-08-04 03:03:08', NULL),
(89, NULL, '2022-08-15', 30000, '2022-08-15 02:20:53', '2022-08-15 02:20:53', NULL, NULL),
(90, NULL, '2022-08-25', 5400000, '2022-08-25 01:42:28', '2022-08-25 01:42:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`id`, `tanggal`, `pembayaran`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(166, '2022-08-03', NULL, 500000, '2022-08-03 12:19:08', '2022-08-03 12:19:08', NULL),
(167, '2022-08-03', NULL, 250000, '2022-08-03 12:21:40', '2022-08-03 12:21:40', NULL),
(169, '2022-08-03', NULL, 250000, '2022-08-03 12:29:56', '2022-08-03 12:44:57', '2022-08-03 12:44:57'),
(170, '2022-08-04', NULL, 750000, '2022-08-04 01:30:42', '2022-08-04 02:22:36', '2022-08-04 02:22:36'),
(171, '2022-08-04', NULL, 0, '2022-08-04 01:38:34', '2022-08-04 02:21:31', '2022-08-04 02:21:31'),
(173, '2022-08-04', NULL, 200000000, '2022-08-04 02:12:09', '2022-08-04 02:14:25', '2022-08-04 02:14:25'),
(174, '2022-08-04', NULL, 1400000, '2022-08-04 02:18:45', '2022-08-04 02:22:27', '2022-08-04 02:22:27'),
(175, '2022-08-04', NULL, 1250000, '2022-08-04 02:20:43', '2022-08-04 02:22:19', '2022-08-04 02:22:19'),
(176, '2022-08-15', NULL, 15000, '2022-08-15 02:25:29', '2022-08-15 02:25:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `name`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asas', 'Samarinda', '2019-12-08 18:22:41', '2019-12-08 18:22:41', NULL),
(2, 'fijay', 'Samarinda', '2019-12-08 19:37:59', '2020-01-21 04:10:14', '2020-01-21 04:10:14'),
(3, 'fijay', 'jdhjhjs', '2019-12-08 21:33:10', '2019-12-16 03:06:04', '2019-12-16 03:06:04'),
(4, 'NO1', 'Samarinda', '2019-12-16 03:53:41', '2019-12-16 03:53:41', NULL),
(5, 'Imortal', 'Gajah Mada', '2020-01-21 04:11:44', '2020-01-21 04:11:44', NULL),
(6, 'fijay', NULL, '2020-02-13 02:59:51', '2020-02-13 02:59:58', '2020-02-13 02:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updatwd_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$yU.Evp7jIHNfuI8TBHK74uSS/ttSh2atakB7osWZN2guH26giiSJa', '2022-08-03 06:42:31', '2022-08-03 06:42:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_pembelians_pembelians1_idx` (`pembelians_id`),
  ADD KEY `fk_detail_pembelians_barangs1_idx` (`barangs_id`);

--
-- Indexes for table `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_penjualans_barangs1_idx` (`barangs_id`),
  ADD KEY `fk_detail_penjualans_penjualans1_idx` (`penghapusan_id`) USING BTREE;

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelians_supliers1_idx` (`supliers_id`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD CONSTRAINT `fk_detail_pembelians_barangs1` FOREIGN KEY (`barangs_id`) REFERENCES `barangs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detail_pembelians_pembelians1` FOREIGN KEY (`pembelians_id`) REFERENCES `pembelians` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  ADD CONSTRAINT `FK_detail_penghapusan_penghapusan` FOREIGN KEY (`penghapusan_id`) REFERENCES `penghapusan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detail_penjualans_barangs1` FOREIGN KEY (`barangs_id`) REFERENCES `barangs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `fk_pembelians_supliers1` FOREIGN KEY (`supliers_id`) REFERENCES `supliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
