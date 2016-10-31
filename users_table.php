<?php
session_start();

include 'master.php';
include 'database.php';
include 'UserLifecycle.php';

$userLifecycle = new UserLifecycle();

$role = $userLifecycle->getRole($_SESSION['user']);

$isAdmin = $role == 'admin';

include 'users_table_frontend.php';
