<?php

session_start();

$id = $_GET['id'];
// echo $id;
include ('connect.php');
include ('navbar.php');

$user_id = $_SESSION['user_id'];


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
$show = "SELECT * FROM `users` WHERE `user_id`=$id";
$result = $db->query($show);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/formlogin.css">

    <title>Update Successful</title>
  </head>
  <body>

 

    <div class="container">
        <h2 class="text mt-5 text-center">Update Successful</h2>
        <table> <?php 
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
                
                
                ?></td>
            </tr>
            <tr>
              <td>
              <!-- <form action="#" method="POST">
                <a href="updateprofile.php?id=<?= $id ?>" class="btn btn-primary">Update</a>
                <input type="hidden" name="id" value="<?= $row["user_id"]?>">
              </form> -->
              </td>
            </tr>
            
        </table>
         <?php } ?> 
    </div>

    
</html>