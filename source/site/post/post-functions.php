<?php 
include_once '../configuration/hash-key.php';
include_once'../configuration/config.php';

function getAllPost($user_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT fname, lname, post.post_id, date_created, image_path,text_body FROM post 
			JOIN creates ON creates.post_id = post.post_id 
			JOIN profile ON profile.user_id = creates.user_id
			WHERE creates.user_id = '$user_id'";
	$resultSet = $mysqli->query($sql);
	$result= array();
	if($resultSet!=false)
	{
		while($row = $resultSet->fetch_array())
		{
			array_push($result, $row);
		}
	}

	$mysqli->close();
	return $result;
}

function getPost($post_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT post.post_id, date_created, image_path, title, description,text_body FROM post 
			JOIN creates ON creates.post_id = post.post_id 
			WHERE post.post_id = '$post_id'";
	$resultSet = $mysqli->query($sql);

	$mysqli->close();
	return $resultSet->fetch_array();

}
function getUserProfilePic($user_id)
{
	return "http://".SERVER."/db-assignment2/source/site/resources/images/profile_pics/default-user.png";
}

function getAllCommentsForPost($post_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT comment.comment_id, user_id, content, date_commented FROM comment 
		JOIN comments_on ON comments_on.comment_id = comment.comment_id
		WHERE comments_on.post_id = '$post_id'";
	$resultSet = $mysqli->query($sql);

	$result= array();
	if($resultSet!=false)
	{
		while($row = $resultSet->fetch_array())
		{
			array_push($result, $row);
		}
	}
	$mysqli->close();
	return $result;
}
function getUserProfile($user_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT fname,lname, dob, profile_pic FROM profile WHERE user_id = '$user_id' ";
	$resultSet = $mysqli->query($sql);

	$mysqli->close();
	return $resultSet->fetch_array();

}
?>