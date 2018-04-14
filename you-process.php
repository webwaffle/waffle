<?php
session_start();
$file="[" . substr(file_get_contents("users.json"), 0, -1) . "]";
$json=json_decode($file);
//echo($_POST["bio"]);
//echo($_POST["bio_new"]);
if (isset($_POST["bio"]) or isset($_POST["bio_new"])) {

    foreach($json as $current) {
        //echo("2");
        if($current->username == $_SESSION["username"]) {
            //echo("3");
            if (isset($current->bio)) {
                //echo("4");
                //echo("???\n");
                $current->bio = $_POST["bio"];
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                $json_string2 = substr($json_string, 1, -1);
                $json_string3 = $json_string2 . ",";
                file_put_contents("users.json", $json_string3);
            }
            else {
              $current->bio = $_POST["bio_new"];
              $json_string = json_encode($json, JSON_PRETTY_PRINT);
              $json_string2 = substr($json_string, 1, -1);
              $json_string3 = $json_string2 . ",";
              file_put_contents("users.json", $json_string3);
            }
        }
    }
}

header("Location: you.php");
?>
