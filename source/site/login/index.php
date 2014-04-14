<html>
<head>
	<title>Home</title>
	<?php 
		session_start();
		error_reporting(0);
		define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
		include APP_ROOT.'../configuration/site-header.php' 
	?>	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="login-area">
				<h1 claas="ui header">Login</h1>
				<form  class="ui error form segment" method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/login/login.php">
					<?php if ($_SESSION['error_msg'] != ''): ?>
						<div class="ui error message">
							<?php echo "Session data : ". $_SESSION['error_msg']; ?>
							<?php $_SESSION['error_msg'] = null; ?>
						</div>						
					<?php endif;?>
					<div>
						<p>Have a account?Register <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/register">Here</a></p>
					</div>
					<div class="field">
					    <label>Email</label>
				    	<input type="text" name="user_email">
				  	</div>
				  	<div class="field">
				  		<label>Password</label>
				  		<input type="password" name="user_password">
				  	</div>
				  	<input type="submit" class="ui blue button"/>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>