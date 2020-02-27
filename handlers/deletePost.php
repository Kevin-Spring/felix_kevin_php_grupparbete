<?php

include("../includes/database_connection.php");

$getAction = $_GET['action'];

//To delete comments
if (isset($getAction) && $getAction == "delete") {

    
    $getId = $_GET['id'];

    //Delete by id query
    $query = "DELETE FROM TestPost WHERE id =" . ':getId' . " ;";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':getId', $getId);
    $return = $sth->execute();

    header("location:../index.php?page=adminPosts");

} 

?>