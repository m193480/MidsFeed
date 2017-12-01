<html>

<?php
  require_once("navbar.php");
?>

</style>
<?php
/*
Current functionality: Read a given quiz from a file and write to the current user's .csv file storing quiz results.
*/
/* reads in a CSV file containing user created quizzes.  Returns an associative array
 * containing the name, answers, questions, and options for each user created quiz.
 */
function readCSV($filename)
  {
    if($fp = fopen("$filename", 'r'))
      {
        $questionNumber = 0;
        $linenumber = 0;
        while($line = fgetcsv($fp, 0, "|"))
          {
            if($linenumber == 0)
              {
                $data["quizzes"]["name"] = $line[0];
                $data["quizzes"]["desc"] = $line[1];
                $j = 2;
                for($i = 0; $i < 4; $i++)
                {
                  $data["quizzes"]["answers"][$i] = $line[$j];
                  $j++;
                }
              }
              else {
                $len = sizeof($line);
                $j = 0;
                while($j < $len)
                {
                  $data["quizzes"]["questions"][$questionNumber]["question"] = $line[$j];
                  $j++;
                  for($i = 0; $i < 4; $i++)
                  {
                    $data["quizzes"]["questions"][$questionNumber]["options"][$i] = $line[$j];
                    $j++;
                  }
                  $questionNumber++;
                }
              }
              $linenumber++;
          }
      }
      else
      {
        echo "<div class='jumbotron'><h1 class='display-4'>Error: Quiz does not exist!</h1>
        </div>";
          echo"<div class='form-group'><form method='POST' action='?'>
    <label for='newquiz'>New Quiz:</label>
    <input type='submit' name='newquiz' value='Enter Quiz Name' class='btn btn-primary'>
  </form></div>";
        exit(1);
      }
      return $data;
  }
  session_start();
  if(isset($_POST['unsset']))
  {
    $saveValue = $_SESSION['FILE'];
    session_unset();
    $_SESSION['FILE'] = $saveValue;
  }
  if(isset($_POST['quizid']))
  {
    $_SESSION['FILE'] = $_POST['quizid'] . ".csv";
  }
  if(isset($_POST['newquiz']))
  {
    session_unset();
  }
  ?>

<?php
  if(!isset($_SESSION["FILE"]))
  {
    echo "<div class='container'>
    <form method='POST' action='?'>";
    echo "<div class='form-group'>
      <label for='quiz'>Enter name of quiz:</label>";
    echo "<input type='text' class='form-control' name='quizid' id='quiz'></div>";
    echo "<input type=submit name='FILE' value='Take Quiz!' class='btn btn-primary'>";
    echo "</form></div>";
  }
  else if(isset($_SESSION["FILE"]) && !isset($_SESSION["questionProgress"]))
  {
    $_SESSION["data"] = readCSV($_SESSION["FILE"]);
    $_SESSION["questionProgress"] = 0;
    $_SESSION["points"] = 0;
  }

  if(isset($_POST['back']))
  {
    $_SESSION["questionProgress"]-=2;
  }
  if(isset($_POST))
  {
    for($i = 0; $i < 10; $i++)
    {
      if(isset($_POST[$i]))
      {
        $_SESSION["points"] += $_POST[$i]+1;
      }
    }
  }

  function getFinalAnswer($points, $maxScore, $answers)
  {
    if($points <= $maxScore/4)
    {
      return $answers[0];
    }
    else if($points <= $maxScore/2)
    {
      return $answers[1];
    }
    else if($points <= 3*$maxScore/4)
    {
      return $answers[2];
    }
    else {
      return $answers[3];
    }
  }

  function getScore($numQuestions)
  {
    return $numQuestions * 4;
  }

  if(isset($_SESSION["questionProgress"]) && $_SESSION["questionProgress"] >= sizeof($_SESSION["data"]["quizzes"]["questions"]))
  {
    $answer = getFinalAnswer($_SESSION["points"], getScore(sizeof($_SESSION["data"]["quizzes"]["questions"])), $_SESSION["data"]["quizzes"]["answers"]);
    echo "<div class='jumbotron'>";
    echo "<h2 class='display-3'>Based on your answers, $answer.</h2>";
    echo "</div>";
    $username = $_COOKIE['uname'] . ".csv";
    $fp = fopen($username, "a");
    $output = array($_SESSION["data"]["quizzes"]["name"], $answer);
    fputcsv($fp,$output, "|");
    $fname = $_SESSION['FILE'];
    session_unset();
    $_SESSION['FILE'] = $fname;
  }
  else
  {
    $quizData = $_SESSION["data"]["quizzes"];
  }
  ?>

  <form method="POST" action="?">

  <?php
  if(isset($quizData))
  {
    echo "<div class='text-center'>";
    echo "<div class='jumbotron'><h1 class='display-3'>";
    echo $quizData["name"];
    echo "</h1>";
    echo "<h2 class='display-4'>";
    echo $quizData['desc'];
    echo "</h2> <hr class='my-4'>";
    $questionNumber = $_SESSION["questionProgress"];
    echo "<p class='lead'>";
    echo $quizData["questions"][$questionNumber]["question"];
    echo "</p><p class='lead'>";
    echo "Here are your options:";
    echo "</p>";
    $j = 0;
    echo "<table style='margin:1em auto;'>";
    foreach($quizData["questions"][$questionNumber]["options"] as $key => $option)
    {
      echo "<tr><td>";
      echo "<input type='radio' name='$questionNumber' value='$j'";
      if($j == 0)
      {
        echo "checked='checked'";
      }
      echo "> $option";
      echo "</td></tr>";
      $j++;
    }
    echo "</table>";
    echo "</div>";
    echo "<input type=submit value='Submit Answer' class='btn btn-primary'>";
  echo "</form></div>";
  $_SESSION["questionProgress"]++;
  }
  if(isset($_SESSION['FILE']))
  {
    if($_SESSION["questionProgress"]>1)
    {
    echo "<div class='form-group'>
    <form method='POST' action='?'>
      <label for='back'>Go back!</label>
      <input type='submit' name='back' value='Go Back One Question' class='btn btn-primary'>
    </form></div>";
  }
  echo"<div class='form-group'>
  <form method='POST' action='?'>
    <label for='unsset'>Restart Quiz Progress:</label>
    <input type='submit' name='unsset' value='RESTART' class='btn btn-primary'>
  </form></div>";
  echo"<div class='form-group'><form method='POST' action='?'>
    <label for='newquiz'>New Quiz:</label>
    <input type='submit' name='newquiz' value='Enter Quiz Name' class='btn btn-primary'>
  </form></div>";
  }
  ?>

  <footer class="py-5 bg-dark">
<div class="container">
	<p class="m-0 text-center text-white">Copyright &copy; Lil "Gucci Gang" Pump 2017</p>
</div>
<!-- /.container -->
</footer>
</html>
