<?php

    session_start();
    require 'includes/connection.php';
    
    
    
    $errors = array(); //To store errors
    $form_data = array(); //Pass back the data to `form.php`



    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $getinfo = "SELECT* FROM `admin` WHERE username = '$uname' LIMIT 1";
    $res = mysqli_query($conn, $getinfo);
    $row = mysqli_fetch_assoc($res);

    if (mysqli_num_rows($res)>0){
        
                $dbpassword = $row['sifra'];
                $pwd = PASSWORD_VERIFY($pwd, $dbpassword);
                if ($uname == $row['username'] and $pwd == $dbpassword){
                    $id = $row['id'];
                    $_SESSION['id'] = $id;
                    $form_data['success'] = true;
                    $form_data['posted'] = 'Data Was Posted Successfully';
                    $form_data['confirm'] = 1;
                }else {
                    $form_data['success'] = true;
                    $form_data['errors']  = 'Your input was incorect';
                    $form_data['confirm'] = 2;
                };
        
            }else{
                $form_data['success'] = true;
                $form_data['errors']  = 'Sorry we could not find yout username';
                $form_data['confirm'] = 3;
            }


    //Return the data back to form.php
    echo json_encode($form_data); ?>