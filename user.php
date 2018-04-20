<?php session_start();
if ($_GET["user"] == $_SESSION["username"]) {
  //header("Location: you.php");
}
?>
<html>
<head>
    <title><?php echo($_GET["user"] . "'s Profile"); ?></title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
  <?php include("topbar.html"); ?>


    <div id="main">
      <?php
      $file="[" . rtrim(file_get_contents("json/users.json"), ",") . "]";
      $json=json_decode($file);
      foreach($json as $current) {
        if ($current->username == $_GET["user"]) {
          $user = array();
          $user["username"] = $current->username;
          if (isset($current->bio)) {
            $user["bio"] = $current->bio;
          }
          //print_r($user);
          echo("<h1>" . $user["username"] . "</h1>");
          if (isset($user["bio"])) {
            echo("<p>" . $user["bio"] . "</p>");
          }
          //end
        }
      }
      foreach ($json as $current) {
        if ($current->username == $_GET["user"]) {
          foreach ($json as $current2) {
            if ($current2->username == $_SESSION["username"]) {
              if (in_array($_GET["user"], $current2->friends)) {
                echo('<p>' . $_GET["user"] . ' is already in your friends list.</p>');
              }
              else {
                echo("<form action='friend-process.php?user=" . $_GET["user"] . "' method='POST'>
                <input type='submit' value='Add Friend' name='submit' />
                </form>");
                }
              }
            }
          }
        }
      ?>
    </div>

    <?php include("sidebar.php"); ?>
    </body>
</html>
