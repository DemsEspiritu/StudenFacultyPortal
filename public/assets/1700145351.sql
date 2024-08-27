-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 11:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `section`, `created_by`, `created_at`, `updated_at`) VALUES
(220, 'Grade 7', '5', 126, '2023-11-09 02:36:08', '2023-11-09 02:36:08'),
(221, 'Grade 8', '5', 126, '2023-11-10 05:07:46', '2023-11-10 05:07:46'),
(222, 'Grade 7', '1', 126, '2023-11-10 09:00:18', '2023-11-10 09:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `schedule` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `school_year_id`, `teacher_id`, `created_at`, `updated_at`, `created_by`, `fromTime`, `toTime`, `schedule`) VALUES
(178, 220, 38, 1, 129, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(179, 220, 37, 1, 127, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(180, 220, 35, 1, 123, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(181, 220, 48, 1, 122, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(183, 220, 36, 1, 120, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(184, 220, 39, 1, 123, '2023-11-10 15:31:13', '2023-11-10 15:31:13', 126, '00:00:00', '00:00:00', ''),
(185, 221, 36, 1, 129, '2023-11-11 07:49:07', '2023-11-11 07:49:07', 126, '00:00:00', '00:00:00', ''),
(186, 221, 48, 1, 127, '2023-11-11 07:49:07', '2023-11-11 07:49:07', 126, '00:00:00', '00:00:00', ''),
(187, 221, 35, 1, 123, '2023-11-11 07:49:07', '2023-11-11 07:49:07', 126, '00:00:00', '00:00:00', ''),
(188, 221, 37, 1, 122, '2023-11-11 07:49:07', '2023-11-11 07:49:07', 126, '00:00:00', '00:00:00', ''),
(189, 221, 38, 1, 120, '2023-11-11 07:49:07', '2023-11-11 07:49:07', 126, '00:00:00', '00:00:00', ''),
(190, 222, 37, 1, 123, '2023-11-12 10:39:16', '2023-11-12 10:39:16', 126, '06:34:00', '18:37:00', 'TH/F');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_request`
--

CREATE TABLE `enroll_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL COMMENT 'm=male\r\nf=female',
  `phone_number` varchar(11) DEFAULT NULL,
  `place_bdate` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lrn` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(11) DEFAULT NULL,
  `father_phone` varchar(11) DEFAULT NULL,
  `ext_name` varchar(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_request`
--

CREATE TABLE `form_request` (
  `form_id` int(11) NOT NULL,
  `request_by` varchar(255) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_request`
--

INSERT INTO `form_request` (`form_id`, `request_by`, `type`, `created_at`, `status`, `updated_at`, `phone_number`) VALUES
(13, '54', 'TOR', '2023-09-28 03:39:50', 'In Progress', '2023-09-28 03:39:50', NULL),
(14, '54', 'Form 137', '2023-09-28 03:39:55', 'Approve', '2023-10-10 17:15:17', NULL),
(15, '54', 'Form 137', '2023-09-29 05:05:21', 'Decline', '2023-10-18 07:58:34', NULL),
(16, '52', 'TOR', '2023-09-29 05:06:47', 'Decline', '2023-09-30 15:42:41', NULL),
(17, '52', 'Form 137', '2023-09-30 05:28:41', 'Decline', '2023-10-18 08:06:46', NULL),
(18, '52', 'TOR', '2023-09-30 07:44:20', 'Approve', '2023-10-01 23:38:13', NULL),
(27, '73', 'Form 137', '2023-10-12 23:58:59', 'Approve', '2023-10-12 23:59:28', NULL),
(28, '83', 'Form 137', '2023-10-15 23:51:48', 'Approve', '2023-10-18 08:06:41', NULL),
(29, '95', 'Form 137', '2023-10-16 05:44:04', 'Decline', '2023-10-20 23:57:23', NULL),
(31, '104', 'Form 137', '2023-10-22 00:55:13', 'In Progress', '2023-10-22 00:55:13', NULL),
(35, '30', 'Form 137', '2023-10-23 03:50:01', 'Decline', '2023-10-23 08:20:23', '09356842746'),
(36, '114', 'Form 137', '2023-10-23 04:43:39', 'Approve', '2023-10-23 04:57:25', '09356842746'),
(37, '115', 'Form 137', '2023-10-23 05:12:44', 'Approve', '2023-10-23 05:15:06', '09356842746'),
(38, '104', 'Form 137', '2023-10-23 08:30:39', 'Approve', '2023-10-25 08:24:33', '09356842746'),
(39, '132', 'Form 137', '2023-11-08 10:51:18', 'File Release', '2023-11-10 14:04:31', '09356842746'),
(40, '136', 'Form 137', '2023-11-08 15:55:12', 'Approve', '2023-11-08 15:55:24', '09356842746'),
(41, '137', 'Form 137', '2023-11-09 07:49:24', 'File Release', '2023-11-10 14:04:20', '09356842746'),
(42, '132', 'TOR', '2023-11-10 14:00:34', 'File Release', '2023-11-10 14:04:41', '09356842746');

-- --------------------------------------------------------

--
-- Table structure for table `grading_logs`
--

CREATE TABLE `grading_logs` (
  `gradinglogs_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `enddate` date NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `care_of` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading_logs`
--

INSERT INTO `grading_logs` (`gradinglogs_id`, `description`, `school_year_id`, `fromdate`, `enddate`, `inserted_at`, `updated_at`, `care_of`) VALUES
(8, 'firstgrading', 2, '2023-09-01', '2023-10-13', '2023-11-12 12:48:53', NULL, 126),
(9, 'secondgrading', 2, '2023-11-10', '2023-11-13', '2023-11-12 12:48:53', NULL, 126),
(10, 'thirdgrading', 2, '2023-11-14', '2023-11-16', '2023-11-12 12:48:53', NULL, 126),
(11, 'fourthgrading', 2, '2023-11-22', '2023-11-27', '2023-11-12 12:48:53', NULL, 126),
(12, 'firstgrading', 1, '2023-11-13', '2023-11-16', '2023-11-12 13:05:54', NULL, 126),
(13, 'secondgrading', 1, '2023-11-12', '2023-11-23', '2023-11-12 13:05:54', NULL, 126),
(14, 'thirdgrading', 1, '2023-11-28', '2023-11-30', '2023-11-12 13:05:54', NULL, 126),
(15, 'fourthgrading', 1, '2023-12-06', '2023-11-16', '2023-11-12 13:05:54', NULL, 126);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `year_name` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `year_name`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', '2023-10-14 20:08:35', '2023-10-14 20:30:19'),
(2, '2023-2024', '2023-10-14 20:09:19', '2023-10-14 20:09:19'),
(4, '2024-2025', '2023-10-14 20:13:48', '2023-10-14 20:13:48'),
(5, '2025-2026', '2023-10-14 20:13:55', '2023-10-14 20:13:55'),
(6, '2026-2027', '2023-10-14 20:30:32', '2023-10-14 20:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `setdate`
--

CREATE TABLE `setdate` (
  `id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `created_at`, `updated_at`, `description`) VALUES
(35, 'Math', '2023-10-13 20:35:14', '2023-11-06 04:20:51', 'Math'),
(36, 'English', '2023-10-13 20:36:36', '2023-10-13 20:36:36', 'English'),
(37, 'Science', '2023-10-13 20:37:42', '2023-10-13 20:38:14', 'Science'),
(38, 'TLE', '2023-10-14 01:46:30', '2023-10-14 01:46:30', 'Technology and Livelihood Education'),
(39, 'AP', '2023-10-14 01:46:41', '2023-10-14 01:46:41', 'Aralin Panlipunan'),
(40, 'Filipino', '2023-10-14 01:46:52', '2023-10-14 01:46:52', 'Tagalog'),
(48, 'MAPEH', '2023-11-09 07:23:49', '2023-11-09 07:23:49', 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `total_grades_sbujects`
--

CREATE TABLE `total_grades_sbujects` (
  `tgs_id` int(11) NOT NULL,
  `users_id` int(30) NOT NULL,
  `school_year_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `first_grading` decimal(10,0) DEFAULT NULL,
  `second_grading` decimal(10,0) DEFAULT NULL,
  `third_grading` decimal(10,0) DEFAULT NULL,
  `fourth_grading` decimal(10,0) DEFAULT NULL,
  `final_grades` decimal(10,0) DEFAULT NULL,
  `passed_failed` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_grades_sbujects`
--

INSERT INTO `total_grades_sbujects` (`tgs_id`, `users_id`, `school_year_id`, `subject_id`, `first_grading`, `second_grading`, `third_grading`, `fourth_grading`, `final_grades`, `passed_failed`, `created_at`, `updated_at`, `startDate`, `endDate`) VALUES
(5, 133, 1, 37, 75, 75, 75, 65, 73, 'FAILED', '2023-11-04 16:27:37', '2023-11-10 06:00:03', NULL, NULL),
(6, 133, 1, 36, 86, 75, 81, 82, 81, 'PASSED', '2023-11-04 16:27:37', '2023-11-04 16:28:27', NULL, NULL),
(8, 133, 1, 35, 86, 86, 86, 86, 86, 'PASSED', '2023-11-04 18:29:04', '2023-11-04 18:31:05', NULL, NULL),
(9, 133, 1, 39, 87, 85, 85, 85, 86, 'PASSED', '2023-11-04 18:35:37', '2023-11-10 06:00:03', NULL, NULL),
(14, 134, 1, 35, 85, 85, 85, 85, 85, 'PASSED', '2023-11-07 02:25:57', '2023-11-07 02:26:58', NULL, NULL),
(15, 134, 1, 40, 74, 74, 74, 75, 74, 'FAILED', '2023-11-07 02:25:57', '2023-11-07 02:26:58', NULL, NULL),
(16, 134, 1, 36, 85, 85, 75, 75, 80, 'PASSED', '2023-11-07 02:25:57', '2023-11-07 02:26:58', NULL, NULL),
(17, 134, 1, 39, 75, 75, 75, 75, 75, 'PASSED', '2023-11-07 02:25:57', '2023-11-07 02:26:58', NULL, NULL),
(19, 136, 1, 38, 75, 85, 85, 85, 83, 'PASSED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(20, 136, 1, 37, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(21, 136, 1, 35, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(22, 136, 1, 40, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(23, 136, 1, 36, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(24, 136, 1, 39, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-08 15:53:45', '2023-11-08 15:53:53', NULL, NULL),
(28, 137, 1, 38, 75, 75, 85, 85, 80, 'PASSED', '2023-11-09 07:43:42', '2023-11-09 07:44:56', NULL, NULL),
(29, 137, 1, 37, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-09 07:43:42', '2023-11-09 07:44:56', NULL, NULL),
(30, 137, 1, 40, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-09 07:43:42', '2023-11-09 07:44:56', NULL, NULL),
(31, 137, 1, 36, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-09 07:43:42', '2023-11-09 07:44:56', NULL, NULL),
(32, 137, 1, 39, NULL, NULL, NULL, NULL, 0, 'FAILED', '2023-11-09 07:43:42', '2023-11-09 07:44:56', NULL, NULL),
(34, 133, 1, 48, 75, 75, 75, 75, 75, 'PASSED', '2023-11-10 05:59:40', '2023-11-10 06:00:03', NULL, NULL),
(35, 133, 1, 38, 75, 75, 75, 75, 75, 'PASSED', '2023-11-10 05:59:40', '2023-11-10 06:00:03', NULL, NULL),
(36, 132, 1, 38, 75, 75, 75, 75, 75, 'PASSED', '2023-11-10 09:13:55', '2023-11-11 07:37:58', NULL, NULL),
(37, 132, 1, 36, 85, 85, 85, 85, 85, 'PASSED', '2023-11-11 07:40:27', '2023-11-11 07:40:35', NULL, NULL),
(38, 145, 1, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-12 01:23:57', '2023-11-12 01:23:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:teacher, 3:student, 4:faculty',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL COMMENT 'm=male\r\nf=female',
  `phone_number` varchar(11) DEFAULT NULL,
  `place_bdate` varchar(255) DEFAULT NULL,
  `lrn` varchar(20) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_year_id` int(11) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(11) DEFAULT NULL,
  `father_phone` varchar(11) DEFAULT NULL,
  `ext_name` varchar(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`, `last_name`, `middle_name`, `birthdate`, `address`, `age`, `gender`, `phone_number`, `place_bdate`, `lrn`, `class_id`, `school_year_id`, `mother_name`, `father_name`, `mother_phone`, `father_phone`, `ext_name`, `file`) VALUES
(76, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$YmZBrMFZJhCzuU2KAvv3EON1EOD31xDLe2dTyq9vOY8ezdqUtk01W', NULL, 1, '2023-10-14 03:48:55', '2023-10-14 03:49:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Sofia Decastro', 'teacher@gmail.com', NULL, '$2y$10$e3j52TTPaVtgBi1aKZ4H5OIyDM3Zaib6.ZySe.ENVa44bNZxUX9.i', 'BRB7Hkeaj972t6xiLblkQTHyEMc4M6RnWbtbfH9IgwFfXnHEZl0QvcMuYCHJ', 2, '2023-10-14 04:38:12', '2023-10-14 04:38:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Mica Salamanca', 'MicaSalamanca@gmail.com', NULL, '$2y$10$JYSKE501qLsQeQx6XVbjmuTE0WcvI/iaosF2b3MJuRZk8DUJNY7Uy', NULL, 2, '2023-10-14 04:39:09', '2023-10-14 04:39:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'fac', 'fa@gmail.com', NULL, '$2y$10$62jLdMvk7B8KncMbNT4Hgu3Vu.K68CB8J2bz8xzyQ42Aif7.ZVzgq', NULL, 1, '2023-10-14 04:45:39', '2023-10-14 04:45:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Christa McAuliffe', 'ChristaMcAuliffe@gmail.com', NULL, '$2y$10$Tsp8HSQuTkS7mUYgGrODKuAQiAMWUXGErSTo.KaCh87DvrMRp4ZYO', '1M3F2YUqMKXjXhLbfuboFePMIz0tAjW7i9ZGv1rEFBAmxIzc94TIQcJnRdWS', 2, '2023-10-23 12:39:16', '2023-10-23 12:39:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Jaime Escalante', 'JaimeEscalante@gmail.com', NULL, '$2y$10$awlVEafJbEScGWtlzqED7OKFzVJ9MDdSrRSRQGQYu7uEtVPaW9zRW', 'R211pCJZohpfYX55D4HgA9yemMxUz0l2aPAUj48fTFSaFApAVJtYF4uLdGTU', 2, '2023-10-23 12:40:08', '2023-10-23 12:40:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'MariaMontessori', 'MariaMontessori@gmail.com', NULL, '$2y$10$994Z2pX1/T0LzRp3IQ1uBeylGO1djP4jwX3.9mNMfsQVHZF9XwHOW', 'SqO2w8bVv6HIiZNRIQNrH1kgLw4iGLZHm0rTiiuDBOtS8N3DYbuFgDjExNPe', 2, '2023-10-23 12:40:38', '2023-10-24 14:18:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'admin', 'admin@gmail.com', NULL, '$2y$10$MPbPzETplfX64GT63pQ7RekyFnZOU1nvW1nQ9MBfwrDhJthjvsdtq', 'ijl854iiGKm5gtB8DTWHwFdIEBoIH9SL0YNqvpLNTHaa1Quy99UAlLrswRs1', 4, '2023-10-24 13:28:36', '2023-11-08 04:58:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'teacher1', 'teacher111@gmail.com', NULL, '$2y$10$xF49UN5VL594.R9BeEdorug0gDCT.ggC8QQHiNXuUMosOViF6R6G.', NULL, 2, '2023-10-24 14:37:25', '2023-10-24 14:37:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Tiki', 'tikin@gmail.com', NULL, '$2y$10$nvb1PdlCNKcivtW4LI/pdef3kqMbLZ1DiPOEm3suXjETl5YMh0WMq', 'Yy2AIEjPGTRHMyr3rVysrUshinCX6OKf4wWUl094oBKDYijONT0ihAHs0N5S', 2, '2023-10-25 02:37:50', '2023-10-25 02:37:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Sergio', 'sergio@gmail.com', NULL, '$2y$10$Ps4RzchTMu3f9Xt6W4jKyuFVLNNFeciMbz.j2qoi6aDRNmhbkvPU.', 'kKIVPzQ6LLm2JDvqGBAw8XD5zZo85kiZhB8VlbVXO2kHpWhGhOW7tYIWpmki', 3, '2023-11-03 02:12:23', '2023-11-08 04:51:55', 'Espiritu', 'B', '2023-11-11', 'Sta.Clara Buhi Cam Sur', 21, 'M', '09356842746', 'Sta.clara', '93023847195', 220, 1, 'Mother Espiritu', 'Father Espiritu', '', '09054329037', '', NULL),
(133, 'tesst', 'me@mydomain.com', NULL, '$2y$10$KpRQfbtCFiTw28TvsJ3Jr.UgFX.JiUAbdB5Y/hMsLLjV2RDtVGzA6', NULL, 3, '2023-11-03 02:15:57', '2023-11-03 02:15:57', 'test', 'test', '2023-11-17', 'full street address', 30, 'M', '09456842746', 'me@mydomain.com', '11764687153', 220, 1, 'mother', 'father', '09356842746', '09356842746', 'Jr', '1698939567.docx'),
(135, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$qxB65OhR/q7daVXZwNfyxu1vKPcy5O7ukZQKzWWpQSeSyZoXuBWYC', NULL, 4, '2023-11-08 04:57:52', '2023-11-08 04:57:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Angelo', 'angelo@gmail.com', NULL, '$2y$10$ImXFEjNh3esnkAqckI1x5.XHEdxez5goOB8qCObr83ZBQPZUhRWJq', 'OsngHq39t2bSMppXwcsEYxG6lLiq88S1wZqgRnWdU3xMD6wEYzUsToxGv3nv', 3, '2023-11-09 01:19:43', '2023-11-09 01:19:43', 'Espiritu', 'B', '2023-11-09', 'Santiago Isabela', 19, 'M', '09356842746', 'Manila Doctors Hospital', '39283845921', 220, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699514018.pdf'),
(138, 'Khenjie', 'kenjie@gmail.com', NULL, '$2y$10$K/bnQdZ2GegKwnQfS.q5Pevh4DTm/70RTi.dBuE/b6BKSv7.dwEjy', NULL, 3, '2023-11-10 07:08:37', '2023-11-10 07:08:37', 'Manaog', 'M.', '2023-10-24', 'Sta.Clara Buhi Cams Sur', 21, 'M', '09707440922', 'Sta.clara', '89563421569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Resty', 'restyflorendo@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Florendo', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '79081791868', 220, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(140, 'JohnCarlo', 'johncarlo@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Espiritu', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '79081827868', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(141, 'Joshua', 'joshua@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Orate', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '18291782748', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(142, 'Daniel', 'daniel@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Orate', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '32654186251', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(143, 'Jojo', 'jojo@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Orate', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '92018392038', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(144, 'Jesusa', 'jesusa@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Manlangit', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '21653298061', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(145, 'Martin', 'martin@gmail.com', NULL, '$2y$10$N5Upjb2pVlCeKVi59FwwkuPRFtYBCbTRmJzaPtP9eHFk98dOMSiu.', NULL, 3, '2023-11-11 01:45:35', '2023-11-11 01:45:35', 'Ailes', 'U', '2023-11-24', 'Sta.Clara Buhi, Camarines Sur', 19, 'M', '09356842746', 'Makati Medical Center', '79081791868', 221, 1, 'Arthur Samantela', 'Theresa Smantela', '09251426981', '09251426981', '', '1699621892.pdf'),
(146, 'Bianca', 'bianca@gmail.com', NULL, '$2y$10$kFbrmFwRv/RcdlUUq2KU8O2t1OvTXen4c5AbjEBpT2avXTjx9L36C', NULL, 3, '2023-11-11 03:02:35', '2023-11-11 03:02:35', 'Espiritu', 'S', '2023-11-11', 'Salvacion Buhi, Camarines Sur', 21, 'F', '09356842746', 'Makati Medical Center', '72948528193', 220, 1, 'Arthur Espiritu', 'Theresa Smantela', '09251426981', '09251426981', '', '1699693311.pdf');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_gl_sy`
-- (See below for the actual view)
--
CREATE TABLE `vw_gl_sy` (
`gradinglogs_id` int(11)
,`description` varchar(50)
,`school_year_id` int(11)
,`fromdate` date
,`enddate` date
,`inserted_at` datetime
,`updated_at` datetime
,`care_of` int(11)
,`year_name` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_gl_sy`
--
DROP TABLE IF EXISTS `vw_gl_sy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_gl_sy`  AS SELECT `gl`.`gradinglogs_id` AS `gradinglogs_id`, `gl`.`description` AS `description`, `gl`.`school_year_id` AS `school_year_id`, `gl`.`fromdate` AS `fromdate`, `gl`.`enddate` AS `enddate`, `gl`.`inserted_at` AS `inserted_at`, `gl`.`updated_at` AS `updated_at`, `gl`.`care_of` AS `care_of`, `sy`.`year_name` AS `year_name` FROM (`grading_logs` `gl` join `school_year` `sy` on(`gl`.`school_year_id` = `sy`.`school_year_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_request`
--
ALTER TABLE `enroll_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_request`
--
ALTER TABLE `form_request`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `grading_logs`
--
ALTER TABLE `grading_logs`
  ADD PRIMARY KEY (`gradinglogs_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `setdate`
--
ALTER TABLE `setdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `total_grades_sbujects`
--
ALTER TABLE `total_grades_sbujects`
  ADD PRIMARY KEY (`tgs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `enroll_request`
--
ALTER TABLE `enroll_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_request`
--
ALTER TABLE `form_request`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `grading_logs`
--
ALTER TABLE `grading_logs`
  MODIFY `gradinglogs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setdate`
--
ALTER TABLE `setdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `total_grades_sbujects`
--
ALTER TABLE `total_grades_sbujects`
  MODIFY `tgs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
