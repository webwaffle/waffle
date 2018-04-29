<?php
session_start();
?>
<html>
<head>
    <title>User: <?php echo($_SESSION["username"]); ?></title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script type="text/javascript" src="js/lib/less.js"></script>
    </head>
<body>
    <?php include("topbar.php"); ?>

<div id="main">
<?php
function cmp($a, $b)
{
    if ($a->likes == $b->likes) {
        return 0;
    }
    return ($a->likes < $b->likes) ? -1 : 1;
}
$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);
foreach(array_reverse($array_of_posts) as $current) {
    echo('<div class="postdiv">');
    if (isset($current->title)) {
    	echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 class="posttitle">' . $current->title . "</h1></a>");
	}
    echo('<p class="timetext">Posted on ' . $current->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $current->poster . '">' . $current->poster . '</a></p><p class="posttext">' . $current->text . '</p>');
    if (isset($current->file_ext)) {
      if ($current->file_ext != "") {
        echo('<img width="32" height="32" class="imgpage" src="imguploads/' . $current->title . $current->file_ext . '" />');
      }
    }
    echo("</div>");
}
?>
</div>
	<?php include("sidebar.php"); ?>
    </body>
</html>
