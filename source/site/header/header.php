<html>
<head>
	<title>Home</title>
	<?php 
		require_once '../configuration/site-header.php' ;
		require_once '../configuration/config.php';
	?>	
</head>
<body>
	<div class="container">
		<?php if ($_SESSION['user']==''): ?>
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
			    		<a class='item' href='../logout.php'><i class="off icon"></i></a>

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