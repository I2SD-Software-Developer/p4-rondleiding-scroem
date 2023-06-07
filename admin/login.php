<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #990300, 50%, #d10202);">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.rocvantwente.nl/">ROC</a>
			<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" style="background-color: #99021A; border: none;" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="https://www.rocvantwente.nl/">Home</a>
					</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container d-flex align-items-center justify-content-center vh-100">
		<div class="border border-2 rounded p-4  border-transition fade-transition" style="background-color: rgba(252, 250, 250, 0.8);">
			<form action="login.php" method="post">
				<div class="login-box">
					<h1>Login</h1>

					<div class="mb-3">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" class="form-control" placeholder="Username" name="username" value="">
					</div>

					<div class="mb-3">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" class="form-control" placeholder="Password" name="password" value="">
					</div>

					<input class="btn btn-primary" type="submit" name="login" value="Sign In">
				</div>
			</form>
			<?php
			session_start(); // Start session (if not already started)

			// Define the valid credentials
			$validUsername = 'admin';
			$validPassword = 'admin';

			// Check if the form is submitted
			if (isset($_POST['login'])) {
				// Retrieve the entered username and password
				$username = $_POST['username'];
				$password = $_POST['password'];

				// Validate the credentials
				if ($username === $validUsername && $password === $validPassword) {
					// Credentials are correct, set the user as logged in
					$_SESSION['username'] = $username;
					header('Location: adminpage.php'); // Redirect to a welcome page after successful login
					exit();
				} else {
					// Invalid credentials, show an error message
					echo "Invalid username or password.";
				}
			}
			?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

	<footer class="text-white footer text-center" style="background: linear-gradient(90deg, #0082ca, 50%, #0f2696);">
		<!-- Grid container -->
		<div class="container p-4 pb-0">
			<!-- Section: Social media -->
			<section class="mb-4">
				<!-- Facebook -->
				<a class="btn text-white btn-floating m-1" href="https://www.facebook.com/rocvantwente" role="button">
					<img src="images/facebook_icon.svg" alt="Facebook Logo" style="max-width: 30px; max-height: 30px;" />
				</a>

				<!-- Twitter -->
				<a class="btn text-white btn-floating m-1" href="https://twitter.com/rocvantwente" role="button">
					<img src="images/twitter_icon.svg" al t="Twitter Logo" style="max-width: 30px; max-height: 30px;" />
				</a>

				<!-- YouTube -->
				<a class="btn text-white btn-floating m-1" href="https://www.youtube.com/user/rocvantwente" role="button">
					<img src="images/youtube_icon.svg" alt="YouTube Logo" style="max-width: 30px; max-height: 30px; " />
				</a>

				<!-- Instagram -->
				<a class="btn text-white btn-floating m-1" href="https://www.instagram.com/rocvantwente/" role="button">
					<img src="images/instagram_icon.svg" alt="Instagram Logo" style="max-width: 30px; max-height: 30px;" />
				</a>

				<!-- LinkedIn -->
				<a class="btn text-white btn-floating m-1" href="https://nl.linkedin.com/school/roc-van-twente/" role="button">
					<img src="images/linkedin_icon.svg" alt="LinkedIn Logo" style="max-width: 30px; max-height: 50px;" />
				</a>
			</section>
		</div>
		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2023 ROC Van Twente
		</div>
		<!-- Copyright -->
	</footer>

</body>

</html>