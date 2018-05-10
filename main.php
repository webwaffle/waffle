<?php 
function dp($post, $light) {
    if ($light) {
        echo('<div class="postdivsidebar">');
        if (isset($post->title)) {
            echo('<a href="posts.php?post=' . $post->title . '">' . '<h1 style="color:#0a1128;" class="posttitle">' . $post->title . "</h1></a>");
        }
        echo('<p class="timetext">Posted on ' . $post->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $post->poster . '">' . $post->poster . '</a></p><p class="posttext" style="color: #0a1128;">' . $post->text . '</p>');
        if (isset($post->file_ext)) {
            if ($post->file_ext != "") {
                echo('<img width="32" height="32" class="imgpage" src="imguploads/' . $post->title . $post->file_ext . '" />');
            }
        }
    echo("</div>");
    } else {
        echo('<div class="postdiv">');
        if (isset($post->title)) {
        	echo('<a href="posts.php?post=' . $post->title . '">' . '<h1 class="posttitle">' . $post->title . "</h1></a>");
	    }
        echo('<p class="timetext">Posted on ' . $post->time . '<br>By <a style="color:grey; display: inline;" href="user.php?user=' . $post->poster . '">' . $post->poster . '</a></p><p class="posttext">' . $post->text . '</p>');
        if (isset($post->file_ext)) {
          if ($post->file_ext != "") {
            echo('<img width="32" height="32" class="imgpage" src="imguploads/' . $post->title . $post->file_ext . '" />');
          }
        }
        echo("</div>");
    }
}
?>