<?php
session_start();
?>
<html>
<head>
    <title>User: <?php echo($_SESSION["username"]); ?></title>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    </head>
<body>
<?php
$file="[" . substr(file_get_contents("posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);
foreach(array_reverse($array_of_posts) as $current) {
    echo('<div class="postdiv">');
    if (isset($current->title)) {
    	echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 class="posttitle">' . $current->title . "</h1></a>");
	}
    echo('<p class="timetext">Posted on ' . $current->time . '<br>By ' . $current->poster . '</p><p class="posttext">' . $current->text . '</p></div>');
}
?>
	<div id="createpostdiv">
    	<a href="create-post.php"><p id="createpostlink">Create Post</p></a>
	</div>
    </body>
</html>