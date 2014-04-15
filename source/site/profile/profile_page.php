<?php
	
	require_once('../services/auth.php');
	include '../header/header.php';
	require_once('../services/global_queries.php');
	
?>

		<div class = "content">

			<div class="ui grid">
				<div class = "five wide column">
					<div class="ui segment">
						<div class="ui left floated medium image">
						  	<a class="ui right red corner label">
						    	<i class="setting basic icon"></i>
						  	</a>
							<img class="rounded ui image center aligned" src="<?php echo $pic[0]; ?>">
						</div>
						<table class="ui basic table">
						  <thead>
						    <tr>
							    <th>Friends</th>
							    <th>Posts</th>						    
						  	</tr>
						</thead>
						 <tbody>
						    <tr>
						      <td><?php print_r($total_friends);?></td>
						      <td><?php print_r($post_count[0]);?></td>						      
						    </tr>
						   
						  </tbody>
						</table>
					</div>


				</div>
				<div class="ui modal">
					  	<i class="close icon"></i>
					<div class="header">
						    Upload Profile Picture
					</div>
					<div class="content">
					   <form action="../services/upload.php" method="post" enctype="multipart/form-data">
						    <input type="file" name="file">
						    <input type="submit">
						</form>
					</div>
					  	
				</div>
				<div class = "eleven wide column">
					<div class="ui segment">

					</div>
				</div>

			</div>
		</div>
	</div>
<script>
 $('.setting').click(function(){
        $('.ui.modal').modal('show');
    });
</script>
</body>
</html>
