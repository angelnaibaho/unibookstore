-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 03:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(5) NOT NULL,
  `id_penerbit` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `id_penerbit`) VALUES
('B1001', 'Bisnis', 'Bisnis Online', '75000', 9, 'SP01'),
('B1002', 'Bisnis', 'Etika Bisnis & Tanggung Jawab Sosial', '67500', 20, 'SP01'),
('K1001', 'Keilmuan', 'Analisis & Perancangan', '50000', 60, 'SP01'),
('K1002', 'Keilmuan', 'Artificial Intelligence', '45000', 60, 'SP01'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', '40000', 25, 'SP01'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', '85000', 15, 'SP01'),
('N1001', 'Novel', 'Cahaya di Penjuru Hati', '68000', 10, 'SP02'),
('N1002', 'Novel', 'Aku Ingin Cerita', '48000', 12, 'SP03');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat`, `kota`, `telepon`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No.121', 'Bandung', '081322201946'),
('SP02', 'Andi Offset', 'Jl. SuryaLaya IX No.3', 'Bandung', '087839030688'),
('SP03', 'Danendra', 'Jl. Moch Toha No 44', 'Bandung', '022520115');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_penerbit_2` (`id_penerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
