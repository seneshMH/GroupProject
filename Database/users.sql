-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 06:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `indexNo` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`indexNo`, `password`) VALUES
('7777788888', '$2y$10$9/dN6iFzxf6l2uw8GTwV3.qg8YqrY1FKDkQiBM6COWLF/bz2PFXxm'),
('9999988888', '$2y$10$BW7i4yfU5cp6JFuMUd137uScMa/R6AV9C32Jq8qKxjnXMjgw9UVqe');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `description`, `image`) VALUES
(16, '2022-07-20', 'Camp Notice', '62d82d4a4313d1.22394582.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `indexNo` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`indexNo`, `fname`, `lname`, `dob`, `mobile`, `email`, `password`) VALUES
(1000, 'saman', 'nishantha', '2000-06-13', 773245678, 'saman@gmail.com', '$2y$10$a1Qmd.rp9iGMo/Pn3TGKW.KGZlU.e3Mg1Sl9vWgejoDr346..ZgC.'),
(1001, 'kamal', 'rathnayaka', '2000-06-13', 783527583, 'kamal@gmail.com', '$2y$10$v60Y3Ed.DW2xkzvXXSpUbOo5V/Fs026Hla6hl3o.YDarD9lxebJjS'),
(1002, 'lahiru', 'sampath', '2000-06-13', 783563789, 'lahiru@gmail.com', '$2y$10$FJyiqBeqUQlQt5Dzk4/hD.nwrBoz/apfJRru7o7QTwXo5Me3q4Hsy'),
(1003, 'kasun', 'chamara', '2000-02-07', 785734698, 'chamara@gmail.com', '$2y$10$a3Wl8zrdxVi0Oz5ZZS7tSuKP3qtS.u0o.ADzLWpcK44z9pP4GUdUm'),
(1004, 'nadun', 'lakshan', '2000-06-13', 765498764, 'nadun@gmail.com', '$2y$10$TOpwp/VtB0eyU/wBzj2oM./nbBDpYNeOzpS3YlOQu3K/kJTsVwspa'),
(1005, 'tharindu', 'lakmal', '2000-06-05', 774569076, 'tharindu@gmail.com', '$2y$10$8muTcK9qRJ61ALCjzZZS3.ZiRGMkEnKXgS61XzOWzKScQHO4bJfUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`indexNo`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`indexNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
