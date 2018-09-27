-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 02:26 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ajay Kumar Choudhary', 'ajay@froiden.com', '$2y$10$499kBcLs6nQDMJc4UaHiT.sfG3HnryUu0A7jZZO67cZjI3xmD.TXO', '2018-09-27 05:48:24', 'hz9VKx1MeTDwxZoXQyK73cdpbGCCqqrb5Gw2hATZhRDecqjd1THiDL93FjZb', '2015-04-29 00:33:15', '2018-09-27 00:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` enum('absent','present') COLLATE utf8_unicode_ci NOT NULL,
  `leaveType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `halfDayType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `application_status` enum('approved','rejected','pending') COLLATE utf8_unicode_ci DEFAULT NULL,
  `applied_on` date DEFAULT NULL,
  `shift` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `in_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `out_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employeeID`, `date`, `status`, `leaveType`, `halfDayType`, `reason`, `application_status`, `applied_on`, `shift`, `in_time`, `out_time`, `ot`, `total_time`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'udaya12', '2018-09-27', 'present', NULL, NULL, '', NULL, NULL, '', '09:00', '18:00', '', '', 'ajay@froiden.com', '2018-09-27 00:39:21', '2018-09-27 06:48:45'),
(2, 'hari122', '2018-09-27', 'present', NULL, NULL, '', NULL, NULL, '', '11:30', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:21', '2018-09-27 00:39:21'),
(3, 'rmk12', '2018-09-27', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:21', '2018-09-27 00:39:21'),
(4, 'luck123', '2018-09-27', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:21', '2018-09-27 00:39:21'),
(5, 'udaya12', '2018-09-03', 'absent', 'sick', NULL, '', NULL, NULL, '', '11:30', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:42', '2018-09-27 00:39:42'),
(6, 'hari122', '2018-09-03', 'absent', 'half day', 'casual', '', NULL, NULL, '', '11:30', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:42', '2018-09-27 00:40:33'),
(7, 'rmk12', '2018-09-03', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:42', '2018-09-27 00:39:42'),
(8, 'luck123', '2018-09-03', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:39:42', '2018-09-27 00:39:42'),
(9, 'udaya12', '2018-09-01', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:17', '2018-09-27 00:42:17'),
(10, 'hari122', '2018-09-01', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:17', '2018-09-27 00:42:17'),
(11, 'rmk12', '2018-09-01', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:17', '2018-09-27 00:42:17'),
(12, 'luck123', '2018-09-01', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:17', '2018-09-27 00:42:17'),
(13, 'qq12', '2018-09-01', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:17', '2018-09-27 00:42:17'),
(14, 'qq12', '2018-09-03', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:42:53', '2018-09-27 00:42:53'),
(15, 'qq12', '2018-09-27', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 00:59:21', '2018-09-27 00:59:21'),
(16, 'udaya12', '2018-09-26', 'absent', 'casual', NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 05:00:48', '2018-09-27 05:00:48'),
(17, 'hari122', '2018-09-26', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 05:00:48', '2018-09-27 05:00:48'),
(18, 'rmk12', '2018-09-26', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 05:00:48', '2018-09-27 05:00:48'),
(19, 'luck123', '2018-09-26', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 05:00:48', '2018-09-27 05:00:48'),
(20, 'qq12', '2018-09-26', 'present', NULL, NULL, '', NULL, NULL, '', '', '', '', '', 'ajay@froiden.com', '2018-09-27 05:00:48', '2018-09-27 05:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `awardName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cashPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forMonth` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `forYear` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `accountName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accountNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `deptName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptName`, `created_at`, `updated_at`) VALUES
(1, 'IT DEPARTMENT', '2018-09-27 00:19:09', '2018-09-27 00:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `deptID` int(10) UNSIGNED NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `deptID`, `designation`, `created_at`, `updated_at`) VALUES
(1, 1, 'DEVELOPMER', '2018-09-27 00:19:09', '2018-09-27 00:19:09'),
(2, 1, 'DESIGNER', '2018-09-27 00:19:09', '2018-09-27 00:19:09'),
(3, 1, 'TESTER', '2018-09-27 00:19:09', '2018-09-27 00:19:09'),
(4, 1, 'GRAPHIC DESIGNER', '2018-09-27 00:19:09', '2018-09-27 00:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `fatherName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobileNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `designation` int(10) UNSIGNED DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `profileImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `localAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `permanentAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employeeID`, `fullName`, `email`, `password`, `gender`, `fatherName`, `mobileNumber`, `date_of_birth`, `designation`, `joiningDate`, `profileImage`, `localAddress`, `permanentAddress`, `status`, `last_login`, `remember_token`, `exit_date`, `created_at`, `updated_at`) VALUES
(1, 'udaya12', 'Udaya', 'udaya@gmail.com', '$2y$10$C0xA4OjlN34QGBsnjf5guO7lsk3r7DiMp7rXuGCYY7To6Co6W1oX.', 'male', '', '', '1970-01-01', 1, '1970-01-01', 'default.jpg', '', '', 'active', '0000-00-00 00:00:00', NULL, NULL, '2018-09-27 00:19:46', '2018-09-27 00:19:46'),
(2, 'hari122', 'Hari', 'hari@gmail.com', '$2y$10$EzarteRRJwn.lSoWg8SQyOzaQ7AHTwJfUDD4AEJDRroJW9whQ94Du', 'male', '', '', '1970-01-01', 3, '1970-01-01', 'default.jpg', '', '', 'active', '0000-00-00 00:00:00', NULL, NULL, '2018-09-27 00:20:10', '2018-09-27 00:20:10'),
(3, 'rmk12', 'Rmk', 'as@gmail.com', '$2y$10$YFti6krF.NhzQ/kUrSJUN.Lhds6MEj.VkYizhzfyPt2J2W/a9NP.i', 'male', '', '', '1970-01-01', 1, '1970-01-01', 'default.jpg', '', '', 'active', '0000-00-00 00:00:00', NULL, NULL, '2018-09-27 00:22:18', '2018-09-27 00:22:18'),
(4, 'luck123', 'Lucky', 'dsds@gmail.com', '$2y$10$YuKIed6SJ7oASZkCaOybA.TORmyr7.XvZyYcIfcnQjfhgs9BfsSwO', 'male', '', '', '1970-01-01', 1, '1970-01-01', 'default.jpg', '', '', 'active', '0000-00-00 00:00:00', NULL, NULL, '2018-09-27 00:23:24', '2018-09-27 00:23:24'),
(5, 'qq12', 'Chaitanya', 'ad@gmail.com', '$2y$10$NxXY.bFVwD4mLKM63P4E5uONao4NqC/kL/exhaH1uAtXJuuUPPYYi', 'male', '', '', '1970-01-01', 1, '1970-01-01', 'default.jpg', '', '', 'active', '0000-00-00 00:00:00', NULL, NULL, '2018-09-27 00:41:56', '2018-09-27 00:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `itemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchaseDate` date NOT NULL,
  `purchaseFrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `bill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `occassion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `occassion`, `created_at`, `updated_at`) VALUES
(1, '2018-01-07', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(2, '2018-01-14', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(3, '2018-01-21', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(4, '2018-01-28', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(5, '2018-02-04', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(6, '2018-02-11', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(7, '2018-02-18', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(8, '2018-02-25', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(9, '2018-03-04', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(10, '2018-03-11', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(11, '2018-03-18', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(12, '2018-03-25', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(13, '2018-04-01', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(14, '2018-04-08', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(15, '2018-04-15', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(16, '2018-04-22', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(17, '2018-04-29', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(18, '2018-05-06', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(19, '2018-05-13', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(20, '2018-05-20', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(21, '2018-05-27', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(22, '2018-06-03', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(23, '2018-06-10', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(24, '2018-06-17', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(25, '2018-06-24', 'Sunday', '2018-09-27 00:31:09', '2018-09-27 00:31:09'),
(26, '2018-07-01', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(27, '2018-07-08', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(28, '2018-07-15', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(29, '2018-07-22', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(30, '2018-07-29', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(31, '2018-08-05', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(32, '2018-08-12', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(33, '2018-08-19', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(34, '2018-08-26', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(35, '2018-09-02', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(36, '2018-09-09', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(37, '2018-09-16', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(38, '2018-09-23', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(39, '2018-09-30', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(40, '2018-10-07', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(41, '2018-10-14', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(42, '2018-10-21', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(43, '2018-10-28', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(44, '2018-11-04', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(45, '2018-11-11', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(46, '2018-11-18', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(47, '2018-11-25', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(48, '2018-12-02', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(49, '2018-12-09', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(50, '2018-12-16', 'Sunday', '2018-09-27 00:31:10', '2018-09-27 00:31:10'),
(51, '2018-12-23', 'Sunday', '2018-09-27 00:31:11', '2018-09-27 00:31:11'),
(52, '2018-12-30', 'Sunday', '2018-09-27 00:31:11', '2018-09-27 00:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE `leavetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `leaveType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_leave` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`id`, `leaveType`, `num_of_leave`, `created_at`, `updated_at`) VALUES
(1, 'sick', 5, '2015-04-29 00:33:15', '2015-04-29 00:33:15'),
(2, 'casual', 5, '2015-04-29 00:33:15', '2015-04-29 00:33:15'),
(3, 'half day', 0, '2015-04-29 00:33:15', '2015-04-29 00:33:15'),
(4, 'maternity', 5, '2015-04-29 00:33:15', '2015-04-29 00:33:15'),
(5, 'others', 5, '2015-04-29 00:33:15', '2015-04-29 00:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboards`
--

CREATE TABLE `noticeboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salary` double NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employeeID`, `type`, `salary`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'udaya12', 'basic', 8000, '', '2018-09-27 00:21:28', '2018-09-27 00:21:28'),
(2, 'hari122', 'basic', 20000, '', '2018-09-27 00:21:47', '2018-09-27 00:21:47'),
(3, 'rmk12', 'basic', 10000, '', '2018-09-27 00:22:41', '2018-09-27 00:22:41'),
(4, 'luck123', 'current', 10000, 'Joining Salary Of Employee', '2018-09-27 00:23:24', '2018-09-27 00:23:24'),
(5, 'qq12', 'current', 25000, 'Joining Salary Of Employee', '2018-09-27 00:41:56', '2018-09-27 00:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `currency_icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `award_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `attendance_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `leave_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `notice_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `employee_add` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website`, `email`, `name`, `logo`, `currency`, `currency_icon`, `award_notification`, `attendance_notification`, `leave_notification`, `notice_notification`, `employee_add`, `created_at`, `updated_at`) VALUES
(1, 'HRM', 'ajay@froiden.com', 'Administrator', 'logo.png', 'INR', 'fa-inr', '1', '0', '1', '1', '1', '2015-04-29 00:33:15', '2015-04-29 00:33:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_employeeid_index` (`employeeID`),
  ADD KEY `attendance_leavetype_index` (`leaveType`),
  ADD KEY `attendance_updated_by_index` (`updated_by`),
  ADD KEY `attendance_halfdaytype_index` (`halfDayType`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_employeeid_index` (`employeeID`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_details_employeeid_index` (`employeeID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_deptid_foreign` (`deptID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_employeeid_unique` (`employeeID`),
  ADD KEY `employees_designation_foreign` (`designation`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_documents_employeeid_index` (`employeeID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `holidays_date_unique` (`date`);

--
-- Indexes for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leavetypes_leavetype_index` (`leaveType`);

--
-- Indexes for table `noticeboards`
--
ALTER TABLE `noticeboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_employeeid_index` (`employeeID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `leavetypes`
--
ALTER TABLE `leavetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `noticeboards`
--
ALTER TABLE `noticeboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_halfdaytype_foreign` FOREIGN KEY (`halfDayType`) REFERENCES `leavetypes` (`leaveType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_leavetype_foreign` FOREIGN KEY (`leaveType`) REFERENCES `leavetypes` (`leaveType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `designation_deptid_foreign` FOREIGN KEY (`deptID`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_designation_foreign` FOREIGN KEY (`designation`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD CONSTRAINT `employee_documents_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
