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
