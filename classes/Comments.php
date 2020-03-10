<?php 
    class Comments{
    private $databaseHandler;
    private $comments;
    //private $singlePost;

    public function __CONSTRUCT($dbh){
        $this->databaseHandler = $dbh;
    }

    //Fetch all the posts
    public function fetchComments(){
        $getPostId = $_GET['postId'];
        $query = "SELECT * FROM TestComments JOIN Users ON Users.Id = userId WHERE postId =:getPostId";

        $sth = $this->databaseHandler->prepare($query);
        $sth->bindParam(':getPostId', $getPostId);
        $return_array = $sth->execute();
        $return_array = $sth ->fetchAll(PDO::FETCH_ASSOC);

        $this->comments = $return_array;
    }


    public function getComments(){
        return $this->comments;
    }
}
?>