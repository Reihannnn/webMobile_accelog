-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2025 pada 18.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone`, `password`, `created_at`) VALUES
(1, 'reihan', '089538311665', '$2y$10$pwR230/gvlzr8gsT4EgCEuSFiqfyThknPC8ySQJsFDpOVGhzzyGXK', '2025-07-28 12:22:46'),
(2, NULL, '0895389733677', '$2y$10$Zb1g6P/f3BRsNSc8MEEn5O3LfzgfFbr16RdyG/s6oLxwvbJtnH3r.', '2025-07-28 16:53:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `surat_jalan` varchar(50) DEFAULT NULL,
  `status` enum('pickup','berangkat','tiba_muat','muat','tiba_tujuan','mulai_bongkar','selesai') NOT NULL,
  `pickup_address` text DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `km_mobil` int(11) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `driver_id`, `customer`, `surat_jalan`, `status`, `pickup_address`, `pickup_time`, `departure_date`, `departure_time`, `km_mobil`, `pickup_date`, `created_at`) VALUES
(1, 'ORD001', 1, 'PT. Logistik Jaya', 'SJ-123456', 'berangkat', 'Gramapuri Cibitung', '00:01:06', '0000-00-00', '00:01:07', 100, '2025-07-28', NULL),
(2, 'ORD001', 1, 'PT. Logistik Jaya', 'SJ-123456', 'selesai', 'Gramapuri Cibitung', '00:01:06', '0000-00-00', '00:01:07', 20, '2025-07-28', '2025-07-28 16:07:47'),
(3, 'ORD004', 1, 'PT. Indo Karya', 'SJ-123459', 'tiba_muat', 'Tangerang Business Center', '14:00:00', '2025-07-29', '14:30:00', NULL, '2025-07-29', '2025-07-28 12:15:00'),
(4, 'ORD005', 2, 'PT. Makmur Sejahtera', 'SJ-123460', 'berangkat', 'Kawasan Industri MM2100', '10:00:00', '2025-07-30', '10:30:00', 50, '2025-07-30', NULL),
(5, 'ORD005', 1, 'PT. Makmur Sejahtera', 'SJ-123460', 'berangkat', 'Kawasan Industri MM2100', '10:00:00', '2025-07-30', '10:30:00', 50, '2025-07-30', NULL),
(6, 'ORD005', 1, 'PT. Makmur Sejahtera', 'SJ-123460', 'pickup', 'Kawasan Industri MM2100', '10:00:00', '2025-07-30', '10:30:00', 50, '2025-07-30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status_log`
--

CREATE TABLE `order_status_log` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` enum('pickup','berangkat','tiba_muat','muat','tiba_tujuan','mulai_bongkar','selesai') NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `location_lat` double DEFAULT NULL,
  `location_lng` double DEFAULT NULL,
  `km_mobil` int(11) DEFAULT NULL,
  `total_muat` decimal(10,2) DEFAULT NULL,
  `total_bongkar` decimal(10,2) DEFAULT NULL,
  `foto_mobil` text DEFAULT NULL,
  `foto_surat_jalan` text DEFAULT NULL,
  `foto_sopir` text DEFAULT NULL,
  `tanda_tangan` text DEFAULT NULL,
  `nomor_do_spj` varchar(100) DEFAULT NULL,
  `driver_id` int(11) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_status_log`
--

INSERT INTO `order_status_log` (`id`, `order_id`, `status`, `datetime`, `location_lat`, `location_lng`, `km_mobil`, `total_muat`, `total_bongkar`, `foto_mobil`, `foto_surat_jalan`, `foto_sopir`, `tanda_tangan`, `nomor_do_spj`, `driver_id`, `timestamp`) VALUES
(1, 2, '', '2025-07-28 14:25:40', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 21:15:20'),
(2, 2, '', '2025-07-28 14:27:15', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 21:15:20'),
(3, 2, '', '2025-07-28 14:27:19', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 21:15:20'),
(4, 2, '', '2025-07-28 14:27:22', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 21:15:20'),
(5, 2, 'muat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 16:15:26'),
(6, 3, 'berangkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 16:21:16'),
(7, 2, 'tiba_tujuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 16:22:10'),
(8, 2, 'mulai_bongkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 16:24:15'),
(9, 2, 'selesai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 16:25:15'),
(10, 3, 'tiba_muat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-28 18:19:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujp`
--

CREATE TABLE `ujp` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `uang_jalan` decimal(10,2) DEFAULT NULL,
  `rincian` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indeks untuk tabel `order_status_log`
--
ALTER TABLE `order_status_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `ujp`
--
ALTER TABLE `ujp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `order_status_log`
--
ALTER TABLE `order_status_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ujp`
--
ALTER TABLE `ujp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_status_log`
--
ALTER TABLE `order_status_log`
  ADD CONSTRAINT `order_status_log_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Ketidakleluasaan untuk tabel `ujp`
--
ALTER TABLE `ujp`
  ADD CONSTRAINT `ujp_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
