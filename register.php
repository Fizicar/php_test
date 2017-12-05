<?php
require 'includes/connection.php';

if (isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['uname']) and isset($_POST['pwd1']) and isset($_POST['pwd2']) and isset($_POST['email'])
and !empty($_POST['fname']) and !empty($_POST['lname']) and !empty($_POST['uname']) and !empty($_POST['pwd1']) and !empty($_POST['pwd2']) and !empty($_POST['email']))
{
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if ($pwd1 === $pwd2){

        $getinfo = "SELECT * FROM users WHERE uname = '$uname'";
        $res = mysqli_query($conn, $getinfo);
        $row = mysqli_fetch_assoc($res);

        if (mysqli_num_rows($res)>0){
            echo "that username is taken";
        } else{
            
            $pwd1 = PASSWORD_HASH($pwd1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (fname, lname, uname, pwd, email ) VALUES ('$fname','$lname','$uname','$pwd1','$email')";

            if(!mysqli_query($conn, $sql)){
                echo "There was a problem";  
            }else{
                header("Location: index.php");
            }
        }

    }else{
        echo "yout pasworts did not match";
    }
} 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<h3>Register</h3><br> 
    <form action="register.php" method="POST"><br>
    <input type="text" name="fname" placeholder="First Name"><br>
    <input type="text" name="lname" placeholder="Last Name"><br>
    <input type="text" name="uname" placeholder="User Name"><br>
    <input type="password" name="pwd1" placeholder="Password"><br>
    <input type="password" name="pwd2" placeholder="Re-Enter Password"><br>
    <input type="email" name="email" placeholder="E-Mail"><br><br>
    <input type="submit">
    </form>
</body>
</html>