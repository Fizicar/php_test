<?php
require 'includes/connection.php';
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!! LOGIN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(isset($_POST['login_uname']) and isset($_POST['login_pwd'])){
    session_start();
    
    $errors = array(); //To store errors
    $form_data = array(); //Pass back the data to `form.php`



    $uname = $_POST['login_uname'];
    $pwd = $_POST['login_pwd'];

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
    echo json_encode($form_data);} 
    
    
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!REGISTER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  
if(isset($_POST['register_fname']) and isset($_POST['register_uname']) and isset($_POST['register_pwd1']) and isset($_POST['register_pwd2']) and !empty($_POST['register_fname']) and !empty($_POST['register_uname']) and !empty($_POST['register_pwd1']) and !empty($_POST['register_pwd2'])){        
    
    $errors = array(); //To store errors
    $form_data = array(); //Pass back the data to `form.php`



    $fname = mysqli_real_escape_string($conn, $_POST['register_fname']);
    $uname = mysqli_real_escape_string($conn, $_POST['register_uname']);
    $pwd1 = $_POST['register_pwd1'];
    $pwd2 = $_POST['register_pwd2'];

            if ($pwd1 === $pwd2){
        
                $getinfo = "SELECT * FROM `admin` WHERE username = '$uname'";
                $res = mysqli_query($conn, $getinfo);
                $row = mysqli_fetch_assoc($res);
        
                if (mysqli_num_rows($res)>0){
                    $form_data['success'] = true;
                    $form_data['posted'] = 'That Username is taken';
                    $form_data['confirm'] = 3;
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
                $form_data['confirm'] = 4;
                echo json_encode($form_data);
            }
        }
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!Log-OUT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(isset($_POST['logout'])){
    $errors = array(); //To store errors
    $form_data = array(); //Pass back the data to `form.php`

    session_start();
    session_destroy();
    $form_data['confirm'] = 1;
    echo json_encode($form_data);
}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!Admin izgled bez uploade!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(isset($_POST['naslov']) and isset($_POST['podnaslov']) and isset($_POST['section_id']) and isset($_POST['slika_1']) and isset($_POST['slika_2']) and isset($_POST['slika_3']) and isset($_POST['text_1']) and isset($_POST['text_2']) and isset($_POST['text_3']) and isset($_POST['text_4']) and isset($_POST['text_5'])){
    $id = $_POST['section_id'];
    $naslov = $_POST['naslov'];
    $p_naslov = $_POST['p_naslov'];
    $slika_1 = $_POST['slika_1'];
    $slika_2 = $_POST['slika_2'];
    $slika_3 = $_POST['slika_3'];
    $text_1 = $_POST['text_1'];
    $text_2 = $_POST['text_2'];
    $text_3 = $_POST['text_3'];
    $text_4 = $_POST['text_4'];
    $text_5 = $_POST['text_5'];
    

    
}
    ?>