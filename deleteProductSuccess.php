<?php


session_start();

include ('connect.php');
include ('navbar.php');


$user_id = $_SESSION['user_id'];


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
    <!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Delete Success</title>
  </head>

  <body>

    

    <div class="content">
      <h2 class="text-center">Product Deleted Successfully</h2>

</body>
</html>