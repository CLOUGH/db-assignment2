<?php 
	include '../configuration/config.php';
	session_start();

	$group = $_GET['group_id'];
	function JoinGroup($user_id,$group_id)
	{
		$date_added = date('Y-m-d');
		//open a db connection
		$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
		if($mysqli->connect_errno > 0)
			die('Unable to connect to the database ['.$mysqli->connect_error.']');

		try {

			

			//Create the relationship of the user and post
			$sql = "INSERT INTO add_to_group(group_id,user_id,date_added) 
				VALUES ('$group_id','$user_id','$date_added');";
			$resultSet = $mysqli->query($sql);
			if($resultSet === false)	
				throw new Exception('Error: ' .$mysqli->error);
			

			$mysqli->commit();
			header("Location: http://".SERVER."/db-assignment2/source/site/group/group_page.php?group_id=$group_id");

		}catch(Exception $e)
		{
			//Rollback the transaction
			$mysqli->rollback();
			echo $e;
		}


	}
JoinGroup($_SESSION['user'],$_GET['group_id']);
?>