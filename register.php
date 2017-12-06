<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple Ajax Form</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script>
			$(document).ready(function() {
		    	$('form').submit(function(event) { //Trigger on form submit
		    		$('#name + .throw_error').empty(); //Clear the messages first
		    		$('#success').empty();
		    
		    		var postForm = { //Fetch form data
		    			'register_uname' 	: $('input[name=register_uname]').val(), //Store name fields value
                        'register_pwd1' 	: $('input[name=register_pwd1]').val(),
                        'register_pwd2' : $('input[name=register_pwd2]').val(),
                        'register_fname' : $('input[name=register_fname]').val()
		    		};
		    		$.ajax({ //Process the form using $.ajax()
		    			type 		: 'POST', //Method type
		    			url 		: 'api.php', //Your form processing file url
		    			data 		: postForm, //Forms name
		    			dataType 	: 'json',
		    			success 	: function(data) {
							if (!data.success) { //If fails
								console.log("there was an error")
							}
							else{
								if(data.confirm == 1){
								window.location = "http://localhost/php_test/admin.php";}
								else if(data.confirm == 2){$('.throw_error').fadeIn(1000).html(data.posted);}
								else if(data.confirm == 3){$('.throw_error').fadeIn(1000).html(data.posted);}
								else {$('.throw_error').fadeIn(1000).html(data.posted);}
								
							}
		    			}
		    		})
					
					;
		    	    event.preventDefault(); //Prevent the default submit
		    	});
		    });
		</script>
	</head>
	<body>
    <h3>Register</h3><br> 
	<form method="post" name="postForm">
        <input type="text" name="register_fname" placeholder="Ime i Prezime"><br>
        <input type="text" name="register_uname" placeholder="User Name"><br>
        <input type="password" name="register_pwd1" placeholder="Password"><br>
        <input type="password" name="register_pwd2" placeholder="Re-Enter Password"><br><br><br>
        <input type="submit" value="Register">
        </form>
		<div class="throw_error">
		
		
		</div>
    </body>
</html>