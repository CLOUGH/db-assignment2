<div class="ui modal" id="create-group-post-modal">
	<i class="close icon"></i>
	<div class="header">
		<h3>Create New Group Post</h3>
	</div>
	<div class="content">
		<form action="http://<?php echo SERVER;?>/db-assignment2/source/site/group/store_groups.php" method="POST" class="ui form" id="create-group-post-form">
			<div class="ui field">
				<label>Title</label>
				<input   type="text" name ="post_title"></input>
			</div>
			<div class="ui field">
				<label>Post Type</label>
				<input   type="text" name ="post_type"></input>
			</div>
			<div class="ui field">
				<label>Image</label>
				<input type="text" name="post_image"/>
			</div>
			<div class="ui field">
				<label>Body</label>
				<textarea name ="post_body" id="post-body"></textarea>
			</div>
        </form>
	</div>
	<div class="actions">
		<button class="ui negative button cancel" >Cancel</button>
		<button class="ui positive right button save">Save</button>
	</div>
</div>
<script>
    CKEDITOR.replace( 'post-body',{height: 500});
</script>
<script type="text/javascript">
	$("#create-group-post").click(function(event)
	{
		$('#create-group-post-modal').modal('setting', {
		    closable  : true,
		    transition: 'scale'
		}).modal('show');	
	});
	$("#create-group-post-modal .save").click(function(event){
		$("#create-group-post-form").submit();
	});

</script>