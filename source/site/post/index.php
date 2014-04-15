<html>
<head>
	<?php 
	 session_start();
	 include '../configuration/site-header.php';
	 include '../configuration/config.php';
	 include './post-functions.php';
	?>
	<title>Posts</title>
</head>
<body>
	<div class="wrapper">
		<div class="page-header">
	    	<?php include '../header/navbar.php'; ?>
	    </div>
	    <div class="ui grid page container">
	    	<div class="column">		        		
	        	<!-- PAGE CONTENT -->
	        	<div class="ui grid">
					<div class="ui one wide column"></div>
					<div class="ui twelve wide column">
						<div>
							<a href="http://<?php echo SERVER; ?>/db-assignment2/source/site/post/create.php">
								<button class="ui small button">Create</button>
							</a>
						</div>
						<?php 
							//get all the post for the current user
							$user_id = $_SESSION['user'];
							$postResultSet = getAllPost($user_id);
						?>
						<?php while( $user_post = $postResultSet->fetch_array()): ?>
							<div class="ui user-post">
								<div class="post-header">
									<h2>
										<a href="http:://<?php echo SERVER; ?>/db-assignment2/source/site/post/show.php?post_id=<?php echo $user_post['post_id'];?>"> 
										<?php echo $user_post['title']; ?></a>
									</h2>
								</div>
							</div>
							<?php if($user_post['image_path']!=""): ?>
								<div class="post-image">
									<img src="<?php echo $user_post['image_path']; ?>">
								</div>
							<?php endif; ?>
							<div class="column  post-body">
								<?php echo $user_post['description']; ?>
							</div>
							<div class="post-footer">
							</div>
						<?php  endwhile; ?>						
					</div>	
					<div class="ui one wide column">
						
					</div>
				</div>

	    	</div>		            
	    </div>
	</div>
</body>
</html>