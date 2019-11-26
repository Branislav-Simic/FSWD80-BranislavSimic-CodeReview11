<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
  <style type="text/css">
    p {
      text-align: center;
      margin-top: 40px;
      font-family: 'Indie Flower', cursive;
      font-size: 26px;
    }

  a {
     margin-left: 400px;
     background: white;
    }

a button {
  padding-left: 50px;
  padding-right: 50px;
  padding-top: 10px;
  padding-bottom: 10px;
  font-family: 'Indie Flower', cursive;
  font-size: 22px;
  border-radius: 10px;
}

a button:hover {
  color: white;
  background: black;
}

  </style>
</head>
<body>





<?php 

require_once '../dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $phone= $_POST['phone'];
   $type = $_POST[ 'type'];
   $image = $_POST[ 'image'];
   $description = $_POST['description'];
   $webpage= $_POST['webpage'];
   $address = $_POST[ 'address'];
   

  $sql = "INSERT INTO restaurant (name, phone, type, image, description, webpage, address) VALUES ('$name', '$phone',  '$type', '$image', '$description', '$webpage',  '$address')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../createRestaurant.php'><button type='button'>Back</button></a>";
        echo "<a href='../adminpanel.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->conn_error;
   }

   $conn->close();
}

?>


</body>
</html>