<?php
session_start();
date_default_timezone_set("America/New_York");
$array = $_POST;
$array["poster"] = $_SESSION["username"];
$array["time"] = date('m-d-Y h:i:s A');
$logfile = fopen("log.txt", "a");
fwrite($logfile, "[POST]: User " . $_SESSION["username"] . " posted with title \"" . $array["title"] . "\" at " . date("m-d-Y h:i:s A") . ".\n");
fclose($logfile);

if(!empty($_FILES['file']))
  {
    $path = "imguploads/";
    $path = $path . basename( $_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
      echo($_FILES['file']['name']);
      echo($_FILES['file']['tmp_name']);
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("posts.json", $json_string . ",", FILE_APPEND)) {
	//header("Location: home.php");
}
else
	echo("error");
?>