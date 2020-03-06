<?php 
include("includes/database_connection.php");
include("classes/Posts.php");
include("classes/Users.php");
include("classes/Comments.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sign Up!!</title>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>

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
        echo '<a href="index.php?page=signup">Register here!</a> <br>';
    } elseif ($page == "user"){
        include("views/userPage.php");
    } elseif ($page == "logout"){
        header("location:handlers/logout.php");
    } elseif ($page == "signup"){
        include("views/signupForm.php");
    } elseif ($page == "err"){
        //Displaying erroe message
        echo "<h2> Oops something went wrong, please try again! </h2>";
        include("views/loginForm.php");
        echo '<a href="index.php?page=signup">Register here!</a> <br>';
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
    echo '<a href="index.php?page=signup">Register here!</a> <br>';
    } 

    ?>


</body>

</html>