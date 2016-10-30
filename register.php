<?php

session_start();

include 'database.php';
include 'UserLifecycle.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';

//if (! empty($_POST)) {
//    $user = $_POST['username'];
//    $password = $_POST['password'];
//    $passwordConfirm = $_POST['confirm'];
//    $email = $_POST['email'];
//    $birthday = $_POST['birthday'];
//    $fullName = $_POST['full_name'];
//
//    if (empty($user)) {
//        header('Location: register.php?error=Please enter username');
//        exit;
//    }
//
//    if (empty($password)) {
//        header('Location: register.php?error=Please enter password');
//        exit;
//    }
//
//    if (empty($fullName)) {
//        header('Location: register.php?error=Please enter full name');
//        exit;
//    }
//
//    if ($password != $passwordConfirm) {
//        header('Location: register.php?error=Password and Confirm password do not match');
//        exit;
//    }
//
//    if(array_key_exists($user, $users)) {
//        header('Location: register.php?error=This username already exist');
//        exit;
//    }
//
//    $users[$user] = [
//        'password' => $password,
//        'email' => $email,
//        'birthday' => $birthday,
//        'full_name' => $fullName
//    ];
//
//    $usersAsText = var_export($users, true);
//
//    $declaration = '<?php' . PHP_EOL . '$users = ' . $usersAsText . ';';
//
//    $result = file_put_contents('database.php', $declaration);
//
//    if (! $result) {
//        header('Location: register.php?error=Sorry but register user failed');
//        exit;
//    } else {
//        header('Location: login.php?success=Create user Successfully');
//        exit;
//    }
//}

if(! empty($_POST)) {
    $lifeCycle = new UserLifecycle();

    $result = false;

    try {
        $result = $lifeCycle->register($_POST);
    } catch (Exception $e) {
        header('Location: register.php?error=' . $e->getMessage());
        exit;
    }

    if (! $result) {
        header('Location: register.php?error=Sorry but register user failed');
        exit;
    } else {
        header('Location: login.php?success=Create user Successfully');
        exit;
    }
}

include 'register_frontend.php';