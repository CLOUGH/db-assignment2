<?php
	include '../configuration/hash-key.php';
	include '../configuration/config.php';
	session_start();

	$post_title = $_POST['post_title'];
	$post_description = $_POST['post_description'];
	$post_body = $_POST['post_body'];

	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	try {
		
	}catch(Exception $e)
	{

	}

?>