-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2023 lúc 02:31 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chmypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `mypham_id` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `hoadon_id`, `mypham_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(1, 3, 4, 200000, 3, 600000),
(2, 3, 3, 95000, 4, 380000),
(3, 4, 13, 139000, 3, 417000),
(4, 4, 2, 419000, 1, 419000),
(5, 5, 14, 219000, 1, 219000),
(6, 6, 2, 419000, 3, 1257000),
(7, 7, 13, 139000, 2, 278000),
(8, 7, 2, 419000, 1, 419000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `mypham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `nguoidung_id`, `mypham_id`, `soluong`, `thanhtien`) VALUES
(1, 5, 1, 1, 76),
(2, 4, 1, 1, 76000),
(3, 4, 1, 1, 76000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `ngayhd` date NOT NULL,
  `ngaygiaohang` date NOT NULL,
  `dathanhtoan` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `nguoidung_id`, `ngayhd`, `ngaygiaohang`, `dathanhtoan`, `tinhtrang`, `tongtien`) VALUES
(1, 4, '0000-00-00', '0000-00-00', 0, 1, 980000),
(2, 4, '0000-00-00', '0000-00-00', 0, 0, 980000),
(3, 4, '0000-00-00', '0000-00-00', 0, 0, 980000),
(4, 5, '0000-00-00', '0000-00-00', 0, 0, 836000),
(5, 5, '0000-00-00', '0000-00-00', 0, 0, 219000),
(6, 1, '2023-12-21', '0000-00-00', 0, 0, 1257000),
(7, 6, '2023-12-21', '0000-00-00', 0, 0, 697000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimypham`
--

CREATE TABLE `loaimypham` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimypham`
--

INSERT INTO `loaimypham` (`id`, `tenloai`) VALUES
(1, 'Skincare'),
(2, 'Mỹ phẩm trang điểm'),
(3, 'Chăm sóc cơ thể');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id` int(11) NOT NULL,
  `tenlnd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`id`, `tenlnd`) VALUES
(1, 'Admin'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mypham`
--

CREATE TABLE `mypham` (
  `id` int(11) NOT NULL,
  `tenmp` varchar(255) NOT NULL,
  `loai_id` int(11) NOT NULL,
  `thuonghieu` varchar(255) NOT NULL,
  `hinhanh1` varchar(255) NOT NULL,
  `hinhanh2` varchar(255) NOT NULL,
  `hinhanh3` varchar(255) NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `mota` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mypham`
--

INSERT INTO `mypham` (`id`, `tenmp`, `loai_id`, `thuonghieu`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `giagoc`, `giaban`, `soluong`, `luotmua`, `luotxem`, `mota`, `tinhtrang`, `hinhanh`) VALUES
(1, 'Sữa Rửa Mặt Hada Labo Advanced Nourish / Perfect White / Acne Care / Pro Anti Aging Cleanser 80g - Kem Rửa Mặt Dưỡng Ẩm', 1, 'Hada Labo', 'suaruamat_hadalabo1.png', 'suaruamat_hadalabo2.png', '1702992993_suaruamat_hadalabo4.png', 100000, 67000, 36, 0, 66, '- Dưỡng da ẩm mượt, sáng mịn, tươi trẻ mỗi ngày\r\n\r\n- Bọt mịn nhẹ nhàng rửa sạch lớp tế bào chết, bụi bẫn, bã nhờn ẩn sâu trong lỗ chân lông.\r\n\r\n- Hệ dưỡng ẩm sâu HA, SHA, Nano HA cung cấp độ ẩm tối ưu cho các lớp biểu bì, khắc phục tình trạng khô sạm do mất nước, tái tạo cấu trúc đàn hồi cho làn da luôn ẩm mượt, sáng mịn.\r\n\r\n• HA (Hyaluronic Acid): 1 gram HA có khả năng ngậm hàng triệu phân tử nước, tạo màng dưỡng dưỡng ẩm bảo vệ da.\r\n\r\n• SHA (Super Hyaluronic Acid): ngậm nước gấp 2 lần HA, nhẹ nhàng thấm sâu và giữ nước lâu hơn cho tế bào da vùng trung bì.\r\n\r\n• Nano HA (Nano Hyaluronic Acid): có kích thước phân tử cực nhỏ, chỉ bằng 1/20 HA, dễ dàng len lõi đến lớp hạ bì, dưỡng ẩm sâu hơn.\r\n\r\n- Khối lượng tịnh: 80g', 1, '1702992993_suaruamat_hadalabo3.png'),
(2, 'Sữa chống nắng bảo vệ hoàn hảo Anessa Perfect UV Sunscreen Skincare Milk 60ml', 1, 'ANESSA', 'chongnang_anessa1.png', 'chongnang_anessa2.png', 'chongnang_anessa3.png', 715000, 419000, 47, 0, 280, 'Sữa chống nắng dưỡng da kiềm dầu bảo vệ hoàn hảo giúp chống UV & bụi mịn hoàn hảo dưới mọi điều kiện sinh hoạt, kể cả thời tiết khắc nghiệt nhất (phù hợp với làn da thiên dầu)', 1, '1702992951_anissassaa.png'),
(3, 'Tẩy Tế Bào Chết Cơ Thể COCOON Cà Phê ĐakLak Giúp Da Mềm Mại Và Rạng Rỡ COCOON Coffee Body Polish 200ml', 3, 'COCOON', 'taytebaochet_cocoon1.png', 'taytebaochet_cocoon2.png', 'taytebaochet_cocoon3.png', 125000, 95000, 11, 0, 10, 'CÔNG DỤNG SẢN PHẨM\r\n- Thành phần Cà phê Đăk Lăk, bơ ca cao\r\n- Làm sạch da chết toàn thân\r\n- Giúp da sáng mịn, đều màu\r\n- Mang lại làn da mịn màng và rạng rỡ\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n- Thoa một lượng sản phẩm lên da ướt\r\n- Mát xa nhẹ nhàng từ cổ đến chân, sau đó tắm sạch lại với nước\r\n- Dùng 2-3 lần/tuần để đạt kết quả tối đa', 1, '1702992856_cocoon.png'),
(4, 'Kem Nền Mịn Nhẹ Kiềm Dầu Fit Me Maybelline New York Matte Poreless Foundation 30ml', 2, 'Maybelline New York', 'kemnen_maybeline1.png', 'kemnen_maybeline2.png', 'kemnen_maybeline3.png', 200000, 200000, 7, 0, 10, '• ƯU ĐIỂM NỔI BẬT\r\n- Kềm dầu tốt, cho lớp nền luôn mịn lì. \r\n - Độ che phủ trung bình- cao, che khuyết điểm & lỗ chân lông hoàn hảo. \r\n - Hiệu ứng mịn nhẹ tự nhiên\r\n - 12 tông màu tiệp mọi tông da. \r\n - Kem nền lý tưởng cho da thường, da hỗn hợp và da dầu.\r\n - Bao bì cải tiến với đầu nhấn tiện lợi.\r\n• HIỆU QUẢ SỬ DỤNG\r\nKem nền Fit Me được đánh giá cao bởi người tiêu dùng với khả năng kiềm dầu tốt, lên da mịn nhẹ tự nhiên nhưng vẫn che phủ tốt khuyết điểm và lỗ chân lông.', 1, '1702992763_kemnen_maybeline.png'),
(5, 'Vaseline Body Tone-Up Sữa dưỡng thể nâng tông tức thì 300ML', 3, 'VASELINE', 'h1.png', 'h2.png', 'h3.png', 190000, 148000, 20, 0, 4, 'VASELINE BODY TONE-UP, SỮA DƯỠNG THỂ NÂNG TÔNG TỨC THÌ \r\n\r\n\r\n\r\nNâng tông: Công thức với các vi chất phản quang giúp da trông sáng rạng rỡ tức thì gấp 4 lần* và đóng vai trò như màng lọc tia UV bảo vệ da khỏi tác hại của ánh nắng mặt trời. \r\n\r\nCải thiện: Niacinamide giúp ngăn ngừa các hư tổn tích tụ trong tế bào da, giúp cải thiện tình trạng da sạm màu hiệu quả. \r\n\r\nThúc đẩy: Hệ Vitamin kép từ Vitamin C và E giúp thúc đẩy quá trình sản sinh collagen, cho da trông căng mịn và săn chắc. \r\n\r\nPhục hồi: Các giọt Vaseline Jelly giúp khóa ẩm từ sâu bên trong** và cân bằng độ ẩm cho da.\r\n\r\n\r\n\r\nCảm nhận làn da trông sáng rạng rỡ tức thì gấp 4 lần* cùng Tinh chất Dưỡng thể Nâng Tông Vaseline!\r\n\r\n\r\n\r\n*Dựa theo kết quả kiểm nghiệm, so với sữa dưỡng thể không có chức năng dưỡng sáng. Kết quả này có thể thay đổi tùy vào màu da người.\r\n\r\n**Ở tầng biểu bì.\r\n\r\n\r\n\r\nHướng dẫn sử dụng: Để đạt hiệu quả tối ưu, làm sạch da trước khi sử dụng để da thông thoáng, dễ hấp thu dưỡng chất. Thoa đều sản phẩm lên cánh tay, chân và toàn thân để tránh sản phẩm dính lên quần áo. Nên sử dụng 2 lần mỗi ngày. \r\n\r\nHSD: 2 năm kể từ ngày sản xuất\r\n\r\nXuất xứ : Thái Lan\r\n\r\nBao bì cũ 320ml, bao bì mới 300ml\r\n\r\n\r\n\r\n***  Bao bì có thể thay đổi tùy đợt nhập hàng', 1, 'h.png'),
(8, 'Xịt thơm miệng kissing spray ACEMAN nam nữ 10ml hương vị tự nhiên the mát', 3, 'ACEMAN ', 'b1.png', 'b2.png', 'b3.png', 100000, 50000, 50, 0, 0, '- Sản phẩm về không đều các loại hương vị nên shop giao hương vị ngẫu nhiên, khách cần yêu cầu vị nào vui lòng inbox với shop ạ -\r\nXịt thơm miệng kissing spray ACEMAN nam nữ 10ml hương vị tự nhiên the mát\r\nBộ đôi xịt miệng ACE 10ml/chai vị trái cây dâu tây và ổi đào mang lại hơi thở the mát ngọt ngào\r\n+ Hương ổi đào: Tasty Kiss\r\n+ Hương dâu tây: Sweet Kiss\r\n\r\n\r\n\r\n*** Cách sử dụng sản phẩm hiệu quả:\r\n- Mở bằng cách rút nắp chai - không được xoay đầu chai tránh để nước chảy ra ngoài\r\n- Xịt vào hai bên khoang miệng, không xịt vào họng hoặc xịt lên môi\r\n- Đóng nắp chai sau khi sử dụng\r\n- Vị cay và the mát nhờ chiết xuất bạc hà giúp hơi thở the mát, sảng khoái\r\n- Vị đắng nhẹ của rễ cam thảo tốt cho răng miệng, tránh vi khuẩn gây mùi.\r\n- Lưu hương từ 10-20p tuỳ theo hoạt động ăn uống, nói chuyện, điều tiết nước bọt... của mỗi người\r\n- Có thể nuốt và sử dụng nhiều lần trong ngày\r\n- Sử dụng trước khi hôn 5-10p để có nụ hôn ngọt ngào, lôi cuốn\r\n\r\n*** Công dụng của sản phẩm:\r\n+ Khử mùi trên khoang miệng, tạo hơi thở the mát, tự tin khi giao tiếp.', 1, 'b.png'),
(9, 'Phấn tươi SUNISA Che khuyết điểm, kháng nước , dùng được cho cả bà bầu', 2, 'SUNISA ', 'c1.png', 'c2.png', 'c3.png', 175000, 175000, 75, 0, 0, 'PHẤN NƯỚC SUNISA siêu sock\r\n( NHANH TAY KẺO LỠ SIÊU PHẨM ) \r\n #gom #oder 24h \r\n=> #169K_SET FREE LUN CỌ MÚT TÁN KEM\r\nNhanh thui khách ơiii. \r\nThị trường bán toàn 2xx :)) \r\n( không sale thì 450k-500k như thường) (TẶNG kèm cọ)\r\nem này tik tok hót lắm ai xem la biết , em bán loại chính hãng cty 100% nhé\r\n\r\n????Hàng hãng chuẩn nội địa ,đang rất hot ở bên đó) ,Phấn sunisa chỉ có 1 tông duy nhất \r\n\r\n????Bao mướt ,bao mượt ,bao bật tông ,bao chống nước\r\n\r\n???? Phấn lên da không bết ,không vón cục.\r\n\r\n???? Thích hợp cho mọi loại da ,không gây kích ứng\r\n\r\n????????CHỈ VỚI 1 BƯỚC DẶM PHẤN BẠN CÓ NGAY LỚP MAKEUP HOÀN HẢO\r\n????Khả năng chống nước cực cao Tha hồ bơi lội mà không lo trôi phấn chống được bụi bẩn\r\n???? Ưu điểm vượt trội:\r\n???? Khả năng che phủ hoàn hảo giúp che phủ cực tốt các khuyết điểm trên da thích hợp cho các nàng \"mèo lười\" khi trang điểm.\r\n???? Duy trì lớp trang điểm trong thời gian dài mà không xảy ra hiện tượng xuống tông khiến khuôn mặt bị tối.\r\n???? Phấn tạo cảm giác da mướt, mượt mà không bị mốc hay khô da.\r\n???? Độ kiềm dầu tốt, phù hợp với cả bạn da dầu hay hỗn hợp dầu đến da thường.\r\n???? Kết cấu kem mềm mỏng mịn giúp tăng khả năng bám trên da và không bị bết dính. Lớp nền mỏng nhẹ, thích hợp với kiểu trang điểm trong suốt\r\n???? Chỉ số chống nắng cao SPF 50++ PA????☀', 1, 'c.png'),
(10, 'Kem Dưỡng Da Tay Maycreate Mềm Mịn, Cấp Ẩm Với Hương Hoa Cỏ & Trái Cây Thơm Mát', 3, 'MAYCREATE', 'a1.png', 'a.png', 'a2.png', 50000, 50000, 40, 0, 0, 'Kem Dưỡng Da Tay Maycreate Mềm Mịn, Cấp Ẩm Với Hương Hoa Cỏ & Trái Cây Thơm Mát\r\n- Trọng lượng: 30gr\r\n- Tiện lợi, nhỏ gọn, xinh xắn, có thể mang theo mọi lúc mọi nơi \r\n- Mùi hương quyến rũ, ngọt ngào \r\n- Giúp dưỡng ẩm, mềm da \r\n- Giúp giảm khô da, nứt da, lẻ, hanh, xước móng rô,... \r\n- Lưu lại trên da tay hương thơm chiết xuất từ tự nhiên dịu nhẹ, dễ chịu. \r\n\r\n- 10 mùi hương mới với một phiên bản hoàn toàn mới gồm các mùi: \r\n1) Freesia: Chi Fressia là một loài hoa họ Diên Vĩ \r\n2) Natural Locust: hoa dương hoè \r\n3) Lilium Brownii: hoa ly \r\n4) Green Tea: Trà xanh \r\n5) Natural Rose: Hoa hồng \r\n6) Apple Mango: Xoài táo \r\n7) Juicy Peach: Đào \r\n8) Grapefruit: Bưởi \r\n9) Wild Berry: Dâu rừng ~ Phúc bồn tử \r\n10) Shea Butter: Bơ hạt mỡ \r\n\r\n????Hướng dẫn sử dụng: \r\n- Thoa đều kem lên da tay 1 lớp mỏng. \r\n- Massage đều cả 2 tay từ trong ra ngoài và các kẽ ngón tay khoảng 1-2 phút', 1, 'a2.png'),
(11, 'COLORKEY Watery Matte Lip Tint, Son Watertint, chất son tint bóng nước sau 40 giây lớp tint bóng sẽ trở thành lớp nhung mờ lì không trôi', 2, 'COLORKEY ', 'e1.png', 'e2.png', 'e3.png', 248000, 133000, 33, 0, 0, 'Thời gian giao hàng dự kiến cho sản phẩm này là từ 7-9 ngày\r\nSon môi COLORKEY Kolaki màu bóng mờ không dính cốc ánh gương 1.8g\r\nThương hiệu: COLOR KEY\r\nTên sản phẩm: son môi COLORKEY Koraki dưỡng ẩm mềm mại như nước\r\nXuất xứ: Trung Quốc đại lục\r\nPhân loại màu sắc: O302 P307 P306 R301 R303 P304 B305 R300 O308\r\nSố giấy chứng nhận đăng ký mỹ phẩm: Trang điểm Thượng Hải G2022002027\r\nCông dụng: dưỡng ẩm\r\nThông tin sản phẩm: Bình thường\r\nPhong cách: cơ bản\r\nMỹ phẩm chuyên dụng: Không\r\nKhối lượng tịnh: 1,8g\r\nThời hạn sử dụng: 36 tháng', 1, 'e.png'),
(12, 'Son Thỏi Siêu Mịn Romand New Zero Matte Lipstick Shell Beach Nude Collection', 2, 'ROMAND', 'd1.png', 'd2.png', 'd3.png', 200000, 200000, 56, 0, 2, '‼️ROMAND ZERO MATTE LIPSTICK MỚI RA LÒ NÓNG \"BỎNG\" MÔI cập bến nha cả nhà.\r\n[MẪU MỚI 2020 NEW ARRIVAL] SON THỎI LÌ SIÊU NHẸ MÔI ROMAND ZERO MATTE LIPSTICK DIỆN MẠO MỚI XINH GẤP MƯỜI LẦN DÒNG CŨ, BẢNG MÀU LÊN ĐẾN 20 MÀU SON TỪ NHẠT ĐẾN ĐẬM CỰC KÌ THỜI THƯỢNG ????????????\r\n\r\n????Diện mạo mới xinh gấp mười lần dòng Zero Gram cũ, thiết kế thân son dáng trụ vuông cầm siêu chắc tay, vỏ son xám đục và nude trong suốt bao bọc bên ngoài lõi son cực kì độc đáo và sang chảnh.\r\n???? Hạt phấn tạo màu nhỏ trong chất son của Zero Gram Lipstick khiến cho màu son lên chuẩn và tạo được độ mịn lì nhất có thể, chất son mỏng nhẹ và siêu nhẹ môi, mịn màng lướt trên môi không mang lại cảm giác bết dính khó chịu.\r\n????Bảng màu son lên đến 20 tông màu cực kì đa dạng dễ dàng lựa chọn, từ tông nhạt nhất đến tông đậm nhất đều có, thích hợp dùng trong mọi concept makeup và sử dụng hàng ngày siêu tiện lợi.\r\n\r\n• 01 DUSTY PINK (hồng khô)\r\n• 02 ALL THAT JAZZ (cam san hô đất)\r\n• 03 SILHOUETTE (hồng cam đất)\r\n• 04 BEFORE SUNSET (hồng đất)\r\n• 05 EVENING (cam đất)\r\n• 06 AWESOME (nude đào) [Nude Collection]\r\n• 07 ENVY ME (nude hồng đất) [Nude Collection]\r\n• 08 ADORABLE (nude hồng cam) [Nude Collection]\r\n• 09 SHELL NUDE (nude) [Nude Collection]\r\n• 10 PINK SAND (nude hồng) [Nude Collection]\r\n• 11 SUNLIGHT (hồng lạnh)\r\n• 12 SOMETHING (đỏ thuần)\r\n• 13 RED CARPET (đỏ đất lạnh)\r\n• 14 SWEET P (hồng tím nâu)\r\n• 15 MIDNIGHT (đỏ nâu mận)\r\n• 16 DAZZLE RED (cam đỏ)\r\n• 17 RED HEAT (đỏ hồng)\r\n• 18 TANNING RED (đỏ cam đất)\r\n• 19 RED SURFER (hồng đỏ tươi)\r\n• 20 RED DIVE (đỏ rượu)\r\n\r\nTrọng lượng: 3gr\r\nThương hiệu: ROMAND\r\nXuất xứ: Hàn Quốc\r\n#romand #romandzerogrammattelipstick #romandzeromattelipstick #zeromatte #zeromattelipstick #romandnewzeromatte #romandzero #romandyou #romandlipstick #zerogram #zerogramlipstick #zerogrammattelipstick #romandzerogram #sonromand #sonli #sonlì #sonthoi #sonthoili #sonlihanquoc #sonhanquoc\r\nPhân phối bởi THE SHILLA Duty Free\r\nĐịa chi: (100-856) 249, Dongho-ro, Jung-gu, Seoul, Republic of Korea', 1, 'd.png'),
(13, '[GARNIER] Nước Tẩy Trang Cho Da Dầu Mụn,Hỗn Hợp Làm Sạch Sâu Dịu Nhẹ Micellar Water For Oily & Acne-Prone Skin 400/125ml', 1, 'GARNIER', 'f1.png', 'f2.png', 'f3.png', 159000, 139000, 43, 0, 20, 'NƯỚC TẨY TRANG CHO DA DẦU MỤN, HỖN HỢP LÀM SẠCH SÂU DỊU NHẸ GARNIER MICELLAR WATER FOR OILY & ACNE-PRONE SKIN 400/125ML\r\n- Nhập khẩu và phân phối: Công ty TNHH L\'OREAL Việt Nam\r\n- Dung tích: + Big size : 400ml\r\n                    + Full size : 125ml\r\n- Hạn sử dụng (EXP): 36 tháng\r\n• Nước Tẩy Trang làm Sạch Sâu Garnier Micellar Cleansing Water là nước tẩy trang với chiết xuất thành phần từ thiên nhiên an toàn có khả năng làm sạch cặn bẩn, tế bào chết và lớp trang điểm đậm, sản phẩm phù hợp với mọi loại da mang đến trải nghiệm tươi mát và dễ chịu thuộc thương hiệu Garnier đến từ Pháp.\r\n• Nước tẩy trang Garnier Micellar Water For Oily & Acne-Prone Skin nhẹ nhàng làm sach da, lấy đi bụi bẩn, cặn trang điểm và dầu thừa gây ra tình trạng mụn.\r\n• Công thức lành tính, đặc biệt an toàn.\r\n????ƯU ĐIỂM NỔI BẬT????\r\n • Sản phẩm sử dụng công nghệ Micelles (Micellar Technology), phân tử Micelles nhẹ nhàng lấy đi bụi bẩn, bã nhờn nằm sâu bên trong lỗ chân lông theo cơ chế hoạt động của nam châm khi lau nhẹ trên da mà không cần chà xát, hạn chế gây tổn thương cho làn da. \r\n•  Làn da sạch thoáng, không còn dầu thừa và giảm bớt nguy cơ gây mụn.\r\n • Công thức không chứa cồn và hương liệu đã dược kiểm nghiệm bởi bác sĩ da liễu an toàn cho làn da.', 1, 'f1.png'),
(14, 'Nước Hoa Hồng Dear Klairs Supple Preparation Unscented Toner Không Mùi Dưỡng Ẩm Và Làm Mềm Da 180ml', 2, 'KLAIRS', 'g1.png', 'g2.png', 'g3.png', 320000, 219000, 53, 0, 0, 'Nước Hoa Hồng Dear Klairs Supple Preparation Unscented Toner Không Mùi Dưỡng Ẩm Và Làm Mềm Da 180ml\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n- Thương hiệu: Dear, Klairs\r\n- Xuất xứ: Hàn Quốc\r\n- Nơi sản xuất: Hàn Quốc\r\n- Dung tích: 180ml\r\n- Hạn sử dụng: 3 năm kể từ ngày sản xuất.\r\n- Ngày sản xuất: Xem trên bao bì sản phẩm.\r\n\r\nMÔ TẢ VỀ SẢN PHẨM\r\nNước hoa hồng không mùi Dear, Klairs Supple Preparation Unscented Toner dưỡng ẩm và mềm da chiết xuất từ thực vật, giúp cân bằng độ pH, tăng cường hiệu quả chăm sóc da. Toner có dạng trong suốt, không màu, lỏng, nhẹ, hơi nhớt, thấm rất nhanh trên da. Giúp loại bỏ bụi bẩn và bã nhờn dư thừa trên da sau khi rửa mặt đồng thời cân bằng độ pH để các bước skincare tiếp theo đạt hiệu quả hơn.\r\nLoại da phù hợp :\r\n- Mọi loại da đặc biệt là da siêu nhạy cảm.\r\n- Da dễ bị kích ứng mẫn đỏ.\r\n\r\nCÔNG DỤNG SẢN PHẨM\r\n- Cấp ẩm tức thì cho da, làm dịu làn da khô căng, kích ứng \r\n- Cân bằng độ pH trên da: tăng hiệu quả của quá trình chăm sóc da hàng ngày.\r\n- Sodium Hyaluronate: Cấp nước vượt trội, giúp da được ẩm mượt và mềm mại.\r\n- Phyto-Oligo: dưỡng ẩm, giúp da không bị khô.\r\n- Axit Amin lúa mì: có công dụng chống viêm, giúp giảm viêm và cung cấp độ ẩm sâu.\r\n- Kết cấu sản phẩm là dạng lỏng khi thoa lên da bạn sẽ cảm thấy da được cung cấp một lượng nước và độ ẩm rất lớn.\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n- Sau bước làm sạch da, cho một lượng toner vừa đủ ra tay hoặc bông tẩy trang và thoa đều lên da mặt theo chiều vòng tròn.\r\n- Vỗ hoặc massage  nhẹ nhàng để toner thẩm thấu hết vào da.\r\n- Tiếp tục với các bước chăm sóc tiếp theo như serum, kem dưỡng.\r\n- Sử dụng mỗi ngày 2 lần vào buổi sáng và tối.\r\nBảo quản :\r\n- Tránh ánh nắng trực tiếp.\r\n- Để nơi khô ráo, thoáng mát.\r\n- Đậy nắp kín sau khi sử dụng.\r\nLưu ý :\r\n- Tác dụng có thể khác nhau tuỳ cơ địa của người dùng.', 1, 'hhhhhh.png'),
(17, 'zssdfsd', 1, 'kjhkj', '1702992856_taytebaochet_cocoon1.png', '1702992856_taytebaochet_cocoon2.png', '1702992856_taytebaochet_cocoon3.png', 0, 0, 0, 0, 0, 'khjhkj', 1, '1702992856_taytebaochet_cocoon3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `loaind_id` int(11) NOT NULL,
  `diachi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `tennd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `matkhau`, `loaind_id`, `diachi`, `email`, `sdt`, `hinhanh`, `tinhtrang`, `tennd`) VALUES
(1, '84ab32ea4aabd841a551846b050a873a', 1, 'An Giang', 'admin@gmail.com', '0123456789', 'admin.png', 1, 'Quản Trị Viên'),
(4, '84ab32ea4aabd841a551846b050a873a', 2, 'An Giang', 'abc@gmail.com', '0123456789', 'user1.png', 1, 'User'),
(5, '84ab32ea4aabd841a551846b050a873a', 2, 'Châu Thành, An Giang', 'nva@gmail.com', '000011111', 'user2.png', 1, 'Nguyễn Văn B'),
(6, '84ab32ea4aabd841a551846b050a873a', 2, 'An Giang', 'ltl@gmail.com', '0456456456', 'user1.png', 1, 'Lê Thị Lẹ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nd_ms` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hd_id` (`hoadon_id`),
  ADD KEY `mp_id` (`mypham_id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nd_gh` (`nguoidung_id`),
  ADD KEY `mp_gh` (`mypham_id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `loaimypham`
--
ALTER TABLE `loaimypham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mypham`
--
ALTER TABLE `mypham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_id` (`loai_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaind_id` (`loaind_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loaimypham`
--
ALTER TABLE `loaimypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mypham`
--
ALTER TABLE `mypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `nd_ms` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `hd_id` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `mp_id` FOREIGN KEY (`mypham_id`) REFERENCES `mypham` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `mp_gh` FOREIGN KEY (`mypham_id`) REFERENCES `mypham` (`id`),
  ADD CONSTRAINT `nd_gh` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `nguoidung_id` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `mypham`
--
ALTER TABLE `mypham`
  ADD CONSTRAINT `loamp_id` FOREIGN KEY (`loai_id`) REFERENCES `loaimypham` (`id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `loaind_id` FOREIGN KEY (`loaind_id`) REFERENCES `loainguoidung` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
