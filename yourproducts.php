<?php


session_start();

include ('connect.php');
include ('navbar.php');

$user_id = $_SESSION['user_id'];

// echo $user_id;
// $product_name = $_POST['product_name'];
// $id = $_GET['product_id'];
$query = $db->query("SELECT * FROM `products` WHERE created_by_user_id = $user_id AND delete_flag = 0");
// $last_id = mysqli_insert_id($db);

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
    

    <title>Your Products</title>
  </head>

  <body>


    <div>
      

      <div class="container">
        <h2 class="text-center">Your Products</h2>
        <br>
        <h4 class="text-center">All products you submitted</h4>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="row-fluid">
          <div class="col-md-3">
          <?php
            //cek ada di database apa nggak 
            if($query->num_rows > 0){
              // echo '<div class="container"><div class="row">';
              while($row = $query->fetch_assoc()){
                $imagesource = 'upload/'.$row["product_image"];
            ?>
            <div class="card-columns-fluid">
            
              <img class="card-img-top" src="<?php echo $imagesource; ?>" alt="" />
              <div class="card-body">
                <h5>Product Name : <?= $row["product_name"] ?></h5>
                <p>Product ID : <?= $row["product_id"] ?></p>
                <p>Created by : <?= $row["created_by_user_name"] ?></p>
                <p>Updated by : <?= $row["updated_by_user_name"] ?></p>
                <p>Product Type : <?php 
                      $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                      echo $realtype; ?></p>

                
                
                <form action="confirmdeleteproduct.php" method="POST">
                <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Update</a>
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

        </div>
          
        
      </div>
      
      
    </div>


  </body>
</html>