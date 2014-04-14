
<?php 
	define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
	include APP_ROOT.'../configuration/hash-key.php';
	include APP_ROOT.'../configuration/config.php';

	session_start();

	$user_email = $_POST['user_email'];
	$user_password = crypt($_POST['user_password'],HASH_KEY);
	$user_fname = $_POST['user_fname'];
	$user_lname = $_POST['user_lname'];
	$user_dob = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['user_dob'])));
	//open a db connection
	$mysqli = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	if($mysqli->connect_errno > 0)
		die('Unable to connect to the database ['.$mysqli->connect_error.']');

	$mysqli->autocommit(FALSE);
	try {
		//$mysqli->begin_transaction();

		//setup the user account
		$resultSet = $mysqli->query("INSERT INTO user(status,password,email) VALUES ('active','$user_password','$user_email');");
		if($resultSet === false)	
			throw new Exception('Error: ' .$mysqli->error);
	
		//get the current user_id for the foriegn key for the profile
		$resultSet= $mysqli->query("SELECT * FROM user WHERE email ='$user_email';");
		$results = $resultSet->fetch_array();
		$current_user_id = $results['user_id'];

		//set up the user profile
		$results = $mysqli->query("INSERT INTO profile(user_id, fname, lname, dob) VALUES('$current_user_id','$user_fname','$user_lname','$user_dob');");
		if($results === false)
			throw new Exception('Error: ' .$mysqli->error);
	
		$mysqli->commit();
		header("Location: http://".$_SERVER['SERVER_NAME']."/db-assignment2/source/site/profile/profile_page.php");
	}catch(Exception $e)
	{
		//Rollback the transaction
		$mysqli->rollback();

		//check if the user email already exist for an account
		$sql = "SELECT email FROM user WHERE email = '$user_email'";
	
		if($mysqli->query($sql))
		{//if the query returened true
			$_SESSION['error_msg'] = "An account already exists with this email.";
		}
		else
		{
			$_SESSION['error_msg'] = "An error has occured.";
		}
		header("Location: http://".$_SERVER['SERVER_NAME']."/db-assignment2/source/site/register");
		
	}
	

	$mysqli->close();
?>

