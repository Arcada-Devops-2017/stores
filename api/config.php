<?php

	require_once "API.php";

	# Edit these
	define( 'DB_HOST', 'localhost' );
	define( 'DB_USER', 'stores');
	define( 'DB_PASS', 'stores');
	define( 'DB_NAME', 'stores');
	define( 'DB_DRIVER', 'mysql');


	# Don't touch this
	define( 'DB_DSN', DB_DRIVER.":dbname=".DB_NAME.";host=".DB_HOST);
