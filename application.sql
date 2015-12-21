-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 21 дек 2015 в 03:32
-- Версия на сървъра: 5.6.26
-- PHP Version: 7.0.0RC6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `comment_text` varchar(3000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `user_id`, `date_time`) VALUES
(4, '<img alt="" src="https://pbs.twimg.com/profile_images/663653377017061376/C8hg9fpl.jpg">', 4, '2015-12-19 12:19:46'),
(20, 'Lorem ipsum dolor sit amet, vel nec lacus purus enim, nisl morbi, metus pede dictum turpis id etiam, suscipit turpis tincidunt lacus lectus at eu. Bibendum curabitur ante pellentesque egestas lectus in, cras enim ac sapien mi vitae nunc, ultricies non. Lacus in bibendum felis mauris, quis in, auctor interdum volutpat wisi penatibus. Ut lacinia sapien in, ultrices justo donec volutpat vestibulum faucibus nec, lectus sed, tortor sed lacinia sed. Metus justo ut, sed integer', 4, '2015-12-21 12:13:17'),
(21, '<b>Lorem ipsum dolor sit amet, vel nec lacus purus enim, nisl morbi, metus pede dictum turpis id etiam, suscipit turpis tincidunt lacus lectus at eu. Bibendum curabitur ante pellentesque egestas lectus in, cras enim ac sapien mi vitae nunc, ultricies non. Lacus in bibendum felis mauris, quis in, auctor interdum volutpat wisi penatibus. Ut lacinia sapien in, ultrices justo donec volutpat vestibulum faucibus nec, lectus sed, tortor sed lacinia sed. Metus justo ut, sed integer</b>', 4, '2015-12-21 12:13:26'),
(22, 'Lorem ipsum dolor sit amet, vel nec lacus purus enim, nisl morbi, metus pede dictum turpis id etiam, suscipit turpis tincidunt lacus lectus at eu. Bibendum curabitur ante pellentesque egestas lectus in, cras enim ac sapien mi vitae nunc, ultricies non. Lacus in bibendum felis mauris, quis in, auctor interdum volutpat wisi penatibus. Ut lacinia sapien in, ultrices justo donec volutpat vestibulum faucibus nec, lectus sed, tortor sed lacinia sed. Metus justo ut, sed integer', 4, '2015-12-21 12:13:34'),
(23, '<ol><li>Lorem ipsum dolor sit amet, vel nec lacus purus enim, nisl morbi, metus pede dictum turpis id etiam, suscipit turpis tincidunt lacus lectus at eu. Bibendum curabitur ante pellentesque egestas lectus in, cras enim ac sapien mi vitae nunc, ultricies non. Lacus in bibendum felis mauris, quis in, auctor interdum volutpat wisi penatibus. Ut lacinia sapien in, ultrices justo donec volutpat vestibulum faucibus nec, lectus sed, tortor sed lacinia sed. Metus justo ut, sed integer</li></ol>', 4, '2015-12-21 12:13:45'),
(24, '<u>Lorem ipsum dolor sit amet, vel nec lacus purus enim, nisl morbi, metus pede dictum turpis id etiam, suscipit turpis tincidunt lacus lectus at eu. Bibendum curabitur ante pellentesque egestas lectus in, cras enim ac sapien mi vitae nunc, ultricies non. Lacus in bibendum felis mauris, quis in, auctor interdum volutpat wisi penatibus. Ut lacinia sapien in, ultrices justo donec volutpat vestibulum faucibus nec, lectus sed, tortor sed lacinia sed. Metus justo ut, sed integer</u>', 4, '2015-12-21 12:13:53'),
(25, '<img alt="" src="http://www.arsenal.com/assets/_files/scaled/696x392/jan_13/gun__1358428400_shirt_badge.jpg">', 4, '2015-12-21 12:15:12');

-- --------------------------------------------------------

--
-- Структура на таблица `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `halls_id` int(11) DEFAULT NULL,
  `time_begin` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `number_of_breaks` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `conference`
--

INSERT INTO `conference` (`id`, `name`, `creator_id`, `halls_id`, `time_begin`, `time_end`, `number_of_breaks`, `status_id`) VALUES
(54, 'C# Basics', 4, 1, '2015-12-22 05:01:00', '2015-12-23 16:00:00', 2, 1),
(55, 'Web Fundamentals (HTML/CSS)', 4, 1, '2015-12-22 16:00:00', '2015-12-23 18:00:00', 2, 1),
(56, 'JavaScript Basics', 4, 2, '2015-12-22 13:00:00', '2015-12-23 17:00:00', 2, 2),
(57, 'Java Basics', 4, 2, '2015-12-22 00:30:00', '2015-12-24 16:00:00', 2, 2),
(58, 'PHP Basics', 4, 1, '2015-12-25 00:30:00', '2015-12-25 16:00:00', 2, 1),
(59, 'Teamwork and Personal Skills', 4, 1, '2015-12-23 13:00:00', '2015-12-24 17:00:00', 2, 1),
(60, 'Object-Oriented Programming', 4, 1, '2015-12-23 09:00:00', '2015-12-24 16:00:00', 2, 1),
(61, 'Advanced JavaScript', 4, 1, '2015-12-24 00:00:00', '2015-12-25 16:00:00', 2, 1),
(62, 'High-Quality Code', 4, 9, '2015-12-23 12:00:00', '2015-12-24 16:00:00', 2, 2),
(63, 'JavaScript Applications', 4, 2, '2015-12-23 13:00:00', '2015-12-25 16:00:00', 2, 1),
(64, 'JavaScript Frameworks', 4, 1, '2015-12-23 00:00:00', '2015-12-25 00:00:00', 2, 1),
(65, 'Databases', 4, 1, '2015-12-24 13:00:00', '2015-12-26 16:00:00', 2, 1),
(66, 'Database Applications', 4, 1, '2015-12-25 00:00:00', '2015-12-26 00:00:00', 2, 1),
(67, 'Web Services and Cloud', 4, 3, '2015-12-22 12:00:00', '2015-12-22 21:00:00', 2, 2),
(68, 'Web Development Basics', 4, 1, '2015-12-22 12:00:00', '2015-12-23 16:00:00', 2, 1),
(69, 'ASP.NET MVC', 4, 1, '2015-12-24 13:00:00', '2015-12-26 16:00:00', 2, 1),
(70, 'Data Structures', 4, 1, '2015-12-24 12:00:00', '2015-12-25 16:00:00', 2, 1),
(71, 'Аlgorithms', 4, 1, '2015-12-23 08:00:00', '2015-12-24 16:00:00', 2, 1),
(72, 'Drupal Site Buildin', 4, 1, '2015-12-23 12:00:00', '2015-12-24 16:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `conference_status`
--

CREATE TABLE IF NOT EXISTS `conference_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `conference_status`
--

INSERT INTO `conference_status` (`id`, `name`) VALUES
(1, 'must visit'),
(2, 'open');

-- --------------------------------------------------------

--
-- Структура на таблица `halls`
--

CREATE TABLE IF NOT EXISTS `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `halls`
--

INSERT INTO `halls` (`id`, `name`, `capacity`) VALUES
(1, 'Open Source Lab', 200),
(2, 'Inspiration Lab', 300),
(3, 'Code Ground Lab', 200),
(9, 'TestCapacity', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `lector_conference`
--

CREATE TABLE IF NOT EXISTS `lector_conference` (
  `lector_id` int(11) NOT NULL,
  `conference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(4, 'conference administrator'),
(3, 'conference owner'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'Filip', '$2y$10$sqkTpV77N1LaK/xgc.mtAe52NW5rhLtZ54q/ljOZrofGGrvv.kdKq');

-- --------------------------------------------------------

--
-- Структура на таблица `users_conference`
--

CREATE TABLE IF NOT EXISTS `users_conference` (
  `user_id` int(11) NOT NULL,
  `conference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `creator_id_idx` (`creator_id`),
  ADD KEY `halls_id_idx` (`halls_id`),
  ADD KEY `status_id_idx` (`status_id`);

--
-- Indexes for table `conference_status`
--
ALTER TABLE `conference_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lector_conference`
--
ALTER TABLE `lector_conference`
  ADD PRIMARY KEY (`lector_id`,`conference_id`),
  ADD KEY `conference_id` (`conference_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_conference`
--
ALTER TABLE `users_conference`
  ADD PRIMARY KEY (`user_id`,`conference_id`),
  ADD KEY `conference_id` (`conference_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `conference_status`
--
ALTER TABLE `conference_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `creator_id` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `halls_id` FOREIGN KEY (`halls_id`) REFERENCES `halls` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `conference_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `lector_conference`
--
ALTER TABLE `lector_conference`
  ADD CONSTRAINT `lector_conference_ibfk_1` FOREIGN KEY (`lector_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lector_conference_ibfk_2` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`id`);

--
-- Ограничения за таблица `users_conference`
--
ALTER TABLE `users_conference`
  ADD CONSTRAINT `users_conference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_conference_ibfk_2` FOREIGN KEY (`conference_id`) REFERENCES `conference` (`id`);

--
-- Ограничения за таблица `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
