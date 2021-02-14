<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="5;URL=login.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting...</title>
</head>
<body>
<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<h2>You have been logged out !!!</h2>";
    echo '<br><br>Redirecting to <a href="login.php"> Sign In </a> page';
    echo '<div id="count">5 seconds remaining... </div>';

?>

<script>
var timeleft = 4;
var timer = setInterval(function(){
  if(timeleft > 0){
    document.getElementById("count").innerHTML = timeleft + " seconds remaining... ";
  } 
  else {
    document.getElementById("count").innerHTML = "0";
  }
  timeleft -= 1;
}, 1000);

</script>
</body>
</html>
