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
<?php
require_once("navbar.php");
?>
  <body>
    <script type="text/javascript">
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i+skraso,lol+) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }skraso,lol
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return null;
    }
    </script>
    <center><h1>MidsFeed Sign Up</h1></center>

    <form method='post' action='?'>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Create Username" class="form-control" name="cuname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Create Password" class="form-control" name="cpsw" required>

      <?php
      $cuname = $_POST['cuname'];
      $cpsw = $_POST['cpsw'];
      $list = array($cuname,$cpsw);
      ?>
      <br />
      <button type="submit" class="btn btn-primary" onclick="validate()">Sign up!</button>
      <br />
      <br />


      <?php
      if(isset($_POST['cuname']) && isset($_POST['cpsw'])){
        if($_POST['cuname'] != '' && $_POST['cpsw'] != '' ) {
          $file = fopen("usernames.csv","a");
          fputcsv($file,$list,'|');
          fclose($file);
          $name = $_POST['cuname'] . '.csv';
          $user = fopen($name,'x');
          fclose($user);
          echo "<script type='text/javascript'>setCookie('uname',{$_POST['cuname']}, 9000);</script>";
          header('Location:./index.html');
        }
      }
      ?>
      <div class="container" style="background-color:#f1f1f1">
        Already have an account?<a href="./signIn.php">Login here</a>

      </div>
    </form>
  </body>
  </html>
