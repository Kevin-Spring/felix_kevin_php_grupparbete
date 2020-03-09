<?php 

echo "<h1>Your posts!</h1>";
echo "<a href='index.php?page=adminCreatePost'>Create another post!</a>";
echo "<br>";
echo "<a href='index.php?page=adminPage'>Back</a>";
echo "<br>";

 //Sorting options for the posts
 echo "Sort by: <a href='index.php?page=adminPosts&order=ascending'>Ascending</a> | <a href='index.php?page=adminPosts&order=descending'>Descending</a>";
 echo "<br>";
 echo "Sort by Category: <a href='index.php?page=adminPosts&order=sunglasses'>Sunglasses</a> | <a href='index.php?page=adminPosts&order=watches'>Watches</a> | 
 <a href='index.php?page=adminPosts&order=interior'>Interior</a>";

 //Search Form
 //In order for the url to stay the same with user-info, we need to direct user to new file
 //Otherwise the get method overwrites all url info
 echo "<form method='GET' action='handlers/handleSearch.php'>";
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

    echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";
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
  
     echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";
     } 
 
   } 
  //Continues to change query to fit sort by requirements
  elseif(isset($_GET['order']) && $_GET['order'] == "sunglasses"){
   //Order all posts by Category
   $posts = new Posts($dbh);
   $posts->fetchCategory("'sunglasses'");
  
 
   foreach($posts->getPosts() as $post){
     echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
     echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
     echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
     echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
     echo  "<hr>";
     echo  "<div>" . $post['content'] . "</div>";
  
     echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";
     }
   } elseif(isset($_GET['order']) && $_GET['order'] == "watches"){
   //Order all posts by Category
   $posts = new Posts($dbh);
   $posts->fetchCategory("'watches'");
    
   
   foreach($posts->getPosts() as $post){
     echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
     echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
     echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
     echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
     echo  "<hr>";
     echo  "<div>" . $post['content'] . "</div>";
    
     echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
     echo "<br>";
     echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
    
     
     echo "<hr>";
     }
   } elseif(isset($_GET['order']) && $_GET['order'] == "interior"){
     //Order all posts by Category
     $posts = new Posts($dbh);
     $posts->fetchCategory("'interior'");
      
     
     foreach($posts->getPosts() as $post){
       echo  "<div>" . "<h1>" . $post['title'] . "</h1>" . "</div>";
       echo  "<div>" . "<h4>" . "Category:" . "<br>" . $post['Category'] . "</h4>" . "</div>";
       echo  "<div>" . "<h4>" . "Posted:" . "<br>" . $post['date_posted'] . "</h4>" . "</div>";
       echo  "<div>" . "<br>" . "<img src='handlers/". $post['img'] . "'> " . "</div>";
       echo  "<hr>";
       echo  "<div>" . $post['content'] . "</div>";
      
       echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";
       }
     } elseif (isset($_GET['order']) && $_GET['order'] == "descending"){
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
      
         echo "<a href='index.php?page=edit&action=edit&postId=" . $post['id'] . "'>Edit post!</a>";
      echo "<br>";
      echo "<a href='index.php?page=delete&action=delete&postId=" . $post['id'] . "&imgId=" . $post['img'] . "'>Delete!</a>";
     
      
      echo "<hr>";
         }
       } 
 

?>