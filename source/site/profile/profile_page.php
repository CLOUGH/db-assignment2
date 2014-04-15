<?php
	
	require_once('../services/auth.php');
	include '../header/header.php';
	require_once('../services/global_queries.php');
	 include '../post/post-functions.php';
	
?>	
	

		<div class = "content">

			<div class="ui grid">
				<div class = "five wide column">
					<div class="ui segment">
						<div class="ui left floated medium image">
						  	<a class="ui right red corner label">
						    	<i class="setting basic icon"></i>
						  	</a>
							<img class="rounded ui image center aligned" src="<?php echo $pic[0]; ?>">
						</div>
						<table class="ui basic table">
						  <thead>
						    <tr>
							    <th>Friends</th>
							    <th>Posts</th>						    
						  	</tr>
						</thead>
						 <tbody>
						    <tr>
						      <td><?php print_r($total_friends);?></td>
						      <td><?php print_r($post_count[0]);?></td>						      
						    </tr>
						   
						  </tbody>
						</table>
					</div>


				</div>
				<div class="ui modal">
					  	<i class="close icon"></i>
					<div class="header">
						    Upload Profile Picture
					</div>
					<div class="content">
					   <form action="../services/upload.php" method="post" enctype="multipart/form-data">
						    <input type="file" name="file">
						    <input type="submit">
						</form>
					</div>
					  	
				</div>
				<div class = "eleven wide column">
					<div class="ui segment">

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
				</div>

			</div>
		</div>
	</div>
<script>
 $('.setting').click(function(){
        $('.ui.modal').modal('show');
    });
</script>
</body>
</html>
