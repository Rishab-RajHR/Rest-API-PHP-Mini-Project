<?php 

include('connection.php');

$id = $_GET['editid'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$sql = "UPDATE employee  SET name='".$name."',email='".$email."',mobile='".$mobile."'  WHERE id=$id ";

$result = mysqli_query($conn,$sql);

if($result)
{
   echo 'done';
}
else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>