<?php
//fetch.php


session_start();
$connect = mysqli_connect("localhost", "root", "", "web");
$output = '';
$i = 0;
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM things
  WHERE name LIKE '".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM things
  ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {
  echo  "
  
<div class='offset-1 d-flex align-items-center'>

<div class='card' style='width: 18rem;'>
  <img src=".$row['image']." class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>".$row['name']."</h5>
    <p class='card-text'>".$row['type']."</p>
    <a><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".$i."'>
                          More info
                        </button></a><br><hr>
                        <a href='updateThings.php?id=" .$row['id']."'><button class='btn btn-success px-5' type='button'><i class='far fa-edit'></i></button></a>
                           <a href='deleteThings.php?id=" .$row['id']."'>
                           <button class='btn btn-danger px-5 ' type='button'><i class='fas fa-trash-alt '></i></button></a>
                           <hr>
  </div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class='modal  fade' id='exampleModal".$i."'tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>About this Thing to do</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    
       <div class='modal-body'>
                  <div class='card text-center' style='width: 18rem;'>
              <img src=".$row['image']." class='card-img-top' alt='...'>
              <p class='card-text'><b>type:</b> <br>".$row['type']."</p>
              <p><b>description:</b> <br>".$row['description']."</p><hr>
              <p><b>address:</b><br>".$row['address']."</p><hr>
              <p><b>website:</b><br>".$row['website']."</p><hr>               
        </div>
                </div>
                </div>
      </div>
    </div>
  </div>
</div>


                   " ;
                   $i++;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            
'</div>'
?>