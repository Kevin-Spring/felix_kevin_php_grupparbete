<?php

class User{

private $databaseHandler;
private $user;

public function __CONSTRUCT($dbh){
    $this->databaseHandler = $dbh;
}

public function fetchUser(){
    $getUserId = $_GET['userId'];
    
    $query = "SELECT Id FROM Users WHERE Id = :getId";

    $sth = $this->databaseHandler->prepare($query);
    $queryParam = '%' . $getUserId . '%';
    $sth->bindParam(':getId', $queryParam);
    $return_array = $sth->execute();
    $return_array = $sth ->fetchAll(PDO::FETCH_ASSOC);
    $this->user = $return_array;

}

public function getUser(){
    return $this->user;
}


}
?>