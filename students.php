<?php

$allowDelimiters = [
    '|',
    ',',
    '&'
];

$error = isset($_GET['error']) ? $_GET['error'] : null;
$data = array();

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

    for ($i = 0; $i < count($aAges); $i++) {
        if ($aAges[$i] >= 18) {
            $data[] = [
                'ages' => $aAges[$i],
                'names' => $aNames[$i]
            ];
        }
    }

    $counter = count($data);

    $page = 1;
    $countOfRows = 5;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $startIndex = ($page - 1) * $countOfRows;
    $endIndex = $startIndex + $countOfRows;

    $hasPrevious = $page > 1;



    $pages = ceil($counter / $countOfRows);
    $urlData = $_SERVER["QUERY_STRING"];

    $urlData = preg_replace('/page=\d+&/', '', $urlData);

    $start = 0;
    $dataWithPaging = array();

    foreach ($data as $value) {
        if ($start >= $startIndex && $start <$endIndex) {
            $dataWithPaging[] = $value;
        }

        $start++;
    }

    $counterWithPaging = count($dataWithPaging);
    $hasNext = $page < $counterWithPaging;
}


include "studentsFrontend.php";