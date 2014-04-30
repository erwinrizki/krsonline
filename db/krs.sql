-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 11:33 PM
-- Server version: 5.5.33
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'cfe819bed5b34b02ccb68ab69ab2055b');

-- --------------------------------------------------------

--
-- Table structure for table `biku`
--

CREATE TABLE IF NOT EXISTS `biku` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biku`
--

INSERT INTO `biku` (`username`, `password`) VALUES
('biku', '403ffb6ffd770809737403d57a09eeef');

-- --------------------------------------------------------

--
-- Table structure for table `datapesan`
--

CREATE TABLE IF NOT EXISTS `datapesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `dari` varchar(50) NOT NULL,
  `ke` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `datapesan`
--

INSERT INTO `datapesan` (`id_pesan`, `dari`, `ke`, `subject`, `isi`, `tanggal`) VALUES
(9, 'A11.2011.06303', 'A11.2011.06300', 'halo', 'lagi apa?', '2014-01-13 20:38:01'),
(10, 'A11.2011.06303', 'A11.2011.06300', 'halo', 'udah maem belum?', '2014-01-13 20:38:17'),
(11, 'A11.2011.06300', 'A11.2011.06303', 'halo jg', 'udah maem kok, km udah maem belum? :*', '2014-01-13 20:39:48'),
(12, 'A11.2011.06295', 'A11.2011.06303', 'halo', 'jadwalmu piye wae?', '2014-01-14 10:43:50'),
(13, 'A11.2011.06295', 'A11.2011.06303', 'halo', 'aku wenehi jadwalmu ah', '2014-01-14 10:44:14'),
(14, 'A11.2011.06303', 'A11.2011.06295', 'halo', 'wis tak kirim nang fb lan jadwalku', '2014-01-14 10:45:31'),
(15, 'A11.2011.06303', '0686.11.2011.024', 'tanya pak', 'halo pak erwin', '2014-01-14 10:46:26'),
(16, '0686.11.2011.024', 'A11.2011.06303', 'iya', 'iya, mau tanya apa?', '2014-01-14 10:47:40'),
(17, 'A11.2011.06303', '0686.11.2011.024', 'tanya', 'bapak ngajar matkul apa aja?', '2014-01-14 10:56:06'),
(18, '0686.11.2011.024', 'A11.2011.06303', 'iya', 'saya ngajar pemrograman internet', '2014-01-14 10:57:06'),
(19, '0686.11.2011.024', 'A11.2011.06303', 'testing', 'sementara cuma itu', '2014-01-14 10:58:04'),
(20, '0686.11.2011.024', '0686.11.2011.124', 'halo', 'halo pak :D', '2014-01-14 10:58:51'),
(21, '0686.11.2011.124', '0686.11.2011.024', 'halo', 'halo jg pak, apa kabar? :D', '2014-01-14 10:59:42'),
(22, 'A11.2011.06303', 'A11.2011.07823', 'testing', 'hahahahaha', '2014-01-14 11:22:04'),
(23, 'A11.2011.07823', 'A11.2011.06303', 'y', 'y', '2014-01-14 11:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE IF NOT EXISTS `data_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kodemk` varchar(20) NOT NULL,
  `kelompok` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jammulai` varchar(20) NOT NULL,
  `jamselesai` varchar(20) NOT NULL,
  `kuota` int(11) NOT NULL,
  `koderuang` varchar(20) NOT NULL,
  `hari2` varchar(11) NOT NULL,
  `jammulai2` varchar(11) NOT NULL,
  `jamselesai2` varchar(11) NOT NULL,
  `koderuang2` varchar(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `kodemk`, `kelompok`, `hari`, `jammulai`, `jamselesai`, `kuota`, `koderuang`, `hari2`, `jammulai2`, `jamselesai2`, `koderuang2`) VALUES
(1, 'A11.45501', 'A11.4501U', 'Senin', '07.00', '09.30', 45, 'D5.1', '-', '-', '-', '-'),
(25, 'A11.45501', 'A11.4502B', 'Selasa', '07.00', '09.30', 45, 'D5.1', '-', '-', '-', '-'),
(26, 'A11.45501', 'A11.4503', 'Senin', '09.30', '12.00', 45, 'D5.1', '-', '-', '-', '-'),
(27, 'A11.45501', 'A11.4504', 'Selasa', '09.30', '12.00', 44, 'D5.1', '-', '-', '-', '-'),
(34, 'A11.45501', 'A11.4506', 'Senin', '09.30', '12.00', 43, 'D5.2', '-', '-', '-', '-'),
(35, 'A11.45505', 'A11.4501U', 'Rabu', '07.00', '09.30', 44, 'D5.3', '-', '-', '-', '-'),
(37, 'A11.45506', 'A11.4501U', 'Rabu', '09.30', '12.00', 44, 'D5.3', '-', '-', '-', '-'),
(38, 'A11.45505', 'A11.4502B', 'Senin', '07.00', '09.30', 45, 'D5.3', '-', '-', '-', '-'),
(39, 'A11.45506', 'A11.4502B', 'Senin', '07.00', '09.30', 45, 'D5.4', '-', '-', '-', '-'),
(40, 'A11.45301', 'A11.4301', 'Senin', '08.40', '10.20', 45, 'D5.5', '-', '-', '-', '-'),
(41, 'A11.45301', 'A11.4302', 'Senin', '10.20', '12.00', 44, 'D5.5', '-', '-', '-', '-'),
(44, 'A11.45502', 'A11.4501U', 'Kamis', '07.00', '09.30', 45, 'D5.1', '-', '-', '-', '-'),
(45, 'A11.45101', 'A11.4113', 'Kamis', '08.40', '10.20', 44, 'D4.11', 'Jumat', '14.10', '16.20', 'D2.H'),
(46, 'A11.45101', 'A11.4101', 'Rabu', '08.40', '10.20', 45, 'D4.11', 'Selasa', '08.40', '10.20', 'D2.H'),
(47, 'A11.45101', 'A11.4102', 'Kamis', '10.20', '12.00', 45, 'D4.11', 'Rabu', '07.00', '08.40', 'D2.H'),
(48, 'A11.45101', 'A11.4103', 'Kamis', '07.00', '08.40', 45, 'D4.11', 'Selasa', '10.20', '12.00', 'D2.H'),
(49, 'A11.45502', 'A11.4502B', 'Kamis', '12.30', '15.00', 44, 'D4.12', '-', '-', '-', '-'),
(50, 'A11.45305', 'A11.4301U', 'Selasa', '07.00', '08.40', 45, 'D4.5', 'Jumat', '07.00', '08.40', 'D2.H'),
(51, 'A11.45802', 'A11.4801', 'Rabu', '09.30', '12.00', 45, 'D4.10', '-', '-', '-', '-'),
(52, 'A11.45504', 'A11.4501U', 'Senin', '07.00', '09.30', 44, 'D5.6', '-', '-', '-', '-'),
(53, 'A11.45801', 'A11.4803', 'Kamis', '09.30', '12.00', 44, 'D5.3', '-', '-', '-', '-'),
(54, 'A11.45704', 'A11.4704', 'Rabu', '09.30', '12.00', 45, 'D5.6', '-', '-', '-', '-'),
(55, 'A11.45305', 'A11.4303', 'Kamis', '07.00', '08.40', 45, 'D4.5', 'Senin', '10.20', '12.00', 'D2.H'),
(56, 'A11.45504', 'A11.4503', 'Selasa', '09.30', '12.00', 45, 'D4.8', '-', '-', '-', '-'),
(57, 'A11.45801', 'A11.4802', 'Kamis', '12.30', '15.00', 45, 'D4.8', '-', '-', '-', '-'),
(58, 'A11.45704', 'A11.4702', 'Selasa', '12.30', '15.00', 45, 'D5.4', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwaldosen`
--

CREATE TABLE IF NOT EXISTS `data_jadwaldosen` (
  `id_ajar` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ajar`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `data_jadwaldosen`
--

INSERT INTO `data_jadwaldosen` (`id_ajar`, `id_jadwal`, `nip`) VALUES
(3, 45, '0686.11.2011.123'),
(4, 46, '0686.11.2011.123'),
(5, 1, '0686.11.2011.024'),
(6, 26, '0686.11.2011.024'),
(7, 44, '0686.11.2011.125'),
(8, 37, '0686.11.2011.125'),
(9, 49, '0686.11.2011.125'),
(13, 55, '0686.11.2011.124');

-- --------------------------------------------------------

--
-- Table structure for table `data_keuangan`
--

CREATE TABLE IF NOT EXISTS `data_keuangan` (
  `id_keuangan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `kewajiban` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_keuangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `data_keuangan`
--

INSERT INTO `data_keuangan` (`id_keuangan`, `id`, `kewajiban`, `status`) VALUES
(1, 6, 2200000, 'Terbayar'),
(2, 2, 2200000, 'Terbayar'),
(3, 5, 2200000, 'Belum Terbayar'),
(4, 3, 2200000, 'Belum Terbayar'),
(5, 7, 2200000, 'Belum Terbayar'),
(7, 8, 2200000, 'Belum Terbayar'),
(8, 12, 2200000, 'Terbayar');

-- --------------------------------------------------------

--
-- Table structure for table `data_krsmhs`
--

CREATE TABLE IF NOT EXISTS `data_krsmhs` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  PRIMARY KEY (`id_krs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `data_krsmhs`
--

INSERT INTO `data_krsmhs` (`id_krs`, `id_jadwal`, `NIM`) VALUES
(2, 35, 'A11.2011.06303'),
(4, 37, 'A11.2011.06303'),
(5, 49, 'A11.2011.06303'),
(6, 45, 'A11.2011.07823'),
(7, 52, 'A11.2011.06303'),
(8, 27, 'A11.2011.06303'),
(9, 53, 'A11.2011.06303'),
(10, 41, 'A11.2011.06303');

-- --------------------------------------------------------

--
-- Table structure for table `data_matkul`
--

CREATE TABLE IF NOT EXISTS `data_matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `tp` varchar(5) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `data_matkul`
--

INSERT INTO `data_matkul` (`id_matkul`, `kodemk`, `namamk`, `sks`, `tp`, `semester`) VALUES
(1, 'A11.45501', 'Pemrograman Internet', 3, 'T', 5),
(2, 'A11.45505', 'Sistem Basis Data', 3, 'T', 5),
(4, 'A11.45506', 'Rekayasa Perangkat Lunak Lanjut', 3, 'T', 5),
(5, 'A11.45502', 'Sistem Informasi', 3, 'T', 5),
(7, 'A11.45504', 'Jaringan Komputer', 3, 'T', 5),
(8, 'A11.45801', 'Data Mining', 3, 'T', 7),
(9, 'A11.45704', 'Manajemen Proyek', 3, 'T', 7),
(10, 'A11.45301', 'Agama Kristen', 2, 'T', 3),
(11, 'A11.45101', 'Dasar Pemrograman', 4, 'T/P', 1),
(12, 'A11.45305', 'Struktur Data', 4, 'T/P', 3),
(13, 'A11.45802', 'Software Quality And Testing', 3, 'T', 8);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengumuman`
--

CREATE TABLE IF NOT EXISTS `data_pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_pengumuman`
--

INSERT INTO `data_pengumuman` (`id`, `judul`, `author`, `isi`) VALUES
(1, 'Jadwal Input KRS Ganjil 2013-2014', 'Admin', 'Diberitahukan bahwa jadwal input KRS semester ganjil dimulai pada tanggal 31 Agustus 2013'),
(2, 'Jadwal Input KRS Ganjil Teknik Informatika S1', 'Kaprodi TI S1', 'Input KRS TI S1 Ganjil dimulai jam 8 pagi');

-- --------------------------------------------------------

--
-- Table structure for table `data_ruang`
--

CREATE TABLE IF NOT EXISTS `data_ruang` (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `koderuang` varchar(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `data_ruang`
--

INSERT INTO `data_ruang` (`id_ruang`, `koderuang`, `kapasitas`) VALUES
(1, 'D5.1', 45),
(3, 'D5.2', 50),
(4, 'D5.3', 45),
(5, 'D5.4', 45),
(6, 'D5.5', 45),
(7, 'D5.6', 45),
(8, 'D4.11', 50),
(9, 'D2.H', 45),
(10, 'D4.12', 45),
(11, 'D4.1', 50),
(12, 'D4.2', 50),
(13, 'D4.3', 50),
(14, 'D4.4', 50),
(15, 'D4.5', 50),
(16, 'D4.6', 50),
(17, 'D4.7', 50),
(18, 'D4.8', 50),
(19, 'D4.9', 50),
(20, 'D4.10', 50);

-- --------------------------------------------------------

--
-- Table structure for table `data_waktu`
--

CREATE TABLE IF NOT EXISTS `data_waktu` (
  `id_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data_waktu`
--

INSERT INTO `data_waktu` (`id_waktu`, `tanggal`, `jam`) VALUES
(4, '2013-12-15', '08.00');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `password`) VALUES
(2, '0686.11.2011.125', 'Bambang, M.T', 'jajal'),
(3, '0686.11.2011.024', 'Erwin Rizki Ariyanto, S.Kom, M.T.', 'jajal'),
(4, '0686.11.2011.123', 'Paijo, M.Kom', 'paijo'),
(5, '0686.11.2011.124', 'Paidi', 'paidi');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE IF NOT EXISTS `log_login` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`idlog`, `username`, `password`, `ip`, `login_terakhir`) VALUES
(1, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:25:52'),
(2, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:33:46'),
(3, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:37:17'),
(4, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:38:19'),
(5, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:38:42'),
(6, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:39:09'),
(7, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-06 08:39:35'),
(8, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-14 08:55:32'),
(9, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-14 11:13:08'),
(10, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-16 09:43:27'),
(11, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-16 20:52:20'),
(12, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-16 21:07:42'),
(13, 'admin', 'cfe819bed5b34b02ccb68ab69ab2055b', '127.0.0.1', '2014-01-16 21:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_biku`
--

CREATE TABLE IF NOT EXISTS `log_login_biku` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `log_login_biku`
--

INSERT INTO `log_login_biku` (`idlog`, `username`, `password`, `ip`, `login_terakhir`) VALUES
(2, 'biku', '403ffb6ffd770809737403d57a09eeef', '127.0.0.1', '2014-01-06 08:21:10'),
(4, 'biku', '403ffb6ffd770809737403d57a09eeef', '127.0.0.1', '2014-01-06 08:54:09'),
(5, 'biku', '403ffb6ffd770809737403d57a09eeef', '127.0.0.1', '2014-01-14 11:17:07'),
(6, 'biku', '403ffb6ffd770809737403d57a09eeef', '127.0.0.1', '2014-01-14 11:20:00'),
(7, 'biku', '403ffb6ffd770809737403d57a09eeef', '127.0.0.1', '2014-01-16 21:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_dosen`
--

CREATE TABLE IF NOT EXISTS `log_login_dosen` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `log_login_dosen`
--

INSERT INTO `log_login_dosen` (`idlog`, `username`, `password`, `ip`, `login_terakhir`) VALUES
(3, '0686.11.2011.024', 'jajal', '127.0.0.1', '2014-01-14 10:47:15'),
(4, '0686.11.2011.024', 'jajal', '127.0.0.1', '2014-01-14 10:54:59'),
(5, '0686.11.2011.024', 'jajal', '127.0.0.1', '2014-01-14 10:56:33'),
(6, '0686.11.2011.124', 'paidi', '127.0.0.1', '2014-01-14 10:59:20'),
(7, '0686.11.2011.024', 'jajal', '127.0.0.1', '2014-01-16 21:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_mhs`
--

CREATE TABLE IF NOT EXISTS `log_login_mhs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `log_login_mhs`
--

INSERT INTO `log_login_mhs` (`idlog`, `username`, `password`, `ip`, `login_terakhir`) VALUES
(1, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-06 08:26:26'),
(2, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-06 08:44:26'),
(3, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-06 08:47:01'),
(4, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-13 20:19:25'),
(5, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-13 20:30:55'),
(6, 'A11.2011.06300', 'asdf', '127.0.0.1', '2014-01-13 20:39:08'),
(7, 'A11.2011.06295', 'alan', '127.0.0.1', '2014-01-14 10:41:25'),
(8, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-14 10:44:34'),
(9, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-14 10:48:59'),
(10, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-14 10:55:34'),
(11, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-14 11:11:18'),
(12, 'A11.2011.07823', 'terserah', '127.0.0.1', '2014-01-14 11:20:27'),
(13, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-14 11:21:31'),
(14, 'A11.2011.07823', 'terserah', '127.0.0.1', '2014-01-14 11:22:26'),
(15, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-16 09:29:37'),
(16, 'A11.2011.06436', 'maho', '127.0.0.1', '2014-01-16 09:34:16'),
(17, 'A11.2011.05863', 'tommy', '127.0.0.1', '2014-01-16 09:34:47'),
(18, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-16 21:04:36'),
(19, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-16 21:09:36'),
(20, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-16 21:11:07'),
(21, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-19 10:34:18'),
(22, 'A11.2011.06436', 'maho', '127.0.0.1', '2014-01-19 10:45:45'),
(23, 'A11.2011.06303', 'jajal', '127.0.0.1', '2014-01-19 10:46:07'),
(24, 'A11.2011.06300', 'asdf', '127.0.0.1', '2014-01-19 10:46:24'),
(25, 'a11.2011.05839', 'keepsmile', '127.0.0.1', '2014-01-19 10:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE IF NOT EXISTS `mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Progdi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `NIM`, `Nama`, `Password`, `Progdi`) VALUES
(2, 'A11.2011.06300', 'Dewa Ade Andrea', 'asdf', 'Teknik Informatika S1'),
(3, 'A11.2011.05863', 'Tommy Kusuma', 'tommy', 'Teknik Informatika S1'),
(6, 'A11.2011.06303', 'Erwin Rizki Ariyanto', 'jajal', 'Teknik Informatika S1'),
(8, 'A11.2011.05839', 'Miftakhun Niam', 'keepsmile', 'Teknik Informatika S1'),
(9, 'A11.2011.06396', 'Azka Ghausta', 'azka', 'Teknik Informatika S1'),
(10, 'A11.2011.06295', 'Alan Pramudika', 'alan', 'Teknik Informatika S1'),
(11, 'A11.2011.06436', 'Fadhel', 'maho', 'Teknik Informatika S1'),
(12, 'A11.2011.07823', 'Angelita', 'terserah', 'Teknik Informatika S1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
