<?php

session_start();

include ('../connect.php');

$user_id = $_SESSION['user_id'];

// echo $query;

if(isset($_POST["submitupdateprofile"])){
    $user_name=  $_POST['user_name'];
    $email=  $_POST['email'];
    $user_nickname=  $_POST['user_nickname'];
    $password=  $_POST['password'];
    $gender=  $_POST['gender'];

    $query ="update users set user_name='".$user_name."',email='".$email."',nickname='".$user_nickname."',password='".$password."',gender=$gender where user_id=$user_id";
    //echo $query;
    mysqli_query($db,$query);

    echo "<script>window.location.href='../successUpdateProfile.php?id=".$user_id."'</script>";
}

?>
