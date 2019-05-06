-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 01:06 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buysell`
--

-- --------------------------------------------------------

--
-- Table structure for table `allitems`
--

CREATE TABLE `allitems` (
  `item_id` int(10) NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_520_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `date_posted` date NOT NULL,
  `expiry_date` date NOT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `allitems`
--

INSERT INTO `allitems` (`item_id`, `title`, `description`, `price`, `quantity`, `date_posted`, `expiry_date`, `user_id`) VALUES
(32, 'SanDisk Ultra 64GB microSD', 'Ideal for Android-based smartphones and tablets. Transfer speeds of up to 100MB/s**. Shockproof, temperature-proof, waterproof, and X-ray-proof', 23, 25, '2018-10-18', '2018-11-01', 5),
(33, 'Asus ROG Zephyrus M Gaming Lap', 'Ultra Slim 0.78\" gaming laptop with a full-powered NVIDIA GeForce GTX 1070 8GB. 8th-Generation 6-Core Intel Core i7-8750H (up to 3.9GHz). 144Hz refresh rate 15.6\" Full-HD IPS-Type AHVA gaming panel with NVIDIA G-SYNC and 3ms response time. 20 Percent reduced temperature compared to conventional cooling design due to ROG-exclusive Active Aerodynamic System and 12V fans', 2799, 12, '2018-10-18', '2018-11-01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`id`, `name`, `email`, `password`) VALUES
(1, 'jagtar singh', 'jsk5755@gmail.com', '123'),
(2, 'rv', 'dfd@gmail.com', '557yg'),
(3, 'ravinder', 'ravinderharaj@gmail.com', '12345'),
(4, 'jagtar', 'jagtar.ca@gmail.com', '12345'),
(5, 'jj', 'jj@jj.com', 'jj'),
(6, 'loveleen kaur', 'loveleenkaur@gmail.com', '123'),
(7, 'jagpal singh', 'jagpal@gmail.comm', '123'),
(8, 'testing', 'testing@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `item_id` int(10) NOT NULL,
  `image_path` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`item_id`, `image_path`) VALUES
(32, 'images/sandisk1.jpg'),
(32, 'images/sandisk2.jpg'),
(33, 'images/lp1.jpg'),
(33, 'images/lp2.jpg'),
(33, 'images/lp3.jpg'),
(33, 'images/lp4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `solditems`
--

CREATE TABLE `solditems` (
  `item_id` int(10) NOT NULL,
  `sold_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `solditems`
--

INSERT INTO `solditems` (`item_id`, `sold_date`) VALUES
(21, '2018-10-16'),
(14, '2018-10-16'),
(14, '2018-10-16'),
(13, '2018-10-16'),
(13, '2018-10-16'),
(13, '2018-10-16'),
(22, '2018-10-16'),
(13, '2018-10-17'),
(21, '2018-10-16'),
(30, '2018-10-18'),
(30, '2018-10-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allitems`
--
ALTER TABLE `allitems`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `solditems`
--
ALTER TABLE `solditems`
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allitems`
--
ALTER TABLE `allitems`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allitems`
--
ALTER TABLE `allitems`
  ADD CONSTRAINT `allitems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `allusers` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `allitems` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
