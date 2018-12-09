-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Des 2018 pada 18.04
-- Versi server: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- Versi PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_otfloris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_confirm`
--

CREATE TABLE `tb_confirm` (
  `id` int(10) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_confirm`
--

INSERT INTO `tb_confirm` (`id`, `id_pesanan`, `tanggal`, `foto`) VALUES
(1, '', '2018-07-07', 'konfirmasi_lcqgjudmqx_68.jpg'),
(2, 'lcqgjudmqx', '2018-07-07', 'konfirmasi_lcqgjudmqx_85.jpg'),
(3, 'lcqgjudmqx', '2018-07-13', 'konfirmasi_lcqgjudmqx_22.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` varchar(10) NOT NULL,
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
  `konfirmasi` tinyint(1) NOT NULL,
  `dikirim` tinyint(1) NOT NULL DEFAULT '0',
  `diterima` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id`, `barang`, `pengirim`, `ucapan`, `nama_depan`, `nama_belakang`, `email`, `telepon`, `alamat`, `biaya`, `tanggal`, `konfirmasi`, `dikirim`, `diterima`) VALUES
('lcqgjudmqx', 'Tanaman bla bla x2', 'Tidak ada', 'Selamat Wisuda', 'Andre', 'Simamora', 'andriannus.p@gmail.com', '12345678', 'Alamat Lengkap', 40000, '2018-07-08 15:18:44', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_plant`
--

CREATE TABLE `tb_plant` (
  `id` varchar(10) NOT NULL,
  `gambar` varchar(140) NOT NULL,
  `nama` varchar(140) NOT NULL,
  `harga` int(8) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_plant`
--

INSERT INTO `tb_plant` (`id`, `gambar`, `nama`, `harga`, `deskripsi`) VALUES
('xuakypxzyf', 'BukaBeasiswa_AndriannusParasian_UniversitasGunadarma_KTM.jpg', 'Tanaman bla bla', 20000, 'Deskripsi'),
('zv5embl1xr', 'BukaBeasiswa_AndriannusParasian_UniversitasGunadarma_KTP.jpg', 'Tanaman', 20000, 'Tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_confirm`
--
ALTER TABLE `tb_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_plant`
--
ALTER TABLE `tb_plant`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_confirm`
--
ALTER TABLE `tb_confirm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
