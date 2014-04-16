<?php
function findUser($search,$current_user_id)
{
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$sql =  "SELECT user.user_id, email, fname, lname FROM user 
			JOIN profile ON profile.user_id = user.user_id 
			WHERE CONCAT_WS(' ', fname,lname) LIKE  '%$search%' 
			AND user.user_id<>'$current_user_id'
			AND user.user_id NOT IN( 
				SELECT friend as user_id FROM friend_of WHERE friend_owner='$current_user_id' 
			);";

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