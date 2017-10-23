<!DOCTYPE html>
<html>
  <head>

  </head>

  <body>

    <?php if(!isset($_POST['num'])) {
      ?>
    <form method="POST" action="?">
      How many questions do you want?<input type="number" name="num" max="10" min="1" placeholder="10"/>
    </form>
<?php } else {?>
    <form method="POST" action="quiz.php">
      <?php
        for($i=1;$i<=$_POST['num'];$i++) {
          $num = $i -1;
          echo "Question $i: <input type='text' name = 'questions[$num]['question']' maxlength ='140' /><br />";
          for($j=0;$j<4;$j++) {
            $n = $j + 1;
            echo "Answer $n: <input type='text' name = 'questions[$num]['options']' maxlength ='50' /><br />";
          }
        }
       ?>
    </form>

<?php } ?>

  </body>
</html>
