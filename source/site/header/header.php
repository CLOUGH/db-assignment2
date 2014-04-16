<html>
<head>
	
	<?php 
		error_reporting(1);
		include '../configuration/site-header.php' ;
	?>	
</head>
<body>
	<div class="container">
		<?php
			if (session_status() == PHP_SESSION_NONE) {
			    ?>
			    <div class='ui fixed transparent inverted main menu nav'>
			    		<div class='container'>
				    		<a class='item'>
							    <i class='home icon'></i>
							</a>
						</div>
					</div>";
			<?php }
			else{ 
				?>
				<div class='ui fixed transparent inverted main menu nav'>
			    		<div class='container'>
				    		<a class='item' href='../logout.php'>logout</a>

				    		<a class="item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/db-assignment2/source/site/post">Posts</a>
				    		<a class="item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/db-assignment2/source/site/group">Groups</a>
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
		<?php
			}
		?>