-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 09:37 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logiin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'kushvith', 'kushvithchinna900@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `announce` varchar(60) NOT NULL,
  `college` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `name`, `email`, `announce`, `college`, `time`, `department`) VALUES
(2, 'tarun', 'tarun@gmail.com', 'i am tarun', 'NEC', '2021-05-25 12:39:54', 'cp15'),
(6, 'kushvith', 'a@gmail.com', 'there is no college leave the session\r\n', 'NEC', '2021-05-28 09:31:49', 'cp15'),
(7, 'KUSHVITH', 'kushvith@yahoo.com', 'this is to inform the college remains closed on 15-aug-2020', 'GTC', '2021-06-12 07:22:51', 'cp15');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 3, 1, 'hi', '2021-05-01 06:27:36', 0),
(2, 1, 3, 'hi', '2021-05-01 06:28:00', 0),
(3, 1, 3, 'what are you doing', '2021-05-01 06:28:24', 0),
(4, 1, 3, 'reply fast', '2021-05-01 06:28:42', 0),
(5, 1, 2, 'hi', '2021-05-10 03:29:07', 0),
(6, 2, 1, 'eno', '2021-05-10 03:29:24', 0),
(7, 1, 3, 'hii', '2021-05-11 06:58:45', 0),
(8, 1, 3, 'hi', '2021-05-11 06:59:00', 0),
(9, 1, 2, 'hi', '2021-05-24 10:18:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `time`) VALUES
(1, 'kushvith chinna', 'kushvithchinna900@gmail.com', 'fsgfrhy', '2021-07-12 03:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `token` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(60) NOT NULL,
  `teacher` text NOT NULL,
  `one` varchar(100) NOT NULL,
  `two` varchar(100) NOT NULL,
  `three` varchar(100) NOT NULL,
  `four` varchar(100) NOT NULL,
  `five` varchar(100) NOT NULL,
  `six` varchar(100) NOT NULL,
  `seven` varchar(100) NOT NULL,
  `eight` varchar(100) NOT NULL,
  `nine` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `eleven` varchar(100) NOT NULL,
  `twelve` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `centre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `token`, `email`, `course`, `teacher`, `one`, `two`, `three`, `four`, `five`, `six`, `seven`, `eight`, `nine`, `ten`, `eleven`, `twelve`, `time`, `centre`) VALUES
(8, 'nec01', 'kushvith@yahoo.com', 'cp08', 'kushvith', 'Strongly Agree', 'Agree', 'Agree', 'Agree', 'Disagree', 'Disagree', 'Neutral', 'Neutral', 'Neutral', '', 'Neutral', 'Agree', '2021-07-11 14:33:21', 'NEC'),
(9, 'nec01', 'kushvith@yahoo.com', 'cp08', 'kushvith', 'Strongly Agree', 'Agree', 'Agree', 'Agree', 'Disagree', 'Disagree', 'Neutral', 'Neutral', 'Neutral', '', 'Neutral', 'Agree', '2021-07-11 14:34:30', 'NEC');

-- --------------------------------------------------------

--
-- Table structure for table `hw`
--

CREATE TABLE `hw` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `college` varchar(20) NOT NULL,
  `verification` varchar(20) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `teachername` varchar(30) NOT NULL,
  `department` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `marks` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hw`
--

INSERT INTO `hw` (`id`, `name`, `file_name`, `address`, `college`, `verification`, `subject`, `teachername`, `department`, `semester`, `time`, `marks`) VALUES
(2, 'tarun@gmail.com', '2.jpeg', '23052116217551462.jpeg', 'nec', 'approved', '123', 'KUSHVITH', '0', 'sem1', '2021-05-28 09:32:49', 4),
(3, 'ac', '3', '3', '3', '3', '3', '3', '33', '', '2021-05-27 10:35:47', 0),
(4, 'kushvith@yahoo.com', 'logiin.sql', '0406211622801506logiin.sql', 'NEC', 'pending', 'maths', 'TARUN', 'cp09', 'sem1', '2021-06-04 10:11:46', 0),
(5, 'kushvith@yahoo.com', 'logiin.sql', '0506211622861833logiin.sql', 'NEC', 'pending', '123', 'TARUN', 'cp09', 'sem1', '2021-06-05 02:57:13', 0),
(6, 'kushvith@yahoo.com', 'read.txt', '0506211622867554read.txt', 'NEC', 'pending', 'maths', 'TARUN', 'cp09', 'sem2', '2021-06-05 04:32:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `id` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `TokenNumber` varchar(20) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Centre` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `BatchYear` int(10) NOT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `STATUS` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `profile` varchar(100) NOT NULL,
  `action` varchar(25) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `stat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`id`, `Name`, `TokenNumber`, `Email`, `Centre`, `Department`, `BatchYear`, `PASSWORD`, `STATUS`, `profile`, `action`, `otp`, `stat`) VALUES
(54, 'kushvith', 'nec01', 'kushvith@yahoo.com', 'NEC', 'cp08', 2018, 'a', '2021-07-13 07:29:53.694854', '', '', '739551', 'verified'),
(56, 'grgrrrre', '', '', '', '', 0, NULL, '2021-07-12 10:24:00.146598', '', '', '', ''),
(58, 'grgerg', '', '', '', '', 0, NULL, '2021-07-12 10:23:55.307777', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_hw`
--

CREATE TABLE `teacher_hw` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(25) NOT NULL,
  `college` varchar(25) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `submit_date` date NOT NULL,
  `semester` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_hw`
--

INSERT INTO `teacher_hw` (`id`, `name`, `email`, `subject`, `file_name`, `address`, `department`, `college`, `time`, `submit_date`, `semester`) VALUES
(1, 'kushvith', 'a@gmail.com', 'maths', 'delete.php', '2005211621506466delete.php', 'cp15', 'NEC', '2021-05-20 10:27:46', '2021-05-28', ''),
(2, 'kushvith', 'a@gmail.com', 'maths', 'delete.php', '2005211621506580delete.php', 'cp15', 'NEC', '2021-05-20 10:29:40', '2021-05-28', ''),
(3, 'kushvith', 'a@gmail.com', 'maths', 'top_and_side_bar.php', '2005211621506594top_and_side_bar.php', 'cp15', 'NEC', '2021-05-20 10:29:54', '2021-05-28', ''),
(4, 'kushvith', 'a@gmail.com', 'maths', 'top_and_side_bar.php', '2005211621506841top_and_side_bar.php', 'cp15', 'NEC', '2021-05-20 10:34:01', '2021-05-28', ''),
(5, 'kushvith', 'a@gmail.com', 'maths', 'top_and_side_bar.php', '2005211621507166top_and_side_bar.php', 'cp15', 'NEC', '2021-05-20 10:39:26', '2021-05-28', ''),
(6, 'kushvith', 'a@gmail.com', 'maths', 'top_and_side_bar.php', '2005211621507475top_and_side_bar.php', 'cp15', 'NEC', '2021-05-20 10:44:35', '2021-05-28', ''),
(7, 'KUSHVITH CHINNA', 'kushvith@yahoo.com', 'maths', 'read.txt', '0907211625809342read.txt', 'cp08', 'NEC', '2021-07-09 05:42:22', '2021-08-06', 'sem5'),
(8, 'KUSHVITH CHINNA', 'kushvith@yahoo.com', 'maths', 'read.txt', '0907211625809465read.txt', 'cp08', 'NEC', '2021-07-09 05:44:25', '2021-08-06', 'sem5'),
(9, 'KUSHVITH CHINNA', 'kushvith@yahoo.com', 'maths', 'read.txt', '0907211625809501read.txt', 'cp08', 'NEC', '2021-07-09 05:45:01', '2021-08-06', 'sem5');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_signin`
--

CREATE TABLE `teacher_signin` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `department` varchar(10) NOT NULL,
  `college` varchar(25) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `designation` varchar(40) NOT NULL,
  `post` varchar(25) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `otp` int(25) NOT NULL,
  `stat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hw`
--
ALTER TABLE `hw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_hw`
--
ALTER TABLE `teacher_hw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_signin`
--
ALTER TABLE `teacher_signin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hw`
--
ALTER TABLE `hw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `teacher_hw`
--
ALTER TABLE `teacher_hw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_signin`
--
ALTER TABLE `teacher_signin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
