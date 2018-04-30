<?php session_start(); ?>
<html>
<head>
<title>Find a user</title>
<link rel="stylesheet" href="css/home.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>

<body>
<?php include("topbar.php"); ?>

<div id="main">
<form action="user.php" method="GET">
<input name="user" class="smalltext" type="text" />
<input type="submit" class="smallbutton" value="Find" />
</form>
</div>

<?php include("sidebar.php"); ?>
</body>
</html>