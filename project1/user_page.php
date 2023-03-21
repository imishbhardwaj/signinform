<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}
?>

<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
        <h3>Welcome</h3>
         <h3>This is an User Page</h3>
        <button class="btn"><a href="login.php">Login</a></button>
        <button class="btn"><a href="register.php">Signup</a></button>
        <button class="btn"><a href="logout.php" >Logout</a></button>
        </div>
        </div>
    </body>
</html>