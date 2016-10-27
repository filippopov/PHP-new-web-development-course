<?php

$allowDelimiters = [
    '|',
    ',',
    '&'
];

$error = isset($_GET['error']) ? $_GET['error'] : null;

if (! empty($_GET) && isset($_GET['filter'])) {
    $delimiter = $_GET['delimiter'];
    $names = $_GET['names'];
    $ages = $_GET['ages'];
    $delimiter = $_GET['delimiter'];

    if (! in_array($delimiter, $allowDelimiters)) {
        header("Location: students.php?error=Delimiter not exist");
        exit();
    }

    $aNames = explode($delimiter, $names);
    $aAges = explode($delimiter, $ages);

    if (count($aNames) != count($aAges)) {
        header("Location: students.php?error=Count of name and ages don't match");
        exit();
    }

}

include "studentsFrontend.php";