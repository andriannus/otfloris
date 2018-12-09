-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2018 at 04:30 PM
-- Server version: 10.1.33-MariaDB-1~xenial
-- PHP Version: 7.2.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otgarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pesanan`
--

CREATE TABLE `konfirmasi_pesanan` (
  `id` int(5) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pesanan`
--

INSERT INTO `konfirmasi_pesanan` (`id`, `id_pesanan`, `tanggal`, `foto`) VALUES
(1, 'QLmOzurysj', '2018-05-18', 'konfirmasi_QLmOzurysj_25.png'),
(2, 'QLmOzurysj', '2018-05-18', 'konfirmasi_QLmOzurysj_14.png'),
(3, 'QLmOzurysj', '2018-05-11', 'konfirmasi_QLmOzurysj_52.png'),
(4, 'QLmOzurysj', '2018-05-05', 'konfirmasi_QLmOzurysj_91.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `barang` text NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `ucapan` varchar(191) DEFAULT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `biaya` int(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `barang`, `pengirim`, `ucapan`, `nama_depan`, `nama_belakang`, `email`, `telepon`, `alamat`, `biaya`, `tanggal`, `konfirmasi`) VALUES
('3u1MdXa8vo', 'Tanaman bla bla x1', 'Kepo', 'Tes', 'Andre', 'Simamora', 'andriannus.p@gmail.com', '12345678', 'Tes', 20000, '2018-05-14 16:28:45', 1),
('8UI6a1qTBl', 'Tanaman bla bla x1', 'Biro', 'Happy Wedding', 'Andre', 'Simamora', 'andriannus.p@gmail.com', '12345678', 'Tes', 20000, '2018-05-14 16:24:39', 0),
('B34Ql0vO1d', 'Tanaman bla bla x1', '', 'Selamat ulang tahun', 'Andre', 'Simamora', 'email@email.com', '12345678', 'alamat lengkap', 20000, '2018-05-14 15:39:12', 0),
('JykaOXBrbf', 'Tanaman bla bla x1', 'Tidak ada', 'Tes', 'Andre', 'Simamora', 'andriannus.p@gmail.com', '12345678', 'Tes', 20000, '2018-05-14 16:37:04', 0),
('PdyvGJ9Dqx', 'Tanaman bla bla x1', 'Tidak ada', 'Kepo bat dah ya', 'Andre', 'Simamora', 'email@email.com', '12345678', 'TEs', 20000, '2018-05-14 16:07:09', 0),
('QLmOzurysj', 'Tanaman bla bla x1', '', NULL, 'Andre', 'Simamora', 'andriansimamora@gmail.com', '12345678', 'Tes', 20000, '2018-05-13 14:38:40', 0),
('VRC2qnd8yl', 'Tanaman bla bla x1', 'Tidak ada', 'Tes', 'Andre', 'Simamora', 'andriannus.p@gmail.com', '12345678', 'Tes', 20000, '2018-05-14 16:35:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `gambar` varchar(140) NOT NULL,
  `slug` varchar(140) NOT NULL,
  `nama` varchar(140) NOT NULL,
  `harga` int(8) NOT NULL,
  `stok` int(4) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`gambar`, `slug`, `nama`, `harga`, `stok`, `deskripsi`) VALUES
('parallax2.jpg', 'ini-slug', 'Tanaman bla bla', 20000, 60, 'Deskripsi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konfirmasi_pesanan`
--
ALTER TABLE `konfirmasi_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`slug`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi_pesanan`
--
ALTER TABLE `konfirmasi_pesanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
