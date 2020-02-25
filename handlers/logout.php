<?php
//Destroys session aka log out user and clean session cookie
session_start();
session_destroy();

//send user to index site
header("location:../index.php?page=login")
?>