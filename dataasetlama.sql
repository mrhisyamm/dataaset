-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 10:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

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
  `umur_penyusutan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `stok`, `umur_penyusutan`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 'kursi', 30, '1 tahun', 50000, '2022-08-03 12:11:23', '2022-08-03 12:29:56', NULL),
(59, 'meja', 0, '1 tahun', 65000, '2022-08-03 12:11:38', '2022-08-03 12:11:38', NULL);

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
(71, 50, 2500000, '2022-08-03', NULL, 50000, NULL, '2022-08-03 12:12:25', '2022-08-03 12:12:25', NULL, 81, 58);

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
(48, 5, 'rusak', '988c8471-e875-4944-968d-89365efd860b.jpg', 250000, '2022-08-03 12:29:56', '2022-08-03 12:29:56', NULL, 169, 58);

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
(81, NULL, '2022-08-03', 2500000, '2022-08-03 12:12:25', '2022-08-03 12:12:25', NULL, NULL);

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
(169, '2022-08-03', NULL, 250000, '2022-08-03 12:29:56', '2022-08-03 12:44:57', '2022-08-03 12:44:57');

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
(2, 'fijay', 'pijayumar123@gmail.com', '12345678', '2019-12-07 17:00:00', '2019-12-07 17:00:00', '2019-12-07 17:00:00'),
(3, 'fijay', 'pidjay12@gmail.com', '$2y$10$Mhb3/.tP9IRlN8qd6Wq5QulNTCZ8urKlB7tFBR195TW.xwG3wKUvC', '2019-12-07 21:28:15', '2019-12-07 21:28:15', NULL),
(4, 'fijay', 'fijayumar@gmail.com', '$2y$10$Ygj.gJCdCabEvJJZLU817u/Qk5eRrrZl3wnWnxDRVjqRHGU5WaalO', '2019-12-24 21:18:51', '2019-12-24 21:18:51', NULL),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
