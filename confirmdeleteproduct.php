<?php

session_start();

// $id = $_GET['id'];
// echo $id;
include ('connect.php');
include ('navbar.php');

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

$id = $_POST['id'];
$query = $db->query("SELECT * FROM `products` WHERE product_id = $id");
// echo $query;

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

    <title>Delete Product</title>
  </head>

  <body>   

    <div class="content">
      <h2 class="text-center">Delete Product</h2>
      <p class="text-center">Are you sure you want to delete this item? You can just update by clicking the Update button below.</p>
    </div>

    <?php
      //cek ada di database apa nggak 
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imagesource = 'upload/'.$row["product_id"].'/'.$row["product_image"];
        ?>
        <div>
        
          <img src="<?php echo $imagesource; ?>" alt="" width="500">
          <div>
            <p>Product Name : <?= $row["product_name"] ?></p>
            <p>Product Type : <?php 
                  $realtype = $row["product_type"] == 1 ? 'New' : 'Used';
                  echo $realtype; ?></p>
            <!-- <a href="yourproducts.php" class="btn btn-primary">Update</a> -->
            <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Update</a>
            <form name="deleteproduct" action="action/doDeleteProduct.php" method="POST">
              <input type="hidden" name="id" value="<?= $row["product_id"]?>">
              <input type="submit" name="submit" class="btn btn-danger" onClick="deleteConfirm()" value="Delete">
              <script>
              document.getElementById('deleteproduct').addEventListener('click',function(event) {deleteconfirm(e);},false);
              function deleteConfirm(e){
                  var delconf = confirm("Are you sure you want to delete this item?");
                  if(delconf == true) {
                      document.location.href = "action/doDeleteProduct.php";
                  } else {
                    event.preventDefault();
                  }
              }
              </script>
            </form>
            
            <!-- <button class="btn btn-danger" onClick="deleteConfirm()">Delete</button>

            <script>
            function deleteConfirm(){
                var delconf = confirm("Are you sure you want to delete this item?");
                if(delconf == true) {
                    document.location.href = "action/doDeleteProduct.php?id=<?= $row["product_id"]?>";
                }
            }
            </script> -->
          </div>
        <?php      
        }
      } ?>
      
      <br>
      

  </body>
  </html>