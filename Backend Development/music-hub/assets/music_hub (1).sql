-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 04:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dor` date DEFAULT NULL,
  `doa` date NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `singer` varchar(200) DEFAULT NULL,
  `composer` varchar(100) DEFAULT NULL,
  `songwriter` varchar(100) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL,
  `starring` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `dor`, `doa`, `album`, `views`, `singer`, `composer`, `songwriter`, `label`, `starring`, `image`, `link`) VALUES
(1, 'Tum Hi Ho', '2018-03-05', '2020-10-30', 'Aashiqui 2', 4543, 'Arijit Singh', 'Mithoon Sharma', 'Mithoon Sharma', 't-series', 'Aditya Roy Kapur, Shraddha Kapoor', 'tum-hi-ho-arijit.jpg', 'tum-hi-ho-arijit.mp3'),
(2, 'Chedkhaniyaan', '2019-03-21', '2020-10-30', 'Bandish Bandits', 7889, 'Shivam Mahadevan, Pratibha Singh Baghel', 'Shankar Ehsaan Loy', 'Tanishk S Nabar', 'Amazon Prime Video', 'Ritwik Bhowmik, Shreya Chaudhary', 'chedkhaniyaan-shivam.jpg', 'chedkhaniyaan-shivam.mp3'),
(4, 'Dil Bechara', '2016-10-29', '2020-10-30', 'Dil Bechara', 2465, 'A R Rahman', 'A R Rahman', 'A R Rahman', 'Sony Music', ' Sushant Singh Rajput, Sanjana Sanghi.', 'dil-bechara-rahman.jpg', 'dil-bechara-rahman.mp3'),
(6, 'Samjhawan', '2019-12-19', '2020-11-01', 'Humpty Sharma Ki Dulhania', 656, 'Arijit Singh, Shreya Ghoshal', 'Sahir Ali Bagga', 'Ahmed Anees, Kumaar', 'Sony Music', 'Alia Bhatt, Varun Dhawan', 'samjhawan-arijit.jpg', 'samjhawan-arijit.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last-modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `last-modified`) VALUES
(10001, 'Akash Soni', 'akash@gmail.com', '123', '2022-12-28 15:18:41', '2023-02-02 15:04:25'),
(10047, 'akash98', 'akash@skillvertex.in', '$2y$10$cYns2gRyapGJDKbES5lg5.bx8TpBXnJxRsSnPTnVvapdu3objI5NC', '2023-02-02 15:33:55', '2023-02-02 15:33:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10048;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
