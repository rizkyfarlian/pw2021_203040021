-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 04:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `link_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`, `link_gambar`) VALUES
(3, 'B001', 'Tinta Spidol', 29, 7000, 8500, ''),
(4, 'B002', 'Kertas A4 60g', 33, 30000, 35000, ''),
(6, 'B003', 'Gula 1kg', 50, 9000, 10500, ''),
(8, 'B005', 'Coklat Kitkat Matcha', 4, 8000, 10000, ''),
(10, 'asd', 'asd', 0, 123, 123, 'uploads/asd.jpg'),
(11, '123123123', 'asdasdasd', 0, 111, 1, 'uploads/123123123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah`) VALUES
(4, 4, 3, 20),
(5, 4, 4, 30),
(6, 5, 3, 2),
(7, 5, 4, 3),
(8, 6, 8, 10),
(9, 7, 6, 100),
(10, 8, 3, 4),
(11, 8, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah`, `harga_beli`, `harga_jual`) VALUES
(7, 10, 3, 5, 7000, 8500),
(8, 11, 6, 50, 9000, 10500),
(9, 11, 8, 6, 8000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
(1, 'Dina', 'Surabaya', '089236324'),
(2, 'Mikail', 'Pasuruan', '089236324234'),
(4, 'Sora', 'Banten Barat', '086483');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(1, 'Toko Sriwijaya', 'Jl. Bundaran HI No. 12', '087234238423'),
(2, 'Toko Aneka Warna', 'Jl. Sukarno Hatta No. 16', '087234232356'),
(3, 'Yaya 23', 'Lombok', '0827648324');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_nota` varchar(15) NOT NULL,
  `tanggal_nota` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id_pembelian`, `id_supplier`, `id_user`, `no_nota`, `tanggal_nota`) VALUES
(4, 1, 1, 'TP0001', '2019-06-20'),
(5, 3, 1, 'TP0002', '2019-06-20'),
(6, 2, 1, 'TP0003', '2019-06-21'),
(7, 2, 6, 'TP0004', '2019-06-21'),
(8, 1, 1, 'TP0005', '2021-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_nota` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_penjualan`, `no_nota`, `id_user`, `tanggal_penjualan`, `id_pelanggan`) VALUES
(10, 'TJ0001', 1, '2019-06-20', 1),
(11, 'TJ0002', 6, '2019-06-21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin'),
(6, 'Mikail', 'mikail12', 'mikail');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_transaksi_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `view_detail_transaksi_pembelian` (
`id_detail_pembelian` int(11)
,`id_pembelian` int(11)
,`id_barang` int(11)
,`jumlah` int(11)
,`nama_barang` varchar(50)
,`no_nota` varchar(15)
,`tanggal_nota` date
,`harga_beli` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_transaksi_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_detail_transaksi_penjualan` (
`id_detail_penjualan` int(11)
,`id_penjualan` int(11)
,`id_barang` int(11)
,`jumlah` int(11)
,`kode_barang` varchar(50)
,`nama_barang` varchar(50)
,`no_nota` varchar(15)
,`harga_beli` int(11)
,`harga_jual` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_pembelian` (
`id_pembelian` int(11)
,`id_supplier` int(11)
,`id_user` int(11)
,`no_nota` varchar(15)
,`tanggal_nota` date
,`nama_supplier` varchar(100)
,`alamat` varchar(100)
,`telepon` varchar(15)
,`nama_user` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_penjualan` (
`id_penjualan` int(11)
,`no_nota` varchar(15)
,`id_user` int(11)
,`tanggal_penjualan` date
,`id_pelanggan` int(11)
,`nama_pelanggan` varchar(100)
,`alamat` varchar(100)
,`telepon` varchar(15)
,`nama_user` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail_transaksi_pembelian`
--
DROP TABLE IF EXISTS `view_detail_transaksi_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_transaksi_pembelian`  AS  select `detail_pembelian`.`id_detail_pembelian` AS `id_detail_pembelian`,`detail_pembelian`.`id_pembelian` AS `id_pembelian`,`detail_pembelian`.`id_barang` AS `id_barang`,`detail_pembelian`.`jumlah` AS `jumlah`,`barang`.`nama_barang` AS `nama_barang`,`transaksi_pembelian`.`no_nota` AS `no_nota`,`transaksi_pembelian`.`tanggal_nota` AS `tanggal_nota`,`barang`.`harga_beli` AS `harga_beli` from ((`detail_pembelian` join `transaksi_pembelian` on(`detail_pembelian`.`id_pembelian` = `transaksi_pembelian`.`id_pembelian`)) join `barang` on(`detail_pembelian`.`id_barang` = `barang`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_detail_transaksi_penjualan`
--
DROP TABLE IF EXISTS `view_detail_transaksi_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_transaksi_penjualan`  AS  select `detail_penjualan`.`id_detail_penjualan` AS `id_detail_penjualan`,`detail_penjualan`.`id_penjualan` AS `id_penjualan`,`detail_penjualan`.`id_barang` AS `id_barang`,`detail_penjualan`.`jumlah` AS `jumlah`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`nama_barang` AS `nama_barang`,`transaksi_penjualan`.`no_nota` AS `no_nota`,`detail_penjualan`.`harga_beli` AS `harga_beli`,`detail_penjualan`.`harga_jual` AS `harga_jual` from ((`detail_penjualan` join `transaksi_penjualan` on(`detail_penjualan`.`id_penjualan` = `transaksi_penjualan`.`id_penjualan`)) join `barang` on(`detail_penjualan`.`id_barang` = `barang`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_pembelian`
--
DROP TABLE IF EXISTS `view_transaksi_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_pembelian`  AS  select `transaksi_pembelian`.`id_pembelian` AS `id_pembelian`,`transaksi_pembelian`.`id_supplier` AS `id_supplier`,`transaksi_pembelian`.`id_user` AS `id_user`,`transaksi_pembelian`.`no_nota` AS `no_nota`,`transaksi_pembelian`.`tanggal_nota` AS `tanggal_nota`,`supplier`.`nama_supplier` AS `nama_supplier`,`supplier`.`alamat` AS `alamat`,`supplier`.`telepon` AS `telepon`,`user`.`nama_user` AS `nama_user` from ((`transaksi_pembelian` join `supplier` on(`transaksi_pembelian`.`id_supplier` = `supplier`.`id_supplier`)) join `user` on(`transaksi_pembelian`.`id_user` = `user`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_penjualan`
--
DROP TABLE IF EXISTS `view_transaksi_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_penjualan`  AS  select `transaksi_penjualan`.`id_penjualan` AS `id_penjualan`,`transaksi_penjualan`.`no_nota` AS `no_nota`,`transaksi_penjualan`.`id_user` AS `id_user`,`transaksi_penjualan`.`tanggal_penjualan` AS `tanggal_penjualan`,`transaksi_penjualan`.`id_pelanggan` AS `id_pelanggan`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pelanggan`.`alamat` AS `alamat`,`pelanggan`.`telepon` AS `telepon`,`user`.`nama_user` AS `nama_user` from ((`transaksi_penjualan` join `user` on(`transaksi_penjualan`.`id_user` = `user`.`id_user`)) join `pelanggan` on(`transaksi_penjualan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE,
  ADD UNIQUE KEY `kode_barang` (`kode_barang`) USING BTREE;

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`) USING BTREE;

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`) USING BTREE;

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`) USING BTREE;

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_pembelian`) USING BTREE;

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_penjualan`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
