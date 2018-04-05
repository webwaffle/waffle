<?php
session_start();
date_default_timezone_set("America/New_York");
$array = $_POST;
$array["poster"] = $_SESSION["username"];
$array["time"] = date('m-d-Y h:i:s A');
$logfile = fopen("log.txt", "a");
fwrite($logfile, "[POST]: User " . $_SESSION["username"] . " posted with title \"" . $array["title"] . "\" at " . date("m-d-Y h:i:s A") . ".\n");
fclose($logfile);

$target_dir = "imguploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("posts.json", $json_string . ",", FILE_APPEND)) {
	header("Location: home.php");
}
else
	echo("error");
?>