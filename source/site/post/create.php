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
	    <div class="ui grid page page-container">
	    	<div class="column">		        		
	        	<!-- PAGE CONTENT -->
	        	<div class="ui grid">
					<div class="ui one wide column">
						
					</div>
					<div class="ui fourteen wide column content-area">
						<div class="content">
							<h2 class="ui header">Create Post</h2>

							<form action="http://<?php echo SERVER;?>/db-assignment2/source/site/post/store.php" method="POST" class="ui form">
								<div class="field">
									<label>Title</label>
									<input type='text' name="post_title"/>
								</div>
								<div class="ui field">
									<label>Image</label>
									<input type="text" name="post_image"/>
								</div>
								<div class="ui field">
									<label>Description</label>
									<textarea name ="post_description"></textarea>
								</div>
								<div class="field">
									<textarea name="post_body" id="blog-body"></textarea>
						            <script>
						                CKEDITOR.replace( 'blog-body',{height: 500});
						            </script>
						        </div>
					            <div>
									<input type="submit" value="Save" class="ui submit button"/>
								</div>
					        </form>
					    </div>
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