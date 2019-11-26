<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if(isset($_SESSION["admin"])){
  header("Location: adminpanel.php");
}

if(isset($_SESSION["user"])){
  header("Location: home.php");
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs 

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT userId, userName, userPass, role FROM users WHERE userEmail='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row 
  
  if( $count == 1 && $row['userPass']==$password ) {
    if($row["role"] == "user"){
      $_SESSION["user"]= $row["userId"];
      header("Location: home.php");
      exit;
    } elseif($row["role"] == "admin"){
      $_SESSION['admin'] = $row['userId'];
      header( "Location: adminpanel.php");
      exit;
    } else {
      $_SESSION['superadmin'] = $row['userId'];
      header( "Location: mainDashboard.php");
      exit;
    }
   
  } else {
   $errMSG = "Incorrect Credentials, Please try again..." ;
  }
 
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style-index.css">
<script src="https://kit.fontawesome.com/d1baa23426.js" crossorigin="anonymous"></script>

</head>
<body>
 
<div class=" jumbotron bg text-center">
  <p class="lead sig ">If you want to see something about Vienna</p>
  <h1 class="display-4 in mb-4 ">Sign in!</h1>

<button class="btn btn-success btn-lg py-2 px-5" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
 <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
              
               <?php
  }
  ?>
   <form class="modal-content animate" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">

         
    <div class="container moh">
      <label for="uname"><b>Email</b></label>
      <input  type="email" name="email"  class="form-control indexField" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40">
          <span class="text-danger"><?php  echo $emailError; ?></span ><br>


      <label for="psw"><b>Password</b></label>
      <input type="password" name="pass"  class="form-control indexField" placeholder ="Your Password" maxlength="15">
           <span  class="text-danger"><?php  echo $passError; ?></span><br>


 <button class="signInButton btn-lg btn btn-success px-5 py-2 " type="submit" name= "btn-login">Sign In</button><br><br>
          
          
           
   <div class="container sigup">
   
           <p>Do you don't have an account?<a class="indexField" href="register.php">Sign Up here!</a></p>
  </div>



    <div class="container" style="background-color:#f1f1f1">


      <button type="button" class="btn btn-danger px-4" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </div>

    </div>
  </form>
</div>
</div>
<section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Unser Service</h2>
      <hr class="divider my-2">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Sturdy Themes</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Up to Date</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Ready to Publish</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
<?php ob_end_flush(); ?>