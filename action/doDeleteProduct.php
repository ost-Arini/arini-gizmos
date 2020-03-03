<?php

session_start();

include ('../connect.php');

$id = $_POST['id'];
$query = $db->query("UPDATE `products` SET delete_flag = 1 WHERE `products`.`product_id` = $id");
//echo $query

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

echo "<script>window.location.href='../deleteProductSuccess.php'</script>";
?>
