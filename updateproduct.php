<?php


session_start();

include ('connect.php');
include ('navbar.php');

$id = $_GET['id'];
// echo $id;
$query = $db->query("SELECT * FROM `products` WHERE product_id = $id ");

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

    <title>Update Product</title>
  </head>
  <body>

  
    <div class="container">
      <h2 class="text mt-5">Update Product</h2>
      <div id="error"><p id="messages" style="color:red"></p></div>
      <?php
      //cek ada di database apa nggak 
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $imagesource = 'upload/'.$row["product_image"];
      ?>
          <form id="form" action="confirmupdate.php" method="POST" enctype="multipart/form-data">
          <div class="form-group mt-5">
              <label for="product_name">Product Name</label>
              <input id="product_name" type="type" name="product_name" class="form-control" value="<?= $row["product_name"] ?>">
              <!-- buat lempar ID ke confirm page -->
              <input type="hidden" name="product_id" value="<?= $id ?>">
          </div>

          <div class="form-group mt-5">
            <label for="product_image">Product Image : </label>
            <img src="<?php echo $imagesource; ?>" alt="" />
            <input id="product_image" type="file" name="product_image" class="form-control">
            <input id="old_product_image" type="hidden" name="old_product_image" value="<?= $row["product_image"] ?>">
          </div>
        
          <div class="form-group mt-5">
            <label for="product_type">Product Type</label>
            <select id="product_type" name="product_type" class="form-control" value="<?= $row["product_type"] ?>">
              <option value="0">Change Type</option>
              <option value="1"<?php echo ( $row["product_type"]=='1')?'selected':'' ?>>New</option>
              <option value="2"<?php echo ( $row["product_type"]=='2')?'selected':'' ?>>Used</option>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
          <button type="reset" class="btn btn-danger mb-5">Reset</button>

        </form>
        
      <?php  
        
      }
      }?>


    </div>          
  </body>
</html>