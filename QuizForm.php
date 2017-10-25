<!DOCTYPE html>
<html>
  <head>

  </head>

  <body>


  <form method="POST" action="?">
    <?php
    session_start();
    if(!isset($_SESSION['i'])) {
      $_SESSION['i'] = 0;
    }else {
      $_SESSION['i'] = $_SESSION['i'] + 1;
    }
    $i = $_SESSION['i'] + 1;
    if(!($_SESSION['i']>9)) {
    echo "Question $i: <input type='text' name = 'questions[{$_SESSION['i']}]['question']' maxlength ='140' /><br />";
    for($j=0;$j<4;$j++) {
      $n = $j + 1;
      echo "Option $n: <input type='text' name = 'questions[{$_SESSION['i']}]['options']' maxlength ='50' /><br />";
    }

      echo "<input type='submit' value='Question Submit' /><br />";
    }

     ?>
     <br />
     <br />
  </form>
  <form method ="POST" action="quiz.php">
  <?php
  for($j=0;$j<4;$j++) {
    $n = $j + 1;
    echo "Final Answer $n: <input type='text' name = 'answers[]' maxlength ='50' /><br />";
  }
  echo "<input type='submit' value='Final Submit' />"; ?>
  </form>

  </body>
</html>
