<?php 
	header("Content-type: text/html; charset=utf-8");
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$mydb = 'login';

	$conn = new mysqli($servername, $username, $password, $mydb);
	mysqli_set_charset($conn, 'UTF8');

	if (!$conn) {
		die('connect_error' . $conn->connect_error);
	}
	session_start();
 ?>