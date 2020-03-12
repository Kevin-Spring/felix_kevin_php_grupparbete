<?php 
include("includes/database_connection.php");
include("classes/Posts.php");
include("classes/Users.php");
include("classes/Comments.php");
include("includes/header.php");
include("includes/footer.php");
?>

<body>

    <?php

    //starts session to check users session credentials
    session_start();

    //failed login prints errormessage
    echo (isset($_GET['err']) && $_GET['err'] == true ? "<h2> Oops something went wrong, please try again! </h2>" : "");

    $page = (isset($_GET['page'])) ? $_GET['page'] : "";


    //Options for what page to include on the index site
    if ($page == "login") {
        include("views/loginForm.php");
        echo '<a href="index.php?page=signup" id="register">Register here!</a> <br>';
    } elseif ($page == "user"){

        include("includes/navbar.php");
        include("views/userPage.php");
        
    } elseif ($page == "logout"){
        header("location:handlers/logout.php");
    } elseif ($page == "signup"){
        include("views/signupForm.php");
    } elseif ($page == "err"){
        //Displaying error message
        echo '<div id="errormsg"> Oops something went wrong, please try again! </div>';
        include("views/loginForm.php");
        echo '<a href="index.php?page=signup" id="register">Register here!</a> <br>';
    } elseif ($page == "createComment"){
        include("views/createComment.php");
    } elseif ($page == "adminPage") {
        include("views/adminPage.php");
    } elseif ($page == "adminCreatePost"){
        include("views/createPost.php");
    } elseif ($page == "adminAbout"){
        include("views/adminAbout.php");
    } elseif ($page == "adminContact"){
        include("views/adminContact.php");
    } elseif ($page == "adminPosts") {
        include("views/adminPosts.php");
    } elseif ($page == "edit"){
        include("views/editPost.php");
    } elseif ($page == "delete"){
        include("handlers/deletePost.php");
    } elseif ($page == 'deleteComment'){
        include("handlers/deleteComment.php");
    } else {
    //Displaying the loginform on the base index.php site
    include("views/loginForm.php");
    echo '<a href="index.php?page=signup" id="register">Register here!</a> <br>';
    } 

    ?>


<button class="btn-top" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


