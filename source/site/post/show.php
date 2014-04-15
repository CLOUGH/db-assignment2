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
	    	<?php include '../header/navbar.php'; ?>
	    </div>
	    <div class="ui grid page container">
	    	<div class="column">		        		
	        	<!-- PAGE CONTENT -->
				<div class="ui grid page-main-content">
					

					<div class="ui one wide column">	
					</div>
					
					<div class="ui fourteen wide column content-area">
					@include('blogs.edit-bar', array('active_views'=>$active_views,'blog'=>$blog))
						<div class="content">
							<h2 class="ui header">{{$blog->title}}</h2>
							<div class="blog-body">
								{{$blog->body}}
							</div>
						</div>
					</div>	

					<div class="ui one wide column">
					</div>
				</div>
				<div class="page-comments">

						<div class="ui grid comments" >
							<div class="comment">
								
							</div>
						</div>
					
				</div>
				<!-- END OF CONTENT -->
	    	</div>		            
	    </div>
	</div>
</body>
</html>