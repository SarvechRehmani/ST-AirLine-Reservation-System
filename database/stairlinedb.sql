-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 03:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stairlinedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addflighttbl`
--

CREATE TABLE `addflighttbl` (
  `flight_id` int(11) NOT NULL,
  `departureDate` datetime NOT NULL,
  `arrivalDate` datetime NOT NULL,
  `Origin` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `seats` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `airlineName` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addflighttbl`
--

INSERT INTO `addflighttbl` (`flight_id`, `departureDate`, `arrivalDate`, `Origin`, `Destination`, `seats`, `Price`, `airlineName`, `status`) VALUES
(1, '2023-04-25 20:00:00', '2023-04-25 21:00:00', 'Karachi', 'Lahore', 50, 100, 'PIA', 'Departed'),
(2, '2023-04-26 14:00:00', '2023-04-26 15:00:00', 'Lahore', 'Karachi', 60, 500, 'Air blue limited', 'Departed'),
(3, '2023-04-26 15:00:00', '2023-04-26 19:00:00', 'Quetta', 'Sukkur', 60, 500, 'Air blue limited', '');

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(50) NOT NULL,
  `admin_email` varchar(55) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`admin_id`, `admin_uname`, `admin_email`, `admin_pass`) VALUES
(1, 'Saroo', 'saroo@gmail.com', 'saroo');

-- --------------------------------------------------------

--
-- Table structure for table `airlinetbl`
--

CREATE TABLE `airlinetbl` (
  `id` int(11) NOT NULL,
  `AirlineName` varchar(30) NOT NULL,
  `Seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airlinetbl`
--

INSERT INTO `airlinetbl` (`id`, `AirlineName`, `Seats`) VALUES
(1, 'PIA', 50),
(3, 'Air blue limited', 60),
(4, 'Airsial limited', 100),
(7, 'Sialkot Airport', 100);

-- --------------------------------------------------------

--
-- Table structure for table `citytbl`
--

CREATE TABLE `citytbl` (
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citytbl`
--

INSERT INTO `citytbl` (`City`) VALUES
('Badin'),
('Faisalabad'),
('Gujranwala'),
('Gujrat'),
('Hyderabad'),
('Islamabad'),
('Jacobabad'),
('Karachi'),
('Lahore'),
('Multan'),
('Peshawar'),
('Quetta'),
('Rawalpindi'),
('Sialkot'),
('Sukkur');

-- --------------------------------------------------------

--
-- Table structure for table `contacttbl`
--

CREATE TABLE `contacttbl` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacttbl`
--

INSERT INTO `contacttbl` (`id`, `Name`, `Email`, `Message`) VALUES
(1, 'Saroo', 'saroo@gmail.com', 'Hello. ST Awesome Airline is great website to book any flight all over the world.'),
(2, 'Sarwech Rehmani', 'sarwech99@gmail.com', 'is any flight available for Karachi to London.');

-- --------------------------------------------------------

--
-- Table structure for table `passangertbl`
--

CREATE TABLE `passangertbl` (
  `passanger_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` datetime NOT NULL,
  `fname` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `airlineName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passangertbl`
--

INSERT INTO `passangertbl` (`passanger_id`, `u_id`, `flight_id`, `phone`, `dob`, `fname`, `lname`, `price`, `airlineName`) VALUES
(1, 3, 1, '03133599267', '2023-04-12 00:00:00', 'sarvech', 'rehmani', 250, 'PIA'),
(2, 3, 1, '03123131533', '2023-04-11 00:00:00', 'tayaba', 'tabsum', 250, 'PIA'),
(3, 6, 3, '03123131533', '2023-03-21 00:00:00', 'Tayaba', 'Tabasum', 650, 'Air blue limited'),
(4, 6, 3, '03133599267', '2021-10-27 00:00:00', 'Sarwech', 'Rehmani', 650, 'Air blue limited'),
(5, 9, 3, '03123131533', '2023-05-15 00:00:00', 'inayet', 'samoo', 500, 'Air blue limited'),
(6, 2, 3, '03123131533', '2023-05-05 00:00:00', 'Sarwech', 'Rehmani', 500, 'Air blue limited'),
(7, 2, 3, '03123131533', '2023-05-18 00:00:00', 'unaib', 'khan', 500, 'Air blue limited'),
(8, 2, 3, '03123131533', '2023-05-25 00:00:00', 'hammad', 'memon', 500, 'Air blue limited'),
(9, 2, 3, '03123131533', '2023-06-07 00:00:00', 'usman', 'ghori', 500, 'Air blue limited');

-- --------------------------------------------------------

--
-- Table structure for table `paymentcardtbl`
--

CREATE TABLE `paymentcardtbl` (
  `card_id` int(11) NOT NULL,
  `Card_no` varchar(16) NOT NULL,
  `expiry` varchar(5) NOT NULL,
  `amount` int(11) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentcardtbl`
--

INSERT INTO `paymentcardtbl` (`card_id`, `Card_no`, `expiry`, `amount`, `cvv`) VALUES
(1, '1234567812345678', '1223', 45700, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tickettbl`
--

CREATE TABLE `tickettbl` (
  `ticketId` int(11) NOT NULL,
  `Passanger_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `seat_no` varchar(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `u_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`u_id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Sarwech Rehmani', 'sarwech99@gmail.com', 'sarvech', 'saroo123'),
(2, 'salar', 'salar@gmail.com', 'salar', 'salar'),
(3, 'Sarwech', 'saroo@gmail.com', 'saroo', 'saroo'),
(4, 'Rehmani', 'rehmani@gmail.com', 'rehmani', 'rehmani'),
(5, 'Sarvech', 'sar@gmail.com', 'sar', 'sar123'),
(6, 'tayaba', 'tayaba@gmail.com', 'tayaba', 'tayaba'),
(7, 'king', 'king@gmail.com', 'king', 'king1'),
(8, 'feroz', 'feroz@gmail.com', 'feroz', 'feroz'),
(9, 'inayet', 'inayet@gmail.com', 'inayet', 'inayet'),
(10, 'qaw', 'a@aol.com', 'ameran', 'soldier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addflighttbl`
--
ALTER TABLE `addflighttbl`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_uname` (`admin_uname`);

--
-- Indexes for table `airlinetbl`
--
ALTER TABLE `airlinetbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AirlineName` (`AirlineName`);

--
-- Indexes for table `citytbl`
--
ALTER TABLE `citytbl`
  ADD UNIQUE KEY `City` (`City`);

--
-- Indexes for table `contacttbl`
--
ALTER TABLE `contacttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passangertbl`
--
ALTER TABLE `passangertbl`
  ADD PRIMARY KEY (`passanger_id`);

--
-- Indexes for table `paymentcardtbl`
--
ALTER TABLE `paymentcardtbl`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `tickettbl`
--
ALTER TABLE `tickettbl`
  ADD PRIMARY KEY (`ticketId`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addflighttbl`
--
ALTER TABLE `addflighttbl`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `airlinetbl`
--
ALTER TABLE `airlinetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacttbl`
--
ALTER TABLE `contacttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passangertbl`
--
ALTER TABLE `passangertbl`
  MODIFY `passanger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paymentcardtbl`
--
ALTER TABLE `paymentcardtbl`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickettbl`
--
ALTER TABLE `tickettbl`
  MODIFY `ticketId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
