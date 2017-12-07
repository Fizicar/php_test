<?php
require ("includes/functions.php");
session_start();

require 'includes/connection.php';

if (!isset($_SESSION['id'])){
    include ("login.php");
}else{
    include ("admin_html.php");
}
?>




