<div class="ui modal" id="create-post-modal">
	<i class="close icon"></i>
	<div class="header">
		<h3>Create New Post</h3>
	</div>
	<div class="content">
		<form action="http://<?php echo SERVER;?>/db-assignment2/source/site/post/store.php" method="POST" class="ui form" id="create-post-form">
			<div class="ui field">
				<label>Image</label>
				<input type="text" name="post_image"/>
			</div>
			<div class="ui field">
				<label>Body</label>
				<textarea name ="post_body"></textarea>
			</div>
        </form>
	</div>
	<div class="actions">
		<button class="ui negative button cancel" >Cancel</button>
		<button class="ui positive right button save">Save</button>
	</div>
</div>
<script type="text/javascript">
	$("#create-post-button").click(function(event)
	{
		$('#create-post-modal').modal('setting', {
		    closable  : true,
		    transition: 'scale'
		}).modal('show');	
	});
	$("#create-post-modal .save").click(function(event){
		$("#create-post-form").submit();
	});
</script>