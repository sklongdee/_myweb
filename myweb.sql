-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 06:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(10) NOT NULL,
  `activity_title` varchar(1000) NOT NULL,
  `activity_img` varchar(400) NOT NULL,
  `activity_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_title`, `activity_img`, `activity_date`) VALUES
(1, 'มทร.ตะวันออก ร่วมพิธีมอบรางวัลบุคลากรดีเด่น และหน่วยงานดีเด่น ของกรมประชาสัมพันธ์ เนื่องในงานวันสถาปนากรมประชาสัมพันธ์ ปีที่ 92', '83851picture.jpg', '2025-05-03'),
(2, 'ภาพบรรยากาศการสอบรายวิชา In Flight Service นักศึกษาสถาบันเทคโนโลยีการบินและอวกาศ', '82767picture.jpg', '2025-05-03'),
(3, 'กิจกรรมบริจาคโลหิต ประจำปี 2568 เพื่อถวายเป็นพระราชกุศลเนื่องในโอกาสสมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดาฯ', '83360picture.jpg', '2025-05-03'),
(4, 'กิจกรรมบริจาคโลหิต ประจำปี 2568 เนื่องในโอกาสวันสถาปนามหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก ในวันที่ 18 มกราคาม ของทุกปี', '82477picture.jpg', '2025-05-03'),
(5, 'กิจกรรมจิตอาสาโครงการ แบรนด์ พลังเลือด ต่อพลังชีวิต', 'img_6815c8d282aeb.jpg', '2025-05-03'),
(11, 'มทร ตะวันออก ให้การต้อนรับ มหาวิทยาลัยราชภัฏพิบูลสงคราม เข้าศึกษาดูงาน แลกเปลี่ยนเรียนรู้การดำเนินงานกองกลาง มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก', 'img_681ecf2538bf0.jpg', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(400) NOT NULL,
  `department` varchar(400) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `department`, `role`) VALUES
(1, 'suttipong', '$2y$10$zLWWn6Y4gqiwYOpXJIFRh.VqPM4rwBDWUR6Uy/FJ22KrfSbQa.JI.', 'สุทธิพงษ์ คล่องดี', 'IT', 'admin'),
(2, 'acc01', '$2y$10$YfkzxdaBdw6.kZJwCZpVd.Ww2NBMnPJ8WZ2Sfu5weveFQZ0K4ldWW', 'acc test', 'บัญชี', 'admin'),
(3, 'acc02', '$2y$10$WKfj.nK5KuszRjlTdtxv9.W.rs14P62tSLBybHGbIeFz33K1g5VfK', 'acc test', 'บัญชี', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
