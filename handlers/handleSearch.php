<?php 
session_start();

//We send the user back to the userpage with all the correct URL-info
if($_GET['search_query']){
    header("location:../index.php?page=user&userId=" . $_SESSION['id'] . "&search_query=" . $_GET['search_query']);
}

?>