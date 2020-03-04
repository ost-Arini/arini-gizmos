<?php

session_start();

include ('../connect.php');

if(isset($_POST["submit"])){
  $product_id=  $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_type = $_POST['product_type'];
  $name = $_POST['product_image'];
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['nickname'];
  $real_image= $_POST['image_real_name'];
  $target_dir_upd = "../upload/delete/";
  $updfile = $_POST['old_product_image'];
  $delfile = $target_dir_upd . basename($updfile);

  $query ="update products set product_name='".$product_name."',product_image='".$real_image."',product_type=$product_type,updated_by_user_id=$user_id,updated_by_user_name='".$user_name."' where product_id=$product_id";
  // echo $query;
  mysqli_query($db,$query);

  unlink($delfile);
  // echo $delfile;

  echo "hore";
}


?>

<!-- kalo updated at nya ga mau , pake
ALTER TABLE t1
  MODIFY COLUMN c1
  TIMESTAMP
  NULL -- the opposite is NOT NULL, which is implicitly set on timestamp columns
  DEFAULT NULL -- no default value for newly-inserted rows
  ON UPDATE CURRENT_TIMESTAMP; -->
