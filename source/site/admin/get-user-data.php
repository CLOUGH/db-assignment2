<script type="text/javascript">
$("#user-table tbody tr").hover( 
	//mouse in
	function(e){
		$(e.currentTarget).addClass("positive");
	}, 
	//mouse out
	function(e){
		$(e.currentTarget).removeClass("positive");
	});
$("#user-table tbody tr").click(function(e){
	var row= $(e.currentTarget).find('td.user-id');
	var userID = row[0].innerHTML;
	$.getJSON("http://<?php echo SERVER;?>/db-assignment2/source/site/admin/user-data-json.php",{user_id: userID})
	.done(function(jsonObject) {
		console.log(jsonObject);

		//Update the user details area from the info retrieved

		//Update the user friend  table
		var user_friends = jsonObject['user_friends'];
		var table_rows = $("<tbody>");
		if(user_friends.length ==0 )
		{
			var table_row = $("<tr>");
			table_row.append( $("<td>").text("The user doesn not have any friends"));
			table_rows.append(table_row);
		}
		else{
			
			for(var i =0; i<user_friends.length;i++)
			{
				var table_row = $("<tr>");
				table_row.append( $("<td>").text(user_friends[i].friend));
				table_row.append( $("<td>").text(user_friends[i].fname+" "+user_friends[i].lname));
				table_row.append( $("<td>").text(user_friends[i].email));
				table_rows.append(table_row);
			}
		}		
		$('table.friend-table tbody').replaceWith(table_rows);
		

		//Update the user post table
		var user_posts = jsonObject['user_posts'];
		table_rows = $("<tbody>");
		if(user_posts.length ==0 )
		{
			var table_row = $("<tr>");
			table_row.append( $("<td>").text("The does not have any posts"));
			table_rows.append(table_row);
		}
		else{
			
			for(var i =0; i<user_posts.length;i++)
			{
				var table_row = $("<tr>");
				table_row.append( $("<td>").text(user_posts[i].post_id));
				table_row.append( $("<td>").text(user_posts[i].post_type));
				table_row.append( $("<td>").text(user_posts[i].date_created));
				table_row.append( $("<td>").text(user_posts[i].text_body));
				table_rows.append(table_row);
			}
		}		
		$('table.post-table tbody').replaceWith(table_rows);
		
		//Update the comment table
		var user_comments = jsonObject['user_comments']
		table_rows = $("<tbody>");
		if(user_comments.length ==0 )
		{
			var table_row = $("<tr>");
			table_row.append( $("<td>").text("The does not have any posts"));
			table_rows.append(table_row);
		}
		else{
			
			for(var i =0; i<user_posts.length;i++)
			{
				var table_row = $("<tr>");
				table_row.append( $("<td>").text(user_comments[i].comment_id));
				table_row.append( $("<td>").text(user_comments[i].post_id));
				table_row.append( $("<td>").text(user_comments[i].content));
				table_row.append( $("<td>").text(user_comments[i].date_commented));
				table_rows.append(table_row);
			}
		}	
		$('table.comment-table tbody').replaceWith(table_rows);

 	})
 	.fail(function( jqxhr, textStatus, error ) {
	    var err = textStatus + ", " + error;
	    console.log( "Request Failed: " + err );
	});
});
 
</script>