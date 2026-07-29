<?php

if(!isset($_GET['editid'])) {
   die("Invalid request.");
}

$id=$_GET['editid'];

$ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,
     'http://localhost/api/api/selectapibyid.php?editid='.$id.'&&work=selectbyid');
     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
     $result=curl_exec($ch);

$data = json_decode($result);

if (empty($data) || !isset($data[0])) {
    die("Record not found");
}

if(isset($_POST['submit']))
{
    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'mobile'=>$_POST['mobile']
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,'http://localhost/api/api/updateapi.php?editid='.$id.'&&work=update');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);

    if($result==1)
    {
       header('Location:index.php');
       exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Data Using API</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Data Using API</h2>
  <form method="POST">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $data[0]->name; ?>">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $data[0]->email; ?>">
    </div>

    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?php echo $data[0]->mobile; ?>">
    </div>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body> 
</html>
