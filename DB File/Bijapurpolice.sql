-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 04:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
  `statement` varchar(200) NOT NULL,
  `caseid` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `staffid` varchar(30) NOT NULL,
  `case_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cid` varchar(20) NOT NULL DEFAULT 'Not Yet',
  `complete_date` date NOT NULL,
  `diary_of_action` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_table`
--

INSERT INTO `case_table` (`case_id`, `statement`, `caseid`, `date_added`, `staffid`, `case_type`, `status`, `cid`, `complete_date`, `diary_of_action`) VALUES
('210707101', '<p>The Victim had gone for a morning walk and was supposed to return by 7:30 am , not finding him at home after waiting till 9:am the victim"s father recives a call regarding a dead body found', 56, '2022-07-07 10:56:23', '110', 'Murder Case', 'Completed', '110','2023-10-10','Case has been Solved and Closed'),
('210707102', '<p>The suspect identified as Nanya Elizabeth, a 42-year-old, female teacher, lured the male victim to her room at the staff quarters. While in the room, she caused the victim to remove his clothes </p>\r\n', 57, '2022-07-23 09:20:49', '112', 'Defilement', 'Not Completed', '112','not completed','Case has yet not been Solved but we are very close to catch the culprit'),
('210713103', '<p>victim has lost her Two-wheeler vehicle near ittagi petrol pump </p>\r\n', 58, '2022-04-30 09:27:48', '115','Theft Case', 'Completed', '115','2022-12-20','Case has been Solved and Closed'),
('210728101', '<p>The client Hrithik kapoor was with two friends at another friend’s house. Everyone was drinking heavily. An altercation broke out around the pool during which one of the client’s friends was bashed and left to drown  </p>\r\n', 59, '2022-03-28 13:12:57', '111', 'Murder Case','Completed', '111','2022-08-21','Case has been Solved and Closed'),
('210728102', '<p>The special investigation team conducting a further probe in the assault case on Tuesday recorded the statement of osama bin latin at the Aluva police club. </p>\r\n', 60, '2022-01-10 13:14:41', '116', 'Assault Case', 'Not Completed', '116','','Case has yet not been Solved but we are very close to catch the culprit');


-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `case_id` varchar(20) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `addrs` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `complaint` (`case_id`, `comp_name`, `tel`, `occupation`, `region`, `district`, `loc`, `addrs`, `age`, `gender`, `date_added`) VALUES
('210707101', 'Ramesh Arakeri', '234567', 'Dancer', 'Mysore Region', 'Haveri District', 'near govt school', 'Poshery Nagar,Mysore', 22, 'Male', '2022-07-07 10:56:23'),
('210707102', 'Vivek Shetty', '345678', 'Engineer', 'Banglore Region', 'South Municipal', 'Theatre backside', 'Hse No. 30, urban Banglore', 33, 'Male', '2022-07-23 09:20:49'),
('210713103', 'usmia shaikh', '567890', 'Teacher', 'Udpi Region', 'konkan North','backwaters', 'Gokul Colony, Udpi', 45, 'Female', '2022-04-30 09:27:48'),
('210728101', 'Hrithik kapoor', '0509797', 'Actor', 'Gadag', 'Old School Region', 'Mall road', 'Hse No. 40/G, Gadad', 55, 'Male', '2022-03-28 13:12:57'),
('210728102', 'osman bin latin', '0597797', 'Doctor', 'Indi', 'Indi District', 'station road', 'Hse No. 60/G, Indi', 89, 'Male', '2022-01-10 13:14:41');

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
(7, 'Fraud'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `case_id` varchar(20) NOT NULL,
  `investigator` varchar(20) NOT NULL,
  `statement2` text NOT NULL,
  `assigned_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status2` varchar(100) NOT NULL,
  `completed_date` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`case_id`, `investigator`, `statement2`, `assigned_date`, `status2`, `completed_date`, `id`) VALUES
('210707101', '005', '<p>the investigation has led to arrest of suspects! the actual culprit is found</p>\r\n', '2021-07-07 11:03:58', 'completed', '2023-10-10', 55),
('210707102', '006', '<p> the investigation is at hold since there is shortage of evidence and unclear facts','2022-07-23 09:20:49','Not Completed','',56);
-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othernames` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `staffid`, `status`, `password`, `surname`, `othernames`) VALUES
(0, '110', 'CID', '3c2bda6c9791e85f0b5ea4347082ebe68a1e9a04', 'MD Kaif ', 'Shaikh'),/*shaikh123*/
(0, '101','Admin','abab93c9f7ca05823e28d626115b8df017bb6029','Harsh','Agarwal'),/*agarwal123*/
(0, '100', 'Admin','f939b7d7987c3c5124a9a5d796fc01fc0f952b47', 'Darsh', 'Jain'),/*djain123*/
(0, '113', 'NCO', '2d4f146807cb69cf5ea09357aa9e2c68dc468b96', 'Akshat', 'Jain'),/*ajay123*/
(0, '114', 'NCO', '44b6197957aa5465c60e7c7db043e546c341ccdb', 'Aman', 'Usmani'),/*usmani123*/
(0, '115', 'CID', 'fa765795ac7d2c16547e9df4b233d46803b117bc', 'Girish', 'Sukali'),/*sukali123*/
(0, '116', 'CID', '24aaac9c21ab0a29ed5fae0fcaab75c6a1ec0495', 'Abusufiyan', 'Attar'),/*attar123*/
(0, '117', 'NCO', '45d83f57a5fd78f32fbaef4980c03f65b8dd2406', 'Musaveer', 'Bijapur');/*bijapur123*/


--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_table`
--
ALTER TABLE `case_table`
  ADD PRIMARY KEY (`caseid`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `crime_type`
--
ALTER TABLE `crime_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_table`
--
ALTER TABLE `case_table`
  MODIFY `caseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `crime_type`
--
ALTER TABLE `crime_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
