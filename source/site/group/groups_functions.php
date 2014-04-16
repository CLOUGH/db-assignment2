<?php 
include_once '../configuration/hash-key.php';
include_once'../configuration/config.php';



function getAllgroups()
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT user_group.group_id, group_name,date_created,lname,fname FROM user_group JOIN create_group ON 
			user_group.group_id = create_group.group_id JOIN profile ON profile.user_id = create_group.user_id WHERE 1";
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