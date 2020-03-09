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

 //Search Form
 //In order for the url to stay the same with user-info, we need to direct user to new file
 //Otherwise the get method overwrites all url info
 echo "<form method='GET' action='handlers/handleSearch.php'>";
 echo "<input type='hidden' name='userId' value=" . $_SESSION['id'] . ">";
  echo  "<input type='search' name='search_query'>";
  echo  "<input type='submit' value='SÖK!'>";
 echo "</form>";

if (isset($_GET['search_query'])) {
  $searchQuery = $_GET['search_query'];
  
 $posts = new Posts($dbh);
 $posts->fetchSearch();

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
  //Order posts by Category
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
  //Order posts by Category
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
    //Order posts by Category
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
elseif(isset($_GET['order']) && $_GET['order'] == "descending"){
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