<?php
session_start();

require 'includes/connection.php';

if (!isset($_SESSION['id'])){
    header("Location: index.php");
    exit();
}


$id = $_SESSION['id'];
$getinfo = "SELECT * FROM `admin` WHERE id = '$id'";
$res = mysqli_query($conn, $getinfo);
$row = mysqli_fetch_assoc($res);
mysqli_query($conn, "UPDATE `admin` SET `zadnji_login`= NOW() WHERE 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<form action="logout.php" method="POST">
    <input type="submit" value="Logout"><br><br>
    </form>
    <h1>Dashboard <h3><?php echo "Welcome back, ". $row['ime_prezime']?></h3></h1><hr>
    <a href="logout.php">Logout</a>
</body>
</html>