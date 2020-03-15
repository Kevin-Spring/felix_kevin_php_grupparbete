<?php

echo "<a class='back-btn' href='index.php?page=user'>Back</a>";

if(isset($_GET['action']) && $_GET['action'] == 'comment'){

    //Fetch the post with corresponding id
    $posts = new singlePost($dbh);
    $posts->fetchSinglePost();

    foreach($posts->getSinglePost() as $post){
        //echo "<input type='hidden' name='id' value=" . $post['id'] . ">";

        echo '<div class="lg-post-container">';
        echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
        echo  "<div>" . "<h2>" . $post['title'] . "</h2>" . "</div>";
        echo "<div>" . "<h3>" . "<span>" . "Category: " . "</span>" . $post['Category']. "<h3>". "</div>";
        echo  "<div>" . "<h4>" . "<span>" . "Date Posted: " . "</span>". $post['date_posted'] . "</h4>" . "</div>";
        echo  "<hr>";
        echo  "<div>" . $post['content'] . "</div>";
        echo "<hr>";
        echo '</div>';

    }

    //Fetch all comments related to post
    echo '<div class="comments-container">';
    // Create comment
    echo '<div class="create-comment-container">';
    echo '<form action="handlers/handleComments.php" method="POST">';
    echo "<input type='hidden' name='user_id' value=" . $_GET['userId'] . ">";
    echo "<input type='hidden' name='post_id' value=" . $_GET['postId'] . ">";
    echo '<input type="text" name="comment_title" id="" placeholder="Title">'; 
    echo '<br>';
    echo '<textarea name="comment_text" cols="30" rows="10" placeholder="Text">' . '</textarea>';
    echo '<br>';
    echo '<button class="btn-comment" name="COMMENT">Leave a comment!</button>';
    echo '</form>';
    echo '</div>';

    echo "<h2>Comment Section:</h2>";
    $comments = new Comments($dbh);
    $comments->fetchComments();
    // Display comments
    foreach($comments->getComments() as $comment){
        echo '<div class="user-comment-container">';
        echo "<h3>" . $comment['userName'] . "<span>" . $comment['commentDate'] . "</span>" . "</h3>";
        //echo "<input type='hidden' name='id' value=" . $post['id'] . ">";
        //echo  "<div>" . "<h4>" . "<br>" . $comment['commentDate'] . "</h4>" . "</div>";
       
        echo  "<div>" . "<h4>" . $comment['commentTitle'] . "</h4>" . "</div>";
        echo  "<div>" . $comment['commentContent'] . "</div>";
        echo '</div>';
    }
    echo '</div>';

}

?>
