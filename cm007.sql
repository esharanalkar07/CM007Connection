-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 01:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cm007`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `a_username` varchar(10) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `a_username`, `a_password`) VALUES
(1, 'admin', 'helloadmin');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `file` varchar(100) NOT NULL,
  `assign_url` varchar(100) NOT NULL,
  `student_id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`file`, `assign_url`, `student_id`) VALUES
('81474-cmm007- connection.docx', '', 1813205),
('34827-116.pdf', '', 1813205),
('75872-fulltext01.pdf', '', 123456),
('40059-increment a01- report.doc', '', 199467),
('29454-http.docx', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `regno` bigint(50) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `student_id` int(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`firstname`, `lastname`, `department`, `email`, `regno`, `dob`, `username`, `password`, `phone`, `address`, `student_id`, `course`, `img_url`) VALUES
('esha', 'esha', 'School of Computing and Digital Media', 'esha@gmail.com', 0, '1994-09-07', 'esha', 'esha', 789654, 'union street, aberdeen', 199467, 'IT for Oil and Gas', 'esha.JPG'),
('james', 'lazar', 'School of Computing and Digital Media', 'james@gmail.com', 0, '1978-09-07', 'james', 'james', 67543546, 'Kings Street, Aberdeen', 134562, 'IT with Cyber Security', ''),
('mike', 'Lowel', 'Health and Science', 'mike\"gmail.com', 0, '1993-08-05', 'mike', 'mike', 6789543, 'garthdee road, Aberdeen', 5674343, 'IT with Cyber Security', ''),
('Pauline', 'tank', 'School of Computing and Digital Media', 'pau@gmail.com', 0, '1991-03-04', 'pauline', 'pauline', 234567, 'George street, Aberdeeen', 167854, 'IT with Artificial Intelligence', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assignment`
--

CREATE TABLE `teacher_assignment` (
  `file` varchar(100) NOT NULL,
  `teacher_id` int(50) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_assignment`
--

INSERT INTO `teacher_assignment` (`file`, `teacher_id`, `department`) VALUES
('45214-http.docx', 345627, 'ITOG');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_user`
--

CREATE TABLE `teacher_user` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `experience` int(50) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `teacher_id` int(50) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_user`
--

INSERT INTO `teacher_user` (`firstname`, `lastname`, `department`, `email`, `experience`, `dob`, `username`, `password`, `phone`, `address`, `teacher_id`, `img_url`) VALUES
('Liam', 'Mcgregor', 'ITOG', 'liam@gmail.com', 0, '1981-02-04', 'liam', '6d8c4d103f90154cc06dd75a71d061be', 123456789, '123 Andrew street, Aberdeen', 123456, ''),
('maria', 'george', 'ITOG', 'maria@gmail.com', 0, '1979-07-09', 'maria', 'maria1', 123456789, 'Garthdee Road, Aberdeen', 345627, 'maria.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `teacher_user`
--
ALTER TABLE `teacher_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
