<?php

$db = array(
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'site_profiles'
);

global $connection;
$connection = mysqli_connect(
    $db['server'],
    $db['username'],
    $db['password'],
    $db['name']
);

if ($connection == false) {

    echo 'Error';
    echo mysqli_connect_error();
    exit();
}