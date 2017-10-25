<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Quiz Form</title>

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

</head>

  <body>


  <form method="POST" action="quiz.php">
    <?php
    session_start();
    if(!isset($_SESSION['i'])) {
      $_SESSION['i'] = 0;
    }else {
      $_SESSION['i'] = $_SESSION['i'] + 1;
    }
    $i = $_SESSION['i'] + 1;
    if(!($_SESSION['i']>9)) {
    echo "<div class = 'container'><table> <tr><td>";
    echo "Question $i:</td><td><input type='text' name = 'questions[{$_SESSION['i']}]['question']' maxlength ='140' /></td></tr>";
    for($j=0;$j<4;$j++) {
      $n = $j + 1;
      echo "<tr><td>Option $n: </td><td><input type='text' name = 'questions[{$_SESSION['i']}]['options']' maxlength ='50' /></td></tr>";
    }

      echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Question Submit' /></td></tr></table></div>";
    }

     ?>
     <br />
     <br />
  </form>
  <form method ="POST" action="quiz.php">
  <?php
  echo "<div class = 'container'><table>";
  for($j=0;$j<4;$j++) {
    $n = $j + 1;
    echo "<tr><td>Final Answer $n: </td><td><input type='text' name = 'answers[]' maxlength ='50' /></td></tr>";
  }
  echo "<input type='hidden' value = '$_POST' />";
  echo "<tr><td><input type='submit' class='btn btn-default' value='Final Submit' /></td></tr></table></div>"; ?>
  </form>

  </body>
</html>
