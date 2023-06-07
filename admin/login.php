

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Page</title>
</head>

<body>
	<form action="login.php" method="post">
		<div class="login-box">
			<h1>Login</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username"
						name="username" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" value="">
			</div>

			<input class="button" type="submit"
					name="login" value="Sign In">
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
</body>

</html>
