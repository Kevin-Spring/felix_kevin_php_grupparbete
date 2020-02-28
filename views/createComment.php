<?php

echo "<a href='index.php?page=user'>Back</a>";

if(isset($_GET['action']) && $_GET['action'] == 'comment'){

    //Fetch the post with corresponding id
    $posts = new singlePost($dbh);
    $posts->fetchSinglePost();

    foreach($posts->getSinglePost() as $post){
        //echo "<input type='hidden' name='id' value=" . $post['id'] . ">";
        echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
        echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo "<div>" . "<h4>" . "Category: ". $post['Category']. "<h4>". "</div>";
        echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
        echo  "<hr>";
        echo  "<div>" . $post['content'] . "</div>";
        echo "<hr>";

    }

    //Fetch all comments related to post
    echo "<h1>Comments:</h1>";
    $comments = new Comments($dbh);
    $comments->fetchComments();

    foreach($comments->getComments() as $comment){
        echo "<h3>User: " . $comment['userName'] . "</h3>";
        //echo "<input type='hidden' name='id' value=" . $post['id'] . ">";
        echo  "<div>" . "<h1>" . $comment['commentTitle'] . "</h1>" . "</div>";
        echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $comment['commentDate'] . "</h4>" . "</div>";
        echo  "<hr>";
        echo  "<div>" . $comment['commentContent'] . "</div>";
        echo "<hr>";

    }

}

?>

<h1>Leave a comment!!</h1>

<form action="handlers/handleComments.php" method="POST">
    <?php echo "<input type='hidden' name='user_id' value=" . $_GET['userId'] . ">";
          echo "<input type='hidden' name='post_id' value=" . $_GET['postId'] . ">";
    ?>
    <input type="text" name="comment_title" id="" placeholder="Title"> 
    <br>
    <textarea name="comment_text" cols="30" rows="10" placeholder="Text"></textarea>
    <br>
    <button name="COMMENT">Comment!</button>
</form>
