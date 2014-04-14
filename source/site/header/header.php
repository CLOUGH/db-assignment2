<html>
<head>
	<title>Home</title>
	<?php 
		error_reporting(1);
		include './configuration/site-header.php' 
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
				 echo "<div class='ui fixed transparent inverted main menu nav'>
			    		<div class='container'>
				    		<a class='item'>
							    <i class='home icon'></i>Navigation
							</a>
						</div>
					</div>";
			}
		?>