-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2020 at 05:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noti_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'ridho008', '$2y$10$iuh5FQz5cpQ9ApF.S5rrheAp2d2ln8qLIuriad9zkZuTh5PZmfGWC', 'ridho');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian'),
(2, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Pekanbaru', 35000),
(2, 'Regat', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(2, 'rozi123@gmail.com', '12345', 'rozi amrin', '123', ''),
(4, 'harun@gmail.com', 'harun', 'Harun', '08765765', ''),
(5, 'noti@gmail.com', 'noti', 'Noti', '0876765453', 'Jl.Pahlawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(5, 2, 'Harun', 'Mandiri Syariah', 1000000, '2020-07-05', '5f01b4cf4029b.05-07-2020206232_3.jpg'),
(6, 16, 'Juki', 'BRI', 2000000, '2020-07-05', '5f01b4f3e4c37.05-07-2020sublime-text-preview.png'),
(7, 17, 'asd', 'BRI', 2, '2020-07-05', '5f01b5b2b8eec.05-07-2020'),
(8, 17, 'Harun', 'Mandiri Syariah', 23, '2020-07-05', '5f01b64bb2954.'),
(13, 18, 'Harun Saputra', 'Mandiri Syariah', 20000, '2020-07-06', '5f0332efb1238.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `ekspedisi` varchar(10) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pelanggan`, `tgl_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `totalberat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(1, 2, '2020-06-23', 1200000, '', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(2, 4, '2020-06-11', 500000, '', 'Bukti terkirim', '', 0, '', '', '', 0, '', '', 0, ''),
(15, 5, '2020-07-03', 2415000, '', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(16, 4, '2020-07-03', 54000, 'jl.pepaya nomor 123', 'Bukti terkirim', '', 0, '', '', '', 0, '', '', 0, ''),
(17, 4, '2020-07-03', 265000, '', 'Bukti terkirim', '', 0, '', '', '', 0, '', '', 0, ''),
(18, 4, '2020-07-03', 2035000, 'asd', 'barang dikirim', 'asdqwe', 0, '', '', '', 0, '', '', 0, ''),
(19, 4, '2020-07-04', 2035000, 'asd', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(20, 5, '2020-07-04', 4015000, 'qqq', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(21, 2, '2020-07-04', 2035000, 'fgfh', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(22, 4, '2020-07-05', 2035000, 'asd', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(23, 4, '2020-07-05', 112036850, 'jl.rambutan', 'pending', '', 0, '', '', '', 0, '', '', 0, ''),
(24, 4, '2020-07-30', 54511925, 'asasd', 'pending', '0', 14001, 'Jawa Timur', 'Kediri', 'Kota', 64125, 'pos', 'Paket Kilat Khusus', 441000, '5-7 HARI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_produk`
--

CREATE TABLE `tb_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 2, 2, 1, '', 0, 0, 0, 0),
(3, 8, 12, 2, '', 0, 0, 0, 0),
(4, 8, 15, 1, '', 0, 0, 0, 0),
(5, 8, 13, 1, '', 0, 0, 0, 0),
(6, 9, 12, 2, '', 0, 0, 0, 0),
(7, 9, 15, 1, '', 0, 0, 0, 0),
(8, 9, 13, 1, '', 0, 0, 0, 0),
(9, 10, 12, 2, '', 0, 0, 0, 0),
(10, 10, 15, 1, '', 0, 0, 0, 0),
(11, 10, 13, 1, '', 0, 0, 0, 0),
(12, 11, 12, 1, '', 0, 0, 0, 0),
(13, 11, 14, 1, '', 0, 0, 0, 0),
(14, 12, 12, 1, '', 0, 0, 0, 0),
(15, 13, 17, 1, '', 0, 0, 0, 0),
(16, 14, 12, 1, 'Sepeta TDaw0', 3000000, 3500, 3500, 3000000),
(17, 14, 14, 1, 'Jaket Hitam', 230000, 50, 50, 230000),
(18, 15, 12, 1, 'Sepeta TDaw0', 2000000, 3500, 3500, 2000000),
(19, 15, 16, 1, 'Busana Muslim', 400000, 38, 38, 400000),
(20, 16, 11, 1, 'Kacamatak', 54000925, 10001, 10001, 54000925),
(21, 17, 14, 1, 'Jaket Hitam', 230000, 50, 50, 230000),
(22, 18, 12, 1, 'Sepeta TDaw0', 2000000, 3500, 3500, 2000000),
(23, 19, 12, 1, 'Sepeta TDaw0', 2000000, 3500, 3500, 2000000),
(24, 20, 12, 2, 'Sepeta TDaw0', 2000000, 3500, 7000, 4000000),
(25, 21, 12, 1, 'Sepeta TDaw0', 2000000, 3500, 3500, 2000000),
(26, 22, 12, 1, 'Sepeta TDaw0', 2000000, 3500, 3500, 2000000),
(27, 23, 12, 2, 'Sepeta TDaw0', 2000000, 3500, 7000, 4000000),
(28, 23, 11, 2, 'Kacamatak', 54000925, 10001, 20002, 108001850),
(29, 24, 13, 1, 'Balbel 4KG', 70000, 4000, 4000, 70000),
(30, 24, 11, 1, 'Kacamatak', 54000925, 10001, 10001, 54000925);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(11, 2, 'Kacamatak', 54000925, 10001, '5efc6872b5fd7.jpg', 'woiw', 2),
(12, 2, 'Sepeta TDaw0', 2000000, 3500, '5efc687b347f4.jpg', 'waw', 3),
(13, 2, 'Balbel 4KG', 70000, 4000, '5efcba80e3f9e.jpg', 'barbelnya mantap', 4),
(14, 1, 'Jaket Hitam Putih', 130000, 40, '5efcbaa2324aa.jpg', 'jaketnya bagus gan', 15),
(15, 1, 'Kemeja Hitam Putih', 56000, 10, '5efcbad8be986.jpg', 'bagus kok', 5),
(16, 1, 'Busana Muslim', 400000, 38, '5efcbb2e05d9c.jpg', 'busananya mantap kak', 5),
(17, 1, 'Hoddie', 330000, 8, '5efcbb4f0a88f.jpg', 'mantap!!', 5),
(41, 2, 'Galon', 5000, 3000, '46473182_353365755423665_234789743060058112_n.jpg', 'sip', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_foto`
--

CREATE TABLE `tb_produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_foto`
--

INSERT INTO `tb_produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(48, 41, '46473182_353365755423665_234789743060058112_n.jpg'),
(49, 41, '40663371_2068782916770035_2366937853847404544_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_produk_foto`
--
ALTER TABLE `tb_produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_produk_foto`
--
ALTER TABLE `tb_produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
