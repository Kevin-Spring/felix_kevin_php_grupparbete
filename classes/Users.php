<?php

class User{

private $databaseHandler;
private $user;

public function __CONSTRUCT($dbh){
    $this->databaseHandler = $dbh;
}

public function fetchUser(){
    $getUserId = $_GET['userId'];
    
    $query = "SELECT Id FROM Users WHERE Id =" . $getUserId . " ;";
    /* $sth = $this->databasehandler->prepare($query);
    $sth->bindParam(':getId', $getId); */
    $return_array = $this->databaseHandler->query($query);
    $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

    $this->user = $return_array;

}

public function getUser(){
    return $this->user;
}


}
?>