-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 08:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyscan`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `otp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `email`, `otp`) VALUES
(1, 'divya18kumari18@gmail.com', '9538'),
(6, 'wms39071@gmail.com', '3212');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `iso3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `contact`, `password`, `country`, `city`, `iso3`) VALUES
(1, 'Manoranjan Saha', 'wms39071@gmail.com', '8942843246', '$2y$10$4KslsfXYzZu.JdoFBNjcLuCTCgYZFzcrTjjgVTHFh049dH5spToqm', 'India', 'Durgapur', 'IND'),
(2, 'Divya Tiwari', 'divya18kumari18@gmail.com', '6204338033', '$2y$10$VvsGgA9DFY.L6cUgzBjRtOYNneh68IjVtwTVrnEneV1aE8wZdsBhy', 'India', 'Durgapur', 'IND'),
(3, 'Barsha Roy', 'bsinha9631@gmail.com', '7898246521', '$2y$10$s9/A0.FLXtNZsu.0l/KkDOYzphauE6OPtvfTeWhqQhTq5/ky9aB9.', 'India', 'Bankura', 'IND'),
(4, 'Yoichi Esaghi', 'esaghi@gmail.com', '8942843249', '$2y$10$biPhhSwiULX2X.NDI1VzEeI0S5iqHkKsIfWqd8ZC1FKGwvlP0Fp/a', 'India', 'Durgapur', 'IND');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
