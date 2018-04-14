<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="css/forms.css">
    <script type="text/javascript" src="js/lib/jquery.js"></script>
</head>
<body>
    <?php include("topbar.html"); ?>
 ?>


    <div id="main">
        <?php
        $file="[" . rtrim(file_get_contents("users.json"), ",") . "]";
        //$file='[{ "username": "sam", "password": "derp", "bio": "i like waffles" }]';
        $json=json_decode($file);
        foreach($json as $current) {
            if($current->username==$_SESSION["username"]) {
                $you = array();
                $you["username"] = $_SESSION["username"];
                if (isset($current->bio)) {
                    $you["bio"] = $current->bio;
                    echo('<p id="biotext" style="text-align: left;">' . $you["bio"] . '</p>');
                    echo('<button id="biobutton">Change Bio</button>');
                    echo('
                    <form method="POST" action="you-process.php" id="bioform">
                    <textarea rows="5" cols="40" name="bio">' . $current->bio . '</textarea>
                    <input type="submit" value="Change bio" />
                    </form>
                    ');
                }
                else
                    echo('
                    <form method="POST" action="you-process.php">
                    <textarea name="bio_new" rows="5" cols="40">Describe yourself...</textarea>
                    <input type="submit" value="Add bio" />
                    </form>
                    ');
            }
        }
        ?>
    </div>
<?php include("sidebar.php"); ?>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#bioform").hide();
    $("#biobutton").click(function(){
      $("#biotext").hide();
      $(this).hide();
      $("#bioform").show();
    });
});
  </script>
    </body>
</html>
