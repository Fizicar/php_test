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
                        'pwd' 	: $('input[name=pwd]').val() //Store name fields value
		    		};
		    
		    		$.ajax({ //Process the form using $.ajax()
		    			type 		: 'POST', //Method type
		    			url 		: 'fake_proces.php', //Your form processing file url
		    			data 		: postForm, //Forms name
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
                                    $('.throw_error').fadeIn(1000).html("We could not find yout username");
                                }
		    				}
		    			}
		    		});
		    	    event.preventDefault(); //Prevent the default submit
		    	});
		    });
		</script>
		<style>
			ul {
				font-family: Arial;
				list-style-type: none;
			}

			#success {
				display: none;
				font-family: Arial;
				color: green;
				margin-left: 85px;
				font-size: 14px;
			}

			input[type=text] {
				padding: 5px;
				box-shadow: inset 0 0 5px #eee;
				border: 1px solid #eee;
			}

			input[type=submit] {
				padding: 3px 8px;
				background: #eee;
				margin-left: 85px;
				cursor: pointer;
				border: 1px solid #aaa;
				font-size: 12px;
			}

			.throw_error {
				color:tomato;
				font-size: 12px;
				display: none;
			}

			label {
				font-size: 13px;
			}
		</style>
	</head>
	<body>
		<form method="post" name="postForm">
			<ul>
				<li>
					<label for="uname">Name</label>
					<input type="text" name="uname" id="uname" />
                    <input type="password" name="pwd" id="pwd" />
					<span class="throw_error"></span>
				</li>
			</ul>
			<input type="submit" value="Send" />
		</form>
		<div id="success"></div>
	</body>
</html>