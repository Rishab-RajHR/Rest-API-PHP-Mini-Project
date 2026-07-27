<?php

include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$sql = "INSERT INTO employee (name, email, mobile) VALUES ('".$name."','".$email."','".$mobile."' )";
$result = mysqli_query($conn,$sql);

?>