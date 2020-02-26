<?php 



include ('../connect.php');




// insert to database 

//harus click submit
if(isset($_POST["submit"])) {
    //validation in PHP
    $name = $_POST['name'];
    $email = $_POST['email'];
    $urname = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
    //validation check

    //lewat validasi 
    //kalo masuk database
    //$db->query == execute query dari $db->query($command)
    $command = "insert into users (user_name,email,nickname,password,gender)
    VALUES ('$name','$email','$urname','$password','$gender')";
    if ($db->query($command) === TRUE) {
        echo "New record created successfully";
        $last_id = $db->insert_id;
                // pass id to url for success.php
        echo "<script>window.location.href='../success.php?newid=".$last_id."'</script>";
        echo $name.$email.$urname.$password.$gender;
    } else {
        echo 'エラー発生！';
        echo "Error: " . $query . "<br>" . $db->error;
    }
            
} 
    //kalo tombol submit ga diklik, langsung ke link doRegister
else {
    // 改ざん不正解アクセス予防
    echo "<script> alert('you can\'t access this page');</script>";
    echo "you cant access this page!";
}
//redirect to login page

?>