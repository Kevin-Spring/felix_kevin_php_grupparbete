<?php
include("includes/database_connection.php");

?>

<h1>Post Something!</h1>

<form action="handlers/handleCreatePost.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" id="" placeholder="Title" required> 
    <br>
    <textarea name="text" cols="30" rows="10" placeholder="Text" required></textarea>
    <br>
    <select name="category">
      <option value="sunglasses">Sunglasses</option>
      <option value="watches">Watches</option>
      <option value="interior">Interior</option>
    </select>
    <br>
    <input type="file" name="file">
    <br>
    <button name="POST">Post</button>
    </form>

    <?php 

    ?>

<a href="index.php?page=adminPage">Back</a>