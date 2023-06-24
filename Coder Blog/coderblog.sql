-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 10:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coderblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'user.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`first_name`, `last_name`, `username`, `password`, `email`, `contact`, `image`) VALUES
('kommaddi', 'vamsi', 'mohan', 'cb@32', 'kvmrvamsi@gmail.com', 8008381047, 'admin_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sno` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sno`, `rid`, `username`, `message`, `date`, `time`) VALUES
(1, 0, 'guest', 'on which topic sir is posting questions?', '2022-06-05', '21:31:40'),
(2, 2, 'vamsicse', 'on sorting techniques', '2022-06-05', '21:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_question`
--

CREATE TABLE `post_question` (
  `qno` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `due_date` varchar(30) NOT NULL,
  `due_time` varchar(15) NOT NULL,
  `question` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `trend` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_question`
--

INSERT INTO `post_question` (`qno`, `start_date`, `start_time`, `due_date`, `due_time`, `question`, `status`, `trend`) VALUES
(1, '2022-05-22', '12:07:04', 'may 22, 2022', '12:30:28', 'write a java program to implement bubble sort', 0, 0),
(2, '2022-05-22', '22:21:57', 'may 22, 2022', '22:30:6', 'write a java program to implement selection sort', 0, 0),
(3, '2022-05-23', '19:29:25', 'may 23, 2022', '19:40:15', 'write a python program to implement insertion sort', 0, 0),
(4, '2022-05-30', '20:48:24', 'may 30, 2022', '21:0:0', 'write a java program to print factorial of a number', 0, 0),
(5, '2022-06-09', '20:56:05', 'june 9, 2022', '21:10:15', 'write a java program to reverse digits of a number', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register2`
--

CREATE TABLE `register2` (
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register2`
--

INSERT INTO `register2` (`username`, `email`, `date`, `time`) VALUES
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-05', '23:09:01'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-07', '19:31:06'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-07', '19:32:46'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-08', '18:46:25'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-08', '18:52:33'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-08', '18:54:09'),
('Ravindra', 'yarasuvenkataravindrareddy@gma', '2022-06-08', '18:56:22'),
('Ravindra', 'yarasuvenkataravindrareddy@gma', '2022-06-08', '18:57:07'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-08', '18:57:28'),
('Ravindra', 'yarasuvenkataravindrareddy@gma', '2022-06-08', '18:59:04'),
('Ravindra', 'yarasuvenkataravindrareddy@gma', '2022-06-08', '19:04:38'),
('Krishna', 'venomspoidy@gmail.com', '2022-06-08', '19:11:58'),
('Bhadra', 'bhadranpl22@gmail.com', '2022-06-08', '19:25:30'),
('Bhadra', 'bhadranpl22@gmail.com', '2022-06-08', '19:27:27'),
('Bhadra', 'bhadranpl22@gmail.com', '2022-06-08', '20:52:52'),
('vasavi', 'vasu.l1456@gmail.com', '2022-06-09', '21:54:48'),
('vamsicse', 'kvmrvamsi@gmail.com', '2022-06-11', '09:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'user.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`first_name`, `last_name`, `username`, `password`, `email`, `contact`, `image`) VALUES
('Veera bhadra swamy', 'chakkolthi', 'Bhadra', 'Bhadrav@322', 'bhadranpl22@gmail.com', 7386469238, '801780.png'),
('Palagiri', 'Vamsi krishna reddy', 'Krishna', 'Krishna@11', 'venomspoidy@gmail.com', 8688474028, '14a.jpg'),
('Ravindra reddy', 'yarasu', 'Ravindra', 'Ravindra@32', 'yarasuvenkataravindrareddy@gma', 9908370745, 'admin_1.jpeg'),
('vamsimohan', 'reddy', 'vamsicse', 'Vamsi@32', 'kvmrvamsi@gmail.com', 9398596390, 'user.jpeg'),
('Vasavi', 'L', 'vasavi', 'Vasavil@32', 'vasu.l1456@gmail.com', 7330793249, 'back6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `submit_answer`
--

CREATE TABLE `submit_answer` (
  `qno` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pdfname` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL,
  `marks` float NOT NULL DEFAULT -1,
  `credit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_answer`
--

INSERT INTO `submit_answer` (`qno`, `date`, `time`, `username`, `pdfname`, `visible`, `marks`, `credit`) VALUES
(1, '2022-05-22', '12:08:11', 'vamsicse', 'bubblesort.pdf', 0, -1, '<p style=\"background-color:red;color:yellow;\">NOT-CREDITED</p>'),
(3, '2022-05-23', '19:33:54', 'vamsicse', 'insertion.pdf', 0, 8, '<p style=\"background-color:green;color:yellow;\">CREDITED</p>'),
(4, '2022-05-30', '20:53:42', 'vamsicse', 'factorial.pdf', 0, 8, '<p style=\"background-color:green;color:yellow;\">CREDITED</p>'),
(5, '2022-06-09', '21:10:17', 'vamsicse', 'reverse.pdf', 0, 8, '<p style=\"background-color:green;color:yellow;\">CREDITED</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `post_question`
--
ALTER TABLE `post_question`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_question`
--
ALTER TABLE `post_question`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
