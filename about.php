<?php session_start(); ?>
<html>
<head>
<title>About Waffle</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" />
<script src="js/lib/jquery.js"></script>
<style>
    .centered {
        text-align: center;
    }
    .link {
        text-decoration: underline;
        display: inline;
        color: black;
        padding: 0;
    }
    .button {
        padding: 5px;
        text-align: center;
        border: 1px solid #0A1128;
        border-radius: 20px;
        background-color: #0A1128;
        width: 100px;
        height: 50px;
        margin: 0 auto;
    }
</style>
</head>
<body>
    <h1 class="darktext centered" id="slogan">Waffle: 100% Organic Social Media</h1>
    <p class="darktext centered">Waffle is a free, <a href="https://github.com/webwaffle/waffle" class="link">open source</a> social media site.<br>
    We do not share your data with any third parties. <br></p>
    <a href="user-create.html" class="button">Create My Account</a>
</body>
</html>