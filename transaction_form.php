<?php


session_start();

include ('connect.php');
include ('navbar.php');

// $id = $_GET['id'];
$query = $db->query("SELECT * FROM `products` WHERE delete_flag=0");

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
    <link href="css/select2.min.css" rel="stylesheet" />
    <script src="js/select2.min.js"></script>
    
    <title>Transaction Form</title>
  </head>

  <body>
    <div class="container" name="form">
        <h2 class="text mt-5">Transaction Form</h2>
        <div id="error"><p id="messages" style="color:red"></p></div>
        
        <form action="" method="POST">
            <div class="form-group mt-5">
                <label for="date">Transaction Date</label>
                <input id="date" type="date" name="date" class="form-control">
            </div>
            <div class="form-group mt-5">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group mt-5">
                <label for="memo">Memo</label>
                <textarea class="form-control" id="memo" name="memo"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
            <button type="reset" class="btn btn-danger mb-5">Reset</button>
        </form>
    </div>  

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <div class="container" name="item_list">
        <h2 class="text mt-5">Item List</h2>
        
        <form action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="js-example-basic-single" name="product_name" value="<?= $row["product_name"] ?>">
                        <?php while($row = $query->fetch_assoc()){?>
                                <option value=""><?= $row["product_name"] ?></option>
                        <?php } ?>
                        </select>
                    </td>
                    <td><input id="qty" type="text" name="qty" class="form-control" size="5px"></td>
                    <td>delete</td>
                </tr>
            <!-- <div class="form-group mt-5">
                <label for="product_name">Product Name</label>
                
            </div>
            <div class="form-group mt-5">
                <label for="qty">Qty</label>
                <input id="qty" type="text" name="qty" class="form-control">
            </div> -->
            </table>
        </form>
    </div>

  </body>
</html>