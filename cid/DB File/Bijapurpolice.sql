-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 04:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghpolice`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_table`
--

CREATE TABLE `case_table` (
  `case_id` varchar(20) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `addrs` varchar(100) NOT NULL,
  `digaddrs` varchar(50) NOT NULL,
  `case_type` varchar(50) NOT NULL,
  `nid_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_table`
--

INSERT INTO `case_table` (`case_id`, `comp_name`, `tel`, `nid`, `region`, `district`, `loc`, `addrs`, `digaddrs`, `case_type`, `nid_type`) VALUES
('210707102', 'Vivek Shetty', '345678', '56uuiu66', 'Banglore Region', 'South Municipal', 'Theatre backside', 'Hse No. 30, urban Banglore', '857575647', '5', 'Voters ID'),
('210707101', 'Ramesh Arakeri', '234567','54fuit66', 'Mysore Region', 'Haveri District', 'near govt school', 'Poshery Nagar,Mysore','445352423', '2', 'Adhar Card'),
('210713103', 'usmia shaikh', '567890', '45fgde56', 'Udpi Region', 'konkan North','backwaters', 'Gokul Colony, Udpi','452389780', '4', 'Passport'),
('210728101', 'Hrithik kapoor', '0509797', 'fgh567df', 'Gadag', 'Old School Region', 'Mall road', 'Hse No. 40/G, Gadad','345612675', '2', 'Ration card'),
('210728102', 'osman bin latin', '0597797', 'fgt56fj', 'Indi', 'Indi District', 'station road', 'Hse No. 60/G, Indi','67543231', '3', 'Adhar Card');
-- --------------------------------------------------------

--
-- Table structure for table `crime_type`
--

CREATE TABLE `crime_type` (
  `id` int(11) NOT NULL,
  `des` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime_type`
--

INSERT INTO `crime_type` (`id`, `des`) VALUES
(1, 'Domestic Violence'),
(2, 'Murder Case'),
(3, 'Assault'),
(4, 'Theft Case'),
(5, 'Defilement'),
(6, 'Robbing'),
(7, 'Fraud');

-- --------------------------------------------------------

--
-- Table structure for table `diary_action`
--

CREATE TABLE `diary_action` (
  `case_id` varchar(20) NOT NULL,
  `statement` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary_action`
--

INSERT INTO `diary_action` (`case_id`, `statement`, `id`, `time`) VALUES
('210707102', 'Case has yet not been Solved but we are very close to catch the culprit, the suspect Nanya Elizabeth is taken into custody', 5, '2021-06-03 14:48:12'),
('210707101', 'Case has been Solved and Closed i.e criminal is arrested for Murder', 2, '2021-06-03 14:48:12'),
('210713103', 'Case has been Solved and Closed i.e the robbed vehicle is found and returned to the owner ', 4, '2021-06-03 14:48:12'),
('210728101', 'Case has been Solved and Closed, the murderers of actor Hrithik kapoor have been arrested and sentenced for 10 Years of No Bail Jail', 2, '2021-06-03 14:48:12'),
('210728102', 'Case has yet not been Solved but we are very close to catch the culprit', 3, '2021-06-03 14:48:12'),
--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_table`
--
ALTER TABLE `case_table`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `crime_type`
--
ALTER TABLE `crime_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diary_action`
--
ALTER TABLE `diary_action`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crime_type`
--
ALTER TABLE `crime_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diary_action`
--
ALTER TABLE `diary_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
