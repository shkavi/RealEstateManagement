<?php
include 'config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['userid'];
// $dtype=$_SESSION['dtype'];
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
$sql = "select * from property inner join owns on property.propid=owns.propid where owns.userid <> '$user_id' order by property.price asc";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "<script>alert('Something went Wrong!')</script>";
}
$s_location = '';
if (isset($_POST['search'])) {
    $type = $_POST['type'];
    if ($type == 'All Properties')
        $dtype = '';
    else if ($type == 'Properties for Sale')
        $dtype = 'Sale';
    else
        $dtype = 'Rent';
    $s_location = $_POST['location'];
    $s_ptype=$_POST['sproptype'];
    $sort=$_POST['sort'];

    if($sort == 'Price: High to Low'){
        $sql = "select * from property inner join owns on property.propid=owns.propid where owns.userid <> '$user_id' and (property.propid=owns.propid) and (owns.dtype like '%$dtype%' and (property.paddress like '%$s_location%' or property.pcity like '%$s_location%' or property.pstate like '%$s_location%' or property.pcountry like '%$s_location%' or property.ppin like '%$s_location%') and property.proptype like '%$s_ptype%') order by property.price desc";
    }
    else{
        $sql = "select * from property inner join owns on property.propid=owns.propid where userid <> '$user_id' and (property.propid=owns.propid) and (owns.dtype like '%$dtype%' and (property.paddress like '%$s_location%' or property.pcity like '%$s_location%' or property.pstate like '%$s_location%' or property.pcountry like '%$s_location%' or property.ppin like '%$s_location%') and property.proptype like '%$s_ptype%') order by property.price asc";
    }
    $result = mysqli_query($conn, $sql);
    if (!$result)
        echo "<script>alert('Something went Wrong!')</script>";
}
// if(isset($_POST['dtype'])){
//     $dtype=$_POST['dtype'];
//     $sql = "select * from property inner join owns where property.propid=owns.propid and owns.dtype='$dtype'";
//     $result = mysqli_query($conn, $sql);
//     if (!$result) {
//         echo "<script>alert('Something went Wrong!')</script>";
//     }
//     else{
//         $_SESSION['dtype']=$_POST['dtype'];
//         header("Location: home.php");
//     }
// }
?>






<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <link rel="stylesheet" href="CSS folder/boot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation bar starts -->
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark primary-bg primary-text py-1">
            <a class="navbar navbar-brand font-weight-bold ml-5 mb-0 h5 text-uppercase" href="#"><i class="fas fa-user-secret mr-2"></i>Real<span style="color: black;">K</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mx-5">
                    <li class="nav-item ">
                        <a class="nav-link mr-1 font-weight-bold" href="home.php"><i class="fas fa-home mr-2"></i>Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-1 font-weight-bold active" href="properties.php"><i class="fa fa-city mr-2"></i>Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-1 font-weight-bold" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- navigation bar ends -->
    <!-- search starts-->
    <div id="container py-4">
        <div class="text-center">
            <h2 class="m-0 py-4 px-4 ">Search Property</h2>
        </div>
        <div class="container-fluid bg-transparent rounded px-4">
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-2 font-weight-bold">
                        <label for="furnish">Type</label>
                        <select class="form-control" id="furnish" name="type">
                            <option>All Properties</option>
                            <option>Properties for Sale</option>
                            <option>Properties for Rent</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 font-weight-bold">
                        <label for="inputPassword4">Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                    <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputAddress">Property Type</label>
                        <input type="text" class="form-control" placeholder="(Eg:1BHK,2BHK,1RK etc)" name="sproptype">
                    </div>
                    <div class="form-group col-md-3 font-weight-bold">
                        <label for="furnish">Sort By</label>
                        <select class="form-control" id="furnish" name="sort">
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary bg-dark" name="search">Search</button>
                </div>
            </form>

        </div>
    </div>
    <!-- search ends -->
    <!-- cards Starts     -->
    <div class="text-left">
        <?php if ($result->num_rows > 0) { ?>
            <h4 class="m-0 py-4 px-4 ">Properties:</h4>
        <?php } ?>
        <?php if ($result->num_rows == 0) { ?>
            <h4 class="m-0 py-4 px-4 ">No Properties found!</h4>
        <?php } ?>
    </div>
    <!-- <div class="album py-5 bg-light"> -->
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="card-deck"> -->
            <?php
            
            while ($property_result = mysqli_fetch_assoc($result)) {
                $d_type = $property_result['dtype'];
                $prop_id = $property_result['propid'];
                $price = $property_result['price'];
                $address = $property_result['paddress'];
                $city = $property_result['pcity'];
                $state = $property_result['pstate'];
                $country = $property_result['pcountry'];
                $pincode = $property_result['ppin'];
            ?>
                <div class="col-md-3 my-3">
                    <div class="card-deck">
                        <div class="card shadow-sm">
                            <?php 
                            $sqlim="select * from propimages where propid='$prop_id'";
                            $resultim=mysqli_query($conn,$sqlim);
                            $photo=mysqli_fetch_assoc($resultim);
                            $cpic=$photo['images'];
                            ?>
                            <img src="images/<?php echo $cpic;?>" class="card-img-top" alt="..">
                            <div class="card-body">
                                <h4 class="card-title">Property on <?php echo $d_type; ?></h4>
                                <h5 class="card-title">Price: ₹<?php echo $price; ?></h5>
                                <p class="card-text"><?php echo $address; ?>,<?php echo $city; ?>,<?php echo $state; ?>,<?php echo $pincode; ?></p>
                                <a href="propdetail.php?id=<?php echo $prop_id;?>" class="btn btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- </div> -->
        </div>
    </div>

    <!-- </div> -->
    <!-- cards ends -->





</body>

</html>
<!-- if($password == $cpassword){
        $sql = "select * from users where userid='$userid' OR email='$email'";
        $result=mysqli_query($conn,$sql);
        if(!$result->num_rows > 0){
            $sql="insert into users (name,userid,email,password) values ('$name','$userid','$email','$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('User Registered Successfully!')</script>";
                $name='';
                $userid = '';
                $email = '';
                $password = '';
                $cpassword='';
            }
            else{
                echo "<script>alert('Woops! Something Went Wrong.')</script>";
            }
        }
        else{
            echo "<script>alert('Email or userid Already Exists!')</script>";
        }
    }
    else {
        echo "<script>alert('Password Not Matched.')</script>";
    } -->