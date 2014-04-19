<html>
<head>
	<title>Home</title>
	<?php 
		session_start();
		include './configuration/site-header.php';
		include './configuration/config.php';
	?>	
</head>
<body>
	<div class="container">
		<?php if (!isset($_SESSION['user'])): ?>
		    <div class='ui fixed transparent inverted main menu nav'>
	    		<div class='container'>
		    		<a class='item'>
					    <i class='home icon'></i>
					    Home
					</a>
				</div>
			</div>
		<?php else: ?>
			<div class='ui fixed transparent inverted main menu nav'>
		    		<div class='container'>
			    		<a class='item' href='http://<?php echo SERVER; ?>/db-assignment2/source/site/logout.php'><i class="off icon"></i></a>

			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/post">Posts</a>
			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/profile/profile_page.php">Profile</a>
			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/index.php">
			    			<i class='home icon'></i>
			    			Home
			    		</a>
			    		<div class='right menu'>
						    <div class='item'>
						      <div class='ui icon input'>
						        <input type='text' placeholder='Search...'>
						        <i class='search link icon'></i>
						      </div>
						    </div>
						</div>
					</div>
			</div>
		<?php endif; ?>

		<div class="front-page">
			<div class="ui grid">
				<div class="eight wide column">
				   <div class="ui segment">
				   		<h1 class="ui header" align = "center"><img src="/db-assignment2/source/site/resources/images/Graphics/Logo.png" alt = "MyBook Logo" width="459" height="145"></h1>
				   		
				   		<p align = "center">
				   			<font size = "5.5" face = "calibri" >
				   					Welcome to MyBook social network. Connect with your friends and family today.
				   			</font>
				   			
				   		</p>
				   		<br><br/>
				   		<img src="/db-assignment2/source/site/resources/images/Graphics/friends.jpg" alt = "Friends" width="545" height="420">
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

						<?php if (isset($_SESSION['error_msg'])): ?>
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