<?php 

require_once 'dbconnect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM things WHERE id = {$id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete Things</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/d1baa23426.js" crossorigin="anonymous"></script>
 <style type="text/css">
    p {
      text-align: center;
      margin-top: 40px;
      font-size: 26px;
    }

  a {
   margin-left: 382px;
     background: white;
    }

    

.jumbotron{
  background: url('https://images.unsplash.com/photo-1504805572947-34fad45aed93?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')50%;
background-repeat: no-repeat;
  background-size: cover;
    color: yellow;
    font-size: 17pt;
}


  </style>
</head>
<body>
<div class="jumbotron">
  <p>IT IS YOUR CHOICE!</p>
</div>
<p class="mt-5">Do you really want to delete this Thing to do?</p>
<form action ="actions/a_deleteThings.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
   <a><button class="btn btn-success" type="submit">Yes, delete it!</button></a>
   <a href="adminpanelThings.php"><button class="btn btn-danger" type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>