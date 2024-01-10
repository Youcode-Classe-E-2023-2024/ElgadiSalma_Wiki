<?php

$Wiki = new  Wiki();
$User = new  User();


// graphe user
$users = $User->grapheUser();
echo json_encode($users);