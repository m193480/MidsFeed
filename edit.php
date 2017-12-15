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
	<div class="col-md-10">
		<h1 class=":my-2">
			<?php
				echo "edit $uname page";
			?>
		</h1>
	</div>
</div>
<form action="updatePage.php" method="post">
	<textarea name="bio" cols="50" rows="10"></textarea>
	<input type="Submit" value ="Submit Changes">
</form>

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
