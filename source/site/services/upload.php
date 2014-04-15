<?php
session_start();
include '../configuration/config.php';
$file = $_FILES['file'];
$name = $file['name'];

$path = "../images/profile_pics/" . basename($name);



	
//open a db connection
$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if($mysqli->connect_errno > 0)
	die('Unable to connect to the database ['.$mysqli->connect_error.']');


if (move_uploaded_file($file['tmp_name'], $path)) {
    $sql = $mysqli->query("UPDATE profile SET profile_pic = '" . mysqli_real_escape_string($mysqli,$path) . "' WHERE user_id = ".$_SESSION['user']."") or die('Error: ' . mysqli_error($mysqli));
    header("location: http://".$_SERVER['SERVER_NAME'].'/db-assignment2/source/site/profile/profile_page.php');
   	
} else {
    die('failed');
}


?>