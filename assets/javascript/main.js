

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //!!!!!!                   Log-OUT               !!!!!!!!!!!!!!!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    $('#logout').click(function(event) { //Trigger on form submit
        
        var postForm = { //Fetch form data
            'logout' 	: "1", //Store name fields value
        };
        //console.log(postForm);
        $.ajax({ //Process the form using $.ajax()
            type 		: 'POST', //Method type
            url 		: 'api.php', //Your form processing file url
            data 		: postForm, //Forms name
            dataType 	: 'json',
            success 	: function(data) {
        
                console.log(data);
                window.location = "http://localhost/php_test/admin.php";
                
            }
        });
        event.preventDefault(); //Prevent the default submit
    });

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //!!!!!!!                   LOGIN                       !!!!!!!!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    $('#login_form').submit(function(event) { //Trigger on form submit
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
                alert("incomplete");
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

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //!!!!!!!                   REGISTER                     !!!!!!!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    $('#register_form').submit(function(event) { //Trigger on form submit
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

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //!!!!!!!                   REGISTER                     !!!!!!!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
