<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class=section_form id="section_1"><br>
    <input type="text" name="slika_1" placeholder="Slika 1" value="http://via.placeholder.com/350x150"><br>
    <input type="text" name="slika_2" placeholder="Slika 2"><br>
    <input type="text" name="slika_3" placeholder="Slika 3"><br>
    <input type="text" name="naslov" placeholder="Naslov"><br>
    <input type="text" name="podnaslov" placeholder="Pod Naslov"><br>
    <input type="text" name="text_1" placeholder="text_1"><br>
    <input type="text" name="text_2" placeholder="text_2"><br>
    <input type="text" name="text_3" placeholder="text_3"><br>
    <input type="text" name="text_4" placeholder="text_4"><br>
    <input type="text" name="text_5" placeholder="text_5"><br>

    <br><br><br>
    <input type="submit" value="Register">
    </form> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="assets/javascript/main.js"></script>

    <script>
    $( document ).ready(function() {
    
        $('.section_form').submit(function(event) { //Trigger on form submit
        var id = $(this).attr("id");
        console.log(id);
        var postForm = { //Fetch form data
            'slika_1' 	: $('input[name=slika_1]').val(), //Store name fields value
            'slika_2' 	: $('input[name=slika_2]').val(),
            'slika_3' : $('input[name=slika_3]').val(),
            'naslov' : $('input[name=naslov]').val(),
            'podnaslov' : $('input[name=podnaslov]').val(), //Store name fields value
            'text_1' 	: $('input[name=text_1]').val(),
            'text_2' : $('input[name=text_2]').val(),
            'text_3' : $('input[name=text_3]').val(),
            'text_4' 	: $('input[name=text_4]').val(), //Store name fields value
            'text_5' 	: $('input[name=text_5]').val(),
            'section_id' : id,
        };
        console.log(postForm);
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
</body>
</html>