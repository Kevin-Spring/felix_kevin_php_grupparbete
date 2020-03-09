<?php 
session_start();

//We send the user back to the userpage with all the correct URL-info
if($_GET['search_query'] && $_GET['userId']){
    header("location:../index.php?page=user&userId=" . $_SESSION['id'] . "&search_query=" . $_GET['search_query']);
} else{
    header("location:../index.php?page=adminPosts&search_query=" . $_GET['search_query']);
}

?>