-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table agile1.ag_client_details
CREATE TABLE IF NOT EXISTS `ag_client_details` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `swift_code` varchar(50) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `account_holder_name` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `hosting_url` varchar(250) NOT NULL,
  `ftp_username` varchar(50) NOT NULL,
  `ftp_password` varchar(50) NOT NULL,
  `hosting_username` varchar(50) NOT NULL,
  `hosting_password` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_client_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `ag_client_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_client_details` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_company_mst
CREATE TABLE IF NOT EXISTS `ag_company_mst` (
  `company_id` int(10) unsigned DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `company_address` varchar(1000) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `registration` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vat_percent` int(11) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_company_mst: ~3 rows (approximately)
/*!40000 ALTER TABLE `ag_company_mst` DISABLE KEYS */;
INSERT INTO `ag_company_mst` (`company_id`, `company_name`, `company_address`, `zipcode`, `city`, `state`, `country`, `email`, `phone`, `registration`, `vat`, `vat_percent`, `logo`) VALUES
	(1, 'Agile Tech', 'Yorkshire,Tudor Lane,Ny-10004', '10003', NULL, NULL, NULL, 'info@agiletech.com', '1234567809', '123456', '5', 6, 'display_logo.JPG');
/*!40000 ALTER TABLE `ag_company_mst` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_invoice_list_details
CREATE TABLE IF NOT EXISTS `ag_invoice_list_details` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT '0',
  `items` varchar(500) DEFAULT '0',
  `Quantity` int(11) DEFAULT '0',
  `unit_price` float DEFAULT '0',
  `tax` float DEFAULT '0',
  `row_total` float DEFAULT '0',
  PRIMARY KEY (`list_id`),
  KEY `FK__ag_invoice_txn` (`invoice_id`),
  CONSTRAINT `FK__ag_invoice_txn` FOREIGN KEY (`invoice_id`) REFERENCES `ag_invoice_txn` (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_invoice_list_details: ~13 rows (approximately)
/*!40000 ALTER TABLE `ag_invoice_list_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_invoice_list_details` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_invoice_txn
CREATE TABLE IF NOT EXISTS `ag_invoice_txn` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `pay_status` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `due_date` date NOT NULL,
  `total_amt` int(11) NOT NULL,
  `paid_amt` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `default_tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `notes` varchar(500) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_invoice_txn: ~20 rows (approximately)
/*!40000 ALTER TABLE `ag_invoice_txn` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_invoice_txn` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_issues_mst
CREATE TABLE IF NOT EXISTS `ag_issues_mst` (
  `issue_type_id` int(100) NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(100) NOT NULL,
  PRIMARY KEY (`issue_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_issues_mst: ~4 rows (approximately)
/*!40000 ALTER TABLE `ag_issues_mst` DISABLE KEYS */;
INSERT INTO `ag_issues_mst` (`issue_type_id`, `issue_type`) VALUES
	(1, 'Bug'),
	(2, 'Story'),
	(3, 'Epic'),
	(4, 'Change Request');
/*!40000 ALTER TABLE `ag_issues_mst` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_issues_txn
CREATE TABLE IF NOT EXISTS `ag_issues_txn` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_type_id` int(11) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL DEFAULT '0',
  `summary` varchar(500) NOT NULL DEFAULT '0',
  `priority` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT '0',
  `attachment` varchar(500) DEFAULT '0',
  `filename` varchar(500) DEFAULT '0',
  `status` varchar(500) DEFAULT '0',
  `reported_by` varchar(500) DEFAULT '0',
  `assigned_to` varchar(500) DEFAULT '0',
  `epic_id` varchar(500) DEFAULT '0',
  `sprint_id` varchar(500) DEFAULT '0',
  `original_estimate` int(11) DEFAULT '0',
  `logged_estimate` int(11) DEFAULT '0',
  `remaining_estimate` int(11) DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`issue_id`),
  KEY `FK__ag_issues_mst` (`issue_type_id`),
  KEY `FK__ag_project_mst` (`project_id`),
  KEY `FK__ag_users` (`reported_by`),
  KEY `FK__ag_users_2` (`assigned_to`),
  CONSTRAINT `FK__ag_issues_mst` FOREIGN KEY (`issue_type_id`) REFERENCES `ag_issues_mst` (`issue_type_id`),
  CONSTRAINT `FK__ag_project_mst` FOREIGN KEY (`project_id`) REFERENCES `ag_project_mst` (`project_id`),
  CONSTRAINT `FK__ag_users` FOREIGN KEY (`reported_by`) REFERENCES `ag_users` (`username`),
  CONSTRAINT `FK__ag_users_2` FOREIGN KEY (`assigned_to`) REFERENCES `ag_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_issues_txn: ~7 rows (approximately)
/*!40000 ALTER TABLE `ag_issues_txn` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_issues_txn` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_menu_mst
CREATE TABLE IF NOT EXISTS `ag_menu_mst` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL DEFAULT '0',
  `sub_menu_name` varchar(100) NOT NULL DEFAULT '0',
  `sub_menu_flag` int(1) NOT NULL DEFAULT '0' COMMENT '0=no submenu and 1= submenu',
  `menu_url` varchar(1000) NOT NULL DEFAULT '#',
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_menu_mst: ~14 rows (approximately)
/*!40000 ALTER TABLE `ag_menu_mst` DISABLE KEYS */;
INSERT INTO `ag_menu_mst` (`menu_id`, `menu_name`, `sub_menu_name`, `sub_menu_flag`, `menu_url`, `icon`) VALUES
	(1, 'Dashboard', '0', 0, 'Menus/Dashboard', 'fa fa-th-large'),
	(2, 'Clients', '0', 0, 'Menus/Clients', 'fa fa-group icon'),
	(3, 'Projects', '0', 0, 'Menus/Projects', 'fa fa-pencil'),
	(4, 'Projects', 'Scrum Dashboard', 1, '#', NULL),
	(5, 'Projects', 'Issues', 1, '#', NULL),
	(6, 'Projects', 'Epic', 1, '#', NULL),
	(7, 'Projects', 'Story', 1, '#', NULL),
	(8, 'Projects', 'Sprint', 1, '#', NULL),
	(9, 'Projects', 'Timesheets', 1, '#', NULL),
	(10, 'Projects', 'Reports', 1, '#', NULL),
	(11, 'Users', '0', 0, 'Menus/Users', 'fa fa-user'),
	(12, 'Invoices', '0', 0, 'Menus/Invoices', 'fa fa-file'),
	(13, 'Payments', '0', 0, 'Menus/Payments', 'fa fa-dollar'),
	(15, 'Settings', 'Settings', 0, 'Menus/Settings', 'fa fa-cog');
/*!40000 ALTER TABLE `ag_menu_mst` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_project_mst
CREATE TABLE IF NOT EXISTS `ag_project_mst` (
  `project_id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `project_lead` varchar(100) NOT NULL,
  `client_id` int(50) NOT NULL,
  `progress` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `resources_allocatted` int(11) NOT NULL,
  `fixed_rate` int(11) NOT NULL,
  `hourly_rate` int(11) NOT NULL,
  `estimated_hours` int(11) NOT NULL,
  `hours_spent` int(11) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `billed_amt` int(50) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_project_mst: ~3 rows (approximately)
/*!40000 ALTER TABLE `ag_project_mst` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_project_mst` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_role_menu_mapping
CREATE TABLE IF NOT EXISTS `ag_role_menu_mapping` (
  `user_type_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL DEFAULT 'Admin',
  KEY `FK__ag_user_type_mst` (`user_type_id`),
  KEY `FK__ag_menu_mst` (`menu_id`),
  CONSTRAINT `FK__ag_menu_mst` FOREIGN KEY (`menu_id`) REFERENCES `ag_menu_mst` (`menu_id`),
  CONSTRAINT `FK__ag_user_type_mst` FOREIGN KEY (`user_type_id`) REFERENCES `ag_user_type_mst` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_role_menu_mapping: ~57 rows (approximately)
/*!40000 ALTER TABLE `ag_role_menu_mapping` DISABLE KEYS */;
INSERT INTO `ag_role_menu_mapping` (`user_type_id`, `menu_id`, `created_on`, `created_by`) VALUES
	(1, 1, '2015-12-08 08:02:30', 'Admin'),
	(1, 2, '2015-12-08 08:03:00', 'Admin'),
	(1, 3, '2015-12-08 08:03:15', 'Admin'),
	(1, 4, '2015-12-08 08:03:32', 'Admin'),
	(1, 5, '2015-12-08 08:03:51', 'Admin'),
	(1, 6, '2015-12-08 08:04:02', 'Admin'),
	(1, 7, '2015-12-08 08:04:19', 'Admin'),
	(1, 8, '2015-12-08 08:04:30', 'Admin'),
	(1, 9, '2015-12-08 08:04:39', 'Admin'),
	(1, 10, '2015-12-08 08:04:50', 'Admin'),
	(1, 11, '2015-12-08 08:05:11', 'Admin'),
	(1, 12, '2015-12-08 08:05:27', 'Admin'),
	(1, 13, '2015-12-08 08:05:37', 'Admin'),
	(1, 15, '2015-12-08 08:06:06', 'Admin'),
	(2, 3, '2016-08-08 09:34:34', 'Admin'),
	(3, 1, '2016-08-14 15:53:59', 'Admin'),
	(3, 3, '2016-08-14 15:54:44', 'Admin'),
	(3, 12, '2016-08-14 16:01:05', 'Admin'),
	(3, 13, '2016-08-14 16:01:17', 'Admin'),
	(1, 1, '2015-12-08 08:02:30', 'Admin'),
	(1, 2, '2015-12-08 08:03:00', 'Admin'),
	(1, 3, '2015-12-08 08:03:15', 'Admin'),
	(1, 4, '2015-12-08 08:03:32', 'Admin'),
	(1, 5, '2015-12-08 08:03:51', 'Admin'),
	(1, 6, '2015-12-08 08:04:02', 'Admin'),
	(1, 7, '2015-12-08 08:04:19', 'Admin'),
	(1, 8, '2015-12-08 08:04:30', 'Admin'),
	(1, 9, '2015-12-08 08:04:39', 'Admin'),
	(1, 10, '2015-12-08 08:04:50', 'Admin'),
	(1, 11, '2015-12-08 08:05:11', 'Admin'),
	(1, 12, '2015-12-08 08:05:27', 'Admin'),
	(1, 13, '2015-12-08 08:05:37', 'Admin'),
	(1, 15, '2015-12-08 08:06:06', 'Admin'),
	(2, 3, '2016-08-08 09:34:34', 'Admin'),
	(3, 1, '2016-08-14 15:53:59', 'Admin'),
	(3, 3, '2016-08-14 15:54:44', 'Admin'),
	(3, 12, '2016-08-14 16:01:05', 'Admin'),
	(3, 13, '2016-08-14 16:01:17', 'Admin'),
	(1, 1, '2015-12-08 08:02:30', 'Admin'),
	(1, 2, '2015-12-08 08:03:00', 'Admin'),
	(1, 3, '2015-12-08 08:03:15', 'Admin'),
	(1, 4, '2015-12-08 08:03:32', 'Admin'),
	(1, 5, '2015-12-08 08:03:51', 'Admin'),
	(1, 6, '2015-12-08 08:04:02', 'Admin'),
	(1, 7, '2015-12-08 08:04:19', 'Admin'),
	(1, 8, '2015-12-08 08:04:30', 'Admin'),
	(1, 9, '2015-12-08 08:04:39', 'Admin'),
	(1, 10, '2015-12-08 08:04:50', 'Admin'),
	(1, 11, '2015-12-08 08:05:11', 'Admin'),
	(1, 12, '2015-12-08 08:05:27', 'Admin'),
	(1, 13, '2015-12-08 08:05:37', 'Admin'),
	(1, 15, '2015-12-08 08:06:06', 'Admin'),
	(2, 3, '2016-08-08 09:34:34', 'Admin'),
	(3, 1, '2016-08-14 15:53:59', 'Admin'),
	(3, 3, '2016-08-14 15:54:44', 'Admin'),
	(3, 12, '2016-08-14 16:01:05', 'Admin'),
	(3, 13, '2016-08-14 16:01:17', 'Admin');
/*!40000 ALTER TABLE `ag_role_menu_mapping` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_sprint
CREATE TABLE IF NOT EXISTS `ag_sprint` (
  `sprint_id` int(11) NOT NULL AUTO_INCREMENT,
  `sprint_title` varchar(500) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sprint_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_sprint: ~8 rows (approximately)
/*!40000 ALTER TABLE `ag_sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_sprint` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_timesheet_details
CREATE TABLE IF NOT EXISTS `ag_timesheet_details` (
  `timesheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `logged_date` date DEFAULT NULL,
  `logged_hours` int(11) DEFAULT NULL,
  `logged_user` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `sprint_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`timesheet_id`),
  KEY `FK_ag_timesheet_details_ag_project_mst` (`project_id`),
  KEY `FK_ag_timesheet_details_ag_users` (`logged_user`),
  KEY `FK_ag_timesheet_details_ag_issues_txn` (`issue_id`),
  CONSTRAINT `FK_ag_timesheet_details_ag_issues_txn` FOREIGN KEY (`issue_id`) REFERENCES `ag_issues_txn` (`issue_id`),
  CONSTRAINT `FK_ag_timesheet_details_ag_project_mst` FOREIGN KEY (`project_id`) REFERENCES `ag_project_mst` (`project_id`),
  CONSTRAINT `FK_ag_timesheet_details_ag_users` FOREIGN KEY (`logged_user`) REFERENCES `ag_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_timesheet_details: ~14 rows (approximately)
/*!40000 ALTER TABLE `ag_timesheet_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ag_timesheet_details` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_users
CREATE TABLE IF NOT EXISTS `ag_users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type_id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `FK_ag_users_ag_user_type_mst` (`user_type_id`),
  CONSTRAINT `FK_ag_users_ag_user_type_mst` FOREIGN KEY (`user_type_id`) REFERENCES `ag_user_type_mst` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_users: ~8 rows (approximately)
/*!40000 ALTER TABLE `ag_users` DISABLE KEYS */;
INSERT INTO `ag_users` (`username`, `password`, `user_role`, `created_date`, `user_type_id`, `fullname`, `organization`, `email`, `client_id`, `filename`) VALUES
	('admin', 'admin', 'admin', '2016-09-22 02:33:02', 1, 'John Doe', 'AgileTech', 'info@agiletech.com', NULL, 'a4.jpg'),
	('client', 'client', 'Client', '2016-09-22 02:33:02', 3, 'RSA', 'Roins Financial', 'info@agiletech.com', 1, 'a1.jpg'),
	('user', 'user', 'User', '2016-09-22 02:33:02', 2, 'Elliot', 'Agile Tech', 'info@agiletech.com', 0, 'm1.jpg'),
	('user1', 'user', 'User', '2016-09-22 02:33:02', 2, 'Carm Legg', 'lbs', 'info@agiletech.com', NULL, 'a31.jpg');
/*!40000 ALTER TABLE `ag_users` ENABLE KEYS */;


-- Dumping structure for table agile1.ag_user_type_mst
CREATE TABLE IF NOT EXISTS `ag_user_type_mst` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_desc` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table agile1.ag_user_type_mst: ~3 rows (approximately)
/*!40000 ALTER TABLE `ag_user_type_mst` DISABLE KEYS */;
INSERT INTO `ag_user_type_mst` (`user_type_id`, `user_type_desc`) VALUES
	(1, 'admin'),
	(2, 'users'),
	(3, 'client');
/*!40000 ALTER TABLE `ag_user_type_mst` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
