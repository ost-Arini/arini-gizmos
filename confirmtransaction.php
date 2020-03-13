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
    

    <title>Transaction Confirmation Page</title>
  </head>
  <body>

    <?php 
    $date = $_POST['date'];
    $address = $_POST['address'];
    $memo = $_POST['memo'];
    $product_name = $_POST['product_name'];
    $qty = $_POST['qty'];
    // $target_file = "upload/".$row["product_id"]."/".$row["product_image"].""
    ?>

    <div class="container">
        <h2 class="text mt-5">Confirmation Page</h2>
        <form action="action/doNewTransaction.php" method="POST">
            <div class="form-group mt-5">
                <label for="date">Transaction Date</label><br>
                <input id="date" type="hidden" name="date" value="<?= $date ?>" class="form-control">
                <?= $date ?>
            </div>

            <div class="form-group mt-5">
                <label for="address">Address</label><br>
                <input id="address" type="hidden" name="address" value="<?= $address ?>" class="form-control">
                <?= $address ?>
            </div>

            <div class="form-group mt-5">
                <label for="memo">Memo</label><br>
                <input id="memo" type="hidden" name="memo" value="<?= $memo ?>" class="form-control">
                <?= $memo ?>
            </div>

            <div class="form-group mt-5">
                <table cellpadding="5">
                  <thead>
                    <tr>       
                      <th>Product Name</th>
                      <th>Image</th> 
                      <th>Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($product_name as $index=>$item){
                      $query = $db->query("SELECT * FROM `products` WHERE product_id=$item"); ?> 
                      <tr> 
                        <td><?php
                          while($row = $query->fetch_assoc()){ ?>
                            <!-- <input id="product_id" type="text" name="product_id[]" value="<?= $product_id[$index] ?>" class="form-control"> -->
                            <!-- <?= $row["product_id"] ?> -->
                            <input id="product_name" type="hidden" name="product_name[]" value="<?= $product_name[$index] ?>" class="form-control">
                            <?= $row["product_name"] ?>
                        </td>
                        <td>
                        <?php 
                        $target_file = "upload/".$row["product_id"]."/".$row["product_image"].""
                        ?>
                        <img src="<?=$target_file ?>" class="" style="width:100px;"></td>
                        <td>
                          <input type="hidden" class="form-control" id="qty" name="qty[]" value="<?= $qty[$index] ?>">
                          <?= $qty[$index] ?>
                        </td>
                      <?php }
                    } ?>    
                    </tr>
                  </tbody>
                </table>
                
            </div>


            <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
            <button type="button" name="cancel" class="btn btn-danger mb-5" onClick="cancelConfirm()">Go Back</button>
            <!-- bikin alert pake function js -->
            <script>
            function cancelConfirm(){
                var conf = confirm("Are you sure you want to go back? Your uploaded file will not be saved");
                if(conf == true) {
                    document.location.href = 'transaction_form.php';
                }
            }
            </script>
        </form>
    </div>

  </body>
</html>