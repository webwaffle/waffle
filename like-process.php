<?php 
session_start();
if (isset($_GET["post"]) && !(isset($_GET["unlike"]))) {
    $p = $_GET["post"];
    $file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
    $json=json_decode($file);
    foreach($json as $current) {
        if($current->title == $p) {
            $current->likes++;
            array_push($current->likers, $_SESSION["username"]);
            $json_string = json_encode($json, JSON_PRETTY_PRINT);
            $json_string2 = substr($json_string, 1, -1);
            $json_string3 = $json_string2 . ",";
            file_put_contents("json/posts.json", $json_string3);
            header("Location: posts.php?post=$p");
        }
    }
} elseif (isset($_GET["post"]) && isset($_GET["unlike"])) {
    $p = $_GET["post"];
    $file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
    $json=json_decode($file);
    foreach($json as $current) {
        if($current->title == $p) {
            $current->likes--;
            $i = array_search($_SESSION["username"], $current->likers);
            unset($current->likers[$i]);
            $json_string = json_encode($json, JSON_PRETTY_PRINT);
            $json_string2 = substr($json_string, 1, -1);
            $json_string3 = $json_string2 . ",";
            file_put_contents("json/posts.json", $json_string3);
            header("Location: posts.php?post=$p");
        }
    }
}
?>