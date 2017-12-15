<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sign Up</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/1-col-portfolio.css" rel="stylesheet">
  <link rel="icon" href="http://midn.cs.usna.edu/~m193480/IT350/MidsFeed/img/logo.png">

</head>
<?php
require_once("navbar.php");
?>
  <body>

    <center><h1>MidsFeed Sign Up</h1></center>

    <form method='post' action='?' onsubmit="return validate();">

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Create Username" class="form-control" id = "cuname" name="cuname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Create Password" class="form-control" id = "cpsw" name="cpsw" required>

      <?php
      $cuname = $_POST['cuname'];
      $cpsw = $_POST['cpsw'];
      $list = array($cuname,$cpsw);
      ?>
      <br />
      <button type="submit" class="btn btn-primary">Sign up!</button>
      <br />
      <br />


      <?php
      if(isset($_POST['cuname']) && isset($_POST['cpsw'])){
        if($_POST['cuname'] != '' && $_POST['cpsw'] != '' ) {
          $file = fopen("usernames.csv","a");
          fputcsv($file,$list,'|');
          fclose($file);
          $name = $_POST['cuname'] . '.csv';
          $profile = $_POST['cuname'] . 'Profile.csv';
					$user = fopen($name,'x');
					$uProf = fopen($profile,'x');
          fclose($user);
          fclose($uProf);
          $expires = time() + 86400;
          setcookie("uname", $_POST['cuname'], $expires);

          header('Location:./index.php');
        }
      }
      ?>
      <div class="container" style="background-color:#f1f1f1">
        Already have an account?<a href="./signIn.php">Login here</a>

      </div>
    </form>
    <script type="text/javascript">
      function validate() {
        var sin = document.getElementById('cuname').value;
        var sout = document.getElementById('cpsw').value;
        var value = true;
        if(sin.includes("<") || sin.includes(">") || sin.includes("\'") || sin.includes("\"")) {
          document.getElementById('cuname').value = "";
          value = false;
        }
        if(sout.includes("<") || sout.includes(">") || sout.includes("\'") || sout.includes("\"")){
          document.getElementById('cpsw').value = "";
          value = false;
        }

        return value;

      }
    </script>
  </body>
  </html>
