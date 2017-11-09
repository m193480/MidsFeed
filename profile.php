<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>1 Col Portfolio - Start Bootstrap Template</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/1-col-portfolio.css" rel="stylesheet">

	</head>

	<body>
<?php
if(isset($_COOKIE['uname'])){
	$uname = $_COOKIE['uname'];
}
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.html">MidsFeed</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
<!-- things we need:
Login drop down with sign up option
Profile page
Create Quiz -> QuizForm.php
Search Quiz -> quiz.php
-->
			<li class="nav-item">
				<a class="nav-link" href="profile.php">Profile</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Services</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Contact</a>
			</li>
			</ul>
			</div>
		</div>
	</nav>

<!-- Page Content -->
<div class="container">

<div class="row">
	<div class="col-md-2">
		<img class="img-fluid rounded mb-3 mb-md-0" src="img/egg.png" alt"">
	</div>
	<div class="col-md-10">
		<h1 class=":my-2">
			<?php
				echo $uname;
			?>
		</h1>
	</div>
</div>
<?php
$file = $uname . ".csv";
while($quiz = fgetcsv($file, '|')){
echo "
<div class='row'>
	<div class='col-md-12'>
		<h1> Quiz Results </h1>
	</div>
</div>
<div class='row'>
	<div class='col-md-12'>
		<h3> Quiz: $quiz[0]</h3>
		<p> Results: $quiz[1] </p>
	</div>
</div>";
}



<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
	<p class="m-0 text-center text-white">Copyright &copy; Not Jon Rogers 2017</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
