-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2026 at 04:50 PM
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
-- Database: `blood_donation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `units` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `required_date` date NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Completed','Rejected') DEFAULT 'Pending',
  `urgency` varchar(20) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `patient_name`, `blood_group`, `units`, `location`, `contact`, `required_date`, `request_date`, `status`, `urgency`, `proof`) VALUES
(1, 'likhita', 'A+', 2, 'paravada', '9959612564', '2026-03-21', '2026-03-18 07:14:54', 'Pending', '', ''),
(2, 'likhita', 'A+', 2, 'paravada', '9959612564', '2026-03-21', '2026-03-18 07:18:35', 'Pending', '', ''),
(3, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:19:58', 'Pending', '', ''),
(4, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:38:38', 'Pending', '', ''),
(5, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:40:57', 'Pending', '', ''),
(6, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:41:05', 'Pending', '', ''),
(7, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:42:13', 'Pending', '', ''),
(8, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:43:10', 'Pending', '', ''),
(9, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:51:54', 'Pending', '', ''),
(10, 'bhagya', 'O+', 1, 'vizag', '9693215647', '2026-03-23', '2026-03-18 07:54:16', 'Pending', '', ''),
(12, 'asri', 'AB+', 1, 'gajuwaka', '2586549874', '2026-03-20', '2026-03-18 07:55:49', 'Pending', '', ''),
(13, 'asri', 'AB+', 1, 'gajuwaka', '2586549874', '2026-03-20', '2026-03-18 08:16:05', 'Pending', '', ''),
(14, 'shyam', 'A-', 1, 'paravada', '9949102681', '2026-03-21', '2026-03-18 08:18:02', 'Pending', '', ''),
(15, 'shyam', 'A-', 1, 'paravada', '9949102681', '2026-03-21', '2026-03-18 08:23:50', 'Pending', '', ''),
(16, 'vinni', 'AB-', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:24:50', 'Pending', '', ''),
(17, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:26:21', 'Pending', '', ''),
(18, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:29:05', 'Pending', 'Emergency', 'likki_resume.pdf'),
(19, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:31:32', 'Pending', 'Emergency', 'likki_resume.pdf'),
(20, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:32:24', 'Pending', 'Emergency', 'likki_resume.pdf'),
(21, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:33:51', 'Pending', 'Emergency', 'likki_resume.pdf'),
(22, 'vinni', 'AB+', 2, 'gajuwaka', '9874561233', '2026-03-20', '2026-03-18 08:36:25', 'Pending', 'Emergency', 'likki_resume.pdf'),
(23, 'likhita', 'A+', 2, 'gajuwaka', '9959612564', '2026-04-16', '2026-03-18 08:37:46', 'Pending', 'Urgent', 'my photo.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
