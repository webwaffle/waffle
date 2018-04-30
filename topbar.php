<nav>
    <h1 style="text-align: center; margin-top: 5px;">Waffle</h1>
    <ul>
        <li><a class="topbarlink" href="home.php">Home</a></li>
        <li><a class="topbarlink" href="https://github.com/webwaffle/waffle">Code</a></li>
        <li><a class="topbarlink" href="logout.php">Logout</a></li>
        <li><a class="topbarlink" href="you.php">My Profile</a></li>
        <li><a class="topbarlink" href="friends.php">My Friends</a></li>
        <li><a class="topbarlink" href="user-find.php">Find a user</a></li>
        <li><a class="topbarlink" href="about.php">About</a></li>
        <li class="topbarlink"><?php echo($_SESSION["username"]); ?></li>
    </ul>
</nav>
