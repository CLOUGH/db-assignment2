<?php
	session_start();
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	

	$group_name = $_POST['group_name'];
	
	$user_id = $_SESSION['user'];
	$date_created = date('Y-m-d');


	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	
	try {

		// Create the post
		$sql = "INSERT INTO user_group(group_name) 
			VALUES ('$group_name');";
	
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		$group_id = $mysqli->insert_id;



		//Create the relationship of the user and post
		$sql = "INSERT INTO create_group(group_id,user_id,date_created) 
			VALUES ('$group_id','$user_id','$date_created');";
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		

		$mysqli->commit();
		header("Location: http://".SERVER."/db-assignment2/source/site/group/index.php");

	}catch(Exception $e)
	{
		//Rollback the transaction
		$mysqli->rollback();
		header("Location: http://".SERVER."/db-assignment2/source/site/post/create.php");
	}

	$mysqli->close();
?>