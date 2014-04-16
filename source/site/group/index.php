<?php 
	require_once('../services/auth.php');
	include '../header/header.php'; 
	include '../configuration/site-header.php';
	include './groups_functions.php';

?>

<title>Groups</title>
	<div class="container">

	 <div class="ui grid page content">
		    	<div class="column">		        		
		        	<!-- PAGE CONTENT -->
		        	<div class="ui grid">
						
						<div class="ui sixteen wide column">
							<div>
								<button class="ui small button" id="create-group-button">Create Group</button>
								<?php include "./create_group_modal.php"; ?>
							</div>
							<?php 
								//get all the post for the current user
								$user_id = $_SESSION['user'];
								$groups = getAllgroups();
							?>
							<?php	if(empty($groups)): ?>
								<div style="margin-top: 20px;"> 
									<p> There are no groups. </p>
								</div>
							<?php endif;?>


							<?php foreach($groups as $group): ?>
								<div class="ui post">
									<div class="post-header">
										<h3>
											<a href="http://<?php echo SERVER; ?>/db-assignment2/source/site/group/group_page.php?group_id=<?php echo $group['group_id']; ?>"> 
											<?php echo $group['group_name']; ?></a>
										</h3>
										<p>Created On: <?php echo $group['date_created'];?></p>
										<p>Created By: <?php echo $group['fname']." ".$group['lname'];?></p>
										<hr>
									</div>					
									
									
									<div class="post-comments">
										<a class="ui blue button" href="http://<?php echo SERVER; ?>/db-assignment2/source/site/group/join_group.php?group_id=<?php echo $group['group_id']; ?>">Join Group</a>
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
						<?php include "./create_group_modal.php"; ?>
						<div class="ui one wide column"></div>
					</div>

		    	</div>		            
		    </div>
		
	</div>
</body>
</html>