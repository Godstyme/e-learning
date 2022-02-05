-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 03:53 PM
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
(1, 'Godstime', 'godstime@gmail.com', '$2y$10$2vfrT/oc.YoW2imMYduDbO0U5kwK6ieOyaAcoM0fSpCueab0bdrIi'),
(3, 'Mercy', 'mercy@gmail.com', '$2y$10$F5vCgHiocjB35lamzBGB7.8IiyiHyNO2nuOGZ1DZbeXtXmHo7NTy2');

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

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `coursetitle` varchar(30) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursetitle`, `coursecode`, `level`, `semester`, `unit`) VALUES
(1, 'Compiler construction II', 'CSC 422', 'Year four', 'Second sem', '3'),
(2, 'Internet of things', 'CSC 301', 'Year Three', 'First Semester', '2'),
(10, 'Database Management', 'CSC 401', 'Year Four', 'First Semester', '2'),
(11, 'Operating System', 'CSC 421', 'Year Four', 'First Semester', '2'),
(12, 'Assembly Language', 'CSC 311', 'Year Four', 'First Semester', '3');

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
-- Table structure for table `registeredcourse`
--

CREATE TABLE `registeredcourse` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `coursetitle` varchar(40) NOT NULL,
  `coursecode` varchar(50) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeredcourse`
--

INSERT INTO `registeredcourse` (`id`, `username`, `coursetitle`, `coursecode`, `unit`) VALUES
(2, 'Compiler construction IICSC 4223,Interne', 'Compiler construction IICSC 4223,Interne', 'Compiler construction IICSC 4223,Internet of thing', 'Compiler c'),
(3, 'Compiler construction IICSC 4223Internet', 'Compiler construction IICSC 4223Internet', 'Compiler construction IICSC 4223Internet of things', 'Compiler c'),
(4, 'Operating SystemCSC 4212Assembly Languag', 'Operating SystemCSC 4212Assembly Languag', 'Operating SystemCSC 4212Assembly LanguageCSC 3113', 'Operating ');

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
(1, 'Godstime Nwujiokah', 'godstimeonyibe@gmail.com', 'Ebsu/2016/83904', 'Science', 'CSC', '', '', '', '$2y$10$gfRS10afEwdvfDAlDTzL9uRjmsaYaxZqMMC84e/twIn0ZnbSBce2K'),
(2, 'Miriam', 'miriamsplendor@gmail.com', 'Ebsu/2017/88708', 'Sci', 'CSC', '', '', '', '$2y$10$12g..bhNLLSc73TNsInVw.iNd4rRzOnDRcv49Nih4TdiEZqokZ.Lm'),
(3, 'Ajah Ify', 'Ajah@gmail.com', 'Ebsu/Staff/2016/9077', 'Sci', 'CSC', '', '', '', 'Software Engineering'),
(4, 'Godstime Nwujiokah', 'godstimeonyibe2@gmail.com', 'Ebsu/2016/83900', 'Law', 'Law', '', '', '', '$2y$10$J1SoVES.6mndbxQ7XSE8E.1daktp7V/SMK2erlSif/8G2XL1zCuby'),
(5, 'Mercy', 'mercy@gmail.com', 'Ebsu/2016/83904', 'science', 'csc', '', '+2348144657154', '200', '$2y$10$afcf62xxCrN9RpOggwfDduOiyWjGVZ87w0N/7UfYckNhWJ13JSncO');

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
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courseallocation`
--
ALTER TABLE `courseallocation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registeredcourse`
--
ALTER TABLE `registeredcourse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
