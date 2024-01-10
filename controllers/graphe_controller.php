<?php

$Wiki = new  Wiki();
$User = new  User();

$data = [
    'users' => $User->grapheUser(),
    'wikis' => $Wiki->grapheWiki(),
];

echo json_encode($data);

die;