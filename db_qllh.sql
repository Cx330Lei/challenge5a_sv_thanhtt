-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 08, 2022 lúc 12:28 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_qllh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exercise`
--

CREATE TABLE `exercise` (
  `id_ex` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `exercise`
--

INSERT INTO `exercise` (`id_ex`, `filename`) VALUES
(13, 'FILE_20221019_160232_q1xHz.docx'),
(21, 'csattt (1).docx'),
(22, 'gtatm.docx');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infusers`
--

CREATE TABLE `infusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `image` text NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infusers`
--

INSERT INTO `infusers` (`id`, `username`, `password`, `name`, `email`, `phone`, `image`, `role`) VALUES
(1, 'teacher1', '123456a@A', 'teacher1', 'teacher1@gmail.com', '0111111111', 'KMA.jpg', 1),
(2, 'teacher2', '123456a@A', 'teacher2', 'teacher2@gmail.com', '022222222', 'Kem_2018.jpg', 1),
(3, 'student1', '123456a@A', 'student1', 'student1@gmail.com', '088888888', 'matCuoi.jpg', 0),
(4, 'student2', '123456a@A', 'student2', 'student2@gmail.com', '0999999999', 'kem_241.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yourfile`
--

CREATE TABLE `yourfile` (
  `id_y` int(11) NOT NULL,
  `id_ex` int(11) NOT NULL,
  `filename_y` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id_ex`);

--
-- Chỉ mục cho bảng `infusers`
--
ALTER TABLE `infusers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Chỉ mục cho bảng `yourfile`
--
ALTER TABLE `yourfile`
  ADD PRIMARY KEY (`id_y`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id_ex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `infusers`
--
ALTER TABLE `infusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `yourfile`
--
ALTER TABLE `yourfile`
  MODIFY `id_y` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
