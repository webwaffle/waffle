<?php 
session_start();
include("main.php");
?>
<html>
<head>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script type="text/javascript" src="js/lib/less.js"></script>
</head>
<body>
    <?php include("topbar.php"); ?>
    <div id="main">
    <?php
  $file="[" . substr(file_get_contents("json/users.json"), 0, -1) . "]";
  $json=json_decode($file);
  //get user object
  foreach ($json as $current) {
    if ($current->username == $_SESSION["username"]) {
      $user = $current;
    }
  }
  //end
  foreach ($user->friends as $current) {
    echo('<a class="darktext" href="user.php?user=' . $current . '">' . $current . '</a>');
  }
   ?>
    </div>
    <?php include("sidebar.php"); ?>
</body>
</html>