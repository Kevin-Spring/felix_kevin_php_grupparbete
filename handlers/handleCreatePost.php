<?php 

include("../includes/database_connection.php");

if(isset($_POST['POST'])) {

    //File Setup
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $title = $_POST['title'];
    $content = $_POST['text'];

    //$imageDescription = $_POST['image_description'];
    

    //this is to convert all file extensions to lower case
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    //Specific converted extensions will now be allowed to be uploaded
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        //if there's no errors uploading the file $fileError = 0
        if($fileError === 0){
            //Allow files up to the size of 1MB
            if($fileSize < 1000000){
                //Provide file with a new unique name so it doesn't replace duplicates in uploads folder
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                //Moves the file from the temporary location to our set local folder
                move_uploaded_file($fileTmpName, $fileDestination);
                
                //insert your post into database
                $query = "INSERT INTO TestPost(title, content, img) VALUES(:title, :text ,:fileDestination)";
                $sth = $dbh->prepare($query);

                //HackerAttack Prohibition
                $sth->bindParam(':fileDestination', $fileDestination);
                //$sth->bindParam(':imageDescription', $imageDescription);
                $sth->bindParam(':text', $content);
                $sth->bindParam(':title', $title);

                $return = $sth->execute();

                //print errormessage from database
                if (!$return) {
                    print_r($dbh->errorInfo());
                } 
                
                //After a successfull post return to index site
                header("location:../index.php?page=postsuccess");
            } else{
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else{
        echo "You can't upload files of this type!";
    }

}

/* if(isset($_POST['POST'])){
    //insert your post into database
    $query = "INSERT INTO Images(imageLink, imageDescription) VALUES(:fileDestination, :imageDescription)";
    $sth = $dbh->prepare($query);

    //HackerAttack Prohibition
    $sth->bindParam(':fileDestination', $fileDestination);
    $sth->bindParam(':imageDescription', $imageDescription);

    $return = $sth->execute();
} */


?>