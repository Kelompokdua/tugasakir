-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mei 2019 pada 06.33
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
(3, 'Danang', 'Gigi', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `farmasi`
--

CREATE TABLE `farmasi` (
  `id_trans_farmasi` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_transaksi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 3, 'galih', 'galih', '027dc74f0bbf09a61a36ec7f0d9e08ca', 'asisten'),
(5, 1, 'januareta rizki dirgantari', 'reta', '697f16c6d5e440a46afaf3b8caf53b47', 'asisten'),
(6, 0, 'oi', 'oi', 'a2e63ee01401aaeca78be023dfbb8c59', 'admin'),
(7, 0, 'ai', 'ai', '4921c0e2d1f6005abe1f9ec2e2041909', 'farmasi'),
(8, 0, 'hai', 'hai', '42810cb02db3bb2cbb428af0d8b0376e', 'petugas');

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
(1, 'saka', 'saka', 110),
(2, 'thermenza', 'flu', 1000),
(3, 'Gigi', '5cc82bd590e91.png', 110),
(4, 'awang lintang mario', '5cc82ceddd967.png', 11),
(5, 'tayo', '5cc82feb0ff4a.png', 111),
(6, 'aaa', '5cc8348891f16.png', 111);

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
('PSN01', 'a', 'a', 'L', '2019-04-02', 11, 'asa', 'as', 'as', 'as', 'BPJS'),
('PSN05', 'awang lintang mario', 'palsu', 'L', '2019-04-04', 121, 'mobile legend', 'onic', 'sonic', 'menikah', 'UMUM'),
('PSN08', 'Galih raka m', 'mana', 'L', '1999-12-04', 188218818, '', '', '', 'Belum Menikah', 'UMUM');

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
(8);

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
(7, 'Umum', 'Buka dong');

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
(1, 'PSN01', 6, 'galih', '2019-05-03 02:05:22', 'Selesai'),
(2, 'PSN05', 6, 'galih', '2019-05-03 02:05:28', 'Belum'),
(3, 'PSN08', 6, 'galih', '2019-05-03 02:05:34', 'Belum'),
(4, 'PSN05', 6, 'hai', '2019-05-03 10:07:00', 'Belum');

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
  `therapi` varchar(255) NOT NULL,
  `foto_resep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_pelayanan`, `id_pasien`, `id_dokter`, `poli`, `tanggal`, `anamnesa`, `diagnose`, `therapi`, `foto_resep`) VALUES
(1, 'PSN08', 3, 'Gigi', '2019-05-03', 'coba', 'coba', 'saka\r\nthermenza\r\nGigi\r\n', '5ccbaf8fb92d2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `farmasi`
--
ALTER TABLE `farmasi`
  ADD KEY `id_rekam_medis` (`id_rekam_medis`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_login` (`id_login`),
  ADD KEY `id_dokter` (`id_obat`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

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
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_petugas` (`inputby`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `fk_pasien` (`id_pasien`,`id_dokter`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`poli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien_seq`
--
ALTER TABLE `pasien_seq`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `kasir_ibfk_4` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`);

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
