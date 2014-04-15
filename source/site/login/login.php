<?php 
define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
include '../configuration/hash-key.php';
include '../configuration/config.php';

session_start();

$user_email = $_POST['user_email'];
$user_password = crypt($_POST['user_password'],HASH_KEY);

//open a db connection
$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');

$resultSet = $mysqli->query("SELECT * FROM user WHERE email = '$user_email'");
$results = $resultSet->fetch_array();

if(count($results)!=0)
{
	if($results['password']==$user_password)
	{
		session_regenerate_id();
		$_SESSION['user'] = $results['user_id'];
		session_write_close();
		header("location: http://".$_SERVER['SERVER_NAME'].'/db-assignment2/source/site/profile/profile_page.php');
		exit();
	}
	else
	{
		$_SESSION['error_msg'] = "The email or password entered is incorrect";
		header("Location: http://".$_SERVER['SERVER_NAME']."/db-assignment2/source/site/login");
	}
}
else
{
	$_SESSION['error_msg'] = "The email or password entered is incorrect";
	header("Location: http://".$_SERVER['SERVER_NAME']."/db-assignment2/source/site/login");
}

$mysqli->close();
?>