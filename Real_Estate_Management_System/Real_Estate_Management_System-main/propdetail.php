<?php

include 'config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    $sqlv = "select * from `viewed` where userid='$user_id'";
    $result = mysqli_query($conn, $sqlv);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO `viewed`(`propid`, `userid`) VALUES ('$pid','$user_id')";
        $result = mysqli_query($conn, $sql);
        if (!$result)
            echo "<script>alert('Time and Date not Inserted!')</script>";
    } else {
        $sql = "UPDATE `viewed` SET `date_time`=now() WHERE userid='$user_id'";
        $result = mysqli_query($conn, $sql);
        if (!$result)
            echo "<script>alert('Time and Date not Inserted!')</script>";
    }
    $sql = "select * from ((property INNER JOIN owns on property.propid=owns.propid) INNER JOIN users on owns.userid=users.userid) where property.propid='$pid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
    }
    $imgquery = "select * from propimages where propid = '$pid'";
    $imgresult = mysqli_query($conn, $imgquery);

    if (!$imgresult) {
        echo "Error Found!!!";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <link rel="stylesheet" href="CSS folder/carousel.css">
    <link rel="stylesheet" href="CSS folder/boot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation bar starts -->
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark primary-bg primary-text fixed-top py-1 ">
            <a class="navbar navbar-brand font-weight-bold ml-5 mb-0 h5 text-uppercase" href="#"><i class="fas fa-user-secret mr-2"></i>Real<span style="color: black;">K</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mx-5">
                    <li class="nav-item">
                        <a class="nav-link mr-1 font-weight-bold" href="home.php"><i class="fas fa-home mr-1"></i>Home
                            <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link mr-1 font-weight-bold" href="properties.php"><i class="fas fa-city mr-2"></i>Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-1  font-weight-bold" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- navigation bar ends -->
    <div class="text-center">
        <h2 class="p-2 m-3">Property Details</h2>
    </div>
    <section class="sproduct container-fluid mt-3 mx-5">
        <div class="row mt-3 p-0">
            <!-- image -->
            <div class="col-lg-6 col-md-12 col-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="CSS folder/istockphoto-1223088904-612x612.jpg" class="d-block w-100" alt="...">
                        </div>
                        <?php 
                        while($imageresult = mysqli_fetch_assoc($imgresult)){
                            $image = $imageresult['images'];
                        ?>
                        <div class="carousel-item">
                            <img src="images/<?php echo $image; ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- image -->
            <div class="col-lg-5 col-md-12 col-12 my-auto">
                <div class="form-row m-0">
                    <!-- <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div>
                <div class="form-group col-md-6 font-weight-bold"></div> -->
                    <div class="form-group col-md-6 font-weight-bold">
                        <label for="inputAddress">Property No.</label>
                        <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['propid']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12 font-weight-bold">
                        <label for="exampleFormControlTextarea1">Property Description</label>
                        <textarea class="form-control" name="propdesc" id="exampleFormControlTextarea1" readonly><?php echo $fetch['propdesc']; ?></textarea>
                    </div>
                    <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputAddress">Property Type</label>
                        <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['proptype']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputAddress">Delivery Type</label>
                        <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['dtype']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4 font-weight-bold">
                        <label for="inputAddress">Price</label>
                        <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['price']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12 font-weight-bold">
                        <label for="exampleFormControlTextarea1">Property Location</label>
                        <textarea class="form-control" name="propdesc" row="2" id="exampleFormControlTextarea1" readonly><?php echo $fetch['paddress']; ?>,<?php echo $fetch['pcity']; ?>,<?php echo $fetch['pstate']; ?>,<?php echo $fetch['ppin']; ?> <?php echo $fetch['pcountry']; ?></textarea>
                    </div>
                </div>
                <div class="form-group col-md-6 font-weight-bold"></div>
            </div>
        </div>
        <div class="form-row mx-auto">
            <div class="form-group mt-0 col-md-12">
                <h5>Agent Details:</h5>
            </div>
            <div class="form-group col-md-3 font-weight-bold">
                <label for="inputAddress">Name</label>
                <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['name']; ?>" readonly>
            </div>
            <div class="form-group col-md-3 font-weight-bold">
                <label for="inputAddress">Mobile No.</label>
                <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['phno']; ?>" readonly>
            </div>
            <!-- <div class="form-row"> -->
            <div class="form-group col-md-4 font-weight-bold">
                <label for="inputAddress">Email</label>
                <input type="text" class="form-control" name="uaddress" value="<?php echo $fetch['email']; ?>" readonly>
            </div>
            <!-- </div> -->
            <div class="form-group col-md-5 font-weight-bold">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" name="propdesc" row="2" id="exampleFormControlTextarea1" readonly><?php echo $fetch['address']; ?>,<?php echo $fetch['city']; ?>,<?php echo $fetch['state']; ?>,<?php echo $fetch['country']; ?></textarea>
            </div>
        </div>
    </section>

</body>

</html>