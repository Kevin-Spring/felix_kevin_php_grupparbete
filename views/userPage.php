<?php

//Prevent people from entering site without login
        if(@$_SESSION['role'] != "user"){
        echo "<h2>Access denied dude, nice try..</h2>";
        die;
        }
        //Greeting User
        echo "<h3>Hello " . $_SESSION['userName'] . "!</h3>" . "<br> <br>";
        echo '<a href="index.php?page=logout">Sign out</a><br>'; 

        /* echo "Sort by: <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=ascending'>Ascending</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=descending'>Descending</a>";
        
        if (isset($_GET['order']) && $_GET['order'] == "ascending") {
            $order = "asc";
          } */

        //Showing all posts
        $posts = new Posts($dbh);
        $posts->fetchAll();
        

        foreach($posts->getPosts() as $post){
        echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
        echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
        echo  "<hr>";
        echo  "<div>" . $post['content'] . "</div>";
        
        echo "<hr>";

        //Link to Create comment
        echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
       } 

       ?>