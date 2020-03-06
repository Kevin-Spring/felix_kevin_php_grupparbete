<?php
include("includes/database_connection.php");

?>

<h1>Post Something!</h1>

<form action="handlers/handleCreatePost.php" method="POST" enctype="multipart/form-data">
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
    <!-- USER NEEDS TO UPLOAD FILE, ERROR MESSAGE OTHERWISE -->
    <input type="file" name="file">
    <br>
    <button name="POST">Post</button>
    </form>

    <?php 

    ?>

<a href="index.php?page=adminPage">Back</a>