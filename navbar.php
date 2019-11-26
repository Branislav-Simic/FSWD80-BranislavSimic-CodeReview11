


<?php 
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="adminpanel.php">Trevel-o-matic</a>';
        if(isset($_SESSION["user"])){
          echo '
          <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homeRestaurant.php">Restaurants <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="homeThings.php">Things to do <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="homeEvent.php">Event <span class="sr-only">(current)</span></a>
      </li> 
    </ul>

      
    <form class="form-inline my-2 my-lg-0">

    <a class="nav-link text-decoration-none text-light" href="adminpanel.php" tabindex="-1" aria-disabled="true"> Welcome '.$userRow["userName"]. '</a>  
     
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     <form class="form-inline mx-3 my-2 my-lg-0 border-0">
      <button class="btn text-white bg-dark my-2 my-sm-0 border-0" type="submit"><a class="text-decoration-none" href="logout.php?logout">Sign Out</a>
      </button>
     
    </form>
  </div>
</nav>';
        } else {
          echo '
   <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="adminpanelRestaurant.php">Restaurants <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="adminpanelThings.php">Things to do <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="adminpanelEvent.php">Event <span class="sr-only">(current)</span></a>
      </li> 
    </ul>

      
    <form class="form-inline my-2 my-lg-0">

    <a class="nav-link text-decoration-none text-light" href="adminpanel.php" tabindex="-1" aria-disabled="true"> Welcome '.$userRow["userName"]. '</a>  
     
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     <form class="form-inline mx-3 my-2 my-lg-0 border-0">
      <button class="btn text-white bg-dark my-2 my-sm-0 border-0" type="submit"><a class="text-decoration-none" href="logout.php?logout">Sign Out</a>
      </button>
     
    </form>
  </div>



</nav>
';
        }



?>
<style>
  .buttonColor{
    background:  <?= $pics[$random]; ?> ;  
  }
</style>

<!-- <a class="navbar-brand" href="adminpanel.php">Welcome  -->
  <!-- <a>'.$userRow["userName"].'</a> -->


 <!--  <div class="offset-1 collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="adminpanelRestaurant.php">Flavours <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="adminpanelThings.php">Things<span class="sr-only">(current)</span></a>
      </li>




      <li class="nav-item active">
        <a class="nav-link" href="adminpanelEvent.php">Event<span class="sr-only">(current)</span></a>
      </li>
      
      
     <button class=" btn btn-outline-success my-2 my-sm-0 text-decoration-none type="submit"><a href="logout.php?logout">  Sign Out  </a></button>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div> -->