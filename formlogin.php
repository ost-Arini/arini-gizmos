<?php
session_start();
if(isset($_SESSION["login"])){
  echo "<script>window.location.href='home.php'</script>";
  exit;
}

//check remember


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="form-login.css">

    <script type="text/javascript" src="js/slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/formlogin.js"></script>

    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <h2 class="text-center">Login</h2>
      <form id="form" action="action/doLogin.php" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" id="username" name="username" class="form-control col-sm-12 " placeholder="Input Username">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Input Password">
        </div>

        <div class="form-group">
          <input type="checkbox" id="remember" name="remember">
          <label>Keep me signed in</label>
        </div>

        <a class="form-group" href="signup.php">Click here to Sign up</a>

        <br>
        <br>
       <?php
       if(isset($_GET["errormessage"])) {
            $notfound = $_GET['errormessage'];
            echo $notfound;
        }
       

       ?>
        <br>
        <br>
        <button type="submit" onclick="validation()" class="btn btn-primary">Log in</button>
        <div id="error"><p id="messages" style="color:red"></p></div>
      </form>
    </div>

  </body>
</html>