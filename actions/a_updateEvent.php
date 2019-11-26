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
   $type = $_POST[ 'type'];
   $description = $_POST[ 'description'];
   $address = $_POST[ 'address'];
   $webpage = $_POST[ 'webpage'];
   $event_Date = $_POST[ 'event_Date'];
   $event_time = $_POST[ 'event_time'];
   $price = $_POST[ 'price'];
   $image = $_POST[ 'image'];

   $id = $_POST['id'];

   $sql = "UPDATE event SET name = '$name', type = '$type', description = '$description', address= '$address', webpage = '$webpage'
   , event_Date = '$event_Date', event_time = '$event_time', price = '$price', image = '$image' 
   WHERE id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../updateEvent.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../adminpanelEvent.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>


</body>
</html>