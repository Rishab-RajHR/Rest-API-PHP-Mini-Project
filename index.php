<?php 

if(isset($_GET['delid']))
{
     $id = $_GET['delid'];

     $ch = curl_init();
     curl_setopt($ch,CURLOPT_URL,'localhost://php/api/api/deleteapi.php?delid='.$id.'');
     curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
     $result=curl_exec($ch);

     echo $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Select Data Using API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Select Data Using API</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </thead>
    <tbody>

     <?php 
     
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/api/select-api.php');
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $result=curl_exec($ch);

       $final=json_decode($result);

       $i = 1;
       foreach($final as $data) 
       {

     ?>

      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data->name; ?></td>
        <td><?php echo $data->email; ?></td>
        <td><?php echo $data->mobile; ?></td>
        <td><a href="">Edit</a></td>
        <td><a href="index.php?delid=<?php echo $data->id; ?>">Delete</a></td>
      </tr>

      <?php $i++; } ?>
    </tbody>
  </table>
</div>

</body>
</html>
