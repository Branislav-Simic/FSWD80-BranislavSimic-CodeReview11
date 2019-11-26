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
   $phone = $_POST['phone'];
   $type = $_POST[ 'type'];
   $image = $_POST[ 'image'];
   $description = $_POST[ 'description'];
   $address = $_POST[ 'address'];
   $website = $_POST[ 'website'];

   $id = $_POST['id'];

   $sql = "UPDATE things SET name = '$name', phone = '$phone', type = '$type', image= '$image', description = '$description', address = '$address', website = '$website' WHERE id = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../updateThings.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../adminpanelThings.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>


</body>
</html>