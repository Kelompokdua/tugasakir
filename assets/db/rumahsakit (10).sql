-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jun 2019 pada 09.19
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `poli`, `biaya`) VALUES
(1, 'Fahrul', 'Kesehatan anak dan ibu', 1231),
(3, 'Danang', 'Gigi', 1000),
(4, 'bapak', 'Umum', 1100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT '0',
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','asisten','petugas','kasir','farmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `id_dokter`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 3, 'galih', 'gigi', 'ec0c8fe7ad80dfe93c0de35448b1d581', 'asisten'),
(5, 1, 'januareta rizki dirgantari', 'kia', 'ab99f8f1c87bb63eee8ddc8688ce329f', 'asisten'),
(6, 0, 'admin utama', 'oi', 'a2e63ee01401aaeca78be023dfbb8c59', 'admin'),
(7, 0, 'ai', 'farmasi', '0a2f7ac05ba8edee61b4e46aa5ec3957', 'farmasi'),
(8, 0, 'hai', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas'),
(9, 4, 'dab', 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'asisten'),
(10, 0, 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `harga_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `jenis_obat`, `harga_obat`) VALUES
(1, 'saka', 'tablet', 2400),
(2, 'thermenza', 'flu', 1000),
(3, 'Albendazol 400 mg', 'tablet', 1200),
(4, 'Alprazolam', 'tablet', 2000),
(5, 'Clobazam 10 mg', 'tablet', 1110),
(6, 'Dikloksasilin 125 mg', 'kapsul', 1400),
(7, 'OBH', 'Cair', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(11) NOT NULL DEFAULT '0',
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` int(11) NOT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `sub_departemen` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `status_pasien` enum('BPJS','JPPK','UMUM','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `telp`, `divisi`, `departemen`, `sub_departemen`, `status`, `status_pasien`) VALUES
('PSN01', 'asama', 'a', 'L', '2019-04-02', 11, 'asa', 'as', 'as', 'as', 'JPPK'),
('PSN05', 'awang lintang mario', 'palsi', 'P', '2019-04-04', 121, 'mobile legend', 'onic', 'sonic', 'Menikah', 'JPPK'),
('PSN08', 'Galih raka m', 'mana', 'L', '1999-12-04', 188218818, '', '', '', 'Belum Menikah', 'UMUM'),
('PSN10', 'rio irvansyah', 'palsu', 'L', '2019-05-23', 81334, '', '', '', 'Menikah', 'UMUM'),
('PSN11', 'Ardha dinda', 'sukodadi', 'P', '1998-04-17', 2147483647, '', '', '', 'Belum Menikah', 'UMUM'),
('PSN12', 'januareta rizki dirgantari', 'jalan gondang legi', 'P', '1998-01-26', 2147483647, '', '', '', 'Belum Menikah', 'UMUM'),
('PSN13', 'Gaudensio', 'malang', 'L', '2019-05-22', 2147483647, '', '', '', 'Belum Menikah', 'UMUM');

--
-- Trigger `pasien`
--
DELIMITER $$
CREATE TRIGGER `aipasien` BEFORE INSERT ON `pasien` FOR EACH ROW BEGIN
  INSERT INTO pasien_seq VALUES (NULL);
  SET NEW.id_pasien = CONCAT('PSN', LPAD(LAST_INSERT_ID(), 2, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_seq`
--

CREATE TABLE `pasien_seq` (
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_seq`
--

INSERT INTO `pasien_seq` (`id_pasien`) VALUES
(1),
(5),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama`, `keterangan`) VALUES
(5, 'Kesehatan anak dan ibu', 'buka Setiap hari'),
(6, 'Gigi', 'buka trusss'),
(7, 'Umum', 'Buka Setiap Senin - Jumat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `inputby` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `id_pasien`, `id_poli`, `inputby`, `tanggal`, `status`) VALUES
(1, 'PSN08', 6, 'hai', '2019-05-21 11:28:27', 'Selesai'),
(2, 'PSN08', 6, 'hai', '2019-05-21 11:31:30', 'Selesai'),
(3, 'PSN05', 6, 'hai', '2019-05-21 11:32:23', 'Selesai'),
(4, 'PSN10', 6, 'oi', '2019-05-22 14:28:25', 'Selesai'),
(5, 'PSN10', 6, 'oi', '2019-05-22 14:35:59', 'Selesai'),
(6, 'PSN08', 6, 'oi', '2019-05-22 14:36:21', 'Selesai'),
(7, 'PSN08', 6, 'galih', '2019-05-22 19:37:41', 'Selesai'),
(8, 'PSN10', 6, 'galih', '2019-05-22 21:32:49', 'Selesai'),
(9, 'PSN11', 6, 'hai', '2019-05-23 10:26:37', 'Selesai'),
(10, 'PSN12', 6, 'hai', '2019-05-23 10:26:49', 'Belum'),
(11, 'PSN08', 6, 'hai', '2019-05-23 12:55:43', 'Selesai'),
(12, 'PSN08', 6, 'hai', '2019-05-23 13:30:07', 'Selesai'),
(13, 'PSN08', 6, 'hai', '2019-05-27 13:53:08', 'Selesai'),
(14, 'PSN08', 6, 'hai', '2019-05-27 14:08:00', 'Selesai'),
(15, 'PSN05', 6, 'hai', '2019-05-27 14:08:07', 'Selesai'),
(16, 'PSN01', 5, 'hai', '2019-05-27 20:05:50', 'Belum'),
(17, 'PSN05', 7, 'hai', '2019-05-27 20:05:58', 'Selesai'),
(18, 'PSN13', 7, 'admin hebat', '2019-05-28 21:39:54', 'Belum'),
(19, 'PSN12', 7, 'admin hebat', '2019-05-28 21:41:56', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_pelayanan` int(11) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `anamnesa` varchar(255) NOT NULL,
  `diagnose` varchar(255) NOT NULL,
  `foto_resep` varchar(255) NOT NULL,
  `status_farmasi` enum('pending','selesai','','') NOT NULL DEFAULT 'pending',
  `status_transaksi` enum('pending','selesai','','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_pelayanan`, `id_pasien`, `id_dokter`, `poli`, `tanggal`, `anamnesa`, `diagnose`, `foto_resep`, `status_farmasi`, `status_transaksi`) VALUES
(1, 'PSN10', 3, 'Gigi', '2019-05-01', 'tes', 'tes', '5ce4fc1a6e4e2.png', 'selesai', 'selesai'),
(2, 'PSN08', 3, 'Gigi', '2019-05-22', 'coba anamnesa', 'coba diagnosa', '5ce4fc27ece23.png', 'selesai', 'selesai'),
(3, 'PSN08', 3, 'Gigi', '2019-05-21', 'tes', 'tes', '5ce542c8f21cb.png', 'selesai', 'selesai'),
(4, 'PSN10', 3, 'Gigi', '2019-05-22', 'a', 'a', '5ce55da70008a.png', 'selesai', 'selesai'),
(5, 'PSN11', 3, 'Gigi', '2019-05-23', 'tes anamnesa', 'tes diagnosa', '5ce613395f035.png', 'selesai', 'selesai'),
(6, 'PSN08', 3, 'Gigi', '2019-05-23', 'coba anamnesa', 'coba diagnosa', '5ce6365bec56d.png', 'selesai', 'selesai'),
(7, 'PSN08', 3, 'Gigi', '2019-05-23', 'coba anamnesa', 'coba diagnosa', '5ce63e628b6a3.png', 'selesai', 'selesai'),
(8, 'PSN08', 3, 'Gigi', '2019-05-27', 'coba anamnesa', 'coba diagnosa', '5ceb899328ae2.png', 'selesai', 'selesai'),
(9, 'PSN08', 3, 'Gigi', '2019-05-27', 'coba anamnesa', 'coba diagnosa', '5ceb8cfa0d808.png', 'selesai', 'selesai'),
(10, 'PSN05', 3, 'Gigi', '2019-05-27', 'coba anamnesa', 'coba diagnosa', '5ceb8d09c8503.png', 'selesai', 'selesai'),
(15, 'PSN13', 4, 'Umum', '2019-05-28', 'a', 'a', '5ced4ba01affe.png', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `therapi`
--

CREATE TABLE `therapi` (
  `id_therapi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `therapi`
--

INSERT INTO `therapi` (`id_therapi`, `id_obat`, `id_pelayanan`) VALUES
(1, 2, 1),
(2, 7, 1),
(3, 2, 2),
(4, 7, 2),
(5, 1, 3),
(6, 2, 3),
(7, 7, 3),
(8, 1, 4),
(9, 2, 4),
(10, 3, 4),
(11, 7, 4),
(12, 1, 5),
(13, 2, 5),
(14, 3, 5),
(15, 1, 6),
(16, 2, 6),
(17, 3, 6),
(18, 4, 6),
(19, 5, 6),
(20, 2, 7),
(21, 7, 7),
(22, 1, 8),
(23, 2, 8),
(24, 3, 8),
(25, 4, 8),
(26, 5, 8),
(27, 6, 8),
(28, 1, 9),
(29, 2, 9),
(30, 3, 9),
(31, 4, 9),
(32, 5, 9),
(33, 1, 10),
(34, 2, 10),
(35, 2, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pasien_seq`
--
ALTER TABLE `pasien_seq`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `fk_pasien` (`id_pasien`,`id_dokter`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`poli`);

--
-- Indexes for table `therapi`
--
ALTER TABLE `therapi`
  ADD PRIMARY KEY (`id_therapi`),
  ADD KEY `id_pelayanan` (`id_pelayanan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien_seq`
--
ALTER TABLE `pasien_seq`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `therapi`
--
ALTER TABLE `therapi`
  MODIFY `id_therapi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `registrasi_ibfk_5` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
