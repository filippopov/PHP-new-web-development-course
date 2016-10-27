<?php
$result = '';



if (! empty($_GET) && isset($_GET['calc'])) {
    $operation = $_GET['operation'];
    $numberOne = (int) $_GET['numberOne'];
    $numberTwo = (int) $_GET['numberTwo'];

    if ($operation == 'sum') {
        $result = $numberOne + $numberTwo;
    } else if ($operation == 'subtract') {
        $result = $numberOne - $numberTwo;
    } else {
        $result = 'Invalid Operation';
    }

}

include 'calcolateView.php';