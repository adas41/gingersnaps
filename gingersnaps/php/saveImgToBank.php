<?php

	require_once('dbCon.php');

	$target_path = "uploads/";

	$target_path = $target_path . basename( $_FILES['imgInp']['name']); 

	$id = $_POST['id'];
	echo $id;

	$img_url = "http://" . $host . "/gingersnaps/php/" . $target_path;
		$query = "INSERT INTO img_bank (id, img_url) VALUES (" . $id .  ",'" . $img_url . "')";
		echo $query;

	if(move_uploaded_file($_FILES['imgInp']['tmp_name'], $target_path)) {


		mysqli_query($con, $query);
    	echo "The file ".  basename( $_FILES['imgInp']['name']). " has been uploaded";
	} 
	else{
    	echo "There was an error uploading the file, please try again!";
	}

?>