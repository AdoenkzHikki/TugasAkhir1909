-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 06:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berat`
--

CREATE TABLE `tb_berat` (
  `id_berat` int(11) NOT NULL,
  `nik_anak` bigint(16) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berat`
--

INSERT INTO `tb_berat` (`id_berat`, `nik_anak`, `bulan`, `berat`, `tahun`) VALUES
(10, 3329090405990001, 'Januari', 16, 2019),
(11, 3329090405990001, 'Februari', 20, 2019),
(12, 3329090405990001, 'Maret', 21, 2019),
(13, 3329090405990001, 'April', 21, 2019),
(14, 3329090405990001, 'Mei', 21, 2019),
(16, 3329090405990001, 'Juni', 15, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `nik_anak` bigint(16) NOT NULL,
  `id_user` char(16) NOT NULL,
  `nm_anak` varchar(50) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kel` enum('L','P') NOT NULL,
  `rt` int(3) NOT NULL,
  `status_imunisasi` varchar(50) NOT NULL,
  `jenis_imunisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`nik_anak`, `id_user`, `nm_anak`, `nm_ayah`, `nm_ibu`, `tgl_lahir`, `jns_kel`, `rt`, `status_imunisasi`, `jenis_imunisasi`) VALUES
(3329090405990001, 'ID002', 'Adentya Elmas P', 'Noor Fatoni', 'Kuswahyuningsih', '2007-03-23', 'L', 98, 'Sudah Terimunisasi', 'Campak'),
(3329090405990002, 'ID002', 'Ilul', 'Toni', 'Nining', '2018-07-25', 'L', 20, 'Sudah Terimunisasi', 'Campak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tinggi`
--

CREATE TABLE `tb_tinggi` (
  `id_tinggi` int(11) NOT NULL,
  `nik_anak` bigint(16) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tinggi`
--

INSERT INTO `tb_tinggi` (`id_tinggi`, `nik_anak`, `bulan`, `tinggi`, `tahun`) VALUES
(9, 3329090405990001, 'Januari', 95, 2019),
(10, 3329090405990001, 'Februari', 95, 2019),
(11, 3329090405990001, 'Maret', 96, 2019),
(12, 3329090405990001, 'April', 96, 2019),
(13, 3329090405990001, 'Mei', 96, 2019),
(15, 3329090405990001, 'Juni', 120, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lev_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `password`, `lev_user`) VALUES
('3329090405990001', 'Adentya', '123456', 'Masyarakat'),
('ID001', 'OLAF', '123', 'Kepala Posyandu'),
('ID002', 'Aden', '123', 'Petugas Kesehatan'),
('ID003', 'Elkuss12', '123', 'Kader');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vitamin`
--

CREATE TABLE `tb_vitamin` (
  `id_vitamin` int(11) NOT NULL,
  `id_user` char(16) NOT NULL,
  `jns_vitamin` varchar(50) NOT NULL,
  `jml_stok` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vitamin`
--

INSERT INTO `tb_vitamin` (`id_vitamin`, `id_user`, `jns_vitamin`, `jml_stok`, `keterangan`) VALUES
(6, 'ID002', 'Vitamin A', 10, 'Untuk Anak'),
(7, 'ID002', 'merah', 2, 'Untuk Balita'),
(8, 'ID002', 'Vitamin AB', 11, 'Untuk Anak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berat`
--
ALTER TABLE `tb_berat`
  ADD PRIMARY KEY (`id_berat`),
  ADD KEY `nik_anak` (`nik_anak`);

--
-- Indexes for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`nik_anak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_tinggi`
--
ALTER TABLE `tb_tinggi`
  ADD PRIMARY KEY (`id_tinggi`),
  ADD KEY `nik_anak` (`nik_anak`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_vitamin`
--
ALTER TABLE `tb_vitamin`
  ADD PRIMARY KEY (`id_vitamin`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berat`
--
ALTER TABLE `tb_berat`
  MODIFY `id_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_tinggi`
--
ALTER TABLE `tb_tinggi`
  MODIFY `id_tinggi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_vitamin`
--
ALTER TABLE `tb_vitamin`
  MODIFY `id_vitamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berat`
--
ALTER TABLE `tb_berat`
  ADD CONSTRAINT `tb_berat_ibfk_1` FOREIGN KEY (`nik_anak`) REFERENCES `tb_pendaftar` (`nik_anak`);

--
-- Constraints for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD CONSTRAINT `tb_pendaftar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_tinggi`
--
ALTER TABLE `tb_tinggi`
  ADD CONSTRAINT `tb_tinggi_ibfk_1` FOREIGN KEY (`nik_anak`) REFERENCES `tb_pendaftar` (`nik_anak`);

--
-- Constraints for table `tb_vitamin`
--
ALTER TABLE `tb_vitamin`
  ADD CONSTRAINT `tb_vitamin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
