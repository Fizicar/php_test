<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple Ajax Form</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<<<<<<< HEAD

		<script src="https://use.fontawesome.com/ffb6023ab4.js"></script>
		<link href="assets/css/styles.css" media="all" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<script>
			$(document).ready(function() {
		    	$('form').submit(function(event) { //Trigger on form submit
		    		$('#name + .throw_error').empty(); //Clear the messages first
		    		$('#success').empty();
		    
		    		var postForm = { //Fetch form data
		    			'login_uname' 	: $('input[name=login_uname]').val(), //Store name fields value
                        'login_pwd' 	: $('input[name=login_pwd]').val() //Store name fields value
		    		};
		    
		    		$.ajax({ //Process the form using $.ajax()
		    			type 		: 'POST', //Method type
		    			url 		: 'api.php', //Your form processing file url
		    			data 		: postForm, //Forms name
		    			dataType 	: 'json',
		    			success 	: function(data) {
		    				
		    			if (!data.success) { //If fails
		    				if (data.errors.name) { //Returned if any error from process.php
		    					$('.throw_error').fadeIn(1000).html(data.errors); //Throw relevant error
		   					}
		   				} else {
		    					if(data.confirm == 1){
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
	</head>
	<body>
<!--
		<form method="post" name="postForm">
=======
	</head>
	<body>
		<form method="post" name="postForm" id="login_form">
>>>>>>> cfcbf672a1d4b2ce7a237735faefb981fcfd92ec
			<ul>
				<li>
					<label for="uname">Name</label>
					<input type="text" name="login_uname" id="login_uname" />
                    <input type="password" name="login_pwd" id="login_pwd" />
					<span class="throw_error"></span>
				</li>
			</ul>
			<input type="submit" value="Send" />
		</form>
		<div id="success"></div>
<<<<<<< HEAD
-->
		<form class="formlogin text-center" method="post" name="postForm">
			<div class="row">
				<div class="col-2 offset-5">
					<h1>Login</h1>
					<br>
					<div class="input-group margin-bottom-sm">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<input class="form-control" type="text" placeholder="username" name="login_uname" id="login_uname">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
						<input class="form-control" type="password" placeholder="password" name="login_pwd" id="login_pwd">
					</div>
					<br>
					<span class="throw_error"></span>
					<button class="btn btn-md btn-round text-center" id="button4" type="submit"><div class="pull-left">login in</div>
						<i class="fa fa-sign-in pull-right"></i>
					</button>	
					<br><br>
					<p>Forgot your password?</p>
				</div>
			</div>
		</form>
		<div id="success"></div>
=======

		
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="assets/javascript/main.js"></script>
>>>>>>> cfcbf672a1d4b2ce7a237735faefb981fcfd92ec
	</body>
</html>