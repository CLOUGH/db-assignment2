<?php
include '/configuration/config.php';
//Start session

	
//open a db connection
$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');


//Profile Page Queries
$friends = $mysqli->query("SELECT COUNT(friend_owner) FROM `friend_of` WHERE friend_owner = ".$_SESSION['user'].";");
$count = $friends->fetch_array();
$post = $mysqli->query("SELECT COUNT(user_id) FROM `creates` WHERE user_id = ".$_SESSION['user'].";");
$post_count = $post->fetch_array();

?>