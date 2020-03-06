<?php

session_start();

$id = $_GET['id'];
// echo $id;
include ('connect.php');
include ('navbar.php');

$query = $db->query("SELECT * FROM `products` WHERE product_id = $id");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <title>Upload Successful</title>
  </head>
  <body>

 

    <div class="container">
    <h2 class="text mt-5 text-center">Upload Successful</h2>
    <?php
    //cek ada di database apa nggak 
    if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
        $imagesource = 'upload/'.$row["product_id"].'/'.$row["product_image"];
    ?>
      <img src="<?php echo $imagesource; ?>" alt="" width="500">
      <p><?= $row["product_name"] ?></p>
      <p><?php 
            $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
            echo $realtype; ?></p>
    <?php  
      
    }
    }else{ ?>
      <p>No Images Found</p>
    <?php }
    ?>
  </body>

    
</html>