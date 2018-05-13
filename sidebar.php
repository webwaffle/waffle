<div id="createpostdiv">
<?php
if (isset($_SESSION["username"]))  {
  echo('<a href="create-post.php"><p id="createpostlink">Create Post</p></a>');
}
$file="[" . substr(file_get_contents("json/users.json"), 0, -1) . "]";
$json=json_decode($file);
if(isset($_SESSION["username"])) {
    foreach ($json as $c) {
        if ($c->username == $_SESSION["username"]) {
            $user = $c;
        }
    }
}
$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$array_of_posts=json_decode($file);
foreach(array_reverse($array_of_posts) as $current) {
    if (isset($_SESSION["username"])) {
        if ($current->poster == $_SESSION["username"] || in_array($current->poster, $user->friends)) {
            dp($current, TRUE);
        }
    } else {
        dp($current, TRUE);
    }
}
?>
</div>
