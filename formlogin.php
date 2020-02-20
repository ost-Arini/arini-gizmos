<!doctype php>
<php lang="en">
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
      <form id="form" action="" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" id="username" name="username" class="form-control col-sm-12 " placeholder="Input Username">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Input Password">
        </div>
        

        
        <button type="submit" onclick="validation()" class="btn btn-primary">Log in</button>
        <div id="error"><p id="messages" style="color:red"></p></div>
      </form>
    </div>

  </body>
</php>