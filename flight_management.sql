-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2021 lúc 04:32 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `flight_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_ve` int(11) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `gia_ve_km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_khuyen_mai`
--

CREATE TABLE `chi_tiet_khuyen_mai` (
  `ma_km` int(11) NOT NULL,
  `ma_hang_dich_vu` varchar(255) NOT NULL,
  `ma_chuyen_bay` varchar(255) NOT NULL,
  `ma_hang` varchar(255) NOT NULL,
  `ma_hang_kh` varchar(255) NOT NULL,
  `khuyen_mai` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_quyen`
--

CREATE TABLE `chi_tiet_quyen` (
  `ma_chuc_vu` varchar(255) NOT NULL,
  `ma_chuc_nang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_nang`
--

CREATE TABLE `chuc_nang` (
  `ma_chuc_nang` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuc_nang`
--

INSERT INTO `chuc_nang` (`ma_chuc_nang`, `ten`) VALUES
('CN01', 'Quản lý tài khoản'),
('CN02', 'Quản lý hãng hàng không'),
('CN03', 'Quản lý sân bay'),
('CN04', 'Quản lý khách hàng'),
('CN05', 'Quản lý chuyến bay'),
('CN06', 'Quản lý máy bay'),
('CN07', 'Quản lý chức vụ'),
('CN08', 'Quản lý chương trình khuyến mãi'),
('CN09', 'Quản lý hạng khách hàng'),
('CN10', 'Quản lý nhân viên'),
('CN11', 'Quản lý ví thanh toán'),
('CN12', 'Thống kê'),
('CN13', 'Đặt vé'),
('CN14', 'Săn vé giá rẻ'),
('CN15', 'Mua vé tự động'),
('CN16', 'Kho vé của tôi'),
('CN17', 'Ví của tôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `ma_chuc_vu` varchar(255) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`ma_chuc_vu`, `ten_chuc_vu`, `trang_thai`) VALUES
('CV000', 'Admin', 1),
('CV001', 'Khách hàng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_trinh_khuyen_mai`
--

CREATE TABLE `chuong_trinh_khuyen_mai` (
  `ma_km` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_bay`
--

CREATE TABLE `chuyen_bay` (
  `ma_chuyen_bay` varchar(255) NOT NULL,
  `ma_san_bay_den` varchar(255) NOT NULL,
  `ma_hang_hang_khong` varchar(255) NOT NULL,
  `ma_san_bay_di` varchar(255) NOT NULL,
  `so_hieu_may_bay` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gio_bay` time NOT NULL,
  `gio_den` time NOT NULL,
  `ngay_bay` date NOT NULL,
  `hoan_tien` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_dich_vu`
--

CREATE TABLE `hang_dich_vu` (
  `ma_hang_dich_vu` varchar(255) NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hang_khong`
--

CREATE TABLE `hang_hang_khong` (
  `ma_hang_hang_khong` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `loai_hang` varchar(255) NOT NULL,
  `ngay_ban` datetime NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_khach_hang`
--

CREATE TABLE `hang_khach_hang` (
  `ma_hang_kh` varchar(255) NOT NULL,
  `ten_hang` varchar(255) NOT NULL,
  `muc_diem` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_lap_hoa_don` datetime NOT NULL,
  `so_luong_ve` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `tong_tien_km` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL,
  `ma_hang_kh` varchar(255) DEFAULT NULL,
  `so_ho_chieu` int(11) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cccd` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `diem_tich_luy` int(11) DEFAULT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ma_tk`, `ma_hang_kh`, `so_ho_chieu`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `email`, `cccd`, `sdt`, `dia_chi`, `diem_tich_luy`, `trang_thai`) VALUES
(1, 1, NULL, NULL, 'Trần Thị Thu Thanh', NULL, NULL, 'kindaichicao@gmail.com', NULL, NULL, NULL, NULL, 1),
(2, 2, NULL, NULL, 'Nguyễn Văn Minh Đức', NULL, NULL, 'minhduc140401@gmail.com', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su_giao_dich`
--

CREATE TABLE `lich_su_giao_dich` (
  `ma_gd` varchar(20) NOT NULL,
  `ma_vi` varchar(20) NOT NULL,
  `noi_dung_giao_dich` text NOT NULL,
  `so_tien_gd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `may_bay`
--

CREATE TABLE `may_bay` (
  `so_hieu_may_bay` varchar(255) NOT NULL,
  `ma_hang_hang_khong` varchar(255) NOT NULL,
  `so_ghe_thuong` int(11) NOT NULL,
  `so_ghe_thuong_gia` int(11) NOT NULL,
  `tong_so_ghe` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_xac_thuc`
--

CREATE TABLE `ma_xac_thuc` (
  `ma_tk` int(11) NOT NULL,
  `ma_xt` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` int(11) NOT NULL,
  `ma_tk` int(11) DEFAULT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `cccd` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_bay`
--

CREATE TABLE `san_bay` (
  `ma_san_bay` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `dia_diem` varchar(255) NOT NULL,
  `so_luong_may_bay_toi_da` int(11) NOT NULL,
  `so_luong_may_bay_du_bi` int(11) NOT NULL,
  `loai_may_bay` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tk` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash_password` varchar(1024) NOT NULL,
  `ma_cv` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tk`, `username`, `hash_password`, `ma_cv`, `trang_thai`) VALUES
(1, 'kindaichicao@gmail.com', '$2y$10$BqaPZcYCmSsEo1sa/Q/OQ.yF6dV7FJKKcg2ZSONdq9G91yw7wPyq.', 'CV001', 1),
(2, 'minhduc140401@gmail.com', '$2y$10$oZbuElAbWIMZP2dYW6/TX.LaweInFRGg1BE261zjpWfmBT.4xtTpm', 'CV001', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `ma_ve` int(11) NOT NULL,
  `ma_chuyen_bay` varchar(255) NOT NULL,
  `ma_hang_hang_khong` varchar(255) NOT NULL,
  `ma_hang_dich_vu` varchar(255) NOT NULL,
  `so_ghe` int(11) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `tien_thue` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve_khach_hang`
--

CREATE TABLE `ve_khach_hang` (
  `ma_ve` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_km` int(11) NOT NULL,
  `hanh_ly` double NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vi_thanh_toan`
--

CREATE TABLE `vi_thanh_toan` (
  `ma_vi` varchar(20) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `so_du` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`,`ma_ve`),
  ADD KEY `ma_ve` (`ma_ve`);

--
-- Chỉ mục cho bảng `chi_tiet_khuyen_mai`
--
ALTER TABLE `chi_tiet_khuyen_mai`
  ADD PRIMARY KEY (`ma_km`,`ma_hang_dich_vu`),
  ADD KEY `ma_hang` (`ma_hang`),
  ADD KEY `ma_chuyen_bay` (`ma_chuyen_bay`),
  ADD KEY `ma_hang_dich_vu` (`ma_hang_dich_vu`),
  ADD KEY `ma_hang_kh` (`ma_hang_kh`);

--
-- Chỉ mục cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD PRIMARY KEY (`ma_chuc_vu`,`ma_chuc_nang`),
  ADD KEY `ma_chuc_nang` (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `chuc_nang`
--
ALTER TABLE `chuc_nang`
  ADD PRIMARY KEY (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`ma_chuc_vu`);

--
-- Chỉ mục cho bảng `chuong_trinh_khuyen_mai`
--
ALTER TABLE `chuong_trinh_khuyen_mai`
  ADD PRIMARY KEY (`ma_km`);

--
-- Chỉ mục cho bảng `chuyen_bay`
--
ALTER TABLE `chuyen_bay`
  ADD PRIMARY KEY (`ma_chuyen_bay`),
  ADD KEY `ma_hang_hang_khong` (`ma_hang_hang_khong`),
  ADD KEY `ma_san_bay_di` (`ma_san_bay_di`),
  ADD KEY `so_hieu_may_bay` (`so_hieu_may_bay`),
  ADD KEY `ma_san_bay_den` (`ma_san_bay_den`);

--
-- Chỉ mục cho bảng `hang_dich_vu`
--
ALTER TABLE `hang_dich_vu`
  ADD PRIMARY KEY (`ma_hang_dich_vu`);

--
-- Chỉ mục cho bảng `hang_hang_khong`
--
ALTER TABLE `hang_hang_khong`
  ADD PRIMARY KEY (`ma_hang_hang_khong`);

--
-- Chỉ mục cho bảng `hang_khach_hang`
--
ALTER TABLE `hang_khach_hang`
  ADD PRIMARY KEY (`ma_hang_kh`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`),
  ADD KEY `ma_tk` (`ma_tk`),
  ADD KEY `ma_hang_kh` (`ma_hang_kh`);

--
-- Chỉ mục cho bảng `may_bay`
--
ALTER TABLE `may_bay`
  ADD PRIMARY KEY (`so_hieu_may_bay`),
  ADD KEY `ma_hang_hang_khong` (`ma_hang_hang_khong`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `san_bay`
--
ALTER TABLE `san_bay`
  ADD PRIMARY KEY (`ma_san_bay`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tk`),
  ADD KEY `ma_cv` (`ma_cv`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`ma_ve`),
  ADD KEY `ma_hang_hang_khong` (`ma_hang_hang_khong`),
  ADD KEY `ma_chuyen_bay` (`ma_chuyen_bay`),
  ADD KEY `ma_hang_dich_vu` (`ma_hang_dich_vu`);

--
-- Chỉ mục cho bảng `ve_khach_hang`
--
ALTER TABLE `ve_khach_hang`
  ADD PRIMARY KEY (`ma_ve`,`ma_kh`),
  ADD KEY `ma_km` (`ma_km`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `vi_thanh_toan`
--
ALTER TABLE `vi_thanh_toan`
  ADD KEY `ma_kh` (`ma_kh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuong_trinh_khuyen_mai`
--
ALTER TABLE `chuong_trinh_khuyen_mai`
  MODIFY `ma_km` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hoa_don` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma_nv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ve`
--
ALTER TABLE `ve`
  MODIFY `ma_ve` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`ma_ve`) REFERENCES `ve` (`ma_ve`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma_hoa_don`);

--
-- Các ràng buộc cho bảng `chi_tiet_khuyen_mai`
--
ALTER TABLE `chi_tiet_khuyen_mai`
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_1` FOREIGN KEY (`ma_hang`) REFERENCES `hang_hang_khong` (`ma_hang_hang_khong`),
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_2` FOREIGN KEY (`ma_chuyen_bay`) REFERENCES `chuyen_bay` (`ma_chuyen_bay`),
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_3` FOREIGN KEY (`ma_hang_dich_vu`) REFERENCES `hang_dich_vu` (`ma_hang_dich_vu`),
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_4` FOREIGN KEY (`ma_hang_kh`) REFERENCES `hang_khach_hang` (`ma_hang_kh`),
  ADD CONSTRAINT `chi_tiet_khuyen_mai_ibfk_5` FOREIGN KEY (`ma_km`) REFERENCES `chuong_trinh_khuyen_mai` (`ma_km`);

--
-- Các ràng buộc cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_1` FOREIGN KEY (`ma_chuc_vu`) REFERENCES `chuc_vu` (`ma_chuc_vu`),
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_2` FOREIGN KEY (`ma_chuc_nang`) REFERENCES `chuc_nang` (`ma_chuc_nang`);

--
-- Các ràng buộc cho bảng `chuyen_bay`
--
ALTER TABLE `chuyen_bay`
  ADD CONSTRAINT `chuyen_bay_ibfk_1` FOREIGN KEY (`ma_hang_hang_khong`) REFERENCES `hang_hang_khong` (`ma_hang_hang_khong`),
  ADD CONSTRAINT `chuyen_bay_ibfk_2` FOREIGN KEY (`ma_san_bay_di`) REFERENCES `san_bay` (`ma_san_bay`),
  ADD CONSTRAINT `chuyen_bay_ibfk_3` FOREIGN KEY (`so_hieu_may_bay`) REFERENCES `may_bay` (`so_hieu_may_bay`),
  ADD CONSTRAINT `chuyen_bay_ibfk_4` FOREIGN KEY (`ma_san_bay_den`) REFERENCES `san_bay` (`ma_san_bay`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`),
  ADD CONSTRAINT `khach_hang_ibfk_2` FOREIGN KEY (`ma_hang_kh`) REFERENCES `hang_khach_hang` (`ma_hang_kh`);

--
-- Các ràng buộc cho bảng `may_bay`
--
ALTER TABLE `may_bay`
  ADD CONSTRAINT `may_bay_ibfk_1` FOREIGN KEY (`ma_hang_hang_khong`) REFERENCES `hang_hang_khong` (`ma_hang_hang_khong`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD CONSTRAINT `tai_khoan_ibfk_1` FOREIGN KEY (`ma_cv`) REFERENCES `chuc_vu` (`ma_chuc_vu`);

--
-- Các ràng buộc cho bảng `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`ma_hang_hang_khong`) REFERENCES `hang_hang_khong` (`ma_hang_hang_khong`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`ma_chuyen_bay`) REFERENCES `chuyen_bay` (`ma_chuyen_bay`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`ma_hang_dich_vu`) REFERENCES `hang_dich_vu` (`ma_hang_dich_vu`);

--
-- Các ràng buộc cho bảng `ve_khach_hang`
--
ALTER TABLE `ve_khach_hang`
  ADD CONSTRAINT `ve_khach_hang_ibfk_1` FOREIGN KEY (`ma_km`) REFERENCES `chuong_trinh_khuyen_mai` (`ma_km`),
  ADD CONSTRAINT `ve_khach_hang_ibfk_2` FOREIGN KEY (`ma_ve`) REFERENCES `ve` (`ma_ve`),
  ADD CONSTRAINT `ve_khach_hang_ibfk_3` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `vi_thanh_toan`
--
ALTER TABLE `vi_thanh_toan`
  ADD CONSTRAINT `vi_thanh_toan_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
