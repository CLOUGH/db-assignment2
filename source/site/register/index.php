<html>
<head>
	<title>Register</title>
	<?php 
		error_reporting(0);
		define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
		include APP_ROOT.'/configuration/site-header.php';
		session_start();

	?>	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<form method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/register/register.php"
			 class="ui error form segment">

				<?php if ($_SESSION['error_msg'] != ''): ?>
					<div class="ui error message">
						<?php echo "Session data : ". $_SESSION['error_msg']; ?>
						<!--div class="header">Action Forbidden</div-->
					</div>
					<?php 
						//clear session error msg
						$_SESSION['error_msg'] = null;
					?>
				<?php endif;?>
			  	<div class="two fields">
				    <div class="field">
				      <label>First Name</label>
				      <input placeholder="First Name" type="text" name="user_fname">
				    </div>
				    <div class="field">
				      <label>Last Name</label>
				      <input placeholder="Last Name" type="text" name="user_lname">
				    </div>
			  	</div>
			  	<div class="field">
			  		<label>Date of Birth</label>
			  		<div class="ui icon input">
						<input type="text" value="dd-mm-yyyy" name="user_dob" >
						<i class="calendar icon"></i>
					</div>
				</div>
			  	<div class="field">
					<label>Email</label>
				    <input placeholder="Email" type="text" name="user_email">
				</div>
				<div class="field">
					<label>Password</label>
				    <input type="password" name="user_password">
				</div>
				<div class="inline field">
					<div class="ui checkbox">
				    	<input type="checkbox">
				      	<label>I agree to the Terms and Conditions</label>
				    </div>
				</div>
				<input type="submit" class="ui blue button"/>
			</div>
		</div>
	</div>
</body>
</html>