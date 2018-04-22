<div id="createpostdiv">
  <a href="create-post.php"><p id="createpostlink">Create Post</p></a>
    <?php
$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);
foreach(array_reverse($array_of_posts) as $current) {
    if ($current->poster == $_SESSION["username"]) {
        echo('<div class="postdivsidebar">');
        if (isset($current->title)) {
            echo('<a href="posts.php?post=' . $current->title . '">' . '<h1 style="color:#0a1128;" class="posttitle">' . $current->title . "</h1></a>");
        }
    echo('<p class="timetext">Posted on ' . $current->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $current->poster . '">' . $current->poster . '</a></p><p class="posttext" style="color: #0a1128;">' . $current->text . '</p>');
    if (isset($current->file_ext)) {
      if ($current->file_ext != "") {
        echo('<img width="32" height="32" class="imgpage" src="imguploads/' . $current->title . $current->file_ext . '" />');
      }
    }
    echo("</div>");
}
}
?>
<div id="friends">
  <?php
  $file="[" . substr(file_get_contents("json/users.json"), 0, -1) . "]";
  $json=json_decode($file);
  //get user object
  foreach ($json as $current) {
    if ($current->username == $_SESSION["username"]) {
      $user = $current;
    }
  }
  //end
  foreach ($user->friends as $current) {
    echo('<a class="friend" href="user.php?user=' . $current . '">' . $current . '</a>');
  }
   ?>
</div>
</div>
