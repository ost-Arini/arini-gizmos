<?php


session_start();
//include itu cuma buat global constant
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/formlogin.js"></script>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Profile</title>
  </head>
  
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Home Product</a>
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
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Gallery</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Features
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">New</a>
              <a class="dropdown-item" href="#">Used</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">SALE</a>
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
      <h2 class="text-center">Your Profile</h2>
      <table class="text-center">
        <?php 
            $id = $_SESSION['user_id'];
            $login_query = "SELECT * FROM `users` WHERE `user_id` = $id";  
            $result= $db->query($login_query);
        ?><table> <?php 
        while($row = $result->fetch_assoc()) {
            // echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["email"]. "<br>";
            ?>  
            <tr>
                <td>Name</td>
                <td><?= $row["user_name"] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $row["email"] ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $row["nickname"] ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?= $row["password"] ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php 
                    //ternary operator = shorthand if else
                    $realgender = $row["gender"] == 1 ? 'Male' : 'Female';
                    echo $realgender;
                
                // $row["gender"] 
                
                ?></td>
            </tr>
        
        
            
        
         <?php } ?> </table>
      </table>
    </div>
  </body>
</html>