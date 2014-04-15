<?php
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	session_start();

	$user_comment = mysql_escape_string ($_POST['new_comment']);
	$post_id = $_POST['post_id'];
	$user_id = $_SESSION['user'];
	$comment_date = date('Y-m-d');


	var_dump($_POST);

	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	try {
		// Create comment
		$sql = "INSERT INTO comment(content) VALUES ('$user_comment');";
		var_dump($sql);
		
		$resultSet = $mysqli->query($sql);
		if($resultSet === FALSE)	
			throw new Exception('Error: ' .$mysqli->error);
		$comment_id = $mysqli->insert_id;

		//Create realtionship to post
		$sql = "INSERT INTO comments_on(post_id,user_id,comment_id, date_commented)
			VALUES ('$post_id','$user_id','$comment_id','$comment_date')";
			var_dump($sql);
		$resultSet = $mysqli->query($sql);
		if($resultSet === FALSE)	
			throw new Exception('Error: ' .$mysqli->error);
		
		$mysqli->commit();
		
	}catch(Exception $e)
	{
		$mysqli->rollback();

	}
	header("Location: http://".SERVER."/db-assignment2/source/site/post/index.php");
	$mysqli->close();
?>