-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2025 at 03:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `io_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `plat_number` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `chat_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `address`, `gender`, `phone`, `email`, `password`, `status`, `vehicle_type`, `plat_number`, `balance`, `rfid`, `chat_id`, `created_at`) VALUES
(1, 'Diaz', 'Bandung', 'Laki-Laki', '08123456789', 'dias@gmail.com', '$2y$10$FJdX.zMZLqyZd6JKYZK/HOCVwdrirql8sq0VuAzcZS0Btoo/fos.e', 1, 'Roda Dua', 'D 3755 ZDR', 76000, '43 70 18 2', '926558171', '2025-07-28 00:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `member_topups`
--

CREATE TABLE `member_topups` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `topup_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_topups`
--

INSERT INTO `member_topups` (`id`, `member_id`, `code`, `amount`, `payment_method`, `status`, `topup_by`, `created_at`) VALUES
(8, 1, 'TOPUP-20250727201211', 1000, 'Transfer', 'Berhasil', 1, '2025-07-28 01:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `parking_rates`
--

CREATE TABLE `parking_rates` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `base_duration` varchar(255) NOT NULL,
  `base_rate` int(11) NOT NULL,
  `additional_per_hour` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_rates`
--

INSERT INTO `parking_rates` (`id`, `vehicle_type`, `base_duration`, `base_rate`, `additional_per_hour`, `created_at`) VALUES
(1, 'Roda Dua', '1 Jam', 2000, 1000, '2025-07-28 00:47:41'),
(4, 'Roda Empat', '1 Jam', 5000, 2000, '2025-07-28 00:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` int(11) NOT NULL,
  `slot_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `slot_code`, `name`, `status`, `updated_at`) VALUES
(1, 'slot_a', 'A-01', 1, '2025-07-28 00:54:47'),
(3, 'slot_b', 'A-02', 1, '2025-07-29 14:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `parking_transactions`
--

CREATE TABLE `parking_transactions` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `entry_time` datetime NOT NULL,
  `exit_time` datetime DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `handled_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_transactions`
--

INSERT INTO `parking_transactions` (`id`, `member_id`, `entry_time`, `exit_time`, `duration`, `amount`, `payment_type`, `payment_status`, `handled_by`, `created_at`) VALUES
(25, 1, '2025-08-03 22:28:22', '2025-08-03 22:28:45', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:28:22'),
(26, 1, '2025-08-03 22:36:19', '2025-08-03 22:36:39', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:36:19'),
(27, 1, '2025-08-03 22:36:53', '2025-08-03 22:37:58', '0 hari, 0 jam, 1 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:36:53'),
(28, 1, '2025-08-03 22:38:09', '2025-08-03 22:38:27', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:38:09'),
(29, 1, '2025-08-03 22:38:48', '2025-08-03 22:39:00', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:38:48'),
(30, 1, '2025-08-03 22:41:48', '2025-08-03 22:41:59', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:41:48'),
(31, 1, '2025-08-03 22:49:09', '2025-08-03 22:49:49', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:49:09'),
(32, 1, '2025-08-03 22:50:00', '2025-08-03 22:51:47', '0 hari, 0 jam, 1 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:50:00'),
(33, 1, '2025-08-03 22:51:58', '2025-08-03 22:54:49', '0 hari, 0 jam, 2 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 22:51:58'),
(34, 1, '2025-08-03 23:13:04', '2025-08-03 23:13:20', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 23:13:04'),
(35, 1, '2025-08-03 23:13:31', '2025-08-03 23:13:42', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 23:13:31'),
(36, 1, '2025-08-03 23:17:59', '2025-08-03 23:18:12', '0 hari, 0 jam, 0 menit', 2000, 'Mandiri', 'Berhasil', 1, '2025-08-03 23:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `telegram_bot_key` varchar(255) NOT NULL,
  `new_rfid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `app_name`, `app_description`, `app_logo`, `telegram_bot_key`, `new_rfid`, `created_at`, `updated_at`) VALUES
(1, 'io.Park', 'Cool Smart Parking', 'logo-1753637109.png', '8294493284:AAFDV_z_A0hC1mk85UTQM8NuCJgQcQjB-no', '83 72 a5 2c', '2025-07-25 17:30:17', '2025-07-25 17:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `gender`, `phone`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'Bandung', 'Laki-Laki', '08123456789', 'admin@admin.com', '$2y$10$XP5dEj4oF3N8qgdBqyuuCeI1HwJYkDZB8U0yp6tJr4mvGAcc7ASzK', 'Admin', '2025-07-27 14:13:09'),
(7, 'Operator', 'Bandung', 'Laki-Laki', '-', 'operator@operator.com', '$2y$10$DPf5nNtTb1OL3N4XfknqN.XDCoKeUvNjEr6MbOQ.ulOSaXfDS2/VG', 'Operator', '2025-07-27 17:18:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_topups`
--
ALTER TABLE `member_topups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_rates`
--
ALTER TABLE `parking_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_transactions`
--
ALTER TABLE `parking_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_topups`
--
ALTER TABLE `member_topups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parking_rates`
--
ALTER TABLE `parking_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parking_transactions`
--
ALTER TABLE `parking_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
