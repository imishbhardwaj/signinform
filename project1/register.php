<?php
@include 'config.php';
if(isset($_POST['submit'])){

    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];

    $select="SELECT * FROM user_form WHERE email='$email'&& password='pass'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        $error[]='user already exist!';
    }else{
        if($pass!=$cpass){
            $error[]='password not matched';
        }else{
            $insert="INSERT INTO user_form(name,email,password,user_type)VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn,$insert);
            header('location:login.php');
        }
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
                    <h2>Register</h2>
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
                    <input type="password"  name="cpassword"  class="field" placeholder="Confirm your password" required>
                    <select name="user_type" class="field">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                    <button class="btn" type="submit"  name="submit">Register Now</button>
                    <p>Already have an account? <a href="login.php">Login Now</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>