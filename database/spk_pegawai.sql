-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 21, 2021 at 11:39 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `nama_file`, `file`) VALUES
(6, 'Surat Pernyataan', 'surat-pernyataan.pdf'),
(7, 'Pengumuman Penerimaan', 'pengumuman-penerimaan.pdf'),
(8, 'Formulir Ujian', 'formulir-ujian.pdf'),
(9, 'Harta Tahta Pengusaha', 'harta-tahta-pengusaha.png'),
(15, 'Good Looking (Wajib)', 'good-looking-wajib.png');

-- --------------------------------------------------------

--
-- Table structure for table `hitung`
--

CREATE TABLE `hitung` (
  `id_hitung` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `vektor_s` float NOT NULL,
  `vektor_v` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hitung`
--

INSERT INTO `hitung` (`id_hitung`, `id_user`, `id_lowongan`, `vektor_s`, `vektor_v`) VALUES
(17, 20, 14, 60.6185, 0.409966),
(18, 18, 14, 61.1341, 0.413453),
(19, 17, 14, 26.1096, 0.176581),
(23, 23, 18, 1, 0.116554),
(24, 24, 18, 3, 0.399768),
(25, 25, 18, 5, 0.555556);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `lowongan` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pengumuman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `lowongan`, `kuota`, `status`, `pengumuman`) VALUES
(18, 'Administrasi', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_rinci`
--

CREATE TABLE `lowongan_rinci` (
  `id_lowongan_rinci` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status_nilai` tinyint(4) NOT NULL,
  `status_upload` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan_rinci`
--

INSERT INTO `lowongan_rinci` (`id_lowongan_rinci`, `id_lowongan`, `kriteria`, `bobot`, `status_nilai`, `status_upload`) VALUES
(51, 18, 'Pendidikan', 5, 1, 1),
(52, 18, 'Test Tertulis', 4, 1, 0),
(53, 18, 'Test Psikologi', 3, 1, 0),
(54, 18, 'Test Kesehatan', 3, 1, 0),
(55, 18, 'Test Wawancara', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `nama_manager` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `nama_manager`, `username`, `password`) VALUES
(1, 'Manager', 'manager', '1d0258c2440a8d19e716292b231e3190');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_lamaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_lamaran`, `id_user`, `id_lowongan`, `kriteria`, `nilai`, `file`) VALUES
(135, 23, 18, 'Pendidikan', '1', ''),
(136, 23, 18, 'Test Tertulis', '1', ''),
(137, 23, 18, 'Test Psikologi', '1', ''),
(138, 23, 18, 'Test Kesehatan', '1', ''),
(139, 23, 18, 'Test Wawancara', '1', ''),
(140, 24, 18, 'Pendidikan', '3', ''),
(141, 24, 18, 'Test Tertulis', '3', ''),
(142, 24, 18, 'Test Psikologi', '3', ''),
(143, 24, 18, 'Test Kesehatan', '3', ''),
(144, 24, 18, 'Test Wawancara', '3', ''),
(145, 25, 18, 'Pendidikan', '5', ''),
(146, 25, 18, 'Test Tertulis', '5', ''),
(147, 25, 18, 'Test Psikologi', '5', ''),
(148, 25, 18, 'Test Kesehatan', '5', ''),
(149, 25, 18, 'Test Wawancara', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `file_cv` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `password`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `pendidikan`, `file_cv`, `foto`) VALUES
(23, 'Ipung Huda', 'Ipung Huda', '0d3854f56d4deee4575ac9db300ddfa3', 'Jl. SP2 Mariyai', 'Timor Leste', '1998-08-21', '+6281221122112', 'ipunghuda@gmail.com', 'S1 Teknik Informatika', '', 'foto_23_Ipung Huda.png'),
(24, 'Fauzi Mawan', 'Fauzi Mawan', 'fc845149cbeb4ba79d458063e2df365c', 'jl. Kamp Salak', 'Aceh', '1995-06-23', '+628322323223', 'fauzimawan@gmail.com', 'S1 Management', '', ''),
(25, 'Alfy Manto', 'Alfy Manto', 'd7c536e94f8105aaf9387a1e2dbba983', 'Jl. BTN', 'Ayamaru', '1997-08-24', '+6283443344334', 'alfymanto@gmail.com', 'S1 Ilmu Hukum', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`id_hitung`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `lowongan_rinci`
--
ALTER TABLE `lowongan_rinci`
  ADD PRIMARY KEY (`id_lowongan_rinci`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hitung`
--
ALTER TABLE `hitung`
  MODIFY `id_hitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lowongan_rinci`
--
ALTER TABLE `lowongan_rinci`
  MODIFY `id_lowongan_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
