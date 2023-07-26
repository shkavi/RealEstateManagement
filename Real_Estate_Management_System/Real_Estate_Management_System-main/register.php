<?php

include 'config.php';
error_reporting(0);
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $userid=$_POST['userid'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if(preg_match("/^[a-zA-Z ]+$/i",$name)){
        if($password==$cpassword){
            $sql = "select * from users where userid='$userid' OR email='$email'";
            $result=mysqli_query($conn,$sql);
            if(!$result->num_rows>0){
                $sql="Insert into users(name,userid,email,password) values ('$name','$userid','$email','$password')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script>alert('User Registered Successfully!')</script>";
                    $name='';
                    $userid = '';
                    $email = '';
                    $password = '';
                    $cpassword='';
                }
                else
                    echo "<script>alert('Something Went Wrong!!')</script>";
            }
            else
            echo "<script>alert('UserId or Email already Exist!!')</script>";
        }
        else
        echo "<script>alert('Passwords not Matched!!')</script>";
    }
    else
    echo "<script>alert('Name can contain only Characters!!')</script>";
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS folder/style.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size:2rem; font-weight: 800;">SignUp</p>
            <div class="input-group">
                <input type="text" placeholder="Name" name="name" value="<?php echo $name;?>">
            </div>
            <div class="input-group">
                <input type="text" placeholder="UserId" name="userid" value="<?php echo $userid;?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $password;?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $cpassword;?>" required>
            </div>
               <button name="register" class="btn">Register</button>
            <p class="login-register-text">Already have an Account? <a href="login.php">Login Here</a>.</p>
        </form>
    </div>
</body>
</html>