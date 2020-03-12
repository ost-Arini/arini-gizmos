<?php

session_start();

$id = $_GET['id'];
// echo $id;
include ('connect.php');
include ('navbar.php');

$query = $db->query("SELECT * FROM `detail_transaction` WHERE product_id = $id");
echo $query;

?>