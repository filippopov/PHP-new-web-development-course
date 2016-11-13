<?php
session_start();

require_once 'app.php';

$fullName = '';
if (isset($_SESSION['user'])) {
    $fullName = $userLifeCycle->getFullName($_SESSION['user']);
} else {
    header('Location: login.php?error=You try to cheat');
}

$now = new DateTime();

$now = new DateTime($now->format('Y-m-d'));

$birthday = new DateTime($userLifeCycle->getBirthday($_SESSION['user']));

$birthday = new DateTime($now->format('Y') . '-' . $birthday->format('m') . '-' . $birthday->format('d'));

if ($birthday < $now) {
    $birthday = date_modify($birthday, '+1 year');
}

$result = $birthday->diff($now);
$dayBeforBurthday = $result->days;




include 'profile_frontend.php';


