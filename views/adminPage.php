<?php 

    @session_start();
    if(@$_SESSION['role'] != "admin"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
    }
?>

<body class="admin-page">
    

<h2 class="lg-heading">Welcome Admin!</h2>

<div class="admin-container">
    
        <a class="btn-dark" href="index.php?page=adminCreatePost"><i class="fas fa-plus"></i>  Create Post</a>
        <a class="btn-dark" href="index.php?page=adminPosts"><i class="fas fa-eye"></i>  Your posts</a>
        <a class="btn-dark" href="index.php?page=adminAbout"><i class="fas fa-user"></i>  About</a>
        <a class="btn-dark" href="index.php?page=adminContact"><i class="fas fa-envelope"></i>  Contact</<a>
        <a class="btn" href="handlers/logout.php"><i class="fas fa-sign-out-alt"></i>  Sign out</a>

</div>
</body>