<?php
	session_start();
	include '../configuration/config.php';
	include './profile-functions.php';

	$file = $_FILES['file'];
	$user_id = $_SESSION['user'];
	
	$upload_dir= APP_ROOT."/resources/images/profile_pics/";
	$upload_file = $upload_dir . basename($_FILES['file']['name']);
	
	if (move_uploaded_file($file['tmp_name'], $upload_file)) {
	    addUploadedPicToDB($user_id, $upload_file);
	    header("location: http://".SERVER.'/db-assignment2/source/site/profile/profile_page.php');
	}
	else {
	    die('failed');
	}


?>