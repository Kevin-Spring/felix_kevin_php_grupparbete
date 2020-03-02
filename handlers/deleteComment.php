<?php 

$commentId= $_POST['comment_id'];
$commentPostId = $_POST['comment_post_id'];
$getAction = $_GET['action'];

//To delete comments
if (isset($getAction) && $getAction == "deleteComment") {

    //Delete by id query
    $query = "DELETE FROM TestComments WHERE id =" . ':commentId' . " ;";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':commentId', $commentId);
    $return = $sth->execute();

    header("location:index.php?page=edit&action=edit&postId=" . $commentPostId );

} 



?>