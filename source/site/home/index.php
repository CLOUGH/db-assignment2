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
									<input type="password" name="password">
									    <i class="lock icon"></i>
									<div class="ui corner label">
									    <i class="icon asterisk"></i>
									</div>
								</div>
							</div>
						</div>
						<input class="ui blue submit button" type="submit" value="Submit">
				   	</form>	
				   	<form class="ui fluid form segment" method="POST" action="http://<?php echo $_SERVER['SERVER_NAME'];?>/db-assignment2/source/site/register/register.php">
				   		<h3 class="ui header" >Register</h3>
				   		<div class="two fields">
					        <div class="field">
					          <label>First Name</label>
					          <input placeholder="First Name" type="text">
					        </div>
					        <div class="field">
					          <label>Last Name</label>
					          <input placeholder="Last Name" type="text">
					        </div>
      					</div>
					    <div class="field">
					        <label>Username</label>
					        <input placeholder="Username" type="text">
					    </div>
					    	<div class="field">
					        	<label>Password</label>
					        	<input type="password">
					    </div>
					    <div class="inline field">
					        <div class="ui checkbox">
					         	<input type="checkbox" id="conditions">
					         	<label for="conditions">I agree to the terms and conditions</label>
					        </div>
					    </div>
					    <input class="ui blue submit button" type="submit" value="Submit">
				   	</form>	

				</div>
			</div>
		</div>
	</div>
</body>
</html>