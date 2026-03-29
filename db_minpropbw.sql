-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2026 at 03:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minpropbw`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int NOT NULL,
  `posisi` varchar(150) NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `posisi`, `tempat`, `periode`, `deskripsi`) VALUES
(1, 'Anggota Divisi Passion Talent Center', 'Information System Association', 'Feb 2025 - Dec 2025', 'Membantu menjalankan program kerja dengan penuh tanggung jawab.'),
(2, 'Anggota Divisi Publikasi & Dokumentasi', 'APLIKASI 2025', 'Oktober 2025 - November 2025', 'Mendokumentasikan kegiatan dan mempublikasikan informasi kegiatan.');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `judul`, `penerbit`, `tanggal`, `gambar`) VALUES
(1, 'Anggota Information System Association', 'Information System Association', 'Feb 2025 - Dec 2025', 'inforsa.PNG'),
(2, 'Kepanitiaan APLIKASI 2025', 'Departemen HRD Information System Association', '2025', 'pubdok.jpeg'),
(3, 'Kepanitiaan ITECH 2025', 'Departemen PSD information System Association', '2025', 'itech.jpeg'),
(4, 'Kepanitiaan Independence Competition 2025', 'Departemen PSD Information System Association', '2025', 'indepcomp.jpeg'),
(5, 'Kepanitiaan Information System Competition 2025', 'Departemen PSD Information System Association', '2025', 'isc.jpeg'),
(6, 'Kepanitiaan Knowledge Center 2025', 'Departemen PSD Information System Association', '2025', 'kc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `nama`, `nilai`) VALUES
(1, 'HTML & CSS', 50),
(2, 'Futsal', 80),
(3, 'Culers', 100),
(4, 'Olahraga apa aja', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
