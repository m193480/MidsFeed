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
<?php
require_once("navbar.php");
?>

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
		<a href="edit.php">Edit Profile</a>
	</div>
</div>
<?php
$file = $uname . ".csv";
$fp = fopen($file,"r");
while($quiz = fgetcsv($fp,0,'|')){
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
} ?>


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
