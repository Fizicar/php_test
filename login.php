<?php
session_start();
require 'includes/connection.php';

if(!isset($_SESSION['id'])){
    header("Lokacion: index.php");
    exit(); 
}
$id = $_SESSION['id'];
$getinfo = "SELECT admin FROM users WHERE id = '$id'";
$res = mysqli_query($conn, $getinfo);
$row = mysqli_fetch_assoc($res);

$admin = $row["admin"];
if ($admin != 1){
    header("Lokacion: admin.php");
    exit();
}
$sql = "SELECT*FROM users";
$res2 = mysqli_query($conn, $sql);
while ($row2 = mysqli_fetch_assoc($res2)){

    echo $row2['fname']. " " .$row2['lname']. " ID number: " .$row2['id']. "<br>";
}

if(isset($_POST['id'])and isset($_POST['admin'])and !empty($_POST['id'])and !empty($_POST['admin'])){


    $uid = $_POST['id'];
    $admin = $_POST['admin'];

    $update = "UPDATE users SET  admin = '$admin' WHERE id = '$uid'";
    mysqli_query($conn, $update);




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Area</title>
</head>
<body>
<h1>Admin Area</h1>
<hr><br>
<form action="admin.php" method="POST">
<input type="number" name="id" placeholder="ID"style="width:400px;height:50px;"><br><br>
<input type="number" name="admin" placeholder="Admin" min="0" max="1" style="width:400px;height:50px;"><br><br>
<input type="submit" value="Update"><br>
<hr><br>
<a href="logout.php">Logout</a>

</form>
    
</body>
</html>