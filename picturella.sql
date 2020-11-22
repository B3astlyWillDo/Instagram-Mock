-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picturella`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `clanid` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`clanid`, `ime`, `prezime`, `username`, `password`, `email`) VALUES
(1, 'John', 'asdasd', 'B3astly', '$2y$10$7phPXJUvUHCm4GFU1l8fnu9ZSx6n3cH0g0Ze/3XSTY8TnKgeVefBK', 'dzekicn909@gmail.com'),
(2, 'admin', 'admin', 'admin', '$2y$10$QCQxpeWfqkU7xScC/YvJh.u0dQqHQAQXCC72DymNf.LvVkLVnJnB2', 'admin@gmail.com'),
(12, 'Milos', 'Bikovic', 'milosbika', '$2y$10$Fv1JOCCR.LPzVaWZDeoEg.WaBxPc6nf2K91I5X0/C6DIpVcFlRzfK', 'milosbika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `objave`
--

CREATE TABLE `objave` (
  `objavaid` int(11) NOT NULL,
  `clanid` int(11) NOT NULL,
  `objavaime` varchar(40) NOT NULL,
  `objavalink` varchar(40) NOT NULL,
  `brsvidjanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objave`
--

INSERT INTO `objave` (`objavaid`, `clanid`, `objavaime`, `objavalink`, `brsvidjanja`) VALUES
(1, 1, 'Polarna svetlost', 'nlights.jfif', 50),
(5, 1, 'New York', '5ee29ae6500525.91555487.jpg', 0),
(6, 1, 'Miljacka', '5ee29c121b7d90.19169590.jpg', 0),
(9, 1, 'Bobogun', '5ee5eb78bf6e75.30605106.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanovi`
--
ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`clanid`);

--
-- Indexes for table `objave`
--
ALTER TABLE `objave`
  ADD PRIMARY KEY (`objavaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `clanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `objave`
--
ALTER TABLE `objave`
  MODIFY `objavaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
