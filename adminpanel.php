<?php
ob_start();
session_start();
require_once 'dbconnect.php';
// if session is not set this will redirect to login page
// select logged-in users details

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])&& !isset($_SESSION["superadmin"])){
  header("Location: index.php");
}

if(isset($_SESSION["user"])){
  header("Location: home.php");
}

if(isset($_SESSION["superadmin"])){
  header("Location: mainDashboard.php");
}


$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

.jumbotron{
  background: url('https://www.desktopbackground.org/p/2015/05/20/951139_business-desktop-wallpapers-hd-wallpaper-backgrounds-of-your-choice_1680x1060_h.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  color: white
}

.card{
  width: 20rem;
}
</style>

</head>
<body >

   <?php include_once "navbar.php" ?>
           

            <div class="fluid-container">

              <div class="jumbotron">
  <h1 class="display-4 mt-4">Dear Admin</h1>
  <p class="leadJumbo">Clicking on the ADD button you can insert new media into the Categorys.<br>
  Pushing the EDIT and DELETE buttons are triggering the functions.  
  </p>
    <a class="btn btn-success  btn-lg" href="createThings.php" role="button">Add Things to do </a>
    <a class="btn btn-success btn-lg" href="createRestaurant.php" role="button">Add Restaurant</a>
    <a class="btn btn-success btn-lg" href="createEvent.php" role="button">Add Event</a>
</div>

<div class="d-flex justify-content-around">
          
           
<div class="card">
  <img src="https://images.unsplash.com/photo-1543520788-f17401c3a3bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Restaurants</h5>
    <p class="card-text">To EDIT or DELITE click on the button <br>because you are a admin</p>
    <a href="adminpanelRestaurant.php" class="btn btn-primary mt-3">Show more</a>
  </div>
</div>
<div class="card">
  <img src="https://images.unsplash.com/photo-1547480053-7d174f67b557?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Things to do</h5>
    <p class="card-text">To EDIT or DELITE click on the button<br>because you are a admin</p>
    <a href="adminpanelThings.php" class="btn btn-primary mt-3">Show more</a>
  </div>
</div>
<div class="card">
  <img src="https://images.unsplash.com/photo-1467810563316-b5476525c0f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" class="card-img-top " alt="...">
  <div class="card-body">
    <h5 class="card-title">Event</h5>
    <p class="card-text">To EDIT or DELITE click on the button<br>because you are a admin</p>
    <a href="adminpanelEvent.php" class="btn btn-primary mt-3">Show more</a>
  </div>
</div>

 </div>   
              
  </div>

<?php 
  include_once "footer.php"
   ?>
</body>
</html>

<?php ob_end_flush(); ?> 