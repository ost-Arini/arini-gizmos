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
$query = $db->query("SELECT * FROM `users` WHERE `user_id` = $id"); 



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script type="text/javascript" src="js/submitnew.js"></script>

    <title>Update Profile</title>
  </head>
  <body>

    <div class="container">
        <h2 class="text mt-5">Update Profile</h2>
        <?php 
        if($query->num_rows > 0) {
            while($row = $query->fetch_assoc()){ ?>
                <form id="form" action="action/doUpdateProfile.php" method="POST">
                    <div class="form-group mt-5">
                        <label for="user_name">Name</label>
                        <input id="user_name" type="type" name="user_name" class="form-control" value="<?= $row["user_name"] ?>">
                        <!-- buat lempar ID ke confirm page -->
                        <input type="hidden" name="user_id" value="<?= $id ?>">
                    </div>

                    <div class="form-group mt-5">
                        <label for="email">Email</label>
                        <input id="email" type="type" name="email" class="form-control" value="<?= $row["email"] ?>">
                    </div>

                    <div class="form-group mt-5">
                        <label for="user_nickname">Username</label>
                        <input id="user_nickname" type="type" name="user_nickname" class="form-control" value="<?= $row["nickname"] ?>">
                    </div>

                    <div class="form-group mt-5">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-control" value="<?= $row["password"] ?>">
                    </div>

                    <div class="form-group">
                        <label>Gender</label> <br>
                        <div class="form-check-inline">
                            <input type="radio" value="1"<?php echo ( $row["gender"]=='1')?'checked':'' ?> class="form-check-input" id="gender" name="gender">
                            <label>Male</label>
                            
                            <input type="radio" value="2"<?php echo ( $row["gender"]=='2')?'checked':'' ?> class="form-check-input" id="gender" name="gender">
                            <label>Female</label>
                        </div>
                    </div>

                    <button type="submit" name="submitupdateprofile" class="btn btn-primary mb-5">Submit</button>
                    <button type="reset" class="btn btn-danger mb-5">Reset</button>
                </form>
           <?php
            }
        }
        ?>
    </div>


  </body>
</html>