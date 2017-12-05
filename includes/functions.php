<?php
function logout(){
    if(isset($_GET["logout"])){
session_start();
session_destroy();
header("Location: index.php");}
}
?>