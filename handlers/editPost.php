<?php

    @session_start();
    if(@$_SESSION['role'] != "admin"){
    echo "<h2>Access denied dude, nice try..</h2>";
    die;
    }

$getAction = $_GET['action'];
$getId = $_GET['postId'];

//To edit posts
if (isset($getAction) && $getAction == "edit") {

    //Fetch the post with corresponding id
    $posts = new singlePost($dbh);
    $posts->fetchSinglePost();
    //Put the old value inside new input fields to edit the text
    foreach($posts->getSinglePost() as $post){
        echo "<form action='handleCreatePost.php?editPost=true' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value=" . $getId . ">";
        echo  "<div>" . "<input type='text' name='title' value=" . $post['title'] . "></div>"; 
        //echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo  "<div>" . "<br>" . "<img src=handlers/". $post['img'] . "> " . "</div>";
        echo  "<hr>";
        echo "<select name='category'>
                <option value=" . $post['Category'] . "> Previous Choice: " . $post['Category'] . "</option>
                <option value='sunglasses'>Sunglasses</option>
                <option value='watches'>Watches</option>
                <option value='interior'>Interior</option>
             </select>";
        echo "<br>";
        echo '<input type="file" name="file">';
        echo  "<div>" . "<textarea name='text' cols=30 rows=10>" . $post['content'] . "</textarea>" . "</div>";
              
        echo "<hr>";

        echo "<button name='update'>Update!</button>";
        echo "</form>";

        echo "<a href='index.php?page=adminPosts'>Back</a>";
    }  

    //Dispaly all comments related to post
    echo "<h1>Comments:</h1>";
    $comments = new Comments($dbh);
    $comments->fetchComments();

    foreach($comments->getComments() as $comment){
    //echo "<input type='hidden' name='id' value=" . $post['id'] . ">";
    
    echo  "<div>" . "<h1>" . $comment['commentTitle'] . "</h1>" . "</div>";
    echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $comment['commentDate'] . "</h4>" . "</div>";
    echo  "<hr>";
    echo  "<div>" . $comment['commentContent'] . "</div>";
    echo "<hr>";

}

}
?>