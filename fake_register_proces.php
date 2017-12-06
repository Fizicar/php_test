<?php
    require 'includes/connection.php';
    
    
    
    $errors = array(); //To store errors
    $form_data = array(); //Pass back the data to `form.php`



    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];

            if ($pwd1 === $pwd2){
        
                $getinfo = "SELECT * FROM `admin` WHERE username = '$uname'";
                $res = mysqli_query($conn, $getinfo);
                $row = mysqli_fetch_assoc($res);
        
                if (mysqli_num_rows($res)>0){
                    $form_data['success'] = true;
                    $form_data['posted'] = 'That Username is taken';
                    $form_data['confirm'] = 2;
                } else{
                    
                    $pwd1 = PASSWORD_HASH($pwd1, PASSWORD_DEFAULT);
        
                    $sql = "INSERT INTO `admin` (ime_prezime, username, sifra) VALUES ('$fname','$uname','$pwd1')";
        
                    if(!mysqli_query($conn, $sql)){
                        $form_data['success'] = true;
                        $form_data['posted'] = 'There was a problem';
                        $form_data['confirm'] = 2;
                        echo json_encode($form_data);
                    }else{
                        $form_data['success'] = true;
                        $form_data['posted'] = 'Data Was Posted Successfully';
                        $form_data['confirm'] = 1;
                    }
                }
                echo json_encode($form_data);
            }else{
                $form_data['success'] = true;
                $form_data['posted'] = 'Your passwords did not match';
                $form_data['confirm'] = 2;
                echo json_encode($form_data);
            }
            
            ?>