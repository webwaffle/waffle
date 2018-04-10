<?php
session_start();
$file="[" . substr(file_get_contents("users.json"), 0, -1) . "]";
$json=json_decode($file);
echo($_POST["bio"]);
if (isset($_POST["bio"])) {
    echo("1");
    foreach($json as $current) {
        echo("2");
        if($current->username == $_SESSION["username"]) {
            echo("3");
            if (isset($current->bio)) {
                echo("4");
                //echo("???\n");
                $current->bio = $_POST["bio"];
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                $json_string = substr($json, 1, -1);
                $json_string = $json . ",";
                file_put_contents("users.json", $json_string);
            }

        }
    }
}

//header("Location: you.php");
?>
