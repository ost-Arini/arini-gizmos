<?php 
session_start();

include ('../connect.php');

$login = $_POST['login'];
$urname = $_POST['username'];
$password = $_POST['password'];
$login_query = "SELECT * FROM `users` WHERE `nickname` = '$urname' AND `password` = '$password' AND deleted_flag=0";
$result = $db->query($login_query);
$_SESSION['username'] = $urname;



//echo $login_query;

if ($result->num_rows > 0) {
    //set session
    $_SESSION["login"] = true;
    
    while($row = $result->fetch_assoc())
    {   //ambil data dari database dan simpen ke session
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nickname'] = $row['nickname'];

    }

    $_SESSION['session_start'] = time();
    $_SESSION['session_expired'] = $_SESSION['session_start'] + 3600;
    // $_SESSION['session_expired'] = $_SESSION['LAST_ACTIVITY'] + 30;
    echo "<script>window.location.href='../home.php'</script>";
}else {
    echo "<script>window.location.href='../formlogin.php?errormessage=User not Found!'</script>";
}

?>


