-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 18, 2021 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webmusic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genremusic`
--

CREATE TABLE `genremusic` (
  `GenreID` int(11) NOT NULL,
  `GenreName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genremusic`
--

INSERT INTO `genremusic` (`GenreID`, `GenreName`) VALUES
(1, 'Blues'),
(2, 'Classical'),
(3, 'Country'),
(4, 'Dance'),
(5, 'Electronic'),
(6, 'Jazz'),
(7, 'Opera'),
(8, 'Pop'),
(9, 'Rap'),
(10, 'Rock'),
(11, 'Hip hop'),
(12, 'Folk'),
(18, ' VPop123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `singer`
--

CREATE TABLE `singer` (
  `SingerID` int(11) NOT NULL,
  `SingerName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `singer`
--

INSERT INTO `singer` (`SingerID`, `SingerName`) VALUES
(1, ' Den Vau'),
(2, 'Son Tung'),
(12, '  hieu'),
(15, '  Phan Manh Quynh'),
(16, 'Ho Quang Hieu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `SongID` int(100) NOT NULL,
  `SongName` varchar(100) NOT NULL,
  `SongImg` varchar(100) NOT NULL,
  `SongLyric` text NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Mp3` varchar(100) NOT NULL,
  `SingerID` int(11) DEFAULT NULL,
  `GenreID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`SongID`, `SongName`, `SongImg`, `SongLyric`, `Price`, `Mp3`, `SingerID`, `GenreID`) VALUES
(48, 'Sao Cha không', 'img/Sao-Cha-Khong-Phan-Manh-Quynh (1).jpg', 'Lyrics 1  Cha đứng với con nhìn phố xa xa Dặn con ra sao cứ luôn mỉm cười Như cách cha dấu mệt mỏi ngày dài Thì trở về nhà vẫn ắp niềm vui Cha nói với con phải vững tin lên Đừng bao giờ quên giấc mơ của mình Tuổi thơ của con có cha đồng hành là điều… vô giá  Ngày con thêm lớn khôn Cảm nhận thêm rõ hơn cuộc đời Con biết cha đã thăng trầm Con biết cha còn muôn lời thầm lặng  Chorus  Vì sao cha ơi, chẳng kể con nghe, điều cha tiếc nuối Từ lâu chôn giấu Khi đã quên đam mê đời mình Để con no ấm cha chật vật mưu sinh  Vượt qua sóng gió, lời cha dẫn bước Mở rộng tim con, bao dung như cha Trong đêm đau thương vẫn yêu cuộc đời Vẹn nguyên mơ ước như ánh sao trời Nhưng sao không nói cùng con cha ơi?  Lyrics 2  Khi những cánh chim mùa cũ bay qua Càng mang nhiều hơn bóng mây tuổi già Tại sao cha không thảnh thơi nhàn hạ Nhận về muộn phiền không nói được ra  Con đứng với cha một quãng xuân xanh Niềm tin về cha chẳng bao giờ ngừng Nhưng sao bao nhiêu điều cha chịu đựng Con không… được biết  Thời gian trôi quá nhanh Chẳng một ai sống hơn một lần Khi đã quen với thăng trầm Con biết cha có vết thương trong tim  Chorus 2: Vì sao cha ơi, chẳng kể con nghe, điều cha tiếc nuối Từ lâu chôn giấu Khi đã quên đam mê đời mình Để con no ấm cha chật vật mưu sinh  Vượt qua sóng gió, lời cha dẫn bước Mở rộng tim con, bao dung như cha Trong đêm đau thương vẫn yêu cuộc đời Chịu nhiều tiếc nuối khi ngước lên cao Sao cha không ở cùng con lâu hơn?  Con cứ tin con luôn hiểu hết về cha Nhưng con không phải…', '15000', 'MP3/SAO CHA KHÔNG - PHAN MẠNH QUỲNH - OFFICIAL MV - OST BỐ GIÀ 2021.mp3', 12, 18),
(49, 'Hai Trieu Nam - Đem', 'img/2trieunam_Đen.jpg', 'Anh cô đơn giữa tinh không này Muôn con sóng cuốn xô vào đây Em cô đơn giữa mênh mông người Và ta cô đơn đã hai triệu năm Anh cô đơn giữa tinh không này Muôn con sóng cuốn xô vào đây Em cô đơn giữa mênh mông người Và ta cô đơn đã hai triệu năm Xung quanh anh toàn là nước, ay Cơ thể anh đang bị ướt, ay Mênh mông toàn là nước, ay Êm ái như chưa từng trước đây Trăm ngàn con sóng xô-ya Anh lao vào trong biển cả vì em làm anh nóng khô-ya Anh ngâm mình trong làn nước để mặn mòi từ da dẻ (mặn mòi từ da dẻ) Ta cần tình yêu vì tình yêu làm cho ta trẻ (đúng rồi) Anh cũng cần em nhưng không biết em sao Anh không care lắm và anh quyết đem trao Cho em hết nắng cho em hết đêm sao Nhìn mặt anh đi, em nghĩ anh tiếc em sao? Trăm ngàn con sóng từ mọi nơi mà đổ về Và đây là cách…', '15000', 'MP3/Đen - hai triệu năm ft. Biên (m-v).mp3', 12, 18),
(53, 'Frog', 'img/frog.jpg', 'Updating', '50000', 'MP3/Crazy Frog - Axel F (Official Video).mp3', 16, 18),
(55, 'Cho Mình em', 'img/cho-minh-em.jpg', 'Lời bài hát\r\nEm từng xem một người là thế giới\r\nEm từng yêu đậm sâu\r\nHọ nói anh xem tình yêu là trò chơi\r\nAnh làm em bận tâm\r\n\r\n(Rap)\r\n\r\nQuá khứ của anh nhiều người chán ghét\r\nEm lại quen không nghe những lời phán xét và\r\nTa luôn là những câu chuyện của người khác\r\nHọ không thể hiểu được anh chỉ qua lời hát\r\nCó những điều anh chỉ nói cho mình em nghe\r\nChuyện tình cảm đâu đơn giản chỉ để đem khoe\r\nTa thậm chí không thể nắm tay ở trên xe\r\nNhững nỗi đau của mình họ chỉ thích đem share\r\nCó những đêm chỉ tiếng đàn căn phòng lạnh tanh\r\nViệc người ta sợ em tổn thương bên cạnh anh\r\nHi vọng trong lần yêu nay anh sẽ không ngốc\r\nTất cả anh muốn làm là giữ cho em không khóc\r\n\r\nAnh chọn đi chọn lại quần áo chỉ là ì a ì a\r\nCho mình em thấy\r\nCho mình em\r\nAnh chọn đi chọn lại mùi hương nước hoa ì a ì a\r\nCho mình em đấy\r\nCho mình em.', '15000', 'MP3/Cho-Minh-Em-Binz-Den.mp3', 12, 18),
(56, 'Co Chang Trai Viet Len Cay - Phan Manh Quynh', 'img/cctvll.jpg', 'Có chàng trai viết lên cây Lời yêu thương cô gái ấy Mối tình như gió như mây Nhiều năm trôi qua vẫn thấy Giống như bức tranh vẽ bằng dịu êm ngày thơ Có khi trong tiềm thức ngỡ là mơ Câu chuyện đã rất xa xôi Niềm riêng không ai biết tới Hai người sống ở hai nơi Từ lâu không đi sát lối Chỉ thương có người vẫn hoài gìn giữ nhiều luyến lưu Mỗi khi nhớ đôi mắt biếc như thời chưa biết buồn đau Ngày cô ấy đi theo nơi phồn hoa Chàng trai bơ vơ từ xa trong tim hụt hẫng như mất một thứ gì Không ai hiểu thấu vì Tình yêu những đứa trẻ con thì Vu vơ nhanh qua đâu nghĩ gieo tương tư đến dài như thế Đời muôn ngả mang số kiếp đổi thay Rồi khi tình cờ gặp lại hai thân phận khác dẫu tên người vẫn vậy Có một người vẫn vậy Thì ra xa nhau là mất thôi Tay không chung đôi chỉ giấc mơ…', '20000', 'MP3/Có Chàng Trai Viết Lên Cây - Phan Mạnh Quỳnh - MẮT BIẾC OST.mp3', 16, 18),
(57, 'Sao Cha không', 'img/', 'Lyrics 1  Cha đứng với con nhìn phố xa xa Dặn con ra sao cứ luôn mỉm cười Như cách cha dấu mệt mỏi ngày dài Thì trở về nhà vẫn ắp niềm vui Cha nói với con phải vững tin lên Đừng bao giờ quên giấc mơ của mình Tuổi thơ của con có cha đồng hành là điều… vô giá  Ngày con thêm lớn khôn Cảm nhận thêm rõ hơn cuộc đời Con biết cha đã thăng trầm Con biết cha còn muôn lời thầm lặng  Chorus  Vì sao cha ơi, chẳng kể con nghe, điều cha tiếc nuối Từ lâu chôn giấu Khi đã quên đam mê đời mình Để con no ấm cha chật vật mưu sinh  Vượt qua sóng gió, lời cha dẫn bước Mở rộng tim con, bao dung như cha Trong đêm đau thương vẫn yêu cuộc đời Vẹn nguyên mơ ước như ánh sao trời Nhưng sao không nói cùng con cha ơi?  Lyrics 2  Khi những cánh chim mùa cũ bay qua Càng mang nhiều hơn bóng mây tuổi già Tại sao cha không thảnh thơi nhàn hạ Nhận về muộn phiền không nói được ra  Con đứng với cha một quãng xuân xanh Niềm tin về cha chẳng bao giờ ngừng Nhưng sao bao nhiêu điều cha chịu đựng Con không… được biết  Thời gian trôi quá nhanh Chẳng một ai sống hơn một lần Khi đã quen với thăng trầm Con biết cha có vết thương trong tim  Chorus 2: Vì sao cha ơi, chẳng kể con nghe, điều cha tiếc nuối Từ lâu chôn giấu Khi đã quên đam mê đời mình Để con no ấm cha chật vật mưu sinh  Vượt qua sóng gió, lời cha dẫn bước Mở rộng tim con, bao dung như cha Trong đêm đau thương vẫn yêu cuộc đời Chịu nhiều tiếc nuối khi ngước lên cao Sao cha không ở cùng con lâu hơn?  Con cứ tin con luôn hiểu hết về cha Nhưng con không phải…', '15000', 'MP3/', 16, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song-order`
--

CREATE TABLE `song-order` (
  `OrderID` int(11) DEFAULT NULL,
  `SongID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `BankCartCode` varchar(100) NOT NULL,
  `Role_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Password`, `FullName`, `Phone`, `Email`, `DateOfBirth`, `BankCartCode`, `Role_1`) VALUES
(1, 'admin', '1', 'Nguyen Hien', '0964254117', 'datvi@gmail.com', '2001-01-20', '98418918198198198', 1),
(16, 'fd', 'f', 'd', 'f', '', '0000-00-00', '', 0),
(17, 'ha', '1', 'hha', '0', '', '0000-00-00', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `genremusic`
--
ALTER TABLE `genremusic`
  ADD PRIMARY KEY (`GenreID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk3` (`UserID`);

--
-- Chỉ mục cho bảng `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`SingerID`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`SongID`),
  ADD KEY `fk2` (`SingerID`),
  ADD KEY `fk6` (`GenreID`);

--
-- Chỉ mục cho bảng `song-order`
--
ALTER TABLE `song-order`
  ADD PRIMARY KEY (`SongID`),
  ADD KEY `fk4` (`OrderID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `genremusic`
--
ALTER TABLE `genremusic`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `singer`
--
ALTER TABLE `singer`
  MODIFY `SingerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `SongID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `song-order`
--
ALTER TABLE `song-order`
  MODIFY `SongID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Các ràng buộc cho bảng `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`SingerID`) REFERENCES `singer` (`SingerID`),
  ADD CONSTRAINT `fk6` FOREIGN KEY (`GenreID`) REFERENCES `genremusic` (`GenreID`);

--
-- Các ràng buộc cho bảng `song-order`
--
ALTER TABLE `song-order`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`SongID`) REFERENCES `song` (`SongID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
