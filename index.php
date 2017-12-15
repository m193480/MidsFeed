<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MidsFeed - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php
    require_once("navbar.php");
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">MidsFeed
        <small>Popular Quizzes</small>
      </h1>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <form action="quiz.php" method="POST">
            <button name="quizid" value="What is the best song of 2017?"><img class="img-fluid rounded mb-3 mb-md-0" src="img/carrier.jpg" alt=""></button>
          </form>
        </div>
        <div class="col-md-5">
          <h3>What is the best song of 2017?</h3>
          <p>
            <?php
            $fp = fopen("What is the best song of 2017?.csv", 'r');
            $quiz = fgetcsv($fp,0,'|');
            echo $quiz[1];
            fclose($fp);
            ?>
          </p>
          <form action="quiz.php" method="POST">
            <button class="btn btn-primary" name="quizid" value="What is the best song of 2017?">Take Quiz!</button>
          </form>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Two -->
      <div class="row">
        <div class="col-md-7">
          <form action="quiz.php" method="POST">
            <button name="quizid" value="What company do you belong in?"><img class="img-fluid rounded mb-3 mb-md-0" src="img/h3usn.jpg" alt=""></button>
          </form>
        </div>
        <div class="col-md-5">
          <h3>What company do you belong in?</h3>
          <p>
            <?php
            $fp = fopen("What company do you belong in?.csv", 'r');
            $quiz = fgetcsv($fp,0,'|');
            echo $quiz[1];
            fclose($fp);
            ?>
          </p>
          <form action="quiz.php" method="POST">
            <button class="btn btn-primary" name="quizid" value="What company do you belong in?">Take Quiz!</button>
          </form>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Three -->
      <div class="row">
        <div class="col-md-7">
          <form action="quiz.php" method="POST">
            <button name="quizid" value="What kind of hat are you?"><img class="img-fluid rounded mb-3 mb-md-0" src="img/seals.jpg" alt=""></button>
          </form>
        </div>
        <div class="col-md-5">
          <h3>What kind of hat are you?</h3>
          <p>
            <?php
            $fp = fopen("What kind of hat are you?.csv", 'r');
            $quiz = fgetcsv($fp,0,'|');
            echo $quiz[1];
            fclose($fp);
            ?>
          </p>
          <form action="quiz.php" method="POST">
            <button class="btn btn-primary" name="quizid" value="What kind of hat are you?">Take Quiz!</button>
          </form>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Project Four -->
      <div class="row">

        <div class="col-md-7">
          <form action="quiz.php" method="POST">
            <button name="quizid" value="Are you cool?"><img class="img-fluid rounded mb-3 mb-md-0" src="img/VirginiaSSN.PNG" alt=""></button>
          </form>
        </div>
        <div class="col-md-5">
          <h3>Are you cool?</h3>
          <p>
            <?php
            $fp = fopen("Are you cool?.csv", 'r');
            $quiz = fgetcsv($fp,0,'|');
            echo $quiz[1];
            fclose($fp);
            ?>
          </p>
          <form action="quiz.php" method="POST">
            <button class="btn btn-primary" name="quizid" value="Are you cool?">Take Quiz!</button>
          </form>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; JR 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
