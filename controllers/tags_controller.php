<?php

// include_once 'models/Wiki.php';

$Wiki = new  Wiki();

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags


// add tag
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        
        if ($Wiki->addTag($name)) 
        {
        header("location:index.php?page=tags");
        }
        else
        {
            header("location:<?= PATH ?>page=page1");
        }
    }
// end add tag

// delete tag
    if(isset($_POST['supprimer']))
    {
        $tagId = $_POST['tagId'];
        echo $tagId;
        if($Wiki->deleteTag($tagId))
        {
            header("location:index.php?page=tags");
        }
        else
        {
            echo"noo"; 
        }
    }
// end delete tag

// edit tag
    if(isset($_POST['modifier']))
    {
        $tagId = $_POST['tagId'];
        $name = $_POST['name'];

        echo $tagId;
        if($Wiki->editTag($tagId, $name))
        {
            header("location:index.php?page=tags");
        }
        else
        {
            echo"noo"; 
        }
    }
// end edit tag