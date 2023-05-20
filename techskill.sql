-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 08:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techskill`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Momtaj', 'Husen', 'mumtaz666raza@gmail.com', 'momtaj123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(5) NOT NULL,
  `course_id` int(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_about` varchar(400) NOT NULL,
  `course_require` varchar(500) NOT NULL,
  `course_poster` varchar(300) NOT NULL,
  `course_prize` varchar(5) NOT NULL,
  `section` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(5) NOT NULL,
  `course_id` int(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `lecture_title` varchar(300) NOT NULL,
  `lecture_img` varchar(400) NOT NULL,
  `video_url` varchar(300) NOT NULL,
  `lectute_duri` varchar(10) NOT NULL,
  `paid_free` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup_user`
--

CREATE TABLE `signup_user` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_pic` varchar(100) NOT NULL DEFAULT 'image/user.png',
  `verify_status` varchar(10) NOT NULL DEFAULT 'pending',
  `verify_code` int(10) NOT NULL,
  `forget_code` int(10) NOT NULL DEFAULT 92389,
  `last_login` bigint(20) NOT NULL,
  `on_page` varchar(50) NOT NULL,
  `user_device` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_enroll`
--

CREATE TABLE `user_enroll` (
  `id` int(10) NOT NULL,
  `course_id` int(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_about` varchar(400) NOT NULL,
  `course_require` varchar(500) NOT NULL,
  `poster` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pay_rize` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `course_id` int(20) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `pay_amount` int(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `pay_status` varchar(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

CREATE TABLE `user_query` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL DEFAULT 'no_register',
  `name` varchar(100) NOT NULL DEFAULT 'no_register',
  `query_message` varchar(500) NOT NULL,
  `course_id` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_whistles`
--

CREATE TABLE `user_whistles` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_about` varchar(400) NOT NULL,
  `course_poster` varchar(100) NOT NULL,
  `course_prize` int(7) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_user`
--
ALTER TABLE `signup_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_enroll`
--
ALTER TABLE `user_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_query`
--
ALTER TABLE `user_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_whistles`
--
ALTER TABLE `user_whistles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1545;

--
-- AUTO_INCREMENT for table `signup_user`
--
ALTER TABLE `signup_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_enroll`
--
ALTER TABLE `user_enroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `user_whistles`
--
ALTER TABLE `user_whistles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
