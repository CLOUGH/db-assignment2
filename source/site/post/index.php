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
	    	<?php include '../header/header.php'; ?>
	    </div>
	    <div class="ui grid page page-container">
	    	<div class="column">		        		
	        	<!-- PAGE CONTENT -->
	        	<div class="ui grid">
					<div class="ui one wide column"></div>
					<div class="ui twelve wide column">
						<div>
							<button class="ui small button" id="create-post-button">Create</button>
						</div>
						<?php 
							//get all the post for the current user
							$user_id = $_SESSION['user'];
							$user_posts = getAllPost($user_id);
						?>
						<?php	if(empty($user_posts)): ?>
							<div style="margin-top: 20px;"> 
								<p> You currently have no post. </p>
							</div>
						<?php endif;?>


						<?php foreach($user_posts as $user_post): ?>
							<div class="ui post">
								<div class="post-header">
									<img class="profile-pic" src="http://<?php echo SERVER;?>/db-assignment2/source/site/resources/images/profile_pics/default-user.png">
									<h3>
										<a href="http://<?php echo SERVER; ?>/db-assignment2/source/site/profile/profile_page.php"> 
										<?php echo $user_post['fname']." ".$user_post['lname']; ?></a>
									</h3>
									<p>Created: <?php echo $user_post['date_created'];?></p>
									<hr>
								</div>
								<?php if($user_post['image_path']!=""): ?>
									<div class="post-image">
										<img src="<?php echo $user_post['image_path']; ?>">
									</div>
								<?php endif; ?>
								<div class="column  post-body">
									<?php echo $user_post['text_body']; ?>
								</div>
								<div class="post-footer">
								</div>
							</div>
						<?php  endforeach; ?>						
					</div>	
					<div class="ui one wide column">						
					</div>
					<?php include "./create-post-modal.php"; ?>
				</div>

	    	</div>		            
	    </div>
	</div>
</body>
</html>