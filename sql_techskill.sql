-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: May 19, 2023 at 02:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30522185_techskill`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `course_name`, `course_about`, `course_require`, `course_poster`, `course_prize`, `section`, `time`) VALUES
(46, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', '500', 'HTML all Lecture & Notes.', '2022-03-07 22:20:57'),
(48, 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', '900', 'JavaScript Lecture & Notes', '2022-03-07 22:34:24'),
(49, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', '1500', 'Python Lecture & Notes', '2022-03-07 22:36:34'),
(50, 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', '1500', 'Python Lecture & Notes', '2022-03-07 22:37:40'),
(51, 1646672923, 'Java Tutorial', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672923.jpg', '1500', 'Python Lecture & Notes', '2022-03-07 22:38:43'),
(53, 1646673064, 'HTML 5', 'React is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'React is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646673064.jpg', '500', 'Python Lecture & Notes', '2022-03-07 22:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(5) NOT NULL,
  `course_id` int(100) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `lecture_sn_no` int(10) NOT NULL,
  `lecture_title` varchar(300) NOT NULL,
  `lecture_img` varchar(400) NOT NULL,
  `video_url` varchar(300) NOT NULL,
  `notes` varchar(200) NOT NULL DEFAULT 'no-files',
  `lectute_duri` varchar(10) NOT NULL,
  `paid_free` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `course_id`, `course_name`, `lecture_sn_no`, `lecture_title`, `lecture_img`, `video_url`, `notes`, `lectute_duri`, `paid_free`) VALUES
(2443, 1646672860, 'PHP Tutorial', 0, 'PHP Introduction', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-0.zip', '2:00', 'selected'),
(2444, 1646672860, 'PHP Tutorial', 1, 'PHP Getting Started', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '10:20', 'selected'),
(2445, 1646672860, 'PHP Tutorial', 2, 'PHP Syntax', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:27', 'fa-lock'),
(2446, 1646672860, 'PHP Tutorial', 3, 'PHP Comments', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-3.zip', '19:12', 'fa-lock'),
(2447, 1646672860, 'PHP Tutorial', 4, 'PHP Variables', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-4.zip', '34:16', 'fa-lock'),
(2448, 1646672860, 'PHP Tutorial', 5, 'PHP AND, OR and NOT Operators', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-5.zip', '18:29', 'fa-lock'),
(2449, 1646672860, 'PHP Tutorial', 6, 'PHP ORDER BY Keyword', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-6.zip', '14:20', 'fa-lock'),
(2450, 1646672860, 'PHP Tutorial', 7, 'PHP MIN() and MAX() Functions', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-7.zip', '57:13', 'fa-lock'),
(2451, 1646672860, 'PHP Tutorial', 8, 'PHP COUNT(), AVG() and SUM() Functions', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672860/1646672860-8.zip', '16:45', 'fa-lock'),
(2452, 1646672860, 'PHP Tutorial', 9, 'PHP LIKE Operator', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:00', 'fa-lock'),
(2453, 1646672860, 'PHP Tutorial', 10, 'PHP Wildcards', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '13:37', 'fa-lock'),
(2454, 1646672860, 'PHP Tutorial', 11, 'PHP IN Operator', 'course_assets/lecture-img/1646672860.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '30:00', 'fa-lock'),
(2479, 1646672664, 'SQL Tutorial', 0, 'Introduction to SQL', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-0.zip', '2:00', 'selected'),
(2480, 1646672664, 'SQL Tutorial', 1, 'SQL Syntax', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '10:20', 'selected'),
(2481, 1646672664, 'SQL Tutorial', 2, 'SQL SELECT Statement', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:27', 'fa-lock'),
(2482, 1646672664, 'SQL Tutorial', 3, 'SQL SELECT DISTINCT Statement', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-3.zip', '19:12', 'fa-lock'),
(2483, 1646672664, 'SQL Tutorial', 4, 'SQL WHERE Clause', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-4.zip', '34:16', 'fa-lock'),
(2484, 1646672664, 'SQL Tutorial', 5, 'SQL AND, OR and NOT Operators', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-5.zip', '18:29', 'fa-lock'),
(2485, 1646672664, 'SQL Tutorial', 6, 'SQL ORDER BY Keyword', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-6.zip', '14:20', 'fa-lock'),
(2486, 1646672664, 'SQL Tutorial', 7, 'SQL MIN() and MAX() Functions', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-7.zip', '57:13', 'fa-lock'),
(2487, 1646672664, 'SQL Tutorial', 8, 'SQL COUNT(), AVG() and SUM() Functions', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672664/1646672664-8.zip', '16:45', 'fa-lock'),
(2488, 1646672664, 'SQL Tutorial', 9, 'SQL LIKE Operator', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:00', 'fa-lock'),
(2489, 1646672664, 'SQL Tutorial', 10, 'SQL Wildcards', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '13:37', 'fa-lock'),
(2490, 1646672664, 'SQL Tutorial', 11, 'SQL IN Operator', 'course_assets/lecture-img/1646672664.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '30:00', 'fa-lock'),
(2567, 1646672794, 'Python Tutorial', 0, 'Python Introduction', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646672794/1646672794-0.zip', '2:00', 'selected'),
(2568, 1646672794, 'Python Tutorial', 1, 'Python Getting Started', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '10:20', 'selected'),
(2569, 1646672794, 'Python Tutorial', 2, 'Python Syntax', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646672794/1646672794-2.zip', '12:27', 'fa-lock'),
(2570, 1646672794, 'Python Tutorial', 3, 'Python Comments', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '19:12', 'fa-lock'),
(2571, 1646672794, 'Python Tutorial', 4, 'Python Variables', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672794/1646672794-4.zip', '34:16', 'fa-lock'),
(2572, 1646672794, 'Python Tutorial', 5, 'Python AND, OR and NOT Operators', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672794/1646672794-5.zip', '18:29', 'fa-lock'),
(2573, 1646672794, 'Python Tutorial', 6, 'Python ORDER BY Keyword', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672794/1646672794-6.zip', '14:20', 'fa-lock'),
(2574, 1646672794, 'Python Tutorial', 7, 'Python MIN() and MAX() Functions', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672794/1646672794-7.zip', '57:13', 'fa-lock'),
(2575, 1646672794, 'Python Tutorial', 8, 'Python COUNT(), AVG() and SUM() Functions', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672794/1646672794-8.zip', '16:45', 'fa-lock'),
(2576, 1646672794, 'Python Tutorial', 9, 'Python LIKE Operator', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:00', 'fa-lock'),
(2577, 1646672794, 'Python Tutorial', 10, 'Python Wildcards', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '13:37', 'fa-lock'),
(2578, 1646672794, 'Python Tutorial', 11, 'Python IN Operator', 'course_assets/lecture-img/1646672794.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646672794/1646672794-11.zip', '30:00', 'selected'),
(2579, 1646671857, 'HTML 5', 0, 'HTML Introduction', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646671857/1646671857-0.zip', '3:30', 'selected'),
(2580, 1646671857, 'HTML 5', 1, 'HTML Editors', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646671857/1646671857-1.zip', '12:19', 'selected'),
(2581, 1646671857, 'HTML 5', 2, 'HTML Basic Examples', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '2:34', 'fa-lock'),
(2582, 1646671857, 'HTML 5', 3, 'HTML Elements', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-3.zip', '10:03', 'fa-lock'),
(2583, 1646671857, 'HTML 5', 4, 'HTML Attributes', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '11:34', 'fa-lock'),
(2584, 1646671857, 'HTML 5', 5, 'HTML Headings', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '28:19', 'fa-lock'),
(2585, 1646671857, 'HTML 5', 6, 'HTML Paragraphs', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-6.zip', '10:34', 'fa-lock'),
(2586, 1646671857, 'HTML 5', 7, 'HTML Styles', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-7.zip', '12:00', 'fa-lock'),
(2587, 1646671857, 'HTML 5', 8, 'HTML Text Formatting', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '26:13', 'fa-lock'),
(2588, 1646671857, 'HTML 5', 9, 'HTML Quotation and Citation Elements', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-9.zip', '19:10', 'fa-lock'),
(2589, 1646671857, 'HTML 5', 10, 'HTML Comments', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-10.zip', '20:10', 'fa-lock'),
(2590, 1646671857, 'HTML 5', 11, 'HTML Colors', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:03', 'fa-lock'),
(2591, 1646671857, 'HTML 5', 12, 'HTML Styles - CSS', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '27:28', 'fa-lock'),
(2592, 1646671857, 'HTML 5', 13, 'HTML Links', 'course_assets/lecture-img/1646671857.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646671857/1646671857-13.zip', '17:12', 'fa-lock'),
(2606, 1646673064, 'HTML 5', 0, 'React Introduction', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '2:00', 'selected'),
(2607, 1646673064, 'HTML 5', 1, 'React Getting Started', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '10:20', 'selected'),
(2608, 1646673064, 'HTML 5', 2, 'React Syntax', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:27', 'fa-lock'),
(2609, 1646673064, 'HTML 5', 3, 'React Comments', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '19:12', 'fa-lock'),
(2610, 1646673064, 'HTML 5', 4, 'React Variables', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '34:16', 'fa-lock'),
(2611, 1646673064, 'HTML 5', 5, 'React AND, OR and NOT Operators', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646673064/1646673064-5.zip', '18:29', 'fa-lock'),
(2612, 1646673064, 'HTML 5', 6, 'React ORDER BY Keyword', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '14:20', 'fa-lock'),
(2613, 1646673064, 'HTML 5', 7, 'React MIN() and MAX() Functions', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '57:13', 'fa-lock'),
(2614, 1646673064, 'HTML 5', 8, 'React COUNT(), AVG() and SUM() Functions', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '16:45', 'fa-lock'),
(2615, 1646673064, 'HTML 5', 9, 'React LIKE Operator', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:00', 'fa-lock'),
(2616, 1646673064, 'HTML 5', 10, 'React Wildcards', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '13:37', 'fa-lock'),
(2617, 1646673064, 'HTML 5', 11, 'React IN Operator', 'course_assets/lecture-img/1646673064.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '30:00', 'fa-lock'),
(2630, 1646672923, 'Java Tutorial', 0, 'Java Introduction', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '2:00', 'selected'),
(2631, 1646672923, 'Java Tutorial', 1, 'Java Getting Started', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '10:20', 'selected'),
(2632, 1646672923, 'Java Tutorial', 2, 'Java Syntax', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:27', 'fa-lock'),
(2633, 1646672923, 'Java Tutorial', 3, 'Java Comments', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672923/1646672923-3.zip', '19:12', 'fa-lock'),
(2634, 1646672923, 'Java Tutorial', 4, 'Java Variables', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672923/1646672923-4.zip', '34:16', 'fa-lock'),
(2635, 1646672923, 'Java Tutorial', 5, 'Java AND, OR and NOT Operators', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes1646672923/1646672923-5.zip', '18:29', 'fa-lock'),
(2636, 1646672923, 'Java Tutorial', 6, 'Java ORDER BY Keyword', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'course_assets/lecture-notes/1646672923/1646672923-6.zip', '14:20', 'fa-lock'),
(2637, 1646672923, 'Java Tutorial', 7, 'Java MIN() and MAX() Functions', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '57:13', 'fa-lock'),
(2638, 1646672923, 'Java Tutorial', 8, 'Java COUNT(), AVG() and SUM() Functions', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '16:45', 'fa-lock'),
(2639, 1646672923, 'Java Tutorial', 9, 'Java LIKE Operator', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '12:00', 'fa-lock'),
(2640, 1646672923, 'Java Tutorial', 10, 'Java Wildcards', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '13:37', 'fa-lock'),
(2641, 1646672923, 'Java Tutorial', 11, 'Java IN Operator', 'course_assets/lecture-img/1646672923.jpg', 'https://player.vimeo.com/video/669816600?h=486040691d&', 'no-files', '30:00', 'fa-lock');

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
  `user_pic` varchar(100) NOT NULL DEFAULT '../../course_assets/user-image/user.png',
  `verify_status` varchar(10) NOT NULL DEFAULT 'pending',
  `verify_code` int(10) NOT NULL,
  `forget_code` int(10) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `on_page` varchar(50) DEFAULT NULL,
  `user_device` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_user`
--

INSERT INTO `signup_user` (`id`, `first_name`, `last_name`, `email`, `password`, `user_pic`, `verify_status`, `verify_code`, `forget_code`, `last_login`, `on_page`, `user_device`, `time`) VALUES
(16, 'Deepka', 'kur.', 'deepak36884@gmail.com', 'raza', '../../course_assets/user-image/user.png	', 'Active', 455109, 475888, 1647116348, 'Logout', 'fa-desktop', '2022-01-22 10:48:04'),
(21, 'Lucky', 'Raza', 'lucky@gmail.com', 'lucky12345', '../../course_assets/user-image/user.png	', 'Active', 345456, 92389, 1648627831, 'inroll.php', 'fa-mobile-phone', '2022-01-30 17:05:52'),
(27, 'gulsad', 'raza', 'gulsad@gmail.com', '11111', '../../course_assets/user-image/user.png	', 'Active', 115537, 92389, 1647119286, 'index.php', 'fa-desktop', '2022-02-11 18:42:36'),
(29, 'Bijay', 'sharma', 'sharmabijay603@gmail.com', '1646575153', 'https://lh3.googleusercontent.com/a-/AOh14GgEWE1E7yErdYmZtHqwE5QeXcqXY4ldicu-TIz6=s96-c', 'Active', 293020, NULL, 1652625131, 'index.php', 'fa-mobile-phone', '2022-03-12 12:34:11'),
(32, 'Momtaj', 'Husain', 'mumtaz666raza@gmail.com', '1647091940', 'https://lh3.googleusercontent.com/a-/AOh14Gj-RUj1HDrQYAQlMuU5-IdCc_mX5IDW_SavJAyxew=s96-c', 'Active', 293020, 294070, 1676986854, 'index.php', 'fa-desktop', '2022-03-12 13:29:32'),
(33, 'Momtaj', 'Life', 'momtajlife@gmail.com', '1647092380', 'https://lh3.googleusercontent.com/a-/AOh14GjAM5JveUVhrgpQimVvKA3jLp8hf_Sj4lErwxBX=s96-c', 'Active', 293020, NULL, 1657403934, 'inroll.php', 'fa-mobile-phone', '2022-03-12 13:36:52'),
(34, 'DmR', 'Mixing', 'djmomtajraza@gmail.com', '1647092608', 'https://lh3.googleusercontent.com/a-/AOh14Gis-9oWiIhfUNFGm7mWjKzwrQ-3tC77_TYs3d1_=s96-c', 'Active', 293020, NULL, 1647105935, 'pay_method.php', 'fa-mobile-phone', '2022-03-12 13:40:40'),
(35, 'Akshay Kumar', 'Das', 'dasakshayone@gmail.com', '1647136621', 'https://lh3.googleusercontent.com/a-/AOh14GhYlSeICEd28aZvkPwCh_rHWkkeB0kk4UY3Exnr=s96-c', 'Active', 293020, NULL, 1647136839, 'pay_method.php', 'fa-mobile-phone', '2022-03-13 01:54:10'),
(36, 'Rakesh', 'kumar', 'rakeshkumar23692368@gmail.com', '1647157913', 'https://lh3.googleusercontent.com/a/AATXAJymV6UmCVgGSyj5r54ZQNAl9CYiCW_OhDHo5YhFVA=s96-c', 'Active', 293020, NULL, 1647158016, 'pay_method.php', 'fa-mobile-phone', '2022-03-13 07:49:03'),
(37, 'Krishna', 'Kumar', 'sahkrishna782@gmail.com', '1647158351', 'https://lh3.googleusercontent.com/a-/AOh14GgPMGvZ66nOULWwssweRzmOnyJXxJl3sE5FOPO3oQ=s96-c', 'Active', 293020, NULL, 1647858543, 'index.php', 'fa-mobile-phone', '2022-03-13 07:56:21'),
(38, 'Devindra', 'Kumar', 'devindrak953@gmail.com', '1647158890', 'https://lh3.googleusercontent.com/a-/AOh14GjyxoMITS9hIsT0KFPeBTatx9gw3xT_lmOmFzWv=s96-c', 'Active', 293020, NULL, 1647159138, 'index.php', 'fa-mobile-phone', '2022-03-13 08:05:19'),
(39, 'Bijay', 'sharma', 'bijaysharmaone@gmail.com', '1647337035', 'https://lh3.googleusercontent.com/a-/AOh14GiSKMStuUHDE3ZhSnCpUmZxiXY695IyzjRUh9WqLw=s96-c', 'Active', 293020, NULL, 1647342536, 'profile.php', 'fa-mobile-phone', '2022-03-15 09:34:18'),
(40, 'FACT &', 'TECH', 'sabestianali@gmail.com', '1648278811', 'https://lh3.googleusercontent.com/a-/AOh14GiWSusrUNEtG7eCsRO7DlwgjtpXN9F9grLuavP_=s96-c', 'Active', 293020, NULL, 1671794779, 'pay_method.php', 'fa-mobile-phone', '2022-03-26 07:10:03'),
(41, 'ss', 'ss', 's@gmail.com', 'sssss', '../../course_assets/user-image/user.png', 'pending', 236164, NULL, NULL, NULL, NULL, '2022-04-23 04:54:00'),
(42, 'Ansar', 'Alan', 'pifib53097@abincol.com', 'â‚¹Rahul321', '../../course_assets/user-image/user.png', 'pending', 162349, NULL, NULL, NULL, NULL, '2022-05-05 05:00:33'),
(43, 'Guru', 'Ji', 'mefej53655@azteen.com', 'â‚¹Rahul321', '../../course_assets/user-image/user.png', 'pending', 236924, NULL, NULL, NULL, NULL, '2022-05-05 05:03:46'),
(44, '&lt;h1&gt;test&lt;/h1&gt;', '&lt;h1&gt;test&lt;/h1&gt;', '&lt;h1&gt;test&lt;/h1&gt;@gmail.com', 'test@12345', '../../course_assets/user-image/user.png', 'pending', 615551, NULL, NULL, NULL, NULL, '2022-05-24 05:13:19'),
(45, '&lt;h1&gt;test&lt;/h1&gt;', '&lt;h1&gt;test&lt;/h1&gt;', 'wimoh90078@doerma.com', 'test@12345', '../../course_assets/user-image/user.png', 'pending', 431226, NULL, NULL, NULL, NULL, '2022-05-24 05:21:49'),
(46, 'Momtaj', 'Raza', 'mumtaz666raza@gmail', 'momtaj123', '../../course_assets/user-image/user.png', 'pending', 538695, NULL, NULL, NULL, NULL, '2022-05-24 05:22:48'),
(47, 'Husen', 'Raza', 'momtajlif@gmail.com', 'momtaj123', '../../course_assets/user-image/user.png', 'pending', 271583, NULL, NULL, NULL, NULL, '2022-06-05 18:18:01'),
(48, 'Husen', 'Raza', 'codeprou@gmail.com', 'momtaj123', '../../course_assets/user-image/user.png', 'pending', 452598, NULL, 1669266066, 'all_course.php', 'fa-mobile-phone', '2022-06-05 18:21:54'),
(49, 'GLOBAL', 'SRK', 'mdismail000000001@gmail.com', '1657596767', 'https://lh3.googleusercontent.com/a-/AFdZucpCwNvG8QQJdyhmgauSH6fbFZMcECGSCTM6cevBAA=s96-c', 'Active', 293020, NULL, 1657597759, 'pay_method.php', 'fa-desktop', '2022-07-12 03:29:30'),
(50, 'Umesh', 'Sah', 'umeshsah125@gmail.com', '1667917430', 'https://lh3.googleusercontent.com/a/ALm5wu3e-QAMrOX386G6iCTFm84HDXZgR9It3AVbo7Oe8Q=s96-c', 'Active', 293020, NULL, 1672038537, 'Logout', 'fa-desktop', '2022-11-08 14:14:43'),
(51, 'Sadam', 'Aalam', 'kaalam641@gmail.com', '1671905695', 'https://lh3.googleusercontent.com/a/AEdFTp5vCQCiruRSPTxAun1F1Xao_vHG73I9dGbt6cMHrXw=s96-c', 'Active', 293020, NULL, 1671906352, 'all_course.php', 'fa-desktop', '2022-12-24 18:14:42'),
(52, 'must', 'learn', 'mustlearnblog@gmail.com', '1674761914', 'https://lh3.googleusercontent.com/a/AEdFTp6-l2gJ5qZObcRYuR6qJ0Spob_UQfldDQVJFmNJ=s96-c', 'Active', 293020, NULL, 1674767887, 'index.php', 'fa-desktop', '2023-01-26 19:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('facebook','google','twitter','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_enroll`
--

INSERT INTO `user_enroll` (`id`, `course_id`, `course_name`, `course_about`, `course_require`, `poster`, `email`, `pay_rize`, `time`) VALUES
(109, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:05:37'),
(110, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:07:49'),
(111, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:07:53'),
(112, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:09:02'),
(113, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:11:14'),
(114, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:12:03'),
(115, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:14:29'),
(116, 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', 'deepak36884@gmail.com', 1500, '2022-03-12 20:15:53'),
(120, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'gulsad@gmail.com', 500, '2022-03-12 20:51:38'),
(124, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'sharmabijay603@gmail.com', 500, '2022-03-13 00:51:15'),
(141, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'lucky@gmail.com', 500, '2022-03-25 19:36:30'),
(143, 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 'lucky@gmail.com', 900, '2022-03-25 20:13:03'),
(144, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'lucky@gmail.com', 1500, '2022-03-25 20:18:58'),
(145, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'lucky@gmail.com', 1500, '2022-03-25 20:20:36'),
(146, 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', 'lucky@gmail.com', 1500, '2022-03-25 20:24:04'),
(147, 1646672923, 'Java Tutorial', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672923.jpg', 'lucky@gmail.com', 1500, '2022-03-25 21:17:32'),
(149, 1646673064, 'HTML 5', 'React is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'React is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646673064.jpg', 'lucky@gmail.com', 500, '2022-03-26 03:56:33'),
(161, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'sabestianali@gmail.com', 500, '2022-03-26 07:16:51'),
(162, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'codeprou@gmail.com', 500, '2022-03-26 18:09:49'),
(163, 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 'codeprou@gmail.com', 900, '2022-03-26 18:11:34'),
(164, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'mumtaz666raza@gmail.com', 500, '2022-03-26 20:06:54'),
(165, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'momtajlife@gmail.com', 500, '2022-03-31 09:44:47'),
(166, 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\r\nOur PHP tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', 'mumtaz666raza@gmail.com', 1500, '2022-05-21 15:50:51'),
(167, 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 'mumtaz666raza@gmail.com', 900, '2022-11-24 17:50:44'),
(168, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'mumtaz666raza@gmail.com', 1500, '2022-11-24 17:53:15'),
(169, 1646672794, 'Python Tutorial', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Python is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Python tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672794.jpg', 'codeprou@gmail.com', 1500, '2022-11-24 17:58:17'),
(170, 1646672923, 'Java Tutorial', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'Java is a standard language for storing, manipulating and retrieving data in databases.\r\nOur Java tutorial will teach you how to use PHP in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672923.jpg', 'mumtaz666raza@gmail.com', 1500, '2022-12-03 05:40:07'),
(171, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'kaalam641@gmail.com', 500, '2022-12-24 18:17:33'),
(172, 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\r\nWith HTML you can create your own Website.\r\nHTML is easy to learn - You will enjoy it!', 'At W3Schools you will find complete references about HTML elements, attributes, events, color names, entities, character-sets, URL encoding, language codes, HTTP messages, browser support, and more:', 'course_assets/course-img/1646671857.jpg', 'umeshsah125@gmail.com', 500, '2022-12-26 06:48:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`id`, `user`, `name`, `number`, `message`, `date`) VALUES
(11, 'mumtaz666raza@gmail.com', 'Momtaj Husain', '9815759505', 'Nice', '2022-09-03'),
(12, 'mumtaz666raza@gmail.com', 'Momtaj Husain', '9815759505', 'Wow ', '2022-09-03'),
(13, 'umeshsah125@gmail.com', 'Umesh Sah', '', 'HI', '2022-12-26');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`id`, `user_email`, `course_id`, `order_id`, `pay_amount`, `currency`, `bank_name`, `pay_status`, `order_date`) VALUES
(155, 'lucky@gmail.com', 1646672664, '', 900, 'NPR', 'eSewa', 'success', '2022-03-25 20:13:03'),
(156, 'lucky@gmail.com', 1646672794, '', 1500, 'NPR', 'eSewa', 'success', '2022-03-25 20:18:58'),
(157, 'lucky@gmail.com', 1646672794, '', 1500, 'NPR', 'eSewa', 'success', '2022-03-25 20:20:36'),
(158, 'lucky@gmail.com', 1646672860, '', 1500, 'NPR', 'eSewa', 'success', '2022-03-25 20:24:04'),
(159, 'lucky@gmail.com', 1646672923, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-25 21:17:32'),
(160, 'lucky@gmail.com', 1646672976, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 03:19:37'),
(161, 'lucky@gmail.com', 1646673064, '', 1300, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 03:56:33'),
(162, 'lucky@gmail.com', 1646673333, '', 1600, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:45:24'),
(163, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:46:50'),
(164, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:47:00'),
(165, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:47:05'),
(166, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:47:10'),
(167, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:47:15'),
(168, 'lucky@gmail.com', 1646673203, '', 1100, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:47:19'),
(169, 'lucky@gmail.com', 1646673424, '', 1600, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:48:34'),
(170, 'lucky@gmail.com', 1646673424, '', 1600, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:48:54'),
(171, 'lucky@gmail.com', 1646673424, '', 1600, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:49:00'),
(172, 'lucky@gmail.com', 1646673424, '', 1600, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 06:49:06'),
(173, 'sabestianali@gmail.com', 1646671857, '', 1200, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 07:16:51'),
(174, 'codeprou@gmail.com', 1646671857, '', 1200, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 18:09:49'),
(175, 'codeprou@gmail.com', 1646672664, '', 900, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 18:11:34'),
(176, 'mumtaz666raza@gmail.com', 1646671857, '', 1200, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-26 20:06:54'),
(177, 'momtajlife@gmail.com', 1646671857, '', 1200, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-03-31 09:44:47'),
(178, 'mumtaz666raza@gmail.com', 1646672860, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-05-21 15:50:51'),
(179, 'mumtaz666raza@gmail.com', 1646672664, '', 900, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-11-24 17:50:44'),
(180, 'mumtaz666raza@gmail.com', 1646672794, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-11-24 17:53:15'),
(181, 'codeprou@gmail.com', 1646672794, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-11-24 17:58:17'),
(182, 'mumtaz666raza@gmail.com', 1646672923, '', 1500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-12-03 05:40:07'),
(183, 'kaalam641@gmail.com', 1646671857, '', 500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-12-24 18:17:33'),
(184, 'umeshsah125@gmail.com', 1646671857, '', 500, 'NPR', 'eSewa', 'TXN_SUCCESS', '2022-12-26 06:48:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_query`
--

INSERT INTO `user_query` (`id`, `user`, `name`, `query_message`, `course_id`, `date`) VALUES
(126, 'mumtaz666raza@gmail.com', 'Momtaj Husen', 'My Name is Khan.', 1646672508, '2022-03-10'),
(127, 'mumtaz666raza@gmail.com', 'Momtaj Husen', 'Gsgsg sggsgs sggsgs shsgsgs sshgsvs sshgsgs shsgsgs dhdgdgs hhd dhd dhhd dhdvd dhvd dhd zhhshs shhsgs shshvs shshs shhsv', 1646672508, '2022-03-10'),
(128, 'mumtaz666raza@gmail.com', 'Momtaj Husen', '&lt;?php echo &quot;momtaj&quot; ?&gt;', 1646672508, '2022-03-10'),
(129, 'mumtaz666raza@gmail.com', 'Momtaj Husen', '&lt;h1&gt;Momtaj&lt;/h1&gt;', 1646672508, '2022-03-10'),
(132, 'mumtaz666raza@gmail.com', 'Momtaj Husen', 'Supop', 1646673203, '2022-03-12'),
(133, 'mumtaz666raza@gmail.com', 'Momtaj Husen', 'Hellow', 1646575153, '2022-03-12'),
(139, 'djmomtajraza@gmail.com', 'DmR Mixing', 'Nice course', 1646672508, '2022-03-12'),
(141, 'djmomtajraza@gmail.com', 'DmR Mixing', 'Gdvhdsv dhsgsgss hshsgdvd shhsgdvs sbhsvshs shhsgsvs sbshhshs hhhsh hhdhs bhshs s ydvd ddh d shshsgsbhdhd bdhsbs vdhhdgs hdhgdv hshgssv vshvs sbshhs.  Shshvs vshshvs. Hshsgs hshhss bshvss hshhd dvhsvsv sggsgs hshsvsbbsvs hshsbsb bssbsbvsvs hshsvsb hshsb sbhs bshbsbs vshsb hhdvsb hsshhs hshsb shhsg shsh hshsgs hshsgs hshsb ', 1646672664, '2022-03-12'),
(142, 'djmomtajraza@gmail.com', 'DmR Mixing', 'Hsfsgs gsgsv hshs shshs ssggsvs svgsvsvsvsvs hsgsvs hsgsvs hsgsvs hsgsvs hsgsvs hsgsvs shhsgshsbvs hshsgs hsgsvs hsgsvs hsgsvs hsgsvs sggsgs hsgsvs hsgsvs hsgsvs bshs B&#039;s. Hshsbss bshsbs bsbsv bsbsv hshs bsbsbshsvs shshs hshs hsgsvs hshs shhs hshshs hshsb hshs hshs dhhdvd bdhdbdhsbbd hdh dhdhvd hdhvd dhhdvd hdsh hhdhd hdhsv hsgsvs bhsvs. Bdhsvs bhshs sbdhshsvs hdkfjdbr hdhdbd dbhdhdvd dvdhhdbd bhdbd. Vdhdbdvd dhdhsv bdhdbdvbdhdbd vdhdv dbdhsbvs shdhshsv sbshsh hdhgdvd hbdvs vd d dvh gsgs vs', 1646672664, '2022-03-12'),
(147, 'sharmabijay603@gmail.com', 'Bijay sharma', 'Hi', 1646575153, '2022-03-14'),
(148, 'sharmabijay603@gmail.com', 'Bijay sharma', '(function(jQuery) {\r\n    jQuery(&#039;.sortable-image img, .sortable-image&#039;).css({width:&#039;auto&#039;,height:&#039;auto&#039;})\r\n    jQuery(&#039;.sortable-image img&#039;).each( function(e,elem) {\r\n        var fixedImg = jQuery(this).attr(&#039;src&#039;).replace(&#039;s.png&#039;,&#039;.png&#039;);\r\n        jQuery(this).attr( &#039;src&#039;, fixedImg );\r\n    });\r\n})(jQuery);', 1646575153, '2022-03-14'),
(149, 'bijaysharmaone@gmail.com', 'Bijay sharma', 'admin&#039;--\r\nSELECT * FROM members WHERE username = &#039;admin&#039;--&#039; AND password = &#039;password&#039;', 1646672508, '2022-03-15'),
(150, 'bijaysharmaone@gmail.com', 'Bijay sharma', 'SELECT CHAR(75)+CHAR(76)+CHAR(77)', 1646672508, '2022-03-15'),
(151, 'bijaysharmaone@gmail.com', 'Bijay sharma', '&#039; GROUP BY table.columnfromerror1, columnfromerror2 HAVING 1=1 --', 1646672508, '2022-03-15'),
(152, 'bijaysharmaone@gmail.com', 'Bijay sharma', 'SELECT * FROM Table1 WHERE id = -1 UNION ALL SELECT null, null, NULL, NULL, convert(image,1), null, null,NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULl, NULL--', 1646672508, '2022-03-15'),
(153, 'bijaysharmaone@gmail.com', 'Bijay sharma', 'EXEC master.dbo.xp_cmdshell &#039;cmd.exe dir c:&#039;', 1646672508, '2022-03-15'),
(154, 'bijaysharmaone@gmail.com', 'Bijay sharma', 'select id, product from test.test t limit 0,0 union all select 1,&#039;x&#039;/*,10 ; ', 1646672508, '2022-03-15'),
(158, 'sharmabijay603@gmail.com', 'Bijay sharma', 'Good', 1646671857, '2022-03-16'),
(159, 'sahkrishna782@gmail.com', 'Krishna Kumar', 'Hi', 1646671857, '2022-03-16'),
(160, 'sahkrishna782@gmail.com', 'Krishna Kumar', 'good ', 1646671857, '2022-03-16'),
(185, 'lucky@gmail.com', 'Lucky Raza', 'Hello', 1646671857, '2022-03-22'),
(186, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646671857, '2022-03-22'),
(187, 'lucky@gmail.com', 'Lucky Raza', 'Wow', 1646671857, '2022-03-22'),
(188, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646671857, '2022-03-22'),
(189, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646671857, '2022-03-22'),
(190, 'lucky@gmail.com', 'Lucky Raza', 'Gc', 1646671857, '2022-03-22'),
(191, 'lucky@gmail.com', 'Lucky Raza', 'Ychg', 1646671857, '2022-03-22'),
(192, 'lucky@gmail.com', 'Lucky Raza', 'Higc', 1646671857, '2022-03-22'),
(193, 'lucky@gmail.com', 'Lucky Raza', 'Higc', 1646671857, '2022-03-22'),
(194, 'lucky@gmail.com', 'Lucky Raza', 'Higc', 1646671857, '2022-03-22'),
(195, 'lucky@gmail.com', 'Lucky Raza', 'Higc', 1646671857, '2022-03-22'),
(196, 'lucky@gmail.com', 'Lucky Raza', 'Higc', 1646671857, '2022-03-22'),
(197, 'lucky@gmail.com', 'Lucky Raza', 'Higcgg', 1646671857, '2022-03-22'),
(198, 'lucky@gmail.com', 'Lucky Raza', 'Higcgg', 1646671857, '2022-03-22'),
(199, 'lucky@gmail.com', 'Lucky Raza', 'Higcgg', 1646671857, '2022-03-22'),
(200, 'lucky@gmail.com', 'Lucky Raza', 'Higcgg', 1646671857, '2022-03-22'),
(201, 'lucky@gmail.com', 'Lucky Raza', 'Higcgg', 1646671857, '2022-03-22'),
(202, 'lucky@gmail.com', 'Lucky Raza', 'Hfgu', 1646671857, '2022-03-22'),
(203, 'lucky@gmail.com', 'Lucky Raza', 'Hfugf', 1646671857, '2022-03-22'),
(204, 'lucky@gmail.com', 'Lucky Raza', 'Ghugg', 1646671857, '2022-03-22'),
(205, 'lucky@gmail.com', 'Lucky Raza', 'Fug', 1646671857, '2022-03-22'),
(206, 'lucky@gmail.com', 'Lucky Raza', 'Hhgh', 1646671857, '2022-03-22'),
(207, 'lucky@gmail.com', 'Lucky Raza', 'Hggg', 1646671857, '2022-03-22'),
(208, 'lucky@gmail.com', 'Lucky Raza', 'Hgrf', 1646671857, '2022-03-22'),
(209, 'lucky@gmail.com', 'Lucky Raza', 'Hff', 1646671857, '2022-03-22'),
(210, 'lucky@gmail.com', 'Lucky Raza', 'Ghf', 1646671857, '2022-03-22'),
(211, 'lucky@gmail.com', 'Lucky Raza', 'Hggg', 1646671857, '2022-03-22'),
(212, 'lucky@gmail.com', 'Lucky Raza', '112', 1646671857, '2022-03-22'),
(213, 'lucky@gmail.com', 'Lucky Raza', '2222', 1646671857, '2022-03-22'),
(214, 'lucky@gmail.com', 'Lucky Raza', '3333', 1646671857, '2022-03-22'),
(215, 'lucky@gmail.com', 'Lucky Raza', '555', 1646671857, '2022-03-22'),
(216, 'lucky@gmail.com', 'Lucky Raza', 'Supop', 1646671857, '2022-03-22'),
(217, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646672508, '2022-03-22'),
(218, 'lucky@gmail.com', 'Lucky Raza', 'Supop', 1646672508, '2022-03-22'),
(219, 'lucky@gmail.com', 'Lucky Raza', 'Supop', 1646671857, '2022-03-22'),
(220, 'lucky@gmail.com', 'Lucky Raza', 'Momtaj Husen', 1646671857, '2022-03-22'),
(221, 'lucky@gmail.com', 'Lucky Raza', 'ðŸ§ðŸ¥›ðŸºðŸš‡ðŸ¥¡ðŸ¥›', 1646671857, '2022-03-22'),
(223, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646671857, '2022-03-22'),
(224, 'lucky@gmail.com', 'Lucky Raza', 'Nice', 1646672860, '2022-03-22'),
(225, 'lucky@gmail.com', 'Lucky Raza', 'Hh', 1646672860, '2022-03-22'),
(227, 'lucky@gmail.com', 'Lucky Raza', ';&#039;-$@+)/!;&#039;&#039;&quot;*@#_&amp;-$$&amp;()?!!;:&#039;&quot;*Â®Â¥â‚¬Â¢`â€¢Ï€Ã—Ã—Â¶{{=Â°^â‚¬Â¢Â£%Â©â„¢[]]/*---', 1646672860, '2022-03-22'),
(228, 'lucky@gmail.com', 'Lucky Raza', 'Fgv', 1646673203, '2022-03-22'),
(229, 'lucky@gmail.com', 'Lucky Raza', 'Fcc', 1646673203, '2022-03-22'),
(231, 'lucky@gmail.com', 'Lucky Raza', 'Khgf', 1646673203, '2022-03-22'),
(264, 'umeshsah125@gmail.com', 'Umesh Sah', 'Nice', 1646672923, '2022-11-08');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_whistles`
--

INSERT INTO `user_whistles` (`id`, `user_email`, `course_id`, `course_name`, `course_about`, `course_poster`, `course_prize`, `time`) VALUES
(445, 'djmomtajraza@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-08-29 08:47:34'),
(456, 'sharmabijay603@gmail.com', 1646673064, 'HTML 5', '', 'course_assets/course-img/1646673064.jpg', 500, '2022-11-16 05:08:37'),
(458, 'sharmabijay603@gmail.com', 1646672923, 'Java Tutorial', '', 'course_assets/course-img/1646672923.jpg', 1500, '2022-03-14 15:25:15'),
(459, 'sharmabijay603@gmail.com', 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', 1500, '2022-03-14 15:25:21'),
(460, 'bijaysharmaone@gmail.com', 1646671857, 'HTML 5', '', 'course_assets/course-img/1646671857.jpg', 500, '2022-08-29 08:47:34'),
(463, 'bijaysharmaone@gmail.com', 1646672664, 'SQL Tutorial', '', 'course_assets/course-img/1646672664.jpg', 900, '2022-03-15 09:34:48'),
(464, 'bijaysharmaone@gmail.com', 1646672794, 'Python Tutorial', '', 'course_assets/course-img/1646672794.jpg', 1500, '2022-03-15 09:34:48'),
(465, 'bijaysharmaone@gmail.com', 1646672860, 'PHP Tutorial', '', 'course_assets/course-img/1646672860.jpg', 1500, '2022-03-15 09:34:49'),
(466, 'bijaysharmaone@gmail.com', 1646672923, 'Java Tutorial', '', 'course_assets/course-img/1646672923.jpg', 1500, '2022-03-15 09:34:51'),
(468, 'bijaysharmaone@gmail.com', 1646673064, 'HTML 5', '', 'course_assets/course-img/1646673064.jpg', 500, '2022-11-16 05:08:37'),
(474, 'sahkrishna782@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-08-29 08:47:34'),
(476, 'sahkrishna782@gmail.com', 1646672664, 'SQL Tutorial', '', 'course_assets/course-img/1646672664.jpg', 900, '2022-03-21 09:37:55'),
(504, 'lucky@gmail.com', 1646672923, 'Java Tutorial', 'Java is a standard language for storing, manipulating and retrieving data in databases.\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672923.jpg', 1500, '2022-03-28 17:08:44'),
(505, 'lucky@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-08-29 08:47:34'),
(508, 'lucky@gmail.com', 1646672860, 'PHP Tutorial', 'PHP is a standard language for storing, manipulating and retrieving data in databases.\nOur PHP tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672860.jpg', 1500, '2022-03-28 17:09:11'),
(538, 'codeprou@gmail.com', 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 900, '2022-11-24 18:01:43'),
(539, 'codeprou@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-11-24 18:01:44'),
(548, 'kaalam641@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-12-24 18:15:38'),
(549, 'umeshsah125@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2022-12-26 06:48:45'),
(550, 'umeshsah125@gmail.com', 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 900, '2022-12-26 06:58:54'),
(551, 'mustlearnblog@gmail.com', 1646672664, 'SQL Tutorial', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646672664.jpg', 900, '2023-01-26 19:38:52'),
(555, 'mumtaz666raza@gmail.com', 1646672923, 'Java Tutorial', '', 'course_assets/course-img/1646672923.jpg', 1500, '2023-02-08 13:01:15'),
(556, 'mumtaz666raza@gmail.com', 1646672860, 'PHP Tutorial', '', 'course_assets/course-img/1646672860.jpg', 1500, '2023-02-08 13:01:17'),
(557, 'mumtaz666raza@gmail.com', 1646673064, 'HTML 5', 'React is a standard language for storing, manipulating and retrieving data in databases.\nOur Java tutorial will teach you how to use PHP in: PHP, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', 'course_assets/course-img/1646673064.jpg', 500, '2023-02-08 13:01:34'),
(558, 'mumtaz666raza@gmail.com', 1646671857, 'HTML 5', 'HTML is the standard markup language for Web pages.\nWith HTML you can create your own Website.\nHTML is easy to learn - You will enjoy it!', 'course_assets/course-img/1646671857.jpg', 500, '2023-02-08 13:01:38');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2642;

--
-- AUTO_INCREMENT for table `signup_user`
--
ALTER TABLE `signup_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_enroll`
--
ALTER TABLE `user_enroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `user_whistles`
--
ALTER TABLE `user_whistles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
