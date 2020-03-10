<?php
include("../includes/database_connection.php");
session_start();

    if(isset($_POST['COMMENT'])){

        if(!empty($_POST['comment_title'] && $_POST['comment_text'])){
        $title = $_POST['comment_title'];
        $content = $_POST['comment_text'];
        $title = htmlspecialchars($title);
        //$content = htmlspecialchars($content);

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
        

    } else {
        echo "Oops something went wrong! Make sure you entered all the needed info";
    }
}   

?>