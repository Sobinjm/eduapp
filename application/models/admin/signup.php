<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";

		// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
		echo "Connected successfully";
		$uname = $_GET["name"];
		$passwd= $_GET["passwd"];
	  ?>

</body>
</html>