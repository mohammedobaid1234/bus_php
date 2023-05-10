-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 04:57 PM
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
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `mobile_no`, `name`, `password`) VALUES
(1234, 'fywar@mailinator.com', '90', 'wuvucef', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `msg` text NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `msg`, `driver_id`, `created_at`) VALUES
(1, 'test', 'I cant become tomwroo', 1, '2023-04-19 00:23:22'),
(3, 'test1', 'I cant become tomwroo', 5, '2023-04-19 00:23:22'),
(4, 'Perferendis dolore o', 'Voluptate culpa id c', 4, '2023-04-20 00:17:18'),
(5, 'Perferendis dolore o', 'Voluptate culpa id c', 1, '2023-04-20 00:18:00'),
(6, 'Qui labore vitae und', 'Mollit est vitae qu', 1, '2023-04-20 00:18:03'),
(7, 'trest', 'trust\r\n', 6, '2023-04-20 02:16:28'),
(8, 'Thanks ', 'I Thanks you', 1, '2023-04-22 06:59:53'),
(9, 'Test', 'Test TestTest', 4, '2023-04-22 07:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bus_no` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `mobile_no`, `password`, `bus_no`, `created_at`) VALUES
(1, 'driver1', 'driver@gmail.com', '0594034429', '12345678', 20, '2023-04-18 19:13:59'),
(3, 'DRIVER2', 'DRIVER2@GMAIL.COM', '0594034421', '12345678', 21, '2023-04-19 16:46:27'),
(4, 'driver3', 'driver3@gmail.com', '059725841514', '12345678', NULL, '2023-04-19 18:54:13'),
(5, 'driver6', 'driver46@gmail.com', '05955511514', '12345678', NULL, '2023-04-19 18:54:13'),
(6, 'driver4', 'driver4@gmail.com', '0595554111514', '12345678', NULL, '2023-04-19 18:54:13'),
(7, 'driver7', 'driver7@gmail.com', '0597777777', '12345678', NULL, '2023-04-19 18:54:13'),
(8, 'driver8', 'driver8@gmail.com', '0598888888', '12345678', NULL, '2023-04-19 18:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `driver_id`) VALUES
(4, 'group1', 1),
(5, 'group2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `group_studuents`
--

CREATE TABLE `group_studuents` (
  `id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_studuents`
--

INSERT INTO `group_studuents` (`id`, `std_id`, `group_id`) VALUES
(1, 73, 4),
(2, 124545, 4),
(3, 20181589, 5),
(4, 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `relatives_mobile_no` varchar(255) DEFAULT NULL,
  `kinship_relationship` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `presence` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `city`, `neighborhood`, `mobile_no`, `relatives_mobile_no`, `kinship_relationship`, `blood_type`, `password`, `status`, `presence`, `updated_at`) VALUES
(3, 'Macey Farmer', 'vevufaw@mailinator.com', 'Quia molestiae eiusm', 'Dignissimos nostrum ', '12', '25', 'Ullam Nam iste quis ', 'Magnam provident ex', 'Pa$$w0rd!', 1, 2, '2023-04-19 18:58:20'),
(4, 'Kessie Cole', 'jimawyqa@mailinator.com', 'Tenetur praesentium ', 'Vel sit qui dolorib', '67', '12', 'Et qui laudantium i', 'Tenetur porro nulla ', 'Pa$$w0rd!', 1, 2, '2023-04-19 18:58:03'),
(7, 'Vladimir Solis', 'qymahob@mailinator.com', 'Eveniet dolore ea v', 'Id pariatur Sunt o', '78', '58', 'Iusto ullam Nam cons', 'Vel dolore sapiente ', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:57:52'),
(12, 'Vaughan House', 'suzizu@mailinator.com', 'Necessitatibus susci', 'Voluptate aut iste q', '11', '97', 'Illo rerum eaque dol', 'Quia anim perferendi', 'Pa$$w0rd!', 1, NULL, '2023-04-22 06:41:03'),
(30, 'Nadine Solis', 'xilepegu@mailinator.com', 'Qui id magna vel ape', 'Reiciendis voluptate', '60', '42', 'Saepe ut mollitia ad', 'Molestias cumque mol', 'Pa$$w0rd!', 1, 1, '2023-04-22 06:54:47'),
(33, 'Blaze Nichols', 'kohyk@mailinator.com', 'Ipsum dolore ut sed ', 'Laudantium in assum', '44', '54', 'Sed recusandae Face', 'Dolor rem ullamco ea', 'Pa$$w0rd!', 1, 1, '2023-04-19 18:58:24'),
(38, 'Bradley Anderson', 'valyky@mailinator.com', 'Enim aute qui recusa', 'Ea sunt voluptatem a', '91', '35', 'Autem deleniti quam ', 'Porro incididunt pra', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:58:08'),
(39, 'Jenette Roman', 'wodidutuho@mailinator.com', 'Voluptas omnis vel d', 'Labore dolore et omn', '51', '75', 'Rerum duis nostrud a', 'Nam dolore numquam u', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:54:40'),
(40, 'Yael Hodge', 'rapylog@mailinator.com', 'Est similique except', 'Lorem aliquip facili', '66', '42', 'Amet dolores nulla ', 'Sint magni laboris a', 'Pa$$w0rd!', 2, 2, '2023-04-18 13:41:25'),
(41, 'Illiana Richard', 'vulakap@mailinator.com', 'Repudiandae magni ac', 'Modi doloremque non ', '59', '100', 'Possimus sit eligen', 'Deleniti elit repel', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:55:04'),
(43, 'Alana Vance', 'nehake@mailinator.com', 'Amet placeat dolor', 'Et expedita rem cons', '2', '46', 'Quam consectetur ips', 'Cumque enim iure iur', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:57:56'),
(56, 'Iliana Guzman', 'ricucetab@mailinator.com', 'Qui minim voluptatum', 'Libero lorem archite', '1', '35', 'Accusantium nisi dol', 'Corporis quibusdam e', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:57:42'),
(58, 'Baker Snow', 'xyqu@mailinator.com', 'Voluptatem Saepe qu', 'Voluptas nemo nihil ', '73', '12', 'Elit itaque modi of', 'Et ea hic deserunt n', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:58:16'),
(59, 'Chloe Bradshaw', 'wogybiqi@mailinator.com', 'Obcaecati et nulla m', 'Aliquid voluptatum n', '14', '14', 'Numquam necessitatib', 'Autem aut necessitat', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:54:58'),
(62, 'Chadwick Clark', 'cuwaqop@mailinator.com', 'Et do iste quam volu', 'Consequatur et ex o', '79', '79', 'Aperiam enim ducimus', 'Debitis doloribus co', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:58:11'),
(64, 'Vanna Guerrero', 'lidagex@mailinator.com', 'Et ad molestiae nost', 'Hic et qui blanditii', '92', '28', 'Qui corporis deserun', 'Et ea nihil do ratio', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:58:01'),
(67, 'George Cain', 'dopotyn@mailinator.com', 'Molestiae rem et atq', 'Corporis in magna no', '13', '34', 'Ratione et provident', 'Ipsum ut qui eiusmod', 'Pa$$w0rd!', 1, NULL, '2023-04-23 14:55:50'),
(68, 'Uta Coffey', 'ciliko@mailinator.com', 'At accusamus invento', 'Nihil ipsum et imped', '30', '45', 'Ex voluptas natus ei', 'Aliquip vel nemo odi', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:54:53'),
(69, 'Lysandra Austin', 'junod@mailinator.com', 'Aut nulla officia ut', 'Id quae itaque vitae', '4', '19', 'In cum voluptas volu', 'Aut hic exercitation', 'Pa$$w0rd!', 1, NULL, '2023-04-22 06:54:19'),
(71, 'Lacota Gay', 'mamezamavu@mailinator.com', 'Excepturi qui nulla ', 'Commodo sunt repudia', '1', '63', 'Et natus et ea deser', 'Ut sint labore nihi', 'Pa$$w0rd!', 1, NULL, '2023-04-19 18:57:46'),
(73, 'Adena Kane', 'pyquhu@mailinator.com', 'Eos nostrum placeat', 'Vel eveniet consequ', '13', '15', 'Fugiat aliquid praes', 'Et totam quos quia o', 'Pa$$w0rd!', 1, 2, '2023-04-18 13:41:00'),
(80, 'Nathaniel Beach', 'gaqiqutefa@mailinator.com', 'Ut temporibus ut ad ', 'Ex ab quisquam hic v', '26', '51', 'Nihil molestiae exce', 'Laborum Possimus r', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:54:49'),
(81, 'Gisela Patel', 'sudupyqa@mailinator.com', 'Et dicta quo accusan', 'Culpa consequat Est', '67', '98', 'Est distinctio Aut', 'Exercitationem repud', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:55:13'),
(82, 'Deborah Hernandez', 'duje@mailinator.com', 'Ut et quia dolore si', 'Tempore velit dist', '22', '6', 'Quos quo aliquam sed', 'Ullam culpa in sit ', 'Pa$$w0rd!', 1, NULL, '2023-04-23 14:56:17'),
(85, 'Marshall Noel', 'vosuzi@mailinator.com', 'Quia neque repellend', 'Pariatur Veniam ad', '4', '70', 'Quis vero aut sunt ', 'Pariatur Tempore e', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:54:44'),
(89, 'Vernon Wolfe', 'roby@mailinator.com', 'Qui inventore vitae ', 'Ipsum non voluptas ', '54', '69', 'Anim et aut ipsam su', 'Quo et cillum autem ', 'Pa$$w0rd!', 1, NULL, '2023-04-20 13:55:08'),
(124545, 'Ahamad obaid', 'mhmd.obaid.18@gmail.com', 'gaza', 'Gaza, Alnasser', '0594034429', '0599826189', 'Father', 'O+', '12345678', 2, 1, '2023-04-18 13:24:57'),
(20181589, 'Mohammed obaid', 'mhmd.obaid.18@gmail.com', 'gaza', 'Qui in sed et earum ', '0594034429', '0594034429', 'Excepteur nobis in q', 'Aut et ratione excep', '12345678', 3, NULL, '2023-04-19 14:46:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_announcements` (`driver_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_group` (`driver_id`);

--
-- Indexes for table `group_studuents`
--
ALTER TABLE `group_studuents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_group` (`std_id`),
  ADD KEY `group_id_group` (`group_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `group_studuents`
--
ALTER TABLE `group_studuents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `driver_announcements` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `driver_group` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_studuents`
--
ALTER TABLE `group_studuents`
  ADD CONSTRAINT `group_id_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_group` FOREIGN KEY (`std_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
