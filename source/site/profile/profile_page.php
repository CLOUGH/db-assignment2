<html>
<head>
	<title>Home</title>
	<?php 
		error_reporting(1);
		
		include '../configuration/site-header.php';
		session_start();
		echo $_SESSION['user'];
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
				    		<a class='item'>Home</a>
				    		 <div class='right menu'>
							    <div class='item'>
							      <div class='ui icon input'>
							        <input type='text' placeholder='Search...''>
							        <i class='search link icon'></i>
							      </div>
							    </div>
							 </div>
						</div>
					</div>";
			}
		?>
		

		<div class = "content">

			<div class="ui grid">
				<div class = "five wide column">
					<div class="ui segment">
						<div class="ui left floated medium image">
						  	<a class="ui right red corner label">
						    	<i class="setting basic icon"></i>
						  	</a>
							<img class="rounded ui image center aligned" src="http://placehold.it/300x150">
						</div>	
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
