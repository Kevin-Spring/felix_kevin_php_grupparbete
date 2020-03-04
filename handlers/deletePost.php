<?php
    
    @session_start();
    if(@$_SESSION['role'] != "admin"){
    echo "<h2>Access denied dude, nice try..</h2>";
    die;
}

$getAction = $_GET['action'];

//To delete comments
if (isset($getAction) && $getAction == "delete") {

    $getPostId = $_GET['postId'];

    //Delete by id query
    $query = "DELETE FROM TestComments WHERE postId = :getId; DELETE FROM TestPost WHERE id = :getId;";

    $sth = $dbh->prepare($query);
    $sth->bindParam(':getId', $getPostId);
    $return = $sth->execute();

    unlink("handlers/" . $_GET['imgId']);

    if (!$return) {
        print_r($dbh->errorInfo());
    } 

    header("location:index.php?page=adminPosts");

} 

?>