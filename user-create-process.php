<?php
session_start();
$json_string = json_encode($_POST, JSON_PRETTY_PRINT);
if(file_put_contents("users.json", $json_string . ",", FILE_APPEND)) {
	$_SESSION["username"] = $_POST["username"];
    header("Location: home.php");
}
else
	echo("error");
?>