-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 07:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms_dagatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `datee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(1, 2, '1', 'A'),
(2, 2, '2', 'B'),
(3, 2, '3', 'C'),
(4, 2, '4', 'D'),
(5, 7, '4', 'A'),
(6, 7, '3', 'B'),
(7, 7, '6', 'C'),
(8, 7, '2', 'D'),
(9, 8, '10', 'A'),
(10, 8, '9', 'B'),
(11, 8, '4', 'C'),
(12, 8, '1', 'D'),
(13, 9, '', 'A'),
(14, 9, '', 'B'),
(15, 9, '', 'C'),
(16, 9, '', 'D'),
(17, 11, 'a', 'A'),
(18, 11, 's', 'B'),
(19, 11, 'f', 'C'),
(20, 11, 'd', 'D'),
(21, 15, 'Hypertext Markup Lang', 'A'),
(22, 15, '', 'B'),
(23, 15, '', 'C'),
(24, 15, '', 'D'),
(25, 16, 'Hypertext Markup Language', 'A'),
(26, 16, 'sa', 'B'),
(27, 16, 'sdsf', 'C'),
(28, 16, 'gdg', 'D'),
(29, 18, 'qwe', 'A'),
(30, 18, 'w', 'B'),
(31, 18, 'ew', 'C'),
(32, 18, 'q', 'D'),
(33, 20, 'yes', 'A'),
(34, 20, 'no', 'B'),
(35, 20, ' both', 'C'),
(36, 20, 'lol', 'D'),
(37, 21, 'qw', 'A'),
(38, 21, 'eqw', 'B'),
(39, 21, 'eq', 'C'),
(40, 21, 'we', 'D'),
(41, 22, 'oo', 'A'),
(42, 22, 'no', 'B'),
(43, 22, 'smo', 'C'),
(44, 22, 'd', 'D'),
(45, 24, 'sd', 'A'),
(46, 24, 'sdw', 'B'),
(47, 24, 'wf', 'C'),
(48, 24, 'w', 'D'),
(49, 25, 'Andres Bonifacio', 'A'),
(50, 25, 'Apolinario Mabini', 'B'),
(51, 25, 'Jose Rizal', 'C'),
(52, 25, 'Lapu Lapu', 'D'),
(53, 26, 'Itas', 'A'),
(54, 26, 'Negritos', 'B'),
(55, 26, 'Malays', 'C'),
(56, 26, 'Tagalog', 'D'),
(57, 27, 'Itas', 'A'),
(58, 27, 'Negritos', 'B'),
(59, 27, 'Malays', 'C'),
(60, 27, 'Spanish', 'D'),
(61, 28, 'Miguel Lopez de Legazpi', 'A'),
(62, 28, 'Magellan', 'B'),
(63, 28, 'Lapu-Lapu', 'C'),
(64, 28, 'Aldous', 'D'),
(65, 29, 'Trade agreements', 'A'),
(66, 29, 'Military force and religious conversation', 'B'),
(67, 29, 'Diplomatic', 'C'),
(68, 29, 'Inheritance', 'D'),
(69, 30, 'Lapu-Lapu', 'A'),
(70, 30, 'Jose Rizal', 'B'),
(71, 30, 'Apolinario Mabini', 'C'),
(72, 30, 'Andres Bonifacio', 'D'),
(73, 31, 'Aldous', 'A'),
(74, 31, 'Lapu-Lapu', 'B'),
(75, 31, 'Manny Pacquiao', 'C'),
(76, 31, 'Jose Rizal', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `delete_status` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `course_id`, `subject_id`, `teacher_id`, `student_id`, `delete_status`) VALUES
(1, '1', '1', '1', 0, 0),
(2, '1', '2', '1', 0, 0),
(3, '1', '1', '1', 0, 0),
(4, '1', '1', '4', 0, 0),
(5, '6', '3', '7', 0, 0),
(6, '5', '5', '10', 0, 0),
(7, '11', '4', '13', 0, 0),
(8, '11', '5', '7', 0, 0),
(9, '10', '4', '7', 0, 0),
(10, '7', '5', '8', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_class_quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `class_id`, `quiz_time`, `quiz_id`, `student_class_quiz_id`) VALUES
(12, 1, 0, 3, 0),
(13, 2, 0, 3, 0),
(14, 3, 0, 3, 0),
(15, 5, 0, 5, 0),
(16, 6, 0, 6, 0),
(17, 5, 0, 5, 0),
(18, 8, 0, 5, 0),
(19, 9, 0, 9, 0),
(20, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `cys` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `adviser` varchar(100) NOT NULL,
  `sy` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `cys`, `department`, `adviser`, `sy`) VALUES
(8, 'ABM-11A', 'ABM', 'Mayer Janet I. - ABM', '2022-2023'),
(6, 'GAS 11-A', 'GAS', 'Vargas Karen S. - GAS', '2022-2023'),
(7, 'HUMSS11-A', 'HUMSS', 'Hogan William F. - HUMSS', '2022-2023'),
(5, 'STEM11-A', 'STEM', 'Hill Melissa U. - STEM', '2022-2023'),
(9, 'SMAW-11A', 'SMAW', 'Horn Kaitlin K. - SMAW', '2022-2023'),
(10, 'EIM11-A', 'EIM', 'Anthony Richard A. - EIM', '2022-2023'),
(11, 'ICT11-A', 'ICT', 'Robbins Stephanie J. - ICT', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `incharge` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `s_desc` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `incharge`, `title`, `department`, `s_desc`) VALUES
(2, 'Mr. Reyes', 'GAS Coordinator', 'GAS', 'General Academic Strand'),
(3, 'Mr. Santos', 'SMAW Coordinator', 'SMAW', 'Shielded Metal Arc Welding'),
(4, 'Ms. Felirina', 'ABM Coordinator', 'ABM', 'Accountancy, Business, and Management'),
(5, 'Mr. Oblena', 'ICT Coordinator', 'ICT', 'Information Communications, and Technology'),
(6, 'Ms. Serina', 'STEM Coordinator', 'STEM', 'Science, Technology, Engineerinmg, and Mathematics'),
(7, 'Mr. Bait', 'HUMSS Coordinator', 'HUMSS', 'Humanities and Social Sciences '),
(8, 'Mr. Lopez', 'EIM Coordinator', 'EIM', 'Electronic Installation and Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `module_class`
--

CREATE TABLE `module_class` (
  `id` int(50) NOT NULL,
  `class_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `date_uploaded` date NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_class`
--

INSERT INTO `module_class` (`id`, `class_id`, `student_id`, `file_name`, `description`, `module`, `date_uploaded`, `status`) VALUES
(1, 2, 0, '1', '', '1-Password 123.txt', '2022-12-31', ''),
(2, 2, 0, '2', '', '2-ASIO4ALL v2 Instruction Manual.pdf', '2023-01-08', ''),
(3, 5, 0, 'Module 1', '', '3-blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', '2023-01-21', ''),
(4, 5, 0, 'Module 2 ', '', '4-light-violet-color-solid-background-1920x1080.png', '2023-01-21', ''),
(5, 5, 0, 'Module 3 ', '', '5-blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', '2023-01-21', ''),
(6, 6, 0, 'Module 1', '', '6-blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', '2023-01-21', ''),
(7, 6, 0, 'Module 2 ', '', '7-light-violet-color-solid-background-1920x1080.png', '2023-01-21', ''),
(8, 6, 0, 'Module 3 ', '', '8-light-violet-color-solid-background-1920x1080.png', '2023-01-21', ''),
(9, 7, 0, 'Module 1', '', '9-light-violet-color-solid-background-1920x1080.png', '2023-01-21', ''),
(10, 7, 0, 'Module 2 ', '', '10-blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', '2023-01-21', ''),
(11, 7, 0, 'Module 3 ', '', '11-light-violet-color-solid-background-1920x1080.png', '2023-01-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_class_quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`, `student_class_quiz_id`) VALUES
(3, 'Quiz 1', 'Quiz', '2023-01-20 17:28:38', 1, 0),
(4, '1', '2', '2023-01-21 00:58:26', 4, 0),
(5, 'Quiz 1', 'Math Quiz', '2023-01-21 13:05:58', 7, 0),
(6, 'Quiz 1 - History', 'History', '2023-01-21 13:16:57', 10, 0),
(7, 'Quiz 1 - Programming ', 'Programming', '2023-01-21 13:19:50', 13, 0),
(8, 'quiz', 'Programming', '2023-01-21 14:13:25', 7, 0),
(9, 'Quiz 2', 'Programming', '2023-01-21 14:13:34', 7, 0),
(11, 'History111', '1st quiz', '2023-01-21 14:26:46', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(1, 1, '<p>qweqweqweqw</p>\r\n', 2, 0, '2023-01-07 10:41:16', 'True'),
(2, 1, '<p>shesdg</p>\r\n', 1, 0, '2023-01-07 14:41:16', 'B'),
(4, 2, '<p>121312</p>\r\n', 2, 0, '2023-01-20 17:26:35', 'True'),
(5, 3, '<p>SAsQSQsq</p>\r\n', 2, 0, '2023-01-20 17:28:50', 'True'),
(6, 5, '<p>1 x 1 = 0</p>\r\n', 2, 0, '2023-01-21 13:06:22', 'False'),
(7, 5, '<p>1 +1 = ?</p>\r\n', 1, 0, '2023-01-21 13:06:40', 'D'),
(8, 5, '<p>5 + 5 = ?</p>\r\n', 1, 0, '2023-01-21 13:07:53', 'A'),
(10, 6, '<p>San Pablo City&nbsp;ay isang Barangay</p>\r\n', 2, 0, '2023-01-21 13:17:44', 'False'),
(11, 6, '<p>San Pablo City&nbsp;ay isang Barangay</p>\r\n', 1, 0, '2023-01-21 13:17:55', 'A'),
(12, 6, '<p>San Pablo City&nbsp;ay isang Barangaysas</p>\r\n', 2, 0, '2023-01-21 13:18:03', 'False'),
(13, 7, '<p>HTML is a programming language</p>\r\n', 2, 0, '2023-01-21 13:21:00', 'False'),
(14, 7, '<p>C++</p>\r\n', 2, 0, '2023-01-21 13:21:52', 'True'),
(16, 7, '<p>HTML means</p>\r\n', 1, 0, '2023-01-21 13:23:00', 'A'),
(17, 5, '<p>lol?</p>\r\n', 2, 0, '2023-01-21 14:08:33', 'True'),
(18, 5, '<p>lal</p>\r\n', 1, 0, '2023-01-21 14:08:47', 'D'),
(19, 9, '<p>tanga ka julius?</p>\r\n', 2, 0, '2023-01-21 14:13:53', 'True'),
(20, 9, '<p>peraltashit ka bobo</p>\r\n', 1, 0, '2023-01-21 14:14:10', 'C'),
(21, 9, '<p>awitized?</p>\r\n', 1, 0, '2023-01-21 14:14:26', 'B'),
(22, 9, '<p>umay kana ba?</p>\r\n', 1, 0, '2023-01-21 14:14:44', 'D'),
(23, 9, '<p style=\"text-align: center;\">sheesh that is crazy?</p>\r\n', 2, 0, '2023-01-21 14:15:01', 'False'),
(24, 9, '<p>daddy tyaga</p>\r\n', 1, 0, '2023-01-21 14:15:18', 'B'),
(27, 11, '<p>Who were the first inhabitants of the Philippines?</p>\r\n', 1, 0, '2023-01-21 14:32:20', 'B'),
(28, 11, '<p>Who led the native Filipinos in the battle of Mactan?</p>\r\n', 1, 0, '2023-01-21 14:33:33', 'C'),
(29, 11, '<p>How did Spain gain control of the Philippines?</p>\r\n', 1, 0, '2023-01-21 14:34:45', 'B'),
(30, 11, '<p>Who is the father of the Katipunan?</p>\r\n', 1, 0, '2023-01-21 14:35:46', 'D'),
(31, 11, '<p>Who is the National Hero of the Philippines?</p>\r\n', 1, 0, '2023-01-21 14:36:49', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `strand_list`
--

CREATE TABLE `strand_list` (
  `strand_id` int(11) NOT NULL,
  `strands` varchar(255) NOT NULL,
  `strand_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `cys` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `strand` varchar(100) NOT NULL,
  `lrn` bigint(200) NOT NULL,
  `delete_status` int(50) NOT NULL,
  `firstgrading` double NOT NULL,
  `secondgrading` float NOT NULL,
  `thirdgrading` float NOT NULL,
  `fourthgrading` float NOT NULL,
  `finalgrade` float NOT NULL,
  `resettoken` varchar(250) NOT NULL,
  `resettokenexp` date NOT NULL,
  `user_idlogin` int(11) NOT NULL,
  `sy` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `middle_name`, `cys`, `subject_id`, `teacher_id`, `username`, `password`, `location`, `email`, `code`, `status`, `strand`, `lrn`, `delete_status`, `firstgrading`, `secondgrading`, `thirdgrading`, `fourthgrading`, `finalgrade`, `resettoken`, `resettokenexp`, `user_idlogin`, `sy`) VALUES
(501, 'q', 'q', 'q', '', '', 0, '', 'q', '../uploads/leaves.jpg', 'bsit.peralta.marcangelo@gmail.com', 0, '', '1', 1234556, 1, 0, 0, 0, 0, 0, '', '0000-00-00', 1, 'q'),
(502, 'Robert', 'Lucas ', 'G. ', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'rob@gmail.com', 0, '', 'ICT11-A', 760714115389, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 317813, '2022-2023'),
(503, 'Nicholas', 'Hammond', 'H.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'nich@gmail.com', 0, '', 'GAS 11-A', 8217362823613, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 929786, '2022-2023'),
(504, 'Bruce', 'Dean', 'U.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'bruce@gmail.com', 0, '', 'GAS 11-A', 1384158109674, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 399525, '2022-2023'),
(505, 'Jennifer', 'Guerero', 'F.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'jen@gmail.com', 0, '', 'ICT11-A', 684079207690, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 881678, '2022-2023'),
(506, 'David', 'Barret', 'S.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'dav@gmail.com', 0, '', 'ABM-11A', 3020191880255, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 499778, '2022-2023'),
(507, 'Katie', 'Miller', 'K.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'kat@gmail.com', 0, '', 'ABM-11A', 5483688635236, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 440604, '2022-2023'),
(508, 'Teresa', 'Johnson', 'T.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'ter@gmail.com', 0, '', 'HUMSS11-A', 1732542995623, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 410119, '2022-2023'),
(509, 'Suzanne', 'Clarke', 'J.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'suz@gmail.com', 0, '', 'HUMSS11-A', 3448716797348, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 793432, '2022-2023'),
(510, 'John', 'West', 'R.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'john@gmail.com', 0, '', 'SMAW-11A', 664503496799, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 308788, '2022-2023'),
(511, 'Johnny', 'Nguyen', 'H.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'jhn@gmail.com', 0, '', 'SMAW-11A', 1656854369984, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 245640, '2022-2023'),
(512, 'Tyler', 'Harrell', 'L.', '', '', 0, '', '1', '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'tyl@gmail.com', 0, '', 'EIM11-A', 6617906808316, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 819602, '2022-2023'),
(513, 'Rebecca', 'Harris', 'N.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'reb@gmail.com', 0, '', 'EIM11-A', 5970217693071, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 347276, '2022-2023'),
(514, 'Meliszs', 'Hills', 'A.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'mel@gmail.com', 0, '', 'STEM11-A', 4828205929400, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 503845, '2022-2023'),
(515, 'Riza ', 'Hunts', 'K.', '', '', 0, '', '1', '../uploads/light-violet-color-solid-background-1920x1080.png', 'lisa@gmail.com', 0, '', 'STEM11-A', 9389326874800, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 466174, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(50) NOT NULL,
  `class_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `delete_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id`, `class_id`, `student_id`, `teacher_id`, `date_added`, `delete_status`) VALUES
(4, 1, 500, '1', '0000-00-00', 0),
(5, 2, 500, '1', '0000-00-00', 0),
(6, 3, 500, '1', '0000-00-00', 0),
(8, 5, 503, '7', '0000-00-00', 0),
(10, 6, 514, '10', '0000-00-00', 0),
(11, 6, 515, '10', '0000-00-00', 0),
(12, 7, 502, '13', '0000-00-00', 0),
(13, 7, 505, '13', '0000-00-00', 0),
(14, 5, 504, '7', '0000-00-00', 0),
(15, 5, 502, '7', '0000-00-00', 0),
(16, 8, 502, '7', '0000-00-00', 0),
(17, 8, 506, '7', '0000-00-00', 0),
(18, 8, 508, '7', '0000-00-00', 0),
(19, 9, 502, '7', '0000-00-00', 0),
(20, 9, 506, '7', '0000-00-00', 0),
(21, 9, 508, '7', '0000-00-00', 0),
(22, 9, 505, '7', '0000-00-00', 0),
(23, 5, 505, '7', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `quiz_id`, `student_quiz_time`, `grade`) VALUES
(1, 1, 1, 0, '', '0 out of 1'),
(2, 2, 1, 0, '', '0 out of 1'),
(3, 3, 1, 0, '', '1 out of 1'),
(4, 4, 1, 0, '', '0 out of 1'),
(5, 7, 1, 0, '', '1 out of 1'),
(6, 6, 1, 0, '', '1 out of 2'),
(7, 6, 113, 0, '', '1 out of 1'),
(8, 7, 113, 0, '', '1 out of 1'),
(9, 5, 113, 0, '', '1 out of 1'),
(10, 4, 113, 0, '', '1 out of 1'),
(11, 1, 113, 0, '', ''),
(12, 8, 1, 0, '', '2 out of 2'),
(13, 5, 1, 0, '', '0 out of 2'),
(14, 12, 500, 0, '', '1 out of 1'),
(15, 15, 503, 0, '', '2 out of 3'),
(16, 15, 504, 0, '', '1 out of 3'),
(17, 17, 502, 0, '', '3 out of 3'),
(18, 15, 502, 0, '', '3 out of 3'),
(19, 18, 506, 0, '', '2 out of 5'),
(20, 18, 502, 0, '', '4 out of 5'),
(21, 18, 508, 0, '', '2 out of 5'),
(22, 19, 506, 0, '', '0 out of 6'),
(23, 19, 502, 0, '', '2 out of 6'),
(24, 19, 508, 0, '', '0 out of 6'),
(25, 19, 505, 0, '', '2 out of 6');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`) VALUES
(3, 'Math', 'Mathematics', 'Major'),
(4, 'COMPROG1', 'Programming', 'Major'),
(5, 'History101', 'History', 'Minor');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`user_id`, `username`, `password`, `firstname`, `lastname`, `role`) VALUES
(13, 'admin', 'admin', 'admin', 'admin', ''),
(15, '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `status` int(50) NOT NULL,
  `empid` int(20) NOT NULL,
  `user_idlogin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `middlename`, `department`, `student_id`, `location`, `day`, `status`, `empid`, `user_idlogin`) VALUES
(1, 'q', 'q', 'q', 'q', 'q', '', 0, '', '', 1, 0, 1),
(2, 'asd', 'asd', 'asd', 'asd', 'asd', '1', 0, '../uploads/pause.png', '', 1, 0, 12),
(3, '24', '234', '24', '234', '234', '1', 0, '../uploads/pause.png', '', 1, 0, 4364532),
(4, 'qwe', '123', 'qwe', '123', 'qwe', '1', 0, '../uploads/I will.png', '', 1, 0, 12),
(5, 'asd', 'asd', 'asd', 'asd', 'asd', '1', 0, '../uploads/snow.jpg', '', 1, 0, 13),
(6, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '1', 0, '../uploads/snow.jpg', '', 1, 0, 1222),
(7, 'nic@gmail.com', '1', 'Nicholas', 'Rodgers', 'R.', 'GAS', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Wednesday', 0, 0, 703592),
(8, 'greg@gmail.com', '1', 'Gregory', 'Harvey ', 'I.', 'GAS', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Tuesday,Thursday', 0, 0, 792547),
(9, 'karen@gmail.com', '1', 'Karen', 'Vargas', 'S.', 'GAS', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Monday,Friday', 0, 0, 986440),
(10, 'chris@gmail.com', '1', 'Chris', 'Watson ', 'H.', 'STEM', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Saturday', 0, 0, 228142),
(11, 'lisa@gmail.com', '1', 'Lisa', 'Hunt', 'E.', 'STEM', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Thursday', 0, 0, 466171),
(12, 'mel@gmail.com', '1', 'Melissa', 'Hill', 'U.', 'STEM', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Tuesday,Wednesday', 0, 0, 503849),
(13, 'step@gmail.com', '1', 'Stephanie', 'Robbins', 'J.', 'ICT', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Monday,Wednesday', 0, 0, 453580),
(14, 'tim@gmail.com', '1', 'Timothy', 'Ryan', 'F.', 'ICT', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Friday,Saturday', 0, 0, 493357),
(15, 'eric@gmail.com', '1', 'Eric', 'Lawson', 'G.', 'ICT', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Wednesday,Friday', 0, 0, 230362),
(16, 'bri@gmail.com', '1', 'Brian ', 'Lee ', 'D.', 'ABM', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Tuesday', 0, 0, 767376),
(17, 'mir@gmail.com', '1', 'Miranda', 'Torres ', 'H.', 'ABM', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Wednesday', 0, 0, 784524),
(18, 'janet@gmail.com', '1', 'Janet', 'Mayer', 'I.', 'ABM', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Monday,Wednesday,Thursday', 0, 0, 448868),
(19, 'nat@gmail.com', '1', 'Natasha', 'Abbott', 'J.', 'HUMSS', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Tuesday,Friday', 0, 0, 333076),
(20, 'em@gmail.com', '1', 'Emily', 'Ward', 'U.', 'HUMSS', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Thursday,Friday', 0, 0, 591795),
(21, 'wil@gmail.com', '1', 'William', 'Hogan', 'F.', 'HUMSS', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Thursday,Sunday', 0, 0, 315586),
(22, 'kat@gmail.com', '1', 'Kaitlin', 'Horn', 'K.', 'SMAW', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Monday,Wednesday', 0, 0, 746590),
(23, 'joseph@gmail.com', '1', 'Joseph', 'Oneal', 'I.', 'SMAW', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Monday,Wednesday', 0, 0, 979062),
(24, 'thom@gmail.com', '1', 'Thomas', 'Cuervas', 'H.', 'SMAW', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Thursday,Saturday', 0, 0, 289032),
(25, 'ric@gmail.com', '1', 'Richard', 'Anthony', 'A.', 'EIM', 0, '../uploads/blue0517-4dfc85cb0200460ab717b101ac07888f.jpg', 'Tuesday,Thursday', 0, 0, 158697),
(26, 'leah@gmail.com', '1', 'Leah', 'Stevens', 'Y.', 'EIM', 0, '../uploads/light-violet-color-solid-background-1920x1080.png', 'Monday,Tuesday', 0, 0, 680596);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student`
--

CREATE TABLE `teacher_student` (
  `teacher_student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2022-12-31 01:47:49', '2023-01-21 13:33:05', 13),
(2, '1', '2022-12-31 01:48:02', '2023-01-20 16:54:41', 15),
(3, '1', '2022-12-31 01:48:07', '2023-01-20 16:54:41', 15),
(4, 'admin', '2022-12-31 01:48:34', '2023-01-21 13:33:05', 13),
(5, 'admin', '2022-12-31 01:48:53', '2023-01-21 13:33:05', 13),
(6, 'admin', '2022-12-31 01:53:05', '2023-01-21 13:33:05', 13),
(7, 'admin', '2022-12-31 01:53:49', '2023-01-21 13:33:05', 13),
(8, 'admin', '2022-12-31 01:53:58', '2023-01-21 13:33:05', 13),
(9, 'admin', '2022-12-31 02:03:14', '2023-01-21 13:33:05', 13),
(10, 'admin', '2022-12-31 02:04:07', '2023-01-21 13:33:05', 13),
(11, 'admin', '2022-12-31 02:13:19', '2023-01-21 13:33:05', 13),
(12, 'admin', '2022-12-31 02:17:36', '2023-01-21 13:33:05', 13),
(13, 'admin', '2022-12-31 02:24:37', '2023-01-21 13:33:05', 13),
(14, 'admin', '2022-12-31 02:32:19', '2023-01-21 13:33:05', 13),
(15, 'admin', '2023-01-07 10:19:20', '2023-01-21 13:33:05', 13),
(16, 'admin', '2023-01-07 10:29:55', '2023-01-21 13:33:05', 13),
(17, 'admin', '2023-01-07 10:39:50', '2023-01-21 13:33:05', 13),
(18, 'admin', '2023-01-07 10:41:56', '2023-01-21 13:33:05', 13),
(19, 'admin', '2023-01-07 10:42:31', '2023-01-21 13:33:05', 13),
(20, 'admin', '2023-01-07 22:27:00', '2023-01-21 13:33:05', 13),
(21, '1', '2023-01-20 16:46:16', '2023-01-20 16:54:41', 15),
(22, 'admin', '2023-01-20 21:37:51', '2023-01-21 13:33:05', 13),
(23, 'admin', '2023-01-20 21:42:12', '2023-01-21 13:33:05', 13),
(24, 'admin', '2023-01-20 21:43:39', '2023-01-21 13:33:05', 13),
(25, 'admin', '2023-01-21 00:40:34', '2023-01-21 13:33:05', 13),
(26, 'admin', '2023-01-21 00:42:05', '2023-01-21 13:33:05', 13),
(27, 'admin', '2023-01-21 00:47:58', '2023-01-21 13:33:05', 13),
(28, 'admin', '2023-01-21 00:48:53', '2023-01-21 13:33:05', 13),
(29, 'admin', '2023-01-21 01:04:14', '2023-01-21 13:33:05', 13),
(30, 'admin', '2023-01-21 10:58:55', '2023-01-21 13:33:05', 13),
(31, 'admin', '2023-01-21 12:21:18', '2023-01-21 13:33:05', 13),
(32, 'admin', '2023-01-21 12:22:09', '2023-01-21 13:33:05', 13),
(33, 'admin', '2023-01-21 12:23:01', '2023-01-21 13:33:05', 13),
(34, 'admin', '2023-01-21 12:23:32', '2023-01-21 13:33:05', 13),
(35, 'admin', '2023-01-21 13:11:10', '2023-01-21 13:33:05', 13),
(36, 'admin', '2023-01-21 13:14:16', '2023-01-21 13:33:05', 13),
(37, 'admin', '2023-01-21 13:28:46', '2023-01-21 13:33:05', 13),
(38, 'admin', '2023-01-21 13:32:53', '2023-01-21 13:33:05', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `module_class`
--
ALTER TABLE `module_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `strand_list`
--
ALTER TABLE `strand_list`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_student`
--
ALTER TABLE `teacher_student`
  ADD PRIMARY KEY (`teacher_student_id`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`teacher_subject_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `module_class`
--
ALTER TABLE `module_class`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `strand_list`
--
ALTER TABLE `strand_list`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `teacher_student`
--
ALTER TABLE `teacher_student`
  MODIFY `teacher_student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
