-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 03, 2023 lúc 08:54 AM
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
-- Cấu trúc bảng cho bảng `avgscore`
--

CREATE TABLE `avgscore` (
  `ID_student` int(11) NOT NULL,
  `Toan` float NOT NULL,
  `VatLy` float NOT NULL,
  `Hoa` float NOT NULL,
  `NguVan` float NOT NULL,
  `LichSu` float NOT NULL,
  `DiaLi` float NOT NULL,
  `TiengAnh` float NOT NULL,
  `GDCD` float NOT NULL,
  `CongNghe` double NOT NULL,
  `TinHoc` float NOT NULL,
  `TheDuc` float NOT NULL,
  `SinhHoc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `avgscore`
--

INSERT INTO `avgscore` (`ID_student`, `Toan`, `VatLy`, `Hoa`, `NguVan`, `LichSu`, `DiaLi`, `TiengAnh`, `GDCD`, `CongNghe`, `TinHoc`, `TheDuc`, `SinhHoc`) VALUES
(1, 6.3, 7.4, 6.5, 8.3, 9.1, 6.9, 7.6, 8.1, 4, 7.6, 4.3, 6.9),
(2, 6.7, 8.2, 7.9, 9.3, 5.7, 7.5, 8, 9.2, 4.6, 8.3, 5.1, 8.4),
(3, 7.1, 8.9, 8.9, 8.6, 6.9, 8.2, 9.1, 7.8, 5.8, 9.1, 6.2, 9.2),
(4, 8.1, 9.6, 9.9, 7.9, 8.2, 9, 8.6, 8.9, 6.9, 9.9, 7.3, 9.7),
(5, 9.2, 10.3, 10.8, 7, 9.5, 9.9, 9.1, 9.9, 7.9, 10.8, 8.4, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `ID_Class` int(11) NOT NULL,
  `ClassName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`ID_Class`, `ClassName`) VALUES
(1, '10A1'),
(2, '10A2'),
(3, '10A3'),
(4, '10A4'),
(5, '10A5'),
(6, '10A6'),
(7, '10A7'),
(8, '10A8'),
(9, '10A9'),
(10, '10A10'),
(11, '11A1'),
(12, '11A2'),
(13, '11A3'),
(14, '11A4'),
(15, '11A5'),
(16, '11A6'),
(17, '11A7'),
(18, '11A8'),
(19, '11A9'),
(20, '11A10'),
(21, '12A1'),
(22, '12A2'),
(23, '12A3'),
(24, '12A4'),
(25, '12A5'),
(26, '12A6'),
(27, '12A7'),
(28, '12A8'),
(29, '12A9'),
(30, '12A10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classsubject`
--

CREATE TABLE `classsubject` (
  `ID` int(11) NOT NULL,
  `ID_Student` int(11) NOT NULL,
  `ID_Class` int(11) NOT NULL,
  `ID_Teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `classsubject`
--

INSERT INTO `classsubject` (`ID`, `ID_Student`, `ID_Class`, `ID_Teacher`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID_Cus` varchar(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `ID_Student` int(11) NOT NULL,
  `ID_Class` int(11) NOT NULL,
  `Field` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID_Cus`, `Username`, `Password`, `Address`, `ID_Student`, `ID_Class`, `Field`) VALUES
('1', 'Alice', 'password1', '123 Main Street', 1, 2, 'Computer Science'),
('2', 'Bob', 'password2', '456 Elm Street', 3, 4, 'Mathematics'),
('3', 'Carol', 'password3', '789 Oak Street', 5, 6, 'Physics');

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
(1, 'K10', 'k10'),
(2, 'K11', 'k11'),
(3, 'K12', 'K12');

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
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `HanhKiem` char(5) NOT NULL,
  `HocLuc` char(5) NOT NULL,
  `NgaySinh` varchar(20) NOT NULL,
  `GioiTinh` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `fname`, `lname`, `HanhKiem`, `HocLuc`, `NgaySinh`, `GioiTinh`) VALUES
(1, 'Student1', 'password1', 'Alice', 'Smith', 'Tốt', 'Giỏi', '1999-01-01', 'Nữ'),
(2, 'Student2', 'password2', 'Bob', 'Jones', 'Tốt', 'Khá', '1999-02-02', 'Nam'),
(3, 'Student3', 'password3', 'Carol', 'Williams', 'Khá', 'Tốt', '1999-03-03', 'Nữ'),
(4, 'Student4', 'password4', 'David', 'Brown', 'Tốt', 'Giỏi', '1999-04-04', 'Nam'),
(5, 'Student5', 'password5', 'Emily', 'Taylor', 'Khá', 'Khá', '1999-05-05', 'Nữ'),
(6, 'Student6', 'password6', 'Frank', 'Jones', 'Tốt', 'Giỏi', '1999-06-06', 'Nam'),
(7, 'Student7', 'password7', 'Grace', 'Williams', 'Khá', 'Tốt', '1999-07-07', 'Nữ'),
(8, 'Student8', 'password8', 'Henry', 'Brown', 'Tốt', 'Giỏi', '1999-08-08', 'Nam'),
(9, 'Student9', 'password9', 'Isabella', 'Taylor', 'Khá', 'Khá', '1999-09-09', 'Nữ'),
(10, 'Student10', 'password10', 'Jacob', 'Jones', 'Tốt', 'Giỏi', '1999-10-10', 'Nam');

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
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `subjects` varchar(31) NOT NULL,
  `grade` int(31) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `Gender` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`, `fname`, `lname`, `subjects`, `grade`, `birthDate`, `Gender`) VALUES
(1, 'teacher1', 'password1', 'John', 'Doe', 'TO', 2, '1980-01-01', 'M'),
(2, 'teacher2', 'password2', 'Jane', 'Doe', 'VL', 1, '1981-02-02', 'F'),
(3, 'teacher3', 'password3', 'Peter', 'Parker', 'HH', 3, '1982-03-03', 'M'),
(4, 'teacher4', 'password4', 'Mary', 'Jane', 'NV', 1, '1983-04-04', 'F'),
(5, 'teacher5', 'password5', 'Bruce', 'Wayne', 'LS', 2, '1984-05-05', 'M'),
(6, 'teacher6', 'password6', 'Clark', 'Kent', 'DL', 3, '1985-06-06', 'M'),
(7, 'teacher7', 'password7', 'Diana', 'Prince', 'TA', 2, '1986-07-07', 'F'),
(8, 'teacher8', 'password8', 'Barry', 'Allen', 'GD', 1, '1987-08-08', 'M'),
(9, 'teacher9', 'password9', 'Oliver', 'Queen', 'CN', 3, '1988-09-09', 'M'),
(10, 'teacher10', 'password10', 'Felicity', 'Smoak', 'TH', 2, '1989-10-10', 'F'),
(11, 'teacher11', 'password11', 'Cisco', 'Ramon', 'TO', 1, '1990-11-11', 'M'),
(12, 'teacher12', 'password12', 'Caitlin', 'Snow', 'VL', 3, '1991-12-12', 'F'),
(13, 'teacher13', 'password13', 'Ray', 'Palmer', 'HH', 1, '1992-01-01', 'M'),
(14, 'teacher14', 'password14', 'Sara', 'Lance', 'NV', 2, '1993-02-02', 'F'),
(15, 'teacher15', 'password15', 'Mick', 'Rory', 'LS', 2, '1994-03-03', 'M'),
(16, 'teacher16', 'password16', 'Leonard', 'Snart', 'DL', 1, '1995-04-04', 'M'),
(17, 'teacher17', 'password17', 'Lisa', 'Snart', 'TA', 3, '1996-05-05', 'F'),
(18, 'teacher18', 'password18', 'Malcolm', 'Merlyn', 'GD', 1, '1997-06-06', 'M'),
(19, 'teacher19', 'password19', 'Damien', 'Dahrk', 'CN', 3, '1998-07-07', 'M');

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
-- Chỉ mục cho bảng `avgscore`
--
ALTER TABLE `avgscore`
  ADD KEY `fk_score_student` (`ID_student`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID_Class`);

--
-- Chỉ mục cho bảng `classsubject`
--
ALTER TABLE `classsubject`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_classSub` (`ID_Class`),
  ADD KEY `fk_class_Student` (`ID_Student`),
  ADD KEY `ID_Teacher` (`ID_Teacher`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Cus`),
  ADD KEY `fk_student_customer` (`ID_Student`),
  ADD KEY `fk_class_customer` (`ID_Class`);

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
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
  ADD KEY `fk_teacher_grades` (`grade`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `avgscore`
--
ALTER TABLE `avgscore`
  ADD CONSTRAINT `fk_score_student` FOREIGN KEY (`ID_student`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `classsubject`
--
ALTER TABLE `classsubject`
  ADD CONSTRAINT `classsubject_ibfk_1` FOREIGN KEY (`ID_Teacher`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `fk_classSub` FOREIGN KEY (`ID_Class`) REFERENCES `class` (`ID_Class`),
  ADD CONSTRAINT `fk_class_Student` FOREIGN KEY (`ID_Student`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_class_customer` FOREIGN KEY (`ID_Class`) REFERENCES `class` (`ID_Class`),
  ADD CONSTRAINT `fk_student_customer` FOREIGN KEY (`ID_Student`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teacher_grades` FOREIGN KEY (`grade`) REFERENCES `grades` (`grade_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
