<html>
<head>
	<title>Register</title>
	<?php 
		error_reporting(0);
		define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
		include APP_ROOT.'/configuration/site-header.php' 
	?>	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<form method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/register/register.php" class="ui error form segment">
				<?php if (!empty($_SESSION['error_msg'])): ?>
					<div class="ui error message">
						<!--div class="header">Action Forbidden</div-->
						<p><?php echo  !empty($_SESSION['error_msg'])? empty($_SESSION['error_msg']) : ''?></p>
					</div>
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
					<label>Email</label>
				    <input placeholder="Username" type="text">
				</div>
				<div class="field">
					<label>Password</label>
				    <input type="password">
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