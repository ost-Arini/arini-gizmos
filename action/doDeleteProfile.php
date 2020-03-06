<?php

session_start();

include ('../connect.php');

$id = $_POST['id'];
$query = $db->query("UPDATE `users` SET deleted_flag = 1 WHERE `user_id` = $id");

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

session_destroy();
echo "<script>window.location.href='../formlogin.php?errormessage=Profile Deleted!'</script>";
exit;

?>
