<?php

session_start();
include 'db.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['login'])){
  $name = $_POST['name'];
  $password = $_POST['pass'];

  $query = mysqli_query($conn,"SELECT * FROM user WHERE name='$name' AND password = '$password'");
  $row = mysqli_fetch_array($query,MYSQLI_ASSOC);


  if ($query) {
    $_SESSION['user'] = $row['id'];
		header("Location: home.php");
  }else{
    echo "<script>alert('Wrong Details')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Like And Unlike System in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <div class="w3-bar w3-blue w3-center">
      <h1>Like & Unlike system</h1>
    </div>
<div class="w3-container ">
<h3>Login Below</h3>
<form action="" method="POST">

<input type= "text" class="w3-input" name="name" placeholder="name" required  /><br>

<input type= "password" class="w3-input" name="pass" placeholder="Password" required /><br>
<input type= "submit" class="w3-btn w3-blue" name="login" value="Login" />
</form>
<div class="w3-container">
<h5><b>  Name </b>: hacker</h5>
<h5>  <b>Password</b> : 123</h5><br>
<h5><b>  Name </b>: rahul</h5>
<h5>  <b>Password</b> : 123</h5>
</div>
</div>
</body>
</html>
