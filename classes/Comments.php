<?php 
    class Comments{
    private $databaseHandler;
    private $order = "desc";
    private $comments;
    //private $singlePost;

    public function __CONSTRUCT($dbh){
        $this->databaseHandler = $dbh;
    }

    //Fetch all the posts
    public function fetchComments(){
        $getPostId = $_GET['postId'];
        $query = "SELECT * FROM TestComments JOIN Users ON Users.Id = userId WHERE postId =" . $getPostId;

        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array ->fetchAll(PDO::FETCH_ASSOC);

        $this->comments = $return_array;
    }


    public function getComments(){
        return $this->comments;
    }
}
?>