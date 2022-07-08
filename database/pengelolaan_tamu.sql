-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 12:31 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengelolaan_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_tamu` varchar(6) NOT NULL,
  `id_pelanggan` varchar(4) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_tamu`, `id_pelanggan`, `keperluan`, `tanggal`) VALUES
('TAMU01', 'PE01', 'Bertemu dengan IT Manager', '2018-05-11 23:41:31'),
('TAMU02', 'PE02', 'Pengujian produk minuman', '2018-05-11 23:42:11'),
('TAMU03', 'PE01', 'Tes njajal', '2018-06-13 18:20:58'),
('TAMU04', 'PE02', 'a', '2018-01-01 00:00:00'),
('TAMU05', 'PE01', 'v', '2018-02-01 00:00:00'),
('TAMU06', 'PE01', 'v', '2018-03-01 00:00:00'),
('TAMU07', 'PE02', 'vsd', '2018-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `identifikasi_kebutuhan_pelanggan`
--

CREATE TABLE `identifikasi_kebutuhan_pelanggan` (
  `id_kebutuhan` varchar(5) NOT NULL,
  `id_pelanggan` varchar(4) NOT NULL,
  `permintaan` varchar(100) NOT NULL,
  `penyebab` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identifikasi_kebutuhan_pelanggan`
--

INSERT INTO `identifikasi_kebutuhan_pelanggan` (`id_kebutuhan`, `id_pelanggan`, `permintaan`, `penyebab`, `tanggal`) VALUES
('IDP01', 'PE01', 'Alat uji coba produk limbah', 'Belum ada fasilitas alat untuk uji produk limbah', '2018-05-14 21:21:08'),
('IDP02', 'PE01', 'q', 'q', '2018-01-02 00:00:00'),
('IDP03', 'PE02', 'w', 'w', '2018-01-09 00:00:00'),
('IDP04', 'PE03', 'e', 'e', '2018-02-08 00:00:00'),
('IDP05', 'PE01', 'r', 'r', '2018-01-16 00:00:00'),
('IDP06', 'PE03', 't', 't', '2018-02-05 00:00:00'),
('IDP07', 'PE01', 'y', 'y', '2018-03-02 00:00:00'),
('IDP08', 'PE02', 'u', 'u', '2018-04-09 00:00:00'),
('IDP09', 'PE03', 'i', 'i', '2018-04-02 00:00:00'),
('IDP10', 'PE02', 'p', 'p', '2018-05-14 00:00:00'),
('IDP11', 'PE03', 'o', 'o', '2018-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_pelanggan`
--

CREATE TABLE `keluhan_pelanggan` (
  `id_keluhan` varchar(8) NOT NULL,
  `id_pelanggan` varchar(4) NOT NULL,
  `permintaan` varchar(100) NOT NULL,
  `permasalahan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_pelanggan`
--

INSERT INTO `keluhan_pelanggan` (`id_keluhan`, `id_pelanggan`, `permintaan`, `permasalahan`, `tanggal`) VALUES
('2018KP01', 'PE01', 'Uji produk tidak tepat waktu', 'Adanya kerusakan pada fasilitas alat uji', '2018-05-14 21:13:32'),
('2018KP02', 'PE03', 'tes', 'tes', '2018-06-12 19:58:22'),
('2018KP03', 'PE02', 'a', 'a', '2018-01-01 00:00:00'),
('2018KP04', 'PE03', 'ab', 'ab', '2018-02-01 00:00:00'),
('2018KP05', 'PE02', 'abc', 'abc', '2018-03-01 00:00:00'),
('2018KP06', 'PE03', 'abcd', 'abcd', '2018-04-01 00:00:00'),
('2018KP07', 'PE01', 'q', 'q', '2018-06-07 00:00:00'),
('2018KP08', 'PE02', 'w', 'w', '2018-06-10 00:00:00'),
('2018KP09', 'PE01', 'e', 'e', '2018-05-16 00:00:00'),
('2018KP10', 'PE02', 'r', 'r', '2018-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_tindaklanjut`
--

CREATE TABLE `keluhan_tindaklanjut` (
  `id_keluhan` varchar(8) NOT NULL,
  `ruang_lingkup` varchar(100) NOT NULL,
  `dokumen_acuan` varchar(100) NOT NULL,
  `hal` varchar(5) NOT NULL,
  `dari` varchar(5) NOT NULL,
  `sumber_ketidaksesuaian` varchar(100) NOT NULL,
  `deskripsi_ketidaksesuaian` text NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `atasan` varchar(100) NOT NULL,
  `analisa_ketidaksesuaian` text NOT NULL,
  `deskripsi_koreksi` text NOT NULL,
  `deskripsi_pencegahan` text NOT NULL,
  `dibuat_oleh2` varchar(50) NOT NULL,
  `rencana_penyelesaian` date NOT NULL,
  `hasil_verifikasi` text NOT NULL,
  `kasiSS` varchar(100) NOT NULL,
  `tanggal_kasiSS` date NOT NULL,
  `kasiPJT` varchar(100) NOT NULL,
  `tanggal_kasiPJT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_tindaklanjut`
--

INSERT INTO `keluhan_tindaklanjut` (`id_keluhan`, `ruang_lingkup`, `dokumen_acuan`, `hal`, `dari`, `sumber_ketidaksesuaian`, `deskripsi_ketidaksesuaian`, `dibuat_oleh`, `atasan`, `analisa_ketidaksesuaian`, `deskripsi_koreksi`, `deskripsi_pencegahan`, `dibuat_oleh2`, `rencana_penyelesaian`, `hasil_verifikasi`, `kasiSS`, `tanggal_kasiSS`, `kasiPJT`, `tanggal_kasiPJT`) VALUES
('2018KP01', 'tes1', 'tes1', '31', '301', 'Tinjauan Manajemen', 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', '2018-06-14', 'tes1', 'tes1', '2018-06-14', 'tes1', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `alamat`, `nama_instansi`, `telepon`, `email`) VALUES
('PE01', 'Heru Afandi', 'heruafandi06', 'd4b55f7dae75cf7ede103c0f15614257', 'Tandes Kidul', 'Heru Corps', '081233945354', 'heruaffandi06@gmail.com'),
('PE02', 'Yenni', 'yeyen', '202cb962ac59075b964b07152d234b70', 'Karangpoh Indah', 'PT. Semar Mesem', '089675844324', 'yenni_yeyen@gmail.com'),
('PE03', 'coba', 'coba', 'a3040f90cc20fa672fe31efcae41d2db', 'coba', 'coba', '081', 'coba@gmail.com'),
('PE04', 'bayu', 'bayu12', 'ce3478df962fd53d63976da71e06dc05', 'Bandung', 'Bayu', '089531518231', 'bayu12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `hak_akses`) VALUES
('admin', 'Muhammad Akhsan', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('fatimah', 'Fatimah', '65695b363e7c8b3c0e838b230dea78b3', 'kasi'),
('pelanggan2', 'pelanggan2', 'db9d905c0d8e7f7f608236efda940cd6', 'kasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `identifikasi_kebutuhan_pelanggan`
--
ALTER TABLE `identifikasi_kebutuhan_pelanggan`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indexes for table `keluhan_pelanggan`
--
ALTER TABLE `keluhan_pelanggan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
