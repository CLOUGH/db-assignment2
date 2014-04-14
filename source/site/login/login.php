<?php 
$user_email = $_POST['user_email'];
$user_password = $_POST['password'];

//open a db connection
$mysqli = new mysqli('localhost', 'root', '', 'db_assignment2');
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');

$resultSet = $mysqli->query("CALL lookUpUser ('$user_email')");
$results  = mysqli_fetch_array($resultSet);
var_dump($results);

if(count($results)!=0)
{
	if($results['password']==$user_password)
	{
		$_SESSION['user'] = $results['user_id'];
		header("location:../profile/index.php");
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