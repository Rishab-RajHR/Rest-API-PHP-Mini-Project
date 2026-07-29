<?php

if(isset($_POST['submit']))
{
    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'mobile'=>$_POST['mobile']
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,'http://localhost/api/api/request.php?work=insert');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result=curl_exec($ch);

    echo $result;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Data Using API</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Insert Data Using API</h2>
  <form method="POST">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>

    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile">
    </div>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body> 
</html>
