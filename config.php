<?php
	$server = "127.0.0.1";
	$database = "dynamics";
	$username = "root";
	$password = "";

	$con = mysqli_connect($server, $username, $password, $database);
error_reporting(0);
	# checks connection to database
	# echo mysqli_ping($con) ? 'Connection successful.' : 'Connection failed';
?>