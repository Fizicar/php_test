<?php

session_start();
require 'includes/connection.php';

if(isset($_POST['uname']) and isset($_POST['pwd']) and !empty($_POST['uname']) and !empty($_POST['pwd'])){
    
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
            header("Location: admin.php");
            exit();
        }else {
            echo " The information providet are invalid";
        };

    }else{
        echo "We could not find that user, we are very sorry";
    }



};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h3>Login</h3>
    <form action="login.php" method="POST">
    <input type="text" name="uname" placeholder="User Name"><br>
    <input type="password" name="pwd" placeholder="Password"><br><br>
    
    <input type="submit"><br><br>
    <a href="register.php">Register</a><br><br>
    
    
    
    </form>
</body>
</html>