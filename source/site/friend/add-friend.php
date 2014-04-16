<?php
	
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	session_start();

	$friend_id = $_POST['friend_id'];
	$friend_owner_id = $_SESSION['user'];
	$friend_type = "friend";
	$search = $_POST['search'];

	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	
	try {
		//check if user is in db
		$sql = "SELECT user_id FROM user WHERE user.user_id = '$friend_id'";
		$resultSet = $mysqli->query($sql);
		if($resultSet->num_rows==0)	
			throw new Exception('Error: ' .$mysqli->error);
	
		//Ensure that the user is not yourself
		if($friend_owner_id===$friend_id)
			throw new Exception('Error: Logic error. Trying to add yourself as a friend');
	
		$sql = "INSERT INTO friend_of(friend, friend_owner,type) 
			VALUES ('$friend_id', '$friend_owner_id', '$friend_type');";
	
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);



		$mysqli->commit();
		header("Location: http://".SERVER."/db-assignment2/source/site/profile/profile_page.php");

	}catch(Exception $e){
		$mysqli->rollback();
		header("Location: http://".SERVER."/db-assignment2/source/site/friend/friend-search.php?search=");
	}
	$mysqli->close();
?>