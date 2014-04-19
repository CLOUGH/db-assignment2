<html>
<head>
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

			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/index.php">
			    			<i class='home icon'></i>
			    			Home
			    		</a>
			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/post">Posts</a>
			    		<a class="item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/db-assignment2/source/site/group">Groups</a>
			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/profile/profile_page.php">Profile</a>
			    		<a class="item" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/admin/index.php">
			    			Admin
			    		</a>
			    		<a class='item' href='http://<?php echo SERVER; ?>/db-assignment2/source/site/logout.php'>
			    			<i class="off icon" title="logout" data-variation="inverted"></i>
			    			</a>
			    		<div class='right menu'>
					    	<form  method="GET" action="http://<?php echo SERVER; ?>/db-assignment2/source/site/friend/friend-search.php">
					    		<div class='item'>
						    		<div class='ui icon input'>
								        <input type='text' placeholder='Search...' name="search" id="friend-search-field">
								        <i class='search link icon'></i>
							     	</div>					    		
					    		</div>
					    	</form>
						</div>
					</div>
			</div>
			<script type="text/javascript">
				$('.ui.popup')
				  .popup();				
			</script>
		<?php endif; ?>
