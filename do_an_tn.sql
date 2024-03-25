-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 06:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `do_an_tn`
--

-- --------------------------------------------------------

--
-- Table structure for table `ql_ca`
--

CREATE TABLE IF NOT EXISTS `ql_ca` (
`Stt_ca` int(11) NOT NULL,
  `id_cty` int(11) NOT NULL,
  `name_ca` varchar(30) NOT NULL,
  `time_on` varchar(30) NOT NULL,
  `time_out` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ql_ca`
--

INSERT INTO `ql_ca` (`Stt_ca`, `id_cty`, `name_ca`, `time_on`, `time_out`) VALUES
(1, 10000, 'Ca sáng', '08:00', '11:30'),
(2, 10000, 'Ca chiều', '13:30', '17:30'),
(3, 10000, 'Ca tối', '18:00', '22:00'),
(10, 10000, 'Ca đêm', '22:10', '23:10');

-- --------------------------------------------------------

--
-- Table structure for table `ql_chamcong`
--

CREATE TABLE IF NOT EXISTS `ql_chamcong` (
  `id_nv` int(11) NOT NULL,
  `id_cty` int(11) NOT NULL,
  `thoigian` varchar(30) NOT NULL,
  `ca_vao` int(2) NOT NULL,
  `ca_ra` int(2) NOT NULL,
`STT` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ql_chamcong`
--

INSERT INTO `ql_chamcong` (`id_nv`, `id_cty`, `thoigian`, `ca_vao`, `ca_ra`, `STT`) VALUES
(3, 10000, '2023-12-22 18:20:31', 0, 1, 1),
(2, 10000, '2023-12-22 18:10:20', 0, 1, 2),
(3, 10000, '2023-12-22 7:45:36', 1, 0, 3),
(2, 10000, '2023-12-22 7:42:51', 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ql_luong`
--

CREATE TABLE IF NOT EXISTS `ql_luong` (
`STT` int(11) NOT NULL,
  `id_nv` int(11) NOT NULL,
  `luong` varchar(30) NOT NULL,
  `phantram` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ql_luong`
--

INSERT INTO `ql_luong` (`STT`, `id_nv`, `luong`, `phantram`) VALUES
(1, 1, '10000000', '100'),
(2, 2, '0', '100'),
(3, 3, '5000000', '100'),
(4, 4, '7000000', '80');

-- --------------------------------------------------------

--
-- Table structure for table `ql_phongban`
--

CREATE TABLE IF NOT EXISTS `ql_phongban` (
`id_phong` int(11) NOT NULL,
  `id_cty` int(11) NOT NULL,
  `name_phong` varchar(50) NOT NULL,
  `mota` varchar(100) NOT NULL,
  `truongphong` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77135 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ql_phongban`
--

INSERT INTO `ql_phongban` (`id_phong`, `id_cty`, `name_phong`, `mota`, `truongphong`) VALUES
(1, 10000, 'Phòng kỹ thuật 1', 'Sử lý các vấn đề về ký thuật nói chung 1', 'Nguyễn Đăng Sơn'),
(2, 10000, 'Phòng nhân sự', 'Sử lý các vấn đề về nhân sự', 'Nguyễn Thị C'),
(3, 10000, 'Phòng kinh doanh', 'Kinh doanh các sản phẩm của công ty', 'Nguyễn Thị D'),
(77134, 10000, 'Phòng 3', '8894', 'Nguyễn Văn B');

-- --------------------------------------------------------

--
-- Table structure for table `user_cty`
--

CREATE TABLE IF NOT EXISTS `user_cty` (
`id_cty` int(11) NOT NULL,
  `name_cty` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cty`
--

INSERT INTO `user_cty` (`id_cty`, `name_cty`, `email`, `sdt`, `password`, `diachi`) VALUES
(10000, 'Công ty TNHH Roobii', 'roobii@gmail.com', '0987654999', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội'),
(10001, 'test', 'test@gmail.com', '0987654888', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `user_nv`
--

CREATE TABLE IF NOT EXISTS `user_nv` (
`id_nv` int(11) NOT NULL,
  `id_cty` int(11) NOT NULL,
  `name_nv` varchar(50) NOT NULL,
  `sdt_nv` varchar(20) NOT NULL,
  `email_nv` varchar(100) NOT NULL,
  `passwords_nv` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `chucvu` varchar(20) NOT NULL,
  `duyet` int(2) NOT NULL,
  `diachi` text NOT NULL,
  `congviec` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_nv`
--

INSERT INTO `user_nv` (`id_nv`, `id_cty`, `name_nv`, `sdt_nv`, `email_nv`, `passwords_nv`, `sex`, `birthday`, `id_phong`, `chucvu`, `duyet`, `diachi`, `congviec`) VALUES
(1, 10000, 'Nguyễn Đăng Sơn', '0987654321', 'son@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nam', '20/03/2001', 1, 'Trưởng phòng', 1, 'Hà Nội', 'dev php'),
(2, 10000, 'Nguyễn Văn A', '0987654322', 'vana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nam', '21/05/1998', 0, '0', 0, 'Hà Nội', 'dev web'),
(3, 10000, 'Nguyễn Văn B', '0987654323', 'vanb@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nam', '11/04/1999', 77134, 'Trưởng phòng', 1, 'Hải Phòng', 'dev php'),
(4, 10000, 'Nguyễn Thị C', '0987654324', 'thic@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nam', '28/08/1996', 77134, 'Trưởng phòng', 1, 'Hà Nội', 'Quản lý nhân sự'),
(6, 10001, 'Nguyễn Văn Đ', '0987654330', 'vandd@gmail.com', 'defac44447b57f152d14f30cea7a73cb', 'Nam', '25/05/1998', 0, 'nhân viên', 1, 'Hà Nội', 'dev app'),
(7, 10000, 'Nguyễn Hoàng An', '098765473', 'an123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nam', '11/04/1999', 0, '0', 0, 'Hưng Yên', 'Dev JS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ql_ca`
--
ALTER TABLE `ql_ca`
 ADD PRIMARY KEY (`Stt_ca`);

--
-- Indexes for table `ql_chamcong`
--
ALTER TABLE `ql_chamcong`
 ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `ql_luong`
--
ALTER TABLE `ql_luong`
 ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `ql_phongban`
--
ALTER TABLE `ql_phongban`
 ADD PRIMARY KEY (`id_phong`), ADD UNIQUE KEY `id_phong` (`id_phong`);

--
-- Indexes for table `user_cty`
--
ALTER TABLE `user_cty`
 ADD PRIMARY KEY (`id_cty`), ADD UNIQUE KEY `id_cty` (`id_cty`);

--
-- Indexes for table `user_nv`
--
ALTER TABLE `user_nv`
 ADD PRIMARY KEY (`id_nv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ql_ca`
--
ALTER TABLE `ql_ca`
MODIFY `Stt_ca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ql_chamcong`
--
ALTER TABLE `ql_chamcong`
MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ql_luong`
--
ALTER TABLE `ql_luong`
MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ql_phongban`
--
ALTER TABLE `ql_phongban`
MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77135;
--
-- AUTO_INCREMENT for table `user_cty`
--
ALTER TABLE `user_cty`
MODIFY `id_cty` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `user_nv`
--
ALTER TABLE `user_nv`
MODIFY `id_nv` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
