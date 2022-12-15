-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 01:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `harga_modal` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `stock` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_supplier`, `nama_barang`, `id_kategori`, `harga_modal`, `harga_jual`, `stock`, `tanggal_masuk`) VALUES
(4, 5, 'Beng Beng', 5, 90000, 100000, 749, '2022-07-19'),
(11, 1, 'Televisi', 4, 3000000, 4000000, 67744, '2022-07-20'),
(12, 1, 'Soda', 3, 30000, 35000, 29921, '2022-07-25'),
(14, 6, 'Blender', 4, 1000000, 2000000, 2326, '2022-07-26'),
(15, 1, 'Laptop', 4, 9000000, 23400000, 2342, '2022-07-27'),
(16, 6, 'beng beng2', 6, 9898989, 7777799, 11, '2022-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(10) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `email_cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `id_perusahaan`, `nama_cabang`, `alamat`, `nomor_telp`, `email_cabang`) VALUES
(1, 3, 'Alfamart Maju Jaya', 'Jalan Kemangi No.87', '0821373637', 'alfamjy@yahoo.com'),
(4, 3, 'Indomaret Kembang', 'Jl.Kembang No.9', '08765123223', 'indmrtkembang@gmail.com'),
(5, 5, 'Dini Mart', 'Jl. Kemangi No.72', '0813657353012', 'dinimart@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `id_detail` int(15) NOT NULL,
  `id_transaksi` int(15) NOT NULL,
  `id_barang` int(15) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `total_harga` int(16) NOT NULL,
  `harga_jual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah`, `total_harga`, `harga_jual`) VALUES
(101, 51, 12, 5, 168070, 35000),
(109, 68, 12, 3, 105000, 35000),
(110, 53, 12, 2, 70000, 35000),
(111, 55, 14, 5, 10000000, 2000000),
(112, 55, 12, 1, 35000, 35000),
(114, 73, 14, 2, 4000000, 2000000),
(115, 76, 4, 4, 400000, 100000),
(117, 81, 14, 4, 8000000, 2000000),
(122, 82, 4, 3, 300000, 100000),
(123, 82, 12, 2, 70000, 35000),
(125, 83, 14, 2, 4000000, 2000000),
(126, 83, 4, 2, 200000, 100000),
(127, 84, 4, 6, 600000, 100000);

--
-- Triggers `detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detailtransaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stock = stock - 	NEW.jumlah
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(10) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `alamat_kasir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nomor_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `id_cabang`, `nama_kasir`, `alamat_kasir`, `jenis_kelamin`, `nomor_telp`) VALUES
(4, 1, 'Purno', 'jl mangga', 'Laki-Laki', '0897236255'),
(5, 3, 'siska kohl', 'jl mangga', 'Perempuan', '08145426728'),
(7, 4, 'Asep', 'Jl. Gunawan', 'Laki-Laki', '08125676809'),
(8, 1, 'Budi', 'Jl. Humas', 'Laki-Laki', '081245638292');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Minuman'),
(4, 'Elektronik'),
(5, 'Makanan'),
(6, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(10) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `no_telp`, `alamat`, `jenis_kelamin`) VALUES
(1, 'Shammy', '082147483647', 'Jl.Kemangi No.73', 'Laki-Laki'),
(2, 'Rifqy', '0898928112', 'Jl Kedua No.21', 'Laki-Laki'),
(3, 'Siska', '0827252424', 'Jl Tupai Ujung', 'Perempuan'),
(4, 'Putri', '08987122621', 'Jl. Pari no.98', 'Perempuan'),
(7, 'Non-Member', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode_pembayaran` int(10) NOT NULL,
  `nama_metode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode_pembayaran`, `nama_metode`) VALUES
(2, 'Tunai'),
(3, 'Kredit'),
(4, 'Go-pay'),
(5, 'Dana');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nomor_telp_pt` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `npwp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `nomor_telp_pt`, `email`, `tanggal_berdiri`, `npwp`) VALUES
(3, 'PT Alfamart', '0872262213', 'alfamart@gmail.com', '2012-11-23', '12331'),
(4, 'PT Indomaret', '08146372922', 'indomaret@gmail.com', '2014-06-19', '123434'),
(8, 'PT Muda Karya', '08356111234', 'mdkarya@gmail.com', '2022-08-01', '223333');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(12) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_rekening` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_hp`, `alamat`, `no_rekening`) VALUES
(1, 'Rifqy', '08125674664', 'Jl. Manggis No.45', '26534334'),
(5, 'Amek', '0876231151', 'Jalan Kambing no.98', '213241434'),
(6, 'Lena', '08176525212', 'Jl.Paus No.76', '12343422'),
(10, 'Fanny', '08121221344', 'Jl.Kemarau', '3445555');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `id_kasir` int(15) NOT NULL,
  `id_member` int(15) NOT NULL,
  `id_metode_pembayaran` int(15) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `kode_inv` varchar(25) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ppn` int(15) NOT NULL,
  `diskon` int(15) NOT NULL,
  `total_bayar` int(25) NOT NULL,
  `status` enum('selesai','proses','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kasir`, `id_member`, `id_metode_pembayaran`, `nama_pembeli`, `kode_inv`, `waktu_transaksi`, `ppn`, `diskon`, `total_bayar`, `status`) VALUES
(53, 4, 3, 4, '-', '53/4/4/3/II/VIII/XXII', '2022-08-02 15:29:03', 4, 3, 70616, 'selesai'),
(55, 4, 3, 2, '-', '55/4/2/3/II/VIII/XXII', '2022-08-03 02:15:33', 2, 8, 9416844, 'selesai'),
(68, 4, 7, 2, 'Asep', '68/4/2/7/II/VIII/XXII', '2022-08-02 15:28:37', 4, 4, 104832, 'selesai'),
(73, 4, 7, 2, 'Doni', '73/4/2/7/III/VIII/XXII', '2022-08-03 04:15:40', 0, 0, 4000000, 'selesai'),
(81, 7, 7, 3, 'Doni', '81/7/3/7/V/VIII/XXII', '2022-08-05 09:35:30', 2, 2, 7996800, 'selesai'),
(82, 4, 3, 3, '', '82/4/3/3/VIII/VIII/XXII', '2022-08-09 03:07:44', 4, 4, 369408, 'selesai'),
(83, 4, 7, 3, 'Asep', '83/4/3/7/VIII/VIII/XXII', '2022-08-18 01:41:58', 2, 2, 4198320, 'selesai'),
(84, 7, 7, 2, 'jon', '84/7/2/7/IX/VIII/XXII', '2022-12-15 12:25:52', 0, 2, 588000, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$WOTbD69mZWxVYES.0bnJMuYPdH.U9Pjwsed3kcaUP7BIokTuEPB0y'),
(4, 'wowi', '$2y$10$EwjJLtX0cZUP/XDzj9Ps0OQJFF.7M.zWYYEkLaMx1l6tnwJuB1G2.'),
(8, 'rifqy', '$2y$10$e9zpNtxsPmo7CHRYm1P2Fuf5RPxy/QWhyWug1kd8aR8I4M8koMHVa'),
(15, 'rose', '$2y$10$u3.6brJKUP2tBzNPa5DTrus/aFO8kilq6S23uXRs.qUo6a88MGuku'),
(16, 'hhh', '$2y$10$ZnPJM.rpx8jStSgFa/iEAugDrS0V2EsDozyFaIcVwBvSBNd8AMzKO'),
(17, 'ki', '$2y$10$JV7duRysAEgiqncLM1n1e./zaTWQdb7QTB7l3bnZUGnQZ6Djeydsm'),
(18, 'kiki', '$2y$10$b.IywHghWZHMKdVEpAxeDely7XNGz2MBKti0pkYxef9ooE0tzn.2a'),
(19, 'erul', '$2y$10$oipri7GqdsaN.PEJbHES6OIxTP/HYDEeggmlibWaTnURNBhNU97Om'),
(20, 'rifqyw', '$2y$10$kipk6KVzRaMK757Lx3TUouAj/SwGQ0mI9.Pj9wa5XUBHW/eKFyl5C'),
(21, 'rifqy w', '$2y$10$sV8m9Z8Ww3Ee90Exh9WUneXrZ.GDcPGNNxgAMV.CosWWb/HHyDdfe'),
(22, 'cuek', '$2y$10$ucMH96JL.c.Qjl/.9nrK..jj3NNVRj4OIMLiIdfM60Y6KV7aFc8JW'),
(23, 'dede', '$2y$10$VtkrYyevNj.2hIddw5ZCh.5bUI0xmKaCbExELg2t9DStwSfSRfGmG'),
(24, 'rifqy1', '$2y$10$BG6QlnlLu/ZGRVACKge/KeU0nemoy50RVV5ixumZ5AY4Psrf8Bpwi'),
(25, 'rifqy123', '$2y$10$Pvfwla0mQ3yDA56Oyvft8uBXvbQAwRV0cwxxV0Ua0HqW6QSowXpA6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode_pembayaran`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `id_detail` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
