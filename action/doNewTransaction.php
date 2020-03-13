<?php 

session_start();

include ('../connect.php');

if(isset($_POST["submit"])){
    $date = $_POST['date'];
    $address = $_POST['address'];
    $memo = $_POST['memo'];
    $product_name = $_POST['product_name'];
    $qty = $_POST['qty'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['nickname'];
    $status = 1;

    $transaction = "insert into transaction (address,memo,transaction_date,status,created_by_user_id,created_by_user_name) values ('$address','$memo','$date','$status','$user_id','$user_name')";
    mysqli_query($db,$transaction);

    if($transaction){
        $id = mysqli_insert_id($db);
        for ($i=0;$i < count($product_name); $i++){
            $itemlist = $product_name[$i];
            $quantity = $qty[$i];
            $detail_transaction = "insert into detail_transaction (transaction_id,product_id,quantity,created_by_user_id,created_by_user_name) values ('$id','$itemlist','$quantity','$user_id','$user_name')";
            //echo $detail_transaction;
            mysqli_query($db,$detail_transaction);
        }
    }
    

    echo "<script>window.location.href='../success_transaction.php?id=".$id."'</script>";
}

?>