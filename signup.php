<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/signup.js"></script>

    <title>Sign Up</title>
  </head>
  <body>
    <div class="container">
      <h2 class="text mt-5">Registration</h2>

      <div id="error"><p id="messages" style="color:red"></p></div>
      <form id="form" action="action/doRegister.php" method="POST">
        <div class="form-group mt-5">
          <label for="name">Name</label>
          <input id="name" type="text" name="name" class="form-control " placeholder="Input Name">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" class="form-control col-sm-12 " placeholder="Input Email">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" class="form-control col-sm-12 " placeholder="Input Username">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" class="form-control" placeholder="Input Password">
        </div>

        <!-- <div class="form-group">
          <label>Birth Date</label>
          <input type="date" name="birthDate" class="form-control">
        </div> -->

        <div class="form-group">
          <label>Gender</label> <br>
          <div class="form-check-inline">
            <input type="radio" value="1" class="form-check-input" id="gender" name="gender">
            <label>Male</label>
            
            <input type="radio" value="2" class="form-check-input" id="gender" name="gender">
            <label>Female</label>
          </div>
<!-- 
          <div class="form-check-inline">
            <input type="radio" value="2" class="form-check-input" id="gender" name="gender">
            <label>Female</label>
          </div> -->
         
        </div>

        <!-- <div class="form-group">
          <label>Payment Method</label>
         <select class="form-control">
           <option>Credit Card</option>
           <option>Convinience Store</option>
           <option>Cash on Delivery</option>
         </select>
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea class="form-control"></textarea>
        </div>

        <div class="form-group">
          <label>Upload Document</label>
          <input type="file" class="form-control-file" name="uploadDocument">
          <small>Maximum 2MB File</small>
        </div>
 -->

        <a href="formlogin.php">Have an account? Click here to Log in</a> <br>
        <br>
        <button type="submit" name="submit" onclick="validate()" class="btn btn-primary mb-5">Sign Up</button>
        <button type="reset" class="btn btn-danger mb-5">Reset</button>
      </form>
    </div>
  </body>
</html>