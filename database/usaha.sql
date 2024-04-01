-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2024 pada 15.56
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
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usaha`
--

INSERT INTO `usaha` (`id_datum`, `id_deskel`, `id_su`, `id_ku`, `nm_usaha`, `thn_pmtkn`, `jns_ush`, `nmr_izin`, `nm_pemilik`, `alamat`, `tng_kerja_lki`, `tng_kerja_prmpn`, `mdl_sendiri`, `mdl_luar`, `asset`, `omset`, `latitude`, `longitude`, `no_telpon`, `gambar`) VALUES
(9, 133, 4, 3, 'Pondok Buah', 2000, 9, 'Milik Sendiri', 'Ambrosius Nawa Hoke', 'Kelurahan Kefamenanu Selatan, RT 009/RW 003', 2, 1, 25000000, 0, 10000000, 14000000, '-9.453739', '124.4778029', '085239011816', '1711547535_pb_map.jpg'),
(10, 135, 4, 3, 'Efata Karya  ', 2019, 2, 'Milik Sendiri', 'Lay Koet Tjung', 'Kelurahan Kefamenanu Utara', 4, 2, 25000000, 0, 40000000, 360000000, '-9.4305597', '124.4788898', '081337487333', '1711809232_efata_mp.jpg'),
(11, 133, 4, 3, 'Mentari Mas', 2008, 2, 'Milik Sendiri', 'Hari Hartanto', 'Kelurahan Kefamenanu Selatan, RT 047/ RW 005', 2, 3, 50000000, 0, 100000000, 30000000, '-9.467826', '124.4812926', '081339349888', '1711812844_mentari_mp.jpg'),
(12, 133, 4, 3, 'Amanah', 2010, 2, 'Milik Sendiri', 'Bacotang', 'Kelurahan Kefamenanu Selatan, RT 052/ RW 006', 0, 7, 30000000, 100000000, 50000000, 10000000, '-9.4698544', '124.4816', '081311051557', '1711813166_amanah_mp.jpg'),
(13, 60, 4, 3, 'Toko Gian', 2014, 2, 'Milik Sendiri', 'Fabianus Anin', 'Desa Naiola', 1, 1, 20000000, 0, 7500000, 2000000, '-9.5388897', '124.4984348', '082144429746', '1711813630_anin_mp.jpg'),
(14, 133, 4, 3, 'Aries Elektronik', 2015, 2, 'Milik Sendiri', 'Aries Tanjung', 'Kelurahan Kefamenanu Selatan, RT 002/RW 001', 3, 4, 800000000, 0, 2147483647, 195000000, '-9.4622845', '124.4801', '081339423736', '1711813931_aries_mp.jpg'),
(15, 133, 4, 3, 'Asia Bangunan', 2007, 2, 'Milik Sendiri', 'Floriberta', 'Kelurahan Kefamenanu Selatan, RT 052/ RW 006', 2, 1, 50000000, 250000000, 50000000, 15000000, '-9.4701168', '124.4817', '082145504553', '1711814149_asia_mp.jpg'),
(16, 133, 4, 3, 'Jaya Elektronik &amp; Meu', 2000, 2, 'Milik Sendiri', 'Vincen', 'Kelurahan Kefamenanu Selatan, RT 034/ RW 005', 6, 4, 500000000, 0, 300000000, 300000000, '-9.475007', '124.4827723', '0', '1711814472_jaya_mp.jpg'),
(17, 133, 4, 3, 'KCS Bangunan', 2007, 2, 'Milik Sendiri', 'F.X. Dusyanto Tantri Sanak', 'Kelurahan Kefamenanu Selatan, RT 046/ RW 005', 7, 5, 200000000, 0, 500000000, 75000000, '-9.468949', '124.4815181', '082144565939', '1711814765_kcs_mp.jpg'),
(18, 133, 4, 3, 'Kraton', 2015, 2, 'Milik Sendiri', 'Sefarinus Lake', 'Kelurahan Kefamenanu Selatan, RT 001/ RW 003', 1, 1, 15000000, 0, 10000000, 60000000, '-9.4576953', '124.4814546', '085239451220', '1711815004_kraton_mp.jpg'),
(19, 133, 4, 3, 'Toko M2 Fashion', 2016, 2, 'Milik Sendiri', 'Rian Aldino', 'Kelurahan Kefamenanu Selatan', 1, 5, 50000000, 150000000, 75000000, 13000000, '-9.4696763', '124.4816', '081236686060', '1711815229_m2_mp.jpg'),
(20, 133, 4, 3, 'UD Marlim', 2010, 2, 'Milik Sendiri', 'Lenny Ludoni', 'Kelurahan Kefamenanu Selatan, RT 005/ RW 005', 0, 2, 5000000, 0, 30000000, 5000000, '-9.4745666', '124.4826', '081337854119', '1711815449_marlim_mp.jpg'),
(21, 133, 4, 3, 'Mitra Bangunana', 2005, 2, 'Milik Sendiri', 'Johanes Widodo', 'Kelurahan Kefamenanu Selatan, RT 051/ RW 006', 1, 1, 50000000, 0, 75000000, 30000000, '-9.4694962', '124.4815', '081353044760', '1711815696_mitra_mp.jpg'),
(22, 133, 4, 3, 'Duta Niaga', 1999, 2, 'Milik Sendiri', 'Stefanus UY', 'Kelurahan Kefamenanu Selatan', 1, 2, 100000000, 0, 35000000, 25000000, '-9.4598271', '124.4796', '085239042359', '1711815902_niaga_mp.jpg'),
(23, 133, 4, 3, 'Sinar Oematan', 1993, 2, 'Milik Sendiri', 'Charles Oematan', 'Kelurahan Kefamenanu Selatan, RT 0016/ RW 006', 1, 1, 30000000, 100000000, 100000000, 105000000, '-9.4736626', '124.4824', '0', '1711816131_oematan_mp.jpg'),
(24, 133, 4, 3, 'Rafa Research Clothing', 2021, 2, 'Sewa', 'Erickson', 'Kelurahan Kefamenanu Selatan, RT 034/ RW 005', 2, 0, 20000000, 0, 25000000, 9000000, '-9.4746536', '124.4826', '082237255154', '1711816475_rafa_mp.jpg'),
(25, 133, 4, 3, 'Sinar Rahayu', 2017, 2, 'Milik Sendiri', 'Silvester Manek', 'Kelurahan Kefamenanu Selatan, RT 001/RW 005', 5, 3, 150000000, 0, 500000000, 90000000, '-9.4734242', '124.4823802', '082247717150', '1711816726_rahayu_mp.jpg'),
(26, 133, 4, 3, 'Ratu Fashion', 2015, 2, 'Milik Sendiri', 'Muhamad Rusdi', 'Kelurahan Kefamenanu Selatan, RT 034/ RW 005', 0, 7, 75000000, 50000000, 25000000, 15000000, '-9.4602716', '124.4797', '08234096030', '1711816962_ratu_mp.jpg'),
(27, 133, 4, 3, 'Sweety Cake', 2020, 3, 'Milik Sendiri', 'Sui', 'Kelurahan Kefamenanu Selatan, RT 034/ RW 005', 0, 2, 20000000, 0, 25000000, 1500000, '-9.4601827', '124.4797', '082235136660', '1711817170_sweety_mp.jpg'),
(28, 133, 4, 3, 'Tani Makmur', 2020, 2, 'Milik Sendiri', 'Plasidus Riky Yap', 'Kelurahan Kefamenanu Selatan, RT 016/RW 006', 2, 0, 50000000, 0, 50000000, 15000000, '-9.4693211', '124.4815', '081333887000', '1711817448_tanimakmur_mp.jpg'),
(29, 133, 4, 3, 'Coto Makassar', 2000, 3, 'Milik Sendiri', 'Hj. Suarni', 'Kelurahan Kefamenanu Selatan, RT 049/ RW 006', 1, 2, 10000000, 0, 25000000, 5000000, '-9.4706105', '124.4818145', '081246153151', '1711817783_cm_mp.jpg'),
(30, 136, 4, 3, 'Ayam Kalasan &amp; Se&#03', 1984, 3, 'Milik Sendiri', 'Alo Rikoni', 'Kelurahan Maubeli, RT 018/ RW 005', 1, 2, 250000, 0, 10000000, 400000, '-9.4870741', '124.4900646', '085239074911', '1711818056_kalasa_mp.jpg'),
(31, 136, 4, 3, 'Kios Liora', 2015, 9, 'Milik Sendiri', 'Feby Yohana Adu', 'Kelurahan Maubeli, RT 025/ RW 001', 0, 1, 1000000, 0, 2500000, 7500000, '-9.4826483', '124.4708172', '082147737422', '1711818299_Kios_feby.jpg'),
(32, 135, 4, 3, 'Mangga 2', 2020, 9, 'Milik Sendiri', 'Simon Nailiu', 'Kelurahan Kefamenanu Utara, RT 002/ RW 004', 0, 1, 10000000, 0, 30000000, 360000000, '-9.4315898', '124.4795499', '081237264416', '1711818515_mangga2_mp.jpg'),
(33, 133, 4, 3, 'Robert Motor', 2014, 7, 'Milik Sendiri', 'Yandy Supandy', 'Kelurahan Kefamenanu Selatan, RT 034/RW 005', 4, 1, 200000000, 0, 300000000, 165000000, '-9.4750568', '124.4827387', '0811807700', '1711818783_robert_mp.jpg'),
(34, 136, 4, 3, 'Servis Delon', 2018, 7, 'Milik Sendiri', 'Yonathan M. Lifere', 'Kelurahan Maubeli, RT 023/RW 002', 2, 0, 7000000, 0, 10000000, 4000000, '-9.4781438', '124.4795211', '081236484430', '1711819066_servissofanyong_mp.jpg'),
(35, 136, 5, 3, 'Meubel Sinar', 2010, 11, 'Milik Sendiri', 'Damianus Kinbenu', 'Kelurahan Maubeli, RT 025/ RW 001', 1, 0, 5000000, 0, 15000000, 2000000, '-9.482466', '124.470835', '082145526828', '1711819439_mblsinar_mp.jpg');

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
  MODIFY `id_datum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
