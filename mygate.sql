-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 07:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygate1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `campus`, `email`) VALUES
(1, 'BBSR', 'chinmayakumarbiswal45@gmail.com'),
(2, 'BBSR', 'situ@chinmayakumarbiswal.in'),
(3, 'Vizianagaram', 'situchinmaya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`) VALUES
(1, 'Paralakhemundi'),
(2, 'BBSR'),
(3, 'Balangir'),
(4, 'Rayagada'),
(5, 'Balasore'),
(6, 'Chatrapur'),
(7, 'Vizianagaram');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `empId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empId`, `name`, `email`, `dept`, `campus`, `image`) VALUES
(1, 'emp01', 'echinmaya', 'chinmayakumarbiswal45@gmail.com', 'demo1', 'BBSR', 'images.png'),
(3, 'emp03', 'esitu', 'situ@chinmayakumarbiswal.in', 'Cloud Admin', 'BBSR', 'images.png'),
(4, 'emp04', 'eChinmaya', 'chinmayakumarbiswal16045@gmail.com', 'IT Admin', 'BBSR', 'images.png'),
(9, 'emp07', 'Situ', 'situchinmaya@gmail.com', 'IT Admin', 'BBSR', 'images.png'),
(10, 'emp04', 'Chinmaya', 'chinmayakumarbiswal16045@gmail.com', 'IT Admin', 'BBSR', 'images.png');

-- --------------------------------------------------------

--
-- Table structure for table `entryrigister`
--

CREATE TABLE `entryrigister` (
  `id` int(11) NOT NULL,
  `empId` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `inTime` varchar(255) NOT NULL,
  `outTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entryrigister`
--

INSERT INTO `entryrigister` (`id`, `empId`, `date`, `inTime`, `outTime`) VALUES
(2, 'emp01', '2023-02-02', '12:07', '12:43'),
(5, 'emp01', '2023-02-03', '10:00', '10:01'),
(7, 'emp01', '2023-02-03', '10:07', '10:08'),
(8, 'emp01', '2023-02-03', '10:08', '10:08'),
(9, 'emp02', '2023-02-03', '10:09', '10:09'),
(10, 'emp01', '2023-02-03', '10:09', '10:10'),
(11, 'emp02', '2023-02-03', '10:42', '10:42'),
(12, 'emp02', '2023-02-03', '10:42', '10:45'),
(13, 'emp02', '2023-02-03', '10:45', '10:48'),
(14, 'emp01', '2023-02-03', '03:00', '03:01'),
(15, 'emp01', '2023-02-03', '03:01', '03:01');

-- --------------------------------------------------------

--
-- Table structure for table `gate`
--

CREATE TABLE `gate` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `gate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gate`
--

INSERT INTO `gate` (`id`, `email`, `campus`, `gate`) VALUES
(1, 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1'),
(2, 'situchinmaya@gmail.com', 'Balasore', 'Gate1');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`id`, `name`, `email`, `dept`, `campus`) VALUES
(1, 'Chinmaya', '210720100009@cutm.ac.in', 'MCA', 'BBSR'),
(2, 'situ', 'situ@chinmayakumarbiswal.in', 'CTIS', 'Paralakhemundi'),
(6, 'situ', 'std@chinmayakumarbiswal.in', 'MCA', 'BBSR'),
(7, 'chinmaya', 'situ@chinmayakumarbiswal.in', 'MCA', 'BBSR');

-- --------------------------------------------------------

--
-- Table structure for table `visitordata`
--

CREATE TABLE `visitordata` (
  `id` int(11) NOT NULL,
  `visitingID` varchar(255) NOT NULL,
  `nameOfVisit` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `vehicleno` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `meetingName` varchar(255) NOT NULL,
  `registerEmail` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `gate` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitordata`
--

INSERT INTO `visitordata` (`id`, `visitingID`, `nameOfVisit`, `org`, `date`, `no`, `vehicleno`, `purpose`, `meetingName`, `registerEmail`, `campus`, `gate`, `photos`) VALUES
(1, 'BBSRVxhT1', 'situ1', 'Balugaon', '2023-01-26', '6370183009', 'od33', 'meet', 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSR5ZXV363d2be9e45602.png'),
(2, 'BBSRVxHT2', 'situ2', 'Hatabaradihi', '2023-01-26', '6370183009', 'od020000', 'meeting', 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSRDqubf63d2becdba57d.png'),
(3, 'BBSRZ5MG2', 'Chinmaya3', 'Chilika', '2023-01-28', '6370183009', 'or03b0011', 'meet', 'situ', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSRlYJ5g63d4c65586300.png'),
(4, 'BBSRgnHoR', 'situ4', 'Centurion University', '2023-01-28', '6370183009', 'OD040000', 'meeting', 'Chinmaya Kumar Biswal', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSRbqBJZ63d2bf55bc617.png'),
(5, 'BBSR9k28S', 'Nrusinha', 'CUTM', '2023-01-28', '06370183009', '', 'official', 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSRBJQOa63d4d5605823e.png'),
(6, 'BBSR364192', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-01-29', '6370183009', '', '', 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSR81792463d69ed1dd408.png'),
(7, 'BBSR196527', 'Chinmaya Kumar Biswal', 'Balugaon', '2023-01-29', '6370183009', '1', '1', 'Chinmaya1', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'Balasore28795163d4f0694d312.png'),
(8, 'BBSR286053', 'situ', 'Balugaon', '2023-01-29', '9556328216', '01', 'meet', 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'images.png'),
(9, 'BBSR240967', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-01-29', '6370183009', 'test', 'test', 'NN Das', 'chinmayakumarbiswal45@gmail.com', 'Balasore', 'Gate 1', 'images.png'),
(10, 'BBSR107824', 'Chinmaya Kumar Biswal', 'Balugaon', '2023-01-29', '6370183009', 'Situ', 'meet', 'Chinmaya Kumar Biswal', 'chinmayakumarbiswal45@gmail.com', 'Balasore', 'Gate 1', 'BBSR58073263d6a86c87fd0.png'),
(11, 'BBSR547219', 'Balabhadra Biswal', 'Chilika', '2023-01-31', '7894820031', 'OD02c0101', 'meet', 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSR50861463d9518a7229b.png'),
(12, 'BBSR945126', 'situ', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '6370183009', '', '', 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR', ' ', 'images.png'),
(25, 'BBSR459821', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSR45982163dbb5ed44830.png'),
(26, 'BBSR570632', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSR57063263dbb68990d4a.png'),
(27, 'BBSR591704', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSR59170463dbb6cbe22fc.png'),
(28, 'BBSR389461', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSR38946163dbb717e852b.png'),
(29, 'BBSR691734', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'images.png'),
(30, 'BBSR384906', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'BBSR38490663dbbd9b2382c.png'),
(31, 'BBSR346209', 'Chinmaya Kumar Biswal', 'Hatabaradihi,Gainada,Balugaon,752027', '2023-02-02', '06370183009', '', '', 'chinmayakumarbiswal16045@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'images.png'),
(32, 'BBSR207361', 'Balabhadra', 'Chilika', '2023-02-02', '6370183009', 'OD02', 'Meet', 'CHINMAYA KUMAR BISWAL', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSR50487663dbd6f8907d3.png'),
(33, 'BBSR891653', 'Chinmaya', 'Balugaon', '2023-02-02', '7894820031', '', '', 'CHINMAYA KUMAR BISWAL', '210720100009@cutm.ac.in', 'BBSR', 'Gate 1', 'BBSR57489363dbd873e5e36.png'),
(34, 'BBSR159062', 'Chinmaya', 'Balugaon', '2023-02-02', '7894820031', '', '', 'CHINMAYA KUMAR BISWAL', '210720100009@cutm.ac.in', 'BBSR', ' ', 'images.png'),
(35, 'BBSR435729', 'situ', 'chilika', '2023-02-05', '6370183009', '', '', 'chinmayakumarbiswal45@gmail.com', 'chinmayakumarbiswal45@gmail.com', 'BBSR', 'Gate 1', 'images.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entryrigister`
--
ALTER TABLE `entryrigister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gate`
--
ALTER TABLE `gate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitordata`
--
ALTER TABLE `visitordata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `entryrigister`
--
ALTER TABLE `entryrigister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gate`
--
ALTER TABLE `gate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitordata`
--
ALTER TABLE `visitordata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
