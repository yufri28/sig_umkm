-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 17.29
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
-- Database: `sig_umkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jenus` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `uname`, `password`, `id_jenus`) VALUES
(1, 'Admin', '$2y$10$VB9PKsfKvX68YFjZk3Fg9udNhz5x2BZhHX4.n4RAH6E8QvANGhnHG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskel`
--

CREATE TABLE `deskel` (
  `id_deskel` int(2) NOT NULL,
  `nm_deskel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `deskel`
--

INSERT INTO `deskel` (`id_deskel`, `nm_deskel`) VALUES
(2, 'Amanatun'),
(3, 'Amanatuns');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(1) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `id_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_user`
--

CREATE TABLE `jenis_user` (
  `id_jenus` int(3) NOT NULL,
  `nama_jenus` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_user`
--

INSERT INTO `jenis_user` (`id_jenus`, `nama_jenus`, `level`) VALUES
(1, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(2) NOT NULL,
  `nm_kec` varchar(25) NOT NULL,
  `polygon` text NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nm_kec`, `polygon`, `warna`) VALUES
(2, 'Rote Barat', 'add-kecamatan', '#b65d5d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi_usaha`
--

CREATE TABLE `klasifikasi_usaha` (
  `id_ku` int(1) NOT NULL,
  `nm_ku` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_usaha`
--

CREATE TABLE `sektor_usaha` (
  `id_su` int(1) NOT NULL,
  `nm_su` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sektor_usaha`
--

INSERT INTO `sektor_usaha` (`id_su`, `nm_su`) VALUES
(1, 'Haloos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_datum` int(5) NOT NULL,
  `id_kec` int(2) NOT NULL,
  `id_deskel` int(3) NOT NULL,
  `id_su` int(1) NOT NULL,
  `id_ku` int(1) NOT NULL,
  `nm_usaha` varchar(25) NOT NULL,
  `thn_pmtkn` int(4) NOT NULL,
  `jns_ush` varchar(20) NOT NULL,
  `nmr_izin` varchar(13) NOT NULL,
  `nm_pemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tng_kerja_lki` int(2) NOT NULL,
  `tng_kerja_prmpn` int(2) NOT NULL,
  `mdl_sendiri` int(11) NOT NULL,
  `mdl_luar` int(11) NOT NULL,
  `asset` int(11) NOT NULL,
  `omset` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_jenus` (`id_jenus`);

--
-- Indeks untuk tabel `deskel`
--
ALTER TABLE `deskel`
  ADD PRIMARY KEY (`id_deskel`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD PRIMARY KEY (`id_jenus`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indeks untuk tabel `klasifikasi_usaha`
--
ALTER TABLE `klasifikasi_usaha`
  ADD PRIMARY KEY (`id_ku`);

--
-- Indeks untuk tabel `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
  ADD PRIMARY KEY (`id_su`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_datum`),
  ADD KEY `id_kec` (`id_kec`),
  ADD KEY `id_deskel` (`id_deskel`),
  ADD KEY `id_su` (`id_su`),
  ADD KEY `id_ku` (`id_ku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `deskel`
--
ALTER TABLE `deskel`
  MODIFY `id_deskel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  MODIFY `id_jenus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi_usaha`
--
ALTER TABLE `klasifikasi_usaha`
  MODIFY `id_ku` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
  MODIFY `id_su` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_datum` int(5) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD CONSTRAINT `jenis_user_ibfk_1` FOREIGN KEY (`id_jenus`) REFERENCES `admin` (`id_jenus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`id_su`) REFERENCES `sektor_usaha` (`id_su`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_2` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_3` FOREIGN KEY (`id_deskel`) REFERENCES `deskel` (`id_deskel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_4` FOREIGN KEY (`id_ku`) REFERENCES `klasifikasi_usaha` (`id_ku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
