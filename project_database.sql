-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 02:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkc_a&a_db`
--
CREATE DATABASE IF NOT EXISTS `bkc_a&a_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bkc_a&a_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `cap_bac` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ten`, `username`, `password`, `cap_bac`) VALUES
(4, 'Nguyễn Ất Minh', 'admin1', '202cb962ac59075b964b07152d234b70', 1),
(5, 'Lê Văn Ất Minh', 'admin2', '202cb962ac59075b964b07152d234b70', 0),
(6, 'password are 123', 'admin3', '202cb962ac59075b964b07152d234b70', 0),
(7, 'Nguyen A', 'admin4', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `ten_danh_muc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `parent_id`, `ten_danh_muc`) VALUES
(1, NULL, 'Art'),
(2, NULL, 'Furniture'),
(3, NULL, 'Jewelry'),
(4, NULL, 'Fashion'),
(5, NULL, 'Coin'),
(6, NULL, 'Collection'),
(7, 1, 'Drawing'),
(8, 1, 'Photography'),
(9, 1, 'Sculpture'),
(10, 1, 'Painting'),
(11, 2, 'Bedframe'),
(12, 2, 'Seating'),
(13, 2, 'Table'),
(14, 2, 'Wardrobe'),
(15, 3, 'Bracelet'),
(16, 3, 'Pin'),
(17, 3, 'Ring'),
(18, 3, 'Watch'),
(19, 3, 'Earrings'),
(20, 3, 'Necklace'),
(21, 4, 'Dress'),
(22, 4, 'Jacket'),
(23, 4, 'Shirt'),
(24, 4, 'Pants'),
(25, 4, 'Skirt'),
(26, 4, 'Suit'),
(27, 4, 'Vest'),
(28, 4, 'Sweater'),
(29, 4, 'Belt'),
(30, 4, 'Eyeglasses'),
(31, 4, 'Pocket square'),
(32, 4, 'Purse'),
(33, 4, 'Necktie'),
(34, 4, 'Shoes'),
(35, 4, 'Scarve'),
(36, 4, 'Wallet'),
(37, 6, 'Book'),
(38, 6, 'Camera'),
(39, 6, 'Stamp'),
(40, 6, 'Toy & hobby');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `id_khach_hang` int(11) DEFAULT NULL,
  `ngay_tao` datetime NOT NULL,
  `ten` varchar(100) NOT NULL COMMENT 'Tên người nhận',
  `sdt` varchar(13) NOT NULL COMMENT 'Số điện thoại người nhận',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email người nhận, ko bắt buộc',
  `dia_chi` text NOT NULL COMMENT 'Địa chỉ người nhận',
  `ghi_chu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_khach_hang`, `ngay_tao`, `ten`, `sdt`, `email`, `dia_chi`, `ghi_chu`) VALUES
(10, 1, '2021-06-12 16:52:04', 'Nguyễn Thành Thuận', '912345678', 'thuanthuan@gmail.com', '12 Đại Hoàng 1st street (mk là 1->6)', '');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id_san_pham` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_hang_chi_tiet`
--

INSERT INTO `don_hang_chi_tiet` (`id_san_pham`, `id_don_hang`, `so_luong`, `thanh_tien`) VALUES
(101, 10, 1, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `id` int(11) NOT NULL,
  `ten_hang` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`id`, `ten_hang`) VALUES
(16, 'Đang cập nhật'),
(17, 'USA'),
(18, 'China'),
(19, 'Asia'),
(20, 'Europe');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` float NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_khach_hang` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `sdt` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dia_chi` varchar(128) DEFAULT NULL,
  `phuong` varchar(50) DEFAULT NULL,
  `quan` varchar(50) DEFAULT NULL,
  `tinh` varchar(50) DEFAULT NULL,
  `ten_kh` varchar(128) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_khach_hang`, `username`, `password`, `sdt`, `email`, `dia_chi`, `phuong`, `quan`, `tinh`, `ten_kh`, `ngay_sinh`) VALUES
(1, 'thuan123', 'e10adc3949ba59abbe56e057f20f883e', '912345678', 'thuanthuan@gmail.com', '12 Đại Hoàng 1st street (mk là 1->6)', 'Đại Hoàng', 'Lục Thạch', 'Vãn Linh', 'Nguyễn Thành Thuận', '1999-12-11'),
(2, 'huyhoang1', '202cb962ac59075b964b07152d234b70', '', '', 'MK la 123', '', '', '', '', '0000-00-00'),
(3, 'abc', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(128) NOT NULL,
  `gia` int(11) NOT NULL,
  `gia_nhap` int(128) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `bao_hanh` int(3) DEFAULT NULL,
  `hinh_anh` varchar(200) DEFAULT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `id_hang` int(11) NOT NULL,
  `mo_ta` varchar(1000) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `gia_nhap`, `ngay_nhap`, `bao_hanh`, `hinh_anh`, `id_danh_muc`, `id_hang`, `mo_ta`, `status`) VALUES
(101, 'Sách cũ 1A', 700000, 120000, '2015-09-22', 6, '../../images/product-picture/no_pic.png', 37, 16, NULL, 0),
(102, 'Rabbit sculpture', 12000000, 9600000, '2019-07-10', 12, '../../images/product-picture/sculpture.jpg', 9, 16, NULL, 1),
(103, 'Sách cũ 21C', 140000, 56000, '2020-09-17', 6, '../../images/product-picture/book.jpg', 37, 16, NULL, 1),
(104, 'Sách cũ 1B', 2100000, 1350000, '2020-02-14', 6, '../../images/product-picture/book.jpg', 37, 16, NULL, 0),
(105, 'bracelet XIX', 208000000, 146000000, '2015-02-28', 18, '../../images/product-picture/bracelet.jpg', 15, 16, NULL, 1),
(106, 'Sculpture XX', 22000000, 18000000, '2017-11-30', 12, '../../images/product-picture/sculpture.jpg', 9, 16, NULL, 1),
(107, 'Drawing Antique', 1225000000, 895000000, '2019-07-23', 6, '../../images/product-picture/no_pic.png', 7, 16, NULL, 1),
(108, 'Picture in XX', 367000000, 286000000, '2020-12-25', 18, '../../images/product-picture/photograph.jpg', 8, 16, NULL, 1),
(109, 'Charles Burchfield (American, 1893-1967) Doodle', 4230000, 3250000, '2020-01-07', 12, '../../images/product-picture/no_pic.png', 7, 17, NULL, 1),
(110, 'Drawing of a Female, 19th C.', 3000000, 2100000, '2019-10-22', 18, '../../images/product-picture/drawing.jpg', 7, 16, NULL, 1),
(111, 'Native American Zuni Sterling Turquoise Cuff', 3100000, 2180000, '2019-02-07', 0, '../../images/product-picture/bracelet.jpg', 15, 17, NULL, 1),
(112, 'Sách cũ XX', 2100000, 1680000, '2021-03-23', 18, '../../images/product-picture/book.jpg', 37, 17, NULL, 1),
(113, 'Toy train set', 350000000, 26000000, '2017-06-20', 18, '../../images/product-picture/toy.jpg', 40, 16, NULL, 1),
(114, 'Toy set B old', 12000000, 9600000, '2021-01-20', 6, '../../images/product-picture/toy.jpg', 40, 16, NULL, 1),
(115, 'Jacket 11', 45000000, 31000000, '2021-06-08', 12, '../../images/product-picture/jacket.jpg', 22, 18, NULL, 1),
(116, 'Jacket 18', 18000000, 14400000, '2021-05-07', 6, '../../images/product-picture/jacket.jpg', 22, 16, NULL, 1),
(117, 'bracelet XIX 2', 2300000, 1480000, '2021-05-14', 12, '../../images/product-picture/bracelet.jpg', 15, 17, NULL, 1),
(118, 'Sách XX2', 1200000, 586000, '2021-04-15', 0, '../../images/product-picture/book.jpg', 37, 18, NULL, 1),
(119, '18TH CENTURY 15-DRAWER APOTHECARY', 5200000, 4300000, '2021-02-09', 8, '../../images/product-picture/no_pic.png', 14, 16, NULL, 0),
(120, 'Wardrobe XX', 19000000, 15600000, '2019-12-02', 12, '../../images/product-picture/wardrobe.jpg', 14, 18, NULL, 0),
(121, 'Bedframe 1H', 5000000, 4300000, '2019-12-02', 12, '../../images/product-picture/no_pic.png', 11, 18, NULL, 1),
(122, 'Chair 23A', 12000000, 9500000, '2021-06-12', 12, '../../images/product-picture/no_pic.png', 12, 17, NULL, 1),
(123, 'Painting 1A', 19000000, 12300000, '2020-05-20', 6, '../../images/product-picture/photograph.jpg', 10, 16, NULL, 0),
(124, 'Wardrobe 2003', 1200000, 900000, '2020-09-17', 12, '../../images/product-picture/wardrobe.jpg', 14, 18, NULL, 0),
(125, 'Old vest 2H', 2300000, 1500000, '2019-06-24', 6, '../../images/product-picture/artifact.jpg', 27, 19, NULL, 0),
(126, 'Necklace 1LX', 1000000, 560000, '2021-06-10', 6, '../../images/product-picture/artifact.jpg', 20, 16, NULL, 1),
(127, 'Dress 3G', 600000, 245000, '2019-05-24', 12, '../../images/product-picture/jacket.jpg', 21, 19, NULL, 0),
(128, 'Book 9A', 120000, 35000, '2020-12-05', 12, '../../images/product-picture/book.jpg', 37, 20, NULL, 1),
(129, 'Sách XX1b', 1500000, 700000, '2021-01-08', 24, '../../images/product-picture/no_pic.png', 37, 20, NULL, 1),
(130, 'Coin collection from China', 15000000, 11200000, '2020-09-30', 12, '../../images/product-picture/no_pic.png', 1, 18, NULL, 1),
(131, 'Sách cũ 8J', 300000, 120000, '2020-09-06', 6, '../../images/product-picture/book.jpg', 37, 16, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `su_kien`
--

CREATE TABLE `su_kien` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `su_kien`
--

INSERT INTO `su_kien` (`id`, `title`, `date`, `location`, `description`, `status`) VALUES
(1, 'BKC 2021 first open', '2021-01-07', '88, Ta Quang Buu, Bach Khoa, Hai Ba Trung, Hanoi', 'First auction in 2021, will have a lot products', 1),
(6, 'BKC last 2020 auction', '2020-12-24', 'Berlin', 'Last event in 2021!!!!', 0),
(7, 'Action spring', '2021-02-16', 'Bordeaux', 'Event ', 0),
(8, 'BKC New Fall auction', '2020-08-14', '19 Bordeaux ', 'New fall event. Will have some great artifact to purchase', 0),
(9, 'BKC mid summer event', '2021-06-15', '12 Hòa Mỹ, Phụng Hiệp, Hậu Giang, Việt Nam', 'Good chance to bring some great artifact home with you. Only in 15 June 2021. No reservation needed.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Indexes for table `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id_san_pham`,`id_don_hang`),
  ADD KEY `id_don_hang` (`id_don_hang`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hang` (`id_hang`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Indexes for table `su_kien`
--
ALTER TABLE `su_kien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `su_kien`
--
ALTER TABLE `su_kien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`);

--
-- Constraints for table `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD CONSTRAINT `don_hang_chi_tiet_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`),
  ADD CONSTRAINT `don_hang_chi_tiet_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_hang`) REFERENCES `hang` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
