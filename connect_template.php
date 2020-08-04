<?php
  //Rename this file to connect.php and set the right credentials
  define('DB_USER', 'arigo');
	define('DB_PASSWORD', 'soMW2huQc4pE9');
	define('DB_HOST', 'arigomysql10.db');
	define('DB_NAME', 'extraescolars');
	// Make the connection:
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
	// Set the encoding...
	mysqli_set_charset($dbc, 'utf8');
?>