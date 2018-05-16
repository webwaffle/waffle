<?php session_start();
include("main.php");
$_SESSION["post"] = $_GET["post"];
date_default_timezone_set("America/New_York");
?>
<html>
<head>
	<title><?php echo($_GET["post"]); ?></title>
	<link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<script type="text/javascript" src="js/lib/less.js"></script>
	</head>
	<body>
		<?php include("topbar.php"); ?>

<div id="main">
<?php
$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);

foreach(array_reverse($array_of_posts) as $current) {
	if (isset($current->title) && $current->title == $_GET["post"]) {
    	//echo('<div class="postdivpage">');
    	if (isset($current->title)) {
    		echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 class="posttitle darktext">' . $current->title . "</h1></a>");
		}
		if ($_SESSION["mod"] == "mod") {
			echo('
			<form method="POST" action="delete.php?type=post&post=' . $current->title . '">
        	<input type="submit" class="redbutton" value="Remove Post Permanently" />
        	</form>
			');
		}
    	echo('<p class="timetext">Posted on ' . $current->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $current->poster . '">' . $current->poster . '</a></p><p class="postpagetext darktext">' . $current->text . '</p>');
        if (isset($current->file_ext)) {
					if ($current->file_ext != "") {
            echo('<img class="imgpage" src="imguploads/' . $current->title . $current->file_ext . '" />');
        	}
				}
				//begin like section
				if (!(in_array($_SESSION["username"], $current->likers))) {
					echo('
					<form action="like-process.php?post=' . $_GET["post"] . '" method="POST">
					<input type="image" id="likesubmit" name="submit" alt="Submit" src="waffle-icon.png" />
					<p class="darktext liketext">' . $current->likes . '</p> 
					</form>');
				} else {
					echo('
					<form action="like-process.php?unlike=unlike&post=' . $_GET["post"] . '" method="POST">
					<input type="image" id="likesubmit" name="submit" alt="Submit" src="waffle-icon-grayed.png" />
					<p class="darktext liketext">' . $current->likes . '</p> 
					</form>');
				}
				//end
				echo('
				<form action="comment-process.php" method="POST">
					<input type="text" class="smalltext" name="comment" />
					<input type="submit" class="smallbutton" value="comment" />
				</form>
				');
				//begin comment section
				$file_2="[" . substr(file_get_contents("json/comments.json"), 0, -1) . "]";
				$array_of_comments=json_decode($file_2, JSON_PRETTY_PRINT);
				//print_r($array_of_comments);
				$has_comments = FALSE;
				foreach (array_reverse($array_of_comments) as $current) {
					if ($current["post"] == $_GET["post"]) {
						$has_comments = TRUE;
						$commenter = $current["commenter"];
						$time = $current["time"];
						$comment = $current["comment"];
						echo("<div class='postdiv'>");
						echo("<p class='timetext'>$time<br>By <a style='color:grey; display: inline;'href='user.php?user=$commenter'>$commenter</a></p>");
						echo("<p class='posttext'>$comment</p>");
						echo("</div>");
					}
				}
				if ($has_comments) {
				}
				else {
					echo("<p class='darktext'>No comments found.</p>");
				}
				//end comment section
		//echo("</div>");
		// end useful
	}
}
?>
</div>
<?php include("sidebar.php"); ?>
</body>
</html>
