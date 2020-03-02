<?php


session_start();

include ('connect.php');

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
    <script type="text/javascript" src="js/submitnew.js"></script>

    <title>Submit New</title>
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


    <div class="container">
      <h2 class="text mt-5">Submit New Product</h2>

      <div id="error"><p id="messages" style="color:red"></p></div>
      <!-- ke confirmationpage dulu ga langsung input ke database-->
      <form id="form" action="confirmationpage.php" method="POST" enctype="multipart/form-data">
      <div class="form-group mt-5">
          <label for="product_name">Product Name</label>
          <input id="product_name" type="text" name="product_name" class="form-control" placeholder="Input Product Name">
        </div>

        <div class="form-group mt-5">
          <label for="product_image">Product Image</label>
          <input id="product_image" type="file" name="product_image" class="form-control">
        </div>

        <div class="form-group mt-5">
          <label for="product_type">Product Type :</label>
          <select id="product_type" name="product_type" class="form-control">
            <option value="0">Select Type</option>
            <option value="1">New</option>
            <option value="2">Used</option>
            <!-- <option value="new">Sale</option> -->
          </select>
        </div>

        <button type="submit" name="submit" onclick="validate()" class="btn btn-primary mb-5">Submit</button>
        <button type="reset" class="btn btn-danger mb-5">Reset</button>

      </form>
    </div>

    
  </body>
</html>