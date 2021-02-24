-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 05:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(5) NOT NULL,
  `class` varchar(5) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `roll` int(6) NOT NULL,
  `attend` varchar(15) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `class`, `semester`, `roll`, `attend`, `time`) VALUES
(1, '4th', '2nd', 160601, 'Present', '2021-02-23'),
(2, '4th', '2nd', 160621, 'Absent', '2021-02-23'),
(3, '4th', '2nd', 160625, 'Leave', '2021-02-23'),
(4, '4th', '2nd', 160601, 'Present', '2021-02-24'),
(5, '4th', '2nd', 160621, 'Present', '2021-02-24'),
(6, '4th', '2nd', 160625, 'Leave', '2021-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `class` varchar(5) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`class`, `semester`, `course_name`, `course_id`) VALUES
('1st', '1st', 'Bangladesh Studies', 'HUM-1101'),
('1st', '1st', 'Fundamentals of ICT', 'ICE-1101'),
('1st', '1st', 'Basic Electronics', 'ICE-1103'),
('1st', '1st', 'Applied Electricity and Magnetigm', 'ICE-1105'),
('1st', '2nd', 'Analog Electronics', 'ICE-1201'),
('1st', '2nd', 'Programming With C', 'ICE-1203'),
('1st', '2nd', 'Circuit Theory and Analysis', 'ICE-1205'),
('2nd', '1st', 'Digital Electronics', 'ICE-2101'),
('2nd', '1st', 'Object Oriented Programming', 'ICE-2103'),
('2nd', '2nd', 'Data Structure and Algorithm', 'ICE-2201'),
('2nd', '2nd', 'Analog Communication', 'ICE-2203'),
('3rd', '1st', 'Artificial Intelligence and Robotics', 'ICE-3101'),
('3rd', '1st', 'Web Programming', 'ICE-3103'),
('3rd', '2nd', 'Network Programming with Java', 'ICE-3201'),
('3rd', '2nd', 'Telecommunication Engineering', 'ICE-3203'),
('4th', '1st', 'Data Communication and Networking', 'ICE-4101'),
('4th', '1st', 'Cellular and Mobile Communication', 'ICE-4103'),
('4th', '2nd', 'System Analysis and Software Testing', 'ICE-4203'),
('4th', '2nd', 'Thesis', 'ICE-4210'),
('1st', '1st', 'Differential Calculus and Geometry', 'Math-1101');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(5) NOT NULL,
  `class` varchar(5) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `notice_name` varchar(100) NOT NULL,
  `file` varchar(512) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `class`, `semester`, `notice_name`, `file`, `time`) VALUES
(2, '4th', '2nd', 'ExamPostponed', 'ExamPostponed.pdf', '2021-02-23 14:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `reslt`
--

CREATE TABLE `reslt` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` varchar(6) NOT NULL,
  `class` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `crs1` int(3) NOT NULL,
  `g1` float NOT NULL,
  `cr1` float NOT NULL,
  `crs2` int(3) NOT NULL,
  `g2` float NOT NULL,
  `cr2` float NOT NULL,
  `crs3` int(3) NOT NULL,
  `g3` float NOT NULL,
  `cr3` float NOT NULL,
  `crs4` int(3) NOT NULL,
  `g4` float NOT NULL,
  `cr4` float NOT NULL,
  `crs5` int(3) NOT NULL,
  `g5` float NOT NULL,
  `cr5` float NOT NULL,
  `cigi` float NOT NULL,
  `tcr` float NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reslt`
--

INSERT INTO `reslt` (`id`, `name`, `roll`, `class`, `semester`, `crs1`, `g1`, `cr1`, `crs2`, `g2`, `cr2`, `crs3`, `g3`, `cr3`, `crs4`, `g4`, `cr4`, `crs5`, `g5`, `cr5`, `cigi`, `tcr`, `cgpa`) VALUES
(4, 'Ahiduzzaman Moral', '160621', '4th', '2nd', 85, 4, 3, 88, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `semester`, `city`, `pcontact`, `photo`, `time`) VALUES
(1, 'Md. Shahiz Azam', 160601, '4th', '2nd', 'Chapainawabganj', '01721591371', '160601.jpg', '2021-02-24 12:27:35'),
(2, 'Mahfuzur Rahman Akash', 190621, '1st', '1st', 'Mymensingh', '01711111111', '190621.jpg', '2021-02-24 12:28:24'),
(3, 'Tanzimul Islam', 180621, '2nd', '2nd', 'Jamalpur', '01711111111', '180621.jpg', '2021-02-24 12:29:14'),
(4, 'Ahiduzzaman Moral', 160621, '4th', '2nd', 'Khulna', '01516146099', '160621.jpg', '2021-02-24 12:30:14'),
(5, 'Khurshed Hasan', 160625, '4th', '2nd', 'Lalmonirhat', '01704247162', '160625.jpg', '2021-02-24 16:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`) VALUES
(1, 'MD. YOUSUF HOSSAIN', 'saikatyousuf@gmail.com', 'Yousuf160604', '1b61cf898a32398e84f4e7ecece82bed', 'Yousuf160604.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reslt`
--
ALTER TABLE `reslt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
