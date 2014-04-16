<?php
	
	require_once('../services/auth.php');
	include '../header/header.php';
	include './group_page_info.php';
	
?>	

<div class = "content">
			<div class="ui grid">
				<div class="four wide column"></div>
				<div class="ui twelve wide column">
					<div>
						<button class="ui small button" id="create-group-post">Create Group Post</button>
					</div>
				</div>

			</div>

			<div class="ui grid">
				<div class = "four wide column">
					<div class="ui segment">
						<?php echo $group = $_GET["group_id"]; 
								$user_id = $_SESSION['user'];
								$group_members = getGroupMembers($group);
						?>
						<?php	if(empty($group_members)): ?>
							<div style="margin-top: 20px;"> 
								<p> This Group Has No Members. </p>
							</div>
						<?php endif;?>
						<h3 class="ui header">Group Members:</h3>
						<?php 
							foreach ($group_members as $group_member) {
							?>
							
								<ul>
									<li><?php echo $group_member['fname']." ".$group_member['lname']; ?></li>
								</ul>
							<?php }?>
					</div>


				</div>
				
				<div class="ui twelve wide column">
						
					<div class="ui segment">
						
						<?php 
							$group_posts = getGroupPost($group);
							?>
							<?php	if(empty($group_posts)): ?>
							<div style="margin-top: 20px;"> 
								<p> Be the First to Post in this group. </p>
							</div>
						<?php endif;?>
						<?php
							foreach ($group_posts as $group_post) {
								?>
								<h3 class="ui header"><?php echo $group_post['title'];?></h3>
								<p>Created By: <?php echo $group_post['fname']." ".$group_post['lname']." On ".$group_post['date_created'];?></p>
								<p><?php echo $group_post['text_body'];?></p>
								<div class="ui section divider"></div>
						<?php	}?>
					</div>

			</div>
		</div>
	</div>
	<?php include "./create_group_post.php"; ?>

</body>
</html>