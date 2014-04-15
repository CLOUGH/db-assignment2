<?php
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	session_start();

	$post_body =mysql_escape_string ( $_POST['post_body']);
	$post_type = 'user_post';
	$post_image = '';
	$user_id = $_SESSION['user'];
	$date_created = date('Y-m-d');



	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	
	try {

		// Create the post
		$sql = "INSERT INTO post(post_type, image_path, text_body) 
			VALUES ('$post_type', '$post_image', '$post_body');";
	
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		$post_id = $mysqli->insert_id;



		//Create the relationship of the user and post
		$sql = "INSERT INTO creates(post_id,user_id,date_created) 
			VALUES ('$post_id','$user_id','$date_created');";
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		

		$mysqli->commit();
		header("Location: http://".SERVER."/db-assignment2/source/site/post/index.php");

	}catch(Exception $e)
	{
		//Rollback the transaction
		$mysqli->rollback();
		header("Location: http://".SERVER."/db-assignment2/source/site/post/create.php");
	}

	$mysqli->close();
?>