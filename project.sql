-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 10:01 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminreg`
--

CREATE TABLE `adminreg` (
  `SL` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `NID` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminreg`
--

INSERT INTO `adminreg` (`SL`, `Name`, `Mobile`, `Email`, `NID`, `Address`, `Password`) VALUES
(1, 'Abcd', '112233', 'abdfda@gmail.com', '159895875895', 'Khilkhet', 'abcd'),
(2, 'Bbcd', '112244', 'bbdfda@gmail.com', '259895875895', 'Badda', 'bbcd'),
(3, 'Cbcd', '112255', 'cbdfda@gmail.com', '359895875895', 'Uttara', 'cbcd'),
(4, 'Dbcd', '112266', 'dbdfda@gmail.com', '459895875895', 'UIU', 'dbcd'),
(5, 'Ebcd', '112277', 'ebdfda@gmail.com', '559895875895', 'Notun Bazar', 'ebcd'),
(6, 'abcd', '0011', 'vsdfger@fseg', '783827392', '', 'alynpHPf6htB6');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `SL` int(11) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Picture` varchar(100) DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `Generated_User_ID` varchar(20) DEFAULT NULL,
  `Join_Date` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`SL`, `First_name`, `Last_name`, `Mobile`, `Email`, `Gender`, `Address`, `Picture`, `Password`, `Generated_User_ID`, `Join_Date`) VALUES
(1, 'New', 'Update', '09876', 'new@gmail.com', 'Male', 'New Uttara', 'images/image1.jpg', 'abcd', 'akhan0', NULL),
(9, 'def', 'rahman', '3456', 'def@gmail.com', 'Female', 'Badda', 'images/image3.jpg', 'def', 'drahman0', NULL),
(10, 'jklk', 'man', '7890', 'jkl@gmail.com', 'Male', 'Notun Bazar', 'images/image4.jpg', 'jkl', 'jman0', NULL),
(38, 'Upload', 'Image', '1111', 'evefr@vfeder', 'Male', 'fserwer', 'images/B612_20190615_204414_109-01-01-01.jpeg', 'alkCVffAyYNv2', 'Upload_Image', NULL),
(37, 'Image', 'Upload', '01776', 'image@gmail.com', 'Female', 'Village', 'Project Flowchart - Page 1.png', 'alVYg5QQCAwZ6', 'Image_Upload', NULL),
(36, 'Newly', 'Update', '234', 'updated@gwergr', 'Male', 'New Uttara', '', 'aljZCaRNK30k2', 'Newly_Update', NULL),
(25, 'Ejhbfa', 'ssadfan', '3232', 'hvkcd@gmail.com', 'Male', 'Uttara', 'images/image7.jpg', '1332', 'Essadfan0', NULL),
(26, 'Djhbfa', 'caasdfan', '34115', 'ydjacd@gmail.com', 'Male', 'Uttara', 'images/image8.jpg', '1234', 'Dcaasdfan0', NULL),
(27, 'Cjhbfa', 'cakasdfan', '191114', 'rsugacd@gmail.com', 'Male', 'Uttara', 'images/image9.jpg', '1234', 'Ccakasdfan0', NULL),
(31, 'gfkfdh', 'ferfer', '12345', 'vdgr@gghh', 'Male', 'bdfgd', 'image3.jpg', '12345', 'gfkfdh_ferfer', NULL),
(33, 'AL', 'Emran', '181274', 'emran@gmail.com', 'Male', 'Kalkini', 'image6.jpg', 'alBuqu3KOtoe.', 'AL_Emran', NULL),
(42, 'Aysha', 'Drishty', '112244', 'vsef@ferg', 'Female', 'rgwerge', 'images/aysha.jpg', 'alRaR9undQ5GY', 'Aysha_Drishty', NULL),
(48, 'B', 'b', '34', 'bfg@rgeg', 'Female', 'afrf', 'images/34image01.jpg', 'alAlpCEdkh1Vg', 'B_b', NULL),
(47, 'A', 'a', '12', 'sfvr@faerg', 'Male', 'faerf', 'images/image01.jpg', 'aluSMRsDB7Taw', 'A_a', NULL),
(49, 'AA', 'aa', '1212', 'dfear@faerf', 'Male', 'efarf', 'images/TestCase105.PNG', 'alj7boRCXCNG2', 'AA_aa', '2020-06-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreg`
--
ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`SL`),
  ADD UNIQUE KEY `Mobile` (`Mobile`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`SL`),
  ADD UNIQUE KEY `Mobile` (`Mobile`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `uq` (`Picture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminreg`
--
ALTER TABLE `adminreg`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
