<?php 

echo "<br>";
echo '<a class="back-btn" href="index.php?page=adminPage">' . '<i class="fas fa-arrow-alt-circle-left"></i>Back' . '</a>';
echo "<br>";

echo "<a href='index.php?page=adminCreatePost'>Create another post!</a>";
echo "<br>";

 //Sorting options for the posts
 echo "Sort by: <a href='index.php?page=adminPosts&order=ascending'>Ascending</a> | <a href='index.php?page=adminPosts&order=descending'>Descending</a>";
 echo "<br>";
 echo "Sort by Category: <a href='index.php?page=adminPosts&order=sunglasses'>Sunglasses</a> | <a href='index.php?page=adminPosts&order=watches'>Watches</a> | 
 <a href='index.php?page=adminPosts&order=interior'>Interior</a> | <a href='index.php?page=adminPosts'>Show all</a>";

 //Search Form
 //In order for the url to stay the same with user-info, we need to direct user to new file
 //Otherwise the get method overwrites all url info
 echo "<form method='GET' action='handlers/handleSearch.php'>";
  echo  "<input type='search' name='search_query'>";
  echo  "<input type='submit' value='SÖK!'>";
 echo "</form>";
 echo '<h2 class="lg-heading">Your posts!</h2>';

//Show all posts if no options are selected
if(empty($_GET['order']) && empty($_GET['search_query'])){
    $posts = new Posts($dbh);
    $posts->fetchAll("desc");
   
    foreach($posts->getPosts() as $post){
       echo  '<div class="post-container">';
       echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
       echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
       echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
       echo  '<div class="post-content">' . $post['content'] . '</div>';
       echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
       echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
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
  echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
  echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
   echo '</div>';
    }

} 


//If order = ascedning in URL fetchAll posts with argument "asc", which changes the query in class Posts
if (isset($_GET['order'])) {

  if(isset($_GET['order']) && $_GET['order'] == "ascending"){
    $posts = new Posts($dbh);
  $posts->fetchAll("asc");
 
  foreach($posts->getPosts() as $post){
    echo  '<div class="post-container">';
    echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
    echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
    echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
    echo  '<div class="post-content">' . $post['content'] . '</div>';
    echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
    echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
     echo '</div>';
     } 
  }
  //Continues to change query to fit sort by requirements
  elseif(isset($_GET['order']) && $_GET['order'] == "sunglasses"){
   //Order all posts by Category
   $posts = new Posts($dbh);
   $posts->fetchCategory("'sunglasses'");
  
 
   foreach($posts->getPosts() as $post){
    echo  '<div class="post-container">';
    echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
    echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
    echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
    echo  '<div class="post-content">' . $post['content'] . '</div>';
    echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
    echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
     echo '</div>';
     }
   } elseif(isset($_GET['order']) && $_GET['order'] == "watches"){
   //Order all posts by Category
   $posts = new Posts($dbh);
   $posts->fetchCategory("'watches'");
    
   
   foreach($posts->getPosts() as $post){
    echo  '<div class="post-container">';
    echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
    echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
    echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
    echo  '<div class="post-content">' . $post['content'] . '</div>';
    echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
    echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
     echo '</div>';
     }
   } elseif(isset($_GET['order']) && $_GET['order'] == "interior"){
     //Order all posts by Category
     $posts = new Posts($dbh);
     $posts->fetchCategory("'interior'");
      
     
     foreach($posts->getPosts() as $post){
      echo  '<div class="post-container">';
      echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
      echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
      echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
      echo  '<div class="post-content">' . $post['content'] . '</div>';
      echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
      echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
       echo '</div>';
       }
     } elseif (isset($_GET['order']) && $_GET['order'] == "descending"){
       //Showing all posts with order descending
       $posts = new Posts($dbh);
       $posts->fetchAll("desc");
      
     
       foreach($posts->getPosts() as $post){
                echo  '<div class="post-container">';
       echo  '<div class="post-img">' . '<img src="handlers/'. $post['img'] . '"> ' . '</div>';
       echo  '<div class="post-title">' . '<h2 class="sm-heading">' . $post['title'] . '</h2>' . '</div>';
       echo  '<div class="post-date">' . '<h4>' . 'Posted: ' . $post['date_posted'] . '</h4>' . '</div>';
       echo  '<div class="post-content">' . $post['content'] . '</div>';
       echo '<div class="edit-btn">' . '<a class="edit-btn" href="index.php?page=edit&action=edit&postId=' . $post['id'] . '">' . '<i class="fas fa-edit"></i>' . '</a>' . '</div>';
       echo '<div class="del-btn">' . '<a class="edit-btn" href="index.php?page=delete&action=delete&postId=' . $post['id'] . "&imgId=" . $post['img'] . '">' . '<i class="fas fa-trash"></i>' . '</a>' . '</div>';
        echo '</div>';
         }
       } 
  }

?>