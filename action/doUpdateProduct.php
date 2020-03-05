<?php

session_start();

include ('../connect.php');

if(isset($_POST["submit"])){
  
  $product_id=  $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_type = $_POST['product_type'];
 
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['nickname'];
  
  
  //$delfile = $target_dir_upd . basename($updfile);
  //$target_dir = "upload/temp/";
  //$target_file = $target_dir . basename($name);
  $product_id=  $_POST['product_id'];
  

  if(!isset($_POST["name"])){
    /// no new image

    $query ="update products set product_name='".$product_name."',product_type=$product_type,updated_by_user_id=$user_id,updated_by_user_name='".$user_name."' where product_id=$product_id";
    // echo $query;
    mysqli_query($db,$query); 

  } else {
      $name = $_POST['product_image'];
      $real_image= $_POST['image_real_name'];
      $updfile = $_POST['old_product_image'];
      $target_dir = "upload/temp/";
      $target_dir_upd = "../upload/delete/";
      $delfile = $target_dir_upd . basename($updfile);
      $target_file = $target_dir . basename($name);
      $oldlocation = "upload/".$product_id."/";
      $query ="update products set product_name='".$product_name."',product_image='".$real_image."',product_type=$product_type,updated_by_user_id=$user_id,updated_by_user_name='".$user_name."' where product_id=$product_id";
      // echo $query;
      mysqli_query($db,$query);
      copy('../'.$target_dir.$real_image,'../'.$oldlocation.$real_image);
      unlink($delfile);
  }

  
  
  // echo $delfile;
  // echo $target_dir.$real_image;
  // echo $oldlocation.$real_image;
  // $last_id = mysqli_insert_id($db);
  //echo $product_id;
  echo "<script>window.location.href='../updatesuccessful.php?id=".$product_id."'</script>";
}


?>

<!-- kalo updated at nya ga mau , pake
ALTER TABLE t1
  MODIFY COLUMN c1
  TIMESTAMP
  NULL -- the opposite is NOT NULL, which is implicitly set on timestamp columns
  DEFAULT NULL -- no default value for newly-inserted rows
  ON UPDATE CURRENT_TIMESTAMP; -->
