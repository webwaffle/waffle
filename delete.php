<?php 
if ($_GET["type"] == "user" && isset($_GET["user"])) {
    $file="[" . rtrim(file_get_contents("json/users.json"), ",") . "]";
    $json=json_decode($file);
    foreach($json as $c) {
        if ($c->username == $_GET["user"]) {
            if (isset($_GET["unban"])) {
                $c->level = 0;
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                $json_string2 = substr($json_string, 1, -1);
                $json_string3 = $json_string2 . ",";
                file_put_contents("json/users.json", $json_string3);
                header("Location: user.php?user=" . $_GET["user"]);
            } else {
                $c->level = -1;
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                $json_string2 = substr($json_string, 1, -1);
                $json_string3 = $json_string2 . ",";
                file_put_contents("json/users.json", $json_string3);
                header("Location: user.php?user=" . $_GET["user"]);
            }
        }
    }
}
if ($_GET["type"] == "post" && isset($_GET["post"])) {
    $file="[" . rtrim(file_get_contents("json/posts.json"), ",") . "]";
    $json=json_decode($file);
    foreach($json as $c) {
        if ($c->title == $_GET["post"]) {
            unset($json[array_search($c, $json)]);
            $json_string = json_encode($json, JSON_PRETTY_PRINT);
            $json_string2 = substr($json_string, 1, -1);
            $json_string3 = $json_string2 . ",";
            file_put_contents("json/posts.json", $json_string3);
            header("Location: posts.php?post=" . $_GET["post"]);
        }
    }
}
?>