-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Apr 2020 pada 16.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12804385_pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `fullname`, `tanggal`, `waktu`, `keterangan`) VALUES
(5, 'saddf', '2345-12-01', '12345', 'dfxcvbnvmnb,m.'),
(9, 'Bermain Game', '2020-04-26', '11.00', 'Main game CODM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pekerjaan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `alamat`, `pekerjaan`, `telp`) VALUES
(2, 'Dilan Allya Barqi', 'dilanallyabarqi@gmail.com', 'dilan', 'dilan', 'subang', 'pengusaha', '08981154880'),
(4, 'Dilan Allya Barqi', 'dilanabc@gmail.com', 'dilanganteng', 'dilan123', 'Subang', 'Mahasiswa', '098249242'),
(5, 'e', 'e', 'e', 'e', 'e', 'e', '15838369');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
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
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
