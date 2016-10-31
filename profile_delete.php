<?php

include "UserLifecycle.php";

$user = isset($_GET['user']) ? $_GET['user'] : '';

$userLife = new UserLifecycle();

if(! empty($user)) {
    $userLifecycle = new UserLifecycle();
    $result = $userLifecycle->delete($user);
}