<?php
include("../includes/database_connection.php");

if(isset($_POST['COMMENT'])){
    $title = $_POST['comment_title'];
    $content = $_POST['comment_text'];
    $userId = $_POST['user_id'];
    $postId = $_POST['post_id'];

    $query = "INSERT INTO TestComments(userId, postId, commentContent, commentTitle) VALUES( :userID , :postID , :content , :title )";
    
    print_r($_POST);
    echo $query;
    $sth = $dbh->prepare($query);

    //HackerAttack Prohibition
    $sth->bindParam(':content', $content);
    $sth->bindParam(':title', $title);
    $sth->bindParam(':userID', $userId);
    $sth->bindParam(':postID', $postId);
    $return = $sth->execute();

    //print errormessage from database
    if (!$return) {
    print_r($dbh->errorInfo());
                } 
                
    //After a successfull comment return to index site
    header("location:../index.php?page=createComment&action=comment&postId=" . $postId . "&userId=" . $_SESSION['id']);
    

}

?>