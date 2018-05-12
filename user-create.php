<?php 
$config = file("config.txt");
//print_r($config);
//echo($config[0]);
$config[0] = rtrim($config[0]);
$config[1] = rtrim($config[1]);
if ($config[0] == "private" && isset($config[1])) {
	$p = TRUE;
	//echo("yee");
} else {
	$p = FALSE;
	//echo("yee2");
}
?>
<html>
<head>
	<title>Site</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<script type="text/javascript" src="js/lib/jquery.js"></script>
		<script type="text/javascript" src="js/lib/less.js"></script>
</head>
<body>
	<?php
	if ($p) {
		echo('<form class="formarea" action="user-create-process.php?private=private" method="POST">');
	} else {
		echo('<form class="formarea" action="user-create-process.php" method="POST">');
	}
	?>
		<p class="darktext">Username</p>
		<input type="text" name="username"><br>
		<p class="darktext">Password</p>
		<input type="password" name="password" id="password"><br>
		<?php 
		if ($p) {
			echo('<p class="darktext">Private Server Password</p><input type="text" name="private_password" />');
		}
		?>
		<input type="checkbox" name="rules" />
		<p class="darktext" style="display: inline;">I agree to the <a href="rules.php" class="darktext" style="text-decoration: underline;" target="_blank">rules</a>.
		<br><b class="darktext">Warning:</b> if you get banned from breaking <br> the rules, "I didn't read the rules" isn't <br> a valid excuse. <br><i class="darktext">Read the rules.</i></p>
		<input type="submit" value="Create User">
	</form>
</body>
</html>
