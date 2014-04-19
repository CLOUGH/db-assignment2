<<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		session_start();
		include '../header/header.php';
		include_once '../services/auth.php';
		require_once '../services/global_queries.php';
		include_once '../post/post-functions.php';
		include_once './profile-functions.php'

	?>
</head>
<body>
	<?php 
		//get all the post for the current user
		$user_id = $_SESSION['user'];
		$user_posts = getAllUserPost($user_id);
	?>
	<div class = "content">

		<div class="ui grid">
			<div class = "five wide column">
				<div class="ui segment"> 
					<div class="ui left floated medium image">
					  	<a class="ui right red corner label" id="change-profile-pic">
					    	<i class="setting basic icon"></i>
					  	</a>
						<img class="rounded ui image center aligned" src="<?php echo getUserProfilePic($user_id);?>">
					</div>
					<table class="ui basic table">
						<thead>
						    <tr>
							    <th>Friends</th>
							    <th>Posts</th>
							    <th>Groups</th>							    
						  	</tr>
						</thead>
						<tbody>
						    <tr>
						      <td><?php echo countFriends($user_id) ?></td>
						      <td><?php echo $post_count[0]; ?></td>
						      <td><?php echo $groups_count[0]; ?></td>							      
						    </tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class = "eleven wide column" style="margin-top: 0px;">
								
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
							
						</div>
						<div class="ui divider"></div>
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
	
		<div class="ui modal">
			<i class="close icon"></i>
			<div class="header">
				    Upload Profile Picture
			</div>
			<div class="content">
			   <form action="http://<?php echo SERVER; ?>/db-assignment2/source/site/profile/upload_picture.php" method="post" enctype="multipart/form-data" class="ui form">
			   		<div class="ui field">
					    <input type="file" name="file" class="ui button">
					    <input type="submit" class="ui blue button">
					</div>
				</form>
			</div>		  	
		</div>
	</div>
	<script>
		$('#change-profile-pic').click(function(){
		    $('.ui.modal').modal('show');
		});
	</script>

</body>
</html>
	
	

