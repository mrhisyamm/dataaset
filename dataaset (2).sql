-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 18.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `umur_penyusutan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `gambar`, `stok`, `umur_penyusutan`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(78, 'rak kayu', '2ebb0036-2466-4f27-9d2a-069b9e9d63b0.jpg', 2, 5, NULL, '2023-07-07 10:24:48', '2023-07-07 10:43:00', NULL),
(79, 'A.C split', '28075e39-2668-498b-8f80-aa2a1445d1ff.jpg', NULL, 4, NULL, '2023-07-07 10:25:21', '2023-07-07 10:25:21', NULL),
(80, 'meja kerja pegawai', '8d288629-3aa7-4b93-abaa-cbaade868370.jpg', 1, 5, NULL, '2023-07-07 10:25:49', '2023-07-13 01:05:45', NULL),
(81, 'kursi kerja pegawai', '74a3682c-d4b0-4488-a6d1-42d8454a2e81.jpg', NULL, 3, NULL, '2023-07-07 10:26:32', '2023-07-07 10:26:32', NULL),
(82, 'kursi tamu', 'a8d94ea6-c441-4316-ad40-9890de2521a2.jpg', 4, 5, NULL, '2023-07-07 10:27:02', '2023-07-09 21:14:53', NULL),
(83, 'P.C Unit', 'bdeeee56-3b53-4cb5-b8d4-9f47435b3b8a.jpg', 5, 5, NULL, '2023-07-07 10:27:32', '2023-07-31 21:12:16', NULL),
(84, 'Laptop', '68e99f75-9178-4e65-81d9-d5f1d3c4310f.jpg', 2, 5, NULL, '2023-07-07 10:27:59', '2023-07-09 21:09:03', NULL),
(85, 'Printer', '4ca8fe04-9fd0-4999-9089-7a92d6728d2d.jpg', NULL, 4, NULL, '2023-07-07 10:28:25', '2023-07-07 10:28:25', NULL),
(86, 'scanner', '16326d6d-a496-41d1-96fe-5591f06c50b6.jpg', NULL, 4, NULL, '2023-07-07 10:28:55', '2023-07-07 10:28:55', NULL),
(87, 'Portable Hardisk', '4eb529ec-8954-4a0a-99dd-da15af2df3a5.jpg', NULL, 4, NULL, '2023-07-07 10:29:26', '2023-07-07 10:29:26', NULL),
(88, 'papan tulis', '6c424b3e-4480-4f16-9fa1-ea324434c05e.jpg', NULL, 5, NULL, '2023-07-09 21:08:04', '2023-07-09 21:08:04', NULL),
(89, 'papan tulis', '21b27e3f-eaa0-40db-a5db-fc4b9b24d559.jpg', NULL, 5, NULL, '2023-07-09 21:08:04', '2023-07-09 21:08:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_lelang`
--

CREATE TABLE `barang_lelang` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lelang_id` int(11) NOT NULL,
  `barangs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_lelang`
--

INSERT INTO `barang_lelang` (`id`, `jumlah`, `created_at`, `updated_at`, `lelang_id`, `barangs_id`) VALUES
(14, 3, '2023-07-07 10:32:47', '2023-07-07 10:32:47', 7, 83),
(16, 4, '2023-07-07 10:40:54', '2023-07-07 10:40:54', 8, 82),
(17, 2, '2023-07-31 21:05:53', '2023-07-31 21:05:53', 9, 83);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelians`
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
-- Dumping data untuk tabel `detail_pembelians`
--

INSERT INTO `detail_pembelians` (`id`, `qty`, `subtotal`, `tanggal_beli`, `tanggal_expired`, `harga_beli`, `qty_terjual`, `created_at`, `updated_at`, `deleted_at`, `pembelians_id`, `barangs_id`) VALUES
(96, 3, 1200000, '2023-07-07', NULL, 400000, NULL, '2023-07-07 10:31:58', '2023-07-07 10:31:58', NULL, 105, 78),
(97, 2, 1000000, '2023-07-10', NULL, 500000, NULL, '2023-07-09 21:09:03', '2023-07-09 21:09:03', NULL, 106, 84),
(98, 1, 60000000, '2023-07-13', NULL, 60000000, NULL, '2023-07-13 01:05:45', '2023-07-13 01:05:45', NULL, 107, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penghapusan`
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
-- Dumping data untuk tabel `detail_penghapusan`
--

INSERT INTO `detail_penghapusan` (`id`, `qty`, `keterangan`, `bukti`, `subtotal`, `created_at`, `updated_at`, `deleted_at`, `penghapusan_id`, `barangs_id`) VALUES
(57, 1, 'rusak', '1b39d9aa-4eab-4e17-989c-5f9ecb834ed9.jpg', NULL, '2023-07-07 10:43:00', '2023-07-07 10:43:00', NULL, 181, 78);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `no_paket` varchar(45) DEFAULT NULL,
  `tgl_deadline` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `is_done` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id`, `no_paket`, `tgl_deadline`, `created_at`, `updated_at`, `users_id`, `is_done`) VALUES
(7, 'paket 01', '2023-07-13 17:00:00', '2023-07-07 10:32:22', '2023-07-07 10:38:01', 7, 1),
(8, 'paket 02', '2023-07-09 17:00:00', '2023-07-07 10:38:31', '2023-07-09 21:14:53', 7, 1),
(9, 'lelang 3', '2023-08-01 16:00:00', '2023-07-31 21:05:17', '2023-07-31 21:12:16', 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
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
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id`, `tempat`, `tanggal`, `total`, `created_at`, `updated_at`, `deleted_at`, `supliers_id`) VALUES
(105, NULL, '2023-07-07', 1200000, '2023-07-07 10:31:58', '2023-07-07 10:31:58', NULL, 10),
(106, NULL, '2023-07-10', 1000000, '2023-07-09 21:09:03', '2023-07-09 21:09:03', NULL, 11),
(107, NULL, '2023-07-13', 60000000, '2023-07-13 01:05:45', '2023-07-13 01:05:45', NULL, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `harga_penawaran` bigint(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lelang_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `is_selected` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id`, `harga_penawaran`, `created_at`, `updated_at`, `lelang_id`, `users_id`, `is_selected`) VALUES
(14, 200000, '2023-07-07 10:34:37', '2023-07-23 00:03:08', 7, 9, 0),
(15, 3000000, '2023-07-07 10:35:36', '2023-07-18 01:51:15', 7, 8, 0),
(16, 1000000, '2023-07-09 19:36:16', '2023-07-18 02:54:58', 8, 8, 1),
(17, 500000, '2023-07-09 21:10:56', '2023-07-09 21:10:56', 8, 8, 0),
(18, 122334, '2023-07-20 02:50:56', '2023-07-20 02:50:56', 7, 8, 0),
(19, 10000, '2023-07-31 21:07:30', '2023-07-31 21:10:34', 9, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghapusan`
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
-- Dumping data untuk tabel `penghapusan`
--

INSERT INTO `penghapusan` (`id`, `tanggal`, `pembayaran`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(181, '2023-07-07', NULL, NULL, '2023-07-07 10:43:00', '2023-07-07 10:43:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supliers`
--

CREATE TABLE `supliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supliers`
--

INSERT INTO `supliers` (`id`, `name`, `alamat`, `no_telp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'saharuddin', 'kersik', 12344444, '2023-07-07 10:29:51', '2023-07-07 10:29:51', NULL),
(10, 'putrain', 'rapak lama', 1223333, '2023-07-07 10:30:06', '2023-07-07 10:30:06', NULL),
(11, 'hisyam', 'Jl. Samratulangi', 1222211, '2023-07-07 10:30:23', '2023-07-07 10:30:23', NULL),
(12, 'salman', 'rapak dalam', 31312121, '2023-07-07 10:30:42', '2023-07-07 10:30:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'admin', 'admin', 'admin@gmail.com', '$2y$10$KxFJwDQQqGK.ab128SHUYeJ69zo6LByxIELIZFIigOu1Tf/49mdjW', '2023-04-07 19:52:30', '2023-04-07 19:52:30', NULL),
(8, 'sopianto', 'user', 'sopianto@gmail.com', '$2y$10$bwB.FzfXGRlEARYpFahJL.zYIPNz1WnAij1sf4Maf85BBZ5hkXGTq', '2023-04-07 19:59:46', '2023-04-07 19:59:46', NULL),
(9, 'Herman', 'user', 'herman@gmail.com', '$2y$10$LYAB0X17b32Jcd223Gt5mO.WqQ1oYregP9I.oiZtJ0oFfpStWBcqK', '2023-04-07 23:42:46', '2023-04-07 23:42:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_lelang`
--
ALTER TABLE `barang_lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_lelang_lelang_idx` (`lelang_id`),
  ADD KEY `fk_barang_lelang_barangs1_idx` (`barangs_id`);

--
-- Indeks untuk tabel `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_pembelians_pembelians1_idx` (`pembelians_id`),
  ADD KEY `fk_detail_pembelians_barangs1_idx` (`barangs_id`);

--
-- Indeks untuk tabel `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_penjualans_barangs1_idx` (`barangs_id`),
  ADD KEY `fk_detail_penjualans_penjualans1_idx` (`penghapusan_id`) USING BTREE;

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lelang_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelians_supliers1_idx` (`supliers_id`);

--
-- Indeks untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penawaran_lelang1_idx` (`lelang_id`),
  ADD KEY `fk_penawaran_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `barang_lelang`
--
ALTER TABLE `barang_lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `detail_penghapusan`
--
ALTER TABLE `detail_penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT untuk tabel `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_lelang`
--
ALTER TABLE `barang_lelang`
  ADD CONSTRAINT `fk_barang_lelang_barangs1` FOREIGN KEY (`barangs_id`) REFERENCES `barangs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_lelang_lelang` FOREIGN KEY (`lelang_id`) REFERENCES `lelang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `fk_lelang_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `fk_penawaran_lelang1` FOREIGN KEY (`lelang_id`) REFERENCES `lelang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penawaran_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
