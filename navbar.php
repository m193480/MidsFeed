<style type="text/css">
body {
    padding-top: 65px;
}
</style>
<script type='text/javascript'>
function remCookie(){
	document.cookie = "uname=''; expires=Wed, 01 Jan 1970 00:00:00 UTC; path=''";
	return true;
}
</script>
<link rel="icon" href="http://midn.cs.usna.edu/~m193480/IT350/MidsFeed/img/logo.png">
<?php
echo   "
  <!-- Bootstrap core CSS -->
  <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
  <!-- Custom styles for this template -->
  <!--<link href='css/1-col-portfolio.css' rel='stylesheet'>-->
<nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>MIDSFEED!</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='index.php'>Home
                <span class='sr-only'>(current)</span>
              </a>
            </li>";
            if(isset($_COOKIE["uname"])) {
            echo "
            <li class='nav-item active'>
              <a class='nav-link' href='profile.php'>Profile
                <span class='sr-only'>(current)</span>
              </a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='index.php' onClick='return remCookie()'>Sign Out
                <span class='sr-only'>(current)</span>
              </a>
            </li>";
          }
            echo "
            <li class='nav-item'>
              <a class='nav-link' href='quiz.php?name=newquiz'>Take A Quiz</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='QuizForm.php'>Create A Quiz</a>
            </li>";
            if(!isset($_COOKIE["uname"])){
            echo "<li class='nav-item'>
              <a class='nav-link' href='signIn.php'>Sign In</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='signUp.php'>Sign Up</a>
            </li>";
          }
          echo "
          </ul>
        </div>
      </div>
		</nav>";
?>
