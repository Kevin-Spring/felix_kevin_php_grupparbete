<?php 

    @session_start();
    if(@$_SESSION['role'] != "admin"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
    }
?>

<h1>Welcome Admin!</h1>

<ul>
    <li><a href="index.php?page=adminCreatePost">Create Post</a></li>
    <li><a href="index.php?page=adminPosts">Your posts</a></li>
    <li><a href="index.php?page=adminAbout">About</a></li>
    <li><a href="index.php?page=adminContact">Contact</a></li>
    <li><a href="handlers/logout.php">Sign out</a></li>
</ul>