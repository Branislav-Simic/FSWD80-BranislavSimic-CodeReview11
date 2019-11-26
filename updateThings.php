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
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/d1baa23426.js" crossorigin="anonymous"></script>

<style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 30px;
           width: 40% ;
           font-size: 18px;
       }

       table tr th  {
           padding-top: 20px;
       }

       table tr td {
        width: 340px;
       }

       button {
          margin-top: 20px;
          border-radius: 5px;
       }


       table input  {
          border-radius: 4px;
          box-shadow: 2px 1px darkgrey;
          width: 300px;
       }

   </style>
</head>
<body >

   <?php include_once "navbar.php" ?>

<fieldset>
   <legend>Update Things</legend>

   <form action="actions/a_updateThings.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>Name</th>
               <td><input type="text"  name="shopName" placeholder ="Name" value="<?php echo $data['shopName'] ?>"  /></td>
           </tr>    
           <tr>
               <th>Phone Number</th>
               <td><input type= "text" name="phone"  placeholder="Phone Number" value ="<?php echo $data['phone'] ?>" /></td >
           </tr>
           <tr>
               <th>Type</th>
               <td><input type ="text" name= "type" placeholder= "Type" value= "<?php echo $data['type'] ?>" /></td>
           </tr>  
           <tr>
               <th>Decription</th>
               <td><input type="text"  name="description" placeholder ="Description" value="<?php echo $data['description'] ?>"  /></td>
           </tr>  
           <tr>
               <th>Address</th>
               <td><input type="text"  name="address" placeholder ="Address" value="<?php echo $data['address'] ?>"  /></td>
           </tr>
           <tr>
               <th>Website</th>
               <td><input type="text"  name="website" placeholder ="Website" value="<?php echo $data['website'] ?>"  /></td>
           </tr>
           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="Image" value="<?php echo $data['image'] ?>"  /></td>
           </tr>
           <tr>
               <input type= "hidden" name= "id" value= "<?php echo $data['id']?>"/>
               <td><button class="btn btn-success px-5" type= "submit"><i class="fas fa-check"></i></button ></td>
               <td><a  href= "adminpanelThings.php"><button class="btn btn-danger px-5"  type="button" ><i class="fas fa-arrow-left"></i></button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >

<?php
}
?>