<html>
<head>
	<?php 
	 require_once('../services/auth.php');
	 include_once '../configuration/site-header.php';
	 include_once '../configuration/config.php';
	 include_once './friend-functions.php';
	 include_once '../post/post-functions.php';
	?>
	<title>Friend Search</title>
</head>
<body>
	<div class="wrapper">
		<div class="page-header">
	    	<?php include '../header/header.php'; ?>
	    </div>
	    <div class="ui grid page page-container">
	    	<div class="column">		        		
	        	
	        		<div class="ui grid page-main-content">
	        			<div class="ui one wide column">	
						</div>
						<div class="ui fourteen wide column content-area">
							<div class="page-content">
							<!-- PAGE CONTENT -->							
							<?php 
								$search = $_GET['search'];
								$current_user = $_SESSION['user'];
								$user_results = findUser($search,$current_user);
							?>
							<h2>Search Result for "<?php echo $search; ?>"</h2>
							<br/>
							<?php foreach($user_results as $user_result): ?>
								<div class="user-box ui raised segment">
									<?php $profile_pic = getUserProfilePic($user_result['user_id']); ?>
									<img src="<?php echo $profile_pic;?>">
									<h4><?php echo $user_result['fname']." ".$user_result['lname'] ?></h4>
									<br>
									<div>
										<button class="ui tiny blue button">Add Friend<i class="add icon"></i></button>
									</div>
								</div>
							<?php endforeach; ?>
							

							<!-- END OF CONTENT -->
							</div>
						</div>
						<div class="ui one wide column">
						</div>
					</div>
				</div>
	        	
	    	</div>		            
	    </div>
	</div>
</body>
</html>