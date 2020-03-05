<?php


session_start();
//include itu cuma buat global constant
include ('connect.php');
include ('navbar.php');

// $timeout_duration = 60;
// if(isset($_SESSION))
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
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Profile</title>
  </head>
  
  <body>
  

    <div class="content">
      <h2 class="text-center">Your Profile</h2>
      <table class="text-center">
        <?php 
            $id = $_SESSION['user_id'];
            $login_query = "SELECT * FROM `users` WHERE `user_id` = $id";  
            $result= $db->query($login_query);
        ?><table> <?php 
        while($row = $result->fetch_assoc()) {
            // echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["email"]. "<br>";
            ?>  
            <tr>
                <td>Name</td>
                <td><?= $row["user_name"] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $row["email"] ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $row["nickname"] ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php 
                    //ternary operator = shorthand if else
                    $realgender = $row["gender"] == 1 ? 'Male' : 'Female';
                    echo $realgender;
                
                // $row["gender"] 
                
                ?></td>
            </tr>
        
        
            
        
         <?php } ?> </table>
      </table>
    </div>
  </body>
</html>