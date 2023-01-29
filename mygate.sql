-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 06:54 PM
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
-- Database: `mygate`
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
(2, 'BBSR', 'situ@chinmayakumarbiswal.in');

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
(1, 'BBSR'),
(2, 'Balasore');

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
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `campus`) VALUES
(1, 'Chinmaya', '210720100009@cutm.ac.in', 'BBSR');

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
(10, 'BBSR107824', 'Chinmaya Kumar Biswal', 'Balugaon', '2023-01-29', '6370183009', 'Situ', 'meet', 'Chinmaya Kumar Biswal', 'chinmayakumarbiswal45@gmail.com', 'Balasore', 'Gate 1', 'BBSR58073263d6a86c87fd0.png');

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
-- Indexes for table `gate`
--
ALTER TABLE `gate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gate`
--
ALTER TABLE `gate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitordata`
--
ALTER TABLE `visitordata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
