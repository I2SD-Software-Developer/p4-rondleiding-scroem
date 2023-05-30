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
    
    include_once('connection.php');

    function test_input($data) {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $stmt = $conn->prepare("SELECT * FROM adminlogin");
        $stmt->execute();
        $users = $stmt->fetchAll();
        
        foreach($users as $user) {
            
            if(($user['username'] == $username) &&
                ($user['password'] == $password)) {
                    header("location: adminpage.php");
            }
            else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
            }
        }
        setcookie($username, time() + 60*60*24, '/');
    }
    ?>
</body>

</html>
