<nav>
    <h1 style="text-align: center; margin-top: 0px; padding: 4px;">Waffle</h1>
    <ul>
        <li><a class="topbarlink" href="home.php">Home</a></li>
        <li><a class="topbarlink" href="https://github.com/webwaffle/waffle">Code</a></li>
        <li><a class="topbarlink" href="logout.php">Logout</a></li>
        <li><a class="topbarlink" href="friends.php">My Friends</a></li>
        <li><a class="topbarlink" href="user-find.php">Find a user</a></li>
        <li class="topbarlink">
        <?php if (isset($_SESSION["username"])) {
$u = $_SESSION["username"];
$n = 0;
$file="[" . rtrim(file_get_contents("json/messages.json"), ",") . "]";
$json=json_decode($file);
foreach($json as $c) {
    if($c->receiver == $u && $c->read == "unread") {
        $n++;
    }
}
if ($n == 0 || $n > 1) {
    $str = " Unread Messages";
} else {
    $str =" Unread Message";
}
echo($n . $str);
        }
        ?>
        </li>
        <li class="dropdown-button"><a class="topbarlink" href="about.php">About</a></li>
        <li class="topbarlink right"><a href="you.php" class="topbarlink">
        <?php 
        if (isset($_SESSION["username"])) {
            echo("Logged in as " . $_SESSION["username"]);
        } else {
            echo('
            <a class="topbarlink" href="index.html" style="display: inline;">Sign in</a><p class="topbarlink" style="display: inline;"> or </p><a class="topbarlink" href="user-create.php" style="display: inline;">Sign up</a>
            ');
        }
        ?>
        </a></li>
    </ul>
</nav>
