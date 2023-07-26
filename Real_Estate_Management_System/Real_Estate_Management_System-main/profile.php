<?php
include 'config.php';
session_start();
error_reporting(0);
$user_id=$_SESSION['userid'];
if(!isset($_SESSION['userid']))
{
  header('location:login.php');
}
// echo "<script>alert('Profile Updated Successfully!')</script>";
if(isset($_POST['update']))
{
  $up_name=$_POST['upname'];
  $up_PhNo=$_POST['upphno'];
  $u_address=$_POST['uaddress'];
  $u_city=$_POST['ucity'];
  $u_state=$_POST['ustate'];
  $u_country=$_POST['ucountry'];

  if(preg_match("/^[a-zA-Z ]+$/i",$up_name)){
    if(preg_match("/^\d{10}$/",$up_PhNo)){
      $sql="UPDATE `users` SET `name`='$up_name',`phno`='$up_PhNo',`address`='$u_address',city='$u_city',state='$u_state',country='$u_country' WHERE userid='$user_id'";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo "<script>alert('Profile Updated Successfully!!')</script>";
      }
      else{
        echo "<script>alert('Update Failed!!')</script>";
      }
    }
    else
      echo "<script>alert('Mobile Number is not Valid!!')</script>";
  }
  else
    echo "<script>alert('Name can contain only Characters!!')</script>";
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="CSS folder/boot.css">
    <title></title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="secondary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4  fs-4 font-weight-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret mr-2"></i>REAl<span style="color: white;">K</span></div>
            <div class="list-group list-group-flush my-3">
                <a href="home.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i
                        class="fas fa-home mr-2"></i>Home</a>
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i
                        class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                <a href="addprop.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i
                        class="fas fa-plus mr-2"></i>Add Property</a>
                <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold active"><i
                        class="fas fa-user mr-2"></i>Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i
                        class="fas fa-power-off mr-2"></i>Logout</a>
            </div>
        </div>
        <!-- sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <h2 class="m-0">Profile</h2>
            </div>            
        </nav>
        <div class="container-fluid bg-transparent rounded py-3 px-4">
            <?php
              $sql = "select * from users where userid='$user_id'";
              $result=mysqli_query($conn,$sql) or die('Query Failed!');
              if(mysqli_num_rows($result)>0)
              {
                  $fetch=mysqli_fetch_assoc($result);
              }
            ?>        
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputAddress">Name</label>
                        <input type="text" class="form-control" name="upname" value="<?php echo $fetch['name'];?>" required>
                      </div>
                      <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputPassword4">Mobile No</label>
                        <input type="text" class="form-control" name="upphno"  value="<?php echo $fetch['phno'];?>" required>
                      </div>
                </div>
                
              <div class="form-row">
                <div class="form-group col-md-3 font-weight-bold">
                  <label for="inputEmail4">UserID</label>
                  <input class="form-control" type="text" value="<?php echo $fetch['userid'];?>" readonly>
                </div>
                <div class="form-group col-md-5 font-weight-bold">
                  <label for="inputPassword4">Email</label>
                  <input class="form-control" type="text" value="<?php echo $fetch['email'];?>" readonly>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8 font-weight-bold">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" value="<?php echo $fetch['address'];?>" name="uaddress" required>
                  </div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-3 font-weight-bold">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" name="ucity" value="<?php echo $fetch['city'];?>" required>
                </div>
                <div class="form-group col-md-2 font-weight-bold">
                  <label for="inputState">State</label>
                  <input type="text" class="form-control" name="ustate" value="<?php echo $fetch['state'];?>" required>
                </div>
                <div class="form-group col-md-3 font-weight-bold">
                  <label for="inputZip">Country</label>
                  <input type="text" class="form-control" name="ucountry" value="<?php echo $fetch['country'];?>" required>
                </div>
              </div>
              <button type="submit" class="btn btn-secondary bg-dark" name="update">Update</button>
            </form>
    
          </div>





    </div>
<!-- /#page-content-wrapper -->
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>