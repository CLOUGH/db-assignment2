<html>
<head>
	<title>Home</title>
	<?php 
		error_reporting(1);
		define ('APP_ROOT',substr(dirname(__FILE__),0, strrpos(dirname(__FILE__),'/',-1)));
		include APP_ROOT.'/configuration/site-header.php';
	?>	
</head>
<body>
	<div class="container">
		<?php
			if (session_status() == PHP_SESSION_NONE) {
			    echo "<div class='ui fixed transparent inverted main menu nav'>
			    		<div class='container'>
				    		<a class='item'>
							    <i class='home icon'></i>
							</a>
						</div>
					</div>";
			}
			else{ 
				echo "Test";
			}
		?>

		<div class="front-page">
			<div class="ui grid">
				<div class="eight wide column">
				   <div class="ui segment">
				   		<h1 class="ui header">Welcome!!</h1>
				   		<p>
				   			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
				   			standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
				   			 a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
				   			 remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets 
				   			 containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
				   			  including versions of Lorem Ipsum.
				   		</p>
				   </div>
				</div>
				<div class="five wide column">				   
				   	<form class="ui form segment"  method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/login/login.php" >
				   		<h3 class="ui header">Log-in</h3>
				   		<div class="field">
							<label>Email</label>
							<div class="ui left labeled icon input">
							    <input type="text" placeholder="Email" name="user_email">
							      	<i class="user icon"></i>
							    <div class="ui corner label">
							        <i class="icon asterisk"></i>
							    </div>
							</div>
							<div class="field">
								<label>Password</label>
								<div class="ui left labeled icon input">
									<input type="password" name="user_password">
									    <i class="lock icon"></i>
									<div class="ui corner label">
									    <i class="icon asterisk"></i>
									</div>
								</div>
							</div>
						</div>
						<input class="ui blue submit button" type="submit" value="Submit">
				   	</form>	
				   	<form method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/register/register.php" class="ui error form segment">

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
		</div>
	</div>
</body>
</html>