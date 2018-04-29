<?php
//1. create database connection.
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "tonye01";
	$dbname = "tnfdbsv";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//test if error occured
	if(mysqli_connect_errno()){
		die("Database connection failed: ". mysqli_connect_error(). "(". mysqli_connect_errno(). ")");
		}

?>