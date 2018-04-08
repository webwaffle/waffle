<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
    <nav>
        <h1 style="text-align: center;">Waffle</h1>
        <ul>
            <li><a class="topbarlink" href="home.php">Home</a></li>
            <li><a class="topbarlink" href="https://github.com/webwaffle/waffle">Code</a></li>
            <li><a class="topbarlink" href="logout.php">Logout</a></li>
            <li><a class="topbarlink" href="about.php">About</a></li>
        </ul>
    </nav>
    
    <div id="main">
        <?php 
        $file="[" . substr(file_get_contents("users.json"), 0, -1) . "]";
        $json=json_decode($file);
        foreach($json as $current) {
            if($current->username==$_SESSION["username"]) {
                $you = array();
                $you["username"] = $_SESSION["username"];
                if (isset($current->bio)) {
                    $you["bio"] = $current->bio;
                    echo('
                    <form action="you-process.php">
                    <textarea rows="5" cols="40">' . $current->bio . '</textarea>
                    <input type="submit" value="Change bio" />
                    </form>
                    ');
                }
                else
                    echo('
                    <form action="you-process.php">
                    <textarea name="bio" rows="5" cols="40">Describe yourself...</textarea>
                    <input type="submit" value="Add bio" />
                    </form>
                    ');
            }
        }
        ?>
    </div>
    
    <div id="createpostdiv">
    	<a href="create-post.php"><p id="createpostlink">Create Post</p></a>
        <?php
    $file="[" . substr(file_get_contents("posts.json"), 0, -1) . "]";
    $array_of_posts=json_decode($file);
    foreach(array_reverse($array_of_posts) as $current) {
        if ($current->poster == $_SESSION["username"]) {
            echo('<div class="postdiv">');
            if (isset($current->title)) {
                echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 class="posttitle">' . $current->title . "</h1></a>");
            }
        echo('<p class="timetext">Posted on ' . $current->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $current->poster . '">' . $current->poster . '</a></p><p class="posttext">' . $current->text . '</p>');
        if (isset($current->file_ext)) {
            echo('<img width="32" height="32" class="imgpage" src="imguploads/' . $current->title . $current->file_ext . '" />');
        }
        echo("</div>");
    }
}
?>
	</div>
    </body>
</html>