<?php
session_start();
$file="[" . substr(file_get_contents("users.json"), 0, -1) . "]";
$json=json_decode($file);
foreach($json as $current) {
    if($current->username==$_POST["username"]) {
        $correct_password = $current->password;
    }
}
if($correct_password==$_POST["password"]) {
    echo("Password Correct");
    $_SESSION["username"] = $_POST["username"];
    header("Location: home.php");
}
else
    echo("Password Incorrect: " . $_POST["password"]);
?>