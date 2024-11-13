-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 08:53 AM
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
-- Database: `aip_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aip_sector`
--

CREATE TABLE `aip_sector` (
  `aip_id` int(11) NOT NULL,
  `aip_code` varchar(100) DEFAULT NULL,
  `department_office` varchar(255) DEFAULT NULL,
  `sector_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aip_sector`
--

INSERT INTO `aip_sector` (`aip_id`, `aip_code`, `department_office`, `sector_category`) VALUES
(48, '1000-000-2-1-01', 'Development', 'Institutional Development Sector'),
(49, '1000-000-2-1-01', 'Technical', 'Social Sector'),
(50, '1000-000-2-1-01', 'test', 'Social Sector');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `funding_source` varchar(255) DEFAULT NULL,
  `personal_services` decimal(15,2) DEFAULT 0.00,
  `maintenance_expenses` decimal(15,2) DEFAULT 0.00,
  `capital_outlay` decimal(15,2) DEFAULT 0.00,
  `climate_adaptation` decimal(15,2) DEFAULT 0.00,
  `climate_mitigation` decimal(15,2) DEFAULT 0.00,
  `cc_typology_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `parent_id`, `description`, `funding_source`, `personal_services`, `maintenance_expenses`, `capital_outlay`, `climate_adaptation`, `climate_mitigation`, `cc_typology_code`) VALUES
(1, 1, 'Application Systems Developed', 'GF Proper-Estimated Revenue & Other Sources', 46172960.00, 0.00, 0.00, 0.00, 0.00, ''),
(2, 1, 'Application Systems Maintained', '', 4000000.00, 1000000.00, 5000000.00, 0.00, 0.00, '0.00'),
(3, 1, 'Developers Trained on new application development platform', '', 0.00, 1000000.00, 0.00, 1000000.00, 0.00, ''),
(4, 2, 'Network Administration provided (City Hall Internet Services)', '', 0.00, 1000000.00, 14120000.00, 0.00, 0.00, ''),
(5, 1, 'Developing', 'Developer', 0.00, 0.00, 0.00, 0.00, 0.00, NULL),
(6, 1, 'We developed systems', 'Developer', 0.00, 0.00, 0.00, 0.00, 0.00, NULL),
(7, 3, 'Technical', 'Technical team', 5000000.00, 1000000.00, 0.00, 0.00, 0.00, NULL),
(8, 3, 'GIS', 'GIS department', 1000000.00, 450000.00, 100000.00, 20000.00, 10000.00, '0.00'),
(9, 4, 'application system maintained , application system developed', 'ldf', 0.00, 0.00, 250000.00, 250000.00, 250000.00, ''),
(10, 5, 'example1', '2', 21.00, 2222.00, 2.00, 222.00, 22.00, ''),
(11, 5, 'example2', '22', 222.00, 22.00, 22.00, 22.00, 22.00, '22'),
(12, 6, 'Developed land', 'Financial INC', 1000000.00, 200000.00, 50000.00, 20000.00, 1000000.00, '0.00'),
(13, 7, 'Developed land', 'Financial INC', 1000000.00, 200000.00, 50000.00, 20000.00, 1000000.00, '0.00'),
(14, 8, 'Techtest2', 'test3', 200000.00, 200000.00, 200000.00, 200000.00, 200000.00, '0.00'),
(15, 9, 'TEST45', '53WS', 4500000.00, 4500000.00, 4500000.00, 4500000.00, 4500000.00, '45'),
(17, 9, 'TEST46', 'TEST46', 50000.00, 50000.00, 50000.00, 50000.00, 50000.00, '50000'),
(18, 9, 'TEST47', 'TEST47', 2323000.00, 2323000.00, 2323000.00, 2323000.00, 2323000.00, '222');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `aip_ref_code` varchar(10) NOT NULL,
  `sector_category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `implementing_office` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `aip_ref_code`, `sector_category`, `description`, `implementing_office`, `start_date`, `end_date`) VALUES
(1, '001', '', 'Application Development and Maintenance Program', 'MICS', '2025-01-01', '2025-12-31'),
(2, '002', '', 'ICT Technical Support Program', 'ICT Department', '2025-01-01', '2025-12-31'),
(3, '003', '', 'Technical Team ', 'TECH', '2024-11-13', '2024-11-28'),
(4, '004', '', 'ICT tech program', 'MICS', '2024-11-17', '2024-11-20'),
(5, '005', '', 'ic tech support', 'mics', '2024-11-13', '2024-11-20'),
(6, '', '', 'Geographical', 'GIS', '2024-11-21', '2024-11-28'),
(7, '', '', 'Geographical', 'GIS', '2024-11-21', '2024-11-28'),
(8, '', '', '', '', '0000-00-00', '0000-00-00'),
(9, '', '', 'TEST45', 'TEST45', '2024-11-29', '2024-11-24'),
(10, '006', '', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_email` varchar(255) NOT NULL,
  `department_password` varchar(255) NOT NULL,
  `sector_category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `department_name`, `department_email`, `department_password`, `sector_category`, `status`) VALUES
(1, 'Promotion for the Welfate and protection of Children', 'welfare@gmail.com', '123', 'Institutional Development Sector', 'department');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aip_sector`
--
ALTER TABLE `aip_sector`
  ADD PRIMARY KEY (`aip_id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aip_sector`
--
ALTER TABLE `aip_sector`
  MODIFY `aip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
