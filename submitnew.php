<?php


session_start();

include ('connect.php');
include ('navbar.php');

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
    <script type="text/javascript" src="js/submitnew.js"></script>

    <title>Submit New</title>
  </head>
  <body>

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