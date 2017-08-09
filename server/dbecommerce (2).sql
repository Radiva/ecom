-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 04:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `idbanner` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbestoffer`
--

CREATE TABLE `tblbestoffer` (
  `idbestoffer` int(11) NOT NULL,
  `idbarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `idbrand` int(11) NOT NULL,
  `namabrand` varchar(100) DEFAULT NULL,
  `logobrand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`idbrand`, `namabrand`, `logobrand`) VALUES
(1, 'Adidas', 'images/pictures/0.jpg'),
(2, 'Fladeo', 'images/pictures/2.jpg'),
(3, 'Carvil', 'images/pictures/8.jpg'),
(4, 'Niki', 'images/pictures/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `idcart` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idsession` varchar(100) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailpenjualan`
--

CREATE TABLE `tbldetailpenjualan` (
  `iddetailpenjualan` int(11) NOT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `usernamepembeli` varchar(100) DEFAULT NULL,
  `notapemesanan` varchar(100) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldetailpenjualan`
--

INSERT INTO `tbldetailpenjualan` (`iddetailpenjualan`, `idbarang`, `usernamepembeli`, `notapemesanan`, `jumlah`, `hargajual`) VALUES
(12, 1, 'mimin', 'BAK201708080001', 2, 1000000),
(13, 3, 'mimin', 'BAK201708080001', 1, 750000),
(14, 2, 'diva', 'BAK201708080002', 2, 1400000),
(16, 3, 'mimin', 'BAK201708090003', 2, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `tblgambarproduct`
--

CREATE TABLE `tblgambarproduct` (
  `idgambarproduct` int(11) NOT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgambarproduct`
--

INSERT INTO `tblgambarproduct` (`idgambarproduct`, `idbarang`, `gambar`) VALUES
(1, 1, 'http://192.168.100.18/ecommerce/images/pictures/1w.jpg'),
(2, 1, 'http://192.168.100.18/ecommerce/images/pictures/2w.jpg'),
(3, 1, 'http://192.168.100.18/ecommerce/images/pictures/3w.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblgroupuser`
--

CREATE TABLE `tblgroupuser` (
  `idgroupuser` int(11) NOT NULL,
  `namagroupuser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgroupuser`
--

INSERT INTO `tblgroupuser` (`idgroupuser`, `namagroupuser`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategoripembayaran`
--

CREATE TABLE `tblkategoripembayaran` (
  `idkategoripembayaran` int(11) NOT NULL,
  `namakategoripembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategoripembayaran`
--

INSERT INTO `tblkategoripembayaran` (`idkategoripembayaran`, `namakategoripembayaran`) VALUES
(1, 'virtual payment gateway');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategoriproduct`
--

CREATE TABLE `tblkategoriproduct` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategoriproduct`
--

INSERT INTO `tblkategoriproduct` (`idkategori`, `namakategori`) VALUES
(1, 'Pakaian Pria'),
(2, 'Pakaian Wanita'),
(3, 'Sepatu'),
(4, 'Pakaian Jaket');

-- --------------------------------------------------------

--
-- Table structure for table `tblpenjualan`
--

CREATE TABLE `tblpenjualan` (
  `notapemesanan` varchar(100) NOT NULL,
  `waktupembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usernamepembeli` varchar(100) DEFAULT NULL,
  `statuspenjualan` varchar(100) DEFAULT NULL,
  `idkategoripembayaran` int(11) DEFAULT NULL,
  `diskon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpenjualan`
--

INSERT INTO `tblpenjualan` (`notapemesanan`, `waktupembelian`, `usernamepembeli`, `statuspenjualan`, `idkategoripembayaran`, `diskon`) VALUES
('BAK201708080001', '2017-08-08 14:49:33', 'mimin', 'Success', 1, 0),
('BAK201708080002', '2017-08-08 14:53:01', 'diva', 'Success', 1, 0),
('BAK201708090003', '2017-08-08 23:56:18', 'mimin', 'Success', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `video` varchar(255) DEFAULT NULL,
  `idbrand` int(11) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`idbarang`, `namabarang`, `deskripsi`, `video`, `idbrand`, `idkategori`, `harga`) VALUES
(1, 'Sepatu pria Casual', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim.\r\nFusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede.\r\n', NULL, 2, 1, 500000),
(2, 'Jaket kulit pria', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim.\r\nFusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede.\r\n', NULL, 2, 3, 700000),
(3, 'Tas Ransel Gunung 60 L', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim.\r\nFusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede.\r\n', NULL, 3, 1, 750000);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductreview`
--

CREATE TABLE `tblproductreview` (
  `Idproductreview` int(11) NOT NULL,
  `Idbarang` int(11) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `namadepan` varchar(50) DEFAULT NULL,
  `namabelakang` varchar(150) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `idgroupuser` int(11) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`username`, `password`, `namadepan`, `namabelakang`, `notelp`, `alamat`, `idgroupuser`, `tgllahir`, `email`) VALUES
('admin', 'admin', NULL, NULL, NULL, NULL, 1, NULL, NULL),
('diva', 'kkk', 'Radiva', 'Hera', '084545454545', 'Jl. Buntu Selatan No. 35', 2, '2017-08-08', 'divadiva@gmail.com'),
('mimin', 'kamana123', 'Mimin', 'Mini', '081234567890', 'Jl. Buntu Selatan RT 05 RW 06', 2, '1992-01-23', 'miminmini@gmail.com'),
('radiva', 'kkk', 'Radiva', 'Hera', '08555666777', 'jl. Buntu Selatan', 2, '2017-08-07', 'radivahera@gmail.com'),
('willy', 'kamana', 'Willy', 'Pradika', '085349288882', 'Jl Rasamala IV', 2, '2017-08-07', 'willy.pradika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblvideo`
--

CREATE TABLE `tblvideo` (
  `idvideo` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `tblbestoffer`
--
ALTER TABLE `tblbestoffer`
  ADD PRIMARY KEY (`idbestoffer`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`idbrand`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indexes for table `tbldetailpenjualan`
--
ALTER TABLE `tbldetailpenjualan`
  ADD PRIMARY KEY (`iddetailpenjualan`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `usernamepembeli` (`usernamepembeli`),
  ADD KEY `notapemesanan` (`notapemesanan`);

--
-- Indexes for table `tblgambarproduct`
--
ALTER TABLE `tblgambarproduct`
  ADD PRIMARY KEY (`idgambarproduct`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `tblgroupuser`
--
ALTER TABLE `tblgroupuser`
  ADD PRIMARY KEY (`idgroupuser`);

--
-- Indexes for table `tblkategoripembayaran`
--
ALTER TABLE `tblkategoripembayaran`
  ADD PRIMARY KEY (`idkategoripembayaran`);

--
-- Indexes for table `tblkategoriproduct`
--
ALTER TABLE `tblkategoriproduct`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tblpenjualan`
--
ALTER TABLE `tblpenjualan`
  ADD PRIMARY KEY (`notapemesanan`),
  ADD KEY `usernamepenjual` (`usernamepembeli`),
  ADD KEY `idkategoripembayaran` (`idkategoripembayaran`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idbrand` (`idbrand`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `tblproductreview`
--
ALTER TABLE `tblproductreview`
  ADD PRIMARY KEY (`Idproductreview`),
  ADD KEY `Idbarang` (`Idbarang`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idgroupuser` (`idgroupuser`);

--
-- Indexes for table `tblvideo`
--
ALTER TABLE `tblvideo`
  ADD PRIMARY KEY (`idvideo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `idbrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbldetailpenjualan`
--
ALTER TABLE `tbldetailpenjualan`
  MODIFY `iddetailpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblgambarproduct`
--
ALTER TABLE `tblgambarproduct`
  MODIFY `idgambarproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblgroupuser`
--
ALTER TABLE `tblgroupuser`
  MODIFY `idgroupuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblkategoripembayaran`
--
ALTER TABLE `tblkategoripembayaran`
  MODIFY `idkategoripembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblkategoriproduct`
--
ALTER TABLE `tblkategoriproduct`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproductreview`
--
ALTER TABLE `tblproductreview`
  MODIFY `Idproductreview` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbestoffer`
--
ALTER TABLE `tblbestoffer`
  ADD CONSTRAINT `tblbestoffer_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `tblproduct` (`idbarang`);

--
-- Constraints for table `tbldetailpenjualan`
--
ALTER TABLE `tbldetailpenjualan`
  ADD CONSTRAINT `tbldetailpenjualan_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `tblproduct` (`idbarang`),
  ADD CONSTRAINT `tbldetailpenjualan_ibfk_2` FOREIGN KEY (`usernamepembeli`) REFERENCES `tbluser` (`username`),
  ADD CONSTRAINT `tbldetailpenjualan_ibfk_3` FOREIGN KEY (`notapemesanan`) REFERENCES `tblpenjualan` (`notapemesanan`);

--
-- Constraints for table `tblgambarproduct`
--
ALTER TABLE `tblgambarproduct`
  ADD CONSTRAINT `tblgambarproduct_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `tblproduct` (`idbarang`);

--
-- Constraints for table `tblpenjualan`
--
ALTER TABLE `tblpenjualan`
  ADD CONSTRAINT `tblpenjualan_ibfk_1` FOREIGN KEY (`usernamepembeli`) REFERENCES `tbluser` (`username`),
  ADD CONSTRAINT `tblpenjualan_ibfk_2` FOREIGN KEY (`idkategoripembayaran`) REFERENCES `tblkategoripembayaran` (`idkategoripembayaran`);

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`idbrand`) REFERENCES `tblbrand` (`idbrand`),
  ADD CONSTRAINT `tblproduct_ibfk_2` FOREIGN KEY (`idkategori`) REFERENCES `tblkategoriproduct` (`idkategori`);

--
-- Constraints for table `tblproductreview`
--
ALTER TABLE `tblproductreview`
  ADD CONSTRAINT `tblproductreview_ibfk_1` FOREIGN KEY (`Idbarang`) REFERENCES `tblproduct` (`idbarang`),
  ADD CONSTRAINT `tblproductreview_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `tbluser` (`username`);

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`idgroupuser`) REFERENCES `tblgroupuser` (`idgroupuser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
