<?php


session_start();

include ('connect.php');
$user_id = $_SESSION['user_id'];
$product_name = $_POST['product_name'];
// $id = $_GET['user_id'];
$query = $db->query("SELECT * FROM `products`WHERE created_by_user_id = $user_id");
// echo $user_id

// $timeout_duration = 60;
// if(isset($_SESSION))
$now = time();

if ($now  > $_SESSION['session_expired']){
  session_destroy();
  echo "<script>window.location.href='formlogin.php?errormessage=Please Login!'</script>";
  exit;
}

if(!isset($_SESSION["login"])){
  echo "<script>window.location.href='formlogin.php'</script>";
  exit;
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Your Products</title>
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="home.php">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
              echo "Hello " .$_SESSION['username'];
            ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <!-- <a class="dropdown-item" href="gallery.php">Gallery</a> -->
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="submitnew.php">Submit New</a>
              <a class="dropdown-item" href="yourproducts.php">Your Products</a>
              <!-- <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">SALE</a> -->
            </div>
          </li>
          <li class="nav-item">
            <!-- <a class="fas fa-user ml-3 mt-2 nav-link" href="#"></a> -->
            <a class="fas fa-search ml-3 mt-2 nav-link" href="#"></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li> -->
        </ul>
      </div>
    </nav>


    <div class="content">
      <h2 class="text-center">Your Products</h2>
      <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      <?php
      //cek ada di database apa nggak 
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $imagesource = 'upload/'.$row["product_image"];
      ?>
      <div class="card" style="width: 18rem;">
      
        <img class="card-img-top" src="<?php echo $imagesource; ?>" alt="" />
        <div class="card-body">
          <p><?= $row["product_name"] ?></p>
          <p><?php 
                $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                echo $realtype; ?></p>
          <a href="#" class="btn btn-primary">Update</a>
          <a href="deleteproduct.php" class="btn btn-danger">Delete</a>
        </div>
      <?php  
        
      }
      }else{ ?>
        <p>No Images Found</p>
      <?php }
      ?>
      </div>
      
    </div>

    <!-- <div class="container">
      <div class="col-md-3">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div> -->


  </body>
</html>