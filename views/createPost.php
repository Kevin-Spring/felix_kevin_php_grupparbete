<?php
include("includes/database_connection.php");

?>
<body class="createPost-body">

<div class="createPost-container">
<h2 class="lg-heading">CREATE A NEW BLOG POST!</h2>
<form action="handlers/handleCreatePost.php" method="POST" enctype="multipart/form-data">

    <h3>Blog Category</h3>

    <input type="text" name="title" id="" placeholder="Title" required> 
    <br>
    <textarea name="text" cols="30" rows="10" placeholder="Text" required></textarea>
    <script>
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
    </script>
    <br>
    <select name="category">
      <option value="sunglasses">Sunglasses</option>
      <option value="watches">Watches</option>
      <option value="interior">Interior</option>
    </select>
    <br>
    <h3>Blog Image</h3>
    <input type="file" name="file">
    <br>
    <h3>Blog Title</h3>
    <input type="text" name="title" id="" placeholder="Title"> 
    <br>
    <h3>Blog Content</h3>
    <textarea name="text" cols="30" rows="10" placeholder="Text"></textarea>
    <br>
    <!-- <input type="text" name="image_description"> <br> -->
    <button class= "btn-comment" name="POST">Post</button>
    </form>
    </d>
<a href="index.php?page=adminPage">Back</a>
</div>
</body>