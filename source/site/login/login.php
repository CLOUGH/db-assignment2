<?php 
session_start();

$user_email = $_POST['user_email'];
$user_password = $_POST['password'];

//open a db connection
$mysqli = new mysqli('localhost', 'user', 'gtx@6075', 'demo');
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');

$resultSet = $mysqli->query("CALL lookUpUser ($user_email)");
$results  = myqli_fetch_array($resultSet);


if(count($results)!=0)
{
	if($results['password']==$user_password)
	{
		$_SESSION['user'] = $results['user_id'];
	}
	else
	{
		$_SESSION['error_msg'] = "The email or password entered is incorrect";
	}
}
else
{
	$_SESSION['error_msg'] = "The email or password entered is incorrect";
}

$mysqli->close();
?>