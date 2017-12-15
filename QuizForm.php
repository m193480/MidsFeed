<!-- Author: Sean Krasovic-->
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
  <link rel="icon" href="http://midn.cs.usna.edu/~m193480/IT350/MidsFeed/img/logo.png">

</head>

  <body>
    <?php
    require_once("navbar.php");
    ?>

<!-- save to file -->

  <form method="POST" action="?" onsubmit='return validate();'>
    <?php
    session_start();
    //if you have not input a quiz name start from the beginning
    if(!isset($_SESSION['i']) || (!isset($_POST['name']) && !isset($_SESSION['name']))) {
      $_SESSION['i'] = 0;
      echo "<div class = 'container'><table> <tr><td>";
      echo "What is your quiz named? </td><td><input type = 'text' name ='name' maxlength='140' required/> </td></tr>";
      echo "<tr><td>Quiz Description: </td><td><input type = 'text' id= 'question' name ='desc' maxlength='250' required/> </td></tr>";
      for($j=0;$j<4;$j++) {
        $n = $j + 1;
        echo "<tr><td>Final Answer $n: </td><td><input type='text' id = '$j' name = 'answer[$j]' maxlength ='50' required/></td></tr>";
      }
      echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Name Submit' /></td></tr></table></div>";
    }else {
      //if you are done with your quiz go to the quiz taking page
      if($_SESSION['i'] >= 10 || isset($_POST['done'])) {
        session_destroy();
        header('Location:./quiz.php');
      }
      if(!isset($_SESSION['name'])) {
        $_SESSION['name'] = $_POST['name'];
        $name = $_SESSION['name'] . '.csv';
        $out = fopen($name,'x');
        fputcsv($out,array($_SESSION['name'],$_POST['desc'],$_POST['answer'][0],$_POST['answer'][1],$_POST['answer'][2],$_POST['answer'][3]), '|');
        fclose($out);
        $out = fopen('list.csv','a');
        fputcsv($out, array($_POST['name']));
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
      echo "Question $i:</td><td><input type='text' id = 'question' name = 'questions[{$_SESSION['i']}][$question]' maxlength ='140' required/></td></tr>";
      for($j=0;$j<4;$j++) {
        $n = $j + 1;
        echo "<tr><td>Option $n: </td><td><input type='text' id='$j' name = 'questions[{$_SESSION['i']}][$option][$j]' maxlength ='50' required/></td></tr>";
      } if($_SESSION['i'] == 9) {
        echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Final Question Submit'/></td></tr></table></div>";
      } else {
        echo "<tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Question Submit' /></td></tr><tr><td colspan = '2'><input type='submit' class='btn btn-default' value='Final Submit' name='done' /></td></tr></table></div>";
      }
      $_SESSION['i'] = $_SESSION['i'] + 1;
    }
    ?>
  </form>

  <script type="text/javascript">
    function validate() {
      var question = document.getElementById('question').value;
      var option1 = document.getElementById('0').value;
      var option2 = document.getElementById('1').value;
      var option3 = document.getElementById('2').value;
      var option4 = document.getElementById('3').value;
      var value = true;
      if(question.includes("<") || question.includes(">") || question.includes("\'") || question.includes("\"")) {
        document.getElementById('question').value = "";
        value = false;
      }
      if(option1.includes("<") || option1.includes(">") || option1.includes("\'") || option1.includes("\"")){
        document.getElementById('0').value = "";
        value = false;
      }
      if(option2.includes("<") || option2.includes(">") || option2.includes("\'") || option2.includes("\"")) {
        document.getElementById('1').value = "";
        value = false;
      }
      if(option3.includes("<") || option3.includes(">") || option3.includes("\'") || option3.includes("\"")) {
        document.getElementById('2').value = "";
        value = false;
      }
      if(option4.includes("<") || option4.includes(">") || option4.includes("\'") || option4.includes("\"")) {
        document.getElementById('3').value = "";
        value = false;
      }

      return value;

    }
  </script>

  </body>
</html>
