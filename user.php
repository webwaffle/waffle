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
    <script type="text/javascript" src="js/lib/less.js"></script>
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
          echo("<h1 style='color: #0a1128;'>" . $user["username"] . "</h1>");
          if (isset($user["bio"])) {
            echo("<p style='color: #0a1128;'>" . $user["bio"] . "</p>");
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
                <input type='submit' class='smallbutton' value='Add Friend' name='submit' />
                </form>");
                }
              }
            }
          }
        }
      ?>
      <?php
      $file="[" . rtrim(file_get_contents("json/messages.json"), ",") . "]";
      $json=json_decode($file);
      foreach($json as $current) {
        if ($current->sender == $_SESSION["username"] or $current->receiver == $_SESSION["username"]) {
          echo('<p class="message darktext">' . $current->sender . ": " . $current->message . "</p><br>");
        }
      }
      ?>
      <?php
      echo("<form method='POST' action='msg-process.php?rec=" . $_GET["user"] . "'>");
      ?>
      <input type="text" name="message" class="darktext"/>
      <input class="smallbutton" type="submit" value="Send" />
    </form>
    </div>

    <?php include("sidebar.php"); ?>
    </body>
</html>
