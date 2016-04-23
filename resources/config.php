<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_password = 'dininta';
	$db_database = 'urbanlaundry';
	  
	$db = new PDO("mysql:host=$db_host;dbname=$db_database;charset=latin1", $db_user, $db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	defined("LIBRARY_PATH")
		or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/libs'));
