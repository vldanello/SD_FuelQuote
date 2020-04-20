-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2020 at 06:03 PM
-- Server version: 5.7.29
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework_fuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

CREATE TABLE `client_information` (
  `fullName` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(9) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_information`
--

INSERT INTO `client_information` (`fullName`, `address1`, `address2`, `city`, `state`, `zip`, `client_id`, `login_id`) VALUES
('Lucia Danello', '1918 Key Dr', '', 'Katy', 'TX', '77450', 8, 39),
('Darina Gabuardy', '1911 Shenandoah St., Apt 6', '', 'Los Angeles', 'CA', '90504', 9, 40);

-- --------------------------------------------------------

--
-- Table structure for table `fuelQuote`
--

CREATE TABLE `fuelQuote` (
  `fuel_id` int(11) NOT NULL,
  `gallonsRequested` int(11) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(9) NOT NULL,
  `state` varchar(2) NOT NULL,
  `suggestedPrice` decimal(11,2) NOT NULL,
  `totalAmountDue` float(11,2) NOT NULL,
  `deliveryDate` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuelQuote`
--

INSERT INTO `fuelQuote` (`fuel_id`, `gallonsRequested`, `address1`, `city`, `zip`, `state`, `suggestedPrice`, `totalAmountDue`, `deliveryDate`, `client_id`, `login_id`) VALUES
(17, 33, '1918 Key Dr', 'Katy', '77450', 'TX', 1.55, 50.98, '2020-04-24', 3, 39),
(18, 90000, '1918 Key Dr', 'Katy', '77450', 'TX', 1.53, 137700.00, '2020-04-01', 3, 39),
(19, 123, '1911 Shenandoah St., Apt 6', 'Los Angeles', '90504', 'CA', 1.55, 190.03, '2020-04-30', 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abbr` varchar(3) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state`, `abbr`) VALUES
('Alabama', 'AL'),
('Alaska', 'AK'),
('American Samoa', 'AS'),
('Arizona', 'AZ'),
('Arkansas', 'AR'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('Delaware', 'DE'),
('District Of Columbia', 'DC'),
('Federated States Of Micronesia', 'FM'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Guam', 'GU'),
('Hawaii', 'HI'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Iowa', 'IA'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Maine', 'ME'),
('Marshall Islands', 'MH'),
('Maryland', 'MD'),
('Massachusetts', 'MA'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Mississippi', 'MS'),
('Missouri', 'MO'),
('Montana', 'MT'),
('Nebraska', 'NE'),
('Nevada', 'NV'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('New York', 'NY'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Northern Mariana Islands', 'MP'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Palau', 'PW'),
('Pennsylvania', 'PA'),
('Puerto Rico', 'PR'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Vermont', 'VT'),
('Virgin Islands', 'VI'),
('Virginia', 'VA'),
('Washington', 'WA'),
('West Virginia', 'WV'),
('Wisconsin', 'WI'),
('Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login_id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login_id`, `userName`, `password`) VALUES
(39, 'nika99', 'nika99'),
(40, '111111', '111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_information`
--
ALTER TABLE `client_information`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_information`
--
ALTER TABLE `client_information`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fuelQuote`
--
ALTER TABLE `fuelQuote`
  MODIFY `fuel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
