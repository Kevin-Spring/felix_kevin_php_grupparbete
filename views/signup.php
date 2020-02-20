<?php 
include("../includes/database_connection.php");

$createFirstName = $_POST['create_first_Name'];
$createLastName = $_POST['create_last_Name'];
$createUsername = $_POST['create_user_name'];
$createPassword = md5($_POST['create_password']);
$createUserEmail = $_POST['create_user_Email'];





if(empty($createUsername)){
    header("location:../index.php?err=true");
    echo "Hoppsan du klantade dig";
}else{
    $query = "INSERT INTO Users(firstName, lastName, userName, userPassword, email) VALUES('$createFirstName', '$createLastName', '$createUsername', '$createPassword', '$createUserEmail');";
    //exec returner bara om det är sant eller falskt
    $return = $dbh->exec($query);
    session_start();
    $_SESSION['userName'] = $createUsername;
    $_SESSION['userPassword'] = $createPassword;

    header("location:../index.php?reg=true");
    if(!$return){
        print_r($dbh->errorInfo());
    }
}



?>
