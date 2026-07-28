<?php

include('connection.php');

$id = $_GET['editid'];

$sql = "SELECT * FROM employee WHERE id=$id";

$result = mysqli_query($conn,$sql);
$final = mysqli_fetch_assoc($result);

$output = array();

array_push($output,$final);

echo json_encode($output);

?>