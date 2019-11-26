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
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

<title>Welcome - <?php echo $userRow['userName' ]; ?></title>

<style>
  .jumbotron{
    background: url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')50%;
     background-repeat: no-repeat;
  background-size: cover;
    color: white;
    font-size: 17pt;
  }
</style>
</head>
<body >

  <?php include_once "navbar.php" ?>




 <div class="fluid-container">

              <div class="jumbotron">
  <h1 class="display-4 mt-4">Dear <?php echo $userRow['userName' ]; ?></h1>
  <p class="leadJumbo">Discover the events and<br>   
   visit your favourite event in Vienna</p>
</div>
        
       
                <div class="row mb-2">
 <?php  
$sql = "SELECT * from event";
$result = $conn->query($sql); 
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){



echo"
  
<div class='offset-1 d-flex align-items-center'>

<div class='card text-center' style='width: 18rem;'>
  <img src=".$row['image']." class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>".$row['name']."</h5>
    <p class='card-text'>".$row['type']."</p>
    <a><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".$i."'>
                          More info
                        </button></a><br><hr>
                       
  </div>
</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class='modal  fade' id='exampleModal".$i."'tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>About this event</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body '>
        <div class='card text-center' style='width: 18rem;'>
              <img src=".$row['image']." class='card-img-top' alt='...'>
              <p class='card-text'><b>type:</b> <br>".$row['type']."</p>
              <p><b>description:</b> <br>".$row['description']."</p><hr>
              <p><b>address:</b><br>".$row['address']."</p><hr>
              <p><b>website:</b><br>".$row['webpage']."</p><hr>               
        </div>
      </div>
      </div>
    </div>
  </div>
</div>";
$i++;
}
} else{
  echo "<tr><td colspan='5'><center> No Data Avaiable</center></td></tr>";
}
?>  

              
</div>

<?php 

include_once "footer.php"
 ?>

</div>


</body>
</html>
<?php ob_end_flush(); ?>

