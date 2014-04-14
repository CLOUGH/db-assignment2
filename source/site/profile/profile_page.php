<html>
<head>
	<title>Home</title>
	<?php 
		error_reporting(1);
		
		include '../configuration/site-header.php';
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

		<div class = "content">

			<div class="ui grid">
				<div class = "five wide column">
					<div class="ui segment">
						<img class="circular ui image" src="/images/demo/photo2.jpg">
					</div>


				</div>

				<div class = "eleven wide column">
					<div class="ui segment">

					</div>
				</div>

			</div>
		</div>
	</div>

</body>
</html>
