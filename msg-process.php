<?php
session_start();
$array = [];
$array["sender"] = $_SESSION["username"];
$array["receiver"] = $_GET["rec"];
$array["message"] = $_POST["message"];
$json_string = json_encode($array, JSON_PRETTY_PRINT);
file_put_contents("json/messages.json", $json_string . ",", FILE_APPEND);
$s = $array["receiver"];
header("Location: user.php?user=$s");
?>
