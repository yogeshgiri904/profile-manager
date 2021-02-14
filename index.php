<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radhey Industries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Radhey Industries</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
  include "conn.php";
  $loginAlert= false;
  $userExists= false;
  if($_POST)
  {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];


    $emailSql = "SELECT * FROM `login` WHERE `email` LIKE '$email'";
    $userSql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";

    $emailMatchResult = mysqli_query($conn, $emailSql);
    $userMatchResult = mysqli_query($conn, $userSql);

    $emailCheck = mysqli_num_rows($emailMatchResult);
    $UserCheck = mysqli_num_rows($userMatchResult);
    if($emailCheck >= 1)
    {
      echo '<div class="alert alert-danger" role="alert">
      Your email is already registered. <a href="login.php">Sign In</a> now?
      </div>';
    }
    else if($UserCheck >= 1)
    {
      echo '<div class="alert alert-danger" role="alert">';
      echo "'$username'";
      echo ' username not available. </div>';
    }
    else
    {
      $sql = "INSERT INTO `login` (`username`, `mobile`, `pass`, `email`, `date`) VALUES ('$username', '$mobile', '$pass', '$email', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if($result)
      {
        echo '<div class="alert alert-success" role="alert">
        Your account has been created successfully. <a href="login.php">Sign In</a> now?
        </div>';
        $loginAlert= true;
      }
    }

  }
  
?>

<div class="p-5" >  
  <h2>SIGN UP HERE</h2>  
  <br>  
<form method="POST">
<div class="form-row">
    <div class="form-group col-md-6">
      <label>Username</label>
      <input type="text" required name="username" class="form-control">
    </div>

    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="email" required name="email" class="form-control">
    </div>

    <div class="form-group col-md-6">
      <label>Mobile</label>
      <input type="number" required maxlength="10" name="mobile" class="form-control" >
    </div>

    <div class="form-group col-md-6">
      <label>Password</label>
      <input type="password" required name="pass" class="form-control">
    </div>
  </div>
  </br>
  <button type="submit" name='signup' class="btn btn-success">Sign Up</button>
</form>
<br>
<p>Already have an Account ?  <a href="login.php">Sign In</a></p>

</div>
</body>
</html>
