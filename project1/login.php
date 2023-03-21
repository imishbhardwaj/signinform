<?php
@include 'config.php';
session_start();

if(isset($_POST['submit'])){

    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];

    $select="SELECT * FROM user_form WHERE email='$email'&& password='$pass' ";
     $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){

        $row=mysqli_fetch_array($result);
        if($row['user_type']=='admin'){
         $_SESSION['admin_name']=$row['name'];
         header('location:admin_page.php');
        }elseif($row['user_type']=='user'){
            $_SESSION['user_name']=$row['name'];
            header('location:user_page.php');
        }
    }else{
        $error[]='incorrect email or password!';
    }

};  

?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    
</head>
<body>
    <form method="POST" action="">
        <div class="container1">
            <div class="contact-box">
                <div class="left"></div>
                <div class="right">
                    <h2>Login</h2>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="text" name="name"  class="field" placeholder="Your Name" required>
                    <input type="email" name="email"    class="field" placeholder="Your Email" required>
                    <input type="password"  name="password"  class="field" placeholder="Your password" required>
                    <button class="btn" type="submit"  name="submit">Login Now</button>
                    <p>Don't have an account? <a href="register.php">Register Now</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>