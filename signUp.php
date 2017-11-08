<link type="text/css" rel="stylesheet" href="style.css">

    <center><h1>MidsFeed Sign Up</h1></center>

    <form method='post' action='?'>
    <div class="imgcontainer">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Create Username" name="cuname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Create Password" name="cpsw" required>

      <?php
      $cuname = $_POST['cuname'];
      $cpsw = $_POST['cpsw'];

      $list = array("$cuname,$cpsw");
      ?>

      <button type="submit" onclick="validate()">Sign up!</button>



      <?php
      if(isset($list)){
      $file = fopen("usernames.csv","a");

      fputcsv($file,$list);

      fclose($file);

      header('Location:./home.php');
    }

      ?>

      <input type="checkbox" checked="checked"> Remember me</div>
      <div class="container" style="background-color:#f1f1f1">
        Already have an account?<a href="./signIn.php">Login here</a>

      </div>
    </form>
