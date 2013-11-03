<?php

	$host = "localhost";
	$username = "root";
	$pwd = "";
	$database = "gingersnaps";

	$response = array();

	$con=mysqli_connect($host,$username,$pwd,$database);

	if (mysqli_connect_errno($con)){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

?>