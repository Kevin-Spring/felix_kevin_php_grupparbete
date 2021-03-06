<?php
    @session_start();
    if(@$_SESSION['role'] != "admin"){
    echo "<h2>Access denied dude, nice try..</h2>";
    die;
    }

$getAction = $_GET['action'];
//To edit posts
if (isset($getAction) && $getAction == "edit") {
    $getId = $_GET['postId'];
    
    echo "<a class='back-btn' href='index.php?page=adminPosts'>Back</a>";

    //Fetch the post with corresponding id
    $posts = new singlePost($dbh);
    $posts->fetchSinglePost();
    //Put the old value inside new input fields to edit the text
    foreach($posts->getSinglePost() as $post){
        echo '<div class="lg-post-container">';
        echo '<h3>Header</h3>';
        echo "<form action='handlers/handleCreatePost.php?editPost=true' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value=" . $getId . ">";
        echo  "<div>" . "<input type='text' name='title' value=" . $post['title'] . "></div>"; 
        //echo  "<div>" . "<h4>" . "Edited:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo  "<div>" . "<br>" . "<img src=handlers/". $post['img'] . "> " . "</div>";
        echo  "<hr>";
        echo "<select name='category'>
                <option value=" . $post['Category'] . "> Previous Choice: " . $post['Category'] . "</option>
                <option value='sunglasses'>Sunglasses</option>
                <option value='watches'>Watches</option>
                <option value='interior'>Interior</option>
             </select>";
        echo "<br>";
        /* USER NEEDS TO UPLOAD FILE, ERROR MESSAGE OTHERWISE */
        echo '<input type="file" name="file" accept="image/*" onchange="loadFile(event)" required>
        <img id="output"/>
    
        <!-- SCRIPT FOR PREVIEW WINDOW OF UPLOADED IMAGE -->
        <script>
        var loadFile = function(event) {
        var output = document.getElementById("output");
        output.src = URL.createObjectURL(event.target.files[0]);
        };
        </script>';
        echo "<br>";
        echo  "<div>" . "<textarea name='text' cols=30 rows=10>" . $post['content'] . "</textarea>" . "</div>";
       echo "<script>
        CKEDITOR.replace( 'text', {
          toolbar: [
          { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
          { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
          { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
          { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
          { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
          { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
          { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
          ]
          });
      </script>";
        echo "<hr>";

        echo "<button class='btn-comment' name='update'>Update!</button>";
        echo "</form>";

        echo "<a href='index.php?page=delete&action=delete&postId=" . $getId . "'>Delete this post!</a>";

        '</div>';
    }  

    $getId = $_GET['postId'];
    //Dispaly all comments related to post
    echo "<h1>Comments:</h1>";
    $comments = new Comments($dbh);
    $comments->fetchComments();

    foreach($comments->getComments() as $comment){
    echo "<form action='index.php?page=deleteComment&action=deleteComment' method='POST'>";
    echo "<input type='hidden' name='comment_post_id' value=" . $getId . ">";
    echo "<input type='hidden' name='comment_id' value=" . $comment['id'] . ">";
    echo "<h3>User: " . $comment['userName'] . "</h3>";
    echo  "<div>" . "<h1>" . $comment['commentTitle'] . "</h1>" . "</div>";
    echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $comment['commentDate'] . "</h4>" . "</div>";
    echo  "<hr>";
    echo  "<div>" . $comment['commentContent'] . "</div>";
    echo "<hr>";
    echo  "<button type='submit'>Delete this comment</button>";
    echo "</form>";
}
}