<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chatter Box Home</title>
    <link href='https://fonts.googleapis.com/css?family=Share+Tech|Orbitron:500' rel='stylesheet' type='text/css'>  
	<link rel="stylesheet" type="text/css" href="style1.css">
    <script>
    function show_func(){
    var element = document.getElementById("msg-box");
    element.scrollTop = element.scrollHeight;
    }
    </script>
</head>
<body onload="show_func()">
    <header>
        <h1>Chatter Box</h1>
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?> 
        <div id="logged-in">    
            <p>Online<span><br><?php echo $_SESSION['username'] ?></p></span>
            <p><a href="index.php?logout='1'" style="color: red;">logout</a></p>
            <br>
        </div>
    <?php endif ?>  
    </header>

    <div class="container">
        <div class="content" method="POST" action="send.php">
            <!-- notification message -->
            <?php         
            if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
                </h3>
            </div>
            <?php endif ?>

            <?php
            include "server.php";
            $query = "SELECT * FROM users";
            $run = $db->query($query);
            $i=0;
            ?>
            <div class="users">
                <p>Contacts</p>                
                
                <?php while($row = $run->fetch_array()):
                    if($i == 0){
                        $i < 5;
                        $first = $row; 
                        $image = $row['image']; ?>
                <div id="usersList">
                    <p>
                    <?php echo $row['username']; ?>
                    </p>
                </div>            
            <?php
            }                   
            endwhile;
            ?>
            </div>
        </div>
        
        <!-- ------------------- -->
        <div id="msg-box">
            <?php
            include "server.php";
            $query = "SELECT * FROM posts";
            $run = $db->query($query);
            $i=0;

            date_default_timezone_set('America/Vancouver'); 
            $time = date('g:i A', $phptime);

            while($row = $run->fetch_array()):
                if($i==0){
                $i=5;
                $first=$row;
            ?>

            <div id="triangle1" class="triangle1"></div>
            <div id="message1" class="message1">
                <span style="color:black;float:right;">
                <?php echo $row['msg']; ?></span> <br/>
                <div>
                    <span style="color:black;float:left;
                    font-size:10px;clear:both;">
                    <?php echo $row['username']; ?>,
                    <?php echo $time; ?>
                    </span>
                </div>
            </div>
            <br/><br/>
                <?php
            }
            else
            {
            if($row['username']!=$first['username'])
            {
            ?>
            <div id="triangle" class="triangle"></div>
            <div id="message" class="message">
                <span style="color:black;float:left;">
                <?php echo $row['msg']; ?>
                </span> <br/>
                <div>
                    <span style="color:black;float:right;
                            font-size:10px;clear:both;">
                    <?php echo $row['username']; ?>,
                            <?php echo $time; ?>
                    </span>
                </div>
            </div>
            <br/><br/>
            <?php
            }
            else
            {
            ?>
            <div id="triangle1" class="triangle1"></div>
            <div id="message1" class="message1">
                <span style="color:black;float:right;">
                <?php echo $row['msg']; ?>
                </span> <br/>
                <div>
                    <span style="color:black;float:left;
                            font-size:10px;clear:both;">
                    <?php echo $row['username']; ?>,
                        <?php echo $time; ?>
                    </span>
                </div>
            </div>
            <br/><br/>
            <?php
            }
            }
            endwhile;
            ?>
        </div>  <!-- End msg-box -->
        <form class="form" method="POST" action="send.php">
            <div class="input-group">
                <input type="text" name="msg" placeholder="Type your message..." autocomplete="off">
            <br>
            <button type="submit" value="send" class="button pulseBox">Send</button>
            &nbsp;
            </div> 
        </form>
    </div>
    <script>
        var objDiv = document.getElementById("msg-box");
        objDiv.scrollTop = objDiv.scrollHeight;
    </script>
</body>
</html>