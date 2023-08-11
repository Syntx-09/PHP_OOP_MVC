<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	define('ROOT', 'http://localhost:8080/MVC_app/public');
		/* DB config */
	define('DBNAME', 'capstone');
	define('DBHOST', 'localhost:8080');
	define('DBUSER', 'root');
	define('DBPASS', '');
	$db_name = 'capstone';
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
} else {
	define('ROOT', 'https://www.yourwebsit.com');
}

define('DEBUG', true);
