<?php
	include_once'../configuration/config.php';


	function getGroupMembers($group_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT fname,lname FROM profile JOIN add_to_group ON 
				profile.user_id=add_to_group.user_id WHERE group_id = '$group_id' ";
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

	function getGroupPost($group_id){

	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql = "SELECT date_created,fname,lname,title,text_body FROM profile JOIN create_content ON 
			profile.user_id = create_content.user_id JOIN group_post ON group_post.gpost_id = create_content.gpost_id	WHERE group_id = $group_id";

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
?>