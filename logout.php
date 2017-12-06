<?php
//session_start();
//session_destroy();
//header("Location: index.php");
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple Ajax Form</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script>
			$(document).ready(function() {
		    	$('#logout').click(function(event) { //Trigger on form submit		    
		    		var postForm = { //Fetch form data
		    			'logout' 	: 1, //Store name fields value
		    		};
                    console.log(postForm);
		    		$.ajax({ //Process the form using $.ajax()
		    			type 		: 'POST', //Method type
		    			url 		: 'api.php', //Your form processing file url
		    			data 		: postForm, //Forms name
		    			dataType 	: 'json',
		    			success 	: function(data) {

								if(data.confirm == 1){
								window.location = "http://localhost/php_test/admin.php";}

								
		    			};
		    		})
		    	    event.preventDefault(); //Prevent the default submit
		    	});
		    });
		</script>
	</head>
	<body>
		<form method="post" name="postForm">
			<button id="logout" type="submit" method="post" value="1" name="logut">Logout</button>
		</form>
        
		<div id="success"></div>
	</body>
</html>