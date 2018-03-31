<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
	<form class="formarea" action="login-process.php" method="POST">
		<p>Username</p>
		<input type="text" name="username"><br>
		<p>Password</p>
		<input type="password" name="password"><br>
		<input type="submit" value="Login">
        <p>New? <a href="user-create.php">Create an account</a></p>
	</form>
</body>
</html>