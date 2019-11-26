<?php  
  session_start();

  require_once 'dbconnect.php';

  $sql = "SELECT * FROM things";
  $result = mysqli_query($conn, $sql);

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
           width: 40% ;
           font-size: 18px;
       }

       table tr th  {
           padding-top: 25px;
       }

       table tr td {
        width: 5%;
       }

       table input  {
          border-radius: 4px;
          box-shadow: 2px 1px darkgrey;
          width: 300px;
       }
       td{
        margin-top: 50%;
       }

        table td a {
          text-decoration: none;
        }
   </style>
</head>
<body>

   <?php include_once "navbar.php" ?>

<fieldset class="mt-3">
   <legend style="font-weight: bold; font-size: 20pt;">Create Things to do</legend>

   <form  action="actions/a_createThings.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="name"  placeholder="Name"/></td>
           </tr>    
           <tr>
               <th>Phone</th>
               <td><input  type="text" name="phone" placeholder="Phone"/></td>
           </tr>
            <tr>
               <th>Type</th>
               <td><input  type="text" name="type" placeholder="Type"/></td>
           </tr>
            <tr>
               <th>Description</th>
               <td><input  type="text" name="description" placeholder="Description"/></td>
           </tr>
           <tr>
               <th>Address</th>
               <td><input type="text"  name="address" placeholder ="Address"/></td>
           </tr>
           <tr>
               <th>Website</th>
               <td><input type="text"  name="website" placeholder ="Website"/></td>
           </tr>
           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="Image" /></td>
           </tr>
            <tr>
               <td><button class="btn btn-success px-5" type ="submit"><i class="fas fa-plus"></i></button></td>
               <td><a href= "adminpanelThings.php"><button class="btn btn-danger px-5 my-2" type="button"><i class="fas fa-arrow-left"></i></button></a></td>
           </tr>
  </table>
    </form>
</fieldset>

</body>
</html>