<?php
include("includes/database_connection.php");

?>

<h1>Post Something!</h1>

<form action="handlers/handleCreatePost.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" id="" placeholder="Title"> 
    <br>
    <textarea name="text" cols="30" rows="10" placeholder="Text"></textarea>
    <br>
    <select name="category">
      <option value="sunglasses">Sunglasses</option>
      <option value="watches">Watches</option>
      <option value="interior">Interior</option>
    </select>
    <br>
    <input type="file" name="file">
    <br>
    <!-- <input type="text" name="image_description"> <br> -->
    <button name="POST">Post</button>
    </form>

    <?php 

      /* if(isset($_GET['page']) && ($_GET['page'] == 'postsuccess')){
        $posts = new Posts($dbh);
        $posts->fetchLatest();
                //För att visa allt ur min TestPost tabell
                 foreach($posts->getPosts() as $post){
                 echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
                 echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
                 echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
                 echo  "<hr>";
                 echo  "<div>" . $post['content'] . "</div>";
                 
                 echo "<hr>";
                }   */

                //Visar ur Images tabellen
                /* foreach($posts->getPosts() as $post){
                    echo  "<div>" . "<br>" . "<img src='handlers/". $post['imageLink'] . "'> " . "</div>";
                    echo  "<hr>";
                    echo  "<div>" . $post['imageDescription'] . "</div>";
                    
                    echo "<hr>";
                   }  */
      //}
    ?>

<a href="index.php?page=adminPage">Back</a>