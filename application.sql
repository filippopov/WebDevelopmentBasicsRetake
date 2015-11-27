-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 27 ное 2015 в 10:44
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `conference`
--

INSERT INTO `conference` (`id`, `name`, `creator_id`, `halls_id`, `time_begin`, `time_end`, `number_of_breaks`, `status_id`) VALUES
(3, 'proba1', 4, 1, '2015-11-28 00:00:00', '2015-11-29 00:00:00', 2, 11),
(4, 'test', 4, 1, '2013-02-02 22:17:06', '2013-02-02 22:17:06', 2, 1),
(5, 'danoo', 4, 1, '2015-11-24 00:00:00', '2015-11-24 01:00:00', 3, 6),
(6, 'fdggd11111', 4, 3, '2015-11-25 12:00:00', '2015-11-25 16:00:00', 1, 1),
(7, 'dfgdgdg', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(8, 'dsf', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(9, 'dfgdf', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(10, 'bvcb', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1),
(11, 'dfgg', 4, 1, '2015-11-08 00:00:00', '0000-00-00 00:00:00', 2, 1),
(12, 'danooodanoo', 4, 1, '2015-11-19 05:55:04', '2015-11-05 03:54:56', 14, 1),
(13, 'probaEdit', 4, 1, '2015-11-21 00:25:00', '2015-11-20 00:00:00', 2, 6),
(14, 'xcvxcv', 4, 1, '2015-10-29 00:00:00', '2015-10-31 00:00:00', 1, 3),
(25, 'danooo', 4, 1, '2015-11-19 00:01:00', '2015-11-19 01:00:00', 2, 6),
(26, 'testOwner', 27, 3, '2015-11-21 00:00:00', '2015-11-21 04:00:00', 2, 3),
(27, 'testUser12', 28, 1, '2015-11-22 01:00:00', '2015-11-22 03:00:00', 2, 6),
(28, 'endTimeAndStart', 28, 3, '2015-11-22 09:00:00', '2015-11-22 13:00:00', 2, 1),
(29, 'TestColision', 28, 1, '2015-11-22 01:00:00', '2015-11-22 05:00:00', 2, 6),
(30, 'TestCollision2', 28, 1, '2015-11-22 02:00:00', '2015-11-22 04:00:00', 2, 6),
(31, 'TestCapacity', 4, 9, '2015-11-23 00:00:00', '2015-11-23 08:00:00', 2, 6),
(32, 'TestAfterChange', 4, 1, '2015-11-24 12:00:00', '2015-11-25 00:00:00', 2, 6),
(33, 'Elena', 4, 1, '2015-11-24 00:00:00', '2015-11-24 12:00:00', 2, 6),
(35, 'TestBootstrapConference', 4, 2, '2015-11-25 01:00:00', '2015-11-26 00:05:00', 3, 3),
(36, 'Test12321', 4, 3, '2015-11-27 00:00:00', '2015-11-28 00:00:00', 221, 7),
(38, 'TestBinding', 4, 9, '2015-11-26 00:00:00', '2015-11-27 00:00:00', 2, 1),
(39, 'testAdmin12', 4, 1, '2015-11-27 00:00:00', '2015-11-29 00:00:00', 22, 11),
(42, 'test1234', 4, 1, '2015-11-28 00:00:00', '2015-11-29 00:00:00', 1, 11),
(44, 'proba7778', 4, 9, '2015-11-28 00:00:00', '2015-11-29 00:00:00', 7, 1),
(46, 'editThis', 4, 1, '2015-11-27 00:00:00', '2015-11-28 00:00:00', 3, 11),
(47, 'sdfdsfdsfdsfdsf', 4, 1, '2015-11-27 00:00:00', '2015-11-29 00:00:00', 2, 11),
(48, 'EditThis122', 4, 1, '2015-11-27 00:00:00', '2015-11-28 00:00:00', 22, 11),
(49, 'dsfdsfdsfdsfdsfdsfdsf', 4, 1, '2015-11-27 00:00:00', '2015-11-29 00:00:00', 2, 11),
(50, 'vbvchgfg', 4, 3, '2015-11-26 00:30:00', '2015-11-28 00:00:00', 3, 1),
(51, 'FinalTes1t', 4, 1, '2015-11-28 00:00:00', '2015-11-29 00:00:00', 2, 11);

-- --------------------------------------------------------

--
-- Структура на таблица `conference_status`
--

CREATE TABLE IF NOT EXISTS `conference_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `conference_status`
--

INSERT INTO `conference_status` (`id`, `name`) VALUES
(11, 'bind'),
(10, 'bootstrapEdit'),
(6, 'defdfs'),
(1, 'must visit'),
(2, 'open'),
(3, 'proba'),
(7, 'retrg'),
(14, 'string'),
(15, 'test1'),
(5, 'test223'),
(13, 'testsssss'),
(16, 'tralala1');

-- --------------------------------------------------------

--
-- Структура на таблица `halls`
--

CREATE TABLE IF NOT EXISTS `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `halls`
--

INSERT INTO `halls` (`id`, `name`, `capacity`) VALUES
(1, 'Open Source Lab', 200),
(2, 'Inspiration Lab', 300),
(3, 'Code Ground Lab', 200),
(9, 'TestCapacity', 2),
(12, 'TestHall', 23),
(13, 'rrgre', 5),
(14, 'TestBootstrap', 300),
(15, 'probaHallBootstarp1', 1142),
(20, 'EditThis', 22),
(21, 'proba2233', 223),
(22, 'degregg', 222),
(23, 'finalTest1', 221);

-- --------------------------------------------------------

--
-- Структура на таблица `lector_conference`
--

CREATE TABLE IF NOT EXISTS `lector_conference` (
  `lector_id` int(11) NOT NULL,
  `conference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `lector_conference`
--

INSERT INTO `lector_conference` (`lector_id`, `conference_id`) VALUES
(4, 3),
(5, 3),
(33, 4),
(28, 26),
(4, 28),
(4, 29),
(27, 33);

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
(4, 'Filip12', '$2y$10$WcOhQxidcJ7VHvap3lsJRO73iWtW7u/i3Az9RvMVetIIrZJ8Ke62G'),
(5, '<u>parragraph</u>', '$2y$10$2p3Sy1kw476l6kIcuetn.Obv6ju7FGFBo8ABssO9TK.MZ6gW5gTI2'),
(6, '<u>parragraphaaaa</u>', '$2y$10$YtOC/0vo3kKJ0p.yiPkjIOtmqjeTTY27qV4Fp1zXUpVqUbZiZ27/a'),
(7, 'Base', '$2y$10$/8KQdY1KkSF98bhwkYnhveZmkSlnNLZuIKIsNWR5FO6XZCVnRJu0e'),
(14, 'vajno', '$2y$10$FbbDobz/eU86pt1sDN5b7O8C1Rf5vBi7tsGNIq5C7UVW9dqixrGD6'),
(15, 'testquery', '$2y$10$XJ/7.bIyCh8feifEQdhUAuCIC5YEknTu7/fpxb0s.lel7pjtMXBCi'),
(16, 'Filip', '$2y$10$xMmR9nh8iKp.Jcx/2JQSxOnx.oMYIB6yNlwPtoDXvTl9ELeo3MD.6'),
(18, 'test1', '$2y$10$xl5xD61oPI/X07LRdSmpruqnZ1fiAs9RSwIDg7uYux2bPoZBFs8Z.'),
(19, 'register', '$2y$10$MnD0YU.GcPo5WZWjsYrXVuoAOVPgj/KZQZS7dFQicDdQkilkFMj1i'),
(20, 'Filip', '$2y$10$sNyZeOp7IBP1RO7ZwUqzOOVZQ0zwl9fpVC/tdUE0fiMSkkxmOzX/a'),
(21, 'Filip123', '$2y$10$i4OR/AkftTIYOnX3num9m.tBTu4GhhD3FD7g7ZgH9HGfoiqMF2Wp6'),
(26, 'strictType', '$2y$10$nIo4aLOMVehx782yQ.JsD.e1KaDItUIUM.vS4oIHhV/wJe6FCa.eW'),
(27, 'signIn1', '$2y$10$OCn3chIyLapcXu7EjYHXU.sewKcxlfqD6K26AaUCE5AYLichNmReS'),
(28, 'signOut', '$2y$10$Pgi4VSFWsbH.M61D/hSgVuhOkiY0S5hBuVgvAUH9zZhpuMPD6gv86'),
(29, 'testCapacity', '$2y$10$9aBrwr3ErtI.ZOdeCWFaeu6RZvRTdrMeoSzFd6k0tBuds4u/Hotjy'),
(30, 'TestForm', '$2y$10$BakdrAhkgjIzbZ9h.el/ju8gF5xRnrBhiPPPBfAxRVcSJZ4bgA.gq'),
(31, 'testReg1', '$2y$10$iKMxDdVcPNY7QymvttsL3e4LAawhJEtZQTOYHO9mpTT8F/jDKbkYi'),
(32, 'test123', '$2y$10$WN9iJcF7vBmOtSPgdMxuD.3RG9HvhANMUN1sLmGJNHojC2zHdSmkm'),
(33, 'TestCAB1', '$2y$10$g9WbblYu81pJbyt0FBii5.K0RZzS.GyS7/1Kcp92kH6OsEEs22I5q'),
(34, 'noviq', '$2y$10$qNfeJOI0703iqcrO1W/xP.p685olt/rQ4dCatAy5VPmZ.zEtDrQU6'),
(35, 'probenAcc1', '$2y$10$xo74EImq/LJtcrcDryjjMOgiQVg/k62It5V/1Eqjy0FjHtcfiH91G'),
(36, 'finalTest1', '$2y$10$5fqp6Rf6krTeD/BSIyL2XeoyibrriVGut.PIR3cNUYS9YP3dMyeg6');

-- --------------------------------------------------------

--
-- Структура на таблица `users_conference`
--

CREATE TABLE IF NOT EXISTS `users_conference` (
  `user_id` int(11) NOT NULL,
  `conference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users_conference`
--

INSERT INTO `users_conference` (`user_id`, `conference_id`) VALUES
(5, 3),
(6, 3),
(27, 3),
(35, 3),
(36, 3),
(27, 4),
(33, 4),
(28, 5),
(27, 6),
(27, 7),
(28, 7),
(27, 8),
(27, 9),
(27, 14),
(27, 25),
(4, 26),
(28, 26),
(4, 28),
(4, 29),
(29, 29),
(27, 31),
(28, 31),
(27, 33),
(31, 38),
(32, 42);

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
(4, 1),
(7, 1),
(15, 1),
(19, 1),
(26, 1),
(28, 1),
(33, 1),
(36, 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `conference_status`
--
ALTER TABLE `conference_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
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
