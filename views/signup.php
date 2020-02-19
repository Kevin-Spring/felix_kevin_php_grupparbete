<?php 
include("../includes/database_connection.php");

$createfirstName = $_POST['create_first_Name'];
$createlastName = $_POST['create_last_Name'];
$createUsername = $_POST['create_user_name'];
$createPassword = md5($_POST['create_password']);
$createUserEmail = $_POST['create_user_Email'];

$query = "INSERT INTO Users(firstName, lastName, userName, userPassword, email) VALUES('$createfirstName', '$createlastName', '$createUsername', '$createPassword', '$createUserEmail');";
//exec returner bara om det är sant eller falskt
$return = $dbh->exec($query);

if(!$return){
    print_r($dbh->errorInfo());
}

header("location:../index.php");

?>
