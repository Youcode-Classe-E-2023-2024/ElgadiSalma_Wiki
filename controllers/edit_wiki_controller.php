<?php

// include_once 'models/Wiki.php';

$Wiki = new Wiki();

// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags

// get infos about wiki
$id = $_GET['id'];
if(!empty($id)){
$wiki = $Wiki->getWikiById($id);}
else{
echo "eee";
}

// edit wiki
if(isset($_POST['submit']))
    {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $photo = $_FILES['photo']['name'];
        $title_err = '';
        $description_err = '';
        $photo_err = '';
        
 
        if(empty($title))
        {
            $title_err = "Veuillez entrez le nom du wiki";
        }
        if(empty($description))
        {
            $description_err = "Veuillez entrez la description du wiki";
        }
        if(empty($photo))
        {
            $photo_err = "Veuillez entrez l'image' du wiki";
        }

        if(empty($title_err) && empty($description_err) && empty($photo_err))
        {
            $targetDir = "./assets/image/wikis/";
            // Get the uploaded file's name and temporary name
            $photo = basename($_FILES["photo"]["name"]);
            $tmpName = $_FILES["photo"]["tmp_name"];
            // Set the target path
            $targetPath = $targetDir . $photo;
            // Check if the file is an image
            $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowedExtensions)) 
                {
                    // Move the file to the target directory
                    if (move_uploaded_file($tmpName, $targetPath)) 
                    {
                        // echo "The file " . $photo . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                }

            // add wiki
            if($Wiki->updateWiki($id, $title, $description, $photo)){
            echo"wee";
            }

        }    
    }

// end edit wiki