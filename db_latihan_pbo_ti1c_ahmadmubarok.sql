-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 05:08 AM
-- Server version: 8.0.45
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_ahmadmubarok`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT NULL,
  `layanan_butler` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Interstellar', '2026-06-16 14:00:00', 100, '50000.00', 'Reguler', 'Dolby 5.1', 'A1', NULL, NULL, NULL, NULL),
(2, 'Inception', '2026-06-16 16:00:00', 100, '50000.00', 'Reguler', 'Dolby 5.1', 'B5', NULL, NULL, NULL, NULL),
(3, 'The Dark Knight', '2026-06-16 18:00:00', 100, '50000.00', 'Reguler', 'Dolby 5.1', 'C10', NULL, NULL, NULL, NULL),
(4, 'Dune', '2026-06-16 20:00:00', 120, '55000.00', 'Reguler', 'Dolby 7.1', 'D2', NULL, NULL, NULL, NULL),
(5, 'Gladiator', '2026-06-17 14:00:00', 120, '55000.00', 'Reguler', 'Dolby 7.1', 'E5', NULL, NULL, NULL, NULL),
(6, 'Arrival', '2026-06-17 16:00:00', 100, '50000.00', 'Reguler', 'Dolby 5.1', 'F1', NULL, NULL, NULL, NULL),
(7, 'Memento', '2026-06-17 18:00:00', 100, '50000.00', 'Reguler', 'Dolby 5.1', 'G3', NULL, NULL, NULL, NULL),
(8, 'Avatar', '2026-06-16 13:00:00', 200, '100000.00', 'IMAX', 'IMAX Immersive', 'H10', '3D-ID-01', 'Motion-Standard', NULL, NULL),
(9, 'Gravity', '2026-06-16 15:30:00', 200, '100000.00', 'IMAX', 'IMAX Immersive', 'I5', '3D-ID-02', 'Motion-Standard', NULL, NULL),
(10, 'Oppenheimer', '2026-06-16 18:00:00', 200, '120000.00', 'IMAX', 'IMAX 12-Track', 'J1', NULL, 'Motion-High', NULL, NULL),
(11, 'Tenet', '2026-06-17 13:00:00', 200, '100000.00', 'IMAX', 'IMAX Immersive', 'K2', '3D-ID-03', 'Motion-Standard', NULL, NULL),
(12, 'The Batman', '2026-06-17 16:00:00', 200, '100000.00', 'IMAX', 'IMAX 12-Track', 'L4', NULL, 'Motion-High', NULL, NULL),
(13, 'Interstellar', '2026-06-17 19:00:00', 200, '120000.00', 'IMAX', 'IMAX 12-Track', 'M8', NULL, 'Motion-High', NULL, NULL),
(14, 'Dune: Part Two', '2026-06-18 13:00:00', 200, '120000.00', 'IMAX', 'IMAX 12-Track', 'N1', NULL, 'Motion-High', NULL, NULL),
(15, 'La La Land', '2026-06-16 15:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'A1', NULL, NULL, 1, 1),
(16, 'Titanic', '2026-06-16 19:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'A2', NULL, NULL, 1, 1),
(17, 'The Notebook', '2026-06-17 15:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'B1', NULL, NULL, 1, 1),
(18, 'Parasite', '2026-06-17 19:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'B2', NULL, NULL, 1, 1),
(19, 'Little Women', '2026-06-18 15:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'C1', NULL, NULL, 1, 1),
(20, 'Pride & Prejudice', '2026-06-18 19:00:00', 40, '200000.00', 'Velvet', 'Dolby Atmos', 'C2', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
