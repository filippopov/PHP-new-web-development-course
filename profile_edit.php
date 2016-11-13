<?php
session_start();

require_once 'app.php';

$username = $_SESSION['user'];
$password = $userLifeCycle->getPassword($username);
$email = $userLifeCycle->getEmail($username);
$birthday = $userLifeCycle->getBirthday($username);
$fullName = $userLifeCycle->getFullName($username);

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

$adminEdit = isset($_GET['adminEdit']) ? $_GET['adminEdit'] : '';


$adminUri = '';

if(! empty($adminEdit)) {
    $username = $adminEdit;
    $adminUri = "adminEdit=$username&";
}


if (! empty($_POST)) {

    $result = $userLifeCycle->edit($username, $_POST, $_SESSION);
    var_dump($result);
}

$data = new \DTO\Profile($username, $password, $email, $birthday, $fullName);

\ViewEngine\Templates::render('profile_edit_frontend', $data);