-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2022 pada 03.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id_penduduk` int(2) NOT NULL,
  `nik` bigint(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text DEFAULT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `warga` enum('WNI','WNA') NOT NULL,
  `perkawinan` enum('Sudah Menikah','Belum Menikah') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` enum('A','B','O','AB') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_penduduk`, `nik`, `nama`, `jenis_kelamin`, `alamat`, `pekerjaan`, `tempat_lahir`, `warga`, `perkawinan`, `tgl_lahir`, `gol_darah`) VALUES
(15, 33721973347186, 'Aubin Sava Rausanfiker', 'Wanita', 'Jalan Bukit Asri', 'Mahasiswa', 'Surakarta', 'WNA', 'Sudah Menikah', '2022-09-29', 'AB'),
(14, 3372040605040001, 'Reyhan Naufal Hakim', 'Pria', 'Perumahan Permata Ringroad', 'Mahasiswa', 'Surakarta', 'WNI', 'Belum Menikah', '2022-10-04', 'B');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id_penduduk`,`nik`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id_penduduk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
