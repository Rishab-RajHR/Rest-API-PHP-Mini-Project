<?php

include ('connection.php');

$work = $_GET['work'];

if(isset($_GET['token']))
{
      $token = $_GET['token'];

      $findtoken = "SELECT * FROM apitoken WHERE token='".$token."'";
      $result = mysqli_query($conn, $findtoken);
      $countresult = mysqli_num_rows($result);

      echo $countresult;
}

if($work == 'select')
{

     if($countresult > 0) {
     $sql = "SELECT * FROM employee";
     $result = mysqli_query($conn,$sql);

     $output = array();

     while($data=mysqli_fetch_assoc($result))
     {
         $finaldata = array(
            'id'=>$data['id'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'mobile'=>$data['mobile'],
         );

         array_push($output,$finaldata);
     }
     echo json_encode($output);
    }
    else
    {
         echo 'error';
    }
}

else if($work=='insert')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO employee (name,email,mobile) VALUES ('".$name."','".$email."', '".$mobile."')";
    $result = mysqli_query($conn, $sql);
}
else if($work=='delete')
{
     if($countresult > 0)
    {
     $id = $_GET['delid'];

     $sql = "DELETE FROM employee WHERE id=$id";
     $result = mysqli_query($conn,$sql);
    }
    else 
    {
         echo 'error';
    }
}
else if($work=='selectbyid')
{
      $id=$_GET['editid'];

      $sql = "SELECT * FROM employee WHERE id=$id";

      $result = mysqli_query($conn, $sql);

      $final = mysqli_fetch_assoc($result);

      $output = array();

      array_push($output,$final);

      echo json_encode($output);
}
else if($work=='update')
{
     $id = $_GET['editid'];

     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];

     $sql = "UPDATE employee 
     SET name='$name',
         email='$email',
         mobile='$mobile'   
     WHERE id='$id'";

      if(mysqli_query($conn, $sql)) {
      }
      else {
         echo mysqli_error($conn);
      }
}

?>