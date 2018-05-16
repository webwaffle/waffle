<?php
$file="[" . rtrim(file_get_contents("json/users.json"), ",") . "]";
$json=json_decode($file);
foreach($json as $c) {
    if (!(isset($c->level))) {
        $c->level = 0;
    }
}
$json_string = json_encode($json, JSON_PRETTY_PRINT);
$json_string2 = substr($json_string, 1, -1);
$json_string3 = $json_string2 . ",";
file_put_contents("json/users.json", $json_string3);
?>