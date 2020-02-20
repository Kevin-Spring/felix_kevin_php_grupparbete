<?php 
include("../includes/database_connection.php");


$postUsername = $_POST['user_name'];
//$postEmail = $_POST['user_name'];
$postPassword = md5($_POST['password']);

//DET HÄR ÄR FÖR ATT SE OM NÅGON SKRIVIT IN RÄTT DETALJER OCH KAN LOGGAS IN
$query = "SELECT id, userName, userPassword FROM Users WHERE userName='$postUsername' AND userPassword='$postPassword'"; 
//query returnerar datan
$return = $dbh->query($query);
//DET HÄR ÄR FÖR ATT HÄMTA ANVÄNDARENS DETALJER FRÅN DATABSEN
$row = $return->fetch(PDO::FETCH_ASSOC);

//OM DU INTE KAN LOGGA IN REDIRECTAS DU TILL INDEX SIDAN
//ELSE SKRIV UTA DU KAN LOGGA IN
if(empty($row)){
    header("location:../index.php?err=true");
}else {
    //Om vi skapar en session, så kan vi skapa en cookie just för den här sessionen.
    //Försvinner när browsern stängs
    session_start();
    $_SESSION['userName'] = $row['userName'];
    //$_SESSION['userName'] = $row['email'];
    $_SESSION['userPassword'] = $row['userPassword'];

    header("location:../index.php");
}

?>
<!-- OR email='$postEmail'    -->
