<?php
include 'config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['userid'];
if (!isset($_SESSION['userid'])) {
  header('location:login.php');
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
          <li class="nav-item active">
            <a class="nav-link mr-1 font-weight-bold" href="home.php"><i class="fas fa-home mr-1"></i>Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
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
  <!-- slides -->
  <div id="myCarousel" class="carousel slide mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="CSS folder/rowan-heuvel-bjej8BY1JYQ-unsplash.jpg" class="d-block w-100" alt="">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>SEARCH PROPERTY</h1>
            <p>Search properties based on your requirements.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="Css folder/todd-kent-178j8tJrNlc-unsplash.jpg" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>SELL OR RENT PROPERTY</h1>
            <p>Advertise your property for sale or rent by giving the property details.</p>
            <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p> -->
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- slides -->
  <!-- search starts-->
  <section>
    <div id="container">
      <div class="text-center">
        <h2 class="m-0 pb-4 px-4 ">About Us</h2>
      </div>
      <div class="container-fluid bg-transparent px-4">
        <p>Real Estate Management System is an online real estate software application that manages the overall operational activities and processes like management of the property, real estate agencies, agents and clients.</p>
        <p>It also provides facility to the user to search for residential and commercial property which is for sale or rent. Here the user will be able to upload the property information and manage it.</p>
        <p>This is very useful for the people to search the property based on their requirements.</p>
      </div>
      <!-- <div class="container-fluid bg-transparent rounded px-4">
        <form action="" method="POST">
          <div class="form-row">
            <div class="form-group col-md-2 font-weight-bold" id="furnis">
              <label for="furnish">Type</label>
              <select class="form-control" id="furnish">
                <option>All Properties</option>
                <option>Properties for Sale</option>
                <option>Properties for Rent</option>
              </select>
            </div>
            <div class="form-group col-md-3 font-weight-bold">
              <label for="inputPassword4">Price</label>
              <input type="text" class="form-control" name="sprice" value="">
            </div>
            <div class="form-group col-md-3 font-weight-bold">
              <label for="inputPassword4">Location</label>
              <input type="text" class="form-control" name="ssplace" value="">
            </div>
            <div class="form-group col-md-4 font-weight-bold">
              <label for="inputAddress">Property Type</label>
              <input type="text" class="form-control" placeholder="(Eg:1BHK,2BHK,1RK etc)" name="sproptype">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary bg-dark" name="search">Search</button>
          </div>
        </form>

      </div> -->
    </div>
  </section>
  <!-- search ends -->
</body>

</html>