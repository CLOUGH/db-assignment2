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
	        	<div class="ui grid">
					<div class="ui one wide column"></div>
					<div class="ui twelve wide column">
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

					</div>
					<div class="ui one wide column">						
					</div>
				</div>
	        	<!-- END OF CONTENT -->
	    	</div>		            
	    </div>
	</div>
</body>
</html>