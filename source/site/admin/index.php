<html>
<head>
	<?php 
	 session_start();
	 include_once '../configuration/site-header.php';
	 include_once '../configuration/config.php';
	 include_once './admin-functions.php';
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
	        		<div class="ui grid page-main-content">
	        			<div class="ui one wide column">	
						</div>
						<div class="ui fourteen wide column content-area">
							<div class="page-content">
								<h2>Users</h2>
								<table class="ui table segment">
									<thead>
										<th>User ID</th>
										<th>User Name</th>
										<th>Email</th>
									</thead>
									<tbody>
									<?php $users = getAllUsers(); ?>
									<?php foreach($users as $user): ?>
										<tr>
											<td><?php echo $user['user_id']; ?></td>
											<td><?php echo $user['fname']." ".$user['lname']; ?></td>
											<td><?php echo $user['email']; ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								<br/>
								<div class="ui divider"></div>
								<h2>User Details</h2>
								
								<br/>
								<h4 class="ui header">Friends</h4>
								<table class="ui table segment">
									<thead>
										<th>Friend ID</th>
										<th>Friend Name</th>
										<th>Friend Email</th>
									</thead>
									<tbody>
										<tr class="empty-row">
											<td colspan="2">Currently no data</td>
										</tr>
									</tbody>
								</table>

								<br/>
								<h4 class="ui header">Post</h4>
								<table class="ui table segment post-table">
									<thead>
										<th>Post ID</th>
										<th>Post Content</th>
									</thead>
									<tbody>
										<tr class="empty-row">
											<td colspan="2">Currently no data</td>
										</tr>
									</tbody>
								</table>

								<br/>
								<h4 class="ui header">Comments</h4>
								<table class="ui table segment comment-table">
									<thead>
										<th>Post ID</th>
										<th>Comment</th>
									</thead>
									<tbody>
										<tr class="empty-row">
											<td colspan="2">Currently no data</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
						<div class="ui one wide column">
						</div>

					</div>
				</div>
	        	<!-- END OF CONTENT -->
	    	</div>		            
	    </div>
	</div>
</body>
</html>