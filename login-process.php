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
    $logfile = fopen("log.txt", "w");
    fwrite($logfile, "[LOGIN]: User " . $_SESSION["username"] . " logged in at " . date('m-d-Y h:i:s A') . ".");
    fclose($logfile);
    header("Location: home.php");
}
else
    echo("Password Incorrect: " . $_POST["password"]);
?>