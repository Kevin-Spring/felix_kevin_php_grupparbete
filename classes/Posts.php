<?php

class Posts{
    private $databaseHandler;
    private $posts;

    public function __CONSTRUCT($dbh){
        $this->databaseHandler = $dbh;
    }

    //Fetch all the posts
    public function fetchAll($order){
        $query = "SELECT * FROM TestPost ORDER BY date_posted $order";

        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;
    }
    // Function to fetch posts by Category
    public function fetchCategory($order){
        $query = "SELECT * FROM TestPost WHERE Category LIKE $order";

        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;
    }
    // Function to fetch posts searched by user
    public function fetchSearch(){
        $searchQuery = $_GET['search_query'];
        $query = "SELECT * FROM TestPost WHERE title LIKE :searchQuery OR content LIKE :searchQuery";

        $sth = $this->databaseHandler->prepare($query);
        $queryParam = '%' . $searchQuery . '%';
        $sth->bindParam(':searchQuery', $queryParam);

        $return_array = $sth->execute();

        $return_array = $sth ->fetchAll(PDO::FETCH_ASSOC);
        $this->posts = $return_array;
    }

    //Fetch the latest post
    /* public function fetchLatest(){
        $query = "SELECT * FROM TestPost ORDER BY date_posted $this->order LIMIT 1";
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->singlePost = $return_array;

    } */

    public function getPosts(){
        return $this->posts;
    }

}

class singlePost{

    private $databaseHandler;
    private $singlePost;

    public function __CONSTRUCT($dbh){
        $this->databaseHandler = $dbh;
    }

    public function fetchSinglePost(){
        $getPostId = $_GET['postId'];
        
        $query = "SELECT * FROM TestPost WHERE id =" . $getPostId . " ;";
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->singlePost = $return_array;

    }

    public function getSinglePost(){
        return $this->singlePost;
    }


}


?>