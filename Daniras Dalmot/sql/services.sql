-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 07:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danirasdalmot`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Home Delivery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:35:07', '2021-10-06 16:35:07'),
(2, 'Quality Food', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:36:31', '2021-10-06 16:36:31'),
(3, 'Send Messages', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:36:31', '2021-10-06 16:36:31'),
(4, 'Reasonable Price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:37:30', '2021-10-06 16:37:30'),
(5, 'Bulk Order', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:37:30', '2021-10-06 16:37:30'),
(6, 'Responsive Team', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Cras.', '2021-10-06 16:37:58', '2021-10-06 16:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
