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
		    			'uname' 	: $('input[name=uname]').val(), //Store name fields value
                        'pwd1' 	: $('input[name=pwd1]').val(),
                        'pwd2' : $('input[name=pwd2]').val(),
                        'fname' : $('input[name=fname]').val()
		    		};
					console.log(postForm);
		    
		    		$.ajax({ //Process the form using $.ajax()
		    			type 		: 'POST', //Method type
		    			url 		: 'fake_register_proces.php', //Your form processing file url
		    			data 		: RegisterForm, //Forms name
		    			dataType 	: 'json',
		    			success 	: function(data) {
		    				
		    			if (!data.success) { //If fails
		    				if (data.errors.name) { //Returned if any error from process.php
		    					$('.throw_error').fadeIn(1000).html(data.errors); //Throw relevant error
		   					}
		   				} else {
		    					if(data.confirm == 1){
                                $('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message
                                window.location = "http://localhost/php_test/admin.php";}
                                else{
                                    $('.throw_error').fadeIn(1000).html("Incorect Entry");
                                }
		    				}
		    			}
		    		});
		    	    event.preventDefault(); //Prevent the default submit
		    	});
		    });
		</script>
	</head>
	<body>
    <h3>Register</h3><br> 
        <form name="RegisterForm" method="POST"><br>
        <input type="text" name="fname" placeholder="Ime i Prezime"><br>
        <input type="text" name="uname" placeholder="User Name"><br>
        <input type="password" name="pwd1" placeholder="Password"><br>
        <input type="password" name="pwd2" placeholder="Re-Enter Password"><br><br><br>
        <input type="submit" value="Register">
        </form>
    </body>
</html>