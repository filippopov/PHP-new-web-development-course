<?php
session_start();

include 'database.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';

if (! empty($_POST)) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (array_key_exists($username, $users)) {
        if ($users[$username]['password'] == $password) {
            $_SESSION['user'] = $username;
            header('Location: profile.php');
            exit;
        } else {
            header('Location: login.php?error=Invalid password');
            exit;
        }
    } else {
        header('Location: login.php?error=Invalid username');
        exit;
    }
}

include 'login_frontend.php';