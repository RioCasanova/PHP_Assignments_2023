<?php

include("/home/rcasanova2/data/data.php");

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$msg = "";

if (isset($_POST['mysubmit'])) {
	if (($username == $username_good) && (password_verify($password, $pw_enc))) {

		session_start(); // starts a session, or continues an existing session
		$_SESSION['spiderman'] = session_id();
		header("Location:edit.php"); // redirects user to the admin page
	} else {

		if ($username != "" && $password != "") {
			$msg = "Invalid Login"; // just for testing; in a real site, we wouldn't echo something before the doctype, body, etc.
		} else {
			$msg = "Please enter a Username and Password";
		}
	}
}
?>



<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<!-- These must be in place to use Bootstrap ! -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.formstyle {
			/* optional: in case you don't like the really wide form */
			max-width: 450px;
		}
	</style>
</head>

<body class="container">
	<div class="row justify-content-center mt-5">
		<form name="myform" class="formstyle col-lg-8 border border-success p-4 mb-2 border-opacity-25 rounded"
			method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h1>Login</h1>
			<p class="text-muted">For administrative access for this application, please login down below or return to
				home page</p>

			<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="username">
			</div>
			<!-- / form-group -->

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password">
			</div>
			<a href="index.php" class="btn btn-dark mt-3">
				< Home</a>
					<input type="submit" class="btn btn-success mt-3" name="mysubmit" value="Login">
		</form>
		<?php
		if ($msg) {
			echo "<div class=\"alert alert-info\">$msg</div>";
		}
		?>
	</div><!-- / .container -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</body>

</html>