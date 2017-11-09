<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Quiz Form</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/1-col-portfolio.css" rel="stylesheet">

</head>

  <body>
    <?php
    require_once("navbar.php");
    ?>

<center><h1>MidsFeed Sign In</h1></center>

<?php

if(isset($_POST['uname']) && $_POST['uname'] != '') {
  $file = fopen("usernames.csv","r");
  $uname = $_POST['uname'];
  $psw = $_POST['psw'];
  $unames = array();
  $pwd = array();
  while($line = fgetcsv($file,0,"|")) {
    array_push($unames, $line[0]);
    array_push($pwd, $line[1]);
  }
  $i = array_search($uname, $unames);
  if(strcmp($pwd[$i], $psw) == 0) {
    $expires = time() + 86400;
    setcookie("uname", $uname, $expires);
    echo $_COOKIE['uname'];
    //header('Location:./index.html');
  }
  else {
    echo "<div class='text-center'><div class='jumbotron'><h1 class='display-2'>Incorrect Password.</h1></div></div>";
  }

}
?>

<form method='post' action='?'>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" class="form-control" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" class="form-control" required>

    <br />
    <button type="submit" onclick="validate()" class="btn btn-primary">Login</button>

    </script>
    <br />
    <br />
    <div class="container" style="background-color:#f1f1f1">
      Don't have an account? <a href="./signUp.php">Register here</a>
      <span class="psw"><a href="https://www.youtube.com/watch?v=ADxGRbbNPJ4">Forgot password?</a></span>
    </div>
</body>
</html>
