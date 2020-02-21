<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
// Create connection
$db = new mysqli($servername, $username, $password, $database);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
//echo "Connected successfully sudah masuk gan";


// $mysqli = new mysqli("localhost","root","","test");

// // Check connection
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   exit();
// } else {
//     echo "connected!";
// }
?>