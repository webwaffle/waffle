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
                $json = json_encode($current, JSON_PRETTY_PRINT);
                $json = substr($json, 1, -1);
                $json = $json . ",";
                echo($json);
            }
            
        }
    }
}

//header("Location: you.php");
?>