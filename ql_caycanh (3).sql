-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2024 lúc 06:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_caycanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdh`
--

CREATE TABLE `ctdh` (
  `MaCT` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdh`
--

INSERT INTO `ctdh` (`MaCT`, `MaDH`, `MaSP`, `SoLuong`, `Gia`) VALUES
(1, 1, 1, 2, 150000),
(2, 2, 2, 3, 80000),
(3, 3, 3, 5, 60000),
(4, 4, 4, 1, 250000),
(5, 5, 5, 2, 100000),
(6, 6, 6, 4, 50000),
(7, 7, 7, 3, 300000),
(8, 8, 8, 1, 120000),
(9, 9, 9, 2, 70000),
(10, 10, 10, 1, 180000),
(11, 14, 2, 1, 80000),
(12, 14, 4, 1, 120000),
(13, 14, 3, 1, 60000),
(14, 14, 25, 1, 150000),
(15, 15, 2, 1, 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `MaCTPN` int(11) NOT NULL,
  `MaPN` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`MaCTPN`, `MaPN`, `MASP`, `SoLuong`, `DonGia`) VALUES
(1, 1, 1, 20, 150000),
(2, 2, 2, 30, 80000),
(3, 3, 3, 50, 60000),
(4, 4, 4, 15, 250000),
(5, 5, 5, 25, 100000),
(6, 6, 6, 40, 50000),
(7, 7, 7, 10, 300000),
(8, 8, 8, 20, 120000),
(9, 9, 9, 35, 70000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(50) NOT NULL,
  `HinhAnhDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`, `HinhAnhDM`) VALUES
(1, 'Cây nội thất', 'cay-noi-that.jpg'),
(2, 'Cây ngoại thất', 'cay-ngoai-that.jpg'),
(3, 'Cây ăn quả', 'cay-an-qua.jpg'),
(4, 'Cây hoa', 'cay-hoa.jpg'),
(5, 'Cây Bonsai', 'cay-bon-sai.jpg'),
(6, 'Cây thủy sinh', 'cay-thuy-sinh.jpg'),
(7, 'Hạt giống', 'hat-giong.jpg'),
(8, 'Phụ kiện cây cảnh', 'phu-kien.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaDN` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TrangThai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaDN`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(1, 1, '2024-04-24', 500000, 'Chờ xử lý'),
(2, 2, '2024-04-23', 300000, 'Đang xử lý'),
(3, 3, '2024-04-22', 200000, 'Chờ xác nhận'),
(4, 4, '2024-04-25', 450000, 'Chờ xử lý'),
(5, 5, '2024-04-24', 600000, 'Đang xử lý'),
(6, 6, '2024-04-23', 350000, 'Chờ xác nhận'),
(7, 7, '2024-04-22', 220000, 'Chờ xử lý'),
(8, 8, '2024-04-21', 180000, 'Đang xử lý'),
(9, 9, '2024-04-20', 550000, 'Chờ xác nhận'),
(10, 10, '2024-04-19', 400000, 'Chờ xử lý'),
(11, 4, '2024-04-18', 320000, 'Đang xử lý'),
(12, 3, '2024-04-17', 190000, 'Chờ xác nhận'),
(13, 1, '2024-04-16', 620000, 'Chờ xử lý'),
(14, 3, '2024-06-03', 510000, 'Chờ xử lý'),
(15, 3, '2024-06-03', 130000, 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaDN` int(11) NOT NULL,
  `TenDN` varchar(50) NOT NULL,
  `MatKhau` varchar(100) DEFAULT NULL,
  `HoTen` varchar(60) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `GioiTinh` text NOT NULL,
  `GoogleID` varchar(50) NOT NULL,
  `SĐT` varchar(10) NOT NULL,
  `DiaChi` varchar(70) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HinhAnh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaDN`, `TenDN`, `MatKhau`, `HoTen`, `Role`, `GioiTinh`, `GoogleID`, `SĐT`, `DiaChi`, `Email`, `HinhAnh`) VALUES
(1, 'vannguyen', 'e10adc3949ba59abbe56e057f20f883e', 'Văn Nguyễn', 'USER', 'Nam', '123456789', '0912345678', 'Ha Noi', 'vannguyen@gmail.com', ''),
(2, 'hoangthuy', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Hoàng Thúy', 'USER', 'Nữ', '987654321', '0987654321', 'Da Nang', 'hoangthuy@gmail.com', ''),
(3, 'tranvan', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn', 'ADMIN', 'Nam', '321654321', '0901234567', 'TP. HCM', 'tranvan@gmail.com', ''),
(4, 'nguyenthithu', 'abc123', 'Nguyễn Thị Thu', 'USER', 'Nữ', '654321987', '0918273645', 'Ha Noi', 'nguyenthithu@gmail.com', ''),
(5, 'phamduc', 'def456', 'Phạm Đức', 'USER', 'Nam', '9876543210', '0934567890', 'Da Nang', 'phamduc@gmail.com', ''),
(6, 'lethi', 'ghi789', 'Lê Thị', 'USER', 'Nữ', '1234567891', '0945678901', 'TP. HCM', 'lethi@gmail.com', ''),
(7, 'tranminh', 'jkl123', 'Trần Minh', 'USER', 'Nam', '3216543212', '0956789012', 'Ha Noi', 'tranminh@gmail.com', ''),
(8, 'nguyenthihong', 'mno456', 'Nguyễn Thị Hồng', 'USER', 'Nữ', '6543219876', '0967890123', 'Da Nang', 'nguyenthihong@gmail.com', ''),
(9, 'phamvan', 'qpo789', 'Phạm Văn', 'USER', 'Nam', '9876543217', '0978901234', 'TP. HCM', 'tuongoanh0305@gmail.com', ''),
(10, 'lethithuy', 'rst123', 'Lê Thị Thúy', 'USER', 'Nữ', '1234567898', '0989012345', 'Ha Noi', 'tuongoanh0206@gmail.com', ''),
(11, 'a', '202cb962ac59075b964b07152d234b70', 'a', 'USER', 'Nữ', '', '0345807235', '140 le trong tan', 'tuongoanh020603@gmail.com', ''),
(14, 'Oanh Lê', NULL, '', '', '', '104694207343263251580', '', '', 'tuongoanh030503@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocLtp8CG9VyLi4XwnWS5kNfm0DeO5LrNPyKVAoU56YssXmovdQ=s96-c'),
(22, 'Lê Thị Tường Oanh', NULL, '', 'USER', 'Not specified', '109206529373773349017', '', '', 'tuongoanh020603@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocL859UvGVdZ071pXuNl6Mo3aqd6L2v8Acj-sMUk4to9JNdk4Q=s96-c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(70) NOT NULL,
  `TenNguoiLH` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` char(10) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `TenNguoiLH`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'Cây cảnh Phú Quốc', 'Phạm Thị Ngọc', '2021 Trần Hưng Đạo, Dương Đông, Phú Quốc', '0992012347', 'phuquoc@gmail.com'),
(2, 'Cây cảnh Quy Nhơn', 'Lê Thị Ánh', '1819 Nguyễn Tất Thành, Quy Nhơn, Bình Định', '0991012346', 'quynhon@gmail.com'),
(3, 'Cây cảnh Cần Thơ', 'Nguyễn Văn Nam', '1617 Trần Văn Đang, Ninh Kiều, Cần Thơ', '0989012345', 'cantho@gmail.com'),
(4, 'Vườn ươm cây cảnh Xanh Tươi', 'Trần Văn An', '321 Nguyễn Trãi, Thanh Xuân, Hà Nội', '0987654321', 'xanhtuoi@gmail.com'),
(5, 'Cây cảnh An Nhiên', 'Nguyễn Thị Hoa', '123 Lê Văn Lương, Cầu Giấy, Hà Nội', '0901234567', 'annhien@gmail.com'),
(6, 'Cây cảnh Sài Gòn', 'Lê Minh Tuấn', '456 Nguyễn Văn Cẩn, Gò Vấp, TP. HCM', '0934567890', 'saigon@gmail.com'),
(7, 'Vườn cây Vạn Lộc', 'Phạm Thị Mai', '789 Phan Văn Trị, Phường 10, Gò Vấp, TP. HCM', '0945678901', 'vanloc@gmail.com'),
(8, 'Cây cảnh Hà Nội', 'Nguyễn Văn Long', '1011 Âu Cơ, Tây Hồ, Hà Nội', '0956789012', 'hanoi@gmail.com'),
(9, 'Cây cảnh Đà Nẵng', 'Lê Thị Lan', '1213 Trần Phú, Hải Châu, Đà Nẵng', '0967890123', 'danang@gmail.com'),
(10, 'Cây cảnh Nha Trang', 'Phạm Thị Huệ', '1415 Phan Chu Trinh, Nha Trang, Khánh Hòa', '0978901234', 'nhatrang@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaDN` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `NgayNhap`, `MaDN`, `MaNCC`) VALUES
(1, '2024-04-24', 1, 1),
(2, '2024-04-23', 2, 2),
(3, '2024-04-22', 1, 3),
(4, '2024-04-21', 2, 1),
(5, '2024-04-20', 1, 2),
(6, '2024-04-19', 2, 3),
(7, '2024-04-18', 1, 1),
(8, '2024-04-17', 2, 2),
(9, '2024-04-16', 1, 3),
(10, '2024-04-15', 2, 1),
(11, '2024-04-14', 1, 2),
(12, '2024-04-13', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `MoTa` text NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `ChieuCao` float NOT NULL,
  `DoNang` float NOT NULL,
  `HinhAnh1` varchar(50) NOT NULL,
  `HInhAnh2` varchar(50) NOT NULL,
  `HinhAnh3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TenSP`, `MoTa`, `Gia`, `SoLuongTon`, `MaDM`, `HinhAnh`, `MaNCC`, `ChieuCao`, `DoNang`, `HinhAnh1`, `HInhAnh2`, `HinhAnh3`) VALUES
(1, 'Cây Kim Tiền', 'Cây Kim Tiền là loại cây cảnh phổ biến được ưa chuộng bởi vẻ đẹp sang trọng và ý nghĩa phong thủy tốt.', 150000, 50, 1, 'cay-kim-tien.jpg', 1, 50, 1.3, 'cay-kim-tien-1.jpg', 'cay-kim-tien-2.jpg', 'cay-kim-tien-3.jpg'),
(2, 'Cây Lưỡi Hổ', 'Cây Lưỡi Hổ được biết đến với khả năng thanh lọc không khí và mang lại may mắn cho gia chủ.', 80000, 30, 1, 'cay-luoi-ho-thai.jpg', 2, 65, 2, 'cay-luoi-ho-thai-1.jpg', 'cay-luoi-ho-thai-2.jpg', 'cay-luoi-ho-thai-3.jpg'),
(3, 'Cây Lan Ý', 'Cây Lan Ý tượng trưng cho sự thanh tao, sang trọng và sức khỏe dồi dào.', 60000, 20, 1, 'cay-lan-y.jpg', 3, 60, 2, 'cay-lan-y-1.jpg', 'cay-lan-y-2.jpg', 'cay-lan-y-3.jpg'),
(4, 'Cây Phát Lộc', 'Cây Phát Lộc mang ý nghĩa đem lại tài lộc, may mắn và thịnh vượng cho gia chủ.', 120000, 40, 2, 'cay-phat-loc-mini.jpg', 1, 44, 1.5, 'cay-phat-loc-mini-1.jpg', 'cay-phat-loc-mini-2.jpg', 'cay-phat-loc-mini-3.jpg'),
(5, 'Cây Sen Đá', 'Cây Sen Đá được ưa chuộng bởi vẻ ngoài độc đáo và khả năng sống lâu.', 50000, 60, 1, 'cay-sen-da.jpg', 2, 10, 0.5, 'cay-sen-da-1.jpg', 'cay-sen-da-2.jpg', 'cay-sen-da-3.jpg'),
(6, 'Cây Nha Đam', 'Cây Nha Đam có nhiều công dụng hữu ích như làm đẹp, trị bỏng và thanh lọc không khí.', 70000, 35, 1, 'cay-nha-dam.jpg', 3, 30, 2, 'cay-nha-dam-1.jpg', 'cay-nha-dam-2.jpg', 'cay-nha-dam-3.jpg'),
(7, 'Cây Hồng Môn', 'Cây Hồng Môn tượng trưng cho tình yêu vĩnh cửu và sự may mắn.', 90000, 25, 1, 'cay-hong-mon.jpg', 1, 50, 2, 'cay-hong-mon-1.jpg', 'cay-hong-mon-2.jpg', 'cay-hong-mon-3.jpg'),
(8, 'Cây Dạ Lan', 'Cây Dạ Lan có hương thơm dịu nhẹ, giúp thư giãn tinh thần và giảm căng thẳng.', 40000, 45, 1, 'cay-da-lan.jpg', 2, 40, 2, 'cay-da-lan-1.jpg', 'cay-da-lan-2.jpg', 'cay-da-lan-3.jpg'),
(9, 'Cây Nguyệt Quế', 'Cây Nguyệt Quế tượng trưng cho sự chiến thắng, thành công và danh tiếng.', 180000, 15, 1, 'cay-nguyet-que.jpg', 3, 30, 0.5, 'cay-nguyet-que-1.jpg', 'cay-nguyet-que-2.jpg', 'cay-nguyet-que-3.jpg'),
(10, 'Cây Trầu Bà', 'Cây Trầu Bà là loại cây cảnh leo dễ trồng và có khả năng thanh lọc không khí tốt.', 35000, 70, 1, 'cay-trau-ba-leo.jpg', 1, 100, 1, 'cay-trau-ba-leo-1.jpg', 'cay-trau-ba-leo-2.jpg', 'cay-trau-ba-leo-3.jpg'),
(11, 'Cây Phú Quý', 'Cây Phú Quý tượng trưng cho sự giàu sang, phú quý và sung túc.', 250000, 10, 1, 'cay-phu-quy.jpg', 2, 30, 2, 'cay-phu-quy-1.jpg', 'cay-phu-quy-2.jpg', 'cay-phu-quy-3.jpg'),
(12, 'Cây Kim Ngân', 'Cây Kim Ngân mang ý nghĩa đem lại tài lộc, may mắn và thịnh vượng cho gia chủ.', 130000, 30, 1, 'cay-kim-ngan-mini.jpg', 3, 40, 2, 'cay-kim-ngan-mini-1.jpg', 'cay-kim-ngan-mini-2.jpg', 'cay-kim-ngan-mini-3.jpg'),
(13, 'Cây Lan Hồ Điệp', 'Cây Lan Hồ Điệp là loại hoa lan quý phái, tượng trưng cho sự sang trọng và tinh tế.', 500000, 5, 1, 'cay-lan-ho-diep-mini.jpg', 3, 50, 2, 'cay-lan-ho-diep-mini-1.jpg', 'cay-lan-ho-diep-mini-2.jpg', 'cay-lan-ho-diep-mini-3.jpg'),
(14, 'Cây Cam', 'Cây cam ngọt, dễ trồng, thích hợp với nhiều loại đất. Quả cam thơm ngon, nhiều nước, bổ sung vitamin C cho cơ thể. Lựa chọn tuyệt vời cho các gia đình.', 150000, 60, 3, 'cay-cam.jpg', 4, 2.2, 2.5, 'hinh-anh-1.jpg', 'cay-cam2.jpg', 'cay-cam3.jpg'),
(15, 'Cây Chanh', 'Cây chanh, quả nhiều nước và giàu vitamin C. Cây phát triển tốt, dễ chăm sóc, cho năng suất cao. Phù hợp với cả trồng tại nhà và trong các vườn nông nghiệp.', 120000, 90, 3, 'cay-chanh.jpg', 5, 1.5, 2, 'hinh-anh-1.jpg', 'cay-chanh2.jpg', 'cay-chanh3.jpg'),
(16, 'Cây Dừa', 'Cây dừa, năng suất cao, cho quả lớn và nhiều nước. Cây dễ trồng, phù hợp với khí hậu nhiệt đới, mang lại giá trị kinh tế cao cho người trồng.', 300000, 40, 3, 'cay-dua.jpg', 6, 5, 7, 'hinh-anh-1.jpg', 'cay-dua2.jpg', 'cay-dua3.jpg'),
(17, 'Cây Táo', 'Cây táo, cho quả ngọt và giòn. Cây được trồng theo phương pháp hữu cơ, đảm bảo an toàn cho sức khỏe người tiêu dùng.', 220000, 70, 3, 'cay-tao.jpg', 7, 2, 2.8, 'hinh-anh-1.jpg', 'cay-tao2.jpg', 'cay-tao3.jpg'),
(18, 'Cây Nho', 'Cây nho, quả mọng nước, giàu dinh dưỡng. Cây dễ trồng, phát triển tốt trong nhiều điều kiện khí hậu khác nhau.', 260000, 85, 3, 'cay-nho.jpg', 8, 1.8, 1.5, 'hinh-anh-1.jpg', 'cay-nho2.jpg', 'cay-nho3.jpg'),
(19, 'Cây Lê', 'Cây lê, quả ngon ngọt, nhiều nước. Được trồng và chăm sóc kỹ lưỡng, cây cho năng suất cao và ổn định.', 240000, 60, 3, 'cay-le.jpg', 9, 2.5, 3.2, 'hinh-anh-1.jpg', 'cay-le2.jpg', 'cay-le3.jpg'),
(20, 'Cây Đào', 'Cây đào, quả ngọt và thơm. Cây dễ trồng, phù hợp với nhiều loại đất và khí hậu, cho quả đều và năng suất cao.', 230000, 75, 3, 'cay-dao.png', 10, 2.3, 3, 'hinh-anh-1.jpg', 'cay-dao2.jpg', 'cay-dao3.jpg'),
(21, 'Cây Mận', 'Cây mận, quả ngọt và giòn, giàu dinh dưỡng. Cây được trồng từ giống tốt, đảm bảo năng suất và chất lượng.', 210000, 90, 3, 'cay-man.jpg', 8, 1.9, 2.4, 'hinh-anh-1.jpg', 'cay-man2.jpg', 'cay-man3.jpg'),
(22, 'Cây Ăn Quả', 'Cây ăn quả chất lượng cao, được trồng và chăm sóc theo tiêu chuẩn nông nghiệp hiện đại. Cây cho quả đều, vị ngọt, thích hợp cho mọi gia đình.', 200000, 100, 3, 'cay-an-qua.jpg', 1, 2.5, 3, 'hinh-anh-1.jpg', 'cay-an-qua2.jpg', 'cay-an-qua3.jpg'),
(23, 'Cây Xoài', 'Cây xoài giống ngon, quả to và thơm ngọt. Cây được trồng từ giống chất lượng, đảm bảo mang lại sản lượng cao và ổn định cho người trồng.', 250000, 80, 3, 'cay-xoai.jpg', 2, 3, 4, 'hinh-anh-1.jpg', 'cay-xoai2.jpg', 'cay-xoai3.jpg'),
(24, 'Cây Bưởi', 'Cây bưởi chất lượng cao, cho quả ngọt và mọng nước. Được chăm sóc kỹ lưỡng, cây có khả năng chống chịu sâu bệnh tốt, phù hợp với nhiều vùng trồng.', 180000, 50, 3, 'cay-buoi.jpg', 3, 2.8, 3.5, 'hinh-anh-1.jpg', 'cay-buoi2.jpg', 'cay-buoi3.jpg'),
(25, 'Cây Bonsai Mini Vườn Nhật Truyền Thống', 'Cây bonsai mini với phong cách truyền thống của vườn Nhật. Được tạo hình tỉ mỉ, tượng trưng cho sự bền vững và thanh bình.', 150000, 20, 5, 'cay-bonsai1.jpg', 4, 0.5, 0.2, 'hinh-anh-1.jpg', 'bonsai1-2.jpg', 'bonsai1-3.jpg'),
(26, 'Cây Bonsai Hòa Mình Với Thiên Nhiên', 'Bonsai nhỏ gọn, tạo cảm giác hòa mình với thiên nhiên. Phù hợp trang trí trong nhà, mang lại sự yên bình và gần gũi.', 180000, 15, 5, 'cay-bonsai2.jpg', 4, 0.6, 0.3, 'hinh-anh-1.jpg', 'bonsai2-2.jpg', 'bonsai2-3.jpg'),
(27, 'Bonsai Cổ Thụ - Tượng Trưng Cho Sức Sống', 'Cây bonsai hình ngọn núi, tượng trưng cho sức mạnh và sự kiên nhẫn. Thích hợp làm quà tặng cho những người thân yêu.', 200000, 12, 5, 'cay-bonsai3.jpg', 4, 0.8, 0.4, 'hinh-anh-1.jpg', 'bonsai3-2.jpg', 'bonsai3-3.jpg'),
(28, 'Bonsai Hiện Đại - Sự Kết Hợp Giữa Nghệ Thuật Và Th', 'Bonsai kiểu dáng hiện đại, phù hợp với không gian trang trí hiện đại. Dễ chăm sóc và duy trì, mang lại vẻ đẹp độc đáo.', 220000, 18, 5, 'cay-bonsai4.jpg', 4, 0.7, 0.35, 'hinh-anh-1.jpg', 'bonsai4-2.jpg', 'bonsai4-3.jpg'),
(29, 'Bonsai Mini Góc Nhỏ Phòng Khách', 'Cây bonsai mini đẹp mắt, phù hợp để trang trí góc nhỏ trong phòng khách. Mang lại cảm giác thư giãn và yên bình.', 170000, 25, 5, 'cay-bonsai5.jpg', 4, 0.4, 0.25, 'hinh-anh-1.jpg', 'bonsai5-2.jpg', 'bonsai5-3.jpg'),
(30, 'Bonsai Cổ Điển - Sự Tinh Tế Của Nghệ Thuật', 'Bonsai cổ điển, phong cách truyền thống Nhật Bản. Được chế tác tỉ mỉ từ các loại cây cảnh đặc trưng, tạo nên vẻ đẹp tinh tế.', 250000, 10, 5, 'cay-bonsai6.jpg', 4, 0.9, 0.5, 'hinh-anh-1.jpg', 'bonsai6-2.jpg', 'bonsai6-3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `fk_ctdh_dh` (`MaDH`),
  ADD KEY `fk_ctdh_sp` (`MaSP`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MaCTPN`),
  ADD KEY `fk_pn_ctpn` (`MaPN`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `fk_kh_dh` (`MaDN`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaDN`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `fk_pn_dn` (`MaDN`),
  ADD KEY `phieunhap_ibfk_2` (`MaNCC`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `fk_sp_ncc` (`MaNCC`),
  ADD KEY `sanpham_ibfk_1` (`MaDM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  MODIFY `MaCTPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaDN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `fk_ctdh_dh` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `fk_ctdh_sp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `fk_pn_ctpn` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_kh_dh` FOREIGN KEY (`MaDN`) REFERENCES `nguoidung` (`MaDN`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `fk_pn_dn` FOREIGN KEY (`MaDN`) REFERENCES `nguoidung` (`MaDN`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_ncc` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
