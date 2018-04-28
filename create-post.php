<?php session_start(); ?>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <script type="text/javascript" src="js/lib/less.js"></script>
    </head>
<body>
    <?php include("topbar.php"); ?>

<div id="main">
    <form action="create-post-process.php" method="POST" style="overflow: hidden;" enctype="multipart/form-data">
    <input name="title" type="text"/>
    <textarea name="text" cols="40" rows="5"></textarea>
    <input type="file" name="file" class="smallbutton">
    <input type="submit" />
    </form>
</div>
<?php include("sidebar.php"); ?>
    </body>
</html>
