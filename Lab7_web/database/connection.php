<?php

function OpenConnection(): mysqli{
	$server = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "vacation_database";

	$con = mysqli_connect($server, $user, $password, $database);

	if(!$con){
		die('Could not connect to the database');
	}
	return $con;
}

function CloseConnection(mysqli $con){
	$con->close();
}

?>