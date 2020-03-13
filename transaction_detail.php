<?php

session_start();

$id = $_GET['id'];
// echo $id;
include ('connect.php');
include ('navbar.php');

$item_list = $db->query("SELECT a.product_id, transaction_id, quantity, product_name,product_image FROM detail_transaction a
JOIN products b ON a.product_id = b.product_id
WHERE transaction_id = $id");

//$query = "SELECT detail_transaction."

//echo ($query);

$query= $db->query("SELECT * FROM `transaction` WHERE transaction_id = $id");

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
    <h2 class="text mt-5 text-center">Transaction Successful</h2>
    <p class="text mt-5 text-center">Your Transaction Id is: <?= $id ?></p>
    
    <?php if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ ?>
            <div>
                <label for="date">Transaction Date</label>
                <?= $row["transaction_date"] ?>
            </div>
            <div>
                <label for="address">address</label>
                <?= $row["address"] ?>
            </div>
            <div>
                <label for="memo">memo</label>
                <?= $row["memo"] ?>
            </div>
            <div>
            <label for="status">status</label>
            <?php
            $realstatus = ($row["status"] == 1) ? 'On Process' : ($row["status"] == 2) ? 'Finished' : ($row["status"] == 3) ? 'Cancelled' : 'Loading...' ; 
            echo $realstatus;
            ?>
            </div>
        <?php }
    ?>

    <table cellpadding="5">
        <thead>
            <tr>       
                <th>Product Name</th>
                <th>Image</th> 
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            while($row = $item_list->fetch_assoc()){ ?>
                <tr>
                    <td><?= $row["product_name"] ?></td>
                    <td>
                    <?php 
                        $target_file = "upload/".$row["product_id"]."/".$row["product_image"]."" ?>
                        <img src="<?=$target_file ?>" class="" style="width:100px;">
                    </td>
                    <td><?= $row["quantity"] ?></td>
                </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    <form action="confirmdeleteproduct.php" method="POST">
        <a href="updateproduct.php?id=<?= $row["product_id"]?>" class="btn btn-primary">Edit</a>
        <input type="hidden" name="id" value="<?= $row["product_id"]?>">
        <input type="submit" name="submit" class="btn btn-warning" value="Cancel Order">
        <input type="submit" name="submit" class="btn btn-danger" value="Delete">
    </form>
  </div>

  </body>
</html>