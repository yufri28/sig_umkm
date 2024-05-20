-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 18.30
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
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_datum` int(5) NOT NULL,
  `id_deskel` int(2) NOT NULL,
  `id_su` int(1) NOT NULL,
  `id_ku` int(1) NOT NULL,
  `nm_usaha` varchar(25) NOT NULL,
  `thn_pmtkn` int(4) NOT NULL,
  `jns_ush` int(11) NOT NULL,
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
  `longitude` text NOT NULL,
  `no_telpon` varchar(12) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `polygon` text NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `surat_izin_usaha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usaha`
--

INSERT INTO `usaha` (`id_datum`, `id_deskel`, `id_su`, `id_ku`, `nm_usaha`, `thn_pmtkn`, `jns_ush`, `nmr_izin`, `nm_pemilik`, `alamat`, `tng_kerja_lki`, `tng_kerja_prmpn`, `mdl_sendiri`, `mdl_luar`, `asset`, `omset`, `latitude`, `longitude`, `no_telpon`, `gambar`, `polygon`, `ktp`, `surat_izin_usaha`) VALUES
(37, 136, 12, 3, 'Ayam Kalasan', 1984, 3, 'Milik Pribadi', 'Alo Rikoni', 'KEL. MAUBELI, RT/RW. 018/005', 0, 2, 250000, 0, 10000000, 400000, '-9.487065301', '124.4898137', '085239074911', NULL, '124.4899537 -9.487072787, 124.4899152 -9.487087315, 124.4898588 -9.487100487, 124.4898214 -9.487111821, 124.4897701 -9.487123605, 124.4897302 -9.487127424, 124.4896987 -9.487094048, 124.4897007 -9.487054021, 124.4897592 -9.487037637, 124.4898108 -9.487022917, 124.4898501 -9.487006448, 124.4898972 -9.486990058, 124.4899295 -9.486980070, 124.4899408 -9.487004336, 124.4899452 -9.487037553, 124.4899537 -9.487072787                                                                                                    ', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_datum`),
  ADD KEY `id_su` (`id_su`),
  ADD KEY `id_ku` (`id_ku`),
  ADD KEY `id_deskel` (`id_deskel`),
  ADD KEY `jns_ush` (`jns_ush`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_datum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`id_su`) REFERENCES `sektor_usaha` (`id_su`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_2` FOREIGN KEY (`id_deskel`) REFERENCES `deskel` (`id_deskel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_4` FOREIGN KEY (`id_ku`) REFERENCES `klasifikasi_usaha` (`id_ku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_5` FOREIGN KEY (`jns_ush`) REFERENCES `jenus` (`id_ju`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
