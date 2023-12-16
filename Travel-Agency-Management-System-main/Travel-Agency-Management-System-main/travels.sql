-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 05:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `accomodations` ()  NO SQL
BEGIN
SELECT * FROM accommodation	;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `destinations` ()  BEGIN
SELECT * FROM `destination`	;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `transportations` ()  NO SQL
BEGIN
SELECT * FROM `transport`	;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `hotel_id` varchar(10) NOT NULL,
  `hotel_name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`hotel_id`, `hotel_name`, `city`, `type`) VALUES
('ahm1', 'ahm_a', 'Ahmedabad', '4-Star'),
('ahm2', 'ahm_b', 'Ahmedabad', '5-Star'),
('ahm3', 'ahm_c', 'Ahmedabad', '7-Star'),
('ban1', 'ban_a', 'Bangalore', '4-Star'),
('ban2', 'ban_b', 'Bangalore', '5-Star'),
('ban3', 'ban_c', 'Bangalore', '7-Star'),
('che1', 'che_a', 'Chennai', '4-Star'),
('che2', 'che_b', 'Chennai', '5-Star'),
('che3', 'che_c', 'Chennai', '7-Star'),
('del1', 'del_a', 'Delhi', '4-Star'),
('del2', 'del_b', 'Delhi', '5-Star'),
('del3', 'del_c', 'Delhi', '7-Star'),
('hyd1', 'hyd_a', 'Hyderabad', '4-Star'),
('hyd2', 'hyd_b', 'Hyderabad', '5-Star'),
('hyd3', 'hyd_c', 'Hyderabad', '7-Star'),
('jai1', 'jai_a', 'Jaipur', '4-Star'),
('jai2', 'jai_b', 'Jaipur', '5-Star'),
('jai3', 'jai_c', 'Jaipur', '7-Star'),
('kol1', 'kol_a', 'Kolkata', '4-Star'),
('kol2', 'kol_b', 'Kolkata', '5-Star'),
('kol3', 'kol_c', 'Kolkata', '7-Star'),
('mum1', 'mum_a', 'Mumbai', '4-Star'),
('mum2', 'mum_b', 'Mumbai', '5-Star'),
('mum3', 'mum_c', 'Mumbai', '7-Star');

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `id` int(10) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`id`, `email_id`, `created_on`) VALUES
(4, 'mdameen@gmail.com', '2022-01-27 18:27:18'),
(5, 'ameenmohammed@gmail.com', '2022-01-27 18:28:47'),
(7, 'devadigarani@gmail.com', '2022-01-28 11:44:04'),
(8, 'abcde@gmail.com', '2022-01-28 12:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `package_id` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `no_of_tickets` int(10) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `email_id`, `package_id`, `price`, `no_of_tickets`, `total_price`) VALUES
(8, 'itsameen27@gmail.com', 'ban-ahm1', 3800, 1, 3800),
(9, 'itsameen27@gmail.com', 'ban-del1', 4500, 5, 22500),
(10, 'itsameen27@gmail.com', 'ahm-ban1', 3800, 1, 3800),
(12, 'devadigarani@gmail.com', 'ban-hyd1', 1800, 2, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `city` varchar(20) NOT NULL,
  `available` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`city`, `available`) VALUES
('Ahmedabad', 'yes'),
('Bangalore', 'yes'),
('Chennai', 'yes'),
('Delhi', 'yes'),
('Hyderabad', 'yes'),
('Jaipur', 'yes'),
('Kolkata', 'yes'),
('Mumbai', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` varchar(10) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `acc_req` varchar(5) NOT NULL,
  `hotel_id` varchar(10) NOT NULL,
  `tr_id` varchar(10) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `source`, `destination`, `acc_req`, `hotel_id`, `tr_id`, `price`) VALUES
('ahm-ban1', 'Ahmedabad', 'Bangalore', 'yes', 'ahm1', 'bus1', 3800),
('ahm-che1', 'Ahmedabad', 'Chennai', 'yes', 'che3', 'train1', 3500),
('ahm-del1', 'Ahmedabad', 'Delhi', 'yes', 'del3', 'bus1', 3000),
('ahm-hyd1', 'Ahmedabad', 'Hyderabad', 'yes', 'hyd3', 'bus4', 1650),
('ahm-jai1', 'Ahmedabad', 'Jaipur', 'yes', 'jai2', 'bus1', 2500),
('ahm-kol1', 'Ahmedabad', 'Kolkata', 'yes', 'kol3', 'train2', 4000),
('ahm-mum1', 'Ahmedabad', 'Mumbai', 'yes', 'mum3', 'bus4', 2900),
('ban-1', 'Bangalore', 'Chennai', 'yes', 'che1', 'bus4', 1400),
('ban-ahm1', 'Bangalore', 'Ahmedabad', 'yes', 'ahm1', 'bus1', 3800),
('ban-del1', 'Bangalore', 'Delhi', 'yes', 'del3', 'train1', 4500),
('ban-hyd1', 'Bangalore', 'Hyderabad', 'yes', 'hyd3', 'bus2', 1800),
('ban-jai1', 'Bangalore', 'Jaipur', 'yes', 'jai3', 'bus1', 3200),
('ban-kol1', 'Bangalore', 'Kolkata', 'yes', 'kol2', 'bus1', 3750),
('ban-mum1', 'Bangalore', 'Mumbai', 'yes', 'mum3', 'train4', 2250);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `email_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phno` bigint(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`email_id`, `name`, `phno`, `address`, `password`) VALUES
('abcde@gmail.com', 'ameen', 9874523622, 'kndolSZIKndvolndvglkmdvbg', '123@ABC'),
('ameenmohammed@gmail.com', 'VR', 9876543210, 'Delhi', 'login'),
('devadigarani@gmail.com', 'abc', 9874561230, 'Bangalore', '12345'),
('itsameen27@gmail.com', 'Ameen', 9880540142, 'Bangalore', '123456'),
('mdameen@gmail.com', 'Mohammed Ameen', 9880540142, 'Blore', 'login');

--
-- Triggers `registration`
--
DELIMITER $$
CREATE TRIGGER `created` AFTER INSERT ON `registration` FOR EACH ROW INSERT INTO active_users VALUES (null,NEW.email_id,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `tr_id` varchar(10) NOT NULL,
  `vehicle` varchar(10) NOT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`tr_id`, `vehicle`, `class`) VALUES
('air1', 'Airplane', 'Sleeper-AC'),
('bus1', 'Bus', 'Sleeper-AC'),
('bus2', 'Bus', 'Non-Sleeper-AC'),
('bus3', 'Bus', 'Sleeper'),
('bus4', 'Bus', 'Non-AC'),
('train1', 'Train', 'Sleeper-AC'),
('train2', 'Train', 'Non-Sleeper-AC'),
('train3', 'Train', 'Sleeper'),
('train4', 'Train', 'Non-AC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `email_id` (`email_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`city`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `source` (`source`),
  ADD KEY `destination` (`destination`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `tr_id` (`tr_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `registration` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`source`) REFERENCES `destination` (`city`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`destination`) REFERENCES `destination` (`city`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_3` FOREIGN KEY (`hotel_id`) REFERENCES `accommodation` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_4` FOREIGN KEY (`tr_id`) REFERENCES `transport` (`tr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
