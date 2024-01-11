<?php

// include_once 'models/Wiki.php';

$Wiki = new Wiki();

if(isset($_SESSION['role']) && $_SESSION['role'] === 0)
{
    
// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags

// display my wikis
$myId = $_SESSION['id_user'];
$wikis = $Wiki->getMyWikis($myId);
// end diplay my wikis

// add wiki
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category= isset($_POST['category']) ? $_POST['category'] : [];
        $myId = $_POST['myId'];
        $photo = $_FILES['photo']['name'];
        $selectedTags = isset($_POST['selected_tags']) ? $_POST['selected_tags'] : [];
        $title_err ='';
        $description_err ='';
        $category_err ='';
        $photo_err ='';
        $selectedTags_err ='';

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
            $photo_err = "Veuillez entrez image du wiki";
        }
        if(empty($category))
        {
            $category_err = "Veuillez entrez la category du wiki";
        }
        if(empty($selectedTags))
        {
            $selectedTags_err = "Veuillez entrez des tags pour le wiki";
        }

        if(empty($title_err) && empty($description_err) && empty($photo_err) && empty($category_err) && empty($selectedTags_err) && !empty($myId))
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
        $Wiki->addWiki($myId, $title, $description,$category, $selectedTags, $photo);       
        }
    }

// end add wiki

// delete wiki
    if(isset($_POST['supprimer']))
    {
        $wikiId = $_POST['wikiId'];
        echo $wikiId;
        if($Wiki->deleteWiki($wikiId))
        {
            header("location:index.php?page=wikis");
        }
        else
        {
            echo"noo"; 
        }
    }
// end delete wiki

}

if(isset($_SESSION['role']) && $_SESSION['role'] === 1)
{

    $wikis =  $Wiki->allWikis();
    if(isset($_POST['archiver']))
    {
        echo "archiver";
        header("location:index.php?page=wikis");

    }
    if(isset($_POST['desarchiver']))
    {
        echo "desarchiver";
        header("location:index.php?page=wikis");

    }

}