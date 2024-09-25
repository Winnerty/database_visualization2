<?php
require_once 'User.php';

$id=User::login($_POST['login'], $_POST['password']);

if (!empty($id)) {
    session_start();
    header('location: welcome.php');
    exit;
} 

else
    header('location: index.php');
?>