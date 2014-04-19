<?php 
include_once '../configuration/hash-key.php';
include_once'../configuration/config.php';

function countFriends($user_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT COUNT(friend) as numberOfFriends FROM friend_of
			JOIN user ON user.user_id = friend_of.friend_owner
			WHERE user.user_id = '$user_id'";

	$resultSet = $mysqli->query($sql);
	$result = $resultSet->fetch_array();
	$mysqli->close();


	return $result['numberOfFriends'];
}
function addUploadedPicToDB($user_id, $path)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$pic_path = $mysqli->real_escape_string(pathToSite($path));
	$sql =  "UPDATE profile 
			SET profile_pic='$pic_path' 
			WHERE user_id = '$user_id'";
	$resultSet = $mysqli->query($sql);
	$mysqli->close();
}
function pathToSite($path)
{
	$url = substr($path, strrpos($path, "db-assignment2"));
	return $url;
}
?>