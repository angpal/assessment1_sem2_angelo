<?php

	// database details
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "phonebook";

	// connection to database
	$conn = new mysqli($host, $user, $pass, $db);

	//check if we are connected to the database
	if ($conn->error) {
		die("This App could NOT connect to the database!");
	} 

?>