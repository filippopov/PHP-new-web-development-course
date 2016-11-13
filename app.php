<?php

require_once 'autoloader.php';

\Driver\Database::setInstances(
    \Config\DBConfig::DB_HOST,
    \Config\DBConfig::DB_USER,
    \Config\DBConfig::DB_PASS,
    \Config\DBConfig::DB_NAME
);

$userLifeCycle = new UserLifecycle(\Driver\Database::getInstance(
    \Config\DBConfig::DB_HOST,
    \Config\DBConfig::DB_USER,
    \Config\DBConfig::DB_PASS,
    \Config\DBConfig::DB_NAME
));