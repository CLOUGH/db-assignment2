<html>
<head>
	<?php 
	require_once('../services/auth.php');
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
									<img class="profile-pic" src="<?php echo getUserProfilePic($user_id);?>">
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
								<div class="post-comments">
									<?php 
										$user_comments = getAllCommentsForPost($user_post['post_id'])
									?>
									<?php foreach($user_comments as $user_comment): ?>
										<?php 
											$commenter = getUserProfile($user_comment['user_id']);
										?>
										<div class="user-comment">
											<img src="<?php echo getUserProfilePic($user_comment['user_id']);?>">
											<div class="comment-content">
												<h4><?php echo $commenter['fname']." ".$commenter['lname'];?></h4>
												<p>	 <?php echo $user_comment['content']?></p>
												<p class="date-commented"><?php echo $user_comment['date_commented'];?></p>
											</div>
											
										</div>
									<?php endforeach; ?>
									<div>
									<form action="http://<?php echo SERVER;?>/db-assignment2/source/site/comment/store.php" method="POST" class="ui form">
										<div class="field comment-field">
											<img src="<?php echo getUserProfilePic($user_id);?>">
											<textarea class="new-comment" name="new_comment" ></textarea>
											<input type="hidden" name="post_id" value="<?php echo $user_post['post_id'];?>" >
										</div>
									</form>
									</div>
								</div>
							</div>
						<?php  endforeach; ?>
						<script type="text/javascript">
							$(".comment-field textarea.new-comment").keypress(function (e) {
							 	var key = e.which;
							 	if(key == 13)  // the enter key code
							      	$(e.target.offsetParent).submit();							  	
							});   
						</script>						
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