<?php 
include_once '../configuration/hash-key.php';
include_once'../configuration/config.php';

function getAllPost($user_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT post.post_id, date_created, image_path, title, description,text_body FROM post 
			JOIN creates ON creates.post_id = post.post_id 
			WHERE creates.user_id = '$user_id'";
	$resultSet = $mysqli->query($sql);

	$mysqli->close();
	return $resultSet;
}
?>