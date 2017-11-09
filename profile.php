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
<script type="text/javascript">
	var uname = "uname";
	function getCookie(uname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return null;
	}
	var name = getCookie(uname);
</script>

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
			<script type="text/javascript">
				document.write(name);
			</script>
		</h1>
	</div>
</div>
<?php
echo "
<div class='row'>
	<div class='col-md-12'>
		<h1> Quiz Results </h1>
	</div>
</div>";
echo "
<div class='row'>
	<div class='col-md-12'>
		<h3> Quiz:";
		?>Quiz Name</h3>
		<p> These are the quiz results </p>
	</div>
</div>



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
