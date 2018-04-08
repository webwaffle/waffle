<?php 
session_start();
if (isset($_POST["bio"])) {
    $file="[" . substr(file_get_contents("users.json"), 0, -1) . "]";
    $json=json_decode($file);
    foreach($json as $current) {
        if($current->username==$_SESSION["username"]) {
            
            if (isset($current->bio)) {
                $current->bio = $_POST["bio"];
                $json = json_encode($current, JSON_PRETTY_PRINT);
                $json = substr($json, 1, -1);
                $json = $json . ",";
                echo($json);
            }
            
        }
    }
}
?>