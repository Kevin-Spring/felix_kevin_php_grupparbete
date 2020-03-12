<?php

//Prevent people from entering site without login
 if(@$_SESSION['role'] != "user"){
 echo "<h2>Access denied dude, nice try..</h2>";
 die;
 }

 // Navbar
 echo "<nav>\n";
 echo "<ul>\n";
 echo "  <li><a class=\"active\" href=\"#home\">Home</a></li>\n";
 echo "  <li><a href=\"#news\">About</a></li>\n";
 echo "  <li><a href=\"#contact\">Contact</a></li>\n";
 echo "</ul>\n";
 echo'<div class="btn-signOut">' . '<i class="fas fa-sign-out-alt">' . '</i>' . '<a href="index.php?page=logout">Sign out</a>' . '</div>' . '</nav>'; 
 echo "</nav>\n";

// Header + Greeting User
echo "<header> \n";
echo "    <h1>Welcome " . $_SESSION['userName'] . " to Millhouse Blog</h1>\n";
echo "    <h2> Sunglasses Interior & Watches</h2>\n";
echo "</header>\n";

 //Sorting options for the posts
 echo "Sort by: <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=ascending'>Ascending</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=descending'>Descending</a>";
 echo "<br>";
 echo "Sort by Category: <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=sunglasses'>Sunglasses</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=watches'>Watches</a> | 
 <a href='index.php?page=user&userId=". $_SESSION['id']. "&order=interior'>Interior</a> | <a href='index.php?page=user&userId=". $_SESSION['id']. "'>Show all</a>";

 //Search Form
 //In order for the url to stay the same with user-info, we need to direct user to new file
 //Otherwise the get method overwrites all url info
 echo "<form method='GET' action='handlers/handleSearch.php'>";
 echo "<input type='hidden' name='userId' value=" . $_SESSION['id'] . ">";
  echo  "<input type='search' name='search_query'>";
  echo  "<input type='submit' value='SÖK!'>";
 echo "</form>";

 //Show all posts if no options are selected
 if(empty($_GET['order']) && empty($_GET['search_query'])){
  //Showing all posts
  $posts = new Posts($dbh);
  $posts->fetchAll("desc");

  foreach($posts->getPosts() as $post){
  echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';

  //Link to Create comment
  echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Read more!</a>";
  echo '</div>';
  } 
 }

if (isset($_GET['search_query'])) {
  $searchQuery = $_GET['search_query'];
  
 $posts = new Posts($dbh);
 $posts->fetchSearch();

 foreach($posts->getPosts() as $post){
  echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';

    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    echo '</div>';
    }

}
 
 //If order = ascedning in URL fetchAll posts with argument "asc", which changes the query in class Posts
if (isset($_GET['order']) && $_GET['order'] == "ascending") {

 $posts = new Posts($dbh);
 $posts->fetchAll("asc");

 foreach($posts->getPosts() as $post){
  echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';

    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    echo '</div>';
    } 

  } 
elseif(isset($_GET['order']) && $_GET['order'] == "sunglasses"){
  //Order posts by Category
  $posts = new Posts($dbh);
  $posts->fetchCategory("'%sunglasses%'");
 

  foreach($posts->getPosts() as $post){
    echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';

    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    echo '</div>';
    }
  } 
elseif(isset($_GET['order']) && $_GET['order'] == "watches"){
  //Order posts by Category
  $posts = new Posts($dbh);
  $posts->fetchCategory("'%watches%'");
   
  
  foreach($posts->getPosts() as $post){
    echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';
  
    //Link to Create comment
    echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
    echo '</div>';
    }
  } 
elseif(isset($_GET['order']) && $_GET['order'] == "interior"){
    //Order posts by Category
    $posts = new Posts($dbh);
    $posts->fetchCategory("'%interior%'");
     
    
    foreach($posts->getPosts() as $post){
      echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';
      //Link to Create comment
      echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
      echo '</div>';
      }
    } 
elseif(isset($_GET['order']) && $_GET['order'] == "descending"){
      //Showing all posts with order descending
      $posts = new Posts($dbh);
      $posts->fetchAll("desc");
     
    
      foreach($posts->getPosts() as $post){
        echo  '<div class="post-container">';
  echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
  echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
  echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
  echo  '<div class="post-content">' . $post['content'] . '</div>';
    
        //Link to Create comment
        echo "<a href='index.php?page=createComment&action=comment&postId=" . $post['id'] . "&userId=" . $_SESSION['id'] . "'>Create a comment!</a>";
        echo '</div>';
        }
      } 

?>