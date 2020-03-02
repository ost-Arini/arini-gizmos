<?php 

session_start();

include ('../connect.php');

// if(isset ($=GET['id'])){
//     if(isset($_POST["submit"])){
        
//     }
// }

//disini baru masukin ke database
if(isset($_POST["submit"])) {
    $errormsg = '';
    $product_name = $_POST['product_name'];
    $product_type = $_POST['product_type'];
    $name = $_POST['product_image'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['nickname'];
    $real_image= $_POST['image_real_name'];
    // $target_file = $target_dir  . basename($name);

    $query = "insert into products(product_name,product_image,product_type,created_by_user_id,created_by_user_name) values('$product_name','".$real_image."','$product_type','$user_id','".$user_name."')";
    // echo $query;
    mysqli_query($db,$query);
    //to return the id from last query, object oriented style
    //kalo procedural style > mysqli_insert_id(connection)
    $last_id = mysqli_insert_id($db);
    $target_dir = "../upload/".$last_id."/";
    //file_exists buat ngecek file/dirnya ada/ga
    if (!file_exists($target_dir)) {
        // By default, the mode is 0777 (widest possible access).
        //TRUE on success, FALSE on failure
        mkdir($target_dir, 0777, true);
    }

    //rename mirip sama move_uploaded_file
    rename('../'.$name, $target_dir.$real_image);


    //move_uploaded_file($name,$target_dir.$real_image);
    echo "<script>window.location.href='../uploadsuccessful.php?id=".$last_id."'</script>";
    
}
    
?>