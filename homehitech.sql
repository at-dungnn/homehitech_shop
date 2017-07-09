-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 04:19 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homehitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `img_path`, `created_at`, `updated_at`) VALUES
(1, 'Slide 1', '1499521869-infor.jpg', '2017-07-08 06:51:09', '2017-07-08 06:51:09'),
(2, 'Slide 2', '1499521942-logo-and-graphics-design-services.jpg', '2017-07-08 06:52:22', '2017-07-08 06:52:22'),
(3, 'Slide 3', '1499521957-all-in-one-website-services.jpg', '2017-07-08 06:52:37', '2017-07-08 06:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent_id`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Đèn LED', 'den-led', '0', 0, '2017-07-02 02:06:26', '2017-07-02 02:06:26'),
(2, 'Đèn Trang Trí', 'den-trang-tri', '1', 0, '2017-07-02 02:06:37', '2017-07-02 02:06:37'),
(5, 'Đèn Âm Trần', 'den-am-tran', '1', 0, '2017-07-02 02:07:35', '2017-07-02 02:07:35'),
(6, 'Đèn Chiếu Sáng', 'den-chieu-sang', '1', 0, '2017-07-02 02:07:54', '2017-07-02 02:07:54'),
(7, 'Đèn Ngủ', 'den-ngu', '1', 0, '2017-07-02 02:08:14', '2017-07-02 02:08:14'),
(9, 'Camera', 'camera', '0', 0, '2017-07-02 02:09:13', '2017-07-02 02:09:13'),
(10, 'Camera giám sát', 'camera-giam-sat', '9', 0, '2017-07-02 02:09:24', '2017-07-02 02:09:24'),
(11, 'Camera hành trình', 'camera-hanh-trinh', '9', 0, '2017-07-02 02:09:40', '2017-07-02 02:09:40'),
(12, 'Thiết bị viễn thông', 'thiet-bi-vien-thong', '0', 0, '2017-07-02 02:09:54', '2017-07-02 02:09:54'),
(13, 'Thiết bị cáp quang', 'thiet-bi-cap-quang', '12', 0, '2017-07-02 02:10:28', '2017-07-02 02:10:28'),
(14, 'Thiết bị truyền hình', 'thiet-bi-truyen-hinh', '12', 0, '2017-07-02 02:10:37', '2017-07-02 02:10:37'),
(15, 'Đèn A', 'den-a', '1', 0, '2017-07-04 03:46:16', '2017-07-04 03:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_canhan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_congty` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `phone_canhan`, `phone_congty`, `email`, `skype`, `facebook`) VALUES
(1, '83 ĐIỆN BIÊN PHỦ, ĐÀ NẴNG', '0932346868', '0932346868', 'admin@homehitech.vn', 'homehitech', 'http://facebook.com/homehitech.vn');

-- --------------------------------------------------------

--
-- Table structure for table `cskh`
--

CREATE TABLE `cskh` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_21_155157_create_product_table', 1),
(4, '2017_06_21_155738_create_category_product_table', 1),
(5, '2017_06_25_134012_create_contact_table', 1),
(6, '2017_06_27_142655_create_cart_table', 1),
(7, '2017_06_28_143518_create_nhanvien-cskh_table', 1),
(8, '2017_06_28_145426_create_news_table', 1),
(9, '2017_06_30_054817_create_banner_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `intro`, `content`, `img_path`, `category_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Giảm giá sản phẩm mùa hè', 'giam-gia-san-pham-mua-he', 'Giảm giá sản phẩm mùa hè', '<p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Nếu so sánh với mức giá bán các sản phẩm tương tự tại thị trường Hong Kong hay Singapore, mức ưu đãi 50% này sẽ rẻ hơn và khách hàng lại được hưởng các dịch vụ ưu đãi hay bảo hành ngay tại Việt Nam, mà không mất thêm một vé máy bay khứ hồi để đi bảo hành, nếu chẳng may có bị hư hỏng trong quá trình sử dụng.</p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Các mặt hàng được giảm giá khá phong phú, đủ loại với quần áo, phụ kiện… cho cả nam và nữ. Với mức 30-50%, việc sở hữu những sản phẩm hàng hiệu trong mùa thật đơn giản, tuy nhiên với mức 70%, chủ yếu sẽ tập trung vào các bộ sưu tập từ năm 2012 trở về trước.</p>', '1499501059-giamgia1.jpg', '1', '1', '2017-07-07 18:46:06', '2017-07-08 01:22:15'),
(2, 'Cơ hội mua sắm cho căn nhà của bạn', 'co-hoi-mua-sam-cho-can-nha-cua-ban', 'Chương trình khuyến mãi “Khai trương trung tâm dữ liệu mới”', '<h3 style=\"margin: 0px 0px 25px; outline: none; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 22px; line-height: 33px; font-family: &quot;Open Sans&quot;; vertical-align: baseline; color: rgb(59, 59, 59);\"><strong style=\"margin: 0px; outline: none; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Nhân dịp khai trung tâm dữ liệu mới, HomeHiTech IDC triển khai chương trình khuyến mãi giảm giá cho các dịch vụ</strong></h3><div><strong style=\"margin: 0px; outline: none; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial; font-weight: normal;\">Với những người yêu thích thời trang cao cấp và đam mê phong cách lịch lãm, đây chính là thời điểm tốt để mua sắm những món hàng hiệu chất lượng. Trong giai đoạn kinh tế đang khó khăn như hiện nay, đại đa số người yêu thích hàng hiệu phải cắt giảm hầu bao và trở nên kén chọn hơn khi mua sắm.</p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial; font-weight: normal;\">Việc lựa chọn thời điểm ưu đãi này để sắm sửa cho mình những trang phục mới nhất trong mùa hè năm nay, được xem là phù hợp, bởi hiếm khi các sản phẩm trong mùa lại được bán với mức giá ưu đãi.</p></strong></div>', '1499501367-khaitruong.jpg', '12', '1', '2017-07-08 01:09:27', '2017-07-08 01:09:27'),
(3, 'Tri ân khách hàng tháng 7/2017', 'tri-an-khach-hang-thang-72017', 'Chương trình tri ân khách hàng diễn ra tại TP THành phố đà nẵng ...', '<p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision;\"><font color=\"#333333\" face=\"arial\"><b><i>Chương trình tri ân khách hàng diễn ra tại TP THành phố đà nẵng ...</i></b></font><br></p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Nếu so sánh với mức giá bán các sản phẩm tương tự tại thị trường Hong Kong hay Singapore, mức ưu đãi 50% này sẽ rẻ hơn và khách hàng lại được hưởng các dịch vụ ưu đãi hay bảo hành ngay tại Việt Nam, mà không mất thêm một vé máy bay khứ hồi để đi bảo hành, nếu chẳng may có bị hư hỏng trong quá trình sử dụng.</p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Các mặt hàng được giảm giá khá phong phú, đủ loại với quần áo, phụ kiện… cho cả nam và nữ. Với mức 30-50%, việc sở hữu những sản phẩm hàng hiệu trong mùa thật đơn giản, tuy nhiên với mức 70%, chủ yếu sẽ tập trung vào các bộ sưu tập từ năm 2012 trở về trước.</p>', '1499501470-trian.jpg', '1', '1', '2017-07-08 01:11:10', '2017-07-08 01:11:10'),
(4, 'Tri ân khách hàng tháng 8/2017', 'tri-an-khach-hang-thang-82017', 'Nếu so sánh với mức giá bán các sản phẩm tương tự tại thị trường Hong Kong hay Singapore, mức ưu đãi 50% này sẽ rẻ hơn và khách hàng lại được hưởng các dịch vụ ưu đãi hay bảo hành ngay tại Việt Nam, mà không mất thêm một vé máy bay khứ hồi để đi bảo hành, nếu chẳng may có bị hư hỏng trong quá trình sử dụng.\r\n\r\nCác mặt hàng được giảm giá khá phong phú, đủ loại với quần áo, phụ kiện… cho cả nam và nữ. Với mức 30-50%, việc sở hữu những sản phẩm hàng hiệu trong mùa thật đơn giản, tuy nhiên với mức 70%, chủ yếu sẽ tập trung vào các bộ sưu tập từ năm 2012 trở về trước.', '<p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\"><br></p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Nếu so sánh với mức giá bán các sản phẩm tương tự tại thị trường Hong Kong hay Singapore, mức ưu đãi 50% này sẽ rẻ hơn và khách hàng lại được hưởng các dịch vụ ưu đãi hay bảo hành ngay tại Việt Nam, mà không mất thêm một vé máy bay khứ hồi để đi bảo hành, nếu chẳng may có bị hư hỏng trong quá trình sử dụng.</p><p style=\"margin-bottom: 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: arial;\">Các mặt hàng được giảm giá khá phong phú, đủ loại với quần áo, phụ kiện… cho cả nam và nữ. Với mức 30-50%, việc sở hữu những sản phẩm hàng hiệu trong mùa thật đơn giản, tuy nhiên với mức 70%, chủ yếu sẽ tập trung vào các bộ sưu tập từ năm 2012 trở về trước.</p>', '1499501531-trian2.jpg', '9', '1', '2017-07-08 01:12:11', '2017-07-08 01:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_sanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cong_suat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kich_thuoc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quang_thong` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giam_gia` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thong_so` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `category_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ten_sanpham`, `slug`, `ma_sanpham`, `cong_suat`, `kich_thuoc`, `quang_thong`, `gia`, `giam_gia`, `img_path`, `thong_so`, `so_luong`, `category_id`, `delete`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'Đèn Trang Trí', 'den-trang-tri', 'KSTH-COB-5', '5w', '100x100', '85x85', '146000', '10', '1499098062-dentrangtri_1_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:07:42', '2017-07-03 09:07:42'),
(5, 'Đèn Trang Trí', 'den-trang-tri', 'DBS1-5', '5w', 'Φ120x20', '85x85', '170000', '10', '1499098090-dentrangtri_2_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:08:10', '2017-07-03 09:08:10'),
(6, 'Đèn Trang Trí', 'den-trang-tri', 'DBR1-4', '5w', 'Φ120x20', '80', '157000', '10', '1499098118-dentrangtri_3_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:08:38', '2017-07-03 09:08:38'),
(8, 'Đèn Trang Trí', 'den-trang-tri', 'DBS1-55', '5w', '100x100', '85x85', '141000', '10', '1499098321-dentrangtri_4_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:12:01', '2017-07-03 09:12:01'),
(9, 'Đèn Trang Trí', 'den-trang-tri', 'KSTH-COB-55', '5w', 'Φ120x20', '85x85', '170000', '10', '1499098348-dentrangtri_5_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:12:28', '2017-07-03 09:12:28'),
(10, 'Đèn Trang Trí', 'den-trang-tri', 'RPL-6W-3.5', '5w', '100x100', '80', '170000', '10', '1499098375-dentrangtri_7_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:12:55', '2017-07-03 09:12:55'),
(11, 'Đèn Trang Trí', 'den-trang-tri', 'KSTH-COB-54', '6w', '100x100', '80', '146000', '10', '1499098408-dentrangtri_7_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:13:28', '2017-07-03 09:13:28'),
(12, 'Đèn Trang Trí', 'den-trang-tri', 'RPL-6W-3.53', '5w', 'Φ120x20', '85x85', '141000', '10', '1499098441-dentrangtri_8_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:14:01', '2017-07-03 09:14:01'),
(13, 'Đèn Trang Trí', 'den-trang-tri', 'D0012', '6w', '100x100', '85x85', '170000', '10', '1499098468-dentrangtri_9_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:14:28', '2017-07-03 09:14:28'),
(14, 'Đèn Trang Trí', 'den-trang-tri', 'KS GZTD-05', '4w', 'Φ120x20', '85x85', '170000', '10', '1499098498-dentrangtri_1_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:14:58', '2017-07-03 09:14:58'),
(15, 'Đèn Trang Trí', 'den-trang-tri', 'DBR1-44', '6w', '100x100', '85x85', '146000', '10', '1499098526-dentrangtri_4_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '2', 0, '1', '2017-07-03 09:15:26', '2017-07-03 09:15:26'),
(16, 'Đèn LEB Âm Trần', 'den-leb-am-tran', 'KSTH-COB-512', '5w', '100x100', '11', '170000', '10', '1499477985-dentrangtri_8_resize.jpg', 'ABC', '20', '6', 0, '1', '2017-07-07 18:39:45', '2017-07-07 18:39:45'),
(17, 'Đèn Âm Trần', 'den-am-tran', 'KSTH-COB-123', '5w', '100x100', '11', '170000', '10', '1499498919-denamtran_1_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '5', 0, '1', '2017-07-08 00:28:41', '2017-07-08 00:28:41'),
(18, 'Đèn Âm Trần', 'den-am-tran', 'KSTH-COB-5231', '5w', '100x100', '11', '141000', '10', '1499498954-denamtran_2_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br> \r\n<br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '5', 0, '1', '2017-07-08 00:29:14', '2017-07-08 00:29:14'),
(19, 'Đèn Âm Trần', 'den-am-tran', 'DBS1-5123', '5w', '100x100', '11', '170000', '10', '1499498981-denamtran_3_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất: </span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu: </span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng: </span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện: </span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành: </span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 – </span><span class=\"fontstyle2\">Sử dụng trong nhà</span></td></tr></tbody></table><br style=\"line-height: normal; text-align: -webkit-auto; text-size-adjust: auto;\">', '20', '5', 0, '1', '2017-07-08 00:29:41', '2017-07-08 00:29:41'),
(20, 'Đèn Âm Trần', 'den-am-tran', 'KS GZTD-0513', '5w', '100x100', '11', '157000', '10', '1499499006-denamtran_3_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '20', '5', 0, '1', '2017-07-08 00:30:07', '2017-07-08 00:30:07'),
(21, 'Đèn Âm Trần', 'den-am-tran', 'D00112', '6w', '111', '11', '170000', '10', '1499499034-denamtran_4_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '20', '5', 0, '1', '2017-07-08 00:30:34', '2017-07-08 00:30:34'),
(22, 'Đèn Âm Trần', 'den-am-tran', 'KSTH-COB-5134', '4w', 'Φ120x20', '11', '141000', '10', '1499499059-denamtran_5_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '10', '5', 0, '1', '2017-07-08 00:31:00', '2017-07-08 00:31:00'),
(23, 'Đèn Âm Trần', 'den-am-tran', 'KS GZTD-05123', '5w', '100x100', '11', '146000', '10', '1499499089-denamtran_6_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '10', '5', 0, '1', '2017-07-08 00:31:29', '2017-07-08 00:31:29'),
(24, 'Đèn Âm Trần', 'den-am-tran', 'DBR1-4134', '4w', '100x100', '11', '146000', '10', '1499499121-denamtran_7_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '20', '5', 0, '1', '2017-07-08 00:32:01', '2017-07-08 00:32:01'),
(25, 'Đèn Âm Trần', 'den-am-tran', 'RPL-6W-3.523', '6w', 'Φ120x20', '11', '170000', '10', '1499499148-denamtran_7_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '10', '5', 0, '1', '2017-07-08 00:32:28', '2017-07-08 00:32:28'),
(26, 'Đèn Âm Trần', 'den-am-tran', 'KS GZTD-05125', '5w', '100x100', '11', '146000', '10', '1499499173-denamtran_8_resize.jpg', '<table class=\"NormalTable\"><tbody><tr><td width=\"200\"><span class=\"fontstyle0\">Thương hiệu</span><span class=\"fontstyle2\">: DBLED<br></span><span class=\"fontstyle0\">Hiệu suất:&nbsp;</span><span class=\"fontstyle2\">80lm/W<br></span><span class=\"fontstyle0\">Chỉ số hoàn màu:&nbsp;</span><span class=\"fontstyle2\">CRI&gt;80Ra<br></span><span class=\"fontstyle0\">Điện áp sử dụng:&nbsp;</span><span class=\"fontstyle2\">85VAC-265VAC</span><span class=\"fontstyle0\">.<br>Dòng điện:&nbsp;</span><span class=\"fontstyle2\">300mA<br></span><span class=\"fontstyle0\">Thời gian bảo hành:&nbsp;</span><span class=\"fontstyle2\">2 năm<br></span><span class=\"fontstyle0\">LED chip</span><span class=\"fontstyle2\">: Epistar – Taiwan<br></span><span class=\"fontstyle0\">IP44 –&nbsp;</span><span class=\"fontstyle2\">Sử dụng trong nhà<br><br></span></td></tr></tbody></table>', '20', '5', 0, '1', '2017-07-08 00:32:53', '2017-07-08 00:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@homehitech.vn', '$2y$10$OC9n7dEi6Zoz8XrANHpurum1drvv4AlhybP.gd6lWYZWl/mdxD1gS', '9VNXhosRH1BJDTRXUTAn0G3rgBlLzHLJsnJ5tqPJrX7Lu65P0dOcaXDVVuoB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cskh`
--
ALTER TABLE `cskh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cskh`
--
ALTER TABLE `cskh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
