<?php 
include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href='https://fonts.googleapis.com/css?family=Share+Tech|Orbitron:500' rel='stylesheet' type='text/css'>  
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Chatter box</h1>
        </header>
        
        <form id="login" method="post" action="login.php">
            <h2>Login</h2>
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" >
            </div>
            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password">
            </div>

            <div class="input-group">
                <button type="submit" class="button pulseBox" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
        <footer>
        <p> Created by: Tyler Nelson
            <br>
            &copy;Copyright 2021. All Rights Reserved.
        </p>
        </footer>
    </div>
</body>
</html>