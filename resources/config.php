<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_password = '';
<<<<<<< HEAD
	$db_password = '';
	$db_database = 'urbanlaudnry';
=======
	$db_database = 'urbanlaundry';
>>>>>>> 2e29958eaf82c4e92fff613eddf299559239fcf1
	  
	$db = new PDO("mysql:host=$db_host;dbname=$db_database;charset=latin1", $db_user, $db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

	defined("LIBRARY_PATH")
		or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/libs'));
