<?php

$Wiki = new  Wiki();

// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories


// add category
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        
        if ($Wiki->addCategory($name)) 
        {
        header("location:index.php?page=categories");
        }
        else
        {
            header("location:<?= PATH ?>page=page1");
        }
    }
// end add category

// delete category
    if(isset($_POST['supprimer']))
    {
        $categoryId = $_POST['categoryId'];
        echo $categoryId;
        if($Wiki->deleteCategory($categoryId))
        {
            header("location:index.php?page=categories");
        }
        else
        {
            echo"noo"; 
        }
    }
// end delete category

// edit category
    if(isset($_POST['modifier']))
    {
        $categoryId = $_POST['categoryId'];
        $name = $_POST['name'];

        echo $categoryId;
        if($Wiki->editCategory($categoryId, $name))
        {
            header("location:index.php?page=categories");
        }
        else
        {
            echo"noo"; 
        }
    }
// end edit Category