-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsvienn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_phone` varchar(100) NOT NULL,
  `admin_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_avatar`) VALUES
(1, 'admin1@gmail.com', '$2y$12$3JKWq41QOKClrrKsWOHThuEdx2fnmcoiD9x1raysgf/muofvmyZte', 'Nhật Tinh Ngao', '0978987765', 'gv1.jpg'),
(2, 'editor1@gmail.com', '$2y$12$Xxzd92rcOpNefyhJvGymcOcUY50lPj3keRoJqJn2FVJMb/Qz/Foh.', 'ChiPu', '0978987657', 'gv1.jpg'),
(3, 'viewer1@gmail.com', '$2y$12$5B/0C3e1VmAH8eLeorAcP.CNCToBu/2IlLakN/a4nSL6P5YJhVK52', 'Elon Musk', '0978987885', 'gv1.jpg'),
(4, 'sdenesik@example.net', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Mr. Abdullah Wilderman', '0810611655', 'gv1.jpg'),
(5, 'hschiller@example.net', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Lue Brekke', '0742165931', 'gv1.jpg'),
(6, 'filomena42@example.com', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Jocelyn Reilly', '0983945837', 'gv1.jpg'),
(7, 'lela.barrows@example.net', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Prof. Emily Franecki DDS', '0934623407', 'gv1.jpg'),
(8, 'towne.heaven@example.com', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Dr. Karina Crooks Sr.', '0961053478', 'gv1.jpg'),
(9, 'hilpert.amiya@example.com', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Doug Mraz', '0876082953', 'gv1.jpg'),
(10, 'thudson@example.net', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Sallie Schaefer', '0822399476', 'gv1.jpg'),
(11, 'qkrajcik@example.com', '$2y$12$7qR34r9WZ90hsSa5YTQaLuessYpbSphkO51j4Fie4uVu7HG8rdcoa', 'Jacinthe Littel', '0924400137', 'gv1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `admin_role_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`admin_role_id`, `admin_id`, `role_id`) VALUES
(1, 1, 1),
(7, 2, 2),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `major_id` int(11) NOT NULL,
  `homeroom_teacher` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_code`, `class_name`, `major_id`, `homeroom_teacher`, `course_id`) VALUES
(1, 'N06', 'Công nghệ thông tin 6 ', 1, 45, 4),
(2, 'N05', 'Công nghệ thông tin 5 ', 1, 46, 3),
(3, 'N01', 'Công nghệ thông tin 1 ', 1, 47, 3),
(4, 'N02', 'Công nghệ thông tin 2 ', 1, 48, 3),
(5, 'N03', 'Công nghệ thông tin 3 ', 1, 49, 3),
(6, 'N04', 'Công nghệ thông tin 4 ', 1, 50, 3),
(7, 'N00', 'Công nghệ thông tin V.A ', 1, 51, 3),
(9, 'A01', 'Kế toán 1', 6, 54, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom`
--

CREATE TABLE `tbl_classroom` (
  `classroom_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_classroom`
--

INSERT INTO `tbl_classroom` (`classroom_id`, `building_name`, `room_name`, `capacity`) VALUES
(3, 'A2', '101', 100),
(4, 'A2', '102', 100),
(5, 'A2', '201', 100),
(6, 'A2', '202', 100),
(7, 'A2', '103', 100),
(8, 'A2', '104', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_section`
--

CREATE TABLE `tbl_class_section` (
  `class_section_id` int(11) NOT NULL,
  `class_section_code` varchar(100) NOT NULL,
  `class_section_name` varchar(100) NOT NULL,
  `semester_subject_id` int(11) NOT NULL,
  `class_section_capacity` int(11) NOT NULL,
  `code_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_class_section`
--

INSERT INTO `tbl_class_section` (`class_section_id`, `class_section_code`, `class_section_name`, `semester_subject_id`, `class_section_capacity`, `code_id`, `term_id`) VALUES
(1, 'MH01LTW_1', 'Lập trình web', 4, 100, 1, 1),
(17, 'MH01LTW_2', 'Lập trình web', 4, 80, 2, 1),
(18, 'MH01LTW_3', 'Lập trình web', 4, 50, 2, 1),
(19, 'ggg', 'ggg', 5, 50, 2, 1),
(20, 'thdc1', 'Tin học đại cương', 1, 10, 2, 1),
(21, 'csdl1', 'Cơ sở dữ liệu', 5, 10, 2, 1),
(22, 'qlda1', 'Quản lý dự án', 7, 10, 1, 1),
(23, 'CNW1', 'Công nghệ web', 9, 10, 1, 1),
(24, 'CNW2', 'Công nghệ web', 9, 10, 2, 1),
(25, 'MH01LTW_4', 'Lập trình web', 4, 63, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_code`
--

CREATE TABLE `tbl_code` (
  `code_id` int(11) NOT NULL,
  `on_off` varchar(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_code`
--

INSERT INTO `tbl_code` (`code_id`, `on_off`, `start_date`, `end_date`, `time`, `semester`, `year`) VALUES
(1, '0', '2023-10-01', '2023-12-29', '9h', 1, '2023-2024'),
(2, '1', '2024-04-04', '2024-04-23', '9h', 2, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `year_of_admission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `year_of_admission`) VALUES
(1, 'K61', 2020),
(2, 'K62', 2021),
(3, 'K63', 2022),
(4, 'K64', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollmentdetail`
--

CREATE TABLE `tbl_enrollmentdetail` (
  `enrollmentDetail_id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `enrollmentDetail_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enrollmentdetail`
--

INSERT INTO `tbl_enrollmentdetail` (`enrollmentDetail_id`, `enrollment_id`, `class_section_id`, `enrollmentDetail_date`) VALUES
(1, 1, 17, '2024-03-31'),
(2, 2, 17, '2024-04-03'),
(3, 2, 20, '2024-04-11'),
(4, 2, 21, '2024-04-11'),
(5, 2, 22, '2024-04-11'),
(7, 1, 18, '2024-04-01'),
(8, 2, 24, '2024-05-14'),
(9, 8, 17, '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollments`
--

CREATE TABLE `tbl_enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enrollments`
--

INSERT INTO `tbl_enrollments` (`enrollment_id`, `student_id`) VALUES
(1, 4),
(2, 51),
(8, 59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_code` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_code`, `faculty_name`) VALUES
(1, 'MK01CNTT', 'Công nghệ thông tin'),
(2, 'MK02CT', 'Công trình'),
(3, 'MK03CK', 'Cơ khí'),
(4, 'MK04VTKT', 'Vận tải kinh tế'),
(5, 'MK05DDT', 'Điện - điện tử'),
(6, 'MK06LLCT', 'Lý luận chính trị'),
(7, 'MK07KTXD', 'Kỹ thuật xây dựng'),
(8, 'MK08QLXD', 'Quản lý xây dựng'),
(9, 'MK09DTQT', 'Đào tạo quốc tế'),
(10, 'MK10GDQP', 'Giáo dục quốc phòng'),
(11, 'MK11MTVATGT', 'Môi trường và an toàn giao thông'),
(12, 'MK12CB', 'Cơ bản'),
(13, '5555', 'gggg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grades_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`grades_id`, `student_id`, `subject_id`) VALUES
(1, 51, 1),
(2, 51, 2),
(5, 51, 23),
(6, 51, 31),
(7, 4, 1),
(8, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gradesdetail`
--

CREATE TABLE `tbl_gradesdetail` (
  `gradesDetail_id` int(11) NOT NULL,
  `grades_id` int(11) NOT NULL,
  `process_points` float DEFAULT NULL,
  `test_score` float DEFAULT NULL,
  `final_grades` float DEFAULT NULL,
  `attempt_number` int(11) DEFAULT NULL,
  `class_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gradesdetail`
--

INSERT INTO `tbl_gradesdetail` (`gradesDetail_id`, `grades_id`, `process_points`, `test_score`, `final_grades`, `attempt_number`, `class_section_id`) VALUES
(1, 1, 3, 3, 3, 1, 1),
(2, 1, 8, NULL, NULL, 2, 18),
(3, 2, 5, 5, 5.5, 1, 20),
(5, 5, 7, 7, 7.1, 1, 21),
(6, 6, 8, 8, 8.3, 1, 22),
(8, 7, 5, 5, 6, 1, 18),
(9, 1, 5, 6, 7, 3, 17),
(10, 8, 6, 5, 6, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_major`
--

CREATE TABLE `tbl_major` (
  `major_id` int(11) NOT NULL,
  `major_code` varchar(100) DEFAULT NULL,
  `major_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_major`
--

INSERT INTO `tbl_major` (`major_id`, `major_code`, `major_name`, `faculty_id`) VALUES
(1, 'CN01CNTT', 'Công nghệ thông tin', 1),
(2, 'CN02KTXDDB', 'Kỹ thuật xây dựng Đường bộ', 2),
(3, 'CN02KTXDDS', 'Kỹ thuật xây dựng Đường sắt', 2),
(4, 'CN03CKGTCC', 'Cơ khí giao thông công chính', 3),
(5, 'CN05KTDTVTHCN', 'Kỹ thuật điện tử và Tin học công nghiệp', 5),
(6, 'CN04KTVTDL', 'Kinh tế vận tải du lịch', 4),
(7, 'CN06CTH', 'Chính trị học', 6),
(8, 'CN07XDDDVCN', 'Xây dựng dân dụng và Công nghiệp', 7),
(9, 'CN08QLXD', 'Quản lý xây dựng', 8),
(10, 'CN09CNTT', 'Công nghệ thông tin', 9),
(11, 'CN10GDQP', 'Giáo dục quốc phòng', 10),
(12, 'CN02KTXDCDB', 'Kỹ thuật xây dựng Cầu - Đường bộ', 2),
(13, 'CN02KTXDDSDT', 'Kỹ thuật xây dựng Đường sắt đô thị', 2),
(14, 'CN02KTXDCH', 'Kỹ thuật xây dựng Cầu hầm', 2),
(15, 'CN02KTXDDHM', 'Kỹ thuật xây dựng Đường hầm - Metro', 2),
(16, 'CN02KTXDCDS', 'Kỹ thuật xây dựng Cầu - Đường sắt', 2),
(17, 'CN02DKTXDCTGT', 'Địa kỹ thuật xây dựng Công trình giao thông', 2),
(18, 'CN03DMTX', 'Đầu máy toa xe', 3),
(19, 'CN03CGXDCD', 'Cơ giới hóa xây dựng cầu đường', 3),
(20, 'CN03KTMDL', 'Kỹ thuật Máy động lực', 3),
(21, 'CN03TDM', 'Tàu điện Metro', 3),
(22, 'CN03CNCTCK', 'Công nghệ chế tạo cơ khí', 3),
(23, 'CN04KTVTHK', 'Kinh tế vận tải hàng không', 4),
(24, 'CN04KTVTOT', 'Kinh tế vận tải ô tô', 4),
(25, 'CN04KTVTDS', 'Kinh tế vận tải đường sắt', 4),
(26, 'CN04KTVTTB', 'Kinh tế vận tải thủy bộ', 4),
(27, 'CN04VTTMQT', 'Vận tải thương mại quốc tế', 4),
(28, 'CN05TTBTCNVGT', 'Trang thiết bị trong Công nghiệp và Giao thông', 5),
(29, 'CN05HTDGTVCN', 'Hệ thống điện Giao thông và Công nghiệp', 5),
(30, 'CN05KTDKVTDHGT', 'Kỹ thuật điều khiển và Tự động hóa GT', 5),
(31, 'CN05KTTHDS', 'Kỹ thuật tín hiệu Đường sắt', 5),
(32, 'CN05TDH', 'Tự động hóa', 5),
(33, 'CN06THCT', 'Triết học Chính trị', 6),
(34, 'CN06LSCT', 'Lịch sử Chính trị', 6),
(35, 'CN06CTQT', 'Chính trị quốc tế', 6),
(36, 'CN06CTSS', 'Chính trị so sánh', 6),
(37, 'CN06LLXHCT', 'Lý luận xã hội chính trị', 6),
(38, 'CN07KCXD', 'Kết cấu xây dựng', 7),
(39, 'CN07KTHTDT', 'Kỹ thuật hạ tầng đô thị', 7),
(40, 'CN07VLVCNXD', 'Vật liệu và Công nghiệp xây dựng', 7),
(41, 'CN08KTXDCTGT', 'Kinh tế xây dựng Công trình giao thông', 8),
(42, 'CN08KTQLKTCD', 'Kinh tế quản lý khai thác cầu đường', 8),
(43, 'CN11KTATGT', 'Kỹ thuật An toàn giao thông', 11),
(44, 'CN11KTMT', 'Kỹ thuật môi trường', 11),
(45, 'CN12TUD', 'Toán ứng dụng', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passwordresettoken`
--

CREATE TABLE `tbl_passwordresettoken` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id` int(11) NOT NULL,
  `posts_title` varchar(255) NOT NULL,
  `posts_content` text DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`posts_id`, `posts_title`, `posts_content`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 'Lịch Thực tập xưởng-1-2-23(N08).TT. Mã học phần: ME0.902.2-1-2-23(N08). Thời gian: Từ 01/04/2024 đến 14/04/2024 (29/03/2024)', '<p><strong>bbbbb &nbsp;&nbsp;</strong><i>gggg</i></p>', 1, '2024-03-30 15:02:19', NULL),
(3, 'Mức thu học phí lớp có sĩ số dưới 15 sinh viên năm học 2023 - 2024 (19/03/2024)', '<p>&nbsp;</p><ol><li><h2>hh</h2></li></ol><ul><li>&nbsp;</li></ul>', 1, '2024-03-30 15:04:49', NULL),
(12, 'Thông báo hủy các HP lớp riêng đợt học 3 học kỳ 2 năm học 2023 - 2024 (19/03/2024)', '<p>Sinh viên các khóa chú ý:</p><p>&nbsp;Phòng Đào tạo ĐH đã hủy các HP lớp riêng sau cùng số sinh viên đăng ký do các lớp HP này đã mở lớp chung ở đợt học 2 kỳ 2 năm học 2023 - 2024:&nbsp;</p><p>1. CNG201.3 Khoa học vật liệu cơ khí&nbsp;</p><p>2. MLN302.2 Kinh tế chính trị Mác - Lênin</p><p>3. TKM03.2 Dung sai và đo lường cơ khí&nbsp;</p><p>4. DTU202.3 Kỹ thuật điện tử tương tự&nbsp;</p><p>5. GIT08.2 Hàm phức&nbsp;</p><p>6. COT202.3 Thủy văn công trình</p>', 1, '2024-03-30 15:23:17', NULL),
(13, 'Lịch đăng ký đợt học 3 kỳ 2 năm học 2023 - 2024 (Lớp dưới 15 sinh viên) (13/03/2024)', NULL, 1, '2024-03-30 15:07:41', NULL),
(14, 'Thời khóa biểu các lớp học phần Giáo dục quốc phòng dành cho sinh viên đại học chính quy K64 các Khoa Điện tử, Cơ bản và Khoa Công nghệ thông tin (năm học 2023-2024- học kỳ 2) (13/03/2024)', '<p>ko</p>', 1, '2024-05-07 16:49:50', '2024-05-07 09:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` enum('Admin','Editor','Write','Delete','Add') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Add'),
(4, 'Delete'),
(5, 'Write');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `start_end_date_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `schedule_time` varchar(100) NOT NULL,
  `schedule_day` enum('2','3','4','5','6','7') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `start_end_date_id`, `classroom_id`, `schedule_time`, `schedule_day`) VALUES
(1, 1, 3, '1,2,3', '2'),
(2, 1, 3, '1,2,3', '4'),
(9, 4, 4, '7,8,9', '2'),
(11, 5, 5, '1,2,3', '7'),
(12, 5, 4, '6,7,8', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` enum('1','2','3','extra','') NOT NULL,
  `IsOpenForRegistration` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `semester_name`, `IsOpenForRegistration`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, 'extra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester_subject`
--

CREATE TABLE `tbl_semester_subject` (
  `semester_subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_semester_subject`
--

INSERT INTO `tbl_semester_subject` (`semester_subject_id`, `semester_id`, `subject_id`) VALUES
(4, 1, 1),
(1, 1, 2),
(5, 1, 23),
(8, 2, 27),
(9, 3, 30),
(7, 3, 31),
(10, 3, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_start_end_date`
--

CREATE TABLE `tbl_start_end_date` (
  `start_end_date_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_start_end_date`
--

INSERT INTO `tbl_start_end_date` (`start_end_date_id`, `class_section_id`, `start_date`, `end_date`) VALUES
(1, 1, '2024-03-01', '2024-03-31'),
(2, 1, '2024-04-01', '2024-04-30'),
(4, 17, '2024-03-13', '2024-04-04'),
(5, 18, '2024-04-02', '2024-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `student_avatar` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_code`, `first_name`, `last_name`, `date_of_birth`, `gender`, `address`, `email`, `phone`, `student_avatar`, `class_id`) VALUES
(4, '201200143', 'Đỗ', 'Long', '2002-11-03', 'male', 'Hà Nội', 'dolong@gmail.com', '0987475642', 'gv1.jpg', 1),
(5, '201200147', 'Nguyễn', 'Hương', '2002-06-15', 'female', 'Hồ Chí Minh', 'nguyenhuong@gmail.com', '0978654328', 'gv1.jpg', 1),
(6, '201200148', 'Trần', 'Nam', '2002-09-22', 'male', 'Đà Nẵng', 'trannam@gmail.com', '0934123789', 'gv1.jpg', 1),
(7, '201200149', 'Lê', 'Hà', '2002-02-28', 'female', 'Hải Phòng', 'leha@gmail.com', '0912345670', 'gv1.jpg', 1),
(8, '201200150', 'Phạm', 'Linh', '2002-08-10', 'male', 'Ninh Bình', 'phamlinh@gmail.com', '0945678901', 'gv1.jpg', 1),
(9, '201200151', 'Vũ', 'Hải', '2002-03-05', 'male', 'Quảng Ninh', 'vuhai@gmail.com', '0965432109', 'gv1.jpg', 1),
(10, '201200152', 'Ngô', 'Lan', '2002-07-18', 'female', 'Thanh Hóa', 'ngolan@gmail.com', '0923456789', 'gv1.jpg', 1),
(11, '201200153', 'Phan', 'Minh', '2002-01-12', 'male', 'Hà Giang', 'phanminh@gmail.com', '0998765432', 'gv1.jpg', 1),
(12, '201200154', 'Hoàng', 'My', '2002-05-20', 'female', 'Lào Cai', 'hoangmy@gmail.com', '0954321897', 'gv1.jpg', 1),
(13, '201200155', 'Trịnh', 'Thị', '2002-04-08', 'male', 'Bắc Ninh', 'trinhthi@gmail.com', '0987654321', 'gv1.jpg', 1),
(14, '201200156', 'Dương', 'Hữu', '2002-10-16', 'male', 'Thái Bình', 'duonghuu@gmail.com', '0976543214', 'gv1.jpg', 1),
(15, '201200157', 'Võ', 'Như', '2002-12-02', 'female', 'Nam Định', 'vonhu@gmail.com', '0967890124', 'gv1.jpg', 1),
(16, '201200158', 'Lý', 'Khánh', '2002-08-25', 'male', 'Hà Nam', 'lykhanh@gmail.com', '0932109875', 'gv1.jpg', 1),
(17, '201200159', 'Bùi', 'Quỳnh', '2002-06-30', 'male', 'Phú Thọ', 'buiquynh@gmail.com', '0943216789', 'gv1.jpg', 1),
(18, '201200160', 'Hoàng', 'Tuấn', '2002-09-10', 'male', 'Bắc Giang', 'hoangtuan@gmail.com', '0912345678', 'gv1.jpg', 1),
(19, '201200161', 'Phùng', 'Duy', '2002-02-15', 'male', 'Vĩnh Phúc', 'phungduy@gmail.com', '0987654320', 'gv1.jpg', 1),
(20, '201200162', 'Lê', 'Thu', '2002-05-22', 'female', 'Yên Bái', 'lethu@gmail.com', '0976543210', 'gv1.jpg', 1),
(21, '201200163', 'Trương', 'Hải', '2002-11-08', 'male', 'Lạng Sơn', 'truonghai@gmail.com', '0967890123', 'gv1.jpg', 1),
(22, '201200164', 'Đặng', 'Tâm', '2002-07-12', 'male', 'Cao Bằng', 'dangtam@gmail.com', '0932109876', 'gv1.jpg', 1),
(23, '201201111', 'Lữ', 'Pố', '2004-07-14', 'male', 'Ha Noi', 'lupo@gmail.com', '0372687311', 'gv1.jpg', 1),
(51, '301200143', 'Thoại', 'Phạm', '2004-11-05', 'female', 'Hà Nội', 'phmamthooai@gmail.com', '9870043243', 'gv1.jpg', 1),
(52, '301200144', 'Phạm', 'Thoại', '2004-11-05', 'female', 'Hà Nội', 'phmamthoai@gmail.com', '987004323', 'gv1.jpg', 1),
(57, '234356787', 'G', 'G', '2024-03-05', 'female', 'g', 'g454@gmail.com', '0765556755', 'a.jpg', 2),
(59, '4344544545', 'Hồng', 'Nguyễn', '2024-04-15', 'male', 'Ha Noi', 'nguyenhong31081@gmail.com', '0372687318', 'Screenshot 2023-03-13 161749.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_account`
--

CREATE TABLE `tbl_student_account` (
  `student_account_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student_account`
--

INSERT INTO `tbl_student_account` (`student_account_id`, `email`, `password`, `student_id`) VALUES
(4, 'user4@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 4),
(5, 'user5@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 5),
(6, 'user6@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 6),
(7, 'user7@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 7),
(8, 'user8@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 8),
(9, 'user9@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 9),
(10, 'user10@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 10),
(11, 'user11@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 11),
(12, 'user12@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 12),
(13, 'user13@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 13),
(14, 'user14@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 14),
(15, 'user15@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 15),
(16, 'user16@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 16),
(17, 'user17@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 17),
(18, 'user18@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 18),
(19, 'user19@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 19),
(20, 'user20@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 20),
(21, 'user21@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 21),
(22, 'user22@gmail.com', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 23),
(102, 'aaa', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 22),
(104, '301200143', '$2y$12$nvxUCT757inCXTbZpCDOWOW8VA739cWl9eN5GJuyxzZVXLFHAip9C', 51),
(105, '301200144', '$2y$12$232f9jXBFR.X52BwE3WNqervcUZ1SpJql3aj0bu8jEMkhL/ax9sMK', 52),
(109, 'nguyenhong31081@gmail.com', '$2y$12$A2nao3MFE6YXDGwq26ABfuzqnJt9PsVUEVcV76nosplaHyaaTjsEq', 59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_credit` int(11) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_name`, `subject_credit`, `major_id`) VALUES
(1, 'MH01LTW', 'Lập trình web', 3, 1),
(2, 'MH02THDC', 'Tin học đại cương', 3, 1),
(23, 'MH03CSDL', 'Cơ sở dữ liệu', 3, 1),
(24, 'MH04MMT', 'Mạng máy tính', 2, 1),
(25, 'MH05NNLTC', 'Ngôn ngữ lập trình C', 3, 1),
(26, 'MH06ATTT', 'An toàn thông tin', 2, 1),
(27, 'MH07PTVTKHT', 'Phân tích và thiết kế hệ thống', 3, 1),
(28, 'MH08QTCSDL', 'Quản trị cơ sở dữ liệu', 2, 1),
(29, 'MH09HDH', 'Hệ điều hành', 3, 1),
(30, 'MH10CNW', 'Công nghệ web', 2, 1),
(31, 'MH11QLDA', 'Quản lý dự án', 3, 1),
(32, 'MH12TGMT', 'Thị giác máy tính', 2, 1),
(33, 'MH13HM', 'Học máy', 3, 1),
(34, 'MH14LTP', 'Lập trình Python', 2, 1),
(35, 'MH15TTNT', 'Trí tuệ nhân tạo', 3, 1),
(37, 'MH16CNA', 'Công nghệ ảo', 3, 1),
(38, 'MH17KDDT', 'Kinh doanh điện tử', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_code` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_phone` varchar(100) NOT NULL,
  `teacher_address` varchar(100) NOT NULL,
  `teacher_date_of_birth` date NOT NULL,
  `teacher_gender` enum('Male','Female') NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `teacher_title` enum('Lecturers','Dean','Deputy_dean') NOT NULL,
  `teacher_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_code`, `teacher_name`, `teacher_email`, `teacher_phone`, `teacher_address`, `teacher_date_of_birth`, `teacher_gender`, `faculty_id`, `teacher_title`, `teacher_avatar`) VALUES
(45, 'GV0000001', 'Đinh Công Tùng', 'ct01@gmail.com', '0123456789', 'Hà Nội', '1985-03-15', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(46, 'GV0000002', 'Nguyễn Hiếu Cường', 'hc02@gmail.com', '0789654567', 'Hà Nội', '1988-07-22', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(47, 'GV0000003', 'Nguyễn Quốc Tuấn', 'qt03@gmail.com', '0000000003', 'Hà Nội', '1992-05-10', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(48, 'GV0000004', 'Nguyễn Thanh Toàn', 'tt04@gmail.com', '0000000004', 'Hà Nội', '1987-11-30', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(49, 'GV0000005', 'Hoàng Văn Thông', 'vt05@gmail.com', '6509008976', 'Hà Nội', '1995-04-18', 'Male', 1, 'Dean', 'gv1.jpg'),
(50, 'GV0000006', 'Nguyễn Trần Hiếu', 'th06@gmail.com', '0000000006', 'Hà Nội', '1984-09-25', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(51, 'GV0000007', 'Đào Thị Lệ Thủy', 'lt07@gmail.com', '0000000007', 'Hà Nội', '1993-12-07', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(52, 'GV0000008', 'Lại Mạnh Dũng', 'md08@gmail.com', '0000000008', 'Hà Nội', '1989-08-14', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(53, 'GV0000009', 'Bùi Ngọc Dũng', 'nd09@gmail.com', '0000000009', 'Hà Nội', '1991-06-02', 'Male', 1, 'Deputy_dean', 'gv1.jpg'),
(54, 'GV0000010', 'Nguyễn Đức Dư', 'dd10@gmail.com', '0000000010', 'Hà Nội', '1986-02-28', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(55, 'GV0000011', 'Nguyễn Kim Sao', 'ks11@gmail.com', '0000000011', 'Hà Nội', '1994-10-05', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(56, 'GV0000012', 'Lương Thái Lê', 'tl12@gmail.com', '0000000012', 'Hà Nội', '1997-07-12', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(57, 'GV0000013', 'Nguyễn Thu Hường', 'th13@gmail.com', '0000000013', 'Hà Nội', '1983-03-20', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(58, 'GV0000014', 'Phạm Đình Phong', 'dp14@gmail.com', '0000000014', 'Hà Nội', '1996-09-08', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(59, 'GV0000015', 'Nguyễn Trọng Phúc', 'tp15@gmail.com', '0000000015', 'Hà Nội', '1982-04-15', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(60, 'GV0000016', 'Nguyễn Việt Hưng', 'vh16@gmail.com', '0000000016', 'Hà Nội', '1998-11-22', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(61, 'GV0000017', 'Cao Thị Luyến', 'tl17@gmail.com', '0000000017', 'Hà Nội', '1981-06-30', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(62, 'GV0000018', 'Đỗ Văn Đức', 'vd18@gmail.com', '0000000018', 'Hà Nội', '1999-01-14', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(63, 'GV0000019', 'Phạm Xuân Tích', 'xt19@gmail.com', '0000000019', 'Hà Nội', '1990-01-01', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(64, 'GV0000020', 'Nguyễn Thị Hồng Hoa', 'hh20@gmail.com', '0000000020', 'Hà Nội', '1980-08-18', 'Female', 1, 'Lecturers', 'gv1.jpg'),
(65, 'GV1234567', 'gg', 'g@gmail.com', '0372687318', 'Ha Noi', '2024-03-05', 'Male', 1, 'Lecturers', 'gv1.jpg'),
(66, 'GV1111222', 'hh', 'gg1@gmail.com', '0372687000', 'Ha Noi', '2024-02-28', 'Female', 2, 'Deputy_dean', 'gv1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_assignment`
--

CREATE TABLE `tbl_teacher_assignment` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE `tbl_term` (
  `term_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `on_off` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_term`
--

INSERT INTO `tbl_term` (`term_id`, `name`, `on_off`) VALUES
(1, 1, 1),
(2, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_phone` (`admin_phone`);

--
-- Indexes for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`admin_role_id`),
  ADD KEY `FK_admin` (`admin_id`),
  ADD KEY `FK_role` (`role_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`),
  ADD KEY `FK_class_major` (`major_id`),
  ADD KEY `FK_class_teacher` (`homeroom_teacher`),
  ADD KEY `FK_class_course` (`course_id`);

--
-- Indexes for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  ADD PRIMARY KEY (`class_section_id`),
  ADD UNIQUE KEY `unique_class_section_code` (`class_section_code`) USING BTREE,
  ADD KEY `FK_semester_subject_section` (`semester_subject_id`),
  ADD KEY `FK_code` (`code_id`),
  ADD KEY `FK_term` (`term_id`);

--
-- Indexes for table `tbl_code`
--
ALTER TABLE `tbl_code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`),
  ADD UNIQUE KEY `year_of_admission` (`year_of_admission`);

--
-- Indexes for table `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  ADD PRIMARY KEY (`enrollmentDetail_id`),
  ADD KEY `FK_enrollDetail_enrollment` (`enrollment_id`),
  ADD KEY `FK_enrollDetail_section` (`class_section_id`);

--
-- Indexes for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `FK_enrollment_student` (`student_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_code` (`faculty_code`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grades_id`),
  ADD KEY `FK_grades_student` (`student_id`),
  ADD KEY `FK_grades_subject` (`subject_id`);

--
-- Indexes for table `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  ADD PRIMARY KEY (`gradesDetail_id`),
  ADD KEY `FK_grades` (`grades_id`),
  ADD KEY `FK_gradesdetail_classsection` (`class_section_id`);

--
-- Indexes for table `tbl_major`
--
ALTER TABLE `tbl_major`
  ADD PRIMARY KEY (`major_id`),
  ADD UNIQUE KEY `major_code` (`major_code`),
  ADD KEY `FK_major_faculty` (`faculty_id`) USING BTREE;

--
-- Indexes for table `tbl_passwordresettoken`
--
ALTER TABLE `tbl_passwordresettoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `FK_post_admin` (`admin_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `FK_schedu_classroom` (`classroom_id`),
  ADD KEY `FK_schedu_date` (`start_end_date_id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  ADD PRIMARY KEY (`semester_subject_id`),
  ADD UNIQUE KEY `semester_id` (`semester_id`,`subject_id`),
  ADD KEY `FK_semester_nn` (`semester_id`),
  ADD KEY `FK_subject_nn` (`subject_id`);

--
-- Indexes for table `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  ADD PRIMARY KEY (`start_end_date_id`),
  ADD KEY `FK_class_section_date` (`class_section_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `unique_student_code` (`student_code`),
  ADD KEY `FK_student_class` (`class_id`);

--
-- Indexes for table `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  ADD PRIMARY KEY (`student_account_id`),
  ADD UNIQUE KEY `unique_user_email` (`email`),
  ADD UNIQUE KEY `unique_studentId` (`student_id`),
  ADD KEY `FK_user_student` (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `unique_subject_name` (`subject_name`),
  ADD UNIQUE KEY `unique_subject_code` (`subject_code`),
  ADD KEY `FK_subject_major` (`major_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `unique_teacher_code` (`teacher_code`),
  ADD KEY `FK_teacher_faculty` (`faculty_id`) USING BTREE;

--
-- Indexes for table `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `FK_teacher` (`teacher_id`),
  ADD KEY `FK_teacher_assignment` (`class_section_id`);

--
-- Indexes for table `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `admin_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  MODIFY `class_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_code`
--
ALTER TABLE `tbl_code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  MODIFY `enrollmentDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  MODIFY `gradesDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_major`
--
ALTER TABLE `tbl_major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_passwordresettoken`
--
ALTER TABLE `tbl_passwordresettoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  MODIFY `semester_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  MODIFY `start_end_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  MODIFY `student_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_term`
--
ALTER TABLE `tbl_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD CONSTRAINT `FK_admin` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`),
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);

--
-- Constraints for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `FK_class_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`),
  ADD CONSTRAINT `FK_class_major` FOREIGN KEY (`major_id`) REFERENCES `tbl_major` (`major_id`),
  ADD CONSTRAINT `FK_class_teacher` FOREIGN KEY (`homeroom_teacher`) REFERENCES `tbl_teacher` (`teacher_id`);

--
-- Constraints for table `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  ADD CONSTRAINT `FK_code` FOREIGN KEY (`code_id`) REFERENCES `tbl_code` (`code_id`),
  ADD CONSTRAINT `FK_semester_subject_section` FOREIGN KEY (`semester_subject_id`) REFERENCES `tbl_semester_subject` (`semester_subject_id`),
  ADD CONSTRAINT `FK_term` FOREIGN KEY (`term_id`) REFERENCES `tbl_term` (`term_id`);

--
-- Constraints for table `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  ADD CONSTRAINT `FK_enrollDetail_enrollment` FOREIGN KEY (`enrollment_id`) REFERENCES `tbl_enrollments` (`enrollment_id`),
  ADD CONSTRAINT `FK_enrollDetail_section` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);

--
-- Constraints for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD CONSTRAINT `FK_enrollment_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`);

--
-- Constraints for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD CONSTRAINT `FK_grades_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`),
  ADD CONSTRAINT `FK_grades_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`);

--
-- Constraints for table `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  ADD CONSTRAINT `FK_grades` FOREIGN KEY (`grades_id`) REFERENCES `tbl_grades` (`grades_id`),
  ADD CONSTRAINT `FK_gradesdetail_classsection` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);

--
-- Constraints for table `tbl_major`
--
ALTER TABLE `tbl_major`
  ADD CONSTRAINT `FK_major_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`);

--
-- Constraints for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `FK_post_admin` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`);

--
-- Constraints for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD CONSTRAINT `FK_schedu_classroom` FOREIGN KEY (`classroom_id`) REFERENCES `tbl_classroom` (`classroom_id`),
  ADD CONSTRAINT `FK_schedu_date` FOREIGN KEY (`start_end_date_id`) REFERENCES `tbl_start_end_date` (`start_end_date_id`);

--
-- Constraints for table `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  ADD CONSTRAINT `FK_semester_nn` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`semester_id`),
  ADD CONSTRAINT `FK_subject_nn` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`);

--
-- Constraints for table `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  ADD CONSTRAINT `FK_class_section_date` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `FK_student_class` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`class_id`);

--
-- Constraints for table `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  ADD CONSTRAINT `FK_user_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`);

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `FK_subject_major` FOREIGN KEY (`major_id`) REFERENCES `tbl_major` (`major_id`);

--
-- Constraints for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD CONSTRAINT `FK_teacher_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`);

--
-- Constraints for table `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  ADD CONSTRAINT `FK_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`),
  ADD CONSTRAINT `FK_teacher_assignment` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
