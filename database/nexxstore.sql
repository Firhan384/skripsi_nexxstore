-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2021 at 03:28 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nexxstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `id_pemasok` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `nama_pemasok` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_pemasok`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=252556 ;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `id_user`, `nama_pemasok`, `alamat`, `email`, `no_telp`) VALUES
(252555, 200699, 'A', 'a', 'A', '0002122');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `stok_barang` int(7) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210822 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_barang`, `nama_barang`, `stok_barang`, `jumlah`) VALUES
(210821, 2, 200801, 'Mr Muscle Granit 400ml', 2, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE IF NOT EXISTS `stok_barang` (
  `id_barang` int(6) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `stok_barang` int(7) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(6) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200700 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `no_hp`, `username`, `password`, `status`) VALUES
(200698, 'Staff Admin Gudang', 'dian@gmial.com', '081258585858', '200698', 'dian', ''),
(2, 'Andrianto Hadi Saputra', 'andri@gmail.com', '081285402068', '200615', 'andri', ''),
(3, 'Dwi Handayani', 'dwi@yahoo.co.id', '081285402020', 'dwi', 'dwi', ''),
(4, 'Agus Ujang Riyanto', 'agus@gmail.com', '085947541258', 'agus', 'agus', ''),
(5, 'Fairuziah Irhas', 'ziah@yahoo.co.id', '087885627656', 'ziah', 'ziah', ''),
(7, 'dian fitriani', 'dianfitri@gmail.com', '081258585858', 'dianf', 'dianf', ''),
(8, 'Morent', '123456987@yahoo.com', '02154878896', 'morent', 'morent', ''),
(9, 'Andrianto Hadi Saputra', 'andri@gmail.com', '081285402068', '200615', 'andri', ''),
(200699, 'Arsyila Shaqueena', 'arsyila@yahoo.com', '087885627656', 'syila', 'syila', 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
