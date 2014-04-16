<?php
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	session_start();

	$group_id = $_POST['group'];
	$title = $_POST['post_title'];
	$post_type = $_POST['post_type'];
	$post_image = $_POST['post_image'];
	$text = $_POST['post_body'];


	$user_id = $_SESSION['user'];


	$date_created = date('Y-m-d');


	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	
	try {

		//Create the post
		$sql = "INSERT INTO group_post(title,g_post_type,g_image_path,text_body) 
			VALUES ('$title','$post_type','$post_image','$text');";
	
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		$gpost_id = $mysqli->insert_id;

		//Create the relationship of the user and post
		$sql = "INSERT INTO create_content(user_id,group_id,gpost_id,date_created) 
			VALUES ('$user_id','$group_id','$gpost_id','$date_created');";
		$resultSet = $mysqli->query($sql);
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
		

		$mysqli->commit();
		header("Location: http://".SERVER."/db-assignment2/source/site/group/index.php");

	}catch(Exception $e)
	{
		//Rollback the transaction
		$mysqli->rollback();
		// header("Location: http://".SERVER."/db-assignment2/source/site/post/create.php");
		echo $e;
	}

	$mysqli->close();
?>