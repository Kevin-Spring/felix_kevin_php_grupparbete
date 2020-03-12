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

    <link rel="stylesheet" href="css\style.css">
     <!-- link for icons -->
     <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />

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


        //Prevent people from entering site without login
        if(@$_SESSION['role'] != "user"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
        }

        // Navbar
        echo "<nav>\n";
        echo "<ul>\n";
        echo "  <li><a class=\"active\" href=\"#home\">Home</a></li>\n";
        echo "  <li><a href=\"#news\">About</a></li>\n";
        echo "  <li><a href=\"#contact\">Contact</a></li>\n";
        echo "</ul>\n";
        echo'<div class="btn-signOut">' . '<i class="fas fa-sign-out-alt">' . '</i>' . '<a href="index.php?page=logout">Sign out</a>' . '</div>' . '</nav>'; 
        echo "</nav>\n";

        // Header + Greeting User
        echo "<header> \n";
        echo "    <h1>Welcome " . $_SESSION['userName'] . " to Millhouse Blog</h1>\n";
        echo "    <h2> Sunglasses Interior & Watches</h2>\n";
        echo "</header>\n";
        

        //Showing all posts
        $posts = new Posts($dbh);
        $posts->fetchAll("desc");

        foreach($posts->getPosts() as $post){
        echo  '<div class="post-container">';
        echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
        echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
        echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
        echo  '<div class="post-content">' . $post['content'] . '</div>';

        //Link to Create comment
        echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Read more!</a>";
        echo '</div>';
       } 


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
    echo '<a href="index.php?page=signup">Register here!</a> <br>';
    } 

    ?>


<button class="btn-top" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>