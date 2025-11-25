-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2025 pada 11.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembalap`
--

CREATE TABLE `pembalap` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `poinMusim` int(11) DEFAULT 0,
  `jumlahMenang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembalap`
--

INSERT INTO `pembalap` (`id`, `nama`, `tim`, `negara`, `poinMusim`, `jumlahMenang`) VALUES
(1, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
(2, 'Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
(3, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
(4, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
(5, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
(6, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
(7, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
(8, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
(9, 'Pierre Gasly', 'AlphaTauri', 'Indonesia', 90, 2),
(12, 'Uus Sudrajat', 'Dani Pedrosa', 'Malaysia', 100, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sirkuit`
--

CREATE TABLE `sirkuit` (
  `id` int(11) NOT NULL,
  `namaSirkuit` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `panjangKm` decimal(5,2) NOT NULL,
  `jumlahTikungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sirkuit`
--

INSERT INTO `sirkuit` (`id`, `namaSirkuit`, `negara`, `panjangKm`, `jumlahTikungan`) VALUES
(1, 'Albert Park Circuit', 'Australia', 5.28, 14),
(2, 'Jeddah Corniche Circuit', 'Arab Saudi', 6.17, 27),
(3, 'Bahrain International Circuit', 'Bahrain', 5.41, 15),
(4, 'Imola - Autodromo Enzo e Dino Ferrari', 'Italia', 4.91, 19),
(5, 'Miami International Autodrome', 'Amerika Serikat', 5.41, 19),
(6, 'Circuit de Barcelona-Catalunya', 'Spanyol', 4.68, 14),
(7, 'Circuit de Monaco', 'Monaco', 3.34, 19),
(8, 'Baku City Circuit', 'Azerbaijan', 6.00, 20),
(9, 'Circuit Gilles Villeneuve', 'Kanada', 4.36, 14),
(10, 'Red Bull Ring', 'Austria', 4.32, 10),
(11, 'Silverstone Circuit', 'Inggris', 5.89, 18),
(12, 'Hungaroring', 'Hongaria', 4.38, 14),
(13, 'Spa-Francorchamps', 'Belgium', 7.00, 20),
(14, 'Circuit Zandvoort', 'Belanda', 4.26, 14),
(15, 'Monza - Autodromo Nazionale Monza', 'Italia', 5.79, 11),
(16, 'Marina Bay Street Circuit', 'Singapura', 4.93, 19),
(17, 'Suzuka International Racing Course', 'Jepang', 5.81, 18),
(18, 'Circuit of the Americas', 'Amerika', 5.50, 200),
(22, 'Autódromo Hermanos Rodríguez', 'Meksikuy', 5.50, 15);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sirkuit`
--
ALTER TABLE `sirkuit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sirkuit`
--
ALTER TABLE `sirkuit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
