<?php
include 'config.php';
session_start();
error_reporting(0);
$user_id=$_SESSION['userid'];
if(!isset($_SESSION['userid']))
{
  header('location:login.php');
}
$user_id = $_SESSION['userid'];
if(isset($_POST['add'])) {
    $d_type = $_POST['dtype'];
    $prop_id = $_POST['propid'];
    $p_address = $_POST['paddress'];
    $prop_type = $_POST['proptype'];
    $p_city = $_POST['pcity'];
    $p_state = $_POST['pstate'];
    $p_country = $_POST['pcountry'];
    $p_pincode = $_POST['ppincode'];
    $p_price = $_POST['pprice'];
    $prop_desc = $_POST['propdesc'];
    $furnish = $_POST['furnish'];
    $floor_space = $_POST['floorspace'];
    $image = $_FILES['image'];
    $num_img = count($image['name']);
    // echo "<script>alert('Passwords not Matched')</script>";
    // if($d_type=="Rent"){
    $sqlp = "INSERT INTO `property`(`propid`,`proptype`, `paddress`, `pcity`, `pstate`, `pcountry`, `ppin`, `price`, `propdesc`,`furnish`,`floorspace`) VALUES ('$prop_id','$prop_type','$p_address','$p_city','$p_state','$p_country','$p_pincode','$p_price','$prop_desc','$furnish','$floor_space')";
    $result = mysqli_query($conn, $sqlp);
    if ($result) {
        $sql = "INSERT INTO `owns`(`userid`, `propid`, `dtype`) VALUES ('$user_id','$prop_id','$d_type')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $extension = array('jpeg', 'jpg', 'png', 'gif');
            $finalimg = '';
            foreach ($_FILES['image']['tmp_name'] as $key => $value) {
                $filename = $_FILES['image']['name'][$key];
                $filename_tmp = $_FILES['image']['tmp_name'][$key];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array($ext, $extension)) {
                    if (!file_exists('images/' . $filename)) {
                        move_uploaded_file($filename_tmp, 'images/' . $filename);
                        $finalimg = $filename;
                    } else {
                        $filename = str_replace('.', '-', basename($filename, $ext));
                        $newfilename = $filename . time() . "." . $ext;
                        move_uploaded_file($filename_tmp, 'images/' . $newfilename);
                        $finalimg = $newfilename;
                    }
                    $instsql = "INSERT INTO `propimages`(`propid`, `images`) VALUES ('$prop_id','$finalimg')";
                    $result = mysqli_query($conn, $instsql);
                } else
                    echo "<script>alert('File Format not Supported!')</script>";
            }
            if ($result) {
                echo "<script>alert('Property added Successfully!')</script>";
            } else
                echo "<script>alert('Something Went Wrong!')</script>";
        } else
            echo "<script>alert('Something in Owns Table went wrong!!')</script>";
    } else
        echo "<script>alert('Something in Property Table went wrong!!')</script>";
        // }
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
    <title></title>
    <script>
        // document.getElementById("floor").style.display="none";
        function text(x) {
            if (x == 'Rent') {
                document.getElementById("price").style.display = "block";
                document.getElementById("furnis").style.display = "block";
                document.getElementById("floor").style.display = "none";
            } else if (x == 'Sale') {
                document.getElementById("price").style.display = "none";
                document.getElementById("furnis").style.display = "none";
                document.getElementById("floor").style.display = "block";
            }
            return;
        }
    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="secondary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 fs-4 font-weight-bold text-uppercase border-bottom"><i class="fas fa-user-secret mr-2"></i>REAl<span style="color: white;">K</span></div>
            <div class="list-group list-group-flush my-3">
                <a href="home.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-home mr-2"></i>Home</a>
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                <a href="addprop.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold active"><i class="fas fa-plus mr-2"></i>Add Property</a>
                <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-user mr-2"></i>Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text font-weight-bold"><i class="fas fa-power-off mr-2"></i>Logout</a>
            </div>
        </div>
        <!-- sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <h2 class="m-0">Add Property</h2>
                </div>
            </nav>
            <div class="container-fluid bg-transparent rounded py-3 px-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row mb-3 font-weight-bold">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dtype" id="inlineRadio1" value="Rent" onclick="text('Rent');">
                            <label class="form-check-label" for="inlineRadio1">For Rent</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dtype" id="inlineRadio2" value="Sale" onclick="text('Sale');">
                            <label class="form-check-label" for="inlineRadio2">For Sale</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 font-weight-bold">
                            <label for="inputAddress">Property No.</label>
                            <input type="text" class="form-control" placeholder="" name="propid" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 font-weight-bold">
                            <label for="inputAddress">Property Type</label>
                            <input type="text" class="form-control" placeholder="(Eg:1BHK,2BHK,1RK etc)" name="proptype" required>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group font-weight-bold col-md-3" id="floor">
                            <label for="basic-url">Floor Space</label>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="floorspace">
                                <div class="input-group-append">
                                    <span class="input-group-text">sqft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 font-weight-bold" id="furnis">
                            <label for="furnish">Furnish Type</label>
                            <select class="form-control" id="furnish" name="furnish">
                                <option></option>
                                <option>Non Furnished</option>
                                <option>Semi Furnished</option>
                                <option>Fully Furnished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 font-weight-bold">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="paddress" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" name="pcity" required>
                        </div>
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="inputState">State</label>
                            <input type="text" class="form-control" name="pstate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="inputZip">Country</label>
                            <input type="text" class="form-control" name="pcountry" required>
                        </div>
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="inputZip">Pin Code</label>
                            <input type="text" class="form-control" name="ppincode" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="inputAddress">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="pprice" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-2 font-weight-bold" id="price">
                            <label for="exampleFormControlSelect2"></label>
                            <input class="form-control mt-4" type="text" value="per month" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 font-weight-bold">
                            <label for="exampleFormControlTextarea1">Property Description</label>
                            <textarea class="form-control" name="propdesc" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 font-weight-bold">
                            <label for="exampleFormControlFile1">Property Images</label>
                            <input type="file" name="image[]" class="form-control-file" id="exampleFormControlFile1" multiple required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary bg-dark" name="add">Add Property</button>
                </form>

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
    </script>
</body>

</html>