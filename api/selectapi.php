<?php 

include('connection.php');

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn,$sql);

$output = array();

while($data=mysqli_fetch_assoc($result))
{
    $finaldata = array(
       'id'=>$data['id'],
       'name'=>$data['name'],
       'email'=>$data['email'],
       'mobile'=>$data['mobile']
    );

    array_push($output,$finaldata);
}

echo json_encode($output);

?>