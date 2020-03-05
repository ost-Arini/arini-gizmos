<?php
    //get buat ngambil dari url
    $id = $_GET['newid'];
    // echo $id;

    include ('connect.php');
    
    $command = "SELECT * FROM users WHERE user_id = $id";
    $result = $db->query($command);
    

?>

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
    <script src="js/formlogin.js"></script>

    <title>Registration Successful</title>
  </head>
  
  <body>
    <div class="container">
    <h2 class="text mt-5 text-center">Registration Successful</h2>

    <?php  if ($result->num_rows == 1) {
            // output data of each row
            // $hasildata = $result->fetch_assoc();
            // var_dump($hasildata);
            ?> <table> <?php 
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
            
            
                
            
             <?php } ?> </table> <?php
        } else {
            echo "NO RESULT";
        } ?>

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
                

                
                <button type="submit" onclick="validation()" class="btn btn-primary">Log in</button>
                <div id="error"><p id="messages" style="color:red"></p></div>
            </form>
            </div>
        
        
                
        
        </div>
  </body>
</html>