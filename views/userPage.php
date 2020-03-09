<?php

//Prevent people from entering site without login
 if(@$_SESSION['role'] != "user"){
 echo "<h2>Access denied dude, nice try..</h2>";
 die;
 }

 //Greets User
 echo "<h3>Hello " . $_SESSION['userName'] . "!</h3>" . "<br> <br>";
 echo '<a href="index.php?page=logout">Sign out</a><br>'; 

 //Sorting options for the posts
 echo "Sort by: <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=ascending'>Ascending</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=descending'>Descending</a>";
 echo "<br>";
 echo "Sort by Category: <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=sunglasses'>Sunglasses</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=watches'>Watches</a> | 
 <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=interior'>Interior</a>";

 
 
 //If order = ascedning in URL fetchAll posts with argument "asc", which changes the query in class Posts
if (isset($_GET['order']) && $_GET['order'] == "ascending") {

 $posts = new Posts($dbh);
 $posts->fetchAll("asc");

 foreach($posts->getPosts() as $post){
    echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
    echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
    echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
    echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
    echo  "<hr>";
    echo  "<div>" . $post['content'] . "</div>";
 
    echo "<hr>";

    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    } 

  } 
elseif(isset($_GET['order']) && $_GET['order'] == "sunglasses"){
  //Showing all posts with order descending
  $posts = new Posts($dbh);
  $posts->fetchCategory("'sunglasses'");
 

  foreach($posts->getPosts() as $post){
    echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
    echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
    echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
    echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
    echo  "<hr>";
    echo  "<div>" . $post['content'] . "</div>";
 
    echo "<hr>";

    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    }
  } 
elseif(isset($_GET['order']) && $_GET['order'] == "watches"){
  //Showing all posts with order descending
  $posts = new Posts($dbh);
  $posts->fetchCategory("'watches'");
   
  
  foreach($posts->getPosts() as $post){
    echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
    echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
    echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
    echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
    echo  "<hr>";
    echo  "<div>" . $post['content'] . "</div>";
   
    echo "<hr>";
  
    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    }
  } 
elseif(isset($_GET['order']) && $_GET['order'] == "interior"){
    //Showing all posts with order descending
    $posts = new Posts($dbh);
    $posts->fetchCategory("'interior'");
     
    
    foreach($posts->getPosts() as $post){
      echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
      echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
      echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
      echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
      echo  "<hr>";
      echo  "<div>" . $post['content'] . "</div>";
     
      echo "<hr>";
    
      //Link to Create comment
      echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
      }
    }
    else{
      //Showing all posts with order descending
      $posts = new Posts($dbh);
      $posts->fetchAll("desc");
     
    
      foreach($posts->getPosts() as $post){
        echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
        echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
        echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
        echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
        echo  "<hr>";
        echo  "<div>" . $post['content'] . "</div>";
     
        echo "<hr>";
    
        //Link to Create comment
        echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
        }
      } 

?>