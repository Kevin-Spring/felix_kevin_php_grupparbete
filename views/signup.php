<?php 
include("../includes/database_connection.php");

$createFirstName = $_POST['create_first_Name'];
$createLastName = $_POST['create_last_Name'];
$createUsername = $_POST['create_user_name'];
$createPassword = md5($_POST['create_password']);
$createUserEmail = $_POST['create_user_Email'];

//checks to see if any fields are empty and will return a errormessage at the singupform site
if(empty($createUsername) || empty($createPassword) || empty($createFirstName) || empty($createLastName) || empty($createUserEmail)){
    header("location:signupForm.php?err=true");
}else if(!empty($createUserName) || !empty($createUserEmail)){
    //Query to see if username or mail already exists
    $query = "SELECT * FROM Users WHERE userName='$createUsername' OR email='$createUserEmail'";
    $return = $dbh->query($query);
    //database response to query
    $row = $return->fetch(PDO::FETCH_ASSOC);

    //if the response is true it means username or email already exists
    if($row == true){
        header("location:signupForm.php?reg=exists");
    }
    //if it deosn't exists we push the information into the database
    else{
        $query = "INSERT INTO Users(firstName, lastName, userName, userPassword, email) VALUES('$createFirstName', '$createLastName', '$createUsername', '$createPassword', '$createUserEmail');";
        $return = $dbh->exec($query);
        
        /* //Starts a session with the registered username and password to make a direct log-in possible
        session_start();
        $_SESSION['userName'] = $createUsername;
        $_SESSION['userPassword'] = $createPassword;
    
        //Sends user to the index were they'll be logged in
        header("location:../index.php?reg=true"); */
        if(!$return){
            print_r($dbh->errorInfo());
        }
    }
}


?>