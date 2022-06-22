-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 12:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(2) NOT NULL,
  `A_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `A_name`, `password`) VALUES
(1, 'friend', 'friend'),
(10, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rev_id` int(5) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Contact` varchar(255) DEFAULT NULL,
  `Checkindate` date DEFAULT NULL,
  `Checkoutdate` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT 2 COMMENT '0=pending,1=checkin,2=checkout',
  `room_id` int(5) DEFAULT NULL,
  `U_id` int(5) DEFAULT NULL,
  `cat_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rev_id`, `Username`, `Contact`, `Checkindate`, `Checkoutdate`, `status`, `room_id`, `U_id`, `cat_id`) VALUES
(6, 'Ram', '6752781281', '2022-03-30', '2022-03-31', 2, 9, 39, 3),
(11, 'Rohil', '0987654321', '2022-03-31', '2022-04-01', 2, 7, 39, 2),
(92, 'Nhujan ', '9818574266', '2022-06-02', '2022-06-05', 2, 15, 39, 8),
(104, 'Nhujan Maharjan', '9818574266', '2022-06-05', '2022-06-05', 3, 7, 39, 2),
(105, 'Nhujan Maharjan', '9818574266', '2022-06-05', '2022-06-07', 3, 21, 39, 1),
(106, 'Nhujan Maharjan', '9818574266', '2022-06-05', '2022-06-07', 3, 22, 39, 1),
(107, 'Nhujan ', '9818574266', '2022-06-05', '2022-06-07', 3, 22, 39, 1),
(108, 'Nhujan Maharjan', '9818574266', '2022-06-05', '2022-06-07', 2, 16, 39, 7),
(109, 'Nhujan Maharjan', '9818574266', '2022-06-08', '2022-06-10', 3, 8, 39, 2),
(110, 'Nhujan Maharjan', '9818574266', '2022-06-08', '2022-06-11', 3, 9, 39, 3),
(111, 'Nhujan Maharjan', '9818574266', '2022-06-16', '2022-06-18', 2, 21, NULL, 1),
(112, 'Nhujan Maharjan', '9818574266', '2022-06-16', '2022-06-18', 3, 7, 39, 2),
(113, 'Nhujan Maharjan', '9818574266', '2022-06-19', '2022-06-20', 0, 13, 39, 8),
(114, 'Nhujan Maharjan', '9818574266', '2022-06-16', '2022-06-19', 0, 22, 39, 1),
(115, 'Nhujan Maharjan', '9818574266', '2022-06-16', '2022-06-17', 0, 8, 39, 2),
(116, 'Nhujan Maharjan', '9818574267', '2022-06-16', '2022-06-17', 3, 9, 39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(5) NOT NULL,
  `room_num` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0=pending,1=checkin,2=checkout',
  `cat_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_num`, `image`, `Status`, `cat_id`) VALUES
(7, 'Room-401', 'zimage/Deluxe401.jpg', 2, 2),
(8, 'Room-402', 'zimage/Deluxe402.jpg', 0, 2),
(9, 'Room-301', 'zimage/family-room.jpg', 2, 3),
(10, 'Room-302', 'zimage/familyroom302.jpg', 2, 3),
(11, 'Room-303', 'zimage/familyroom303.jpg', 2, 3),
(12, 'Room-201', 'zimage/doubleroom.jpg', 2, 8),
(13, 'Room-202', 'zimage/doubleroom202.jpg', 0, 8),
(14, 'Room-203', 'zimage/doubleroom203.jpg', 2, 8),
(15, 'Room-204', 'zimage/doubleroom204.jpg', 2, 8),
(16, 'Room-101', 'zimage/single.jpg', 2, 7),
(17, 'Room-102', 'zimage/singleroom102.jpg', 2, 7),
(18, 'Room-103', 'zimage/singleroom103.jpg', 2, 7),
(21, 'Room-502', 'zimage/exclusive502.jpg', 2, 1),
(22, 'Room-501', 'zimage/suite.jpeg', 0, 1),
(25, 'Room-104', 'zimage/singleroom104.jpg', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `cat_id` int(5) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `beds` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`cat_id`, `catagory_name`, `price`, `beds`, `image`) VALUES
(1, 'Exclusive Suite', 6000, 'Double Bed', 'zimage/suite.jpeg'),
(2, 'Deluxe Room', 5000, 'Double Bed', 'zimage/Deluxe402.jpg'),
(3, 'Family Room', 3000, '1 Double Bed 2 Single bed', 'zimage/family-room.jpg'),
(7, 'Single Bedroom', 500, '1 Single Bed ', 'zimage/single.jpg'),
(8, 'Double Bedroom', 1000, '1 Double Bed ', 'zimage/doubleroom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `U_id` int(3) NOT NULL,
  `Full_name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`U_id`, `Full_name`, `Email`, `Password`) VALUES
(39, 'nhujan maharjan', 'mnhujan@gmail.com', '$2y$10$T2R6Bpo0d2TmH.gO5/OtMOVo60VpNL7HPxGawEXxxwL6e1/qNeu46'),
(42, 'nhujan', 'nhum@gmail', '$2y$10$RTNV7PJ7eeIcJp2T2sUGT.xcCwWD3tTRt.6VRAtYimMbIHwnYFN5a'),
(44, 'friend', 'friend', '$2y$10$D9.dr9I1upk2fitg3ZpcFu15QicD.ZJAt52Kj3aOQN0Zcz.F.nCkW'),
(45, 'rohil', 'rohil@gmail.com', '$2y$10$YLoBQagxK4wqWq0UIKwudeuGOuuI5GCfPuH.os9ETcjpW7UrMILi2'),
(47, 'rohil', 'rohilprajapati@gmail.com', '$2y$10$.4zXyouQQZyJ5R9cyd86Y.o3C2zStRsxi9U/GfIJKkah5cbK9WYQm'),
(48, 'Ritush Prajapati', 'ritushrex@gmail.com', '$2y$10$h.scnh6fISqO3WFaz4JL/.zceUuVGWd2B0J1G8XYuVrVfFep8pWdG'),
(49, 'Sailendra Shrestha', 'sailendrashrestha74@gmail.com', '$2y$10$6rvAmqQIBxIkaUgYUBbyTO61n3NbSMfmhCg/.ZeuaurNG51e3ISW2'),
(50, 'Sushil Khadka', 'sushilk.calcgen@gmail.com', '$2y$10$mWzetiUrlp7tpImOdGFGcuVpD9CNLaoCyRF7DJ3afGxlkvKllKOqC'),
(85, 'rohil', 'rohilpraja@gmail.com', '$2y$10$hyC54.khmAh0yTHAmLF5Se6WhyO8gntWTadbdiKJV2hD8fILSO5KC'),
(86, 'Reetush ', 'Reetush@gmail.com', '$2y$10$AyHuSjDAsn8SPa5gQEDSROJQex4pV4Xn6hecGzuSlAyGZtKoq9KAW'),
(87, 'Binita Dangol', 'binita@gmail.com', '$2y$10$KmWL0Wq0JR/hmqu8q1tU.e4FVRvoblUHogbH3IuEhEN7cjnyjXPHe'),
(88, 'nhujanmaharjan', 'nhujanmaharjan@gmail.com', '$2y$10$3FlW16Vclibof5aFJrdNmu1Oe7qYEJ7/UT1s6OJB6g38rcUooh/Ze');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `U_id` (`U_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`U_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rev_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `U_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`U_id`) REFERENCES `signup` (`U_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `room_category` (`cat_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `room_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
