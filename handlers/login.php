<?php
include("../includes/database_connection.php");


$postUsername = $_POST['user_name'];
//$postEmail = $_POST['user_name'];
$postPassword = md5($_POST['password']);


//Checks with database if entered information is correct
$query = "SELECT Id, userName, userPassword, role FROM Users WHERE userName= :postUsername AND userPassword= :postPassword";

$sth = $dbh->prepare($query);
$sth->bindParam(':postUsername', $postUsername);
$sth->bindParam(':postPassword', $postPassword);
$row = $sth->execute();
//Fetch the users details from database
$row = $sth ->fetch(PDO::FETCH_ASSOC);

//Failed log in returns user to index site with error message
if (empty($row)) {
    header("location:../index.php?page=err");

} elseif($row['role'] == 'user') {
    //Start User session
    session_start();
    //Creates session to log in user with provided information
    $_SESSION['userName'] = $row['userName'];
    //$_SESSION['userName'] = $row['email'];
    $_SESSION['userPassword'] = $row['userPassword'];
    $_SESSION['id'] = $row['Id'];
    $_SESSION['role'] = 'user';

    //User will be logged in at index site
    header("location:../index.php?page=user&userId=". $_SESSION['id']);
} else{
    //Start Admin session
    session_start();
    $_SESSION['userName'] = $row['userName'];
    //$_SESSION['userName'] = $row['email'];
    $_SESSION['userPassword'] = $row['userPassword'];
    $_SESSION['role'] = 'admin';

    //Admin will be logged in & directed to adminPage
    header("location:../index.php?page=adminPage");
}

?>
