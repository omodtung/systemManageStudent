-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 17, 2023 lúc 08:35 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'tungdo', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'tung', 'do');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `allot`
--

CREATE TABLE `allot` (
  `stt` int(11) NOT NULL,
  `malop` varchar(10) NOT NULL,
  `mamon` varchar(10) NOT NULL,
  `magv` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `makhoi` varchar(5) NOT NULL,
  `classname` varchar(20) NOT NULL,
  `manamhoc` varchar(6) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`makhoi`, `classname`, `manamhoc`, `number`) VALUES
('k10', '10A1', 'NH2223', 30),
('k10', '10A2', 'NH2223', 30),
('k10', '10A3', 'NH2223', 30),
('k11', '11A1', 'NH2223', 30),
('k11', '11A2', 'NH2223', 30),
('k11', '11A3', 'NH2223', 30),
('k11', '11A4', 'NH2223', 30),
('k12', '12A1', 'NH2223', 30),
('k12', '12A2', 'NH2223', 30),
('k12', '12A3', 'NH2223', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(31) NOT NULL,
  `grade_code` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `grade_code`) VALUES
(1, 'Khoi 10', 'k10'),
(2, 'Khoi 11', 'k11'),
(3, 'Khoi 12', 'k12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule`
--

CREATE TABLE `schedule` (
  `ID_Schedule` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `student_code` varchar(5) NOT NULL,
  `diem15` float NOT NULL,
  `diem45` float NOT NULL,
  `thi` float NOT NULL,
  `tbm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `score`
--

INSERT INTO `score` (`id_score`, `id_subject`, `student_code`, `diem15`, `diem45`, `thi`, `tbm`) VALUES
(1, 1, 'HS001', 5.5, 6.9, 8.9, 7.2),
(2, 2, 'HS001', 6.2, 7.8, 9.2, 7.7),
(3, 3, 'HS001', 6.9, 8.4, 9.5, 8.1),
(4, 4, 'HS001', 7.6, 9, 9.8, 8.6),
(5, 5, 'HS001', 8.3, 9.6, 9.9, 9),
(6, 6, 'HS001', 5.1, 6.6, 8.7, 6.9),
(7, 7, 'HS001', 5.8, 7.2, 9, 7.2),
(8, 8, 'HS001', 6.5, 7.8, 9.3, 7.7),
(9, 9, 'HS001', 7.2, 8.4, 9.6, 8.2),
(10, 10, 'HS001', 7.9, 9, 9.9, 8.7),
(11, 11, 'HS001', 8.6, 9.6, 9.9, 9.2),
(12, 12, 'HS001', 9.3, 9.8, 9.9, 9.6),
(13, 1, 'HS002', 5.7, 7.2, 9.1, 7.4),
(14, 2, 'HS002', 6.4, 7.9, 9.4, 7.9),
(15, 3, 'HS002', 7.1, 8.6, 9.7, 8.4),
(16, 4, 'HS002', 7.8, 9.2, 9.8, 8.8),
(17, 5, 'HS002', 8.5, 9.7, 9.9, 9.3),
(18, 6, 'HS002', 5.3, 6.8, 8.8, 7.1),
(19, 7, 'HS002', 6, 7.4, 9.1, 7.5),
(20, 8, 'HS002', 6.7, 8.1, 9.4, 7.9),
(21, 9, 'HS002', 7.4, 8.7, 9.7, 8.5),
(22, 10, 'HS002', 8.1, 9.3, 9.9, 8.9),
(23, 11, 'HS002', 8.8, 9.7, 9.9, 9.4),
(24, 12, 'HS002', 9.5, 9.9, 9.9, 9.7),
(25, 1, 'HS003', 5.9, 7.4, 9.2, 7.6),
(26, 2, 'HS003', 6.6, 8.1, 9.5, 8),
(27, 3, 'HS003', 7.3, 8.8, 9.8, 8.5),
(28, 4, 'HS003', 8, 9.4, 9.9, 8.9),
(29, 5, 'HS003', 8.7, 9.8, 9.9, 9.4),
(30, 6, 'HS003', 5.5, 7, 8.9, 7.2),
(31, 7, 'HS003', 6.2, 7.6, 9.2, 7.6),
(32, 8, 'HS003', 6.9, 8.2, 9.5, 7.9),
(33, 9, 'HS003', 7.6, 8.8, 9.8, 8.5),
(34, 10, 'HS003', 8.3, 9.4, 9.9, 8.9),
(35, 11, 'HS003', 9, 9.8, 9.9, 9.4),
(36, 12, 'HS003', 9.7, 9.9, 9.9, 9.8),
(37, 1, 'HS004', 6.1, 7.6, 9.3, 7.8),
(38, 2, 'HS004', 6.8, 8.2, 9.6, 8.2),
(39, 3, 'HS004', 7.5, 8.9, 9.9, 8.6),
(40, 4, 'HS004', 8.2, 9.5, 9.9, 9),
(41, 5, 'HS004', 8.9, 9.8, 9.9, 9.4),
(42, 6, 'HS004', 5.7, 7.2, 9, 7.3),
(43, 7, 'HS004', 6.4, 7.8, 9.3, 7.8),
(44, 8, 'HS004', 7.1, 8.4, 9.6, 8.3),
(45, 9, 'HS004', 7.8, 9, 9.9, 8.7),
(46, 10, 'HS004', 8.5, 9.5, 9.9, 9.1),
(47, 11, 'HS004', 9.2, 9.8, 9.9, 9.5),
(48, 12, 'HS004', 9.9, 9.9, 9.9, 9.9),
(49, 1, 'HS005', 5.9, 7.4, 9.2, 7.6),
(50, 2, 'HS005', 6.6, 8.1, 9.5, 8),
(51, 3, 'HS005', 7.3, 8.8, 9.8, 8.5),
(52, 4, 'HS005', 8, 9.4, 9.9, 8.9),
(53, 5, 'HS005', 8.7, 9.8, 9.9, 9.4),
(54, 6, 'HS005', 5.5, 7, 8.9, 7.2),
(55, 7, 'HS005', 6.2, 7.6, 9.2, 7.6),
(56, 8, 'HS005', 6.9, 8.2, 9.5, 7.9),
(57, 9, 'HS005', 7.6, 8.8, 9.8, 8.5),
(58, 10, 'HS005', 8.3, 9.4, 9.9, 8.9),
(59, 11, 'HS005', 9, 9.8, 9.9, 9.4),
(60, 12, 'HS005', 9.7, 9.9, 9.9, 9.8),
(61, 1, 'HS006', 6.2, 7.8, 9.4, 7.9),
(62, 2, 'HS006', 6.9, 8.4, 9.7, 8.3),
(63, 3, 'HS006', 7.6, 9, 9.9, 8.7),
(64, 4, 'HS006', 8.3, 9.5, 9.9, 9.1),
(65, 5, 'HS006', 9, 9.8, 9.9, 9.5),
(66, 6, 'HS006', 5.7, 7.2, 9.1, 7.3),
(67, 7, 'HS006', 6.4, 7.8, 9.4, 7.8),
(68, 8, 'HS006', 7.1, 8.4, 9.7, 8.3),
(69, 9, 'HS006', 7.8, 9, 9.9, 8.7),
(70, 10, 'HS006', 8.5, 9.5, 9.9, 9.1),
(71, 11, 'HS006', 9.2, 9.8, 9.9, 9.5),
(72, 12, 'HS006', 9.9, 9.9, 9.9, 9.9),
(73, 1, 'HS007', 6.4, 8, 9.6, 8.1),
(74, 2, 'HS007', 7.1, 8.6, 9.8, 8.5),
(75, 3, 'HS007', 7.8, 9.2, 9.9, 8.8),
(76, 4, 'HS007', 8.5, 9.6, 9.9, 9.2),
(77, 5, 'HS007', 9.2, 9.8, 9.9, 9.5),
(78, 6, 'HS007', 5.9, 7.4, 9.2, 7.6),
(79, 7, 'HS007', 6.6, 8.1, 9.5, 8),
(80, 8, 'HS007', 7.3, 8.8, 9.8, 8.5),
(81, 9, 'HS007', 8, 9.4, 9.9, 8.9),
(82, 10, 'HS007', 8.7, 9.8, 9.9, 9.4),
(83, 11, 'HS007', 9.4, 9.9, 9.9, 9.7),
(84, 12, 'HS007', 9.9, 9.9, 9.9, 9.9),
(85, 1, 'HS008', 6.7, 8.3, 9.7, 8.4),
(86, 2, 'HS008', 7.4, 8.9, 9.9, 8.7),
(87, 3, 'HS008', 8.1, 9.4, 9.9, 9),
(88, 4, 'HS008', 8.8, 9.7, 9.9, 9.3),
(89, 5, 'HS008', 9.5, 9.8, 9.9, 9.6),
(90, 6, 'HS008', 6.2, 7.8, 9.4, 7.9),
(91, 7, 'HS008', 6.9, 8.4, 9.7, 8.3),
(92, 8, 'HS008', 7.6, 9, 9.9, 8.7),
(93, 9, 'HS008', 8.3, 9.5, 9.9, 9.1),
(94, 10, 'HS008', 9, 9.8, 9.9, 9.5),
(95, 11, 'HS008', 9.7, 9.9, 9.9, 9.8),
(96, 12, 'HS008', 9.9, 9.9, 9.9, 9.9),
(97, 1, 'HS009', 6.9, 8.5, 9.8, 8.5),
(98, 2, 'HS009', 7.6, 9, 9.9, 8.8),
(99, 3, 'HS009', 8.3, 9.5, 9.9, 9.1),
(100, 4, 'HS009', 9, 9.8, 9.9, 9.5),
(101, 5, 'HS009', 9.7, 9.9, 9.9, 9.8),
(102, 6, 'HS009', 5.9, 7.4, 9.2, 7.6),
(103, 7, 'HS009', 6.6, 8.1, 9.5, 8),
(104, 8, 'HS009', 7.3, 8.8, 9.8, 8.5),
(105, 9, 'HS009', 8, 9.4, 9.9, 8.9),
(106, 10, 'HS009', 8.7, 9.8, 9.9, 9.4),
(107, 11, 'HS009', 9.4, 9.9, 9.9, 9.7),
(108, 12, 'HS009', 9.9, 9.9, 9.9, 9.9),
(109, 1, 'HS010', 6.6, 8.2, 9.6, 8.2),
(110, 2, 'HS010', 7.3, 8.8, 9.9, 8.6),
(111, 3, 'HS010', 8, 9.4, 9.9, 9.1),
(112, 4, 'HS010', 8.7, 9.8, 9.9, 9.4),
(113, 5, 'HS010', 9.4, 9.9, 9.9, 9.7),
(114, 6, 'HS010', 6.2, 7.8, 9.4, 7.9),
(115, 7, 'HS010', 6.9, 8.4, 9.7, 8.3),
(116, 8, 'HS010', 7.6, 9, 9.9, 8.7),
(117, 9, 'HS010', 8.3, 9.5, 9.9, 9.1),
(118, 10, 'HS010', 9, 9.8, 9.9, 9.5),
(119, 11, 'HS010', 9.7, 9.9, 9.9, 9.8),
(120, 12, 'HS010', 9.9, 9.9, 9.9, 9.9),
(121, 1, 'HS011', 6.8, 8.4, 9.7, 8.4),
(122, 2, 'HS011', 7.5, 9, 9.9, 8.8),
(123, 3, 'HS011', 8.2, 9.5, 9.9, 9.1),
(124, 4, 'HS011', 8.9, 9.8, 9.9, 9.5),
(125, 5, 'HS011', 9.6, 9.9, 9.9, 9.8),
(126, 6, 'HS011', 6.2, 7.8, 9.4, 7.9),
(127, 7, 'HS011', 6.9, 8.4, 9.7, 8.3),
(128, 8, 'HS011', 7.6, 9, 9.9, 8.7),
(129, 9, 'HS011', 8.3, 9.5, 9.9, 9.1),
(130, 10, 'HS011', 9, 9.8, 9.9, 9.5),
(131, 11, 'HS011', 9.7, 9.9, 9.9, 9.8),
(132, 12, 'HS011', 9.9, 9.9, 9.9, 9.9),
(133, 1, 'HS012', 7, 8.6, 9.8, 8.5),
(134, 2, 'HS012', 7.7, 9.1, 9.9, 8.9),
(135, 3, 'HS012', 8.4, 9.6, 9.9, 9.2),
(136, 4, 'HS012', 9.1, 9.8, 9.9, 9.5),
(137, 5, 'HS012', 9.8, 9.9, 9.9, 9.8),
(138, 6, 'HS012', 6.2, 7.8, 9.4, 7.9),
(139, 7, 'HS012', 6.9, 8.4, 9.7, 8.3),
(140, 8, 'HS012', 7.6, 9, 9.9, 8.7),
(141, 9, 'HS012', 8.3, 9.5, 9.9, 9.1),
(142, 10, 'HS012', 9, 9.8, 9.9, 9.5),
(143, 11, 'HS012', 9.7, 9.9, 9.9, 9.8),
(144, 12, 'HS012', 9.9, 9.9, 9.9, 9.9),
(145, 1, 'HS013', 6.8, 8.4, 9.7, 8.4),
(146, 2, 'HS013', 7.5, 9, 9.9, 8.8),
(147, 3, 'HS013', 8.2, 9.5, 9.9, 9.1),
(148, 4, 'HS013', 8.9, 9.8, 9.9, 9.5),
(149, 5, 'HS013', 9.6, 9.9, 9.9, 9.8),
(150, 6, 'HS013', 6.2, 7.8, 9.4, 7.9),
(151, 7, 'HS013', 6.9, 8.4, 9.7, 8.3),
(152, 8, 'HS013', 7.6, 9, 9.9, 8.7),
(153, 9, 'HS013', 8.3, 9.5, 9.9, 9.1),
(154, 10, 'HS013', 9, 9.8, 9.9, 9.5),
(155, 11, 'HS013', 9.7, 9.9, 9.9, 9.8),
(156, 12, 'HS013', 9.9, 9.9, 9.9, 9.9),
(157, 1, 'HS014', 6.9, 8.5, 9.8, 8.5),
(158, 2, 'HS014', 7.6, 9, 9.9, 8.8),
(159, 3, 'HS014', 8.3, 9.5, 9.9, 9.1),
(160, 4, 'HS014', 9, 9.8, 9.9, 9.5),
(161, 5, 'HS014', 9.7, 9.9, 9.9, 9.8),
(162, 6, 'HS014', 6.2, 7.8, 9.4, 7.9),
(163, 7, 'HS014', 6.9, 8.4, 9.7, 8.3),
(164, 8, 'HS014', 7.6, 9, 9.9, 8.7),
(165, 9, 'HS014', 8.3, 9.5, 9.9, 9.1),
(166, 10, 'HS014', 9, 9.8, 9.9, 9.5),
(167, 11, 'HS014', 9.7, 9.9, 9.9, 9.8),
(168, 12, 'HS014', 9.9, 9.9, 9.9, 9.9),
(169, 1, 'HS015', 6.9, 8.5, 9.8, 8.5),
(170, 2, 'HS015', 7.6, 9, 9.9, 8.8),
(171, 3, 'HS015', 8.3, 9.5, 9.9, 9.1),
(172, 4, 'HS015', 9, 9.8, 9.9, 9.5),
(173, 5, 'HS015', 9.7, 9.9, 9.9, 9.8),
(174, 6, 'HS015', 6.2, 7.8, 9.4, 7.9),
(175, 7, 'HS015', 6.9, 8.4, 9.7, 8.3),
(176, 8, 'HS015', 7.6, 9, 9.9, 8.7),
(177, 9, 'HS015', 8.3, 9.5, 9.9, 9.1),
(178, 10, 'HS015', 9, 9.8, 9.9, 9.5),
(179, 11, 'HS015', 9.7, 9.9, 9.9, 9.8),
(180, 12, 'HS015', 9.9, 9.9, 9.9, 9.9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mahs` varchar(5) NOT NULL,
  `makhoi` varchar(11) NOT NULL,
  `malop` varchar(11) NOT NULL,
  `hotenhs` varchar(127) NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `gioitinh` char(5) NOT NULL,
  `diachi` varchar(127) NOT NULL,
  `hanhkiem` varchar(5) NOT NULL,
  `hocluc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `mahs`, `makhoi`, `malop`, `hotenhs`, `ngaysinh`, `gioitinh`, `diachi`, `hanhkiem`, `hocluc`) VALUES
(1, 'nguyenvanan', 'password123', 'HS001', 'k10', '10A1', 'Nguyễn Văn An', '2005-01-01', 'Nam', 'Hà Nội', '', ''),
(2, 'tranthithuy', 'password123', 'HS002', 'k10', '10A1', 'Trần Thị Thủy', '2005-02-02', 'Nữ', 'Hồ Chí Minh', '', ''),
(3, 'leminhhoang', 'password123', 'HS003', 'k10', '10A1', 'Lê Minh Hoàng', '2005-03-03', 'Nam', 'Đà Nẵng', '', ''),
(4, 'phamthithanh', 'password123', 'HS004', 'k10', '10A1', 'Phạm Thị Thanh', '2005-04-04', 'Nữ', 'Cần Thơ', '', ''),
(5, 'vuthithuyduyen', 'password123', 'HS005', 'k10', '10A1', 'Vũ Thị Thùy Duyên', '2005-05-05', 'Nữ', 'Bắc Ninh', '', ''),
(6, 'dinhtuananh', 'password123', 'HS006', 'k10', '10A1', 'Đinh Tuấn Anh', '2005-06-06', 'Nam', 'Hải Phòng', '', ''),
(7, 'nguyenthithuylinh', 'password123', 'HS007', 'k10', '10A1', 'Nguyễn Thị Thùy Linh', '2005-07-07', 'Nữ', 'Thái Bình', '', ''),
(8, 'leminhduc', 'password123', 'HS008', 'k10', '10A1', 'Lê Minh Đức', '2005-08-08', 'Nam', 'Nam Định', '', ''),
(9, 'phamthithanhtam', 'password123', 'HS009', 'k10', '10A1', 'Phạm Thị Thanh Tâm', '2005-09-09', 'Nữ', 'Hà Nam', '', ''),
(10, 'vuthithilan', 'password123', 'HS010', 'k10', '10A1', 'Vũ Thị Thúy Lan', '2005-10-10', 'Nữ', 'Hà Tĩnh', '', ''),
(11, 'nguyenvanbinh', 'password123', 'HS011', 'k10', '10A1', 'Nguyễn Văn Bình', '2005-01-11', 'Nam', 'Cần Thơ', '', ''),
(12, 'phamthithu', 'password123', 'HS012', 'k10', '10A1', 'Phạm Thị Thu', '2005-02-12', 'Nữ', 'Hải Phòng', '', ''),
(13, 'leminhtien', 'password123', 'HS013', 'k10', '10A1', 'Lê Minh Tiến', '2005-03-13', 'Nam', 'Hà Nội', '', ''),
(14, 'nguyenthithutrang', 'password123', 'HS014', 'k10', '10A1', 'Nguyễn Thị Thu Trang', '2005-04-14', 'Nữ', 'Đà Nẵng', '', ''),
(15, 'vuthienthanh', 'password123', 'HS015', 'k10', '10A1', 'Vũ Tiến Thành', '2005-05-15', 'Nam', 'Bắc Ninh', '', ''),
(16, 'dinhtuananh2', 'password123', 'HS016', 'k10', '10A1', 'Đinh Tuấn Anh ', '2005-06-16', 'Nam', 'Hải Phòng', '', ''),
(17, 'nguyenthithuylinh2', 'password123', 'HS017', 'k10', '10A1', 'Nguyễn Thị Thùy Linh ', '2005-07-17', 'Nữ', 'Thái Bình', '', ''),
(18, 'leminhduc2', 'password123', 'HS018', 'k10', '10A1', 'Lê Minh Đức ', '2005-08-18', 'Nam', 'Nam Định', '', ''),
(19, 'phamthithanhtam2', 'password123', 'HS019', 'k10', '10A1', 'Phạm Thị Thanh Tâm ', '2005-09-19', 'Nữ', 'Hà Nam', '', ''),
(20, 'vuthithilan2', 'password123', 'HS020', 'k10', '10A1', 'Vũ Thị Thúy Lan ', '2005-10-20', 'Nữ', 'Hà Tĩnh', '', ''),
(21, 'nguyenvanlong', 'password123', 'HS021', 'k10', '10A1', 'Nguyễn Văn Long', '2005-01-21', 'Nam', 'Bắc Ninh', '', ''),
(22, 'tranvanthanh', 'password123', 'HS022', 'k10', '10A1', 'Trần Văn Thanh', '2005-02-22', 'Nam', 'Hải Phòng', '', ''),
(23, 'leminhduong', 'password123', 'HS023', 'k10', '10A1', 'Lê Minh Dương', '2005-03-23', 'Nam', 'Hà Nội', '', ''),
(24, 'nguyenthithuhang', 'password123', 'HS024', 'k10', '10A1', 'Nguyễn Thị Thu Hằng', '2005-04-24', 'Nữ', 'Đà Nẵng', '', ''),
(25, 'vuthienthanh2', 'password123', 'HS025', 'k10', '10A1', 'Vũ Tiến Thành ', '2005-05-25', 'Nam', 'Bắc Ninh', '', ''),
(26, 'dinhtuananh3', 'password123', 'HS026', 'k10', '10A1', 'Đinh Tuấn Anh ', '2005-06-26', 'Nam', 'Hải Phòng', '', ''),
(27, 'nguyenthithuylinh3', 'password123', 'HS027', 'k10', '10A1', 'Nguyễn Thị Thùy Linh ', '2005-07-27', 'Nữ', 'Thái Bình', '', ''),
(28, 'leminhduc3', 'password123', 'HS028', 'k10', '10A1', 'Lê Minh Đức ', '2005-08-28', 'Nam', 'Nam Định', '', ''),
(29, 'phamthithanhtam3', 'password123', 'HS029', 'k10', '10A1', 'Phạm Thị Thanh Tâm ', '2005-09-29', 'Nữ', 'Hà Nam', '', ''),
(30, 'vuthithilan3', 'password123', 'HS030', 'k10', '10A1', 'Vũ Thị Thúy Lan ', '2005-10-30', 'Nữ', 'Hà Tĩnh', '', ''),
(31, 'nguyenvantuan', 'password123', 'HS031', 'k10', '10A2', 'Nguyễn Văn Tuấn', '2005-01-31', 'Nam', 'Cần Thơ', '', ''),
(32, 'phamthihuong', 'password123', 'HS032', 'k10', '10A2', 'Phạm Thị Hương', '2005-02-32', 'Nữ', 'Hải Phòng', '', ''),
(33, 'leminhkhanh', 'password123', 'HS033', 'k10', '10A2', 'Lê Minh Khánh', '2005-03-33', 'Nam', 'Hà Nội', '', ''),
(34, 'nguyenthithuhoa', 'password123', 'HS034', 'k10', '10A2', 'Nguyễn Thị Thu Hòa', '2005-04-34', 'Nữ', 'Đà Nẵng', '', ''),
(35, 'vuthienthanh3', 'password123', 'HS035', 'k10', '10A2', 'Vũ Tiến Thành ', '2005-05-35', 'Nam', 'Bắc Ninh', '', ''),
(36, 'dinhtuananh4', 'password123', 'HS036', 'k10', '10A2', 'Đinh Tuấn Anh ', '2005-06-36', 'Nam', 'Hải Phòng', '', ''),
(37, 'nguyenthithuylinh4', 'password123', 'HS037', 'k10', '10A2', 'Nguyễn Thị Thùy Linh ', '2005-07-37', 'Nữ', 'Thái Bình', '', ''),
(38, 'leminhduc4', 'password123', 'HS038', 'k10', '10A2', 'Lê Minh Đức ', '2005-08-38', 'Nam', 'Nam Định', '', ''),
(39, 'phamthithanhtam4', 'password123', 'HS039', 'k10', '10A2', 'Phạm Thị Thanh Tâm ', '2005-09-39', 'Nữ', 'Hà Nam', '', ''),
(40, 'vuthithilan4', 'password123', 'HS040', 'k10', '10A2', 'Vũ Thị Thúy Lan ', '2005-10-40', 'Nữ', 'Hà Tĩnh', '', ''),
(41, 'nguyenvanhieu', 'password123', 'HS041', 'k10', '10A3', 'Nguyễn Văn Hiếu', '2005-11-01', 'Nam', 'Bắc Ninh', '', ''),
(42, 'tranvanthanh2', 'password123', 'HS042', 'k10', '10A3', 'Trần Văn Thanh ', '2005-12-02', 'Nam', 'Hải Phòng', '', ''),
(43, 'leminhduong2', 'password123', 'HS043', 'k10', '10A3', 'Lê Minh Dương ', '2005-01-03', 'Nam', 'Hà Nội', '', ''),
(44, 'nguyenthithuhang2', 'password123', 'HS044', 'k10', '10A3', 'Nguyễn Thị Thu Hằng ', '2005-02-04', 'Nữ', 'Đà Nẵng', '', ''),
(45, 'vuthienthanh4', 'password123', 'HS045', 'k10', '10A3', 'Vũ Tiến Thành ', '2005-03-05', 'Nam', 'Bắc Ninh', '', ''),
(46, 'dinhtuananh5', 'password123', 'HS046', 'k10', '10A3', 'Đinh Tuấn Anh ', '2005-04-06', 'Nam', 'Hải Phòng', '', ''),
(47, 'nguyenvanlinh', 'password123', 'HS047', 'k10', '10A3', 'Nguyễn Văn Linh', '2005-05-07', 'Nam', 'Thái Bình', '', ''),
(48, 'leminhduc5', 'password123', 'HS048', 'k10', '10A3', 'Lê Minh Đức ', '2005-06-08', 'Nam', 'Nam Định', '', ''),
(49, 'phamthithanhtam5', 'password123', 'HS049', 'k10', '10A3', 'Phạm Thị Thanh Tâm ', '2005-07-09', 'Nữ', 'Hà Nam', '', ''),
(50, 'vuthithilan5', 'password123', 'HS050', 'k10', '10A3', 'Vũ Thị Thúy Lan ', '2005-08-10', 'Nữ', 'Hà Tĩnh', '', ''),
(51, 'nguyenvanhieu2', 'password123', 'HS051', 'k11', '11A1', 'Nguyễn Văn Hiếu ', '2004-09-11', 'Nam', 'Bắc Ninh', '', ''),
(52, 'tranvanthanh3', 'password123', 'HS052', 'k11', '11A1', 'Trần Văn Thanh ', '2004-10-12', 'Nam', 'Hải Phòng', '', ''),
(53, 'leminhduong3', 'password123', 'HS053', 'k11', '11A1', 'Lê Minh Dương ', '2004-11-13', 'Nam', 'Hà Nội', '', ''),
(54, 'nguyenthithuhang3', 'password123', 'HS054', 'k11', '11A1', 'Nguyễn Thị Thu Hằng ', '2004-12-14', 'Nữ', 'Đà Nẵng', '', ''),
(55, 'vuthienthanh5', 'password123', 'HS055', 'k11', '11A1', 'Vũ Tiến Thành ', '2004-01-15', 'Nam', 'Bắc Ninh', '', ''),
(56, 'dinhtuananh6', 'password123', 'HS056', 'k11', '11A1', 'Đinh Tuấn Anh ', '2004-02-16', 'Nam', 'Hải Phòng', '', ''),
(57, 'nguyenthithuylinh5', 'password123', 'HS057', 'k11', '11A1', 'Nguyễn Thị Thùy Linh ', '2004-03-17', 'Nữ', 'Thái Bình', '', ''),
(58, 'leminhduc6', 'password123', 'HS058', 'k11', '11A1', 'Lê Minh Đức ', '2004-04-18', 'Nam', 'Nam Định', '', ''),
(59, 'phamthithanhtam6', 'password123', 'HS059', 'k11', '11A1', 'Phạm Thị Thanh Tâm ', '2004-05-19', 'Nữ', 'Hà Nam', '', ''),
(60, 'vuthithilan6', 'password123', 'HS060', 'k11', '11A1', 'Vũ Thị Thúy Lan ', '2004-06-20', 'Nữ', 'Hà Tĩnh', '', ''),
(61, 'nguyenvankhanh', 'password123', 'HS061', 'k11', '11A2', 'Nguyễn Văn Khánh', '2004-07-21', 'Nam', 'Bắc Ninh', '', ''),
(62, 'leminhtuan', 'password123', 'HS062', 'k11', '11A2', 'Lê Minh Tuấn', '2004-08-22', 'Nam', 'Hải Phòng', '', ''),
(63, 'nguyenthithuhoa2', 'password123', 'HS063', 'k11', '11A2', 'Nguyễn Thị Thu Hòa ', '2004-09-23', 'Nữ', 'Đà Nẵng', '', ''),
(64, 'vuthienthanh6', 'password123', 'HS064', 'k11', '11A2', 'Vũ Tiến Thành ', '2004-10-24', 'Nam', 'Bắc Ninh', '', ''),
(65, 'dinhtuananh7', 'password123', 'HS065', 'k11', '11A2', 'Đinh Tuấn Anh ', '2004-11-25', 'Nam', 'Hải Phòng', '', ''),
(66, 'nguyenthithuylinh6', 'password123', 'HS066', 'k11', '11A2', 'Nguyễn Thị Thùy Linh ', '2004-12-26', 'Nữ', 'Thái Bình', '', ''),
(67, 'leminhduc7', 'password123', 'HS067', 'k11', '11A2', 'Lê Minh Đức ', '2004-01-27', 'Nam', 'Nam Định', '', ''),
(68, 'phamthithanhtam7', 'password123', 'HS068', 'k11', '11A2', 'Phạm Thị Thanh Tâm ', '2004-02-28', 'Nữ', 'Hà Nam', '', ''),
(69, 'vuthithilan7', 'password123', 'HS069', 'k11', '11A2', 'Vũ Thị Thúy Lan ', '2004-03-01', 'Nữ', 'Hà Tĩnh', '', ''),
(70, 'nguyenvanhieu3', 'password123', 'HS070', 'k11', '11A2', 'Nguyễn Văn Hiếu ', '2004-04-02', 'Nam', 'Bắc Ninh', '', ''),
(71, 'tranvanthanh4', 'password123', 'HS071', 'k11', '11A3', 'Trần Văn Thanh ', '2004-05-03', 'Nam', 'Hải Phòng', '', ''),
(72, 'leminhduong4', 'password123', 'HS072', 'k11', '11A3', 'Lê Minh Dương ', '2004-06-04', 'Nam', 'Hà Nội', '', ''),
(73, 'nguyenthithuhang4', 'password123', 'HS073', 'k11', '11A3', 'Nguyễn Thị Thu Hằng ', '2004-07-05', 'Nữ', 'Đà Nẵng', '', ''),
(74, 'vuthienthanh7', 'password123', 'HS074', 'k11', '11A3', 'Vũ Tiến Thành ', '2004-08-06', 'Nam', 'Bắc Ninh', '', ''),
(75, 'nguyenvanlinh2', 'password123', 'HS075', 'k11', '11A3', 'Nguyễn Văn Linh ', '2004-09-07', 'Nam', 'Thái Bình', '', ''),
(76, 'leminhduc8', 'password123', 'HS076', 'k11', '11A3', 'Lê Minh Đức ', '2004-10-08', 'Nam', 'Nam Định', '', ''),
(77, 'phamthithanhtam8', 'password123', 'HS077', 'k11', '11A3', 'Phạm Thị Thanh Tâm ', '2004-11-09', 'Nữ', 'Hà Nam', '', ''),
(78, 'vuthithilan8', 'password123', 'HS078', 'k11', '11A3', 'Vũ Thị Thúy Lan ', '2004-12-10', 'Nữ', 'Hà Tĩnh', '', ''),
(79, 'nguyenvanhieu4', 'password123', 'HS079', 'k11', '11A3', 'Nguyễn Văn Hiếu ', '2004-01-11', 'Nam', 'Bắc Ninh', '', ''),
(80, 'tranvanthanh5', 'password123', 'HS080', 'k11', '11A3', 'Trần Văn Thanh ', '2004-02-12', 'Nam', 'Hải Phòng', '', ''),
(81, 'leminhduong5', 'password123', 'HS081', 'k12', '12A1', 'Lê Minh Dương ', '2003-03-13', 'Nam', 'Hà Nội', '', ''),
(82, 'nguyenthithuhang5', 'password123', 'HS082', 'k12', '12A1', 'Nguyễn Thị Thu Hằng ', '2003-04-14', 'Nữ', 'Đà Nẵng', '', ''),
(83, 'vuthienthanh8', 'password123', 'HS083', 'k12', '12A1', 'Vũ Tiến Thành ', '2003-05-15', 'Nam', 'Bắc Ninh', '', ''),
(84, 'dinhtuananh8', 'password123', 'HS084', 'k12', '12A1', 'Đinh Tuấn Anh ', '2003-06-16', 'Nam', 'Hải Phòng', '', ''),
(85, 'nguyenthithuylinh7', 'password123', 'HS085', 'k12', '12A1', 'Nguyễn Thị Thùy Linh ', '2003-07-17', 'Nữ', 'Thái Bình', '', ''),
(86, 'leminhduc9', 'password123', 'HS086', 'k12', '12A1', 'Lê Minh Đức ', '2003-08-18', 'Nam', 'Nam Định', '', ''),
(87, 'phamthithanhtam9', 'password123', 'HS087', 'k12', '12A1', 'Phạm Thị Thanh Tâm ', '2003-09-19', 'Nữ', 'Hà Nam', '', ''),
(88, 'vuthithilan9', 'password123', 'HS088', 'k12', '12A1', 'Vũ Thị Thúy Lan ', '2003-10-20', 'Nữ', 'Hà Tĩnh', '', ''),
(89, 'nguyenvanlinh3', 'password123', 'HS089', 'k12', '12A1', 'Nguyễn Văn Linh ', '2003-09-11', 'Nam', 'Thái Bình', '', ''),
(90, 'leminhduc10', 'password123', 'HS090', 'k12', '12A1', 'Lê Minh Đức ', '2003-10-12', 'Nam', 'Nam Định', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`) VALUES
(1, 'Toan', 'TO'),
(2, 'Vat ly', 'VL'),
(3, 'Hoa hoc', 'HH'),
(4, 'Ngu van', 'NV'),
(5, 'Lich su', 'LS'),
(6, 'Dia ly', 'DL'),
(7, 'Tieng Anh', 'TA'),
(8, 'GDCD', 'GD'),
(9, 'Cong nghe', 'CN'),
(10, 'Tin hoc', 'TH'),
(11, 'The duc', 'TD'),
(12, 'Sinh hoc', 'SH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `magv` varchar(5) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hoten` varchar(127) NOT NULL,
  `mamonhoc` varchar(31) NOT NULL,
  `makhoi` int(31) NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `gioitinh` char(5) NOT NULL,
  `diachi` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `magv`, `username`, `password`, `hoten`, `mamonhoc`, `makhoi`, `ngaysinh`, `gioitinh`, `diachi`) VALUES
(1, 'GV001', 'gv1', '123456', 'Nguyễn Văn An', 'TO', 1, '1980-01-01', 'Nam', 'Số 10 đường Nguyễn Trãi, Hà Nội'),
(2, 'GV002', 'gv2', '654321', 'Lê Thị Hoa', 'NV', 1, '1985-02-02', 'Nữ', 'Số 20 đường Lê Duẩn, Thành phố Hồ Chí Minh'),
(3, 'GV003', 'gv3', '789012', 'Trần Quốc Cường', 'TA', 1, '1990-03-03', 'Nam', 'Số 30 đường Trần Hưng Đạo, Hải Phòng'),
(4, 'GV004', 'gv4', '111111', 'Đỗ Thị Dung', 'SH', 1, '1995-04-04', 'Nữ', 'Số 40 đường Hồ Chí Minh, Đà Nẵng'),
(5, 'GV005', 'gv5', '222222', 'Phan Văn Mười', 'TD', 1, '1990-05-05', 'Nam', 'Số 50 đường Lý Tự Trọng, Cần Thơ'),
(6, 'GV006', 'gv6', '333333', 'Nguyễn Thị Sen', 'GD', 1, '1985-06-06', 'Nữ', 'Số 60 đường Nguyễn Huệ, Huế'),
(7, 'GV007', 'gv7', '444444', 'Hoàng Văn Giang', 'CN', 1, '1995-07-07', 'Nam', 'Số 70 đường Hùng Vương, Thanh Hóa'),
(8, 'GV008', 'gv8', '555555', 'Bùi Thị Hồng', 'TH', 1, '1990-08-08', 'Nữ', 'Số 80 đường Phạm Văn Đồng, Nghệ An'),
(9, 'GV009', 'gv9', '666666', 'Đặng Văn Tới', 'LS', 1, '1985-09-09', 'Nam', 'Số 90 đường Nguyễn Đình Chiểu, Quảng Bình'),
(10, 'GV010', 'gv10', '777777', 'Lê Thị Hiệp', 'HH', 1, '1995-10-10', 'Nữ', 'Số 100 đường Nguyễn Bỉnh Khiêm, Quảng Trị'),
(11, 'GV011', 'gv11', '888888', 'Trần Quốc Khải', 'VL', 1, '1990-11-11', 'Nam', 'Số 110 đường Quang Trung, Bình Định'),
(12, 'GV012', 'gv12', '123456', 'Nguyễn Văn B', 'TO', 2, '1980-01-01', 'Nam', 'Số 10 đường Nguyễn Trãi, Hà Nội'),
(13, 'GV013', 'gv13', '654321', 'Lê Thị C', 'NV', 2, '1985-02-02', 'Nữ', 'Số 20 đường Lê Duẩn, Thành phố Hồ Chí Minh'),
(14, 'GV014', 'gv14', '789012', 'Trần Quốc D', 'TA', 2, '1990-03-03', 'Nam', 'Số 30 đường Trần Hưng Đạo, Hải Phòng'),
(15, 'GV015', 'gv15', '111111', 'Đỗ Thị E', 'SH', 2, '1995-04-04', 'Nữ', 'Số 40 đường Hồ Chí Minh, Đà Nẵng'),
(16, 'GV016', 'gv16', '222222', 'Phan Văn F', 'TD', 2, '1990-05-05', 'Nam', 'Số 50 đường Lý Tự Trọng, Cần Thơ'),
(17, 'GV017', 'gv17', '333333', 'Nguyễn Thị G', 'GD', 2, '1985-06-06', 'Nữ', 'Số 60 đường Nguyễn Huệ, Huế'),
(18, 'GV018', 'gv18', '444444', 'Hoàng Văn H', 'CN', 2, '1995-07-07', 'Nam', 'Số 70 đường Hùng Vương, Thanh Hóa'),
(19, 'GV019', 'gv19', '555555', 'Bùi Thị I', 'TH', 2, '1990-08-08', 'Nữ', 'Số 80 đường Phạm Văn Đồng, Nghệ An'),
(20, 'GV020', 'gv20', '666666', 'Đặng Văn J', 'LS', 2, '1985-09-09', 'Nam', 'Số 90 đường Nguyễn Đình Chiểu, Quảng Bình'),
(21, 'GV021', 'gv21', '777777', 'Lê Thị K', 'HH', 2, '1995-10-10', 'Nữ', 'Số 100 đường Nguyễn Bỉnh Khiêm, Quảng Trị'),
(22, 'GV022', 'gv22', '888888', 'Trần Quốc L', 'VL', 2, '1990-11-11', 'Nam', 'Số 110 đường Quang Trung, Bình Định'),
(23, 'GV023', 'gv23', '123456', 'Nguyễn Văn M', 'TO', 3, '1980-01-01', 'Nam', 'Số 10 đường Nguyễn Trãi, Hà Nội'),
(24, 'GV024', 'gv24', '654321', 'Lê Thị N', 'NV', 3, '1985-02-02', 'Nữ', 'Số 20 đường Lê Duẩn, Thành phố Hồ Chí Minh'),
(25, 'GV025', 'gv25', '789012', 'Trần Quốc P', 'TA', 3, '1990-03-03', 'Nam', 'Số 30 đường Trần Hưng Đạo, Hải Phòng'),
(26, 'GV026', 'gv26', '111111', 'Đỗ Thị Q', 'SH', 3, '1995-04-04', 'Nữ', 'Số 40 đường Hồ Chí Minh, Đà Nẵng'),
(27, 'GV027', 'gv27', '222222', 'Phan Văn R', 'TD', 3, '1990-05-05', 'Nam', 'Số 50 đường Lý Tự Trọng, Cần Thơ'),
(28, 'GV028', 'gv28', '333333', 'Nguyễn Thị S', 'GD', 3, '1985-06-06', 'Nữ', 'Số 60 đường Nguyễn Huệ, Huế'),
(29, 'GV029', 'gv29', '444444', 'Hoàng Văn T', 'CN', 3, '1995-07-07', 'Nam', 'Số 70 đường Hùng Vương, Thanh Hóa'),
(30, 'GV030', 'gv30', '555555', 'Bùi Thị U', 'TH', 3, '1990-08-08', 'Nữ', 'Số 80 đường Phạm Văn Đồng, Nghệ An'),
(31, 'GV031', 'gv31', '666666', 'Đặng Văn V', 'LS', 3, '1985-09-09', 'Nam', 'Số 90 đường Nguyễn Đình Chiểu, Quảng Bình'),
(32, 'GV032', 'gv32', '777777', 'Lê Thị W', 'HH', 3, '1995-10-10', 'Nữ', 'Số 100 đường Nguyễn Bỉnh Khiêm, Quảng Trị'),
(33, 'GV033', 'gv33', '888888', 'Trần Quốc X', 'VL', 3, '1990-11-11', 'Nam', 'Số 110 đường Quang Trung, Bình Định');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `allot`
--
ALTER TABLE `allot`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classname`);

--
-- Chỉ mục cho bảng `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Chỉ mục cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ID_Schedule`);

--
-- Chỉ mục cho bảng `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `fk_score_subjects` (`id_subject`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `username_3` (`username`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_teacher_grades` (`makhoi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `allot`
--
ALTER TABLE `allot`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_score_subjects` FOREIGN KEY (`ID_subject`) REFERENCES `subjects` (`subject_id`);

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teacher_grades` FOREIGN KEY (`makhoi`) REFERENCES `grades` (`grade_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
