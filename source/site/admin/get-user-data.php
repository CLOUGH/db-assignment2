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


		var user_posts = jsonObject['user_posts'];
		var table_rows = $("<tbody>");
		if(user_posts.length ==0 )
		{
			var table_row = $("<tr>");
			table_row.append( $("<td>").text("The does not have any posts"));
			table_rows.append(table_row);
		}
		else{
			//Update the user details area from the info retrieved
			for(var i =0; i<user_posts.length;i++)
			{
				var table_row = $("<tr>");
				table_row.append( $("<td>").text(user_posts[i].post_id));
				table_row.append( $("<td>").text(user_posts[i].text_body));
				table_rows.append(table_row);
			}
		}		
		$('table.post-table tbody').replaceWith(table_rows);
		

 	})
 	.fail(function( jqxhr, textStatus, error ) {
	    var err = textStatus + ", " + error;
	    console.log( "Request Failed: " + err );
	});
});
 
</script>