<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sign Up!!</title>
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
    } elseif($page == "logout"){
        header("location:handlers/logout.php");
    } elseif($page == "signup"){
        include("views/signupForm.php");
    } elseif($page == "err"){
        echo "<h2> Oops something went wrong, please try again! </h2>";
        include("views/loginForm.php");
        echo '<a href="index.php?page=signup">Register here!</a> <br>';
    } elseif ($page == "adminPage") {
        include("views/adminPage.php");
    } elseif ($page == "adminCreatePost"){
        include("views/createPost.php");
    } elseif ($page == "adminAbout"){
        include("views/adminAbout.php");
    } elseif ($page == "adminContact"){
        include("views/adminContact.php");
    } elseif ($page == "postsuccess") {
        include("views/createPost.php");
    }
    else {

    //Log in a newly registered user
    if (isset($_GET['reg']) && $_GET['reg'] == true) {
        if (isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            if ($_SESSION['role'] == "admin") {
                header("location:index.php?page=adminPage");
            } else {
                echo "<h3>Hello " . $_SESSION['userName'] . "!</h3>" . "<br> <br>";
                echo '<a href="index.php?page=logout">Sign out</a><br>';
            }
        }
    } else { //Log in user or send them to login form with signup option
        if (isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            if ($_SESSION['role'] == "admin") {
                header("location:index.php?page=adminPage");
            } else {
                echo "<h3>Hello " . $_SESSION['userName'] . "!</h3>" . "<br> <br>";
                echo '<a href="index.php?page=logout">Sign out</a><br>';
            }
        }
    }
    }

    

    ?>


</body>

</html>