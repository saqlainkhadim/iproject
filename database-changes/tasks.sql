-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2023 at 11:22 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iprotect`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `task_importid` varchar(100) DEFAULT NULL,
  `task_position` double NOT NULL COMMENT 'increment by 16384',
  `task_created` datetime DEFAULT NULL COMMENT 'always now()',
  `task_updated` datetime DEFAULT NULL,
  `task_creatorid` int DEFAULT NULL,
  `task_clientid` int DEFAULT NULL COMMENT 'optional',
  `task_projectid` int DEFAULT NULL COMMENT 'project_id',
  `task_date_start` date DEFAULT NULL,
  `task_date_due` date DEFAULT NULL,
  `task_title` varchar(250) DEFAULT NULL,
  `task_description` text,
  `task_client_visibility` varchar(100) DEFAULT 'yes',
  `task_milestoneid` int DEFAULT NULL COMMENT 'new tasks must be set to the [uncategorised] milestone',
  `task_previous_status` varchar(100) DEFAULT 'new',
  `task_priority` varchar(100) NOT NULL DEFAULT 'normal' COMMENT 'normal | high | urgent',
  `task_status` int DEFAULT '1',
  `task_active_state` varchar(100) DEFAULT 'active' COMMENT 'active|archived',
  `task_billable` varchar(5) DEFAULT 'yes' COMMENT 'yes | no',
  `task_billable_status` varchar(20) DEFAULT 'not_invoiced' COMMENT 'invoiced | not_invoiced',
  `task_billable_invoiceid` int DEFAULT NULL COMMENT 'id of the invoice that it has been billed to',
  `task_billable_lineitemid` int DEFAULT NULL COMMENT 'id of line item that was billed',
  `task_visibility` varchar(40) DEFAULT 'visible' COMMENT 'visible|hidden (used to prevent tasks that are still being cloned from showing in tasks list)',
  `task_overdue_notification_sent` varchar(40) DEFAULT 'no' COMMENT 'yes|no',
  `task_recurring` varchar(40) DEFAULT 'no' COMMENT 'yes|no',
  `task_recurring_duration` int DEFAULT NULL COMMENT 'e.g. 20 (for 20 days)',
  `task_recurring_period` varchar(30) DEFAULT NULL COMMENT 'day | week | month | year',
  `task_recurring_cycles` int DEFAULT NULL COMMENT '0 for infinity',
  `task_recurring_cycles_counter` int DEFAULT '0' COMMENT 'number of times it has been renewed',
  `task_recurring_last` date DEFAULT NULL COMMENT 'date when it was last renewed',
  `task_recurring_next` date DEFAULT NULL COMMENT 'date when it will next be renewed',
  `task_recurring_child` varchar(10) DEFAULT 'no' COMMENT 'yes|no',
  `task_recurring_parent_id` datetime DEFAULT NULL COMMENT 'if it was generated from a recurring invoice, the id of parent invoice',
  `task_recurring_copy_checklists` varchar(10) DEFAULT 'yes' COMMENT 'yes|no',
  `task_recurring_copy_files` varchar(10) DEFAULT 'yes' COMMENT 'yes|no',
  `task_recurring_automatically_assign` varchar(10) DEFAULT 'yes' COMMENT 'yes|no',
  `task_recurring_finished` varchar(10) DEFAULT 'no' COMMENT 'yes|no',
  `task_custom_field_1` tinytext,
  `task_custom_field_2` tinytext,
  `task_custom_field_3` tinytext,
  `task_custom_field_4` tinytext,
  `task_custom_field_5` tinytext,
  `task_custom_field_6` tinytext,
  `task_custom_field_7` tinytext,
  `task_custom_field_8` tinytext,
  `task_custom_field_9` tinytext,
  `task_custom_field_10` tinytext,
  `task_custom_field_11` datetime DEFAULT NULL,
  `task_custom_field_12` datetime DEFAULT NULL,
  `task_custom_field_13` datetime DEFAULT NULL,
  `task_custom_field_14` datetime DEFAULT NULL,
  `task_custom_field_15` datetime DEFAULT NULL,
  `task_custom_field_16` datetime DEFAULT NULL,
  `task_custom_field_17` datetime DEFAULT NULL,
  `task_custom_field_18` datetime DEFAULT NULL,
  `task_custom_field_19` datetime DEFAULT NULL,
  `task_custom_field_20` datetime DEFAULT NULL,
  `task_custom_field_21` text,
  `task_custom_field_22` text,
  `task_custom_field_23` text,
  `task_custom_field_24` text,
  `task_custom_field_25` text,
  `task_custom_field_26` text,
  `task_custom_field_27` text,
  `task_custom_field_28` text,
  `task_custom_field_29` text,
  `task_custom_field_30` text,
  `task_custom_field_31` varchar(20) DEFAULT NULL,
  `task_custom_field_32` varchar(20) DEFAULT NULL,
  `task_custom_field_33` varchar(20) DEFAULT NULL,
  `task_custom_field_34` varchar(20) DEFAULT NULL,
  `task_custom_field_35` varchar(20) DEFAULT NULL,
  `task_custom_field_36` varchar(20) DEFAULT NULL,
  `task_custom_field_37` varchar(20) DEFAULT NULL,
  `task_custom_field_38` varchar(20) DEFAULT NULL,
  `task_custom_field_39` varchar(20) DEFAULT NULL,
  `task_custom_field_40` varchar(20) DEFAULT NULL,
  `task_custom_field_41` varchar(150) DEFAULT NULL,
  `task_custom_field_42` varchar(150) DEFAULT NULL,
  `task_custom_field_43` varchar(150) DEFAULT NULL,
  `task_custom_field_44` varchar(150) DEFAULT NULL,
  `task_custom_field_45` varchar(150) DEFAULT NULL,
  `task_custom_field_46` varchar(150) DEFAULT NULL,
  `task_custom_field_47` varchar(150) DEFAULT NULL,
  `task_custom_field_48` varchar(150) DEFAULT NULL,
  `task_custom_field_49` varchar(150) DEFAULT NULL,
  `task_custom_field_50` varchar(150) DEFAULT NULL,
  `task_custom_field_51` int DEFAULT NULL,
  `task_custom_field_52` int DEFAULT NULL,
  `task_custom_field_53` int DEFAULT NULL,
  `task_custom_field_54` int DEFAULT NULL,
  `task_custom_field_55` int DEFAULT NULL,
  `task_custom_field_56` int DEFAULT NULL,
  `task_custom_field_57` int DEFAULT NULL,
  `task_custom_field_58` int DEFAULT NULL,
  `task_custom_field_59` int DEFAULT NULL,
  `task_custom_field_60` int DEFAULT NULL,
  `task_custom_field_61` decimal(10,2) DEFAULT NULL,
  `task_custom_field_62` decimal(10,2) DEFAULT NULL,
  `task_custom_field_63` decimal(10,2) DEFAULT NULL,
  `task_custom_field_64` decimal(10,2) DEFAULT NULL,
  `task_custom_field_65` decimal(10,2) DEFAULT NULL,
  `task_custom_field_66` decimal(10,2) DEFAULT NULL,
  `task_custom_field_67` decimal(10,2) DEFAULT NULL,
  `task_custom_field_68` decimal(10,2) DEFAULT NULL,
  `task_custom_field_69` decimal(10,2) DEFAULT NULL,
  `task_custom_field_70` decimal(10,2) DEFAULT NULL,
  `task_client_status` enum('approved','rejected','0') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  PRIMARY KEY (`task_id`),
  KEY `task_creatorid` (`task_creatorid`),
  KEY `task_clientid` (`task_clientid`),
  KEY `task_billable` (`task_billable`),
  KEY `task_milestoneid` (`task_milestoneid`),
  KEY `task_priority` (`task_priority`),
  KEY `taskresource_id` (`task_projectid`),
  KEY `task_visibility` (`task_visibility`),
  KEY `task_client_visibility` (`task_client_visibility`),
  KEY `task_importid` (`task_importid`),
  KEY `task_active_state` (`task_active_state`),
  KEY `task_billable_status` (`task_billable_status`),
  KEY `task_billable_invoiceid` (`task_billable_invoiceid`),
  KEY `task_billable_lineitemid` (`task_billable_lineitemid`),
  KEY `task_recurring` (`task_recurring`),
  KEY `task_recurring_parent_id` (`task_recurring_parent_id`),
  KEY `task_recurring_finished` (`task_recurring_finished`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb3 COMMENT='[truncate]';

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_importid`, `task_position`, `task_created`, `task_updated`, `task_creatorid`, `task_clientid`, `task_projectid`, `task_date_start`, `task_date_due`, `task_title`, `task_description`, `task_client_visibility`, `task_milestoneid`, `task_previous_status`, `task_priority`, `task_status`, `task_active_state`, `task_billable`, `task_billable_status`, `task_billable_invoiceid`, `task_billable_lineitemid`, `task_visibility`, `task_overdue_notification_sent`, `task_recurring`, `task_recurring_duration`, `task_recurring_period`, `task_recurring_cycles`, `task_recurring_cycles_counter`, `task_recurring_last`, `task_recurring_next`, `task_recurring_child`, `task_recurring_parent_id`, `task_recurring_copy_checklists`, `task_recurring_copy_files`, `task_recurring_automatically_assign`, `task_recurring_finished`, `task_custom_field_1`, `task_custom_field_2`, `task_custom_field_3`, `task_custom_field_4`, `task_custom_field_5`, `task_custom_field_6`, `task_custom_field_7`, `task_custom_field_8`, `task_custom_field_9`, `task_custom_field_10`, `task_custom_field_11`, `task_custom_field_12`, `task_custom_field_13`, `task_custom_field_14`, `task_custom_field_15`, `task_custom_field_16`, `task_custom_field_17`, `task_custom_field_18`, `task_custom_field_19`, `task_custom_field_20`, `task_custom_field_21`, `task_custom_field_22`, `task_custom_field_23`, `task_custom_field_24`, `task_custom_field_25`, `task_custom_field_26`, `task_custom_field_27`, `task_custom_field_28`, `task_custom_field_29`, `task_custom_field_30`, `task_custom_field_31`, `task_custom_field_32`, `task_custom_field_33`, `task_custom_field_34`, `task_custom_field_35`, `task_custom_field_36`, `task_custom_field_37`, `task_custom_field_38`, `task_custom_field_39`, `task_custom_field_40`, `task_custom_field_41`, `task_custom_field_42`, `task_custom_field_43`, `task_custom_field_44`, `task_custom_field_45`, `task_custom_field_46`, `task_custom_field_47`, `task_custom_field_48`, `task_custom_field_49`, `task_custom_field_50`, `task_custom_field_51`, `task_custom_field_52`, `task_custom_field_53`, `task_custom_field_54`, `task_custom_field_55`, `task_custom_field_56`, `task_custom_field_57`, `task_custom_field_58`, `task_custom_field_59`, `task_custom_field_60`, `task_custom_field_61`, `task_custom_field_62`, `task_custom_field_63`, `task_custom_field_64`, `task_custom_field_65`, `task_custom_field_66`, `task_custom_field_67`, `task_custom_field_68`, `task_custom_field_69`, `task_custom_field_70`, `task_client_status`) VALUES
(66, NULL, 16384, '2023-02-25 09:51:01', '2023-02-25 09:52:01', 1, 27, 32, '2023-03-20', '2023-04-03', 'housing project', NULL, 'yes', 141, 'new', 'normal', 1, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(67, NULL, 32768, '2023-02-25 10:05:29', '2023-02-25 10:05:54', 43, 27, 32, '2023-03-20', '2023-04-03', 'housing project', NULL, 'yes', 141, 'new', 'normal', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(71, NULL, 49152, '2023-02-26 06:55:15', '2023-02-26 06:55:47', 1, 33, 37, '2023-03-08', '2023-03-08', 'Modem Installation', NULL, 'yes', 160, 'new', 'high', 1, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(74, NULL, 65536, '2023-02-26 11:00:24', '2023-02-26 11:00:24', 54, 33, 37, NULL, NULL, 'ds', 'Hi&nbsp;', 'yes', 163, 'new', 'normal', 5, 'active', 'no', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(75, NULL, 81920, '2023-02-26 12:37:38', '2023-02-26 12:37:38', 58, 35, 39, NULL, NULL, 'done installation', NULL, 'yes', 170, 'new', 'normal', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(76, NULL, 98304, '2023-02-26 12:41:35', '2023-02-26 12:41:35', 59, 35, 39, NULL, NULL, 'Test', 'Kuyang ang gi trabahu', 'yes', 170, 'new', 'normal', 5, 'active', 'no', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(77, NULL, 16384, '2023-02-27 07:50:17', '2023-03-04 19:20:04', 1, 36, 40, NULL, NULL, 'INSTALLING', NULL, 'yes', 173, 'new', 'normal', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rejected'),
(78, NULL, 8192, '2023-02-27 07:54:33', '2023-03-04 19:19:58', 62, 36, 40, NULL, NULL, 'INSTALLING', 'HAPIT NA KAMI MAHUMAN', 'yes', 173, 'new', 'high', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approved'),
(79, NULL, 90112, '2023-02-27 07:58:45', '2023-03-04 15:12:48', 61, 36, 40, NULL, NULL, 'INSTALLING', 'TRABAOHA NANA NINYO UG DALI!', 'yes', 173, 'new', 'high', 1, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(80, NULL, 163840, '2023-02-27 07:59:26', '2023-03-04 19:03:07', 61, 36, 40, NULL, NULL, 'INSTALLING', 'GAMAY RAKAN SIR', 'yes', 174, 'new', 'high', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, 180224, '2023-02-27 08:00:36', '2023-02-27 08:00:36', 60, 36, 40, NULL, NULL, 'INSTALLING', 'Wazzup', 'yes', 174, 'new', 'normal', 5, 'active', 'no', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(82, NULL, 196608, '2023-02-27 21:37:17', '2023-02-27 21:37:17', 54, 33, 37, NULL, NULL, 'Doneee cctv installation', NULL, 'yes', 162, 'new', 'normal', 3, 'active', 'no', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(83, NULL, 212992, '2023-02-28 12:42:27', '2023-02-28 12:48:11', 1, 35, 41, '2023-03-01', '2023-03-06', 'Cabling', 'make it urgent', 'yes', 177, 'new', 'urgent', 3, 'active', 'yes', 'not_invoiced', NULL, NULL, 'visible', 'no', 'no', NULL, NULL, NULL, 0, NULL, NULL, 'no', NULL, 'yes', 'yes', 'yes', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
