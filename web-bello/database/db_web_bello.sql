-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 05:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_bello`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comission`
--

CREATE TABLE `tbl_comission` (
  `id` int(11) NOT NULL,
  `developer_name` varchar(100) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_contract_price` float NOT NULL DEFAULT 0,
  `processing_fee` float NOT NULL DEFAULT 0,
  `comission_rate` double NOT NULL DEFAULT 0,
  `total_comission_amount` float NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `net_comission` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_comission`
--

INSERT INTO `tbl_comission` (`id`, `developer_name`, `agent_name`, `client_name`, `project`, `address`, `total_contract_price`, `processing_fee`, `comission_rate`, `total_comission_amount`, `tax`, `net_comission`, `created_at`) VALUES
(1, 'Pro Friends', 'Emmanuel Nocum', 'Jeric Valderama', 'House', 'Dasmarinas Cavite', 2000000, 0, 0.03, 60000, 0.1, 54000, '2023-05-08 21:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deve`
--

CREATE TABLE `tbl_deve` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_developer`
--

CREATE TABLE `tbl_developer` (
  `id` int(11) NOT NULL,
  `developer_name` varchar(100) NOT NULL,
  `logo_url` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_developer`
--

INSERT INTO `tbl_developer` (`id`, `developer_name`, `logo_url`, `created_at`) VALUES
(1, 'Pro Friends', 'https://res.cloudinary.com/dm1ztuuvo/image/upload/v1683547387/pro_friends_xu1ktu.png', '2023-05-08 20:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum`
--

CREATE TABLE `tbl_forum` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message_body` longtext NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'announcement',
  `image_url` varchar(200) NOT NULL DEFAULT 'https://st4.depositphotos.com/12901430/27401/v/450/depositphotos_274010718-stock-illustration-hand-holding-megaphone-or-bullhorn.jpg',
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `editor_email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_forum`
--

INSERT INTO `tbl_forum` (`id`, `title`, `message_body`, `category`, `image_url`, `status`, `editor_email`, `created_at`) VALUES
(3, 'asd', 'asd', 'Events', 'https://st4.depositphotos.com/12901430/27401/v/450/depositphotos_274010718-stock-illustration-hand-holding-megaphone-or-bullhorn.jpg', 'active', 'Dummy@gmail.com', '2023-05-11 21:02:22'),
(4, 'asd', 'Emmanuel', 'Announcement', 'https://st4.depositphotos.com/12901430/27401/v/450/depositphotos_274010718-stock-illustration-hand-holding-megaphone-or-bullhorn.jpg', 'active', 'Dummy@gmail.com', '2023-05-11 21:28:37'),
(5, '1', '2', 'Forum', 'https://st4.depositphotos.com/12901430/27401/v/450/depositphotos_274010718-stock-illustration-hand-holding-megaphone-or-bullhorn.jpg', 'active', 'Dummy@gmail.com', '2023-05-11 22:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoa`
--

CREATE TABLE `tbl_hoa` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='7';

--
-- Dumping data for table `tbl_hoa`
--

INSERT INTO `tbl_hoa` (`id`, `firstname`, `lastname`, `email`, `address`, `password`, `role`, `status`, `created_at`) VALUES
(6, 'Jeric', 'Valderama', 'jeric@gmail.com', 'Block 74 Lot 16 Barangay San Esteban', 'default1234', 'board member', 'Active', '2023-05-08 22:26:17'),
(7, 'Fill Cris', 'Casulla', 'ken@gmail.com', 'Block 74 Lot 16 Barangay San Esteban', 'default1234', 'admin', 'Active', '2023-05-08 22:28:52'),
(8, 'Manuel', 'Olarve', 'manu@gmail.com', 'Block 74 Lot 16 Barangay San Esteban', 'default1234', 'admin', 'Active', '2023-05-11 22:34:17'),
(9, 'Gabriel', 'Libacao', 'gab@gmail.com', 'adsasd', 'default1234', 'admin', 'Active', '2023-05-11 22:40:26'),
(10, '1', '2', '23@gmail.com', '23', 'default1234', 'admin', 'Active', '2023-05-11 22:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_residents`
--

CREATE TABLE `tbl_residents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_residents`
--

INSERT INTO `tbl_residents` (`id`, `firstname`, `lastname`, `sex`, `age`, `address`, `contact`, `email`, `created_at`, `status`) VALUES
(1, 'Sample', 'Demo', 'Male', 25, 'B12 L34, Nowhere St. Brgy. Secret', 912345612, 'dummy@gmail.com', '2023-05-04 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `email` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL DEFAULT 'Admin',
  `address` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `added_at`, `password`, `status`, `email`, `position`, `address`, `last_login`) VALUES
(1, 'Dummy', 'Dummy', '2023-05-04 16:12:54', 'Admin1234', 'Active', 'Dummy@gmail.com', 'Admin', '', '2023-05-04 16:12:54'),
(2, 'Dumy', 'Dummy', '2023-05-04 16:13:34', 'Admin1234', 'Active', 'Dummy@gmail.com', 'Admin', '', '2023-05-04 16:13:34'),
(3, 'Emmanuel', 'Nocum', '2023-05-04 20:21:07', 'Admin1234', 'Active', 'sleepshaco@gmail.com', 'Admin', '', '2023-05-04 20:21:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comission`
--
ALTER TABLE `tbl_comission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_developer`
--
ALTER TABLE `tbl_developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_forum`
--
ALTER TABLE `tbl_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hoa`
--
ALTER TABLE `tbl_hoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comission`
--
ALTER TABLE `tbl_comission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_developer`
--
ALTER TABLE `tbl_developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_forum`
--
ALTER TABLE `tbl_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hoa`
--
ALTER TABLE `tbl_hoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `tbl_residents` CHANGE `contact` `contact` VARCHAR(15) NOT NULL;