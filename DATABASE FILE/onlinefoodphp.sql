-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 04:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(2, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1@gmail.com', '2022-12-13 08:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `mn_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `mn_id`, `title`, `price`, `img`) VALUES
(1, 1, '2 MIẾNG GÀ GIÒN', 60000, '1_1.png'),
(2, 1, '4 MIẾNG GÀ GIÒN', 112000, '1_2.png'),
(3, 1, '6 MIẾNG GÀ GIÒN', 174000, '1_3.png'),
(4, 1, '2 MIẾNG GÀ GIÒN + KHOAI TÂY VỪA + NƯỚC NGỌT', 80000, '1_4.png'),
(5, 1, 'CƠM GÀ GIÒN + SÚP BÍ ĐỎ + NƯỚC NGỌT', 50000, '1_5.png'),
(6, 1, 'CƠM GÀ GIÒN + NƯỚC NGỌT', 45000, '1_6.png'),
(7, 2, '1 MIẾNG GÀ SỐT CAY + CƠM', 45000, '2_1.png'),
(8, 2, '2 MIẾNG GÀ SÀI GÒN SỐT CAY', 65000, '2_2.png'),
(9, 2, '2 MIẾNG GÀ SỐT CAY + KHOAI TÂY + NƯỚC', 90000, '2_3.png'),
(10, 2, '1 MIẾNG GÀ SỐT CAY + CƠM + NƯỚC', 50000, '2_4.png'),
(11, 2, '1 MIẾNG GÀ SỐT CAY + CƠM + NƯỚC + SÚP', 55000, '2_5.png'),
(12, 2, '1 MIẾNG GÀ SỐT CAY + KHOAI TÂY + NƯỚC', 55000, '2_6.png'),
(13, 3, '01 MIẾNG GÀ GIÒN VUI VẺ + 01 MỲ Ý SỐT BÒ BẰM + 01 NƯỚC NGỌT (VỪA)', 65000, '3_1.png'),
(14, 3, 'MÌ Ý SỐT BÒ BẰM LỚN + 2 MIẾNG GÀ KHÔNG XƯƠNG + KHOAI TÂY VỪA + NƯỚC NGỌT', 75000, '3_2.png'),
(15, 3, 'MÌ Ý SỐT BÒ BẰM LỚN + 2 MIẾNG GÀ KHÔNG XƯƠNG + NƯỚC NGỌT', 65000, '3_3.png'),
(16, 3, 'MÌ Ý SỐT BÒ BẰM LỚN + NƯỚC NGỌT', 45000, '3_4.png'),
(17, 3, 'MÌ Ý SỐT BÒ BẰM LỚN + 1 MIẾNG GÀ RÁN + NƯỚC NGỌT', 75000, '3_5.png'),
(18, 3, 'MÌ Ý SỐT BÒ BẰM LỚN + 1 MIẾNG GÀ RÁN + KHOAI TÂY VỪA + NƯỚC NGỌT', 90000, '3_6.png'),
(19, 4, 'SANDWICH GÀ GIÒN + NƯỚC NGỌT', 35000, '4_1.png'),
(20, 4, 'SANDWICH THỊT NƯỚNG BBQ + KHOAI TÂY + NƯỚC NGỌT', 50000, '4_2.png'),
(21, 4, 'SANDWICH THỊT NƯỚNG BBQ + NƯỚC NGỌT', 35000, '4_3.png'),
(22, 4, 'SANDWICH THỊT NƯỚNG BBQ', 30000, '4_4.png'),
(23, 4, 'SANDWICH GÀ GIÒN', 30000, '4_5.png'),
(24, 4, 'SANDWICH GÀ GIÒN + NƯỚC NGỌT + KHOAI TÂY', 50000, '4_6.png'),
(25, 5, 'KHOAI LẮC RONG BIỂN', 25000, '5_1.png'),
(26, 5, 'KHOAI TÂY CHIÊN (VỪA)', 20000, '5_2.png'),
(27, 5, 'KHOAI TÂY CHIÊN (LỚN)', 25000, '5_3.png'),
(28, 5, 'KHOAI TÂY LẮC VỊ BBQ (VỪA)', 25000, '5_4.png'),
(29, 5, 'KHOAI TÂY LẮC VỊ BBQ (LỚN)', 35000, '5_5.png'),
(30, 5, '3 MIẾNG GÀ GIÒN KHÔNG XƯƠNG', 30000, '5_6.png'),
(31, 6, 'NƯỚC ÉP XOÀI ĐÀO', 20000, '6_1.png'),
(32, 6, 'TROPICAL SUNDAE', 20000, '6_2.png'),
(33, 6, 'BÁNH PIE NHÂN XOÀI ĐÀO', 15000, '6_3.png'),
(34, 6, 'BÁNH PIE NHÂN KHOAI MÔN', 15000, '6_4.png'),
(35, 6, 'KEM SUNDAES DÂU', 15000, '6_5.png'),
(36, 6, 'KEM SUNDAES SÔCÔLA', 15000, '6_6.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `mn_id` int(222) NOT NULL,
  `title` varchar(100) NOT NULL,
  `des` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`mn_id`, `title`, `des`, `image`) VALUES
(1, 'Gà giòn vui vẻ', '', '01.png'),
(2, 'Gà sốt cay', '', '02.png'),
(3, 'Mì ý sốt bò bằm', '', '03.png'),
(4, 'Burger', '', '04.png'),
(5, 'Phần ăn phụ', '', '05.png'),
(6, 'Món tráng miệng', '', '06.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `date`) VALUES
(1, 'tho', 'Nguyễn', 'Thơ', 'tho@mail.com', '0147895412', 'b2569ee84ff07a082794c880b4e92cc6', 'Ký túc xá khu A', '2022-12-13 08:40:36'),
(2, 'thanh', 'Lê', 'Thanh', 'thanh@mail.com', '0478965423', 'ba158f9c8c27649c71786b74006a9808', 'Bcon Suối Tiên', '2022-12-13 08:41:07'),
(3, 'tran', 'Trịnh', 'Trân', 'tran@mail.com', '0123654789', '865335f44877d73277ce8dc970047e02', 'Ký túc xá khu A', '2022-12-13 08:41:37'),
(4, 'tam', 'Dương', 'Tâm', 'tam@mail.com', '0147896325', 'e5110d330a01c56baa957b84da6165ad', 'Thủ Đức', '2022-12-13 05:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 1, 'KEM SUNDAES SÔCÔLA', 6, 15000, 'closed', '2022-12-13 14:51:28'),
(2, 1, '01 MIẾNG GÀ GIÒN VUI VẺ + 01 MỲ Ý SỐT BÒ BẰM + 01 NƯỚC NGỌT (VỪA)', 3, 65000, 'in process', '2022-12-13 15:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mn_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
