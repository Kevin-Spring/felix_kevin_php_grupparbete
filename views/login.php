<?php
include("../includes/database_connection.php");


$postUsername = $_POST['user_name'];
//$postEmail = $_POST['user_name'];
$postPassword = md5($_POST['password']);


//Checks with database if entered information is correct
$query = "SELECT id, userName, userPassword FROM Users WHERE userName='$postUsername' AND userPassword='$postPassword'";
$return = $dbh->query($query);
//Fetch the users details from database
$row = $return->fetch(PDO::FETCH_ASSOC);

//Failed log in returns user to index site with error message
if (empty($row)) {
    header("location:../index.php?err=true");
} else {

    //Creates session to log in user with provided information
    session_start();
    $_SESSION['userName'] = $row['userName'];
    //$_SESSION['userName'] = $row['email'];
    $_SESSION['userPassword'] = $row['userPassword'];

    //User will be logged in at index site
    header("location:../index.php");
}

?>
<!-- OR email='$postEmail'    -->