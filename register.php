<?php

session_start();

include 'database.php';
include 'UserLifecycle.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';
$lifeCycle = new UserLifecycle();

if(! empty($_POST)) {
    $birthday = new DateTime($_POST['birthday']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullName = $_POST['full_name'];
    $confirmPassword = $_POST['confirm'];

    if (empty($username)) {
        header('Location: register.php?error=Please enter username');
        exit;
    } elseif (empty($password)) {
        header('Location: register.php?error=Please enter password');
        exit;
    } elseif (empty($fullName)) {
        header('Location: register.php?error=Please enter full name');
        exit;
    }

    if ($password != $confirmPassword) {
        header('Location: register.php?error=Password and confirm password are not the same');
        exit;
    }

    $result = $lifeCycle->register($_POST['username'], $_POST['password'], $_POST['email'], $_POST['full_name'], $birthday);

    if ($result) {
        header('Location: login.php?success=Create user Successfully');
        exit;
    } else {
        header('Location: register.php?error=Sorry but register user failed');
        exit;
    }
}

include 'register_frontend.php';