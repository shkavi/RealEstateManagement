<?php

include 'config.php';
session_start();
error_reporting(0);

// if (isset($_SESSION['userid'])) {
//     header("Location: welcome.php");
// }

if(isset($_POST['submit'])){
    $userid=$_POST['userid'];
    $password=$_POST['password'];

    $sql="select * from users where userid='$userid' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$row['userid'];
        header("Location: home.php");
    }else{
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS folder/style.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size:2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="UserID" name="userid" value="<?php echo $userid; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
                <button name='submit' class="btn">Login</button>
            <p class="login-register-text">Don't have an Account? <a href="register.php">Register Here</a>.</p>
        </form>
    </div>
</body>
</html>