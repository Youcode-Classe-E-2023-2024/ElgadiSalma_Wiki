<?php

$users = new  User();

if ($_SERVER["REQUEST_METHOD"] === 'POST') 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userInfo = $users->login($email, $password);
    

    if ($userInfo) 
    {
        session_start();

        $_SESSION['id_user'] = $userInfo['id_user'];
        $_SESSION['role'] = $userInfo['role'];
        $_SESSION['username'] = $userInfo['username'];
        $_SESSION['email'] = $userInfo['email'];
        $_SESSION['photo'] = $userInfo['photo'];


        header("location:index.php?page=page1");
        exit();
    } 
    else 
    {
        echo "not log";
        header("location:index.php?page=login&STATUS=probleme_de_connexion");
        exit();
    }
}
?>
