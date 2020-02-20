
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Sign Up!!</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">
</head>
<body>

<?php 
    session_start();
    echo(isset($_GET['err']) && $_GET['err']==true ? "<h2> Hoppsan! Något gick fel! </h2>" : "");

    if(isset($_GET['reg']) && $_GET['reg']==true){

        if(isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            echo "<h3>Hej " .$_SESSION['userName'] ."!</h3>" . "<br> <br>";
            echo '<a href="views/logout.php">Logga ut!</a>';
        }
        
    }else{
        if(isset($_SESSION['userName']) && isset($_SESSION['userPassword'])) {
            echo "<h3>Hej " .$_SESSION['userName'] ."!</h3>" . "<br> <br>";
            echo '<a href="views/logout.php">Logga ut!</a>';
        } else {
            include("views/loginForm.php");
            echo '<a href="views/signupForm.php">Register here!!</a>';
        }
    }
   
?>

    
</body>
</html>


