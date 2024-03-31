<?php

include('connection.php');
$stmt=$conn->prepare("SELECT * FROM products WHERE product_category='perfumes' LIMIT 4");

$stmt->execute();

$perfumes=$stmt->get_result(); //array
?>