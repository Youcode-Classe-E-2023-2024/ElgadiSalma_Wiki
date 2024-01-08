<?php

include_once 'models/User.php';

$users = new  User();


if($_SERVER["REQUEST_METHOD"] === 'POST')
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $photo=$_POST['photo'];
    $email_err= "";

    if($users->check_email($email))
    {
        $email_err="Email deja existant";
    }
    else
    {
        if(empty($email_err))
        {
            if ($users->register($email, $username, $password, $photo)) 
            {
            header("location:index.php?page=login");
            }
            else
            {
                header("location:<?= PATH ?>views/register.php?error");
            }
        }

    }
}
