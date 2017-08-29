-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 04:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `air`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f35534196ca96ca7c7fa50d1a41ba5ea', '::1', 'Mozilla/5.0 (Windows NT 10.0; rv:55.0) Gecko/20100101 Firefox/55.0', 1502005945, 'a:8:{s:9:"user_data";s:0:"";s:8:"username";s:10:"superadmin";s:7:"user_id";s:1:"7";s:7:"role_id";s:1:"1";s:5:"email";s:21:"anlisha@amniltech.com";s:4:"name";s:16:"Anlisha Maharjan";s:9:"role_type";s:0:"";s:12:"admin_log_id";i:19;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_type` enum('1','2','3','4') COLLATE utf8_unicode_ci DEFAULT '4' COMMENT '1=product,2=offer,3=service,4=other',
  `created_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_log`
--

CREATE TABLE `tbl_admin_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `logged_in_time` int(11) NOT NULL,
  `logged_out_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_log`
--

INSERT INTO `tbl_admin_log` (`id`, `user_id`, `logged_in_time`, `logged_out_time`) VALUES
(1, 7, 1501176559, 1501177480),
(2, 7, 1501177489, 0),
(3, 7, 1501301982, 1501303201),
(4, 7, 1501303208, 0),
(5, 7, 1501323120, 0),
(6, 7, 1501341580, 0),
(7, 7, 1501382768, 1501382791),
(8, 7, 1501383238, 0),
(9, 7, 1501418075, 0),
(10, 7, 1501450650, 0),
(11, 7, 1501726869, 0),
(12, 7, 1501903930, 1501928982),
(13, 7, 1501929220, 1501929232),
(14, 7, 1501929298, 1501929309),
(15, 68, 1501929319, 1501929330),
(16, 0, 1501929336, 0),
(17, 7, 1501929346, 0),
(18, 7, 1501980437, 0),
(19, 7, 1502003734, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `slug` varchar(100) NOT NULL,
  `created_on` int(15) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `name`, `latitude`, `longitude`, `status`, `slug`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 'Kalanki', '27.6931', '85.2807', 'Active', 'kalanki', 1501312420, 1501341663, 7, 7),
(2, 'Bhaktapur', '27.6710', '85.4298', 'Active', 'bhaktapur', 1501312433, 1501341705, 7, 7),
(3, 'Maitighar', '27.6920', '85.3230', 'Active', 'maitighar', 1501418162, 1501418162, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`id`, `title`, `latitude`, `longitude`) VALUES
(1, 'Achham', '29.050000', '81.300000'),
(2, 'Arghakhanchi', '28.000833', '83.246667'),
(3, 'Baglung', '28.266667', '83.600000'),
(4, 'Baitadi', '29.518579', '80.468806'),
(5, 'Bajhang', '29.550000', '81.200000'),
(6, 'Bajura', '29.446944', '81.486667'),
(7, 'Banke', '28.050000', '81.616667'),
(8, 'Bara', '27.033333', '85'),
(9, 'Bardiya', '28.816667', '80.483333'),
(10, 'Bhaktapur', '27.673031', '85.427856'),
(11, 'Bhojpur', '27.166667', '87.050000'),
(12, 'Chitwan', '27.529131', '84.354205'),
(13, 'Dadeldhura', '29.299201', '80.587586'),
(14, 'Dailekh', '28.837500', '81.707778'),
(15, 'Dang Deukhuri', '28', '82.266667'),
(16, 'Darchula', '29.830000', '80.550000'),
(17, 'Dhading', '27.866667', '84.916667'),
(18, 'Dhankuta', '26.983333', '87.333333'),
(19, 'Dhanusa', '26.835047', '86.012157'),
(20, 'Dholkha', '27.778429', '86.175176'),
(21, 'Dolpa', '28.998686', '82.816437'),
(22, 'Doti', '29.266667', '80.983333'),
(23, 'Gorkha', '28', '84.633333'),
(24, 'Gulmi', '28.088934', '83.293409'),
(25, 'Humla', '29.966667', '81.833333'),
(26, 'Ilam', '26.900000', '87.933333'),
(27, 'Jajarkot', '28.730000', '82.220000'),
(28, 'Jhapa', '26.639820', '87.894245'),
(29, 'Jumla', '29.275278', '82.183333'),
(30, 'Kailali', '28.683333', '80.600000'),
(31, 'Kalikot', '29.150000', '81.616667'),
(32, 'Kanchanpur', '28.200000', '82.166667'),
(33, 'Kapilvastu', '27.543441', '83.054931'),
(34, 'Kaski', '28.282360', '83.866028'),
(35, 'Kathmandu', '27.702871', '85.318244'),
(36, 'Kavrepalanchok', '27.525942', '85.561210'),
(37, 'Khotang', '27.231718', '86.822034'),
(38, 'Lalitpur', '27.541967', '85.334297'),
(39, 'Lamjung', '28.276549', '84.354205'),
(40, 'Mahottari', '26.876192', '85.807660'),
(41, 'Makwanpur', '27.373001', '85.189404'),
(42, 'Manang', '28.666667', '84.016667'),
(43, 'Morang', '26.679900', '87.460397'),
(44, 'Mugu', '29.866667', '82.616667'),
(45, 'Mustang', '28.998507', '83.847302'),
(46, 'Myagdi', '28.611176', '83.507020'),
(47, 'Nawalparasi', '27.649841', '83.889706'),
(48, 'Nuwakot', '27.970000', '83.060000'),
(49, 'Okhaldhunga', '27.316667', '86.500000'),
(50, 'Palpa', '27.866667', '83.550000'),
(51, 'Panchthar', '27.203640', '87.815671'),
(52, 'Parbat', '28.178049', '83.698657'),
(53, 'Parsa', '26.883333', '85.633333'),
(54, 'Pyuthan', '28.100000', '82.866667'),
(55, 'Ramechhap', '27.333333', '86.083333'),
(56, 'Rasuwa', '27.083333', '86.433333'),
(57, 'Rautahat', '26.570000', '86.530000'),
(58, 'Rolpa', '28.381562', '82.648344'),
(59, 'Rukum', '28.743442', '82.475276'),
(60, 'Rupandehi', '27.626424', '83.378939'),
(61, 'Salyan', '28.280000', '83.790000'),
(62, 'Sankhuwasabha', '27.614192', '87.142290'),
(63, 'Saptari', '26.617262', '86.701389'),
(64, 'Sarlahi', '27.008409', '85.520024'),
(65, 'Sindhuli', '27.256882', '85.971322'),
(66, 'Sindhupalchok', '27.951203', '85.684578'),
(67, 'Siraha', '26.656031', '86.208847'),
(68, 'Solukhumbu', '27.790973', '86.661108'),
(69, 'Sunsari', '26.627552', '87.182171'),
(70, 'Surkhet', '28.600000', '81.633333'),
(71, 'Syangja', '28.104633', '83.879107'),
(72, 'Tanahu', '27.944705', '84.227880'),
(73, 'Taplejung', '27.350000', '87.666667'),
(74, 'Terhathum', '27.198391', '87.500008'),
(75, 'Udayapur', '27.570000', '82.900000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `icon_class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `social` enum('On','Off') COLLATE utf8_unicode_ci DEFAULT 'Off',
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  `orderNumber` int(11) DEFAULT '1',
  `public_module` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'Yes',
  `global_module` tinyint(1) DEFAULT '1',
  `show_in_navigation` enum('1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`id`, `name`, `slug`, `priority`, `parent_id`, `icon_class`, `social`, `updated_by`, `updated_on`, `orderNumber`, `public_module`, `global_module`, `show_in_navigation`, `created_on`, `created_by`) VALUES
(9, 'Module Manager', 'module', 0, 140, '', 'Off', 7, 1501303482, 33, 'No', 1, '1', NULL, NULL),
(10, 'Role Module Manager', 'rolemodule', 0, 140, '', 'Off', 7, 1501303516, 34, 'No', 1, '1', NULL, NULL),
(20, 'Users', 'user', 0, 0, 'fa fa-users', 'Off', 7, 1492052691, 40, 'No', 1, '1', NULL, NULL),
(94, 'Role Manager', 'role', 0, 140, '', 'Off', 7, 1501303499, 29, 'Yes', 1, '1', NULL, NULL),
(132, 'Admin Log', 'adminlog', 0, 0, 'fa fa-archive', 'Off', 7, 1492052691, 6, 'Yes', 1, '1', 1467882032, 7),
(140, 'Settings', '#', 0, 0, 'fa fa-cogs', 'Off', 7, 1501303467, 1, 'Yes', 1, '1', 1501303467, 7),
(141, 'Site', 'site', 0, 0, 'fa fa-tasks', 'Off', 7, 1501305713, 1, 'Yes', 1, '1', 1501305713, 7),
(142, 'Pollutant', 'pollutant', 0, 0, 'fa fa-files-o', 'Off', 7, 1501308015, 1, 'Yes', 1, '1', 1501308015, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pollutant`
--

CREATE TABLE `tbl_pollutant` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `co` varchar(250) NOT NULL,
  `dust` varchar(250) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pollutant`
--

INSERT INTO `tbl_pollutant` (`id`, `area_id`, `co`, `dust`, `datetime`) VALUES
(1, 1, '224', '311', '2017-08-06 03:15:00'),
(2, 1, '184', '99', '2017-08-06 00:14:00'),
(3, 1, '180', '92', '2017-08-05 21:14:00'),
(4, 1, '177', '89', '2017-08-05 18:14:00'),
(5, 1, '177', '92', '2017-08-05 15:14:00'),
(6, 1, '176', '88', '2017-08-05 12:14:00'),
(7, 1, '174', '83', '2017-08-05 09:14:00'),
(8, 1, '172', '80', '2017-08-05 06:14:00'),
(9, 3, '133', '19', '2017-08-06 06:20:00'),
(10, 3, '125', '12', '2017-08-06 07:20:58'),
(11, 2, '81', '23', '2017-08-05 09:36:00'),
(12, 2, '89', '34', '2017-08-05 12:36:00'),
(110, 3, '107', '19.00', '2017-08-06 10:25:40'),
(111, 3, '106', '19.00', '2017-08-06 10:25:44'),
(112, 3, '94', '19.00', '2017-08-06 10:26:15'),
(113, 3, '91', '9.00', '2017-08-06 10:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `role_type` enum('editor','reviewer','','') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`, `updated_by`, `updated_on`, `created_by`, `created_on`, `role_type`) VALUES
(1, 'Super Administrator', 'Super Administrator', NULL, NULL, NULL, NULL, ''),
(19, 'Admin', '<p>Admin</p>\r\n', 7, 1501303015, 7, 1501303015, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_module`
--

CREATE TABLE `tbl_role_module` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `permission` varchar(4) COLLATE utf8_unicode_ci DEFAULT '1111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role_module`
--

INSERT INTO `tbl_role_module` (`id`, `module_id`, `role_id`, `permission`) VALUES
(214, 132, 19, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  `token_generated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `user_type` enum('Backend','Frontend') COLLATE utf8_unicode_ci DEFAULT 'Backend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `username`, `password`, `role_id`, `status`, `updated_by`, `updated_on`, `token_generated_at`, `created_by`, `created_on`, `user_type`) VALUES
(7, 'Anlisha Maharjan', 'anlisha@amniltech.com', 'superadmin', '$2y$10$F918sD7pGv680FBI9Bosj.0/XoPxmDyS9nPCM2CTeMQyb2ZaTWt6S', 1, 'Active', NULL, 1467262999, NULL, NULL, NULL, 'Backend'),
(68, 'Prashraya Hada', 'prashraya@gmail.com', 'hada', '$2y$10$BBzyXfZ4AsbUewLAq6ltAO70YE5K6E8E.h8DXOmNoSAWho/u2cRhS', 1, 'Active', 7, 1501303195, NULL, 7, 1501303160, 'Backend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zones`
--

CREATE TABLE `tbl_zones` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zones`
--

INSERT INTO `tbl_zones` (`id`, `name`) VALUES
(1, 'Mechi'),
(2, 'Rapti'),
(3, 'Bagmati'),
(4, 'Karnali'),
(5, 'Sagarmatha'),
(6, 'Koshi'),
(7, 'Narayani'),
(8, 'Mahakali'),
(9, 'Gandaki'),
(10, 'Janakpur'),
(11, 'Lumbini'),
(12, 'Seti'),
(13, 'Bheri'),
(14, 'Dhawalagiri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_log`
--
ALTER TABLE `tbl_admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category user create` (`created_by`),
  ADD KEY `category user update` (`updated_by`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Module` (`updated_by`),
  ADD KEY `module user create` (`created_by`);

--
-- Indexes for table `tbl_pollutant`
--
ALTER TABLE `tbl_pollutant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User Role` (`updated_by`),
  ADD KEY `role user create` (`created_by`);

--
-- Indexes for table `tbl_role_module`
--
ALTER TABLE `tbl_role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK Module Role` (`module_id`),
  ADD KEY `FK User Role` (`role_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user user` (`updated_by`),
  ADD KEY `create user` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin_log`
--
ALTER TABLE `tbl_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `tbl_pollutant`
--
ALTER TABLE `tbl_pollutant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_role_module`
--
ALTER TABLE `tbl_role_module`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD CONSTRAINT `category user create` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category user update` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD CONSTRAINT `User Module` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `module user create` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD CONSTRAINT `User Role` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `role user create` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_role_module`
--
ALTER TABLE `tbl_role_module`
  ADD CONSTRAINT `FK Module Role` FOREIGN KEY (`module_id`) REFERENCES `tbl_module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK User Role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `create user` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `update user` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
