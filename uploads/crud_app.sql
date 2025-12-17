-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `created_at`, `quantity`) VALUES
(1, 'A4 paper', 1000.00, 'office', '2025-12-17 15:41:21', 50),
(3, 'laptop', 52000.00, 'Electronics', '2025-12-17 17:17:31', 95),
(4, 'wifi-router', 5000.00, 'Electronics', '2025-12-17 17:17:54', 20),
(5, 'office chair', 1500.00, 'office', '2025-12-17 17:18:15', 10),
(7, 'tissue paper', 50.00, 'misc', '2025-12-17 17:57:45', 30),
(8, 'Laptop', 55000.00, 'Electronics', '2025-12-17 18:27:27', 20),
(9, 'Smartphone', 25000.00, 'Electronics', '2025-12-17 18:27:27', 40),
(10, 'Bluetooth Speaker', 3000.00, 'Electronics', '2025-12-17 18:27:27', 35),
(11, 'WiFi Router', 4500.00, 'Electronics', '2025-12-17 18:27:27', 25),
(12, 'Headphones', 1500.00, 'Electronics', '2025-12-17 18:27:27', 50),
(13, 'LED Monitor', 12000.00, 'Electronics', '2025-12-17 18:27:27', 18),
(14, 'Office Chair', 3500.00, 'Office', '2025-12-17 18:27:27', 30),
(15, 'Office Desk', 8000.00, 'Office', '2025-12-17 18:27:27', 15),
(16, 'Printer', 9000.00, 'Office', '2025-12-17 18:27:27', 10),
(17, 'Scanner', 7000.00, 'Office', '2025-12-17 18:27:27', 8),
(18, 'Whiteboard', 2000.00, 'Office', '2025-12-17 18:27:27', 20),
(19, 'File Cabinet', 6000.00, 'Office', '2025-12-17 18:27:27', 12),
(20, 'Notebook', 80.00, 'Stationery', '2025-12-17 18:27:27', 200),
(21, 'Pen', 10.00, 'Stationery', '2025-12-17 18:27:27', 500),
(22, 'Marker', 50.00, 'Stationery', '2025-12-17 18:27:27', 150),
(23, 'Stapler', 120.00, 'Stationery', '2025-12-17 18:27:27', 60),
(24, 'Highlighter', 40.00, 'Stationery', '2025-12-17 18:27:27', 100),
(25, 'Calculator', 600.00, 'Stationery', '2025-12-17 18:27:28', 25),
(26, 'Water Bottle', 500.00, 'Kitchen', '2025-12-17 18:27:28', 45),
(27, 'Electric Kettle', 2200.00, 'Kitchen', '2025-12-17 18:27:28', 20),
(28, 'Microwave Oven', 15000.00, 'Kitchen', '2025-12-17 18:27:28', 10),
(29, 'Mixer Grinder', 3500.00, 'Kitchen', '2025-12-17 18:27:28', 18),
(30, 'Dinner Plate Set', 1800.00, 'Kitchen', '2025-12-17 18:27:28', 22),
(31, 'Gas Stove', 6500.00, 'Kitchen', '2025-12-17 18:27:28', 14),
(32, 'Office Fan', 2800.00, 'Appliances', '2025-12-17 18:27:28', 16),
(33, 'Air Cooler', 9500.00, 'Appliances', '2025-12-17 18:27:28', 9),
(34, 'Washing Machine', 22000.00, 'Appliances', '2025-12-17 18:27:28', 6),
(35, 'Vacuum Cleaner', 7000.00, 'Appliances', '2025-12-17 18:27:28', 11),
(36, 'Iron Box', 1800.00, 'Appliances', '2025-12-17 18:27:28', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
