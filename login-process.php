<?php
session_start();
date_default_timezone_set("America/New_York");
$file="[" . rtrim(file_get_contents("users.json"), ",") . "]";
$json = json_decode($file);
foreach($json as $current) {
    if($current->username==$_POST["username"]) {
        $correct_password = $current->password;
    }
}
if (isset($correct_password)) {
    if($correct_password==$_POST["password"]) {
        echo("Password Correct");
        $_SESSION["username"] = $_POST["username"];
        $logfile = fopen("log.txt", "a");
        fwrite($logfile, "[LOGIN]: User " . $_SESSION["username"] . " logged in at " . date('m-d-Y h:i:s A') . ".\n");
        fclose($logfile);
        header("Location: home.php");
    }
}
else
    echo("Password or username incorrect.");
?>
