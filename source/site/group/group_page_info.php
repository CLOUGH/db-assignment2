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


?>