<?php session_start();
if ($_GET["user"] == $_SESSION["username"]) {
  //header("Location: you.php");
}
?>
<html>
<head>
    <title><?php echo($_GET["user"] . "'s Profile'"); ?></title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
  <?php include("topbar.html"); ?>


    <div id="main">
      <?php
      $file="[" . rtrim(file_get_contents("users.json"), ",") . "]";
      $json=json_decode($file);
      foreach($json as $current) {
        if ($current->username == $_GET["user"]) {
          $user = array();
          $user["username"] = $current->username
          if (isset($current->bio)) {
            $user["bio"] = $current->bio
          }
          print_r($user);
        }
      }
      ?>
    </div>

    <?php include("sidebar.php"); ?>
    </body>
</html>
