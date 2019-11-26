<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"]) && !isset($_SESSION["superadmin"])){
  header("Location: index.php");
}

if(isset($_SESSION["admin"])){
  header("Location: adminpanel.php");
}

if(isset($_SESSION["superadmin"])){
  header("Location: mainDashboard.php");
}




// if session is not set this will redirect to login page
// select logged-in users details
$sql = "SELECT * FROM users WHERE userId=".$_SESSION['user'];
$sql;
$res=mysqli_query($conn, $sql);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
</head>
<style>
  .jumbotron{
    background: url('https://www.wallpaperflare.com/static/443/441/227/vienna-aerial-photo-city-river-wallpaper.jpg')50% 60%;
   background-size: cover;
    color: white;
    
  }
   .leadJumbo{
    font-size: 20pt;
  }

</style>
<body >

  <?php include_once "navbar.php" ?>




 <div class="fluid-container">
   <div class="jumbotron ">
    <h1 class="display-4 mt-3">Dear  <?php echo $userRow['userName' ]; ?></h1>
    <p class="leadJumbo mt-4">here you have all information about restaurant and events in Vienna.</p>
  </div>

       
                <div class="row mb-2">

<div class="d-flex justify-content-between">
          
           
<div class="card" >
  <img src="https://images.unsplash.com/photo-1543520788-f17401c3a3bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=490&q=60" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Restaurants</h5>
    <p class="card-text">Click the button to see restaurants in Vienna</p>
    <a href="homeRestaurant.php" class="btn btn-primary">Show more</a>
  </div>
</div>
<div class="card" >
  <img src="https://images.unsplash.com/photo-1547480053-7d174f67b557?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=490&q=60" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Things to do</h5>
    <p class="card-text">Click the button to see Things to do in Vienna</p>
    <a href="homeThings.php" class="btn btn-primary">show more</a>
  </div>
</div>
<div class="card" >
  <img src="https://images.unsplash.com/photo-1467810563316-b5476525c0f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=490&q=60" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Events</h5>
    <p class="card-text">Click the button to see events in Vienna.</p>
    <a href="homeEvent.php" class="btn btn-primary">Show more</a>
  </div>
</div>

 </div>      

              

<?php 
  include_once "footer.php"
   ?>
<script>

</script>
</body>
</html>
<?php ob_end_flush(); ?>