-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 08:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(3, 'Mercy', 'mercy@gmail.com', '$2y$10$F5vCgHiocjB35lamzBGB7.8IiyiHyNO2nuOGZ1DZbeXtXmHo7NTy2'),
(17, 'Godstime Nwujiokah', 'godstimeonyibe@gmail.com', '$2y$10$6wAR.phADGBv3mpssVT8Su/cR7VCuN3XNgLAWB/0lAQq9coLIwlTm'),
(19, 'Godstime Nwujiokah', 'godstimeonyibe2@gmail.com', '$2y$10$Xr.kCDgKIpecX.xVAE5D7eK679nsny8JQcseOQC3yI.HH3sAI1b/K');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(10) NOT NULL,
  `lecturerid` int(10) NOT NULL,
  `coursetitle` varchar(40) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `assignment` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `lecturerid`, `coursetitle`, `coursecode`, `assignment`, `date`) VALUES
(1, 2, '2', '', 'hjwejh', '08-02-2022'),
(2, 2, 'Database Management', '', 'what is database management?', '08-02-2022'),
(3, 2, 'Assembly Language', '', 'what is this', '25-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `classbatch`
--

CREATE TABLE `classbatch` (
  `id` int(10) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classbatch`
--

INSERT INTO `classbatch` (`id`, `batch`, `date`) VALUES
(3, '2020/2021', '05-02-2022'),
(4, '2021/2022', '05-02-2022'),
(5, '2019/2020', '10-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `coursetitle` varchar(30) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursetitle`, `coursecode`, `unit`) VALUES
(1, 'Compiler construction II', 'CSC 422', '3'),
(2, 'Internet of things', 'CSC 301', '2'),
(10, 'Database Management', 'CSC 401', '2'),
(11, 'Operating System', 'CSC 421', '2'),
(12, 'Assembly Language', 'CSC 311', '3'),
(13, 'Software analysis', 'CSC 226', '2');

-- --------------------------------------------------------

--
-- Table structure for table `courseallocation`
--

CREATE TABLE `courseallocation` (
  `id` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `lecturerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseallocation`
--

INSERT INTO `courseallocation` (`id`, `courseid`, `lecturerid`) VALUES
(4, 1, 1),
(5, 10, 2),
(6, 12, 2),
(7, 2, 1),
(8, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `coursebatch`
--

CREATE TABLE `coursebatch` (
  `id` int(10) NOT NULL,
  `batchid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursebatch`
--

INSERT INTO `coursebatch` (`id`, `batchid`, `courseid`, `semester`, `level`) VALUES
(1, 3, 10, 'Second Semester', '200');

-- --------------------------------------------------------

--
-- Table structure for table `exam_enroll`
--

CREATE TABLE `exam_enroll` (
  `id` int(10) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `examid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_enroll`
--

INSERT INTO `exam_enroll` (`id`, `useremail`, `examid`) VALUES
(3, 'godstimeonyibe@gmail.com', 12),
(4, 'godstimeonyibe@gmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `staffnumber` varchar(30) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `email`, `staffnumber`, `faculty`, `dept`, `password`) VALUES
(1, 'Ikpali Isreal', 'Isreal@gmail.com', 'Ebsu/Staff/2016/90978', 'Health Sci', 'Nursing Science', '$2y$10$ut.HGi.MMMxXCRtMdpdppuCkp.f0aAjCZzt30s4kUu96HUaljValG'),
(2, 'Godstime Nwujiokah', 'godstime@gmail.com', 'Ebsu/Staff/2016/83904', 'Science', 'CSC', '$2y$10$njkw//fBGj/504ubJelIq.E2HT87EMZitwHAvhrqdATiBIZiii7z2'),
(3, 'Nwafor Emmanuel', 'emma@gmail.com', 'Ebsu/Staff/2016/83901', 'Science', 'CSC', '$2y$10$3EqlOy9CoWMHUpjF4MqalO/3XDFK6uTLlPOZLEG3X/uhvQaX8W29S');

-- --------------------------------------------------------

--
-- Table structure for table `liveclass`
--

CREATE TABLE `liveclass` (
  `id` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `course` varchar(30) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liveclass`
--

INSERT INTO `liveclass` (`id`, `user`, `course`, `link`) VALUES
(3, 'godstime@gmail.com', 'Assembly Language', 'jhsdjhjhhj yufdu');

-- --------------------------------------------------------

--
-- Table structure for table `optionchoose`
--

CREATE TABLE `optionchoose` (
  `id` int(10) NOT NULL,
  `queid` int(100) NOT NULL,
  `optionnumber` varchar(100) NOT NULL,
  `ii` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) NOT NULL,
  `examid` int(10) NOT NULL,
  `questiontitle` varchar(200) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `correct` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `examid`, `questiontitle`, `option1`, `option2`, `option3`, `option4`, `correct`) VALUES
(1, 8, 'what is a computer', 'machine', 'toy', 'iron', 'child', '2'),
(2, 8, 'Define dbms', 'storage', 'programming', 'graphic', 'networking', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(10) NOT NULL,
  `lecturerid` int(10) NOT NULL,
  `examname` varchar(100) NOT NULL,
  `batchid` varchar(40) NOT NULL,
  `coursetitle` varchar(100) NOT NULL,
  `examduration` varchar(20) NOT NULL,
  `totalque` varchar(10) NOT NULL,
  `markperitque` int(10) NOT NULL,
  `markperongque` int(10) NOT NULL,
  `datecreated` varchar(20) NOT NULL,
  `examdate` varchar(20) NOT NULL,
  `examstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `lecturerid`, `examname`, `batchid`, `coursetitle`, `examduration`, `totalque`, `markperitque`, `markperongque`, `datecreated`, `examdate`, `examstatus`) VALUES
(8, 2, 'autumn', '2021/2022', 'Database Management', '10', '5', 1, 1, '06-02-2022', '2022-02-25', 'pending'),
(9, 2, 'winter ', '2020/2021', 'Assembly Language', '10', '5', 1, 1, '07-02-2022', '2022-02-19', 'pending'),
(10, 2, 'sprint', '2020/2021', 'Internet of things', '10', '5', 1, 1, '07-02-2022', '2022-02-20', 'pending'),
(12, 2, 'raining season', '2021/2022', 'Database Management', '10', '5', 1, 1, '09-02-2022', '2022-02-26T08:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `registeredcourse`
--

CREATE TABLE `registeredcourse` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `courseid` int(10) NOT NULL,
  `coursetitle` varchar(40) NOT NULL,
  `coursecode` varchar(50) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeredcourse`
--

INSERT INTO `registeredcourse` (`id`, `username`, `courseid`, `coursetitle`, `coursecode`, `unit`) VALUES
(49, 'godstimeonyibe2@gmail.com', 13, 'Software analysis', 'CSC 226', '2'),
(50, 'godstimeonyibe2@gmail.com', 2, 'Internet of things', 'CSC 301', '2'),
(51, 'godstimeonyibe2@gmail.com', 10, 'Database Management', 'CSC 401', '2'),
(52, 'godstimeonyibe2@gmail.com', 11, 'Operating System', 'CSC 421', '2'),
(53, 'godstimeonyibe2@gmail.com', 1, 'Compiler construction II', 'CSC 422', '3'),
(56, 'godstimeonyibe@gmail.com', 1, 'Compiler construction II', 'CSC 422', '3'),
(57, 'godstimeonyibe@gmail.com', 10, 'Database Management', 'CSC 401', '2'),
(58, 'mercy@gmail.com', 1, 'Compiler construction II', 'CSC 422', '3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `regnumber` varchar(20) NOT NULL,
  `faculty` varchar(40) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `jambid` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `regnumber`, `faculty`, `dept`, `jambid`, `phone`, `level`, `password`) VALUES
(1, 'Godstime Nwujiokah', 'godstimeonyibe@gmail.com', 'Ebsu/2016/83904', 'Science', 'Imaths', '76987654BD', '+2348144657154', '400', '$2y$10$gfRS10afEwdvfDAlDTzL9uRjmsaYaxZqMMC84e/twIn0ZnbSBce2K'),
(2, 'Miriam', 'miriamsplendor@gmail.com', 'Ebsu/2017/88708', 'Sci', 'CSC', '76987654EE', '0813351339', '300', '$2y$10$12g..bhNLLSc73TNsInVw.iNd4rRzOnDRcv49Nih4TdiEZqokZ.Lm'),
(3, 'Ajah Ify', 'Ajah@gmail.com', 'Ebsu/Staff/2016/9077', 'Sci', 'CSC', '', '', '', 'Software Engineering'),
(4, 'Godstime Nwujiokah', 'godstimeonyibe2@gmail.com', 'Ebsu/2016/83900', 'Law', 'Agric', '75609876GG', '08144657154', '200', '$2y$10$J1SoVES.6mndbxQ7XSE8E.1daktp7V/SMK2erlSif/8G2XL1zCuby'),
(5, 'Mercy', 'mercy@gmail.com', 'Ebsu/2016/83904', 'science', 'Imaths', '76987654BL', '+2348144657999', '300', '$2y$10$afcf62xxCrN9RpOggwfDduOiyWjGVZ87w0N/7UfYckNhWJ13JSncO');

-- --------------------------------------------------------

--
-- Table structure for table `studentanswer`
--

CREATE TABLE `studentanswer` (
  `id` int(10) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `examid` int(10) NOT NULL,
  `choseoption` varchar(10) NOT NULL,
  `mark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subassign`
--

CREATE TABLE `subassign` (
  `id` int(10) NOT NULL,
  `user` varchar(40) NOT NULL,
  `coursetitle` varchar(20) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `assignment` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subassign`
--

INSERT INTO `subassign` (`id`, `user`, `coursetitle`, `coursecode`, `assignment`, `date`) VALUES
(4, 'Godstime Nwujiokah', 'Intro to csc', 'CSC 101', 'examTime.jpg', '26-02-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classbatch`
--
ALTER TABLE `classbatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseallocation`
--
ALTER TABLE `courseallocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursebatch`
--
ALTER TABLE `coursebatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_enroll`
--
ALTER TABLE `exam_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liveclass`
--
ALTER TABLE `liveclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optionchoose`
--
ALTER TABLE `optionchoose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeredcourse`
--
ALTER TABLE `registeredcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentanswer`
--
ALTER TABLE `studentanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subassign`
--
ALTER TABLE `subassign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classbatch`
--
ALTER TABLE `classbatch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courseallocation`
--
ALTER TABLE `courseallocation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coursebatch`
--
ALTER TABLE `coursebatch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_enroll`
--
ALTER TABLE `exam_enroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `liveclass`
--
ALTER TABLE `liveclass`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `optionchoose`
--
ALTER TABLE `optionchoose`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registeredcourse`
--
ALTER TABLE `registeredcourse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentanswer`
--
ALTER TABLE `studentanswer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subassign`
--
ALTER TABLE `subassign`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
