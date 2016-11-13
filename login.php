<?php
session_start();

require_once 'app.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';


if (! empty($_POST)) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($userLifeCycle->login($username, $password)) {
        $_SESSION['user'] = $username;
        header('Location: profile.php');
        exit;
    } else {
        header('Location: login.php?error=Invalid credentials');
        exit;
    }

}

include 'login_frontend.php';