<?php

include('connection.php');

$id =(int)$_GET['delid'];

$sql = "DELETE FROM employee WHERE id = $id";
$result = mysqli_query($conn,$sql);

?>