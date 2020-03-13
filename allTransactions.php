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

    <title>All Transactions</title>
  </head>

  <body>
    <div class="container">
    <h2 class="text-center">All Transactions</h2>
        <br>
        <h4 class="text-center">All transactions submitted by you and other users</h4>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <?php 
        $list = $db->query("SELECT * FROM `transaction` WHERE delete_flag = 0");
        if($list->num_rows > 0){
            while($row = $list->fetch_assoc()){ ?>
                <table cellpadding='20'>
                    <thead>
                        <th>ID</th>
                        <th>Transaction Date</th>
                        <th>Address</th>
                        <th>Memo</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $row['transaction_id'] ?></td>
                            <td><?php 
                            $orgDate = $row['transaction_date'];
                            $newDate = date("d F Y", strtotime($orgDate));
                            echo $newDate; ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['memo'] ?></td>
                            <td><?= $row['created_by_user_name'] ?></td>
                            <td><?php
                            $realstatus = ($row["status"] == 1) ? 'On Process' : ($row["status"] == 2) ? 'Finished' : ($row["status"] == 3) ? 'Cancelled' : 'Loading...' ; 
                            echo $realstatus;
                            ?></td>
                            <td><a class="btn btn-info" id="update" href="transaction_detail.php?id=<?= $row['transaction_id'] ?>">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            <?php }
        }
        ?>
    </div>
  </body>
</html>