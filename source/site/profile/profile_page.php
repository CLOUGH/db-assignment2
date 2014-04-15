<?php
	
	require_once('../auth.php');
	include '../header/header.php';
	require_once('../global_queries.php');
	
?>

		<div class = "content">

			<div class="ui grid">
				<div class = "five wide column">
					<div class="ui segment">
						<div class="ui left floated medium image">
						  	<a class="ui right red corner label">
						    	<i class="setting basic icon"></i>
						  	</a>
							<img class="rounded ui image center aligned" src="http://placehold.it/300x150">
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
						      <td><?php print_r($count[0]);?></td>
						      <td><?php print_r($post_count[0]);?></td>						      
						    </tr>
						   
						  </tbody>
						</table>
					</div>


				</div>

				<div class = "eleven wide column">
					<div class="ui segment">

					</div>
				</div>

			</div>
		</div>
	</div>

</body>
</html>
