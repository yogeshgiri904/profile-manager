<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radhey Industries - Sign In</title>
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
    if($_POST)
    {
      include 'conn.php';
      $login = false;
      $username = $_POST["username"];
      $pass = $_POST["pass"];

      $sql = "SELECT * FROM `login` WHERE `username` LIKE '$username' AND `pass` LIKE '$pass'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $check = mysqli_num_rows($result);
      if($check >= 1)
      {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pass'] = $row['pass'];
        header("location: home.php");
      }
      else
      {
        echo '<div class="alert alert-danger" role="alert">
        INVALID CREDANTIALS!!!
        </div>';
      }
    }
  ?>


<div class="p-5">
  <h2 class="text-center">SIGN IN HERE</h2>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputusername1" class="form-label">Username</label>
    <input type="username" class="form-control" required name="username" id="exampleInputusername1" aria-describedby="usernameHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Password</label>
    <input type="password" name="pass" required class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Sign In</button>
</form>

<br>
<p>Create a new Account for free ? <a href="index.php">Sign Up</a></p>
</div>
</body>
</html>