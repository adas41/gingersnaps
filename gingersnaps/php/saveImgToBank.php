<?php

	require_once('dbCon.php');

	$target_path = "uploads/";

	$info = pathinfo($_FILES['imgInp']['name']);
 	$ext = $info['extension']; // get the extension of the file
 	$newname = time() . '_image.' . $ext; 

 	$target = $target_path . $newname; 

	$id = $_POST['id'];
	echo $id;

	$img_url = "http://" . $host . "/gingersnaps/php/" . $target;
		$query = "INSERT INTO img_bank (id, img_url) VALUES (" . $id .  ",'" . $img_url . "')";
		echo $query;

	if(move_uploaded_file($_FILES['imgInp']['tmp_name'], $target)) {


		mysqli_query($con, $query);
    	echo "The file ".  basename( $_FILES['imgInp']['name']). " has been uploaded";
	} 
	else{
    	echo "There was an error uploading the file, please try again!";
	}

?>