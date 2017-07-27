<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2017-07-27 17:26:46 --> Config Class Initialized
INFO - 2017-07-27 17:26:46 --> Hooks Class Initialized
DEBUG - 2017-07-27 17:26:46 --> UTF-8 Support Enabled
INFO - 2017-07-27 17:26:46 --> Utf8 Class Initialized
INFO - 2017-07-27 17:26:46 --> URI Class Initialized
DEBUG - 2017-07-27 17:26:46 --> No URI present. Default controller set.
INFO - 2017-07-27 17:26:46 --> Router Class Initialized
INFO - 2017-07-27 17:26:46 --> Output Class Initialized
INFO - 2017-07-27 17:26:46 --> Security Class Initialized
INFO - 2017-07-27 17:26:46 --> CSRF cookie sent
DEBUG - 2017-07-27 17:26:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2017-07-27 17:26:46 --> Input Class Initialized
INFO - 2017-07-27 17:26:46 --> Language Class Initialized
INFO - 2017-07-27 17:26:46 --> Loader Class Initialized
INFO - 2017-07-27 17:26:46 --> Controller Class Initialized
INFO - 2017-07-27 17:26:46 --> Helper loaded: url_helper
INFO - 2017-07-27 17:26:46 --> File loaded: C:\wamp64\www\crowdtest\application\views\installation/installscript.php
INFO - 2017-07-27 17:26:46 --> Final output sent to browser
DEBUG - 2017-07-27 17:26:46 --> Total execution time: 0.4280
INFO - 2017-07-27 17:26:57 --> Config Class Initialized
INFO - 2017-07-27 17:26:57 --> Hooks Class Initialized
DEBUG - 2017-07-27 17:26:57 --> UTF-8 Support Enabled
INFO - 2017-07-27 17:26:57 --> Utf8 Class Initialized
INFO - 2017-07-27 17:26:57 --> URI Class Initialized
INFO - 2017-07-27 17:26:57 --> Router Class Initialized
INFO - 2017-07-27 17:26:57 --> Output Class Initialized
INFO - 2017-07-27 17:26:57 --> Security Class Initialized
INFO - 2017-07-27 17:26:57 --> CSRF cookie sent
INFO - 2017-07-27 17:26:57 --> CSRF token verified
DEBUG - 2017-07-27 17:26:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2017-07-27 17:26:57 --> Input Class Initialized
INFO - 2017-07-27 17:26:57 --> Language Class Initialized
INFO - 2017-07-27 17:26:57 --> Loader Class Initialized
INFO - 2017-07-27 17:26:57 --> Controller Class Initialized
INFO - 2017-07-27 17:26:57 --> Helper loaded: url_helper
DEBUG - 2017-07-27 17:26:57 --> Inside Install
INFO - 2017-07-27 17:26:57 --> Helper loaded: file_helper
DEBUG - 2017-07-27 17:26:58 --> Inside Install db
INFO - 2017-07-27 17:26:58 --> Model Class Initialized
INFO - 2017-07-27 17:26:58 --> Model Class Initialized
INFO - 2017-07-27 17:26:58 --> Database Driver Class Initialized
ERROR - 2017-07-27 17:26:58 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: 
INSERT INTO `ag_issues_mst` (`issue_type_id`, `issue_type`) VALUES
	(1, 'Bug'),
	(2, 'Story'),
	(3, 'Epic'),
	(4, 'Change Request')
ERROR - 2017-07-27 17:26:58 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: 
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
	(15, 'Settings', 'Settings', 0, 'Menus/Settings', 'fa fa-cog')
ERROR - 2017-07-27 17:26:59 --> Query error: Duplicate entry 'admin' for key 'PRIMARY' - Invalid query: 
INSERT INTO `ag_users` (`username`, `password`, `user_role`, `created_date`, `user_type_id`, `fullname`, `organization`, `email`, `client_id`, `filename`) VALUES
	('admin', 'admin', 'admin', '2016-09-22 02:33:02', 1, 'John Doe', 'AgileTech', 'info@agiletech.com', NULL, 'a4.jpg'),
	('client', 'client', 'Client', '2016-09-22 02:33:02', 3, 'RSA', 'Roins Financial', 'info@agiletech.com', 1, 'a1.jpg'),
	('user', 'user', 'User', '2016-09-22 02:33:02', 2, 'Elliot', 'Agile Tech', 'info@agiletech.com', 0, 'm1.jpg'),
	('user1', 'user', 'User', '2016-09-22 02:33:02', 2, 'Carm Legg', 'lbs', 'info@agiletech.com', NULL, 'a31.jpg')
ERROR - 2017-07-27 17:26:59 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: 
INSERT INTO `ag_user_type_mst` (`user_type_id`, `user_type_desc`) VALUES
	(1, 'admin'),
	(2, 'users'),
	(3, 'client')
ERROR - 2017-07-27 17:26:59 --> Query error: Query was empty - Invalid query: 

INFO - 2017-07-27 17:26:59 --> File loaded: C:\wamp64\www\crowdtest\application\views\installation/installprogress.php
INFO - 2017-07-27 17:26:59 --> Final output sent to browser
DEBUG - 2017-07-27 17:26:59 --> Total execution time: 1.8218
INFO - 2017-07-27 17:27:02 --> Config Class Initialized
INFO - 2017-07-27 17:27:02 --> Hooks Class Initialized
DEBUG - 2017-07-27 17:27:02 --> UTF-8 Support Enabled
INFO - 2017-07-27 17:27:02 --> Utf8 Class Initialized
INFO - 2017-07-27 17:27:02 --> URI Class Initialized
DEBUG - 2017-07-27 17:27:02 --> No URI present. Default controller set.
INFO - 2017-07-27 17:27:02 --> Router Class Initialized
INFO - 2017-07-27 17:27:02 --> Output Class Initialized
INFO - 2017-07-27 17:27:02 --> Security Class Initialized
INFO - 2017-07-27 17:27:02 --> CSRF cookie sent
INFO - 2017-07-27 17:27:02 --> CSRF token verified
DEBUG - 2017-07-27 17:27:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2017-07-27 17:27:02 --> Input Class Initialized
INFO - 2017-07-27 17:27:02 --> Language Class Initialized
INFO - 2017-07-27 17:27:02 --> Loader Class Initialized
INFO - 2017-07-27 17:27:02 --> Controller Class Initialized
INFO - 2017-07-27 17:27:02 --> Helper loaded: url_helper
INFO - 2017-07-27 17:27:02 --> Session: Class initialized using 'files' driver.
INFO - 2017-07-27 17:27:02 --> Model Class Initialized
INFO - 2017-07-27 17:27:02 --> Model Class Initialized
INFO - 2017-07-27 17:27:02 --> Database Driver Class Initialized
INFO - 2017-07-27 17:27:02 --> File loaded: C:\wamp64\www\crowdtest\application\views\agile_login.php
INFO - 2017-07-27 17:27:02 --> Final output sent to browser
DEBUG - 2017-07-27 17:27:02 --> Total execution time: 0.2422
INFO - 2017-07-27 17:27:04 --> Config Class Initialized
INFO - 2017-07-27 17:27:04 --> Hooks Class Initialized
DEBUG - 2017-07-27 17:27:04 --> UTF-8 Support Enabled
INFO - 2017-07-27 17:27:04 --> Utf8 Class Initialized
INFO - 2017-07-27 17:27:04 --> URI Class Initialized
INFO - 2017-07-27 17:27:04 --> Router Class Initialized
INFO - 2017-07-27 17:27:04 --> Output Class Initialized
INFO - 2017-07-27 17:27:04 --> Security Class Initialized
INFO - 2017-07-27 17:27:04 --> CSRF cookie sent
INFO - 2017-07-27 17:27:04 --> CSRF token verified
DEBUG - 2017-07-27 17:27:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2017-07-27 17:27:04 --> Input Class Initialized
INFO - 2017-07-27 17:27:04 --> Language Class Initialized
INFO - 2017-07-27 17:27:04 --> Loader Class Initialized
INFO - 2017-07-27 17:27:04 --> Controller Class Initialized
INFO - 2017-07-27 17:27:04 --> Helper loaded: url_helper
INFO - 2017-07-27 17:27:04 --> Session: Class initialized using 'files' driver.
INFO - 2017-07-27 17:27:04 --> Model Class Initialized
INFO - 2017-07-27 17:27:04 --> Model Class Initialized
INFO - 2017-07-27 17:27:04 --> Database Driver Class Initialized
INFO - 2017-07-27 17:27:04 --> Model Class Initialized
INFO - 2017-07-27 17:27:04 --> File loaded: C:\wamp64\www\crowdtest\application\views\menu.php
INFO - 2017-07-27 17:27:04 --> File loaded: C:\wamp64\www\crowdtest\application\views\border.php
INFO - 2017-07-27 17:27:04 --> File loaded: C:\wamp64\www\crowdtest\application\views\dashboard_2.php
INFO - 2017-07-27 17:27:04 --> Final output sent to browser
DEBUG - 2017-07-27 17:27:04 --> Total execution time: 0.3027
INFO - 2017-07-27 17:27:05 --> Config Class Initialized
INFO - 2017-07-27 17:27:05 --> Hooks Class Initialized
DEBUG - 2017-07-27 17:27:05 --> UTF-8 Support Enabled
INFO - 2017-07-27 17:27:05 --> Utf8 Class Initialized
INFO - 2017-07-27 17:27:05 --> URI Class Initialized
INFO - 2017-07-27 17:27:05 --> Router Class Initialized
INFO - 2017-07-27 17:27:05 --> Output Class Initialized
INFO - 2017-07-27 17:27:05 --> Security Class Initialized
INFO - 2017-07-27 17:27:05 --> CSRF cookie sent
DEBUG - 2017-07-27 17:27:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2017-07-27 17:27:05 --> Input Class Initialized
INFO - 2017-07-27 17:27:05 --> Language Class Initialized
ERROR - 2017-07-27 17:27:05 --> 404 Page Not Found: Login/skin-config.html
