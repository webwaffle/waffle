<?php
session_start();
date_default_timezone_set("America/New_York");
$array = $_POST;
$array["poster"] = $_SESSION["username"];
$array["time"] = date('m-d-Y h:i:s A');
$logfile = fopen("log.txt", "a");

$file="[" . substr(file_get_contents("json/posts.json"), 0, -1) . "]";
$json=json_decode($file);
foreach($json as $current) {
    if($current->title==$array["title"]) {
        echo("There is already a post with that title.");
    }
}

fwrite($logfile, "[POST]: User " . $_SESSION["username"] . " posted with title \"" . $array["title"] . "\" at " . date("m-d-Y h:i:s A") . ".\n");
fclose($logfile);

if(!empty($_FILES['file']))
  {
    $path = "imguploads/";
    $path = $path . $array["title"] . substr($_FILES['file']['name'], strripos($_FILES['file']['name'], '.'));
    $array["file_ext"] = substr($_FILES['file']['name'], strripos($_FILES['file']['name'], '.'));
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
      //echo($_FILES['file']['name'] . "\n");
      //echo($_FILES['file']['tmp_name'] . "\n");
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

$json_string = json_encode($array, JSON_PRETTY_PRINT);
if(file_put_contents("json/posts.json", $json_string . ",", FILE_APPEND)) {
	header("Location: home.php");
}
else
  echo("error");
?>