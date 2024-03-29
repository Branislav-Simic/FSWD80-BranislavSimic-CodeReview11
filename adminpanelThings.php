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
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/d1baa23426.js" crossorigin="anonymous"></script>

<style>
  .jumbotron{
    background: url('https://wallpaperplay.com/walls/full/7/5/e/117862.jpg')50%;
    background-repeat: no-repeat;
  background-size: cover;
    color: white;

  }

</style> 
</head>
<body >

   <?php include_once "navbar.php" ?>
           
   

            <div class="fluid-container">

              <div class="jumbotron">
  <h1 class="display-4 mt-4">Dear Admin</h1>
  <p class="leadJumbo">Clicking on the ADD button you can insert new Things into the Things to do.<br>
  Pushing the EDIT and DELETE buttons are triggering the functions.  
  </p>
    <a class="btn btn-success btn-lg" href="createThings.php" role="button">Add Things to do</a>
</div>
        
       
                <div class="row mb-2 "  id="result">
                  
 
</div>
</div>


 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchThings.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</body>
</html>
<?php ob_end_flush(); ?>