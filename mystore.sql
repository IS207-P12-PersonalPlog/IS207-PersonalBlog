-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2024 lúc 04:29 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` varchar(100) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
('acer', 'Acer'),
('apple', 'Apple'),
('asus', 'Asus'),
('dell', 'Dell'),
('havit', 'Havit'),
('hp', 'HP'),
('lenovo', 'Lenovo'),
('msi', 'MSI'),
('nokia', 'Nokia'),
('oppo', 'Oppo'),
('samsung', 'Samsung'),
('sony', 'Sony'),
('xiaomi', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(100) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
('headphone', 'Headphone'),
('laptop', 'Laptop'),
('phone', 'Phone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `SOHD` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SL` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `SOHD` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NGHD` date NOT NULL,
  `TRIGIA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `MASP` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `brand_id` varchar(100) NOT NULL,
  `TENSP` varchar(100) NOT NULL,
  `GIA` int(11) DEFAULT NULL,
  `DUNGLUONG` enum('128GB','32GB','64GB','256GB','None') NOT NULL,
  `DVT` enum('Cai','vnd') NOT NULL,
  `NUOCSX` enum('Vietnam','Japan','America','China','Korean') NOT NULL,
  `HINHANH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`MASP`, `category_id`, `brand_id`, `TENSP`, `GIA`, `DUNGLUONG`, `DVT`, `NUOCSX`, `HINHANH`) VALUES
(1, 'phone', 'apple', 'iPhone 16 Pro Max', 34290000, '128GB', 'vnd', 'China', 'images/iphone-16-pro-max.png'),
(2, 'phone', 'samsung', 'Samsung Galaxy S24 Ultra', 27990000, '128GB', 'vnd', 'China', 'images/ss-s24-ultra222.png'),
(3, 'phone', 'apple', 'iPhone 13', 13450000, '128GB', 'Cai', 'China', 'images/iphone-13.png'),
(4, 'laptop', 'msi', 'Laptop MSI Modern 14 C13M-607VN', 14990000, '128GB', 'vnd', 'China', 'images/laptop-msi-modern14c13m.png'),
(5, 'laptop', 'msi', 'Laptop MSI Gaming GF63 Thin 11UC-1228VN', 16990000, '128GB', 'vnd', 'China', 'images/laptop-msi-gf63.png'),
(6, 'laptop', 'msi', 'Laptop MSI Prestige 14 AI Studio C1VEG-056VN', 32990000, '128GB', 'vnd', 'China', 'images/laptop-msi-prestige14.png'),
(7, 'headphone', 'havit', 'Tai nghe Bluetooth True Wireless Havit TW948', 190000, 'None', 'vnd', 'China', 'images/headphone-havit-tw948.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraccount`
--

CREATE TABLE `useraccount` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `sdt` int(10) DEFAULT NULL,
  `ngay_dk` date NOT NULL,
  `allow_edit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `useraccount`
--

INSERT INTO `useraccount` (`user_id`, `user_name`, `user_password`, `ho_ten`, `sdt`, `ngay_dk`, `allow_edit`) VALUES
(1, 'leducdat', '123456', 'Lê Đức Đạt', 987654321, '2024-11-16', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `MASP` (`MASP`),
  ADD KEY `SOHD` (`SOHD`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`SOHD`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `SOHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sp`
--
ALTER TABLE `sp`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sp` (`MASP`),
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`SOHD`) REFERENCES `hoadon` (`SOHD`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `useraccount` (`user_id`);

--
-- Các ràng buộc cho bảng `sp`
--
ALTER TABLE `sp`
  ADD CONSTRAINT `sp_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `sp_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
