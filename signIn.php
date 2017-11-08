<link type="text/css" rel="stylesheet" href="style.css">

<center><h1>MidsFeed Sign In</h1></center>

<form method='post' action='?'>
  <div class="imgcontainer">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <?php
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    ?>

    <button type="submit" onclick="validate()">Login</button>

    <script type="text/javascript">

    if(<?php $psw != "" && $uname != ""?>){
      window.location.href = "./home.php";
    }
    else{

    }
    </script>

    <input type="checkbox" checked="checked"> Remember me</div>
    <div class="container" style="background-color:#f1f1f1">
      Don't have an account? <a href="./signUp.php">Register here</a>
      <span class="psw"><a href="https://www.youtube.com/watch?v=ADxGRbbNPJ4">Forgot password?</a></span>
    </div>
