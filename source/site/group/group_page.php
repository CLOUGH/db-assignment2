<?php
	
	require_once('../services/auth.php');
	include '../header/header.php';
	include './group_page_info.php';
	
?>	

<div class = "content">

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


					</div>


				</div>
				
				<div class="ui twelve wide column">
						<div>
							<button class="ui small button" id="create-group-post">Create</button>
						</div>

			</div>
		</div>
	</div>
	<?php include "./create_group_post.php"; ?>

</body>
</html>