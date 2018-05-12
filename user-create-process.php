<?php
session_start();
date_default_timezone_set("America/New_York");
if ($_POST["username"] == "" || $_POST["password"] == "") {
	header("Location: index.html");
}
if(!(isset($_POST["rules"]))) {
	echo("You didn't agree to the rules.");
	$agreed = FALSE;
} else {
	$agreed = TRUE;
}
$pswd = file("config.txt")[1];
if ($pswd == $_POST["private_password"] && isset($_GET["private"])) {
	$p = TRUE;
} elseif (!isset($_GET["private"])) {
	$p = TRUE;
} else {
	$p = FALSE;
}
$array = [];
$array["username"] = $_POST["username"];
$array["password"] = $_POST["password"];
$friends = [];
$array["friends"] = $friends;
$json_string = json_encode($array, JSON_PRETTY_PRINT);
if($agreed && $p) {
	file_put_contents("json/users.json", $json_string . ",", FILE_APPEND);
	$_SESSION["username"] = $_POST["username"];
	$logfile = fopen("log.txt", "a");
	$name = $_SESSION["username"];
	$time = date("m-d-Y h:i:s A");
	fwrite($logfile, "[LOGIN]: User $name created and logged in at $time.\n");
    header("Location: home.php");
}
?>
