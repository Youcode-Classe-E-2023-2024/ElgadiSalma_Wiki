<?php

$Wiki = new  Wiki();

// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags



$myId = $_SESSION['id_user'];
// echo $myId;


if (isset($_POST['logout'])) 
{
    // echo'hh';
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location:index.php?page=login");
    exit();

}




