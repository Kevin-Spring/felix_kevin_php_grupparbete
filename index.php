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
    <!-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> -->
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

        //Prevent people from entering site without login
        if(@$_SESSION['role'] != "user"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
        }
        //Greeting User
        echo "<h3>Hello " . $_SESSION['userName'] . "!</h3>" . "<br> <br>";
        echo '<a href="index.php?page=logout">Sign out</a><br>'; 

        //Showing all posts
        $posts = new Posts($dbh);
        $posts->fetchAll();

        foreach($posts->getPosts() as $post){
        echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
        echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
        echo  "<hr>";
        echo  "<div>" . $post['content'] . "</div>";
        
        echo "<hr>";

        //Link to Create comment
        echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
       } 

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
        echo "<h1>Your posts!</h1>";
        echo "<a href='index.php?page=adminCreatePost'>Create another post!</a>";
        echo "<br>";
        echo "<a href='index.php?page=adminPage'>Back</a>";

        //Display all posts
        $posts = new Posts($dbh);
        $posts->fetchAll();

    
      foreach($posts->getPosts() as $post){
      echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
      echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
      echo "<div>" . "<h4>" . "Category: ". $post['Category']. "<h4>". "</div>";
      echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
      echo  "<hr>";
      echo  "<div>" . $post['content'] . "</div>";
      echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";

     }

    } elseif ($page == "edit"){
        include("handlers/editPost.php");
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