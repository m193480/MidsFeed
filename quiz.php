<html>

<?php

  //require_once("../../error.inc.php");
  require_once("navbar.php");
?>

<?php


/*


Current functionality:  Read in any CSV file and create a variable, $data, that holds all of the quizzes in the final
in a logical manner. After the conclusion of all quizzes results are displayed.  Currently results are arbitrary.



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
                $j = 1;
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
        echo "invalid input file: Blame Sean Krasovic.";
      }
      return $data;
  }
  session_start();
  if(isset($_POST['restart']))
  {
    session_unset();
  }
  ?>

<?php
  if(!isset($_SESSION["data"]))
  {
    $_SESSION["data"] = readCSV("Sean Krasovic Quiz.csv");
    $_SESSION["questionProgress"] = 0;
  }
  if($_SESSION["questionProgress"] >= sizeof($_SESSION["data"]["quizzes"]["questions"]))
  {
    echo "Based on your answers, you are a gorilla.";
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
    echo $quizData["name"];
    $questionNumber = $_SESSION["questionProgress"];
    echo "<br>";
    echo $quizData["questions"][$questionNumber]["question"];
    echo "<br>";
    echo "Here are your options:";
    echo "<br>";
    //echo "<select name='{$quizData["questions"][$questionNumber]["question"]}'>";
    foreach($quizData["questions"][$questionNumber]["options"] as $key => $option)
    {
      echo "<input type='radio' name='{$quizData["questions"][$questionNumber]["question"]}' value='$option'> $option";
      echo "<br>";
    }
    echo "</select>";
    echo "<input type=submit value='Submit Answer'>";
  echo "</form>";
  $_SESSION["questionProgress"]++;
  }
  ?>
  <form method="POST" action="?">
    <label for="unsset">Restart Quiz Progress:</label>
    <input type="submit" name="restart" value="RESTART">
  </form>

<?php /*
    echo "<pre>";
    print_r($_SESSION["data"]);
    echo "</pre>"; */
?>
</html>
