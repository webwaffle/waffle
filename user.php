<?php session_start(); include("main.php");
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
  <?php include("topbar.php"); ?>


    <div id="main">
      <?php
      $file="[" . rtrim(file_get_contents("json/users.json"), ",") . "]";
      $json=json_decode($file);
      $doesntexist = TRUE;
      foreach($json as $current) {
        if ($current->username == $_GET["user"]) {
          $doesntexist = FALSE;
          if (isset($current->level)) {
            if ($current->level < 0) {
              echo("<p class=\"darktext\">That user was banned.</p>");
              break;
            }
          }
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
          if ($_SESSION["mod"] == "mod") {
            echo('
            <form method="POST" action="delete.php?type=user&user=' . $current->username . '">
            <input type="submit" class="redbutton" value="Ban User" />
            </form>
            ');
          }
          //end
        }
      }
      if ($doesntexist) {
        echo("<p class='darktext'>That user doesn't exist.</p>");
      }
      foreach ($json as $current) {
        if ($current->username == $_GET["user"]) {
          foreach ($json as $current2) {
            if ($current2->username == $_SESSION["username"]) {
              if (in_array($_GET["user"], $current2->friends)) {
                echo('<p class="darktext">' . $_GET["user"] . ' is in your friends list.</p>');
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
      //begin message section
      if (!($doesntexist)) {
      echo("<div id=\"messages\">");
      $u = $_SESSION["username"];
      $o = $_GET["user"];
      $file="[" . rtrim(file_get_contents("json/messages.json"), ",") . "]";
      $json=json_decode($file);
      foreach($json as $c) {
        if ($u == $c->sender && $o == $c->receiver) {
          echo("<p class='message-out'>" . $c->message . "</p><br><br>");
          //$c->read = "read";
          if (!(isset($c->read))) {
            $c->read = "unread";
          }
        }
        if ($u == $c->receiver && $o == $c->sender) {
          echo("<p class='message-in darktext'>" . $c->message . "</p><br><br>");
          if (isset($c->read)) {
            $c->read = "read";
          } else {
            $c->read = "read";
          }
        }
      }
      //print_r($json);
      $json_string = json_encode($json, JSON_PRETTY_PRINT);
      $json_string2 = substr($json_string, 1, -1);
      $json_string3 = $json_string2 . ",";
      file_put_contents("json/messages.json", $json_string3);
      echo("</div>");
      echo("<form method='POST' action='msg-process.php?rec=" . $_GET["user"] . "'>");
      
    echo('<input type="text" name="message" class="smalltext"/>
    <input class="smallbutton" type="submit" value="Send" />
    </form>'); ?>
    <h2 class="darktext">Their Posts</h2><?php
    $file="[" . rtrim(file_get_contents("json/posts.json"), ",") . "]";
    $json=json_decode($file);
    foreach(array_reverse($json) as $c) {
      if ($c->poster == $_GET["user"]) {
        dp($c, FALSE);
      }
    }
    }
    ?>
    fore
    </div>
    <!--end message section-->

    <?php include("sidebar.php"); ?>
    </body>
</html>
