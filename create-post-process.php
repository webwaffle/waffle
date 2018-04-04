<?php
session_start();
date_default_timezone_set("America/New_York");
$array = $_POST;
$array["poster"] = $_SESSION["username"];
$array["time"] = date('m-d-Y h:i:s A');
$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("posts.json", $json_string . ",", FILE_APPEND)) {
	header("Location: home.php");
}
else
	echo("error");
?>