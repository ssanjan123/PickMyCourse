-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 06:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LoginSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `CGPA` decimal(8,2) NOT NULL,
  `Credits` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `major`, `CGPA`, `Credits`, `create_datetime`) VALUES
(6, 'nicolam', 'nicolam@sfu.ca', 'Yay!', 'MBB', '4.33', 86, '2021-03-09 03:29:48'),
(12, 'test', 'test@test', 'testing', 'cS', '0.00', 0, '2021-03-04 11:49:26'),
(13, 'bob', 'bob@bob.com', 'HeIloIAmBob', 'DS', '0.00', 0, '2021-03-04 18:54:42'),
(27, 'Claire', 'claire@claire', 'HelloIAmClaire', 'BUS', '0.00', 0, '2021-03-04 18:56:05'),
(34, 'Mary', 'mary@mary', 'HelloIAmMary', 'BIO', '0.00', 0, '2021-03-04 18:57:15'),
(36, 'joanne', 'J@J', 'test36', 'STAT', '0.00', 0, '2021-03-07 06:35:23'),
(100, 'Thomas', 'thomas@tom', 'thomas100', 'DS', '0.00', 0, '2021-03-08 06:43:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
