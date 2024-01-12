<?php

$Wiki = new  Wiki();

// display all categories
$categories = $Wiki->getAllCategories();
//end display all categories

// display all tags
$tags = $Wiki->getAllTags();
//end display all tags