<?php

//Databasvariabler. PDO-PHP.
//PHP VARIABEL-SETUP
$host = "localhost";
$user = "root";
$pass = "";
$db = "Blogg_Grupparbete_Felix_Kevin";


//try och catch är för att kunna fånga errors och visa dem som meddlanden istället för att sidan kraschar totalt.
//try är som det låter, man testar nått.
//om det skiter fångar catch upp det med ett felmeddelande.

//MAKE CONNECTION 
try {
    $dsn = "mysql:host=$host;dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Error!" .  $e->getMessage() . "<br />";
    die;
}
?>