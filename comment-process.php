<?php
session_start();
$array = $_POST;
$array["commenter"] = $_SESSION["username"];
$array["post"] = $_SESSION["post"];
$array["time"] = date("m-d-Y h:i:s A");
$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("json/comments.json", $json_string . ",", FILE_APPEND)) {
	//header("Location: posts.php?post=" . $_SESSION["post"]);
}
?>
