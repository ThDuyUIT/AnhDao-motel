-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 10:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2dty`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `pass`, `email`, `sdt`, `ten`) VALUES
('admin', 'admin', 'null', 'null', 'Người Quản Trị '),
('anhquantr123', 'anhquantr123', 'anhquan.lien123@gmail.com', '0868657618', ' Nguyễn Văn Quân'),
('thong', 'thong', 'nguyenthongth@gmail.com', '0123456789', 'Nguyễn Minh Thông');

-- --------------------------------------------------------

--
-- Table structure for table `dat_phong`
--

CREATE TABLE `dat_phong` (
  `ma_dat_phong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_vao` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_ra` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_phong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_lon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tre_em` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoi_gian_dat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_tien` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) DEFAULT 0,
  `thanh_toan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_phong`
--

INSERT INTO `dat_phong` (`ma_dat_phong`, `thoi_gian_vao`, `thoi_gian_ra`, `ma_phong`, `nguoi_lon`, `tre_em`, `ho_ten`, `email`, `sdt`, `ghichu`, `thoi_gian_dat`, `gia_tien`, `trang_thai`, `thanh_toan`) VALUES
('160622073744', '17/06/2022', '18/06/2022', '101', '2', '0', 'Nguyen Thanh', 'duy@gmail.com', '0129876', 'demo', '16/06/2022', '9999999', 1, 'Thanh Toán Sau'),
('260722233313', '26/07/2022', '26/07/2022', '102', '1', '0', 'Nguyen Thanh Duy', 'duy@gmail.com', '01298767179', 'No ghi chú', '26/07/2022', '9999999                                           ', 0, 'Thanh Toán Sau');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `ma_hinh_anh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_anh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hinh_anh` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anh`
--

INSERT INTO `hinh_anh` (`ma_hinh_anh`, `tieu_de`, `image_anh`, `id_hinh_anh`) VALUES
('banner', 'No_titel', 'banner2.jpg', '1610648317'),
('banner', 'No_titel', 'banner3.jpg', '1610648326'),
('banner', 'No_titel', 'banner4.jpg', '1610648336'),
('banner', 'No_titel', 'banner5.jpg', '1610648345'),
('banner', 'No_titel', 'banner6.jpg', '1610648360'),
('banner', 'No_titel', 'banner7.jpg', '1610648370'),
('phong1', 'No_titel', '57262850_2851679101516457_3755024593325129728_o.jpg', '1610657035'),
('phong1', 'No_titel', '69218146_3203398616344502_3609200025445335040_o.jpg', '1610657051'),
('phong1', 'No_titel', '44344443_2469446563073048_6756504231198326784_o.jpg', '1610657076'),
('phong2', 'No_titel', '69991210_3203398406344523_5713389441028980736_o.jpg', '1610657094'),
('phong2', 'No_titel', '34093493_2204171969600510_8926761513788637184_n (1).jpg', '1610657102'),
('phong2', 'No_titel', 'banner2.jpg', '1610657117'),
('phong3', 'No_titel', 'banner5.jpg', '1610663719'),
('phong3', 'No_titel', '3-2-696x696.png', '1610663731'),
('phong3', 'No_titel', '25158003_1776078816020962_852727154806233275_n.jpg', '1610663740'),
('phong4', 'room 4', 'banner6.jpg', '1655297689'),
('phong1', 'sqwqwq', '3-2-696x696.png', '1655298634'),
('vip', 'vip', '25158003_1776078816020962_852727154806233275_n.jpg', '1655301204'),
('phong1', 'eerere', 'banner7.jpg', '1655340252');

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `ho_ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_lien_he` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `ma_phong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_phong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_phong` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_hinh_anh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_thuoc_tinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suc_chua` int(11) DEFAULT 1,
  `tinh_trang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`ma_phong`, `ten_phong`, `noi_dung`, `gia_phong`, `ma_hinh_anh`, `ma_thuoc_tinh`, `suc_chua`, `tinh_trang`) VALUES
('101', '10ew', '   25m2 bao đẹp', '9999999', 'phong1', 'phong1', 33, 1),
('102', '102', '  bao đẹp', '9999999', 'phong2', 'phong2', 1, 1),
('103', '103', ' 25m2 view biển', '999999', 'phong3', 'phong3', 2, 0),
('105', '105', '', '9999999', 'vip', 'vip', 1, 0),
('106', '106', '', '3232323', 'phong4', 'phong4', 1, 0),
('111', '', '', '', 'vip', 'vip', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc_tinh`
--

CREATE TABLE `thuoc_tinh` (
  `ma_thuoc_tinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_thuoc_tinh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuoc_tinh`
--

INSERT INTO `thuoc_tinh` (`ma_thuoc_tinh`, `ten_thuoc_tinh`, `noi_dung`) VALUES
('phong1', 'Diện tích', '25 m2 view'),
('phong2', 'Diện tích ', '25m2'),
('phong3', 'Diện tích', '20m2 rộng rãi'),
('phong4', 'phòng loại 4', '30m2 view biển'),
('vip', 'vip', 'vippppppppp'),
('vipppppp', 'vipppp', 'bao ddep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Indexes for table `dat_phong`
--
ALTER TABLE `dat_phong`
  ADD PRIMARY KEY (`ma_dat_phong`),
  ADD KEY `ma_dat_phong` (`ma_dat_phong`),
  ADD KEY `ma_phong` (`ma_phong`);

--
-- Indexes for table `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`id_hinh_anh`),
  ADD KEY `ma_hinh_anh` (`ma_hinh_anh`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id_lien_he`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`),
  ADD KEY `ma_phong` (`ma_phong`,`ma_hinh_anh`,`ma_thuoc_tinh`),
  ADD KEY `kf_p_tt` (`ma_thuoc_tinh`),
  ADD KEY `kf_p_ha` (`ma_hinh_anh`);

--
-- Indexes for table `thuoc_tinh`
--
ALTER TABLE `thuoc_tinh`
  ADD PRIMARY KEY (`ma_thuoc_tinh`),
  ADD KEY `ma_thuoc_tinh` (`ma_thuoc_tinh`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dat_phong`
--
ALTER TABLE `dat_phong`
  ADD CONSTRAINT `kf_dp_p` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `kf_p_ha` FOREIGN KEY (`ma_hinh_anh`) REFERENCES `hinh_anh` (`ma_hinh_anh`),
  ADD CONSTRAINT `kf_p_tt` FOREIGN KEY (`ma_thuoc_tinh`) REFERENCES `thuoc_tinh` (`ma_thuoc_tinh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
