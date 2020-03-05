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
    

    <title>Product Update Confirmation</title>
  </head>
  <body>

<?php
//tampilin data dari submitnew, pake form yang di hidden, belum ada hubungannya sama database
    $updfile = $_POST['old_product_image'];
    $target_dir_upd = "upload/delete/";
    if(!file_exists($target_dir_upd)){
      mkdir($target_dir_upd, 0777, true);
      // chmod($target_dir_upd, 777);
    }
    $product_id=  $_POST['product_id'];
    $oldlocation = "upload/".$product_id."/";
    $delfile = $target_dir_upd .basename($updfile);
    // echo basename($updfile);
    //copy(from_file, to_file, context)
    //copy('upload/114/4.jpg','upload/delete/4.jpg');
    copy($oldlocation.$updfile,$target_dir_upd.$updfile);

    $product_name = $_POST['product_name'];
    $product_type = $_POST['product_type'];
    $name = $_FILES['product_image']['name'];
    //karena masih confirmation page jadi ditaronya di folder temp
    $target_dir = "upload/temp/";
    $target_file = $target_dir  . basename($name);

    move_uploaded_file($_FILES['product_image']['tmp_name'],$target_dir.$name);
?>

    <!-- di confirmation page ini juga pake form, cuma di hidden -->
    <div class="container">
      <h2 class="text mt-5">Product Update Confirmation</h2>
      <form id="form" action="action/doUpdateProduct.php" method="POST" enctype="multipart/form-data">

      <div class="form-group mt-5">
          <label for="product_name">New Product Name</label>
          <input id="product_name" type="hidden" name="product_name" value="<?= $product_name ?>" class="form-control">
          <?= $product_name ?>
          <input type="text" name="product_id" value="<?= $product_id ?>">
        </div>

        <div class="form-group mt-5">
          <label for="product_image">New Product Image</label>
          <!-- ini style di hidden!-->
          <?php if($name == '') { ?>
            <img src="<?=$oldlocation ?><?= $updfile ?>" alt="">
          <?php } 
          else {
            ?>
            <input id="product_image" type="hidden" value="<?= $target_file ?>" name="product_image" class="form-control">
            <input id="product_image"  type="hidden" value="<?= $name ?>" name="image_real_name" class="form-control">
            <input id="product_image" type="hidden" value="<?= $updfile ?>" name="old_product_image" class="form-control">
            <img src="<?=$target_file ?>" alt="">
          <?php 
          }
          ?>

          <!-- <input id="product_image" type="hidden" value="<?= $target_file ?>" name="product_image" class="form-control">
          <input id="product_image" type="hidden" value="<?= $updfile ?>" name="old_product_image" class="form-control">
          <input id="product_image"  type="hidden" value="<?= $name ?>" name="image_real_name" class="form-control">
          <img src="<?=$target_file ?>" alt=""> -->
        </div>

        <div class="form-group mt-5">
          <label for="product_type">New Product Type :</label>
          <input name="product_type" type="hidden" value="<?= $product_type ?>">
          <?php $realtype = $product_type == 1 ? 'New' : 'Used';
            echo $realtype; ?>
        </div>

        <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
        <button type="button" name="cancel" class="btn btn-danger mb-5" onClick="cancelConfirm()">Go Back</button>
        <!-- bikin alert pake function js -->
        <script>
        function cancelConfirm(){
            var conf = confirm("Are you sure you want to go back? Your uploaded file will not be saved");
            if(conf == true) {
                document.location.href = 'yourproducts.php';
            }
        }
        </script>

        <!-- <button type="reset" class="btn btn-danger mb-5">Reset</button> -->

      </form>
    </div>

    
  </body>
</html>