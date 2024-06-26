-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2024 pada 07.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbci4ajax048`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa048`
--

CREATE TABLE `mahasiswa048` (
  `id_mahasiswa048` int(11) NOT NULL,
  `nim048` varchar(30) NOT NULL,
  `nama048` varchar(30) NOT NULL,
  `tmplahir048` varchar(30) NOT NULL,
  `tgllahir048` date NOT NULL,
  `jenkel048` char(20) NOT NULL,
  `tgl_entry048` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa048`
--

INSERT INTO `mahasiswa048` (`id_mahasiswa048`, `nim048`, `nama048`, `tmplahir048`, `tgllahir048`, `jenkel048`, `tgl_entry048`) VALUES
(1, '22110048', 'maulana eka abdilah', 'siak', '2014-05-01', 'laki-laki', '2024-05-08 11:56:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa048`
--
ALTER TABLE `mahasiswa048`
  ADD PRIMARY KEY (`id_mahasiswa048`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa048`
--
ALTER TABLE `mahasiswa048`
  MODIFY `id_mahasiswa048` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
