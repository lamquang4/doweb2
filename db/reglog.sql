-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2024 lúc 09:10 AM
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
-- Cơ sở dữ liệu: `reglog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idloai` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idloai`, `brand`, `type`) VALUES
('L01', 'cocacola', 'carbonated'),
('L02', 'pepsi', 'carbonated'),
('L03', 'fanta', 'carbonated'),
('L04', 'sprite', 'carbonated'),
('L05', 'aquarius', 'carbonated'),
('L06', 'thumbsup', 'carbonated'),
('L07', 'nutriboost', 'nogas'),
('L08', 'fuzetea', 'nogas'),
('L09', 'dasani', 'nogas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `idorder` varchar(10) NOT NULL,
  `id` varchar(10) NOT NULL,
  `sl_mua` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`idorder`, `id`, `sl_mua`, `subtotal`) VALUES
('OD6856', 'SP2354', 4, 48);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `idloai` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `soluong` int(20) NOT NULL,
  `date_add` date NOT NULL,
  `image` varchar(50) NOT NULL,
  `ml` int(11) NOT NULL,
  `calo` int(11) NOT NULL,
  `fatg` int(11) NOT NULL,
  `sodiummg` int(11) NOT NULL,
  `carbong` int(11) NOT NULL,
  `sugarg` int(11) NOT NULL,
  `proteing` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `idloai`, `name`, `price`, `soluong`, `date_add`, `image`, `ml`, `calo`, `fatg`, `sodiummg`, `carbong`, `sugarg`, `proteing`, `status`) VALUES
('SP0354', 'L07', 'Nutri Strawberry', 12, 0, '2024-05-10', 'assets/images/sp/nutridau.png', 297, 120, 3, 170, 27, 24, 3, '0'),
('SP0659', 'L08', 'Lemon Tea', 16, 0, '2024-05-10', 'assets/images/sp/lemon.png', 350, 57, 0, 15, 22, 22, 0, '0'),
('SP1176', 'L02', 'Pepsi Zero Calo', 10, 0, '2024-05-08', 'assets/images/sp/pepsizero.png', 355, 0, 0, 40, 0, 0, 0, '0'),
('SP1205', 'L04', 'Sprite Can', 10, 0, '2024-05-10', 'assets/images/sp/sprite1.png', 250, 110, 0, 30, 33, 33, 0, '0'),
('SP1330', 'L09', 'Dasani Mineralized', 12, 0, '2024-05-10', 'assets/images/sp/dasanimine.png', 500, 0, 0, 26, 0, 0, 0, '0'),
('SP2119', 'L03', 'Fanta Grape', 10, 0, '2024-05-10', 'assets/images/sp/fantanho.png', 330, 110, 0, 20, 26, 26, 0, '0'),
('SP2354', 'L02', 'Pepsi Orignal', 12, 0, '2024-05-07', 'assets/images/sp/pepsi.png', 355, 150, 0, 30, 41, 41, 0, '1'),
('SP2532', 'L03', 'Fanta Orange', 10, 0, '2024-05-10', 'assets/images/sp/fanta1.png', 330, 110, 0, 20, 26, 26, 0, '0'),
('SP3849', 'L07', 'Nutri Orange', 10, 0, '2024-05-10', 'assets/images/sp/nutricam.png', 297, 120, 3, 170, 27, 24, 3, '0'),
('SP3904', 'L05', 'Aquarius Zero Calo', 13, 0, '2024-05-10', 'assets/images/sp/aquariu0calo.png', 390, 32, 0, 32, 8, 8, 0, '0'),
('SP4027', 'L06', 'Thumbs Kiwi', 12, 0, '2024-05-10', 'assets/images/sp/thumbs1.png', 330, 65, 0, 25, 23, 23, 0, '0'),
('SP4206', 'L03', 'Fanta Sassafras', 10, 0, '2024-05-10', 'assets/images/sp/fanta3.png', 330, 110, 0, 20, 26, 26, 0, '0'),
('SP4704', 'L05', 'Aquarius Gas', 10, 0, '2024-05-10', 'assets/images/sp/aquariusgas.png', 390, 32, 0, 32, 8, 8, 0, '0'),
('SP4769', 'L03', 'Fanta Cream Soda', 17, 0, '2024-05-10', 'assets/images/sp/fanta2.png', 330, 110, 0, 20, 26, 26, 0, '0'),
('SP4899', 'L01', 'Coca Plus Fiber', 12, 0, '2024-05-10', 'assets/images/sp/coca3.png', 320, 0, 0, 45, 14, 0, 0, '0'),
('SP6026', 'L01', 'Coca Zero Sugar', 10, 0, '2024-05-10', 'assets/images/sp/coca1.png', 320, 0, 0, 40, 0, 0, 0, '0'),
('SP6264', 'L08', 'Passion Tea', 15, 0, '2024-05-10', 'assets/images/sp/passion.png', 350, 57, 0, 15, 22, 22, 0, '0'),
('SP6698', 'L01', 'Coca Light', 15, 0, '2024-05-10', 'assets/images/sp/coca2.png', 320, 0, 0, 40, 0, 0, 0, '0'),
('SP6739', 'L09', 'Dasani Water', 8, 0, '2024-05-10', 'assets/images/sp/water2.png', 500, 0, 0, 0, 0, 0, 0, '0'),
('SP6881', 'L07', 'Nutri Biscuits', 12, 0, '2024-05-10', 'assets/images/sp/nutrikem.png', 297, 120, 3, 170, 27, 24, 3, '0'),
('SP7293', 'L08', 'Winter Melon', 15, 0, '2024-05-10', 'assets/images/sp/melon.png', 320, 56, 0, 15, 22, 22, 0, '0'),
('SP7346', 'L08', 'Peach Tea', 16, 0, '2024-05-08', 'assets/images/sp/peach.png', 350, 57, 0, 15, 22, 22, 0, '0'),
('SP7846', 'L04', 'Sprite Bottle', 10, 0, '2024-05-10', 'assets/images/sp/sprite2.png', 330, 110, 0, 30, 33, 33, 0, '0'),
('SP8939', 'L06', 'Thumbs Strawberry', 11, 0, '2024-05-10', 'assets/images/sp/thumbs2.png', 330, 65, 0, 25, 23, 23, 0, '0'),
('SP9341', 'L01', 'Coca Original', 13, 0, '2024-05-10', 'assets/images/sp/cocaori.png', 330, 139, 0, 35, 39, 39, 0, '0'),
('SP9462', 'L02', 'Pepsi Lemon', 10, 0, '2024-05-10', 'assets/images/sp/pepchanh.png', 320, 0, 0, 32, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_customer`
--

CREATE TABLE `tb_customer` (
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `duong` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `imguser` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_customer`
--

INSERT INTO `tb_customer` (`username`, `email`, `password`, `fullname`, `phone`, `birthday`, `gender`, `sonha`, `duong`, `district`, `ward`, `city`, `imguser`, `status`) VALUES
('cudat', 'datcu@gmail.com', '277511ec76c6a88ccc8394163c108adc', '', '', '0000-00-00', '', '', '', '', '', '', 'assets/images/pic/usernew.png', 1),
('giahung', 'giahung45@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'Ngo Gia Hung', '04848484848', '2004-04-05', 'male', 'JU/85A', 'KJLO', 'District 1', 'Ward 5', 'Ha Noi City', 'assets/images/pic/usernew.png', 1),
('minhquan', 'quannguyen456@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'Nguyen Minh Quan', '09787982527', '2004-04-08', 'male', 'YUI/5', 'XYZ HU', 'District 3', 'Ward 5', 'Ho Chi Minh City', 'assets/images/pic/usernew.png', 1),
('ngocson', 'ngocson@gamil.com', 'e35cf7b66449df565f93c607d5a81d09', 'Nguyen Ngoc Son', '07878725421', '2004-02-10', '', 'KUIW/56', 'JKL IO', 'District 2', 'Ward 4', 'Ha Noi City', 'assets/images/pic/usernew.png', 1),
('quanglam', 'lamdieuquang0105@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'Lam Dieu Quang', '0967996016', '2004-05-01', 'male', '74/A', 'ABC', 'District 6', 'Ward 6', 'Ho Chi Minh City', 'imguser/quanglam.png', 1),
('thanhtam', 'tamthanh456@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'Nguyen Thanh Tam', '09874848416', '2004-04-07', 'male', 'NUI', 'JK/5', 'District 6', 'Ward 2', 'Ha Noi City', 'assets/images/pic/usernew.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_manager`
--

CREATE TABLE `tb_manager` (
  `username` varchar(10) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_manager`
--

INSERT INTO `tb_manager` (`username`, `password`, `fullname`, `email`, `phone`, `role`, `status`) VALUES
('hoanhanh', 'e35cf7b66449df565f93c607d5a81d09', 'Nguyen Duc Hoang Anh', 'hanh456@gmail.com', '08484848448', '', 1),
('quanglam', 'e35cf7b66449df565f93c607d5a81d09', 'Lam Dieu Quang', 'lamdieuquang0105@gmail.com', '09898595626', '', 1),
('tamnguyen', 'e35cf7b66449df565f93c607d5a81d09', 'Nguyen Thanh Tam', 'tamnguyen456@gmail.com', '05949652625', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

CREATE TABLE `tb_order` (
  `idorder` varchar(10) NOT NULL,
  `dateorder` date NOT NULL,
  `total` int(10) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `duong` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `paymethod` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order`
--

INSERT INTO `tb_order` (`idorder`, `dateorder`, `total`, `sonha`, `duong`, `district`, `ward`, `city`, `paymethod`, `status`, `username`, `fullname`, `phone`) VALUES
('OD6856', '2024-05-08', 48, '74/A', 'ABC', 'District 6', 'Ward 6', 'Ho Chi Minh City', 'cod', '1', 'quanglam', 'Lam Dieu Quang', '0967996016');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idloai`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`idorder`,`id`),
  ADD KEY `idorder` (`idorder`,`id`),
  ADD KEY `MM1` (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idloai` (`idloai`);

--
-- Chỉ mục cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `tb_manager`
--
ALTER TABLE `tb_manager`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `FK1` (`username`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `MM1` FOREIGN KEY (`id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `TT1` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `VV1` FOREIGN KEY (`idloai`) REFERENCES `category` (`idloai`);

--
-- Các ràng buộc cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`username`) REFERENCES `tb_customer` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
