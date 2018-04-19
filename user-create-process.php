<?php
session_start();
date_default_timezone_set("America/New_York");
$array = $_POST;
$friends = ["example"];
array_push($array, $friends);
$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("json/users.json", $json_string . ",", FILE_APPEND)) {
	$_SESSION["username"] = $_POST["username"];
	$logfile = fopen("log.txt", "a");
	$name = $_SESSION["username"];
	$time = date("m-d-Y h:i:s A");
	fwrite($logfile, "[LOGIN]: User $name created and logged in at $time.\n");
    header("Location: home.php");
}
else
	echo("error");
?>
