<?php

//PHP-SETUP
$host = "localhost";
$user = "root";
$pass = "";
$db = "Blogg_Grupparbete_Felix_Kevin";

//MAKE CONNECTION 
try {
    $dsn = "mysql:host=$host;dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Error!" .  $e->getMessage() . "<br />";
    die;
}
?>