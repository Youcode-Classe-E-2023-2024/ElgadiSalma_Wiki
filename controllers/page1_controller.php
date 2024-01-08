<?php

include_once 'models/Room.php';

$Room = new  Room();

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

$rooms = $Room->getRooms($myId);



