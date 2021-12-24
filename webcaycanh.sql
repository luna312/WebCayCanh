-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 21, 2021 lúc 10:05 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webcaycanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluanblog`
--

DROP TABLE IF EXISTS `binhluanblog`;
CREATE TABLE IF NOT EXISTS `binhluanblog` (
  `MaBLB` int(11) NOT NULL AUTO_INCREMENT,
  `MaBlog` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `NgayBL` datetime DEFAULT NULL,
  `NoiDungBL` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`MaBLB`),
  KEY `FK_BinhLuanBlog` (`MaBlog`),
  KEY `FK_MaTKBlog` (`MaTK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluansp`
--

DROP TABLE IF EXISTS `binhluansp`;
CREATE TABLE IF NOT EXISTS `binhluansp` (
  `MaBL` int(11) NOT NULL AUTO_INCREMENT,
  `MaSP` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `NgayBL` datetime DEFAULT NULL,
  `NoiDungBL` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`MaBL`),
  KEY `FK_BinhLuan` (`MaSP`),
  KEY `FK_MaTK` (`MaTK`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluansp`
--

INSERT INTO `binhluansp` (`MaBL`, `MaSP`, `MaTK`, `NgayBL`, `NoiDungBL`) VALUES
(1, 1, 2, '2021-07-21 09:20:57', 'test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `MaBlog` int(11) NOT NULL AUTO_INCREMENT,
  `HinhAnh` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TieuDe` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TTND` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci,
  `SoLanXem` int(11) DEFAULT '0',
  `NgayDang` datetime DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaBlog`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`MaBlog`, `HinhAnh`, `TieuDe`, `TTND`, `NoiDung`, `SoLanXem`, `NgayDang`, `MaTK`) VALUES
(1, 'kimngan.jpg', 'Thiết kế thi công cảnh quan cây xanh ban công nhà chung cư !', 'Việc thiết kế trang trí cảnh quan cây xanh ban công nhà chung cư đang trở nên rất phổ biến…', 'ND1', 0, '2020-12-30 00:00:00', 1),
(2, 'xuongrong.jpg', 'Kỹ thuật trồng và chăm sóc cây mai vạn phúc luôn xanh tốt', 'Cây mai vạn phúc khá quen thuộc trong cuộc sống hàng ngày. Chúng thường được trồng thành bụi, khóm để…', 'ND2', 0, '2020-12-30 00:00:00', 1),
(3, 'thanhson.jpg', 'Trang trí ban công bằng cây hoa sam nhật thật đẹp', 'Nhiều người đang tìm hiểu về cây hoa sam Nhật có hình dáng, đặc thù như thế nào? Hãy tham…', 'ND3', 0, '2020-12-30 00:00:00', 1),
(4, 'sandanau.jpg', 'Vẽ đẹp của cây hoa sim tím như cái tên của bài hát', 'Cây hoa sim tím đã đi vào lòng người ngày thì thuở nao, các nhà thơ, nhạc sĩ đã lấy…', 'ND4', 0, '2020-12-30 00:00:00', 1),
(5, 'kimtien.jpg', 'Hoa hồng trứng đang rất được săn đón hợp với ban công ngôi nhà ', 'Khi nói đến loài hoa hồng trứng thì chúng ta có thấy xa lạ với cái tên gọi này không?…', 'ND5', 0, '2020-12-30 00:00:00', 1),
(6, 'taitho.jpg', 'Cây hoa ngũ sắc làm cảnh quan, trang trí sân vườn thật nổi bật', 'Thế giới Cây và Hoa đang là nơi bán cây hoa ngũ sắc làm cảnh quan uy tín nhất tại…', 'ND6', 0, '2020-12-30 00:00:00', 1),
(7, 'kimngan.jpg', 'Cây mai hoàng yến nở vàng rực trong khu vườn nhà bạn', 'Bán cây mai hoàng yến đẹp sử dụng để trang trí cho mọi không gian, đang được thị trường ưa…', 'ND7', 0, '2020-12-30 00:00:00', 1),
(8, 'ngugia.jpg', 'Cây hoa tử đằng loài cây dây leo nở hoa đẹp, cho mùa hè thêm mát', 'Nhắc đến hoa tử đằng thì người ta nhớ đến đất nước Nhật Bản, thế nhưng cây hoa tử đằng…', 'ND8', 0, '2020-12-30 00:00:00', 1),
(9, 'phuquy.jpg', 'Hướng dẫn trồng và chăm sóc cây cà gai leo năng suất cao', 'Trên thực tế, chúng ta nghe đến cái tên cà gai leo rất nhiều. Cây cà gai leo là một…', 'ND9', 0, '2020-12-30 00:00:00', 1),
(10, 'kimngan.jpg', 'Ý nghĩa và tác dụng tuyệt vời của cây cần thăng là gì ?', 'Cây cần thăng, tên khoa học là Feoniella lucida, là một loài cây lấy gỗ lớn, nếu sống trong tự…', 'ND10', 0, '2020-12-30 00:00:00', 1),
(11, 'thuylap.jpg', 'Cây hạnh phúc – Làm xao xuyến trái tim bao người', 'Cuộc sống hiện đại khiến con người ta ngày càng bận rộn và luôn bị cuốn vào vòng xoay công…', 'ND11', 0, '2020-12-30 00:00:00', 1),
(12, 'kimngan.jpg', 'Cây thiên môn đông dùng trang trí nội thất gia đình !', 'Vừa nhắc đến cái tên cây thiên môn đông thì chúng ta đã nghĩ ngay ra đây là một cây…', 'ND12', 0, '2020-12-30 00:00:00', 1),
(13, 'kimngan.jpg', 'Cây thiên môn đông dùng trang trí nội thất gia đình !', 'Vừa nhắc đến cái tên cây thiên môn đông thì chúng ta đã nghĩ ngay ra đây là một cây…', 'ND12', 0, '2020-12-30 00:00:00', 1),
(14, 'kimngan.jpg', 'Cây thiên môn đông dùng trang trí nội thất gia đình !', 'Vừa nhắc đến cái tên cây thiên môn đông thì chúng ta đã nghĩ ngay ra đây là một cây…', 'ND12', 0, '2020-12-30 00:00:00', 1),
(15, 'kimngan.jpg', 'Cây thiên môn đông dùng trang trí nội thất gia đình !', 'Vừa nhắc đến cái tên cây thiên môn đông thì chúng ta đã nghĩ ngay ra đây là một cây…', 'ND12', 0, '2020-12-30 00:00:00', 1),
(16, '16.jpg', 'test', 'test', 'test', 0, '2021-07-21 00:00:00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL AUTO_INCREMENT,
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SL` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaCTDH`),
  KEY `FK_CTDH` (`MaDH`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCTDH`, `MaDH`, `MaSP`, `SL`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `MaDH` int(11) NOT NULL AUTO_INCREMENT,
  `MaTK` int(11) NOT NULL,
  `NgayLapDH` datetime DEFAULT NULL,
  `TenKH` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PTTT` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrinhTrang` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaDH`),
  KEY `FK_MaTKDH` (`MaTK`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaTK`, `NgayLapDH`, `TenKH`, `DiaChi`, `SDT`, `PTTT`, `TrinhTrang`, `ThanhTien`) VALUES
(1, 2, '2021-07-21 00:00:00', 'Tèo', 'test', '123', 'Thanh Toán Trực Tiếp', 'Đang Chờ Xử Lý', 127000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLoaiSP`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSP`, `TenLoaiSP`) VALUES
(1, 'Cây phong thủy'),
(2, 'Cây trong nhà'),
(3, 'Cây văn phòng'),
(4, 'Cây dây leo'),
(5, 'Cây để bàn'),
(6, 'Cây sân vườn'),
(7, 'Cây thủy sinh'),
(8, 'Cây xương rồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSP` int(11) NOT NULL AUTO_INCREMENT,
  `MaLoaiSP` int(11) NOT NULL,
  `TenSP` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoLuongSP` int(11) DEFAULT NULL,
  `HinhAnh` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NhaCC` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TienSP` int(11) DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLanXem` int(11) DEFAULT '0',
  `Mota` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`MaSP`),
  KEY `FK_SANPHAM_LOAISP` (`MaLoaiSP`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLoaiSP`, `TenSP`, `SoLuongSP`, `HinhAnh`, `NhaCC`, `TienSP`, `NgayCapNhat`, `SoLuongBan`, `SoLanXem`, `Mota`) VALUES
(1, 1, 'Bonsai', 13, 'kimngan.jpg', 'Trường An', 123000, '2020-12-30 00:00:00', 400, 0, 'Bonsai ( Hán-Việt: bồn tài, nghĩa là \"cây con trồng trong chậu\") là loại cây cảnh nhỏ có dáng cổ thụ trồng trong chậu cảnh.\r\nNghệ thuật bonsai có nguồn gốc từ Trung Quốc, sau đó nó được phổ biến sang Nhật Bản và Hàn Quốc khi họ phát hiện trên núi có các cây nhỏ mọc hoang dã giống cây cổ thụ, có sức sống mãnh liệt trong mọi điều kiện khó khăn, sau đó người ta đem nó về trồng trong chậu nhỏ và cắt tỉa, uốn sửa tạo dáng cho đẹp hơn.\r\nBonsai có vị trí đặc biệt trong cộng đồng cư dân sống tại Trung hoa\r\nvà những người Hoa sống ở Đài Loan, Thái Lan và Singapore. Những nghệ nhân bậc thầy về bonsai của Trung Quốc ngày nay vẫn tạo ra sự khác biệt giữa nghệ thuật bonsai và nghệ thuật bồn cảnh.\r\nNghệ thuật bồn cảnh xuất hiện từ thời kỳ đầu của nhà Hán (khoảng năm 206 TCN đến năm 220). Một trong những truyền thuyết của Trung Quốc cho rằng vào thời này, có vị hoàng đế đã tạo ra phong cảnh trong sân vườn của ông với núi đồi, thung lũng, sông hồ, cây cối. Nơi này miêu tả cho cảnh vật trong đế quốc của ông và ông có thể ngắm toàn bộ \"vương quốc\" thu nhỏ của mình qua khung cửa sổ. Phong cảnh nghệ thuật này chỉ mình ông sở hữu và cấm mọi người ngắm nhìn. Đây chính là truyền thuyết nói về nghệ thuật tạo hình cây cối, nhà cửa, con người, thú vật ở Trung Quốc.\r\nCòn nói về bonsai, có truyền thuyết cho rằng vào triều đại nhà Tần (năm 221 TCN đến năm 226 TCN), Đào Uyên Minh (còn gọi là Đào Tiềm) là một nhà thơ nổi tiếng và là quan chức có vị trí cao trong xã hội. Ông đã mệt mỏi với công việc triều chính, về ở ẩn tại một nơi hoang vắng và thanh tĩnh. Tại đây ông bắt đầu trồng cây hoa cúc vào trong chậu. Đây là bước khởi đầu của việc trồng cây trong chậu.\r\nNăm 1972, người ta phát hiện ra cây bonsai trong hầm mộ của hoàng tử Zhang - huai (đời nhà Đường, từ năm 618 đến năm 907).\r\nNăm 1000, vào triều đại nhà Tống, có những bài thơ miêu tả bồn cảnh và nhiều tài liệu dạy cách tạo ra tác phẩm bonsai.\r\nVào triều đại nhà Nguyên (từ năm 1280 đến năm 1368), những vị bộ trưởng và thương gia người Nhật đã đưa những cây bonsai từ Trung Quốc về Nhật Bản, xem nó như là những món quà tặng.\r\nCuối triều đại nhà Minh, Chu Shun - sui, một vị quan Trung Quốc, vì không chịu được luật lệ hà khắc đã bỏ trốn sang Nhật. Khi đi ông đã mang theo toàn bộ tuyển tập cây cảnh. Ông đã góp phần quảng bá nghệ thuật cây cảnh ở Nhật Bản. Thời ấy Nhật Bản đã tạo ra một cách riêng trong việc trồng bonsai. Đây là một nghệ thuật dành cho giới quý tộc, đó là giới samurai và đến cuối thế kỷ mới trở thành sở thích của mọi tầng lớp trong xã hội Nhật Bản.\r\nVào triều đại nhà Thanh (từ năm 1644 đến năm 1911) bồn cảnh và bonsai trở thành sở thích của tất cả các tầng lớp trong xã hội Trung Quốc.\r\nNăm 1879, người Nhật đã giới thiệu bonsai đến hội chợ thế giới tại Paris rồi tới London vào năm 1909.\r\nNăm 1989, nghệ thuật bonsai đã phát triển đến giai đoạn phổ thông trên khắp thế giới.'),
(2, 1, 'Mộc Lan', 52, 'moclan.jpg', 'Đức Thịnh', 59000, '2020-12-30 00:00:00', 999, 0, 'Bonsai ( Hán-Việt: bồn tài, nghĩa là \"cây con trồng trong chậu\") là loại cây cảnh nhỏ có dáng cổ thụ trồng trong chậu cảnh.\r\nNghệ thuật bonsai có nguồn gốc từ Trung Quốc, sau đó nó được phổ biến sang Nhật Bản và Hàn Quốc khi họ phát hiện trên núi có các cây nhỏ mọc hoang dã giống cây cổ thụ, có sức sống mãnh liệt trong mọi điều kiện khó khăn, sau đó người ta đem nó về trồng trong chậu nhỏ và cắt tỉa, uốn sửa tạo dáng cho đẹp hơn.\r\nBonsai có vị trí đặc biệt trong cộng đồng cư dân sống tại Trung hoa\r\nvà những người Hoa sống ở Đài Loan, Thái Lan và Singapore. Những nghệ nhân bậc thầy về bonsai của Trung Quốc ngày nay vẫn tạo ra sự khác biệt giữa nghệ thuật bonsai và nghệ thuật bồn cảnh.\r\nNghệ thuật bồn cảnh xuất hiện từ thời kỳ đầu của nhà Hán (khoảng năm 206 TCN đến năm 220). Một trong những truyền thuyết của Trung Quốc cho rằng vào thời này, có vị hoàng đế đã tạo ra phong cảnh trong sân vườn của ông với núi đồi, thung lũng, sông hồ, cây cối. Nơi này miêu tả cho cảnh vật trong đế quốc của ông và ông có thể ngắm toàn bộ \"vương quốc\" thu nhỏ của mình qua khung cửa sổ. Phong cảnh nghệ thuật này chỉ mình ông sở hữu và cấm mọi người ngắm nhìn. Đây chính là truyền thuyết nói về nghệ thuật tạo hình cây cối, nhà cửa, con người, thú vật ở Trung Quốc.\r\nCòn nói về bonsai, có truyền thuyết cho rằng vào triều đại nhà Tần (năm 221 TCN đến năm 226 TCN), Đào Uyên Minh (còn gọi là Đào Tiềm) là một nhà thơ nổi tiếng và là quan chức có vị trí cao trong xã hội. Ông đã mệt mỏi với công việc triều chính, về ở ẩn tại một nơi hoang vắng và thanh tĩnh. Tại đây ông bắt đầu trồng cây hoa cúc vào trong chậu. Đây là bước khởi đầu của việc trồng cây trong chậu.\r\nNăm 1972, người ta phát hiện ra cây bonsai trong hầm mộ của hoàng tử Zhang - huai (đời nhà Đường, từ năm 618 đến năm 907).\r\nNăm 1000, vào triều đại nhà Tống, có những bài thơ miêu tả bồn cảnh và nhiều tài liệu dạy cách tạo ra tác phẩm bonsai.\r\nVào triều đại nhà Nguyên (từ năm 1280 đến năm 1368), những vị bộ trưởng và thương gia người Nhật đã đưa những cây bonsai từ Trung Quốc về Nhật Bản, xem nó như là những món quà tặng.\r\nCuối triều đại nhà Minh, Chu Shun - sui, một vị quan Trung Quốc, vì không chịu được luật lệ hà khắc đã bỏ trốn sang Nhật. Khi đi ông đã mang theo toàn bộ tuyển tập cây cảnh. Ông đã góp phần quảng bá nghệ thuật cây cảnh ở Nhật Bản. Thời ấy Nhật Bản đã tạo ra một cách riêng trong việc trồng bonsai. Đây là một nghệ thuật dành cho giới quý tộc, đó là giới samurai và đến cuối thế kỷ mới trở thành sở thích của mọi tầng lớp trong xã hội Nhật Bản.\r\nVào triều đại nhà Thanh (từ năm 1644 đến năm 1911) bồn cảnh và bonsai trở thành sở thích của tất cả các tầng lớp trong xã hội Trung Quốc.\r\nNăm 1879, người Nhật đã giới thiệu bonsai đến hội chợ thế giới tại Paris rồi tới London vào năm 1909.\r\nNăm 1989, nghệ thuật bonsai đã phát triển đến giai đoạn phổ thông trên khắp thế giới.'),
(3, 1, 'Ngọc Ngân', 67, 'ngocngan.jpg', 'Đức Thịnh', 90000, '2020-12-30 00:00:00', 300, 0, ''),
(4, 1, 'Kim Tiền', 42, 'kimtien.jpg', 'Đức Thịnh', 89000, '2020-12-30 00:00:00', 231, 0, ''),
(5, 1, 'Tài Lộc', 12, 'tailoc.jpg', 'Đức Thịnh', 67000, '2020-12-30 00:00:00', 500, 0, ''),
(6, 2, 'Dây Nhện', 32, 'daynhen.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 600, 0, ''),
(7, 2, 'Hương Đào', 32, 'huongdao.jpg', 'Trường An', 127000, '2020-12-30 00:00:00', 200, 0, ''),
(8, 2, 'Lan Y', 32, 'lany.jpg', 'Trường An', 127000, '2020-12-30 00:00:00', 310, 0, ''),
(9, 2, 'Lưỡi Hổ', 32, 'luoiho.jpg', 'Trường An', 27000, '2020-12-30 00:00:00', 120, 0, ''),
(10, 2, 'Tài Lộc', 32, 'tailoc.jpg', 'Trường An', 47000, '2020-12-30 00:00:00', 300, 0, ''),
(11, 3, 'Bao Thanh Thiên', 32, 'baothanhthien.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 450, 0, ''),
(12, 3, 'Kim Tiền', 32, 'kimtien.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(13, 3, 'Ngọc Bích', 32, 'ngocbich.jpg', 'Trường An', 147000, '2020-12-30 00:00:00', 390, 0, ''),
(14, 3, 'Tiểu Hồng Môn', 32, 'tieuhongmon.jpg', 'Trường An', 67000, '2020-12-30 00:00:00', 308, 0, ''),
(15, 3, 'Thiết Mọc Lan', 32, 'thietmoclan.jpg', 'Đức Thịnh', 77000, '2020-12-30 00:00:00', 301, 0, ''),
(16, 4, 'Hoa Hồng Leo', 32, 'hoahongleo.jpg', 'Đức Thịnh', 77000, '2020-12-30 00:00:00', 210, 0, ''),
(17, 4, 'Hoa Tử Đằng', 32, 'hoatudang.jpg', 'Đức Thịnh', 77000, '2020-12-30 00:00:00', 398, 0, ''),
(18, 4, 'Cúc Tần Ấn Độ', 32, 'cuctanando.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 398, 0, ''),
(19, 4, 'Hoa Hậu Biếc', 32, 'hoahaubiec.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 342, 0, ''),
(20, 4, 'Mống Cọp', 32, 'mongcop.jpg', 'Trường An', 97000, '2020-12-30 00:00:00', 420, 0, ''),
(21, 5, 'Kim Ngân', 32, 'kimngan.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(22, 5, 'Kim Tiền', 32, 'kimtien.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 200, 0, ''),
(23, 5, 'May Mắn', 32, 'mayman.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 300, 0, ''),
(24, 5, 'Ngọc Ngân', 32, 'ngocngan.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 450, 0, ''),
(25, 5, 'Phú Quý', 32, 'phuquy.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 600, 0, ''),
(26, 6, 'Nho', 32, 'caynho.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(27, 6, 'Hắc Mây', 32, 'hacmay.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 80, 0, ''),
(28, 6, 'Thủy Lập', 32, 'thuylap.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(29, 6, 'Tre Cảnh', 32, 'trecanh.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 180, 0, ''),
(30, 6, 'Xương Rống', 32, 'xuongrong.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 370, 0, ''),
(31, 7, 'Đế Vương Xanh', 32, 'devuongxanh.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(32, 7, 'Ngũ Gia', 32, 'ngugia.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 980, 0, ''),
(33, 7, 'Sen Đá Nâu', 32, 'sandanau.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 100, 0, ''),
(34, 7, 'Trúc Nhật', 32, 'trucnhat.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 300, 0, ''),
(35, 7, 'Van Thiên Thanh', 32, 'vanthienthanh.jpg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 90, 0, ''),
(36, 8, 'Bánh Sinh Nhật', 32, 'banhsinhnhat.jpeg', 'Gia Phát', 97000, '2020-12-30 00:00:00', 9, 0, ''),
(37, 8, 'Bát Tiên', 32, 'battien.jpg', 'Lưu Thiện', 54000, '2020-12-30 00:00:00', 3, 0, ''),
(38, 8, 'Tai Thỏ', 32, 'taitho.jpg', 'Phú Thiên', 24000, '2020-12-30 00:00:00', 54, 0, ''),
(39, 8, 'Thanh Sơn', 32, 'thanhson.jpg', 'Lưu Thiện', 54000, '2020-12-30 00:00:00', 102, 0, ''),
(40, 8, 'Trứng Chim', 32, 'trungchim.jpg', 'Lưu Thiện', 94000, '2020-12-30 00:00:00', 65, 0, ''),
(41, 1, 'Tài Lộc', 12, 'tailoc.jpg', 'Đức Thịnh', 67000, '2020-12-30 00:00:00', 500, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTK` int(11) NOT NULL AUTO_INCREMENT,
  `TenTK` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenDN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiTK` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaTK`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenTK`, `Email`, `DiaChi`, `SDT`, `TenDN`, `MatKhau`, `LoaiTK`) VALUES
(1, 'Admin', '', '', '', 'admin', '1', 1),
(2, 'Tèoo', 'teo@gmail.com', 'test', '0314578', 'teo', '1', 2),
(3, 'Duy Tân An', 'duy@gmail.com', 'Cố Đô Tân An', '0314572', 'duy', '1', 2),
(4, 'Duy Tân Annn', '2@gmail.com', 'asdsa', '23123', 'duymalahonka', '13', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
