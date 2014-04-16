<?php
require_once '../configuration/config.php';
//Start session

	
//open a db connection
$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');


//Profile Page Queries
$friends = $mysqli->query("SELECT COUNT(friend_owner) FROM `friend_of` WHERE friend_owner = ".$_SESSION['user'].";");
$inverse_friends = $mysqli->query("SELECT COUNT(friend) FROM `friend_of` WHERE friend = ".$_SESSION['user'].";");

$inverse_count = $inverse_friends->fetch_array();
$count = $friends->fetch_array();
$total_friends = $count[0] + $inverse_count[0];

$post = $mysqli->query("SELECT COUNT(user_id) FROM `creates` WHERE user_id = ".$_SESSION['user'].";");
$post_count = $post->fetch_array();

$groups = $mysqli->query("SELECT COUNT(user_id) FROM `add_to_group` WHERE user_id = ".$_SESSION['user'].";");
$groups_count = $groups->fetch_array();

$Profile_pic = $mysqli->query("SELECT profile_pic FROM `profile` WHERE user_id = ".$_SESSION['user'].";");
$pic = $Profile_pic->fetch_array();


?>