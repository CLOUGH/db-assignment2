<div class="ui modal" id="create-group-modal">
	<i class="close icon"></i>
	<div class="header">
		<h3>Create New Group</h3>
	</div>
	<div class="content">
		<form action="http://<?php echo SERVER;?>/db-assignment2/source/site/group/store_groups.php" method="POST" class="ui form" id="create-group-form">
			<div class="ui field">
				<label>Name</label>
				<input type="text" name="group_name"/>
			</div>
        </form>
	</div>
	<div class="actions">
		<button class="ui negative button cancel" >Cancel</button>
		<button class="ui positive right button save">Save</button>
	</div>
</div>
<script type="text/javascript">
	$("#create-group-button").click(function(event)
	{
		$('#create-group-modal').modal('setting', {
		    closable  : true,
		    transition: 'scale'
		}).modal('show');	
	});
	$("#create-group-modal .save").click(function(event){
		$("#create-group-form").submit();
	});
</script>