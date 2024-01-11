<?php

$Wiki = new Wiki();

// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags

// get infos about wiki
$id = $_GET['id'];
if(!empty($id))
{
    $wiki = $Wiki->getWikiById($id);
    $categories = $Wiki->getCategoryById($id);
    $users = $Wiki->getUserByWiki($id);
    $tags = $Wiki->getTagById($id);
}
else{
echo "eee";
}

