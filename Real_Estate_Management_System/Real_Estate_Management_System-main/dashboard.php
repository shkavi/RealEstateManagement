<?php
include 'config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
  header('location:login.php');
}
$sqlp = "select * from property inner join owns where (property.propid=owns.propid) and owns.userid='$user_id'";
$result = mysqli_query($conn, $sqlp);
if (!$result) {
  echo "<script>alert('Something went Wrong!')</script>";
}
$sqlv="select * from ((viewed inner join users on viewed.userid=users.userid) inner join owns on viewed.propid=owns.propid) where owns.userid='$user_id'";
$resultv = mysqli_query($conn, $sqlv);
if (!$result) {
  echo "<script>alert('Something went Wrong!')</script>";
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  $sql = "DELETE FROM `property` WHERE propid='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $sqli = "select * from propimages where propid='$id'";
    $resulti = mysqli_query($conn, $sqli);
    while ($row = mysqli_fetch_assoc($resulti)) {
      $photo = $row['images'];
      unlink("/Users/kisho/Downloads/DBMS project/images/".$photo);
    }
    echo "<script>alert('Property $id Deleted Successfully!')</script>";
    //header("location: dashboard.php");
  }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="CSS folder/boot.css">
  <title>Dashboard</title>
  <!-- <style>
      table-sm.table.table-bordered{
        border: 1px solid black;
        }
        table-sm.table.table-bordered > thead > tr > th{
          border: 1px solid black;
        }
    </style> -->
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="secondary-bg" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 fs-4 font-weight-bold text-uppercase border-bottom"><i class="fas fa-user-secret mr-2"></i>REAl<span style="color: white;">K</span></div>
      <div class="list-group list-group-flush my-3">
        <a href="home.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-home mr-2"></i>Home</a>
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold active"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="addprop.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-plus mr-2"></i>Add Property</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-user mr-2"></i>Profile</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-power-off mr-2"></i>Logout</a>
      </div>
    </div>
    <!-- sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <h2 class="m-0">Dashboard</h2>
        </div>
      </nav>

      <div class="px-4">
        <h5>Your Properties</h5>
      </div>
      <div class="table-responsive py-2 px-4">
        <!-- <table class="table table-bordered table-striped table-hover table-sm" > -->
        <table class="table-sm table table-bordered table-striped table-hover">
          <tbody class="table-dark ">
            <tr class="table-dark text-dark">
              <th class="">Property No.</th>
              <th class="">Address</th>
              <th class="">Price</th>
              <th class="">Delivery Type</th>
              <th class="">Action</th>
            </tr>
            <?php
            // $property_result = mysqli_fetch_assoc($result);
            while ($property_result = mysqli_fetch_assoc($result)) {
              echo "
              <tr class='table-dark text-dark'>
              <td>$property_result[propid]</td>
              <td>$property_result[paddress],$property_result[pcity],$property_result[pstate],$property_result[pcountry]</td>
              <td>$property_result[price]</td>
              <td>$property_result[dtype]</td>
              <td >
              <a class='btn btn-dark' href='/Users/kisho/Downloads/DBMS project/update.php?id=$property_result[propid]'>Update</a>
              <a class='btn btn-secondary bg-dark' href='/Users/kisho/Downloads/DBMS project/dashboard.php?id=$property_result[propid]'>Delete</a>
              </td>
            </tr>
              ";
            } ?>
          </tbody>

        </table>
      </div>


      <div class="px-4">
        <h5>Properties Viewed:</h5>
      </div>
      <div class="table-responsive py-2 px-4">
        <!-- <table class="table table-bordered table-striped table-hover table-sm" > -->
        <table class="table-sm table table-bordered table-striped table-hover">
          <tbody class="table-dark ">
            <tr class="table-dark text-dark">
              <th class="">Name</th>
              <th class="">Mobile No.</th>
              <th class="">Email</th>
              <th class="">Property No.</th>
              <th class="">viewed on</th>
            </tr>
            <?php
            // $property_result = mysqli_fetch_assoc($result);
            while ($viewed_result = mysqli_fetch_assoc($resultv)) {
              echo "
              <tr class='table-dark text-dark'>
              <td>$viewed_result[name]</td>
              <td>$viewed_result[phno]</td>
              <td>$viewed_result[email]</td>
              <td>$viewed_result[propid]</td>
              <td>$viewed_result[date_time]</td>
            </tr>
              ";
            } ?>
          </tbody>

        </table>
      </div>





    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
      el.classList.toggle("toggled");
    };
    // function checkdelete()
    // {
    //   return confirm('Are you sure you want to delete property?');
    // }
  </script>
</body>

</html>