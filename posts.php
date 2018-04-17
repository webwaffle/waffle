<?php session_start();
$_SESSION["post"] = $_GET["post"];
date_default_timezone_set("America/New_York");
?>
<html>
<head>
	<title><?php echo($_GET["post"]); ?></title>
	<link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	</head>
	<body>
		<?php include("topbar.html"); ?>

<div id="main">
<?php
$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);
foreach(array_reverse($array_of_posts) as $current) {
	if (isset($current->title) && $current->title == $_GET["post"]) {
    	echo('<div class="postdivpage">');
    	if (isset($current->title)) {
    		echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 class="posttitle">' . $current->title . "</h1></a>");
		}
    	echo('<p class="timetext">Posted on ' . $current->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $current->poster . '">' . $current->poster . '</a></p><p class="posttext">' . $current->text . '</p>');
        if (isset($current->file_ext)) {
            echo('<img class="imgpage" src="imguploads/' . $current->title . $current->file_ext . '" />');
        }
				echo('
				<form action="comment-process.php" method="POST">
					<input type="text" name="comment" />
					<input type="submit" value="comment" />
				</form>
				');
				$file_2="[" . substr(file_get_contents("json/comments.json"), 0, -1) . "]";
				$array_of_comments=json_decode($file_2);
				foreach (array_reverse($array_of_comments) as $current) {
					if ($current->post == $_GET["post"]) {
						$commenter = $current->commenter;
						$time = $current->time;
						$comment = $current->comment;
						echo("<div class='postdiv'>");
						echo("<p class='timetext'>$time<br>By <a style='color:grey; display: inline;'href='user.php?user=$commenter'>$commenter</a></p>");
						echo("<p class='posttext'>$comment</p>");
						echo("</div>");
					}
				}
        echo("</div>");
	}
}
?>
</div>
<?php include("sidebar.php"); ?>
</body>
</html>
