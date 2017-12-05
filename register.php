<?php
require 'includes/connection.php';

if (isset($_POST['fname']) and isset($_POST['uname']) and isset($_POST['pwd1']) and isset($_POST['pwd2'])
and !empty($_POST['fname']) and !empty($_POST['uname']) and !empty($_POST['pwd1']) and !empty($_POST['pwd2']))
{
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];

    if ($pwd1 === $pwd2){

        $getinfo = "SELECT * FROM `admin` WHERE username = '$uname'";
        $res = mysqli_query($conn, $getinfo);
        $row = mysqli_fetch_assoc($res);

        if (mysqli_num_rows($res)>0){
            echo "that username is taken";
        } else{
            
            $pwd1 = PASSWORD_HASH($pwd1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `admin` (ime_prezime, username, sifra) VALUES ('$fname','$uname','$pwd1')";

            if(!mysqli_query($conn, $sql)){
                echo "There was a problem";  
            }else{
                header("Location: login.php");
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
    <input type="text" name="fname" placeholder="Ime i Prezime"><br>
    <input type="text" name="uname" placeholder="User Name"><br>
    <input type="password" name="pwd1" placeholder="Password"><br>
    <input type="password" name="pwd2" placeholder="Re-Enter Password"><br><br><br>
    <input type="submit" value="Register">
    </form>
</body>
</html>