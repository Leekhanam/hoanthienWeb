-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2019 lúc 06:49 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `id_bh` int(11) NOT NULL,
  `name_bh` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `chuthich` text NOT NULL,
  `ngaytao` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `loai` int(11) NOT NULL DEFAULT 0,
  `id_cd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`id_bh`, `name_bh`, `keyword`, `image`, `chuthich`, `ngaytao`, `status`, `loai`, `id_cd`) VALUES
(1, 'Eloquent Relationships', 'eloquent-relationships', 'rela.svg', 'Eloquent trong Laravel làm cho quá trình tương tác với các bảng cơ sở dữ liệu của bạn trở nên tự nhiên và trực quan nhất có thể. Điều quan trọng là bạn xác định và hiểu sáu loại mối quan hệ chính. Xem lại tất cả - một tập cho mỗi mối quan hệ.                                        ', '2019-11-15', 1, 0, 1),
(3, 'Laravel 5.7 From Scratch', 'laravel5.7-from-scratch', '7661.png', '\"Laravel From Scratch\" là một nguồn video dành cho những người mới đến với Laravel kể từ năm 2013. Xem xét điều này, như bạn có thể tưởng tượng, sự thật này đòi hỏi chúng ta phải liên tục làm mới loạt phim để đảm bảo nó luôn cập nhật nhất có thể. Để chào mừng sự ra mắt của Laravel 5.7, chúng tôi đã thực hiện lại. Mỗi video đã được ghi lại. Tất cả các kỹ thuật đã được tối ưu hóa. Mỗi ví dụ đã được cập nhật. Tôi hy vọng bạn thích nó!                    ', '2019-11-15', 1, 0, 1),
(5, 'Laravel 6 From Scratch', 'laravel6-from-scratch', '8193.svg', 'Trong loạt bài này, từng bước một, tôi sẽ chỉ cho bạn cách xây dựng các ứng dụng web với Laravel 6. Chúng ta sẽ bắt đầu với những điều cơ bản và dần dần đào sâu hơn, khi chúng ta xem xét các ví dụ. thực tế. Sau khi hoàn thành, bạn nên có tất cả các công cụ bạn cần. Bắt đầu nào!                    ', '2019-11-15', 0, 0, 1),
(6, 'Learn Vue 2: Step By Step', 'learn -vue2:-step-by-step', '3400.png', 'Khi bạn tiếp tục xây dựng các dự án mới, bạn sẽ thấy mình tiếp cận cùng một nhóm các thành phần nhiều lần. Hầu hết các trang web yêu cầu phương thức, thả xuống, chú giải công cụ, v.v. Mặc dù bạn chắc chắn có thể sử dụng khung UI, thay vào đó, hãy tìm hiểu cách xây dựng các thành phần này (và hơn thế nữa) từ đầu.                    ', '2019-11-15', 1, 0, 3),
(7, 'The PHP Practitioner', 'the-php-practitioner', '5062.webp', '<div>Tất cả chúng ta bắt đầu ở đâu đó. Khi nói đến phát triển web với PHP, tốt, điểm dừng đầu tiên của bạn là loạt bài này. Được thiết kế đặc biệt và dành riêng cho người mới bắt đầu, tại đây, bạn sẽ tìm hiểu các nguyên tắc cơ bản của PHP - tất cả các cách để xác định các biến và mảng.</div><div><br></div><div>Nếu bạn cảm thấy hơi không chuẩn bị cho nội dung tại Laracasts, loạt bài \"PHP cho người mới bắt đầu\" này sẽ là điểm dừng chân tiếp theo của bạn. Bài học mới được công bố vào thứ năm hàng tuần, vì vậy đừng tụt lại phía sau!</div>', '2019-11-15', 0, 0, 2),
(10, 'Javascript From Scratch', 'javascript-from-scratch', '6882.png', 'JavaScript, theo phiên bản hiện hành, là một ngôn ngữ lập trình thông dịch được phát triển từ các ý niệm nguyên mẫu. Ngôn ngữ này được dùng rộng rãi cho các trang web cũng như phía máy chủ.                    ', '2019-11-27', 0, 1, 5),
(11, 'CSS Tutorial for Beginners', 'css-tutorial-for-beginners', '5859.webp', 'Trong tin học, các tập tin định kiểu theo tầng – dịch từ tiếng Anh là Cascading Style Sheets – được dùng để miêu tả cách trình bày các tài liệu viết bằng ngôn ngữ HTML và XHTML. Ngoài ra ngôn ngữ định kiểu theo tầng cũng có thể dùng cho XML, SVG, XUL.                   ', '2019-11-27', 1, 0, 6),
(12, 'Build A Laravel App With TDD', 'build-a-laravel-app-with-tdd', '7973.svg', '<div>Đã đến lúc sử dụng các kỹ thuật mà chúng ta đã học được trong Laravel From Scratch và đưa chúng vào sử dụng tốt để xây dựng ứng dụng trong thế giới thực đầu tiên của bạn. Cùng nhau, chúng ta sẽ tận dụng TDD để tạo Birdboard : một ứng dụng quản lý dự án giống như Basecamp tối thiểu.</div><div><br></div><div>Sê-ri này sẽ cung cấp cho chúng tôi một loạt các cơ hội để kéo tay áo lên và kiểm tra sườn của chúng ta. Như mọi khi, chúng tôi bắt đầu từ đầu : laravel new birdboard.</div>                    ', '2019-11-28', 0, 0, 7),
(22, 'Git - Github', ' git---github', '8595.png', '<font color=\"#222222\" face=\"arial, sans-serif\"><span style=\"font-size: 14px;\">GitHub là một dịch vụ lưu trữ nguồn Git dựa trên web cho các dự án phát triển phần mềm. GitHub cung cấp cả phiên bản miễn phí và trả phí cho tài khoản. Các dự án nguồn mở sẽ được cung cấp các kho lưu trữ miễn phí.</span></font>', '2019-12-09', 1, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id_ask` int(11) NOT NULL,
  `cauhoi` text NOT NULL,
  `dapan_1` text NOT NULL,
  `dapan_2` text NOT NULL,
  `dapan_3` text NOT NULL,
  `dapan` int(11) NOT NULL,
  `id_bh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id_ask`, `cauhoi`, `dapan_1`, `dapan_2`, `dapan_3`, `dapan`, `id_bh`) VALUES
(1, 'Eloquent relationships là gì ?', 'Là các câu truy vấn trong sql', 'Là để chỉ các liện kết giữa các table trong sql', 'Là tên gọi bình thường', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `id_cd` int(11) NOT NULL,
  `name_cd` varchar(100) NOT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`id_cd`, `name_cd`, `id_kh`) VALUES
(1, 'LARAVEL Basic', 1),
(2, ' PHP Techniques', 2),
(3, 'Learn Vue', 3),
(4, ' PHP Basic', 2),
(5, 'JAVASCRIPT Basic', 4),
(6, 'CSS Basic', 9),
(7, 'Build an App', 1),
(8, 'Git basic and hard', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `parent_cmt` int(11) DEFAULT 0,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `house` time NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_cmt`, `parent_cmt`, `comment`, `date`, `house`, `id_video`, `id_tk`) VALUES
(124, 0, '<p>Tuyệt gh&ecirc; &hearts;</p>\n', '2019-12-04', '09:24:00', 2, 1),
(125, 0, '<p>Tuyệt vời &hearts;</p>\n', '2019-12-04', '09:26:00', 21, 1),
(137, 124, '<p>&hearts;&hearts;&hearts;</p>\n', '2019-12-04', '03:02:00', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id_kh` int(11) NOT NULL,
  `name_kh` varchar(100) NOT NULL,
  `image_kh` varchar(255) NOT NULL,
  `mamau` varchar(50) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id_kh`, `name_kh`, `image_kh`, `mamau`, `skill`) VALUES
(1, 'LARAVEL', '6604.png', '#ff0066', 'Laravel là một khung công tác PHP để xây dựng mọi thứ từ các ứng dụng nhỏ đến cấp doanh nghiệp. Như bạn sẽ thấy, đó là một niềm vui khi sử dụng và có thể khiến bạn thích viết lại PHP. Điều đó thật tốt.'),
(2, 'PHP', '7225.jpg', '#3ca7f9', 'PHP: Hypertext Preprocessor, thường được viết tắt thành PHP là một ngôn ngữ lập trình kịch bản hay một loại mã lệnh chủ yếu được dùng để phát triển các ứng dụng viết cho máy chủ, mã nguồn mở, dùng cho mục đích tổng quát. Nó rất thích hợp với web và có thể dễ dàng nhúng vào trang HTML'),
(3, 'VUE', '4170.svg', '#f8b22c', 'Vue.js, gọi tắt là Vue, là một framework linh động dùng để xây dựng giao diện người dùng. Khác với các framework nguyên khối, Vue được thiết kế từ đầu theo hướng cho phép và khuyến khích việc phát triển ứng dụng theo các bước.'),
(4, 'JAVASCRIPT', '778.webp', '#f2fa9a', 'JavaScript, theo phiên bản hiện hành, là một ngôn ngữ lập trình thông dịch được phát triển từ các ý niệm nguyên mẫu. Ngôn ngữ này được dùng rộng rãi cho các trang web cũng như phía máy chủ.<br>'),
(9, 'CSS', '1271.png', '#0066ff', 'Trong tin học, các tập tin định kiểu theo tầng – dịch từ tiếng Anh là Cascading Style Sheets – được dùng để miêu tả cách trình bày các tài liệu viết bằng ngôn ngữ HTML và XHTML. Ngoài ra ngôn ngữ định kiểu theo tầng cũng có thể dùng cho XML, SVG, XUL.'),
(12, 'TOOLING', '5887.png', '#c459ec', 'Những công cụ hữu ích này sẽ giúp bạn lập trình tốt hơn trong các dự án , khi vào doanh nghiệp chúng ta bắt buộc phải biết!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu`
--

CREATE TABLE `lichsu` (
  `id_ls` int(11) NOT NULL,
  `linkls` text NOT NULL,
  `ngayluu` date NOT NULL,
  `lession` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `id_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsu`
--

INSERT INTO `lichsu` (`id_ls`, `linkls`, `ngayluu`, `lession`, `id_tk`, `id_video`) VALUES
(11, '/poly/duanmot/series.php?id_bh=3&id_video=29&lession=1', '2019-12-08', 1, 1, 29),
(12, '/poly/duanmot/series.php?id_bh=11&id_video=58&lession=1', '2019-12-08', 1, 1, 58);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `site` varchar(20) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `copyright` text NOT NULL,
  `logowsqc` varchar(20) NOT NULL,
  `chuthich` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`site`, `logo`, `sdt`, `email`, `diachi`, `copyright`, `logowsqc`, `chuthich`, `link`) VALUES
('site', '4275.png', '0779237088', 'luzifer12022000@gmail.com', 'Số 111, đường Xuân Thủy, Cầu Giấy, Quận Nam Từ Liêm, Hà Nội', 'Copyright © Code Club 2019. Bảo lưu mọi quyền. Chính xác, bao gồm tất cả trong số thành viên. Điều đó có nghĩa là cả bạn, Happy! .', '6909.svg', 'Bảo vệ cơ sở dữ liệu 24/7 trong khi bạn ngủ. Thiết lập 2 phút đơn giản. 1-Click khôi phục thảm họa. Dùng thử miễn phí 14 ngày.', 'https://ottomatik.io/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `name`, `image`, `email`, `pass`, `quyen`) VALUES
(1, 'Admin', 'Crush.jpg', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Ngọc Tú', '6400.jpg', 'anhtu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(3, 'Mai', '417.png', 'mai@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(4, 'Xoáy', '3755.svg', 'xoay@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `name_vd` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `ngaythem` date NOT NULL,
  `id_bh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id_video`, `name_vd`, `link`, `ngaythem`, `id_bh`) VALUES
(1, 'Laravel Eloquent Relationships: One To Many', 'https://www.youtube.com/embed/xIBST5vVq84', '2019-11-15', 1),
(2, 'Laravel Eloquent Relationships: One To Many (2)', 'https://www.youtube.com/embed/79CWW-UPrA4', '2019-11-16', 1),
(3, 'Laravel Eloquent Relationships: One To One', 'https://www.youtube.com/embed/Lr28pSlqzV8', '2019-11-17', 1),
(4, 'Laravel Eloquent Relationships: Many To Many', 'https://www.youtube.com/embed/bjF7NE_xYMk', '2019-11-17', 1),
(5, 'Laravel Eloquent Relationships: Has Many Through', 'https://www.youtube.com/embed/5gXbbxW4sUU', '2019-11-18', 1),
(6, 'Laravel Eloquent Relationships: Polymorphic Relations', 'https://www.youtube.com/embed/lePjXdMC6aM', '2019-11-19', 1),
(15, 'The PHP Practitioner Step 1 Get PHP Installed', 'https://www.youtube.com/embed/4_tw6N211_E', '2019-11-27', 7),
(16, 'The PHP Practitioner Step 2 Install a Proper Code Editor', 'https://www.youtube.com/embed/a9h9PbryfNc', '2019-11-27', 7),
(17, 'The PHP Practitioner Step 3 Variables', 'https://www.youtube.com/embed/YK7kkRKm54E', '2019-11-27', 7),
(18, 'PHP and HTML', 'https://www.youtube.com/embed/EVAPeCbI6qE', '2019-11-27', 7),
(19, 'Separate PHP Logic From Presentation', 'https://www.youtube.com/embed/CDDTfeAiu5s', '2019-11-27', 7),
(20, 'Understanding Arrays', 'https://www.youtube.com/embed/cf5nheDbUBM', '2019-11-27', 7),
(21, 'Installation', 'https://www.youtube.com/embed/hokQOstqf2o', '2019-11-27', 5),
(22, 'Create first page', 'https://www.youtube.com/embed/kxunejXEyqo', '2019-11-27', 5),
(23, 'Simple Routing', 'https://www.youtube.com/embed/xhtEBcwHB2Y', '2019-11-27', 5),
(24, 'Simple Controller', 'https://www.youtube.com/embed/55lsqZEZ86M', '2019-11-27', 5),
(25, 'What is composer and install It | laravel | php', 'https://www.youtube.com/embed/p2PLgQVqS7g', '2019-11-27', 5),
(26, 'Create simple View', 'https://www.youtube.com/embed/MwTs_ujIVuo', '2019-11-27', 5),
(27, 'Important Http Request methods', 'https://www.youtube.com/embed/z1Bax28uH6Y', '2019-11-27', 5),
(28, 'Submit html Form', 'https://www.youtube.com/embed/3NihHcoIqzA', '2019-11-27', 5),
(29, 'Installation', 'https://www.youtube.com/embed/-ek86PheOrE', '2019-11-27', 3),
(30, 'Create first page', 'https://www.youtube.com/embed/xgrt0AVVSfU', '2019-11-27', 3),
(31, 'Simple routing', 'https://www.youtube.com/embed/enAaLDClbwc', '2019-11-27', 3),
(32, 'Make simple controlller', 'https://www.youtube.com/embed/MldkbMvej5Q', '2019-11-27', 3),
(33, 'Make simple view', 'https://www.youtube.com/embed/haLBjzZmuvQ', '2019-11-27', 3),
(34, 'Handle HTTP requests', 'https://youtu.be/embed/7wlQxEgZbG0', '2019-11-27', 3),
(35, 'Submit form', 'https://www.youtube.com/embed/tBHa-HOsj3Q', '2019-11-27', 3),
(36, 'What is middleware and how to use it.', 'https://www.youtube.com/embed/DbqNcHEizpA', '2019-11-27', 3),
(37, 'Basic Databinding', 'https://www.youtube.com/embed/Y05uRiksXXI', '2019-11-27', 6),
(38, 'Setup Vue Devtools', 'https://www.youtube.com/embed/TiCH1fV8_nY', '2019-11-27', 6),
(39, 'Lists', 'https://www.youtube.com/embed/r5F17ZATbcs', '2019-11-27', 6),
(40, 'Vue Event Listeners', 'https://www.youtube.com/embed/FAaOcJO1lUE', '2019-11-27', 6),
(41, 'Attribute and Class Name Binding', 'https://www.youtube.com/embed/APAXEF4zstI', '2019-11-27', 6),
(42, 'The Need For Computed Properties', 'https://www.youtube.com/embed/UOZ_6S0jNVs', '2019-11-27', 6),
(43, 'Components 101', 'https://www.youtube.com/embed/7G7FeuhL8bI', '2019-11-27', 6),
(44, 'Components Within Components', 'https://www.youtube.com/embed/j4AaZcRTzfk', '2019-11-27', 6),
(45, 'Practical Component Exercise 1 Message', 'https://www.youtube.com/embed/MD8KspsKjFY', '2019-11-27', 6),
(46, 'Practical Component Exercise 2 Modal', 'https://www.youtube.com/embed/Et6pHpKOHys', '2019-11-27', 6),
(47, 'Thuật ngữ (terms) là gì?', 'https://www.youtube.com/embed/D4njvu-3o-Y', '2019-11-27', 10),
(48, 'Nội dung khoá học lập trình miễn phí Code Club', 'https://www.youtube.com/embed/X9R1fexrz90', '2019-11-27', 10),
(49, 'Biến (Variable)', 'https://www.youtube.com/embed/ia3IZHoylJM', '2019-11-27', 10),
(50, 'Kiểu dữ liệu (Phần 1)', 'https://www.youtube.com/embed/sxhvoCclpe8', '2019-11-27', 10),
(51, 'Object trong JavaScript', 'https://www.youtube.com/embed/sxhvoCclpe8', '2019-11-27', 10),
(52, 'Mảng trong JavaScript (Array)', 'https://www.youtube.com/embed/yPArMduGD3I', '2019-11-27', 10),
(53, 'Arithmetic operators', 'https://www.youtube.com/embed/vHEa_fUbmgs', '2019-11-27', 10),
(54, 'Các phép tính tăng giảm (++, --)', 'https://www.youtube.com/embed/OvQe4uV2Z6Y', '2019-11-27', 10),
(55, 'Assignment operators', 'https://www.youtube.com/embed/JGkrw1CQuHY', '2019-11-27', 10),
(56, 'Function trong JavaScript', 'https://www.youtube.com/embed/_44v_9YaIeU', '2019-11-27', 10),
(57, 'Object methods', 'https://youtube.com/embed/TnE6aKV8vVI', '2019-11-27', 10),
(58, 'Introduction to CSS', 'https://www.youtube.com/embed/Iu1T7j2FA4M', '2019-11-27', 11),
(59, 'Syntax and How to Write Css Code', 'https://www.youtube.com/embed/RzPQgZWZcqw', '2019-11-27', 11),
(60, 'Element Styling', 'https://www.youtube.com/embed/-wU_iQ38DF0', '2019-11-27', 11),
(61, 'Element Background', 'https://www.youtube.com/embed/cmyVI_zqbQw', '2019-11-27', 11),
(62, ' Text Part 1', 'https://www.youtube.com/embed/dBrqhIsdAU8', '2019-11-27', 11),
(63, 'Text Part 2', 'https://www.youtube.com/embed/fygWBZP6e3k', '2019-11-27', 11),
(64, 'Font Properties', 'https://www.youtube.com/embed/n48ICr4QvnQ', '2019-11-27', 11),
(65, 'Links', 'https://www.youtube.com/embed/zOhK3__GWl8', '2019-11-27', 11),
(66, 'Lists Properties', 'https://www.youtube.com/embed/oidOpFIlBOA', '2019-11-27', 11),
(67, 'Box Model Properties', 'https://www.youtube.com/embed/_ohhEDk_DHs', '2019-11-27', 11),
(68, 'Preview', 'https://www.youtube.com/embed/dFiZyq5F8eE', '2019-11-28', 12),
(69, 'Store Part 1', 'https://www.youtube.com/embed/wtuJch7x9ho', '2019-11-28', 12),
(70, 'Store Part 2', 'https://www.youtube.com/embed/qbh8Ogl_QcI', '2019-11-28', 12),
(71, 'Store Switching to API Resources', 'https://www.youtube.com/embed/sBbdJCceYmk', '2019-11-28', 12),
(72, 'Testing success and 404 on Show', 'https://www.youtube.com/embed/twsimgSYAVU', '2019-11-28', 12),
(73, 'In memory database and filtering single tests', 'https://www.youtube.com/embed/eiSTHeoejUM', '2019-11-28', 12),
(74, 'Update', 'https://www.youtube.com/embed/DCwWqoG68Io', '2019-11-28', 12),
(75, 'Delete', 'https://www.youtube.com/embed/jndzXnta0-4', '2019-11-28', 12),
(76, 'Index', 'https://www.youtube.com/embed/rskh-iy7bq4', '2019-11-28', 12),
(77, 'Protecting the API', 'https://www.youtube.com/embed/CB-GgZthZcU', '2019-11-28', 12),
(78, 'Setting Up Passport', 'https://www.youtube.com/embed/IK5M2HdNHFA', '2019-11-28', 12),
(79, 'Social Authentication', 'https://www.youtube.com/embed/DMPo-ggHVOY', '2019-11-28', 12),
(80, 'Git - Giới thiệu về VCS', 'https://www.youtube.com/embed/JK9EppK6kxI', '2019-12-09', 22),
(81, 'Git - 01: Đăng kí tài khoản github', 'https://www.youtube.com/embed/7zxr6fKfCWo', '2019-12-09', 22),
(82, 'Git - 02: Cài đặt git trên Ubuntu', 'https://www.youtube.com/embed/hkDO9G6o8jg', '2019-12-09', 22),
(83, 'Git - 02B: Gỡ git trong Ubuntu - uninstall git Ubuntu', 'https://www.youtube.com/embed/2ORx60uRcxw', '2019-12-09', 22),
(84, 'Git - 03: Cài git trên windows', 'https://www.youtube.com/embed/lFiceMCN0Ns', '2019-12-09', 22),
(85, 'Git - Tài liệu tham khảo về Git.', 'https://www.youtube.com/embed/Dfu8VaWDP7Q', '2019-12-09', 22),
(86, 'Git - 04: Thiết lập username, email, password cho git', 'https://www.youtube.com/embed/NTUUJIS_EQ4', '2019-12-09', 22),
(87, 'Git - 05: Xoá bỏ username, email, password khỏi git', 'https://www.youtube.com/embed/UsSae_TqPsY', '2019-12-09', 22),
(88, 'Git - 06: Clone một repository từ github về local', 'https://www.youtube.com/embed/n5Gq54h0G9w', '2019-12-09', 22),
(89, 'Git - 06B: git clone and rename repository - Sao chép đồng thời đổi tên repository', 'https://www.youtube.com/embed/Xuyk-q1a9PQ', '2019-12-09', 22),
(90, 'Git - 07: Tạo remote repository', 'https://www.youtube.com/embed/3ivkObtYyHI', '2019-12-09', 22),
(91, 'Git - 08: git init - Khởi tạo việc theo dõi một repository', 'https://www.youtube.com/embed/yy2zUUok-qI', '2019-12-09', 22),
(92, 'Git - 09: Trạng thái các file trong một repository', 'https://www.youtube.com/embed/wDF7k5qTo_o', '2019-12-09', 22),
(93, 'Git - 10: Lệnh git status', 'https://www.youtube.com/embed/W8GZlFW36Mc', '2019-12-09', 22);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`id_bh`),
  ADD KEY `fk6` (`id_cd`);
ALTER TABLE `baihoc` ADD FULLTEXT KEY `name_bh` (`name_bh`,`chuthich`);
ALTER TABLE `baihoc` ADD FULLTEXT KEY `name_bh_2` (`name_bh`,`keyword`,`chuthich`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id_ask`),
  ADD KEY `fk2` (`id_bh`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`id_cd`),
  ADD KEY `fk9` (`id_kh`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `fk5` (`id_tk`) USING BTREE,
  ADD KEY `fk4` (`id_video`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`id_ls`),
  ADD KEY `fk02` (`id_tk`) USING BTREE,
  ADD KEY `fk1` (`id_video`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`site`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `fk` (`id_bh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  MODIFY `id_bh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id_ask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `id_cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  MODIFY `id_ls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD CONSTRAINT `fk6` FOREIGN KEY (`id_cd`) REFERENCES `chude` (`id_cd`);

--
-- Các ràng buộc cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_bh`) REFERENCES `baihoc` (`id_bh`);

--
-- Các ràng buộc cho bảng `chude`
--
ALTER TABLE `chude`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`id_kh`) REFERENCES `khoahoc` (`id_kh`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_tk`) REFERENCES `taikhoan` (`id_tk`);

--
-- Các ràng buộc cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);

--
-- Các ràng buộc cho bảng `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_bh`) REFERENCES `baihoc` (`id_bh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
