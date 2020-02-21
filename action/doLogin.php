<?php 

include ('../connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$login_query = "SELECT * FROM `users` WHERE `nickname` = '$username' AND `password` = '$password'";
$result = $db->query($login_query);
//echo $login_query;

if ($result->num_rows > 0) {
    echo "<script>window.location.href='../home.php'</script>";
}else {
    echo "<script>window.location.href='../formlogin.php?errormessage=User not Found'</script>";
}

?>