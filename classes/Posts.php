<?php

class Posts{
    private $databaseHandler;
    private $order = "desc";
    private $posts;

    public function __CONSTRUCT($dbh){
        $this->databaseHandler = $dbh;
    }

    //Fetch all the posts
    public function fetchAll(){
        $query = "SELECT * FROM TestPost";

        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;
    }

    //Fetch the latest post
    public function fetchLatest(){
        $query = "SELECT * FROM TestPost ORDER BY date_posted $this->order LIMIT 1";
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;

    }

    public function getPosts(){
        return $this->posts;
    }

}


?>