<?php 

echo "<h1>Your posts!</h1>";
        echo "<a href='index.php?page=adminCreatePost'>Create another post!</a>";
        echo "<br>";
        echo "<a href='index.php?page=adminPage'>Back</a>";

        //Display all posts
        $posts = new Posts($dbh);
        $posts->fetchAll();

    
      foreach($posts->getPosts() as $post){
      echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
      echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
      echo "<div>" . "<h4>" . "Category: ". $post['Category']. "<h4>". "</div>";
      echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
      echo  "<hr>";
      echo  "<div>" . $post['content'] . "</div>";
      echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";

     }

?>