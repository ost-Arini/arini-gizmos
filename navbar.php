<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <script type="text/javascript" src="js/slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
              <!-- <a class="dropdown-item" href="allproducts.php">All Products</a> -->
            </div>
          </li>
          <li class="nav-item">
            <a class="fas fa-search ml-3 mt-2 nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </nav>

  </body>
</html>