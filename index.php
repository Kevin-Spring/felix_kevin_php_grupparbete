
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sign Up!!</title>
</head>
<body>

<?php 
    //starts session to check users session credentials
    session_start();
    //failed login prints errormessage
    echo(isset($_GET['err']) && $_GET['err']==true ? "<h2> Oops something went wrong, please try again! </h2>" : "");

    //Used to log in a newly registered user
    if(isset($_GET['reg']) && $_GET['reg']==true){
        if(isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            if($_SESSION['role'] == "admin"){
                header("location:views/adminPage.php");
              }else{
                echo "<h3>Hello " .$_SESSION['userName'] ."!</h3>" . "<br> <br>";
            } 
        }
    }else{ //Usage: Log in user or send them to login form with signup option
        if(isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            if($_SESSION['role'] == "admin"){
                header("location:views/adminPage.php");
              }else{
                echo "<h3>Hello " .$_SESSION['userName'] ."!</h3>" . "<br> <br>";
            } 
        } else {
            include("views/loginForm.php");
            echo '<a href="views/signupForm.php">Register here!</a> <br>';
        }
    }
    //Log out user if session is active
    if(!empty($_SESSION)){
        echo '<a href="views/logout.php">Sign out</a><br>';
    }
   
?>

    
</body>
</html>


