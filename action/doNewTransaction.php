<?php 

session_start();

include ('../connect.php');

if(isset($_POST["submit"])){
    $date = $_POST['date'];
    $address = $_POST['address'];
    $memo = $_POST['memo'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['nickname'];

    $transaction = "insert into transaction (address,memo,transaction_date,created_by_user_id,created_by_user_name) values ('$address','$memo','$date','$user_id','$user_name')";
    $detail_transaction = "insert into detail_transaction (product_id,quantity,created_by_user_id,created_by_user_name) values ('$product_id','$qty','$user_id','$user_name')";

    echo $transaction;
    echo $detail_transaction;

    mysqli_query($db,$transaction);
    mysqli_query($db,$detail_transaction);

    $last_id = mysqli_insert_id($db);

    //echo "<script>window.location.href='../success_transaction.php?id=".$last_id."'</script>";
}

?>