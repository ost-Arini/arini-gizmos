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
$id = $_SESSION['user_id'];
$login_query = "SELECT * FROM `users` WHERE `user_id` = $id";  
$result= $db->query($login_query);


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

    <title>Profile</title>
  </head>
  
  <body>
  

    <div class="container">
      <h2 class="text-center">Your Profile</h2>
        
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
              <form action="#" method="POST">
                <a href="updateprofile.php?id=<?= $id ?>" class="btn btn-primary">Update</a>
                <input type="hidden" name="id" value="<?= $row["user_id"]?>">
              </form>

              <form name="deleteprofile" action="action/doDeleteProfile.php" method="POST">
                <input type="hidden" name="id" value="<?= $row["user_id"]?>">
                <input type="submit" name="submit" class="btn btn-danger" onClick="deleteConfirm()" value="Delete">
                <script>
                document.getElementById('deleteprofile').addEventListener('click',function(event) {deleteconfirm(e);},false);
                function deleteConfirm(e){
                    var delconf = confirm("Are you sure you want to delete this item?");
                    if(delconf == true) {
                        document.location.href = "action/doDeleteProfile.php";
                    } else {
                      event.preventDefault();
                    }
                }
                </script>
              </form>
              </td>
            </tr>
            
        </table>
         <?php } ?> 

      
    </div>
  </body>
</html>