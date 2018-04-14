<?php session_start(); ?>
<html>
<head>
    <title><?php $_GET["user"]; ?></title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
  <?php include("topbar.html"); ?>


    <div id="main">

    </div>

    <?php include("sidebar.php"); ?>
    </body>
</html>
