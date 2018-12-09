-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2018 lúc 07:40 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lkmt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaLinhKien` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaLinhKien`, `SoLuongMua`, `MaHoaDon`) VALUES
(1, 7, 1, 9),
(2, 6, 1, 9),
(7, 12, 1, 11),
(8, 28, 1, 11),
(9, 11, 1, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaKhachHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DaMua` int(11) NOT NULL,
  `NgayMua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaKhachHang`, `DaMua`, `NgayMua`) VALUES
(5, 'admin', 2, '2018-12-07 00:00:00'),
(6, 'admin', 2, '2018-12-07 03:09:05'),
(7, 'admin', 2, '2018-12-07 03:19:03'),
(8, 'admin', 2, '2018-12-07 03:19:57'),
(9, 'admin', 2, '2018-12-07 03:23:48'),
(11, 'admin', 2, '2018-12-07 03:37:39'),
(12, 'admin', 1, '2018-12-07 03:45:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Quyen` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `MatKhau`, `HoTen`, `Quyen`, `DiaChi`, `SoDienThoai`, `Email`) VALUES
('admin', '123', 'Nguyễn Văn A', 1, 'Huế', '01234567', 'admin@gmail.com'),
('administrator', '123', 'Nguyễn Ngọc Trường Sơn', 0, 'Đà Nẵng', '0982123234', 'truongson123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhkien`
--

CREATE TABLE `linhkien` (
  `MaLinhKien` int(11) NOT NULL,
  `TenLinhKien` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiLinhKien` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `NhaCungCap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BaoHanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linhkien`
--

INSERT INTO `linhkien` (`MaLinhKien`, `TenLinhKien`, `MaLoaiLinhKien`, `SoLuong`, `Gia`, `NhaCungCap`, `BaoHanh`, `image`) VALUES
(1, 'CPU INTEL CORE i5 8400 (2.8Ghz, 9MB Cache, LGA1151V2) COFFEELAKE', 2, 12, 6050000, 'INTEL', '3 năm', 'image/cpu/cpu1.jpg'),
(2, 'CPU INTEL CORE i7 8700 (3.2Ghz, 12MB Cache, LGA1151V2) ', 2, 26, 9450000, 'INTEL', '3 năm', 'image/cpu/cpu2.jpg'),
(3, 'CPU INTEL CORE i9 9900K (3.6-5.0Ghz,8C/16T,16MB, LGA1151V2) COFFEELAKE', 2, 10, 15390000, 'INTEL', '3 năm', 'image/cpu/cpu3.jpg'),
(4, 'CPU AMD ATHLON 200GE (3.2 Ghz, 2C/4T, 4MB, VEGA3, 35W) AM4', 2, 34, 1450000, 'AMD', '5 năm', 'image/cpu/cpu4.jpg'),
(5, 'CPU AMD THREADRIPPER 2990wx (32C/64T, 3.0Ghz Turbo 4.2Ghz, 64MB, 250W) sTR4', 2, 5, 49500000, 'AMD', '5 năm', 'image/cpu/cpu5.jpg'),
(6, 'Bàn Phím I-Rock IRK62E-NSL Xám Đen (Khung Thép, Led 7 Màu, Giả Cơ)', 3, 15, 285000, 'i-rocks', '12 tháng', 'image/banPhim/banphim1.jpg'),
(7, 'Bàn Phím Cơ ZIDLI CK300 Gaming Black USB (có dây)', 3, 32, 450000, 'ZIDLI', '12 tháng', 'image/banPhim/banphim2.jpg'),
(8, 'Bàn phím giả cơ Newmen GM816 usb (Xám đen)', 3, 10, 590000, 'Newmen', '12 tháng', 'image/banPhim/banphim3.jpg'),
(9, 'KEYBOARD DARE U LK160 BLACK USB RGB LED USB (giả cơ, có LED RGB)', 3, 32, 270000, 'DAREU', '12 tháng', 'image/banPhim/banphim4.jpg'),
(10, 'Bàn phím chơi game A4tech B120 (USB)', 3, 5, 799000, 'A4tech', '12 tháng', 'image/banPhim/banphim5.jpg'),
(11, 'RAM DDR4 8GB/2400Mhz GSKILL JIPJAWS V (F4-2400C17S-8GVR)', 5, 6, 1850000, 'GSKILL', '2 năm', 'image/RAM/ram1.jpg'),
(12, 'RAM DDR4 8GB Bus 2666Mhz CORSAIR VENGEANCE LPX BLACK ', 5, 17, 2100000, 'CORSAIR', '24 tháng', 'image/RAM/ram2.jpg'),
(13, 'RAM DDR4 32GB/3000Mhz (2x16GB) GSKILL TRIDENTZ RGB (F4-3000C16D-32GTZR)', 5, 27, 8250000, 'GSKILL', '3 năm', 'image/RAM/ram3.jpg'),
(14, 'RAM DDR4 16GB/2400Mhz CORSAIR VENGEANCE LPX C14', 5, 43, 5290000, 'CORSAIR', '2 năm', 'image/RAM/ram4.jpg'),
(15, 'RAM DDR4 16GB/2666Mhz CORSAIR VENGEANCE LPX C16', 5, 24, 5390000, 'CORSAIR', '24 tháng', 'image/RAM/ram5.jpg'),
(16, 'Chuột máy tính/MOUSE NEWMEN N500 PLUS YELLOW (USB, Vàng)', 4, 19, 195000, 'NEWMEN', '12 tháng', 'image/chuot/chuot1.jpg'),
(17, 'Chuột trackball ELECOM M-DT1URBK', 4, 26, 1190000, 'ELECOM', '24 tháng', 'image/chuot/chuot2.jpg'),
(18, 'Chuột chơi game Aula 989 Black Led', 4, 27, 265000, 'AULA', '12 tháng', 'image/chuot/chuot3.jpg'),
(19, 'Chuột không dây Dare U LM115G', 4, 23, 320000, 'DAREU', '12 tháng', 'image/chuot/chuot4.jpg'),
(20, 'Chuột Máy Tính Marvo G980 Đen (Led Usb)', 4, 23, 762000, 'MARVO', '24 tháng', 'image/chuot/chuot5.jpg'),
(21, 'VGA CARD GALAX RTX2070 OC WHITE 8G 256BIT GDDR6 2 FAN', 10, 22, 16600000, 'GALAX', '36 tháng', 'image/VGA/vga1.jpg'),
(22, 'VGA CARD GIGABYTE GTX1060 3GB GAMING (N1060G1 GAMING 3GD) ', 10, 17, 5990000, 'GIGABYTE', '36 tháng', 'image/VGA/vga2.jpg'),
(23, 'VGA CARD MSI RTX 2080Ti GAMING X TRIO 11G DDR6 352BIT 3 FAN', 10, 32, 38100000, 'MSI', '36 tháng', 'image/VGA/vga3.jpg'),
(24, 'VGA CARD MSI GTX1070Ti 8GB GAMING X DDR5 256BIT 2 FAN', 10, 34, 13300000, 'MSI', '36 tháng', 'image/VGA/vga4.jpg'),
(25, 'VGA CARD MSI GTX1050Ti 4G OCV1. 4GB DDR5 128BIT 1 FAN', 10, 34, 4690000, 'MSI', '24 tháng', 'image/VGA/vga5.jpg'),
(26, 'MAINBOARD ASUS ROG MAXIMUS XI HERO (WI-FI). LGA1151V2. DDR4X4. ', 7, 23, 9220000, 'ASUS', '36 tháng', 'image/mainboard/mainboard1.jpg'),
(27, 'MAINBOARD MSI B360M GAMING PLUS. LGA 1151V2. DDR4X2 ', 7, 54, 2150000, 'MSI', '32 tháng', 'image/mainboard/mainboard2.jpg'),
(28, 'MAINBOARD GIGABYTE B360M AORUS GAMING 3. LGA1151V2. ', 7, 65, 2390000, 'GIGABYTE', '12 tháng', 'image/mainboard/mainboard3.jpg'),
(29, 'MAINBOARD MSI B360A PRO. LGA 1151V2. DDR4X4. DP/DVI', 7, 25, 2550000, 'MSI', '24 tháng', 'image/mainboard/mainboard4.jpg'),
(30, 'MAINBOARD ASUS TUF Z390 PRO GAMING. LGA1151V2. DDR4x4. ', 7, 34, 5600000, 'ASUS', '24 tháng', 'image/mainboard/mainboard5.jpg'),
(31, 'MONITOR CURVED MSI 31.5 OPTIX AG32CQ 2K 144Hz 1Ms FREESYNC ', 9, 33, 9050000, 'MSI', '5 năm', 'image/manhinh/manhinh1.jpg'),
(32, 'Màn hình máy tính HP 23.8 - Model: 24f BLACK (2XN60AA) IPS (DSUB/HDMI)', 9, 33, 3750000, 'HP', '12 tháng', 'image/manhinh/manhinh2.jpg'),
(33, 'Màn hình ASUS 34\'\' DESIGNO MX34VQ 4K', 9, 10, 22400000, 'ASUS', '24 tháng', 'image/manhinh/manhinh3.jpg'),
(34, 'Màn hình SAMSUNG 25\'\' LS25HG50FQ GAMING 144HZ 1Ms', 9, 33, 6750000, 'SAMSUNG', '12 tháng', 'image/manhinh/manhinh4.jpg'),
(35, 'MONITOR LED VIEWSONIC 27 - VA2759SMH IPS (DSUB/HDMI/CÓ LOA)\r\n', 9, 55, 3850000, 'VIEWSONIC', '12 tháng', 'image/manhinh/manhinh5.jpg'),
(36, 'Bộ nguồn GOLDENFIELD DRAGON 500W 500ALC', 6, 31, 300000, 'Goldenfield', '12 tháng', 'image/nguon/bonguon1.jpg'),
(37, 'Bộ nguồn XIGMATEK XCP-A300 300W FAN 12CM BLACK', 6, 17, 450000, 'Seasonic', '12 tháng', 'image/nguon/bonguon2.jpg'),
(38, 'Bộ nguồn RAIDMAX RX-300XT 300W FAN 12CM BLACK', 6, 27, 490000, 'Raidmax', '12 tháng', 'image/nguon/bonguon3.jpg'),
(39, 'Bộ nguồn cao cấp XIGMATEK NRP-VC500 500W FAN 12CM BLACK. 80 PLUS WHITE', 6, 25, 850000, 'Xigmatek', '24 tháng', 'image/nguon/bonguon4.jpg'),
(40, 'Bộ nguồn CORSAIR 550W TX550M 80 PLUS GOLD (CP9020133NA) SEMI MODULAR', 6, 34, 2090000, 'CORSAIR', '24 tháng', 'image/nguon/bonguon5.jpg'),
(41, 'Ổ cứng SSD TRANSCEND 480GB (TS480GSSD220S) 2.5 SATA III', 8, 23, 2990000, 'Transcend', '24 tháng', 'image/oCung/ocung1.jpg'),
(42, 'Ổ cứng  SSD PLEXTOR 256GB M8VG (PX-256M8VG) M2 2280', 8, 33, 1390000, 'Plextor', '24 tháng', 'image/oCung/ocung2.jpg'),
(43, 'Ổ cứng SSD KINGSTON 120GB UV500 (SUV500/120G) SATA III 2.5', 8, 27, 950000, 'Kingston', '12 tháng', 'image/oCung/ocung3.jpg'),
(44, 'Ổ cứng SSD GIGABYTE 256GB UD PRO (GP-GSTFS30GTTD) SATA III 2.5', 8, 32, 1490000, 'Gigabyte', '24 tháng', 'image/oCung/ocung4.jpg'),
(45, 'Ổ cứng SSD WD 240GB GREEN (WDS240G1G0A) SATA III 2.5', 8, 34, 1170000, 'GREEN', '12 tháng', 'image/oCung/ocung5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loailinhkien`
--

CREATE TABLE `loailinhkien` (
  `MaLoaiLinhKien` int(11) NOT NULL,
  `TenLoaiLinhKien` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loailinhkien`
--

INSERT INTO `loailinhkien` (`MaLoaiLinhKien`, `TenLoaiLinhKien`) VALUES
(2, 'CPU'),
(3, 'Bàn Phím'),
(4, 'Chuột'),
(5, 'RAM'),
(6, 'Nguồn'),
(7, 'MainBoard'),
(8, 'Ổ Cứng'),
(9, 'Màn Hình'),
(10, 'Card Đồ Họa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `MaLinhKien` (`MaLinhKien`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  ADD PRIMARY KEY (`MaLinhKien`),
  ADD KEY `MaLoaiLinhKien` (`MaLoaiLinhKien`);

--
-- Chỉ mục cho bảng `loailinhkien`
--
ALTER TABLE `loailinhkien`
  ADD PRIMARY KEY (`MaLoaiLinhKien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  MODIFY `MaLinhKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `loailinhkien`
--
ALTER TABLE `loailinhkien`
  MODIFY `MaLoaiLinhKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaLinhKien`) REFERENCES `linhkien` (`MaLinhKien`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  ADD CONSTRAINT `linhkien_ibfk_1` FOREIGN KEY (`MaLoaiLinhKien`) REFERENCES `loailinhkien` (`MaLoaiLinhKien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
