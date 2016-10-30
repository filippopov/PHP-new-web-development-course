<?php
session_start();

include 'database.php';

$fullName = '';
if (isset($_SESSION['user'])) {
    $fullName = $users[$_SESSION['user']]['full_name'];
} else {
    header('Location: login.php?error=You try to cheat');
}

$now = new DateTime();

$now = new DateTime($now->format('Y-m-d'));

$birthday = new DateTime($users[$_SESSION['user']]['birthday']);

$birthday = new DateTime($now->format('Y') . '-' . $birthday->format('m') . '-' . $birthday->format('d'));

if ($birthday < $now) {
    $birthday = date_modify($birthday, '+1 year');
}

$result = $birthday->diff($now);
$dayBeforBurthday = $result->days;




include 'profile_frontend.php';


