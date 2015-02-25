<?php

session_start();

// Simple router
$controller = ucfirst($_GET['c']);
$action = $_GET['a'];

if(!isset($_SESSION['user'])) {
    $controller = 'Login';
    $action = 'index';
}

$controller_path = 'controllers/'.$controller.'Controller.php';
$controller_class = $controller.'Controller';
include $controller_path;

$controller_cls = new $controller_class();
$controller_cls->{$action}();
