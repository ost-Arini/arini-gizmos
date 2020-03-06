<?php

session_start();

$id = $_GET['id'];
// echo $id;
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
$query = $db->query("SELECT * FROM `products` WHERE product_id=$id");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <title>Update Successful</title>
  </head>
  <body>

 

    <div class="container">
    <h2 class="text mt-5 text-center">Update Successful</h2>
    <?php
      //cek ada di database apa nggak 
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $imagesource = 'upload/'.$row["product_id"].'/'.$row["product_image"];
      ?>
      <div class="card" style="width:18rem;">
      
        <img class="card-img-top" src="<?php echo $imagesource; ?>" alt="" />
        <div class="card-body">
          <p>Product Name : <?= $row["product_name"] ?></p>
          <p>Product ID : <?= $row["product_id"] ?></p>
          <p>Created by : <?= $row["created_by_user_name"] ?></p>
          <p>Product Type : <?php 
                $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                echo $realtype; ?></p>

          <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Update</a>
          
          <form action="confirmdeleteproduct.php" method="POST">
          <input type="hidden" name="id" value="<?= $row["product_id"]?>">
          <input type="submit" name="submit" class="btn btn-danger" value="Delete">
          </form>
          <!-- <a href="confirmdeleteproduct.php?id=<?= $row["product_id"]?>" class="btn btn-danger">Delete</a> -->
        </div>
      <?php  
        
      }
      }else{ ?>
        <p>You haven't uploaded any products yet</p>
      <?php }
      ?>
      </div>
    </div>

    
</html>