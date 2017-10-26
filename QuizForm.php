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
    <?php require_once("navbar.php"); ?>

<!-- save to file -->
  <form method="POST" action="?">
    <?php
    session_start();

    if(!isset($_SESSION['i'])) {
      $_SESSION['i'] = 0;
      echo "<div class = 'container'><table> <tr><td>";
      echo "What is your quiz named? </td><td><input type = 'text' name ='name' maxlength='140' /> </td></tr>";
      for($j=0;$j<4;$j++) {
        $n = $j + 1;
        echo "<tr><td>Final Answer $n: </td><td><input type='text' name = 'answer[$j]' maxlength ='50' /></td></tr>";
      }
      echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Name Submit' /></td></tr></table></div>";
    }else {
      if($_SESSION['i'] >= 10 || isset($_POST['done'])) {
        exit();
      }
      if(!isset($_SESSION['name'])) {
        $_SESSION['name'] = $_POST['name'];
        $name = $_SESSION['name'] . '.csv';
        $out = fopen($name,'x');
        fputcsv($out,array($_SESSION['name'],$_POST['answer'][0],$_POST['answer'][1],$_POST['answer'][2],$_POST['answer'][3]), '|');
        fclose($out);
      } else {
        $name = $_SESSION['name'] . '.csv';
        $out = fopen($name,'a');
      }
      if($_SESSION['i'] != 0) {
        $index = $_SESSION['i'] - 1;
        $array = array($_POST['questions'][$index]['question']);
        array_push($array, $_POST['questions'][$index]['option'][0]);
        array_push($array, $_POST['questions'][$index]['option'][1]);
        array_push($array, $_POST['questions'][$index]['option'][2]);
        array_push($array, $_POST['questions'][$index]['option'][3]);
        fputcsv($out, $array, '|');

        fclose($out);
      }
      $i = $_SESSION['i'] + 1;
      $question = 'question';
      $option = 'option';
      echo "<div class = 'container'><table> <tr><td>";
      echo "Question $i:</td><td><input type='text' name = 'questions[{$_SESSION['i']}][$question]' maxlength ='140' /></td></tr>";
      for($j=0;$j<4;$j++) {
        $n = $j + 1;
        echo "<tr><td>Option $n: </td><td><input type='text' name = 'questions[{$_SESSION['i']}][$option][$j]' maxlength ='50' /></td></tr>";
      } if($_SESSION['i'] == 9) {
        echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Final Question Submit' /></td></tr></table></div>";
      } else {
        echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Question Submit' /></td></tr><tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Done' name='done' /></td></tr></table></div>";
      }
      $_SESSION['i'] = $_SESSION['i'] + 1;

    }
    ?>

  </body>
</html>
