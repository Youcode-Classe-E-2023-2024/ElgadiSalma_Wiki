<?php

$Wiki = new  Wiki();

// filter wikis
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$tag = isset($_GET['tag']) ? $_GET['tag'] : 'all';

switch (true) 
{
    case ($category == 'all' && $tag == 'all'):
        $filteredTickets= $Wiki->allWikis();
    break;

    case ($category != 'all' && $tag == 'all'):
        // die('hello');
        $filteredTickets= $Wiki->filterCategory($category);
    break;

    case ($category == 'all' && $tag != 'all'):
        $filteredTickets= $Wiki->filterTag($tag);
    break;

    case ($category != 'all' && $tag != 'all'):
        $filteredTickets= $Wiki->filterCategoryTag($category , $tag);
    break;
}   

echo json_encode($filteredTickets);
die();


// end filter wikis