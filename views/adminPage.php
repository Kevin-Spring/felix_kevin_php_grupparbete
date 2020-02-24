<?php 
    session_start();
    if($_SESSION['role'] != "admin"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
    }
?>

<h1>Welcome Admin!</h1>

<ul>
    <li><a href="createPost.php">Create Post</a></li>
    <li><a href="adminAbout.php">About</a></li>
    <li><a href="adminContact.php">Contact</a></li>
    <li><a href="logout.php">Sign out</a></li>
</ul>