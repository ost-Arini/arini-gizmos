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
    <link rel="stylesheet" href="css/productdisplay.css">

    <title>All Products</title>
  </head>

  <body>


  <div>
      <div class="container">
        <h2 class="text-center">Home</h2>
        <br>
        <h4 class="text-center">All products submitted by you and other users</h4>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
        <h6 >Sort by Type: </h6>
        <form action="" method="GET">
          <button type="submit" name="type" value="0">All</button>
          <button type="submit" name="type" value="1">New</button>
          <button type="submit" name="type" value="2">Used</button>
        </form>
        
        <br>

        <form action="" method="GET">
          <input type="text" name="search" placeholder="type in your search..." autocomplete="off">
          <!-- <button type="submit" name="search"><i class="fas fa-search"></i></button> -->
        </form>
        <br>

               
        <div class="container">
        <?php
        if(isset($_GET["type"])){
          if($_GET["type"] == 0 ) {
            $product_type = $db->query("SELECT * FROM `products` WHERE delete_flag = 0");
          } else {
            $product_type = $db->query("SELECT * FROM `products` WHERE delete_flag = 0 AND product_type=".$_GET["type"]);
          }

            //cek ada di database apa nggak 
            if($product_type->num_rows > 0){
              $i = 1;
              ?><div class="row">
              <?php
              while($row = $product_type->fetch_assoc()){
                $i++;
                $imagesource = 'upload/'.$row["product_id"].'/'.$row["product_image"];?>
                  
                  <div class="card col-md-4">
                    <img class="card-img-top img-fluid" src="<?php echo $imagesource; ?>" alt="" />
                    <div class="card-body">
                      <h5>Product Name : <?= $row["product_name"] ?></h5>
                      <p>Product ID : <?= $row["product_id"] ?></p>
                      <p>Created by : <?= $row["created_by_user_name"] ?></p>
                      <p>Updated by : <?= $row["updated_by_user_name"] ?></p>
                      <p>Product Type : <?php 
                        $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                        echo $realtype;
                      ?></p>
                      
                      <form action="confirmdeleteproduct.php" method="POST">
                      <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Update</a>
                      <input type="hidden" name="id" value="<?= $row["product_id"]?>">
                      <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                      </form>
                    </div>
                  </div>  
            <?php    
              }
              ?>
              </div>
            <?php } else { ?>
              <p>You haven't uploaded any products yet</p>
            <?php }
            
        } else {
          //一覧
              function search($search){
                $searchquery = "SELECT * FROM `products` WHERE
                           product_name LIKE '%$search%' OR
                           product_id LIKE '%$search%'";
                return $searchquery; 
              } //ini kalo search nya dipencet
              if(isset($_GET["search"])){
                $searchbar = search($_GET["search"]);
                $alltype=  $db->query($searchbar);
              } // ini kalo searchnya ga dipencet
              else {
                $alltype = $db->query("SELECT * FROM `products` WHERE delete_flag = 0");
              }
                
            if($alltype->num_rows > 0){
                ?><div class="row">
                <?php
                while($row = $alltype->fetch_assoc()){
                  $imagesource = 'upload/'.$row["product_id"].'/'.$row["product_image"];?>
                    
                    <div class="card col-md-4">
                      <img class="card-img-top img-fluid" src="<?php echo $imagesource; ?>" alt="" />
                      <div class="card-body">
                        <h5>Product Name : <?= $row["product_name"] ?></h5>
                        <p>Product ID : <?= $row["product_id"] ?></p>
                        <p>Created by : <?= $row["created_by_user_name"] ?></p>
                        <p>Updated by : <?= $row["updated_by_user_name"] ?></p>
                        <p>Product Type : <?php 
                          $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                          echo $realtype;
                        ?></p>
                        
                        <form action="confirmdeleteproduct.php" method="POST">
                        <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Update</a>
                        <input type="hidden" name="id" value="<?= $row["product_id"]?>">
                        <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                        </form>
                      </div>
                    </div>  
              <?php    
                }
                ?>
                </div>
              <?php }
              else { ?>
                <!-- not found -->
                <p>No product found</p>
              <?php }
            } 
          ?>
        </div>

        
      </div>
      
      
    </div>

  </body>
</html>