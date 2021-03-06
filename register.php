<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Chatter Box Registration</title>
  <link href='https://fonts.googleapis.com/css?family=Share+Tech|Orbitron:500' rel='stylesheet' type='text/css'>  
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Chatter Box</h1>
    </header>

    <div class="container">
        <form id="register" method="post" action="register.php" enctype="multipart/form-data">
            <h2>Register</h2>

        <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>

            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password_1">
            </div>

            <div class="input-group">
                <label>Confirm password:</label>
                <input type="password" name="password_2">
            </div>

            <div class="input-group">
                <button type="submit" value="Upload Image" class="button pulseBox" name="reg_user">Register</button>
            </div>
            <p>Already a member? <a href="login.php">Sign in</a></p>
        </form>
    </div>
</body>
</html>