<?php 
session_start();
include('server.php');

$msg = $_POST['msg'];
$username = $_SESSION['username'];
date_default_timezone_set('America/Vancouver'); 
$time = date('Y-m-d H:i:s', $phptime);

// database insert SQL code
$sql = "INSERT INTO posts (username, msg, time) 
        VALUES ('$username', '$msg', '$time')";

// insert in database 
mysqli_query($db, $sql);

header('location: index.php');
?>